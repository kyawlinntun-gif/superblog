require('./bootstrap');

window.Vue = require('vue');

// Vuex
import Vuex from 'vuex'

Vue.use(Vuex)

import storeData from './store/index.js';

const store = new Vuex.Store({
    storeData
})


Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);

// Vue router
import VueRouter from 'vue-router'
import routes from './routes'

Vue.use(VueRouter)

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
})

// v-from
import {
    Form,
    HasError,
    AlertError
} from 'vform'
window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// Sweetalert2
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast;

const app = new Vue({
    router,
    store,
    el: '#app',
});
