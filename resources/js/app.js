/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import axios from 'axios';
import VueRouter from 'vue-router';
import VueCookie from 'vue-cookie';
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'


axios.defaults.baseURL = "https://api.vriendenkoerier.nl/api"

// Tell Vue to use the plugin
Vue.use(VueCookie);
Vue.use(VueFormWizard)


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
Vue.component('packages', require('./components/Packages.vue').default);
Vue.component('check', require('./components/Check.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('profile', require('./components/Profile.vue').default);
Vue.component('register', require('./components/Register.vue').default);
Vue.component('createpackage', require('./components/CreatePackage.vue').default);

import packages from './components/Packages.vue';
import check from './components/Check.vue';
import login from './components/Login.vue';
import profile from './components/Profile.vue';
import register from './components/Register.vue';
import createpackage from './components/CreatePackage.vue';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
//     mounted() {
//         axios.get("https://api.vriendenkoerier.nl/api/packages")
//             .then(response => {
//                 this.results = response.data.results
//             })
//     }
// });

const BaseUrl = "https://api.vriendenkoerier.nl/api/";

function buildUrl(url) {
    return BaseUrl + url;
}
const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: [{
        path: '/',
        name: 'home',
        component: packages
    },
    {
        path: '/create',
        component: createpackage
    },
    {
        path: '/profile',
        name: 'profile',
        component: profile
    },
    {
        path: '/register',
        name: 'register',
        component: register
    },
    {
        path: '/login',
        name: 'login',
        component: login
    }
    ]
});

// router.beforeEach((to, from, next) => {
//     if ($cookies.isKey("token")) {
//         //naar profiel route
//     }
//     else {

//     }
// });

new Vue({
    router,
    axios
}).$mount('#app');
// const app = new Vue({
//     router,
//     axios,
//     el: '#app',
//     data: {
//         results: []
//     },
//     mounted() {
//         this.getPosts('packages');
//     },
//     methods: {
//         getPosts(packages) {
//             let url = buildUrl(packages);
//             axios.get(url).then((response) => {
//                 this.results = response.data.results;
//             }).catch(error => {
//                 console.log(error);
//             });
//         }
//     }
// });
