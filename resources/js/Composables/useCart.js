import { ref } from 'vue';
import axios from 'axios';
import { useFlash } from "./useFlash";

export default function useCart() {
    const cart = ref([]);
    const { flash } = useFlash();

    const addToCart = async (productId, quantity = 1, userId = 1) => {
        try {
            const response = await axios.post('/cart/add', {
                product_id: productId,
                user_id: userId,
                quantity: quantity,
            });
            console.log(response.data);
            flash('Success', 'Added to cart.', 'success');
            // update the cart variable with the new cart items
            cart.value = response.data.cart;
        } catch (error) {
            console.error(error);
            flash('Error', 'Something went wrong. Product not added to Cart.', 'danger');
        }
    };

    return {
        cart,
        addToCart,
    };
}
