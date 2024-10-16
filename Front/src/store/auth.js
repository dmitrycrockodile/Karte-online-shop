import axios from "axios";
import { useToast } from 'vue-toastification'

const toast = useToast()

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

         if (!res.data.verified) {
            toast.info('Please check your email box and verify your email');
         }

         await dispatch('login', { email: payload.email, password: payload.password });

         return res;         
      } catch (err) {
         commit('AUTH_ERROR');
         toast.error(err.response.data.message, { timeout: 2000 });
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
         toast.error(err.response.data.message, { timeout: 2000 });

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
         toast.error(err.response.data.message, { timeout: 2000 });
      }
   },
}

const getters = {
   isAuthenticated: () => !!state.token,
   isUserVerified: () => state.user.email_verified_at !== null,
   getUserData: (state) => state.user,
}

export default {
   namespaced: true, 
   state, 
   mutations, 
   actions,
   getters,
}