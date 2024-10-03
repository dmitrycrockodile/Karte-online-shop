import { createApp } from 'vue'
import App from './App.vue'
import axios from 'axios'
import router from './router'
import store from './store'


const app = createApp(App)

new WOW().init()

app.use(router)
app.use(store)

//axios config
axios.defaults.withCredentials = true;
axios.interceptors.response.use(
   response => response,
   err => {
      if (err.response && err.response.status === 401) {
         store.commit('auth/LOGOUT_USER');
         store.dispatch('cart/clearLocalCart', null, { root: true });

         router.push({ name: 'login.index' });
         
         console.error("Unauthorized: Redirecting to login page.");
      }

      return Promise.reject(err);
   }
)
app.config.globalProperties.axios = axios;

app.mount('#app')