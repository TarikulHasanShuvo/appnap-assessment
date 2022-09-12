import {createStore} from 'vuex'

export default createStore({
    state: {
        user: {},
        products: [],
    },

    getters: {
        getCurrentUser(state) {
            return state.user
        },
    },

    mutations: {
        STORE_USER(state, payload) {
            state.user = payload
        },

        STORE_PRODUCTS(state, payload) {
            state.products = payload
        },
    },
    actions: {},
    modules: {}
})
