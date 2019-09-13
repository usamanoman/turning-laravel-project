import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import CheckoutComponent from './components/Checkout'
import ProductComponent from './components/Product'
import CategoryComponent from './components/Category'
import HomeComponent from './components/Home'

const router = new VueRouter({
    mode: 'history',
    scrollBehavior() {
        return { x: 0, y: 0 };
    },
    routes: [
        {
            path: '/',
            name: 'index',
            component: HomeComponent
        },
        {
            path: '/category',
            name: 'category',
            component: CategoryComponent
        },
        {
            path: '/product/:id',
            name: 'product',
            component: ProductComponent
        },
        {
            path: '/checkout',
            name: 'checkout',
            component: CheckoutComponent
        },
    ],
});

export default router;