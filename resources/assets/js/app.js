
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import App from './App.vue';
import router from './router';
import DataTable from './components/DataTable.vue';

Vue.use(BootstrapVue)

Vue.component('data-table', DataTable);

Vue.mixin({
    computed: {
        baseUrl() {
            return document.getElementsByTagName('base')[0].href;
        }
    }
});

/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: {
        App
    }
})
