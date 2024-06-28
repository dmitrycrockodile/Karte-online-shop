<template>
   <div class="side-cart d-flex flex-column justify-content-between">
      <div class="top">
         <div class="content d-flex justify-content-between align-items-center">
            <h6 class="text-uppercase">Your Cart ({{ cartItems.length }})</h6> <span class="cart-close text-uppercase">X</span>
         </div>
         <div class="cart_items">
            <div v-for="cartItem in cartItems" class="items d-flex justify-content-between align-items-center">
               <div class="left d-flex align-items-center"> 
                  <a href="shop-details-1.html" class="thumb d-flex justify-content-between align-items-center"> 
                     <img :src="cartItem.image" :alt="cartItem.title"> 
                  </a>
                  <div class="text"> 
                     <a href="shop-details-1.html">
                        <h6>{{ cartItem.title }}</h6>
                     </a>
                     <p>{{ cartItem.qty }} X <span>${{ cartItem.price }}</span> </p>
                  </div>
               </div>
               <div class="right">
                  <button @click.prevent="removeFromCart(cartItem.id)" class="item-remove"> 
                     <i class="flaticon-cross"></i> 
                  </button>
               </div>
            </div>
         </div>
      </div>
      <div class="bottom">
         <div class="total-ammount d-flex justify-content-between align-items-center">
            <h6 class="text-uppercase">Total:</h6>
            <h6 class="ammount text-uppercase">${{ totalPrice }}</h6>
         </div>
         <div class="button-box d-flex justify-content-between"> 
            <a href="cart.html" class="btn_black"> View Cart </a> 
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
            totalPrice: 'cart/totalPrice',
         })
      },
      methods: {
         ...mapActions({
            removeFromCart: 'cart/removeFromCart',
            getTotalPrice: 'cart/getTotalPrice',
         })
      },
   }
</script>

<style lang="scss" scoped>

</style>