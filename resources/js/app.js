import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import Login from './pages/Login'

import router from './routes';

window.Vue = Vue;
window.axios = axios.create({
    baseURL: 'http://3.15.9.94:8080/restapiv/',
});

Vue.use(VueRouter);

new Vue({
    router,
    component: {
        Login
    },

    data: function (){
        return {
            numAlert: 0,
            showContent: false,
            token: ''
        }
    },
    methods: {
        cerrarSesion: function () {
            this.token = '';
            this.showContent = false;
            this.$router.push({ name: 'Login'});
        }
    },

    mounted: function () {
        axios({
            method: 'get',
            url: '/prueba/reportes'
        }).then(function (response) {
            console.log(response);
        });
    }

}).$mount("#myapp");