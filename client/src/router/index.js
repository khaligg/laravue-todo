import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Todo from '../views/Todo.vue'
import Finished from '../views/FinishedTodos.vue'
import store from '@/store'

Vue.use(VueRouter)

const routes = [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']) {
                return next()
            }
            else return next('');
        }
    },
    {
      path: '/todo',
      name: 'todo',
      component: Todo,
        meta: {
            requiresAuth: true,
        },
    },
    {
      path: '/finished',
      name: 'finished',
      component: Finished,
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
        next('login');
    }
    else next();
})


export default router
