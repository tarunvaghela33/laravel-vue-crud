import Vue from 'vue'
import VueRouter from 'vue-router'

// mengaktifkan vue router
Vue.use(VueRouter);

import dashboard from '../pages/dashboard.vue'
// Users
import index_users from '../pages/users/index.vue'
import create_users from '../pages/users/create.vue'
import edit_users from '../pages/users/edit.vue'

const routes = [
    {
        name: 'users',
        path: '/users',
        meta: 'Users',
        component: index_users,
        beforeEnter: (to, from, next) => {
            document.title = "Admin - " + to.meta
            next()
        },
    },
    {
        name: 'create_users',
        path: '/users/create',
        meta: 'Create Users',
        component: create_users,
        beforeEnter: (to, from, next) => {
            document.title = "Admin - " + to.meta
            next()
        },
    },
    {
        name: 'edit_users',
        path: '/users/:id',
        meta: 'Edit Users',
        component: edit_users,
        props: true,
        beforeEnter: (to, from, next) => {
            document.title = "Admin - " + to.meta
            next()
        },
    },
    {
        name: 'dashboard',
        path: '*',
        meta: 'Dashboard',
        component: dashboard,
        beforeEnter: (to, from, next) => {
            document.title = "Admin - " + to.meta
            next()
        }
    },
]

const router = new VueRouter({
    LinkaAtiveClass: 'active',
    mode: 'history',
    routes,
    base: ''
})

export default router
