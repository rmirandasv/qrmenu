
import router from '../../router'

export const auth = {

    namespaced: true,

    state: {
        resource: '/api/login',
        email: '',
        password: '',
        logged_in: false,
        login_in: false,
        logginButtonDisabled: true,
        isLoading: false,
        hasCsrf: false
    },

    getters: {
        email: (state) => {
            return state.email
        },
        password: (state) => {
            return state.password
        },
        isLoggedIn: (state) => {
            return state.logged_in
        },
        isLoginIn: (state) => {
            return state.login_in
        },
        isLoginButtonDisabled: (state) => {
            return state.logginButtonDisabled
        },
        isLoading: (state) => {
            return state.isLoading
        }
    },

    mutations: {
        setEmail: (state, email) => {
            state.email = email
        },
        setPassword: (state, password) => {
            state.password = password
        },
        setLoggedIn: (state, logged_in) => {
            state.logged_in = logged_in
        },
        setLoginIn: (state, login_in) => {
            state.login_in = login_in
        },
        setLogginButtonDisabled: (state, disabled) => {
            state.logginButtonDisabled = disabled
        },
        setLoading: (state, loading) => {
            state.isLoading = loading
        },
        setHasCsrf: (state, csrf) => {
            state.hasCsrf = csrf
        }
    },

    actions: {
        setEmail: ({ commit, dispatch }, email) => {
            commit('setEmail', email)
            dispatch('checkLoginForm')
        },
        setPassword: ({ commit, dispatch }, password) => {
            commit('setPassword', password)
            dispatch('checkLoginForm')
        },
        checkLoginForm: ({ state, commit }) => {
            if (state.email.length > 0 && state.password.length > 0) {
                commit('setLogginButtonDisabled', false)
                return true
            }
            commit('setLogginButtonDisabled', true)
            return false
        },
        _csrf: () => {
            window.axios.get('sanctum/csrf-cookie').then((response) => {
                if (response.status === 200) {
                    commit('setHasCsrf', true)
                }
            })
        },
        login: ({ commit, state, dispatch }) => {

            if (state.logginButtonDisabled) {
                return;
            }

            if (!state.hasCsrf) {
                dispatch('_csrf')
            }

            commit('setLoading', true)

            window.axios.post(state.resource, {
                email: state.email,
                password: state.password
            }).then( (res) => {
                if (res.status == 200) {
                    commit('setLoggedIn', true)
                    router.push({ name: 'home'})
                    dispatch('checkSession')
                }
            }).catch( (err) => {
                commit('setLoggedIn', false)
            }).finally(() => {
                commit('setLoading', false)
            })
        },
        logout: ({ commit }) => {
            window.axios.post('/api/logout')
            .then((response) => {
                if (response.status === 200) {
                    window.location.reload()
                }
            })
        },

        checkSession: ({ state, commit, dispatch }) => {

            dispatch('setLoading', true, { root: true})

            if (!state.hasCsrf) {
                dispatch('_csrf')
            }

            window.axios.post('/api/session/check').then( (response) => {
                if (response.status === 200) {
                    commit('setLoggedIn', true)
                    dispatch('user/setUser', response.data.user, { root: true })
                    dispatch('menu/setMenu', response.data.menu, { root: true})
                    dispatch('page/setPages', response.data.pages, { root: true})
                    router.push({ name: 'home'})
                }
            }).catch( (error) => {
                // TODO: if no session go to login http 401
            }).finally( () => {
                commit('setLoading', false, { root: true })
            })

        }

    }

}