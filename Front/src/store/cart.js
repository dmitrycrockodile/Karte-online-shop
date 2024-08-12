const state = {
   cartItems: JSON.parse(localStorage.getItem('cart')) || [],
};

const mutations = {
   ADD_TO_CART(state, formattedProduct) {
      state.cartItems.push(formattedProduct);
   },
   INCREASE_QTY(state, { product, qty = 1}) {
      const existingItem = state.cartItems.find(item => {
         return item.id === product.id && item.color.id === product.color.id && item.size.id === product.size.id;
      });

      existingItem.qty += qty; 
   },
   DECREASE_QTY(state, cartItem) {
      const existingItem = state.cartItems.find(item => {
         return item.id === cartItem.id && item.color.id === cartItem.color.id && item.size.id === cartItem.size.id;
      });

      existingItem.qty -= 1; 
   },
   REMOVE_FROM_CART(state, cartItem) {
      state.cartItems = state.cartItems.filter(item => !(item.id === cartItem.id && item.color.id === cartItem.color.id && item.size.id === cartItem.size.id));
   },
};

const actions = {
   addToCart({ commit, dispatch, state }, { product, choosenProductOptions }) {
      const existingItem = state.cartItems.find(item => {
         return item.id === product.id && item.color.id === choosenProductOptions.selectedColor.id && item.size.id === choosenProductOptions.selectedSize.id
      });

      if (existingItem) {
         commit('INCREASE_QTY', { product: existingItem, qty: choosenProductOptions.selectedQuantity });
      } else {
         const formattedProduct = {
            id: product.id,
            image: product.preview_image,
            title: product.title,
            price: product.price,
            qty: choosenProductOptions.selectedQuantity,
            color: choosenProductOptions.selectedColor,
            size: choosenProductOptions.selectedSize,
         }

         commit('ADD_TO_CART', formattedProduct);
      }

      dispatch('updateStorage');
   },
   decreaseQty({ commit, dispatch }, {cartItem}) {
      commit('DECREASE_QTY', cartItem);
      dispatch('updateStorage');
   },
   increaseQty({ commit, dispatch }, { product, qty }) {
      commit('INCREASE_QTY', { product, qty });
      dispatch('updateStorage');
   },
   removeFromCart({ commit, dispatch }, cartItem) {
      commit('REMOVE_FROM_CART', cartItem);
      dispatch('updateStorage');
   },
   updateStorage({ state }) {
      localStorage.setItem('cart', JSON.stringify(state.cartItems));
   },
};

const getters = {
   cartItems: state => state.cartItems,
   totalProductsPrice: state => {
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