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
    REPLACE_CARD(state, card) {
      let list_index = state.lists.findIndex(list => list.id == card.card_list_id);
      let card_index = state.lists[list_index].cards.findIndex(item => item.id == card.id);
      state.lists[list_index].cards.splice(card_index, 1, card);
    },
    ADD_LIST(state, list) {
      state.lists.push(list);
    },
    REMOVE_LIST(state, list_id) {
      let list_index = state.lists.findIndex(list => list.id == list_id);
      state.lists.splice(list_index, 1);
    },
  },
  actions: {
    removeList({ commit }, list_id) {
      fetch(`/card-lists/${list_id}`, {
        method : 'DELETE',
      }).then((response) => {
        commit('REMOVE_LIST', list_id);
      }).catch((error)=>{
        console.log(error);
      });
    },
    createList({ commit }, list_name) {
      let data = new URLSearchParams();
      data.append('name', list_name);

      fetch(`/card-lists`, {
        method : 'POST',
        body : data,
      }).then((response) => {
        return response.json();
      }).then((jsonData) => {
        commit('ADD_LIST', jsonData);
      }).catch((error)=>{
        console.log(error);
      });
    },
    updateCard({ commit }, { id, name }) {
      let data = new URLSearchParams();
      data.append('name', name);

      fetch(`/cards/${id}`, {
        method : 'PUT',
        body : data,
      }).then((response) => {
        return response.json();
      }).then((jsonData) => {
        commit('REPLACE_CARD', jsonData);
        console.log(jsonData);
      }).catch((error)=>{
        console.log(error);
      });
    },
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
