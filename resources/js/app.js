require('./bootstrap');

require('alpinejs');
import "../sass/chat.sass";

window.Vue = require('vue');
window.axios = require('axios');
window.VueRouter=require('vue-router').default;

const Chat = Vue.component('chat', require('./components/Chat.vue').default);
const Admin = Vue.component('admin', require('./components/AdminChat.vue').default);

Vue.prototype.$baseurl = "https://localhost:8000";

window.router = new VueRouter({
    routes:[
        {
            path: '/',
            name: 'chat',
            component: Chat,
        },
        {
            path: '/admin',
            name: 'admin',
            component: Admin,
        }
    ],
})

const app = new Vue({
    router,
    el: '#app',
});
