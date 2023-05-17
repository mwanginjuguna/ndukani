<template>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
</template>


<script setup>

import {defineProps, onMounted} from "vue";
import {loadScript} from '@paypal/paypal-js';
import {usePage} from "@inertiajs/vue3";
import {useFlash} from "../Composables/useFlash";
import axios from "axios";

const props = defineProps({
    currency: String,
    order: Object
});

const {flash} = useFlash();

function paid() {
    console.log('Running paid() function to redirect to recent orders');
    const a = Object.assign(
        document.createElement('a'),
        {
            href: "/orders",
            style:"display: none",
        });
    document.body.appendChild(a);
    a.click();
}

onMounted( async () => {
    try {
        const paypal = await loadScript({
            'client-id': "AXByLC0wuw6fznWnZABRuNWsYOAlGx_JVw2dJzRSntIaSRL7V0D-hk7SiH3tMNtHWNrtcxEl38xlMXik",
            'currency': props.currency ?? 'USD'
        });

        const csrfToken = usePage().props.csrfToken;
        const userId = usePage().props.auth.user.id;
        // Render the PayPal button into #paypal-button-container
        await paypal.Buttons({

            // Call your server to set up the transaction
            createOrder: function (data, actions) {
                console.log('data before fetch pay', JSON.stringify(data));
                console.log('actions before fetch pay', JSON.stringify(actions));

                return fetch(route('payWithPayPal', props.order.id), {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        user_id: userId,
                        currency: props.currency
                    })
                }).then(function (res) {
                    return res.json();
                }).then(function (orderData) {
                    return orderData.id;
                });
            },

            // Call your server to finalize the transaction
            onApprove: function (data, actions) {
                console.log('Data before capture: ', data)
                return fetch(route('capturePayPal', props.order.id), {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        orderId : data.orderID,
                        payerId : data.payerID,
                        facilitatorAccessToken : data.facilitatorAccessToken,
                    })
                }).then(function (res) {
                    return res.json();
                }).then(function (orderData) {
                    // Three cases to handle:
                    //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                    //   (2) Other non-recoverable errors -> Show a failure message
                    //   (3) Successful transaction -> Show confirmation or thank you

                    var errorDetail = Array.isArray(orderData.data.details) && orderData.data.details[0];

                    if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                        return actions.restart();
                    }

                    if (errorDetail) {
                        var msg = 'Sorry, your transaction could not be processed.';
                        if (errorDetail.description) msg += '\n\n' + errorDetail.description;

                        if (orderData.data.debug_id) msg += ' (' + orderData.data.debug_id + ')';

                        return flash('Error!', `${msg}`, 'warning'); // Show a failure message
                    }

                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData.data, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.data.purchase_units[0].payments.captures[0];
                    flash(
                        'Success. Order paid!',
                        'Transaction ' + transaction.status + ': Transaction ID' + transaction.id,
                        'danger');

                    // Replace the above to show a success message within this page, e.g.
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    setInterval(() => {
                        document.location.href = `/orders`
                    },6000);
                });
            },

            onCancel: function (data, actions) {
                return fetch(route('cancelPayPal', props.order.id), {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    }
                }).then( (res) => res.json()).then( (orderData) => {
                    flash(`Error! ${orderData.status}`, `${orderData.message}`, 'error');
                    console.log(JSON.stringify(orderData));
                });
            }

        }).render('#paypal-button-container');
    } catch (error) {
        flash('Error', 'An Error Occurred. Could not Connect!', 'warning');
        console.log(error)
    }
})

</script>
