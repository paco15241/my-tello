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

import draggable from 'vuedraggable';
import store from './stores/list';
import { mapGetters, mapActions } from 'vuex';
import List from './components/list';
import Newlist from './components/newlist';

let el = document.querySelector('#board');
if (el) {
    new Vue({
        el,
        store,
        computed: {
          // ...mapGetters(['lists']),
          lists: {
            get() {
              return this.$store.state.lists;
            },
            set(value) {
              this.$store.commit('UPDATE_LISTS', value);
            }
          }
        },
        components: {
            List,
            draggable,
            Newlist,
        },
        methods: {
          ...mapActions(['loadList', 'moveList']),
        },
        beforeMount() {
            this.loadList();
        }
    })
}

