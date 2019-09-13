import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        isLoggedIn: !!localStorage.getItem('token'),
        username: localStorage.getItem('username')
    },
    mutations: {
        loginUser (state) {
            state.isLoggedIn = true
        },
        logoutUser (state) {
            state.isLoggedIn = false
        },
        setUserName (state, payload) {
            state.username = payload;
        }
    },
    getters: {
        loggedIn: state => {
            return state.isLoggedIn;
        },

        customerName: state => {
            return state.username;
        }
    },
    actions: {
        logout (context) {
            localStorage.clear();
            context.commit('logoutUser');
        }
    }
})