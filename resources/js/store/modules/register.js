import router from '../../router'

export const register = {

    namespaced: true,

    state: {
        name: '',
        last_name: '',
        email: '',
        company_name: '',
        password: '',
        submit_disabled: true,
        isLoading: false
    },

    getters: {

        name: (state) => {
            return state.name
        },
        last_name: (state) => {
            return state.last_name
        },
        email: (state) => {
            return state.email
        },
        company_name: (state) => {
        return state.company_name
        },
        password: (state) => {
            return state.password
        },
        submit_disabled: (state) => {
            return state.submit_disabled
        },
        isLoading: (state) => {
            return state.isLoading
        }
    },

    mutations: {
        setName: (state, name) => {
            state.name = name
        },
        setLastName: (state, last_name) => {
            state.last_name = last_name
        },
        setEmail: (state, email) => {
            state.email = email
        },
        setCompanyName: (state, company_name) => {
            state.company_name = company_name
        },
        setSubmitBtnDisabled: (state, disabled) => {
            state.submit_disabled = disabled
        },
        setPassword: (state, password) => {
            state.password = password
        },
        setIsLoading: (state, loading) => {
            state.isLoading = loading
        }
    },

    actions: {
        setName: ({ commit, dispatch }, name) => {
            commit('setName', name)
            dispatch('checkSubmit')
        },
        setLastName: ({ commit, dispatch }, last_name) => {
            commit('setLastName', last_name)
            dispatch('checkSubmit')
        },
        setEmail: ({ commit, dispatch }, email) => {
            commit('setEmail', email)
            dispatch('checkSubmit')
        },
        setCompanyName: ({ commit, dispatch }, company_name) => {
            commit('setCompanyName', company_name)
            dispatch('checkSubmit')
        },
        setPassword: ({ commit, dispatch}, password) => {
            commit('setPassword', password)
            dispatch('checkSubmit')
        },
        register: ({ state, commit }) => {
            window.axios.get('sanctum/csrf-cookie').then((response) => {})
            commit('setIsLoading', true)
            commit('setSubmitBtnDisabled', true)
            window.axios.post('/api/users', {
                name: state.name,
                last_name: state.last_name,
                email: state.email,
                company_name: state.company_name,
                password: state.password
            }).then((response) => {
                router.push({ name: 'verifyEmailPage'})
            }).catch((error) => {
                console.log(error.response)
            }).finally(() => {
                commit('setIsLoading', false)
                commit('setSubmitBtnDisabled', false)
            })
        },
        checkSubmit: ({ state, commit }) => {
            if (state.name.length > 0 && state.last_name.length > 0 && state.email.length > 0 && state.company_name.length > 0
                && state.password.length > 0)  {
                commit('setSubmitBtnDisabled', false)
                return
            }
            commit('setSubmitBtnDisabled', true)
        }
    }

}