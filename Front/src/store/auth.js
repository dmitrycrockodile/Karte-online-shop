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
         axios({
            url: 'http://localhost:8876/api/register',
            data: payload,
            method: 'POST'
         })
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
   login({ commit }, payload) {
      return new Promise((resolve, reject) => {
         axios.post("http://localhost:8876/api/login", payload)
            .then(res => {
               const user = res.data.email;
               const token = res.data.remember_token;
   
               localStorage.setItem('user', JSON.stringify(user));
               localStorage.setItem('token', JSON.stringify(token));
   
               commit('AUTH_SUCCESS', user, token);
   
               resolve(res);
            })
            .catch(err => {
               commit('AUTH_ERROR');
               
               reject(err);
            })
      });
   },
   logout({ commit }) {
      return new Promise(resolve => {
         commit('LOGOUT_USER');

         localStorage.removeItem('user');
         localStorage.removeItem('token');

         resolve();
      });
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