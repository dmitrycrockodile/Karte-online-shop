<template>
   <main class="overflow-hidden">
      <BreadCrumps 
         :backgroundImageUrl="wishlistBGImage"
         :title="'Wishlist'"
      />
      
      <section class="wishlist pt-120 pb-120">
         <div class="container">
            <div class="row">
               <div class="col-xl-12 wow fadeInUp animated">
               <div v-if="wishlistItems.length" class="wishlist-table-box">
                  <div class="wishlist-table-outer">
                     <table class="wishlist-table">
                        <thead class="wishlist-header">
                        <tr>
                           <th>Image</th>
                           <th>Product</th>
                           <th>Price</th>
                           <th>Stock Status</th>
                           <th>Add to cart</th>
                           <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in wishlistItems" :key="item.id">
                           <td>
                              <div class="wishlist-thumb">
                              <img
                                 :src="`${item.image}`"
                                 alt=""
                              />
                              </div>
                           </td>
                           <td>
                              <h5>{{ item.title }}</h5>
                           </td>
                           <td>
                              <p class="price">${{ item.price }}</p>
                           </td>
                           <td>
                              <p class="instock">{{ !!item.amount ? 'In Stock' : 'Not in stock'}}</p>
                           </td>
                           <td class="add-to-cart-btn">
                              <router-link :to="{ name: 'products.show', params: { id: item.product_id} }" class="btn--primary style2">
                                 Add To Cart
                              </router-link>
                           </td>
                           <td>
                              <button @click.prevent="() => removeFromWishlist(item.id)" class="remove"><i class="flaticon-cross"></i></button>
                           </td>
                        </tr>
                        
                        </tbody>
                        </table>
                     </div>
                  </div>
                  <h5 v-if="!wishlistItems.length">No wished items for now...</h5>
               </div>
            </div>
         </div>
      </section>
   </main>
</template>

<script>
   import { mapGetters, mapActions } from 'vuex';
   import BreadCrumps from '@/components/common/BreadCrumps.vue';
   import wishlistBGImage from "@/assets/images/inner-pages/wishlist.jpg";

   export default {
      name: 'Wishlist',
      components: {
         BreadCrumps,
      },
      data() {
         return {
            wishlistBGImage
         }
      },
      computed: {
         ...mapGetters({
            wishlistItems: "wishlist/wishlistItems",
         }),
      },
      methods: {
         ...mapActions({
            removeFromWishlist: "wishlist/removeFromWishlist"
         })
      },
   };
</script>