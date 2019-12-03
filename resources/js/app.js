/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import Buefy from 'buefy';
import 'buefy/dist/buefy.css';

Vue.use(Buefy);

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('packages', require('./components/Packages.vue').default);

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

const vm = new Vue({
    el: '#app',
    data: {
        results: []
    },
    mounted() {
        this.getPosts('packages');
    },
    methods: {
        getPosts(packages) {
            let url = buildUrl(packages);
            axios.get(url).then((response) => {
                this.results = response.data.results;
            }).catch(error => {
                console.log(error);
            });
        }
    }
});
