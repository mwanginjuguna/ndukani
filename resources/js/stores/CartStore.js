import {defineStore} from "pinia/dist/pinia";
import {usePage} from "@inertiajs/vue3";
import axios from "axios";
import {useFlash} from "../Composables/useFlash";

const { flash } = useFlash();

export let useCartStore = defineStore('cart',{
    state() {
        return {
            cartItems: {},
        }
    },
    actions: {
        async addToCart (productId, userId = usePage().props.auth.user.id, quantity = 1) {
            try {
                const response = await axios.post('/cart/add', {
                    product_id: productId,
                    user_id: userId,
                    quantity: quantity,
                });

                if (response.status === 200) {

                    flash('Success', 'Added to cart.', 'success');

                    this.cartItems = await  response.data.newCartItems;
                }

                flash('Error', `Something went wrong! Server responded with ${response.status} Status.`)

            } catch (error) {
                flash('Error', 'Something went wrong. Product not added to Cart.', 'danger');
            }
        },
        async removeFromCart(productId) {
            try {
                const response = await axios.post(route('removeFromCart'), {
                    user_id: usePage().props.auth.user.id,
                    product_id: productId,
                    csrfToken: usePage().props.csrfToken
                });

                if (response.status === 200) {

                    flash('Sucess', 'Removed item from the cart!', 'success');

                    const data = await response.data;

                    this.cartItems = data.newCartItems;

                }
                else {
                    flash('Error', `Failed to remove the item from the cart! Server responded with ${response.status} status!`, 'danger')
                }
            } catch (error) {
                flash('Error', 'Could not establish a connection to the server or the server terminated the operation!', 'danger')
            }
        },
        async getCart(userId = usePage().props.auth.user.id, csrfToken = usePage().props.csrfToken) {
            try {
                const response = await fetch(route('getCart'), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        user_id: userId,
                    }),
                });

                if (response.ok) {
                    const data = await response.json();

                    this.cartItems = data.cart;

                } else {
                    throw new Error('Failed to retrieve cart items!');
                }
            } catch (error) {
                flash('Error', 'Failed to retrieve cart items', 'danger');
            }
        }
    },
    getters: {
        cartItemsValue() {
            return Object.keys(this.cartItems).length
        }
    }
});
