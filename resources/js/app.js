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
Vue.component('packages', require('./components/Packages.vue').default);
Vue.component('check', require('./components/Check.vue').default);
Vue.component('login', require('./components/Login.vue').default);

import packages from './components/Packages.vue';
import check from './components/Check.vue';
import login from './components/Login.vue';
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
            component: packages
        },
        {
            path: '/check',
            component: check
        },
        {
            path: '/login',
            component: login
        }
    ]
});

new Vue({
    router,
    axios,
    //     template: `
    //     <div>
    //       <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    //         <div class="collapse navbar-collapse" id="navbarNav">
    //           <ul class="navbar-nav">
    //             <li class="nav-item"><router-link to="/" class="nav-link">Home</router-link></li>
    //             <li class="nav-item"><router-link to="/about" class="nav-link">About</router-link></li>
    //             <li class="nav-item"><router-link to="/contact" class="nav-link">Contact</router-link></li>
    //           </ul>
    //         </div>
    //       </nav>
    //       <router-view class="view"></router-view>
    //     </div>
    //   `
}).$mount('#app');
// const app = new Vue({
//     router,
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
