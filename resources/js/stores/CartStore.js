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

                    document.location.reload();
                } else {
                    flash('Error', `Something went wrong! Server responded with ${response.status} Status.`, 'warning')
                }
            } catch (error) {
                flash('Error', 'Something went wrong. Product not added to Cart.', 'warning');
            }
        },
        async removeFromCart(productId) {
            try {
                const response = await axios.post(route('removeFromCart'), {
                    user_id: usePage().props.auth.user.id,
                    product_id: productId,
                });

                if (response.status === 200) {

                    flash('Sucess', 'Removed item from the cart!', 'success');

                    this.cartItems = await response.data.newCartItems;
                }
                else {
                    flash('Error', `Failed to remove the item from the cart! Server responded with ${response.status} status!`, 'warning')
                }
            } catch (error) {
                flash('Error', 'Could not establish a connection to the server or the server terminated the operation!', 'warning')
            }
        },
        async getCart(userId = usePage().props.auth.user.id) {
            try {
                const response = await axios.post(route('getCart'), {
                    user_id: userId
                });

                if (response.status === 200) {
                    const data = await response.data;

                    this.cartItems = data.cart;

                } else {
                    throw new Error(`Failed to retrieve the cart! Server responded with ${response.status} status!`);
                }
            } catch (error) {
                flash('Error', 'Failed to retrieve cart items', 'warning');
            }
        },
        addToLocalCart(productId, quantity = 1) {
            // Retrieve the cart data from localStorage and parse it as an array (cartItems).
            let localCart = localStorage.getItem('cart');
            let cartItems = localCart ? JSON.parse(localCart) : [];
            // Check if the productId already exists in the cart by finding its index using findIndex.
            const existingCartItemIndex = cartItems.findIndex(item => item.product_id === productId);
            // add new cart item if the cart is empty or undefined
            if (existingCartItemIndex !== -1) {
                // Update quantity if product already in cart
                cartItems[existingCartItemIndex].quantity += quantity;
            } else {
                // Add new item
                cartItems.push({
                    product_id: productId,
                    quantity: quantity
                });
            }
            // set local cart
            localStorage.setItem('cart', JSON.stringify(cartItems));
            flash('Added Successfull.', `You have added one item into cart.`, 'success')
        },
        getLocalCart() {
            this.cartItems = localStorage.getItem('cart');
            console.log(`Local cart retrieved & updated: `, this.cartItems)
            // return localCart ? JSON.parse(localCart) : [];
        }
    },
    getters: {
        cartItemsValue() {
            return Object.keys(this.cartItems).length
        },
        updateItems () { this.getCart(); }
    }
});
