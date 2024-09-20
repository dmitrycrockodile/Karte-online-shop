import axios from "axios";

const state = {
   user: JSON.parse(localStorage.getItem('user')) || null,
   token: JSON.parse(localStorage.getItem('token')) || null,
   status: '',
}

const mutations = {
   AUTH_SUCCESS(state, user, token) {
      state.user = user;
      state.token = token;
      state.status = '';
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
   register({ commit, dispatch }, payload) {
      return new Promise((resolve, reject) => {
         axios.post('http://localhost:8876/api/register', payload)
            .then(res => {
               dispatch('login', { email: payload.email, password: payload.password })
                  .then(() => {
                     resolve(res); 
                  })
                  .catch(err => {
                     commit('AUTH_ERROR');
                     reject(err); 
                  });
            })
            .catch(err => {
               commit('AUTH_ERROR');
               reject(err); 
            });
      })
   },
   login({ commit, dispatch }, payload) {
      axios.post("http://localhost:8876/api/login", payload)
         .then(res => {
            if (res.status === 200) {
               const user = {
                  email: res.data.email,
                  id: res.data.id,
               };
               const token = res.data.remember_token;

               localStorage.setItem('user', JSON.stringify(user));
               localStorage.setItem('token', JSON.stringify(token));

               commit('AUTH_SUCCESS', user, token);
               dispatch('cart/fetchCartItems', null, { root: true });
            }
         })
         .catch(err => {
            commit('AUTH_ERROR');
            
            console.error(err)
         })
   },
   async logout({ commit, dispatch }) {
      try {
         await axios.delete('http://localhost:8876/api/logout');
         
         localStorage.removeItem('user');
         localStorage.removeItem('token');

         commit('LOGOUT_USER');
         dispatch('cart/clearCart', null, { root: true });
      } catch(error) {
         console.error(error)
      }
   },
}

const getters = {
   isAuthenticated: () => !!state.token 
}

export default {
   namespaced: true, 
   state, 
   mutations, 
   actions,
   getters,
}