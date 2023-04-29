<template>
    <div class="">
        <stripe-checkout
            ref="checkoutRef"
            :pk="publishableKey"
            :sessionId="stripeSessionID"
        />
        <button class="px-4 py-2 bg-blue-900 text-white rounded-lg" @click="submit">Pay with Stripe!</button>
    </div>
</template>

<script setup>
import { StripeCheckout } from '@vue-stripe/vue-stripe';
import {defineProps, onMounted, ref} from "vue";
import axios from "axios";

const loading = ref(false);
const stripeSessionID = ref(null);

const props = defineProps({
    order: Object,
});

// Define a ref for the Stripe checkout component
const checkoutRef = ref(null);
const publishableKey = 'pk_test_51N1p6DGhZKEoyysrwsX5JQiMWfp71hRmDzAXn2IfWlpAYLW9I57YRtrRa0X8NP8HtTtVKMcVnHEzjLs6RadFhiKH003cPzOeo9'
async function getSession() {
    await axios.post(route('payWithStripe', props.order.id))
        .then(res => {
            console.log('response data', res.data);
            stripeSessionID.value = res.data.id;
        })
        .catch(error => {})
}

onMounted(() => {
    console.log('Order: ', props.order)
    console.log('component mounted!')
    getSession();
})

function submit () {
    // You will be redirected to Stripe's secure checkout page
    checkoutRef.value.redirectToCheckout();
}
</script>
