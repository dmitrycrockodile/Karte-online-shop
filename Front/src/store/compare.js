import { useToast } from "vue-toastification";

const toast = useToast();

const state = {
   comparedProducts: JSON.parse(localStorage.getItem('comparedProducts')) || [],
};

const mutations = {
   ADD_TO_COMPARE(state, product) {
      state.comparedProducts.push(product);
   },
   REMOVE_FROM_COMPARE(state, productId) {
      state.comparedProducts = state.comparedProducts.filter(compared => compared.id !== productId);
   },
   CLEAR_COMPARE(state) { 
      state.comparedProducts = []; 
   }
};

const actions = {
   addToCompare({ commit, dispatch, state }, product) {
      if (state.comparedProducts.length === 2) {
         toast.info('There can be only 2 products in the compare list', 2000);
         return;
      }

      if (!state.comparedProducts.find(compared => compared.id === product.id)) {
         commit('ADD_TO_COMPARE', product);
         toast.info('Product added to the compare list', { timeout: 2000 });
      } else {
         toast.error('This product is already in the compare list', { timeout: 2000 });
      }
      dispatch('updateStorage');
   },
   removeFromCompare({ commit, dispatch }, productId) {
      commit('REMOVE_FROM_COMPARE', productId);
      dispatch('updateStorage');
   },
   clearCompare({ commit, dispatch }) { 
      commit('CLEAR_COMPARE'); 
      localStorage.removeItem('comparedProducts');
   },
   updateStorage({ state }) {
      localStorage.setItem('comparedProducts', JSON.stringify(state.comparedProducts));
   },
};

const getters = {
   comparedProducts: state => state.comparedProducts,
};

export default {
   namespaced: true,
   state, 
   mutations,
   actions,
   getters,
};