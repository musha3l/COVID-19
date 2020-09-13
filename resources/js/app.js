require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import bootstrapvue from 'bootstrap-vue'

Vue.use(VueRouter);
Vue.use(bootstrapvue);

const routes = [
    { path: '/', component: require('./views/Home').default },
    { path: '/add', component: require('./views/AddCountry').default },
    { path: '/edit/:id', component: require('./components/CountryEdit').default, name: 'CountryEdit' },
    { path: '/view/:id', component: require('./components/CountryView').default, name: 'CountryView' },
]

const router = new VueRouter({
    routes
})
const app = new Vue({
    router
}).$mount('#app')
