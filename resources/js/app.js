require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Vue router
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    routes // short for `routes: routes`
})

const app = new Vue({
    router,
    el: '#app',
});
