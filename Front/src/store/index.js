import { createStore } from "vuex";

import cartModule from './cart';
import authModule from "./auth";
import categoriesModule from './categories';
import wishlistModule from "./wishlist";
import compareModule from "./compare";

export default createStore({
   modules: {
      cart: cartModule,
      auth: authModule,
      categories: categoriesModule,
      wishlist: wishlistModule,
      compare: compareModule
   }
});