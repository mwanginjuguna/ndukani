import { ref } from 'vue';
import axios from 'axios';
import { useFlash } from './useFlash';
import useGetCart from './useGetCart';
import {usePage} from "@inertiajs/vue3";

export default function useCart() {
    const { cart, updateCart } = useGetCart(usePage().props.csrfToken, usePage().props.auth.user.id);
    const { flash } = useFlash();

    const addToCart = async (productId, quantity = 1, userId = 1) => {
        try {
            const response = await axios.post('/cart/add', {
                product_id: productId,
                user_id: userId,
                quantity: quantity,
            });

            flash('Success', 'Added to cart.', 'success');

            // Call the updateCart function to update the cart and cartItemsNumber values
            await updateCart();

        } catch (error) {
            flash('Error', 'Something went wrong. Product not added to Cart.', 'danger');
        }
    };

    return {
        cart,
        addToCart,
    };
}
