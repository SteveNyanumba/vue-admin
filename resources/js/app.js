/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { AlertError, Form, HasError } from 'vform'

// import Swal from 'sweetalert'
import VueRouter from 'vue-router'

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


// My Components



Vue.use(VueRouter)

let routes = [
    {
        path: '/admin/dashboard',
        component: require('./components/Dashboard.vue').default
    },
    {
        path: '/admin/contacts',
        component: require('./components/Contacts.vue').default
    },
    {
        path: '/admin/profile',
        component: require('./components/Profile.vue').default
    },
    {
        path: '/admin/blog',
        component: require('./components/Blog.vue').default

    },
    {
        path: '/admin/portfolio',
        component: require('./components/Portfolio.vue').default
    },
]

// Vue.component('dashboard', require('./components/Dashboard.vue').default);
// Vue.component('contacts', require('./components/Contacts.vue').default);
// Vue.component('profile', require('./components/Profile.vue').default);
// Vue.component('blog', require('./components/Blog.vue').default);
// Vue.component('portfolio', require('./components/Portfolio.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    routes,
    mode: 'history'
})

new Vue({
    el: '#app',
    router
});



// window.Swal = Swal
// const Toast = Swal.mixin({
//   toast: true,
//   position: 'top-end',
//   showConfirmButton: false,
//   timer: 3000,
//   timerProgressBar: true,
//   onOpen: (toast) => {
//     toast.addEventListener('mouseenter', Swal.stopTimer)
//     toast.addEventListener('mouseleave', Swal.resumeTimer)
//   }
// })
// window.Toast = Toast



