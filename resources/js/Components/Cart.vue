<template>
    <div>
        <h2>Cart Items</h2>
        <ul class="list-disc">
            <li v-for="item in cartItems" :key="item.id" class="px-1 pt-4 rounded-lg shadow-sm">
                <div class=" mt-2 grid grid-cols-4">
                    <h4 class="mb-1 col-span-4 uppercase text-slate-700 font-medium font-serif">{{ item.product.name}}</h4>

                    <p class="">{{ item.product.currency}} {{ item.product.price}}</p>

                    <p class="">
                        Quantity [
                        <span class="text-slate-600 font-semibold">
                            {{ item.quantity < item.product.quantity ? item.quantity : 'Not Available'}}
                        </span>]
                    </p>

                    <p class="flex" v-if="item.product.in_stock === 1">

                        In Stock [<span class="text-slate-600 font-semibold">{{item.product.quantity}}</span>]

                        <span class="align-super">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#b0ff70"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18 7L9.42857 17L6 13" stroke="#0095FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 7L11.767 14.2718" stroke="#47710a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </span>
                    </p>

                    <div class="content-end text-right">
                        <p class="text-amber-800 hover:cursor-pointer" @click="removeFromCart(item.product.id)">remove</p>
                    </div>

                </div>

            </li>
        </ul>
    </div>
</template>

<script setup>
import {defineEmits, defineProps, onMounted, ref} from "vue";
import {usePage} from "@inertiajs/vue3";
import {useFlash} from "../Composables/useFlash";

const { flash } = useFlash();
const emit = defineEmits(['updateCart']);

const props = defineProps({
    cartItems: Object,
});
const newCartItems = ref({})
const removeFromCart = async (productId) => {
    try {
        const response = await axios.post(route('removeFromCart'), {
            user_id: usePage().props.auth.user.id,
            product_id: productId,
            csrfToken: usePage().props.csrfToken
        });

        if (response.status === 200) {
            // console.log(response.data);
            flash('Sucess', 'Removed item from the cart!', 'success')

            const data = await response.data

            newCartItems.value = data.newCartItems;

            // console.log('New cart Items: ', JSON.stringify(newCartItems.value))

            emit('updateCart', newCartItems.value);

            // this.$inertia.reload({ preserveState: true, preserveScroll: true });
        }
        else {
            flash('Error', `Failed to remove the item from the cart! Server responded with ${response.status} status!`, 'danger')
        }
    } catch (error) {
        flash('Error', 'Could not establish a connection to the server or the server terminated the operation!', 'danger')
    }

}
</script>
