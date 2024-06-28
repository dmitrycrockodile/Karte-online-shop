const state = {
   cartItems: JSON.parse(localStorage.getItem('cart')) || [],
};

const mutations = {
   ADD_TO_CART(state, { product, selectedQuantity }) {
      const existingItem = state.cartItems.find(item => item.id === product.id);

      if (existingItem) {
         existingItem.qty += selectedQuantity;
      } else {
         const formattedProduct = {
            id: product.id,
            image: product.preview_image,
            title: product.title,
            price: product.price,
            qty: selectedQuantity,
         }

         state.cartItems.push(formattedProduct);
      }
   },
   REMOVE_FROM_CART(state, id) {
      state.cartItems = state.cartItems.filter(item => item.id !== id);
   },
};

const actions = {
   addToCart({ commit, dispatch }, payload) {
      commit('ADD_TO_CART', payload);
      dispatch('updateStorage');
   },
   removeFromCart({ commit, dispatch }, id) {
      commit('REMOVE_FROM_CART', id);
      dispatch('updateStorage');
   },
   updateStorage({ state }) {
      localStorage.setItem('cart', JSON.stringify(state.cartItems));
   },
};

const getters = {
   cartItems: state => state.cartItems,
   totalPrice: state => {
      const total = state.cartItems.reduce((total, item) => {
         return total + item.price * item.qty;
      }, 0);

      return total.toFixed(2);
   },
};

export default {
   namespaced: true,
   state,
   mutations,
   actions,
   getters,
};