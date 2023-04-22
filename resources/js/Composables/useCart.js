import {ref} from 'vue';
import axios from 'axios';
import { useFlash } from './useFlash';

export default function useCart() {
    const { flash } = useFlash();

    const newCartItems = ref({});

    const addToCart = async (productId, quantity = 1, userId = 1) => {
        try {
            const response = await axios.post('/cart/add', {
                product_id: productId,
                user_id: userId,
                quantity: quantity,
            });

            flash('Success', 'Added to cart.', 'success');

            newCartItems.value = response.data.newCartItems;


        } catch (error) {
            flash('Error', 'Something went wrong. Product not added to Cart.', 'danger');
        }
    };

    return {
        addToCart,
        newCartItems
    };
}
