require('./bootstrap');

window.Vue = require('vue');

Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);

// Vue router
import VueRouter from 'vue-router'
import routes from './routes'

Vue.use(VueRouter)

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
})

const app = new Vue({
    router,
    el: '#app',
});
