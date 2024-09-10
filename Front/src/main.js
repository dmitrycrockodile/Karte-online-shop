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
         window.location.href = '/login';
      }

      return err;
   }
)
app.config.globalProperties.axios = axios

app.mount('#app')