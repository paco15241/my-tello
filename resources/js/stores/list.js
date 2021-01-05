import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    lists: [],
  },
  getters: {
    lists: state => state.lists,
  },
  mutations: {
    UPDATE_LISTS(state, lists) {
      state.lists = lists;
    },
  },
  actions: {
    moveList( { commit, state }, event) {
      let data = new URLSearchParams();
      data.append('position', event.moved.newIndex+1);
      
      fetch(`/card-lists/${state.lists[event.moved.newIndex].id}/move`, {
          method : 'PUT',
          body : data,
        }).then((response) => {
          return response.json();
        }).then((jsonData) => {
          console.log(jsonData);
        }).catch((error)=>{
          console.log(error);
        });
    },
    loadList({ commit }) {
      fetch('/card-lists', {
        method : 'GET',
      }).then((response) => {
        return response.json();
      }).then((jsonData) => {
        commit('UPDATE_LISTS', jsonData);
      }).catch((error)=>{
        console.log(error);
      });
    }
  },
});
