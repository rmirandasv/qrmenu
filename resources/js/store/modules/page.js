import router from '../../router'

export const page = {

    namespaced: true,

    state: {
        id: null,
        name: null,
        qrmenu_id: null,
        cover: null,
        created_at: null,
        updated_at: null,
        createButtonDisabled: true,
        loading: false,
        pages: [],
        createPageForm: {
            name: null,
            cover: null,
            qrmenu_id: null
        }
    },

    getters: {
        name: (state) => {
            return state.name
        },
        qrmenu_id: (state) => {
            return state.qrmenu_id
        },
        cover: (state) => {
            return state.cover
        },
        created_at: (state) => {
            return state.created_at
        },
        updated_at: (state) => {
            return state.updated_at
        },
        isCreateButtonDisabled: (state) => {
            return state.createButtonDisabled
        },
        isLoading: (state) => {
            return state.loading
        },
        pages: (state) => {
            return state.pages
        },
        createPageForm: (state) => {
            return state.createPageForm
        }
    },

    mutations: {
        setName: (state, name) => {
            state.name = name
        },
        setId: (state, id) => {
            state.id = id
        },
        setQrmenuId: (state, qrmenu_id) => {
            state.qrmenu_id = qrmenu_id
        },
        setCover: (state, cover) => {
            state.cover = cover
        },
        setCreatedAt: (state, created_at) => {
            state.created_at = created_at
        },
        setUpdatedAt: (state, updatd_at) => {
            state.updated_at = updated_at
        },
        setCreateButtonDisabled: (state, disabled) => {
            state.createButtonDisabled = disabled
        },
        setLoading: (state, loading) => {
            state.loading = loading
        },
        setPages: (state, pages) => {
            state.pages = pages
        },
        setCreatePageForm: (state, payload) => {
            if (Boolean(payload.name)) {
                state.createPageform.name = payload.name
            }
            if (Boolean(payload.coveer)) {
                state.createPageForm.cover = payload.cover
            }
            if(Boolean(payload.qrmenu_id)) {
                state.createPageForm.qrmenu_id = payload.qrmenu_id
            }
        }
    },

    actions: {
        setName: ({ commit, dispatch }, name) => {
            commit('setName', {name})
            dispatch('checkForm')
        },
        setQrmenuId: ({ commit }, qrmenu_id) => {
            commit('setQrmenuId', qrmenu_id)
        },
        setCover: ({ commit }, cover) => {
            commit('setCover', cover)
            dispatch('checkForm')
        },
        checkForm: ({ state, commit }) => {
            if (Boolean(state.name)) {
                commit('setCreateButtonDisabled', false)
                return
            }
            commit('setCreateButtonDisabled', true)
        },
        createPage: ({ commit, state, rootState }) => {
            commit('setLoading', true)
            window.axios.post('/api/qrmenus/' + rootState.menu.menu.id + '/pages', {
                name: state.name,
                cover: state.cover,
                qrmenu_id: rootState.menu.menu.id
            }).then( (response) => {
                if (response.status === 201) {
                    router.push({ name: 'home'})
                }
            }).catch( (error) => {
                //
            }).finally( () => {
                commit('setLoading', false)
            })
        },
        setPages: ({ commit }, pages) => {
            commit('setPages', pages)
        },
        uploadCover: ({ commit, state }, cover) => {
            commit('setLoading', true)
            let data = new FormData();
            data.append('cover', cover)
            window.axios.post('/api/upload/cover', data, {
                header: { 'Convent-Type': 'multipart/form-data' }
            }).then( (response) => {
                if (response.status === 200) {
                    commit('setCover', response.data.cover_url)
                }
            }).catch( (error) => {
                //
            }).finally( () => {
                commit('setLoading', false)
            })
        },
        getPage: ({ commit }) => {
            commit('setLoading', true)
            window.axios.get('/api/qrmenus/' + router.currentRoute.params.qrmenuId + '/pages/' + router.currentRoute.params.pageId)
                .then( (response) => {
                    commit('setName', response.data.data.name)
                    commit('setCover', response.data.data.cover)
                }).catch( (error) => {
                    //
                }).finally( () => {
                    commit('setLoading', false)
                })
        }
    }

}