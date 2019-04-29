import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';

import router from './routes';

import Navbar from "./Components/Navbar";

window.Vue = Vue;
window.axios = axios;

Vue.use(VueRouter);


new Vue({
    router,
    data: function (){
        return {
            numAlert: 0
        }
    },
    components: { Navbar },
    mounted: function () {
        axios({
            method: 'get',
            url: '/prueba/reportes'
        }).then(function (response) {
            console.log(response);
        });
    }

}).$mount("#app");