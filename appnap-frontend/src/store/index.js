import {createStore} from 'vuex'

export default createStore({
    state: {
        user: {},
        activeProduct: [],
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

        STORE_ACTIVE_PRODUCT(state, payload) {
            state.activeProduct = payload
        },
    },
    actions: {},
    modules: {}
})
