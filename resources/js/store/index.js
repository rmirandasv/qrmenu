import Vue from 'vue';
import Vuex from 'vuex';
import { register } from './modules/register'
import { auth } from './modules/auth'
import { user } from './modules/user'
import { menu } from './modules/menu'
import { page } from './modules/page'

Vue.use(Vuex);

export default new Vuex.Store({

    modules: {
        register,
        auth,
        user,
        menu,
        page
    },

    state: {
        openDrawer: true,
        loading: false
    },

    getters: {
        openDrawer: (state) => {
            return state.openDrawer
        },
        isLoading: (state) => {
            return state.loading
        }
    },

    mutations: {
        toggleDrawer: (state) => {
            state.openDrawer = !state.openDrawer
        },
        setLoading: (state, loading) => {
            state.loading = loading
        }
    },

    actions: {
        toggleDrawer: ({ commit }) => {
            commit('toggleDrawer')
        },
        setLoading: ({ commit }, loading) => {
            commit('setLoading', loading)
        }
    }

})