<template>
   <div :class="`side-cart ${active ? 'active' : ''} d-flex flex-column justify-content-between`" >
      <div class="top">
         <div class="content d-flex justify-content-between align-items-center">
            <h6 class="text-uppercase">Your Cart ({{ cartItems.length }})</h6> 
            <button @click.prevent="$emit('setActive', false)" class="cart-close text-uppercase">X</button>
         </div>
         <div class="cart_items">
            <div v-for="cartItem in cartItems" class="items d-flex justify-content-between align-items-center" :key="cartItem.id">
               <div class="left d-flex align-items-center"> 
                  <a href="shop-details-1.html" class="thumb d-flex justify-content-between align-items-center"> 
                     <img :src="cartItem.image" :alt="cartItem.title"> 
                  </a>
                  <div class="text"> 
                     <a href="shop-details-1.html">
                        <h6>{{ cartItem.title }}</h6>
                     </a>
                     <div>
                        <p>{{ cartItem.quantity }} X <span>${{ cartItem.price }}</span> </p>
                        <span class="cart-item__color" :style="`background-color: ${cartItem.color.title}`"></span>
                        <p>{{ cartItem.size.title }}</p>
                     </div>
                  </div>
               </div>
               <div class="right">
                  <button @click.prevent="removeFromCart(cartItem)" class="item-remove"> 
                     <i class="flaticon-cross"></i> 
                  </button>
               </div>
            </div>
         </div>
      </div>
      <div class="bottom">
         <div class="total-ammount d-flex justify-content-between align-items-center">
            <h6 class="text-uppercase">Total:</h6>
            <h6 class="ammount text-uppercase">${{ totalProductsPrice }}</h6>
         </div>
         <div class="button-box d-flex justify-content-between"> 
            <router-link :to="{ name: 'cart.index'}" @click.native="$emit('setActive', false)" class="btn_black"> View Cart </router-link> 
            <a href="cart.html" class="button-2 btn_theme"> Chekout </a> 
         </div>
      </div>
  </div>
</template>

<script>
   import { mapActions, mapGetters } from 'vuex';

   export default {
      name: 'CartSideMenu',
      computed: {
         ...mapGetters({
            cartItems: 'cart/cartItems',
            totalProductsPrice: 'cart/totalProductsPrice',
         })
      }, 
      methods: {
         ...mapActions({
            removeFromCart: 'cart/removeFromCart',
            gettotalProductsPrice: 'cart/gettotalProductsPrice',
         })
      },
      props: {
         "active": { type: Boolean, required: true, default: false },
      },
      emits: {
         "setActive": { type: Function, required: true },
      },
   }
</script>

<style scoped>
   .text div {
      display: flex;
      align-items: center;
      margin-top: 5px;
   }

   .cart-item__color {
      border: 1px solid #eeeeee;
      border-radius: 5px;
      width: 20px;
      height: 20px;
      margin-left: 10px;
      margin-right: 10px;
   }
</style>