import axios from "axios";

const state = {
   cartItems: JSON.parse(localStorage.getItem('cart')) || [],
};

const mutations = {
   SET_CART_ITEMS(state, items) {
      state.cartItems = items
   },
   ADD_TO_CART(state, cartItem) {
      state.cartItems.push(cartItem);
   },
   INCREASE_QTY(state, { cartItem, quantity = 1}) {
      const existingItem = state.cartItems.find(item => {
         return item.id === cartItem.id && item.color.id === cartItem.color.id && item.size.id === cartItem.size.id;
      });

      existingItem.quantity += quantity; 
   },
   DECREASE_QTY(state, cartItem) {
      const existingItem = state.cartItems.find(item => {
         return item.id === cartItem.id && item.color.id === cartItem.color.id && item.size.id === cartItem.size.id;
      });

      existingItem.quantity -= 1; 
   },
   REMOVE_FROM_CART(state, cartItem) {
      state.cartItems = state.cartItems.filter(item => !(item.id === cartItem.id && item.color.id === cartItem.color.id && item.size.id === cartItem.size.id));
   },
};

const actions = {
   async addToCart({ commit, dispatch }, {product, choosenProductOptions}) {
      try {
         const response = await axios.post('http://localhost:8876/api/cart', {
            'product_id': product.id,
            'quantity': choosenProductOptions.selectedQuantity,
            'attributes': { color: choosenProductOptions.selectedColor, size: choosenProductOptions.selectedSize},
         })
         
         if (response.data.cartItem.quantity !== choosenProductOptions.selectedQuantity) {
            commit('INCREASE_QTY', { cartItem: response.data.cartItem, quantity: choosenProductOptions.selectedQuantity })
         } else {
            commit('ADD_TO_CART', response.data.cartItem);
         }

         dispatch('updateStorage');
      } catch (error) {
         console.error(error)
      }   
   },
   async removeFromCart({ commit, dispatch }, cartItem) {
      try {
         await axios.delete(`http://localhost:8876/api/cart/${cartItem.id}`);

         commit('REMOVE_FROM_CART', cartItem)

         dispatch('updateStorage');
      } catch (error) {
         console.error(error);
      }
   },
   async decreaseQty({ commit, dispatch }, cartItem) {
      try {
         const response = await axios.put(`http://localhost:8876/api/cart/${cartItem.id}`, {
            'product_id': cartItem.product_id,
            'quantity': -1,
            'attributes': { color: cartItem.color, size: cartItem.size},
         });

         if (response.status === 200) {
            commit('DECREASE_QTY', cartItem);
            dispatch('updateStorage');
         }
      } catch (error) {
         console.error(error)
      }
   },
   async increaseQty({ commit, dispatch }, { cartItem, quantity }) {
      try {
         const response = await axios.put(`http://localhost:8876/api/cart/${cartItem.id}`, {
            'product_id': cartItem.product_id,
            'quantity': quantity,
            'attributes': { color: cartItem.color, size: cartItem.size},
         });

         if (response.status === 200) {
            commit('INCREASE_QTY', { cartItem, quantity });
            dispatch('updateStorage');
         }
      } catch (error) {
         console.error(error)
      } 
   },
   async fetchCartItems({ commit, dispatch }) {
      try {
         const cartItems = await axios.get('http://localhost:8876/api/cart');
         
         if (cartItems.status === 200) {
            commit('SET_CART_ITEMS', cartItems.data.data);

            dispatch('updateStorage');
         }
      } catch (error) {
         console.error(error);
      }
   },
   clearCart({ commit }) {
      commit('SET_CART_ITEMS', []);
      localStorage.removeItem('cart');
   },
   updateStorage({ state }) {
      localStorage.setItem('cart', JSON.stringify(state.cartItems));
   },
};

const getters = {
   cartItems: state => state.cartItems,
   totalProductsPrice: state => {
      const total = state.cartItems.reduce((total, item) => {
         return total + item.price * item.quantity;
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