

export const user = {

    namespaced: true,

    state: {
        user: {
            id: null,
            name: '',
            last_name: '',
            email: '',
            company_name: '',
            company_logo: '',
            email_verified_at: '',
            created_at: ''
        }
    },

    getters: {
        user: (state) => {
            return state.user
        },
        userId: (state) => {
            return state.user.id
        }
    },

    mutations: {
        setUser: (state, payload) => {
            state.user.id = payload.id
            state.user.name = payload.name
            state.user.last_name = payload.last_name
            state.user.email = payload.email
            state.user.company_name = payload.company_name
            state.user.company_logo = payload.company_logo
            state.user.email_verified_at = payload.email_verified_at
            state.user.created_at = payload.created_at
        }
    },

    actions : {
        setUser: ({ commit }, user) => {
            commit('setUser', user)
        }
    }

}