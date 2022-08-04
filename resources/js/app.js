require('./bootstrap');
import Vue from 'vue'




Vue.component('search', require('./components/search.vue').default)
const app = new Vue({
    el: '#app',
})