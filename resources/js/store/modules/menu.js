import router from '../../router'


export const menu = {

    namespaced: true,
    
    state: {
        menu: {
            id: null,
            name: null,
            qrcode: null,
            cover: null,
            created_at: null,
            updated_at: null
        },
        loading: false,
        createButtonDisabled: true,
        updateButtonDisabled: true,
        uploadingCover: false
    },

    getters: {
        menu: (state) => {
            return state.menu
        },
        cover: (state) => {
            return state.menu.cover
        },
        isLoading: (state) => {
            return state.loading
        },
        isCreateMenuButtonDisabled: (state) =>  {
            return state.createButtonDisabled
        },
        isUpdateButtonDisabled: (state) => {
            return state.updateButtonDisabled
        },
        isUploadingCover: (state) => {
            return state.uploadingCover
        }
    },

    mutations: {
        setMenu: (state, menu) => {
            if (menu === null) {
                state.id= null
                state.name= null
                state.qrcode= null
                state.cover= null
                state.created_at= null
                state.updated_at= null
                return
            }
            state.menu = menu
        },
        setLoading: (state, loading) => {
            state.loading = loading
        },
        setCreateButtonDisabled: (state, disabled) => {
            state.createButtonDisabled = disabled
        },
        setUpdateButtonDisabled: (state, disabled) => {
            state.updateButtonDisabled = disabled
        },
        setMenuName: (state, name) => {
            state.menu.name = name
        },
        setMenuQrcode: (state, qrcode) => {
            state.menu.qrcode = qrcode
        },
        setMenuCover: (state, cover) => {
            state.menu.cover = cover
        },
        setUploadingCover: (state, loading) => {
            state.uploadingCover = loading
        }
    },

    actions: {
        setMenuName: ({ commit, dispatch }, name) => {
            commit('setMenuName', name)
            dispatch('checkCreateForm')
        },
        setMenuQrcode: ({ commit }, qrcode) => {
            commit('setMenuQrcode', qrcode)
        },
        setMenuCover: ({ commit, dispatch }, cover) => {
            dispatch('uploadCover', cover)
        },
        checkCreateForm: ({ state, commit }) => {
            if (Boolean(state.menu.name)) {
                commit('setCreateButtonDisabled', false)
                return
            }
            commit('setCreateButtonDisabled', true)
        },
        setMenu: ({ commit }, menu) => {
            commit('setMenu', menu)
        },
        uploadCover: ({ commit, state }, cover) => {
            commit('setUploadingCover', true)
            let data = new FormData();
            data.append('cover', cover)
            window.axios.post('/api/upload/cover', data, {
                header: { 'Convent-Type': 'multipart/form-data' }
            }).then( (response) => {
                if (response.status === 200) {
                    commit('setMenuCover', response.data.cover_url)
                }
            }).catch( (error) => {
                //
            }).finally( () => {
                commit('setUploadingCover', false)
            })
        },
        cleanCover: ({ commit }) => {
            commit('setMenuCover', null)
        },

        createMenu: ({ commit, state, rootState}) => {
            commit('setLoading', true)
            window.axios.post('/api/qrmenus', {
                name: state.menu.name,
                cover: state.menu.cover,
                manager_id: rootState.user.user.id
            }).then( (response) => {
                if (response.status === 201) {
                    commit('setMenu', response.data.data)
                    router.push({ name: 'home' })
                }
            }).catch( (error) => {
                //
            }).finally( () => {
                commit('setLoading', false)
            })
        }

    }


}