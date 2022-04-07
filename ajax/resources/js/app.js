import Vue from 'vue/dist/vue'; //node_modules/vue/dist/vue.js

require('./bootstrap');
window.Vue = require('vue');

import App from './App.vue'; //layouts.blade.php
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes'; // routes.js - route/web.php

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el:'#app',
    router: router,
    render: h =>h(App)
})