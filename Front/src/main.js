import { createApp } from 'vue';
import App from './App.vue';
import axios from 'axios';
import router from './router';
import store from './store';
import Toast from "vue-toastification";

import "vue-toastification/dist/index.css";

const app = createApp(App);

// Initialize WOW.js for animations
new WOW().init();

// Use Vue Router, Vuex Store, and Toast plugin
app.use(router);
app.use(store);
app.use(Toast);

// Axios configuration
axios.defaults.withCredentials = true;
axios.interceptors.response.use(
   response => response,
   err => {
      // Token has expired or user is unauthorized
      if (err.response && err.response.status === 401) {
         store.dispatch('auth/clearExpiredSession');
         router.push({ name: 'login.index' });
      }
      return Promise.reject(err);
   }
);

// Set axios as a global property
app.config.globalProperties.axios = axios;

// Mount the Vue app
app.mount('#app');