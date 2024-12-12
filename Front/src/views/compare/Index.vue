<template>
   <main class="overflow-hidden">
      <section
         class="breadcrumb-area"
         :style="`background-image: url(${CompareBGImage})`"
      >
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="breadcrumb-content text-center wow fadeInUp animated">
                     <h2>Compare</h2>
                     <div class="breadcrumb-menu">
                        <ul>
                           <li>
                              <a href="index.html">
                                 <i class="flaticon-home pe-2"></i>
                                 Home
                              </a>
                           </li>
                           <li><i class="flaticon-next"></i></li>
                           <li class="active">Compare</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="compare pt-120 pb-120">
         <div class="container">
            <div class="row">
               <div class="col-xl-12 wow fadeInUp animated">
                  <div class="compare-table-box">
                     <div class="compare-table-outer">
                        <table class="compare-table">
                           <thead :class="
                                       `
                                       compare-header 
                                       ${comparedProducts.length === 2 ? 'full-table' : ''} 
                                       ${comparedProducts.length === 1 ? 'single-item' : ''}
                                       `
                           ">
                              <tr>
                                 <th>
                                    <p>Product</p>
                                 </th>
                                 <th v-if="comparedProducts" v-for="product in comparedProducts" class="image">
                                    <div class="compare-product-img-1">
                                       <img
                                          :src="product.preview_image"
                                          :alt="product.title"
                                       />
                                    </div>
                                 </th>
                              </tr>
                           </thead>
                           <tbody :class="`${comparedProducts.length === 2 ? 'full-table' : ''} ${comparedProducts.length === 1 ? 'single-item' : ''}`">
                              <tr>
                                 <td>
                                    <h5>Name</h5>
                                 </td>
                                 <td v-if="comparedProducts" v-for="product in comparedProducts">
                                    <h5>{{ product.title }}</h5>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <h5>Description</h5>
                                 </td>
                                 <td v-if="comparedProducts" v-for="product in comparedProducts">
                                    <p>{{ product.description }}</p>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <h5>Price</h5>
                                 </td>
                                 <td v-if="comparedProducts" 
                                     v-for="product in comparedProducts" 
                                     class="price"
                                 >
                                     ${{ product.price }}
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <h5>Stock</h5>
                                 </td>
                                 <td v-if="comparedProducts" 
                                     v-for="product in comparedProducts" 
                                     class="color"
                                 >
                                    {{ product.count > 0 ? 'In stock' : 'Not in stock' }}
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <h5>Add to cart</h5>
                                 </td>
                                 <td v-if="comparedProducts" v-for="product in comparedProducts">
                                    <router-link :to="{ name: 'products.show', params: { id: product.id } }" class="btn--primary style2">Add To Cart</router-link>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <h5>Rating</h5>
                                 </td>
                                 <td v-if="comparedProducts" v-for="product in comparedProducts">
                                    <AverageStarRating :rating="product.average_rating" />
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <h5>Delete</h5>
                                 </td>
                                 <td v-if="comparedProducts" v-for="product in comparedProducts">
                                    <div class="delete-box">
                                       <button @click.prevent="removeFromCompare(product.id)"><i class="flaticon-delete"></i></button>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>
</template>

<script>
   import { mapActions, mapGetters } from "vuex";
   import AverageStarRating from "@/components/features/reviews/AverageStarRating.vue";
   import CompareBGImage from "@/assets/images/inner-pages/compare_bg.jpg";

   export default {
      name: 'Compare',
      data() {
         return {
            CompareBGImage
         }
      },
      components: {
         AverageStarRating
      },
      computed: {
         ...mapGetters({
            comparedProducts: 'compare/comparedProducts'
         }),
      },
      methods: {
         ...mapActions({
            removeFromCompare: 'compare/removeFromCompare',
         })
      },
   };
</script>

<style lang="scss" scoped>

</style>