import { createStore } from "vuex";

import cartModule from './cart';

export default createStore({
   modules: {
      cart: cartModule,
   }
})