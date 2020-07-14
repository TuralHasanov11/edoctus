require('./bootstrap');

window.Vue = require('vue');

import './bootstrap/bootstrap';
import './admin/scripts';
import './custom';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app-comments', require('./components/comments/Comments.vue').default);
Vue.component('app-test', require('./components/test/Test.vue').default);
Vue.component('app-home-doctors', require('./components/home/Doctors.vue').default);
Vue.component('app-chat', require('./components/chat/ChatApp.vue').default);

Vue.filter('dateFilter', function(value){
    let dateObj = new Date(value);
    let month = ('0' + (dateObj.getMonth() + 1)).slice(-2);
    let date = ('0' + dateObj.getDate()).slice(-2);
    let year = dateObj.getFullYear();
    let result = date + '-' + month + '-' + year;

    return result;
});

const app = new Vue({
    el: '#app',
});
