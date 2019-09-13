/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');

import VModal from 'vue-js-modal'
 
Vue.use(VModal)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('site-header-primary', require('./components/partials/HeaderPrimary.vue').default);
Vue.component('site-footer-primary', require('./components/partials/FooterPrimary.vue').default);
Vue.component('site-header-secondary', require('./components/partials/HeaderSecondary.vue').default);
Vue.component('site-footer-secondary', require('./components/partials/FooterSecondary.vue').default);
Vue.component('product', require('./components/Product.vue').default);
Vue.component('category', require('./components/Category.vue').default);
Vue.component('app-component', require('./components/AppComponent.vue').default);
Vue.component('login-modal', require('./components/LoginModal.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 import router from './routes.js';
 import store from './store.js';

const app = new Vue({
    el: '#app',
    router,
    store
});
