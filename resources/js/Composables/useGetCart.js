import { ref } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import {useFlash} from "./useFlash";

export default function useCart() {
    const cartItemsNumber = ref(0);
    const {flash} = useFlash();

    const cart = async () => {
        try {
            const csrfToken = usePage().props.csrfToken

            const response = await fetch(route('getCart'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    user_id: usePage().props.auth.user.id,
                }),
            })

            if (response.ok) {
                const data = await response.json()

                cartItemsNumber.value = Object.keys(data.cart).length

                return data.cart

            } else {

                throw new Error('Failed to retrieve cart items')
            }
        } catch (error) {
            flash('Error', 'Failed to retrieve cart items', 'danger')
        }
    }

    return { cart, cartItemsNumber }
}
