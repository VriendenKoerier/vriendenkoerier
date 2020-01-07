/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import axios from 'axios';
import VueRouter from 'vue-router';


Vue.use(VueRouter);
Vue.use(axios);


window.Vue = require('vue');
import('./RouterSetup');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


import BootstrapVue from 'bootstrap-vue' //Importing

Vue.use(BootstrapVue) // Telling Vue to use this in whole application
Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('resfooter', require('./components/Footer.vue').default);
Vue.component('packages', require('./components/Packages.vue').default);
Vue.component('packagesperuser', require('./components/PackagesPerUser.vue').default);
Vue.component('check', require('./components/Check.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('pagination', require('./components/Pagination.vue').default);

import packages from './components/Packages.vue';
import profile from './components/Profile.vue';
import check from './components/Check.vue';
import login from './components/Login.vue';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const BaseUrl = "https://api.vriendenkoerier.nl/api/";

function buildUrl(url) {
    return BaseUrl + url;
}
const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: [{
            path: '/',
            component: packages
        },
        {
            path: '/check',
            component: check
        },
        {
            path: '/login',
            component: login
        },
        {
            path: '/profile',
            component: profile
        }
    ]
});

new Vue({
    router,
    axios,
}).$mount('#app');

