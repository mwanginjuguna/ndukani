import { createStore } from 'vuex';

export default createStore({
    state: {
        cart: {}
    },
    mutations: {
        updateCart(state, cart) {
            state.cart = cart;
        }
    },
    actions: {
        fetchCart({ commit }, { csrfToken, userId }) {
            return new Promise((resolve, reject) => {
                fetch(route('getCart'), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        user_id: userId,
                    }),
                })
                    .then(response => response.json())
                    .then(data => {
                        commit('updateCart', data.cart);
                        resolve(data.cart);
                    })
                    .catch(error => {
                        reject(error);
                    });
            });
        }
    },
    getters: {
        cartItemsNumber(state) {
            return Object.keys(state.cart).length;
        }
    }
});
