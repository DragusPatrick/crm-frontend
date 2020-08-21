import Vue from 'vue'

import moment from 'moment'
Vue.prototype.moment = moment

import axios from 'axios'

import VueProgressBar from 'vue-progressbar'
import App from './App.vue'

Vue.use(VueProgressBar, {
    color: '#90c88e',
    failedColor: 'red',
    height: '40px'
})

import VueRouter from 'vue-router'
Vue.use(VueRouter)
import router from './router'

import Vuex from 'vuex'
Vue.use(Vuex)
import store from './store'

import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast = toast;


import { ValidationProvider, extend } from 'vee-validate';
Vue.component('ValidationProvider', ValidationProvider);


Vue.filter('formatMoney', (value) => {
    return Number(value)
        .toFixed(2)
        .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
})
Vue.filter('formatDate', (value) => {
    if (value) {
        return moment(String(value)).format('DD-MM-YYYY')
    }
})
Vue.filter('formatMiniDate', (value) => {
    if (value) {
        return moment(String(value)).format('D MMM YYYY')
    }
})
Vue.filter('truncate', function (text, length, suffix) {
    return text.substring(0, length) + suffix;
});

import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'

Vue.config.productionTip = false

new Vue({
  router,
  store,
  created () {
    const userInfo = localStorage.getItem('user')
    if (userInfo) {
      const userData = JSON.parse(userInfo)
      this.$store.commit('setUserData', userData)
    }
    axios.interceptors.response.use(
      response => response,
      error => {
        if (error.response.status === 401) {
          this.$store.dispatch('logout')
        }
        return Promise.reject(error)
      }
    )
  },
  render: h => h(App)
}).$mount('#app')
