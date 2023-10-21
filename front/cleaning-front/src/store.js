import {createStore} from 'vuex'

const store = createStore({
    state() {
        return {
            token: null
        }
    },
    mutations: {
        setToken(state, token) {
            state.token = token;
        },
        deleteToken(state) {
            state.token = null
        }
    }
})

export default store;