import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './pages/Home'
import LandingPage from './pages/LandingPage'
import Login from './pages/Login'
import Register from './pages/Register'
import LandingPageNavigation from './components/navigation/LandingPageNavigation'
import VerifyEmail from './pages/VerifyEmail'
import store from './store'
import HomePageNavigation from './components/navigation/HomePageNavigation'
import CreateMenu from './pages/CreateMenu'
import CreateMenuPage from './pages/CreateMenuPage'
import EditMenuPage from './pages/EditMenuPage'
import EditMenuPageNavitation from './components/navigation/EditMenuPageNavigation'

Vue.use(VueRouter)

const routes = [
    {
        path: '/home',
        components: {
            navigation: HomePageNavigation,
            main: Home
        },
        name: 'home'
    },
    {
        path: '/user/menu/add',
        components: {
            main: CreateMenu,
            navigation: HomePageNavigation
        },
        name: 'createMenu'
    },
    {
        path: '/',
        components: {
            navigation: LandingPageNavigation,
            main: LandingPage
        },
        name: 'landingpage'
    },
    {
        path: '/login',
        components: {
            navigation: LandingPageNavigation,
            main: Login
        },
        name: 'login'
    },
    {
        path: '/register',
        components: {
            navigation: LandingPageNavigation,
            main: Register
        },
        name: 'register'
    },
    {
        path: '/pages/add',
        components: {
            main: CreateMenuPage,
            navigation: HomePageNavigation
        },
        name: 'createMenuPage'
    },
    {
        path: '/qrmenus/:qrmenuId/pages/:pageId',
        components: {
            main: EditMenuPage,
            navigation: EditMenuPageNavitation
        },
        name: 'editMenuPage'
    },
    {
        path: '/verify-email',
        components: {
            main: VerifyEmail
        },
        name: 'verifyEmailPage'
    }
]

const router = new VueRouter({
    routes
})

router.beforeEach((to, from, next) => {
    const publicPages = ['/login', '/register', "/", "/verify-email"]
    const authRequired = !publicPages.includes(to.path)
    const loggedIn = store.getters['auth/isLoggedIn']
  
    if (authRequired && !loggedIn) {
      return next('/')
    }

    if (to.name === 'editMenuPage') {
        store.dispatch('page/getPage')
    }
  
    next()
  })

export default router