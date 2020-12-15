require('./bootstrap')

window.Vue = require('vue')

import vuetify from './plugins/vuetify'
import store from './store'
import router from './router'

Vue.component('qrmenu-app', require('./App.vue').default)

const app = new Vue({
    vuetify,
    store,
    router,
    el: '#app',
});