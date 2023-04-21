import { ref, watch } from 'vue';
import { useFlash } from './useFlash';
import ca from "../../../public/build/assets/ProductShow-88f3e683";

export default function useGetCart(csrfToken, userId) {
    const cart  = ref({});
    const cartItemsNumber = ref(0)
    const { flash } = useFlash();

    const updateCart = async () => {
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
                cart.value = data.cart;
                // console.log('data: ', JSON.stringify(data.cart))

                cartItemsNumber.value = Object.keys(data.cart).length;
                console.log('cart composable: '+JSON.stringify(cart.value))
                return {cart, cartItemsNumber};
            } else {
                throw new Error('Failed to retrieve cart items!');
            }
        } catch (error) {
            flash('Error', 'Failed to retrieve cart items', 'danger');
        }
    };

   updateCart(); // initialize cart
    console.log('cart down: ' + cart)
    // Watch for changes in the cart and update the cartItemsNumber and cart values accordingly
    watch(cart, (newCart) => {
        cartItemsNumber.value = Object.keys(newCart).length;
        cart.value = newCart;
    });

    return { cart, cartItemsNumber, updateCart };
}
