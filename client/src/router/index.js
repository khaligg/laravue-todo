import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import SignIn from '../views/SignIn.vue'
import Dashboard from '../views/Dashboard.vue'
import store from '@/store'

Vue.use(VueRouter)

const routes = [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/signin',
      name: 'signin',
      component: SignIn,
        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next()
            }
            else return next('');
        }
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: Dashboard,
        meta: {
            requiresAuth: true,
        },
    }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
  linkExactActiveClass: "active",
})

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.getters['auth/authenticated']) {
        next('signin');
    }
    else next();
})


export default router
