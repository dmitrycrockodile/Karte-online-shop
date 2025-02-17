import axios from "axios";

const state = {
   wishedItems: JSON.parse(localStorage.getItem('wishlist')) || [],
};

const mutations = {
   SET_WISHLIST_ITEMS(state, items) {
      state.wishedItems = items;
   },
   ADD_TO_WISHLIST(state, item) {
      state.wishedItems.push(item);
   },
   REMOVE_FROM_WISHLIST(state, itemId) {
      state.wishedItems = state.wishedItems.filter(wishedItem => wishedItem.id !== itemId);
   },
};

const actions = {
   async toggleWishlistItem({ commit, dispatch, rootGetters, state }, productId) {
      if (state.wishedItems.some(item => item.product_id === productId)) {
         const existingItemId = state.wishedItems.find(item => item.product_id === productId).id;

         try {
            await axios.delete(`http://localhost:8876/api/wishlist/${existingItemId}`);

            commit('REMOVE_FROM_WISHLIST', existingItemId);
         } catch (error) {
            console.error(error)
         }   
      } else {
         const userId = rootGetters['auth/getUserData'].id;

         try {
            const res = await axios.post('http://localhost:8876/api/wishlist', {
               'product_id': productId,
               'user_id': userId,
            })
            commit('ADD_TO_WISHLIST', res.data.data.item);
         } catch (error) {
            console.error(error)
         }   
      }

      dispatch('updateStorage');
   },
   async removeFromWishlist({ commit, dispatch }, id) {
      try {
         await axios.delete(`http://localhost:8876/api/wishlist/${id}`);

         commit('REMOVE_FROM_WISHLIST', id)

         dispatch('updateStorage');
      } catch (error) {
         console.error(error);
      }
   },
   async fetchWishlistItems({ commit, dispatch }) {
      try {
         const wishedItems = await axios.get('http://localhost:8876/api/wishlist');
         
         if (wishedItems.status === 200) {
            commit('SET_WISHLIST_ITEMS', wishedItems.data.data.wishlist);

            dispatch('updateStorage');
         }
      } catch (err) {
         console.error(err)
      }
   },
   clearWishList({ commit }) {
      commit('SET_WISHLIST_ITEMS', []);
      localStorage.removeItem('wishlist');
   },
   updateStorage({ state }) {
      localStorage.setItem('wishlist', JSON.stringify(state.wishedItems));
   },
};

const getters = {
   wishlistItems: state => state.wishedItems,
};

export default {
   namespaced: true,
   state,
   mutations,
   actions,
   getters,
};