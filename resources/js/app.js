/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

import List from './components/list';
import draggable from 'vuedraggable';

let el = document.querySelector('#board');
if (el) {
    new Vue({
        el,
        data: {
            lists: [],
        },
        components: {
            List,
            draggable
        },
        methods: {
            listMoved(event) {
                console.log(event);
                console.log(this.lists);
                console.log(event.moved.newIndex);

                let data = new URLSearchParams();
                data.append('position', event.moved.newIndex+1);
                
                fetch(`/card-lists/${this.lists[event.moved.newIndex].id}/move`, {
                    method : 'PUT',
                    body : data,
                  }).then((response) => {
                    return response.json();
                  }).then((jsonData) => {
                    console.log(jsonData);
                  }).catch((error)=>{
                    console.log(error);
                  });
            }
        },
        beforeMount() {
            fetch('/card-lists', {
                method : 'GET',
              }).then((response) => {
                return response.json();
              }).then((jsonData) => {
                this.lists = jsonData;
              }).catch((error)=>{
                console.log(error);
              });
        }
    })
}

