import axios from "axios";

const state = {
   user: JSON.parse(localStorage.getItem('user')) || null,
   token: JSON.parse(localStorage.getItem('token')) || null,
   status: '',
}

const mutations = {
   AUTH_SUCCESS(state, { token }) {
      state.token = token;
      state.status = '';

      localStorage.setItem('token', JSON.stringify(token));
   }, 
   SET_USER(state, { user }) {
      state.user = user;
      localStorage.setItem('user', JSON.stringify(user));
   },
   AUTH_ERROR(state) {
      state.status = 'error';
   },
   LOGOUT_USER(state) {
      state.user = null;
      state.token = null;
   }
}

const actions = {
   async register({ commit, dispatch }, payload) {
      try {
         const res = await axios.post('http://localhost:8876/api/register', payload);

         await dispatch('login', { email: payload.email, password: payload.password });

         return res;         
      } catch (err) {
         commit('AUTH_ERROR');
         return Promise.reject(err); 
      }
   },
   async login({ commit, dispatch }, payload) {
      try {
         const res = await axios.post("http://localhost:8876/api/login", payload);

         if (res.status === 200) {
            const user = res.data.user;
            const token = res.data.remember_token;

            commit('AUTH_SUCCESS', { token });
            commit('SET_USER', { user });

            await dispatch('cart/fetchCartItems', null, { root: true });
            await dispatch('wishlist/fetchWishlistItems', null, { root: true });

            return res;
         }
      } catch (err) {
         commit('AUTH_ERROR');
         return Promise.reject(err);
      }
   },
   async logout({ commit, dispatch }) {
      try {
         await axios.delete('http://localhost:8876/api/logout');
         
         localStorage.removeItem('user');
         localStorage.removeItem('token');

         commit('LOGOUT_USER');
         dispatch('cart/clearLocalCart', null, { root: true });
         dispatch('wishlist/clearWishList', null, { root: true });
      } catch(err) {
         return Promise.reject(err)
      }
   },
}

const getters = {
   isAuthenticated: () => !!state.token,
   getUserData: (state) => state.user,
}

export default {
   namespaced: true, 
   state, 
   mutations, 
   actions,
   getters,
}