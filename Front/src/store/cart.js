import axios from "axios";
import { useToast } from 'vue-toastification';

const toast = useToast();

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
      const existingItem = state.cartItems.find(item => 
         item.id === cartItem.id && 
         item.color.id === cartItem.color.id &&
         item.size.id === cartItem.size.id
      );

      if(existingItem) { 
         existingItem.quantity += quantity; 
      }
   },
   DECREASE_QTY(state, cartItem) {
      const existingItem = state.cartItems.find(item => 
         item.id === cartItem.id && 
         item.color.id === cartItem.color.id && 
         item.size.id === cartItem.size.id
      );

      if(existingItem) { 
         existingItem.quantity -= 1; 
      }
   },
   SET_ITEM_TOTAL_PRICE(state, { cartItem, totalPrice, method }) {
      const existingItem = state.cartItems.find(item => 
         item.id === cartItem.id && 
         item.color.id === cartItem.color.id && 
         item.size.id === cartItem.size.id
      );

      console.log

      if (existingItem && existingItem.total_price && method === 'INC') { 
         existingItem.total_price += totalPrice;
         return existingItem.total_price;
      } else if (existingItem && existingItem.total_price && method === 'DEC') {
         existingItem.total_price -= totalPrice;
         return existingItem.total_price;
      } else if (existingItem && !existingItem.total_price) {
         existingItem.total_price = totalPrice;
         return existingItem.total_price;
      }
   },
   REMOVE_FROM_CART(state, cartItem) {
      state.cartItems = state.cartItems.filter(item => 
         !(item.id === cartItem.id && 
           item.color.id === cartItem.color.id && 
           item.size.id === cartItem.size.id)
      );
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
         const itemToAdd = response.data.cartItem;
         
         if (itemToAdd.quantity !== choosenProductOptions.selectedQuantity) {
            dispatch('setItemTotalPrice', { cartItem: itemToAdd, quantity: choosenProductOptions.selectedQuantity, method: 'INC' });
            commit('INCREASE_QTY', { cartItem: itemToAdd, quantity: choosenProductOptions.selectedQuantity })
         } else {
            dispatch('setItemTotalPrice', { cartItem: itemToAdd, quantity: itemToAdd.quantity, method: 'INC' });
            commit('ADD_TO_CART', itemToAdd);
         }

         toast.success(response.data.message, { timeout: 2000 });
         dispatch('updateStorage');
      } catch (error) {
         toast.error(error.response.data.message, { timeout: 2000 })
      }   
   },
   async removeFromCart({ commit, dispatch }, cartItem) {
      try {
         const res = await axios.delete(`http://localhost:8876/api/cart/${cartItem.id}`);

         commit('REMOVE_FROM_CART', cartItem)
         toast.success(res.data.message, { timeout: 2000 })

         dispatch('updateStorage');
      } catch (err) {
         toast.error(err.response.data.message, { timeout: 2000 })
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
            dispatch('setItemTotalPrice', { cartItem, quantity: 1, method: 'DEC' });

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
            dispatch('setItemTotalPrice', { cartItem, quantity, method: 'INC' });

            commit('INCREASE_QTY', { cartItem, quantity });
            dispatch('updateStorage');
         }
      } catch (error) {
         console.error(error)
      } 
   },
   setItemTotalPrice({ commit }, { cartItem, quantity = 1, method = 'INC' }) {
      let totalPrice = Number((cartItem.price * quantity).toFixed(2));

      commit('SET_ITEM_TOTAL_PRICE', { cartItem, totalPrice, method });
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
   clearLocalCart({ commit }) {
      commit('SET_CART_ITEMS', []);
      localStorage.removeItem('cart');
   },
   async clearGlobalCart({ dispatch }) {
      try {
         const res = await axios.delete('http://localhost:8876/api/cart/clear');

         dispatch('clearLocalCart');
         dispatch('updateStorage');
      } catch (err) {
         console.error(err)
      }
   },
   updateStorage({ state }) {
      localStorage.setItem('cart', JSON.stringify(state.cartItems));
   },
};

const getters = {
   cartItems: state => state.cartItems,
   totalProductsPrice: state => {
      const total = state.cartItems.reduce((total, item) => {
         return total + item.total_price;
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