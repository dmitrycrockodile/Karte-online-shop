const state = {
   categories: JSON.parse(localStorage.getItem('categories')) || [],
};

const mutations = {
   SET_CATEGORIES(state, categories) {
      state.categories = categories;
   },
};

const actions = {
   setCategories({ commit, dispatch }, categories) {
      commit('SET_CATEGORIES', categories);
      dispatch('updateStorage');
   },
   updateStorage({ state }) {
      localStorage.setItem('categories', JSON.stringify(state.categories));
   },
};

const getters = {
   categories: state => state.categories,
};

export default {
   namespaced: true,
   state,
   mutations,
   actions,
   getters,
};