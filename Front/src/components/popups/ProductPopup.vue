<template>
   <BasePopup :active="active" :closePopup="togglePopup">
         <div 
            v-if="active && product"
            class="quick-view-popup"
            @click.stop
         >
            <div class="container">
               <button @click.prevent="togglePopup" title="Close (Esc)" type="button" class="popup__close-button">×</button>
               <div class="row justify-content-between align-items-center">
               <div class="col-lg-6">
                  <div
                     v-if="!product.product_images.length"
                     class="popup-product-single-image"
                  >
                     <img :src="product.preview_image" :alt="product.title" />
                  </div>

                  <div class="quick-view__left-content">
                     <div class="tabs">
                        <div class="popup-product-thumb-box">
                          <ul v-if="product.product_images">
                            <li
                              v-for="productImage in product.product_images"
                              class="tab-nav popup-product-thumb"
                            >
                              <a :href="`#tabb${productImage.id}`">
                                <img
                                  :src="productImage.url"
                                  :alt="product.title"
                                />
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="popup-product-main-image-box">
                          <div
                            v-for="productImage in product.product_images"
                            :id="`tabb${productImage.id}`"
                            class="tab-item popup-product-image"
                          >
                            <div class="popup-product-single-image">
                              <img
                                :src="productImage.url"
                                :alt="product.title"
                              />
                            </div>
                          </div>
                          <template v-if="product.product_images.length > 1">
                            <button class="prev">
                              <i class="flaticon-back"></i>
                            </button>
                            <button class="next">
                              <i class="flaticon-next"></i>
                            </button>
                          </template>
                        </div>
                      </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="popup-right-content">
                     <h3>{{ product.title }}</h3>
                     <div class="ratting">
                     <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                     <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                     <i class="flaticon-star"></i> <span>(112)</span>
                     </div>
                     <p class="text">
                     {{ product.description }}
                     </p>
                     <div class="price">
                     <h2>
                        ${{ product.price }}
                        <del v-if="!!product.old_price">
                           ${{ product.old_price }} USD</del
                        >
                     </h2>
                     <h6>
                        {{ product.count > 0 ? "In stuck" : "Out of stuck" }}
                     </h6>
                     </div>
                     <div class="color-varient">
                     <a
                        v-for="color in product.colors"
                        :style="`background: ${color.title};`"
                        href="#0"
                        class="color-name"
                     >
                        <span>{{ color.title }}</span>
                     </a>
                     </div>
                     <div class="add-product">
                     <h6>Qty:</h6>
                     <div class="button-group">
                        <div class="qtySelector text-center">
                           <span class="decreaseQty"
                           ><i class="flaticon-minus"></i>
                           </span>
                           <input type="number" class="qtyValue" value="1" />
                           <span class="increaseQty">
                           <i class="flaticon-plus"></i>
                           </span>
                        </div>
                        <button class="btn--primary">Add to Cart</button>
                     </div>
                     </div>
                     <div class="payment-method">
                     <a href="#0">
                        <img
                           src="../assets/images/payment_method/method_1.png"
                           alt=""
                        />
                     </a>
                     <a href="#0">
                        <img
                           src="../assets/images/payment_method/method_2.png"
                           alt=""
                        />
                     </a>
                     <a href="#0">
                        <img
                           src="../assets/images/payment_method/method_3.png"
                           alt=""
                        />
                     </a>
                     <a href="#0">
                        <img
                           src="../assets/images/payment_method/method_4.png"
                           alt=""
                        />
                     </a>
                     </div>
                  </div>
               </div>
               </div>
            </div>
            
         </div>
      </BasePopup>
</template>

<script>
   import BasePopup from './BasePopup.vue';

   export default {
      props: {
         product: Object,
         active: Boolean,
         togglePopup: Function,
      },
      components: {
         BasePopup
      }
   };
</script>

<style> 
.quick-view-popup {
   z-index: 100;
   background: #FFF;
   width: 100vw;
   max-width: 992px;
   margin: 50px auto;
   border-radius: 10px;
   display: block;
}
 
.quick-view-popup .container {
   padding: 30px;
   position: relative;
}
 
.quick-view-popup .popup__close-button {
   overflow: visible;
   cursor: pointer;
   background: transparent;
   border: 0;
   display: block;
   outline: none;
   padding: 0;
   z-index: 1046;
   box-shadow: none;
   touch-action: manipulation;
   width: 44px;
   height: 44px;
   line-height: 44px;
   position: absolute;
   right: 0;
   top: 10px;
   text-decoration: none;
   text-align: center;
   opacity: 0.65;
   color: #000;
   font-style: normal;
   font-size: 28px;
   font-family: Arial, Baskerville, monospace;
   transition: all .2s ease;
}
.quick-view-popup .popup__close-button:hover {
   transition: all .2s ease;
   color: #f69c63;
}
@media (min-width: 1200px) {
   .quick-view-popup .container {
     padding: 40px;
   }
}
@media (min-width: 992px) {
   .quick-view-popup {
     display: block;
   } 
}
</style>