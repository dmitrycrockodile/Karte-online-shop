<template>
   <div
      v-if="products.length && !isLoading"
      v-for="product in products"
      :class="columnsClass"
      :key="product.id"
   >

      <ProductCard :product="product" :key="product.id" :type="type" />
      
   </div>
   <div v-if="isLoading" class="skeletons">
      <!-- SKELETONS... -->
      <div v-if="type === 'basic'" style="display: flex; justify-content: space-between; width: 100%;">
         <Skeleton width="300px" height="350px" borderRadius="10px" />
         <Skeleton width="300px" height="350px" borderRadius="10px" />
         <Skeleton width="300px" height="350px" borderRadius="10px" />
         <Skeleton v-if="columns == 4" width="300px" height="350px" borderRadius="10px" />
      </div>
      <div v-else class="center-skeletons">
         <Skeleton width="1000px" height="300px" borderRadius="10px" />
      </div>
   </div>
</template>

<script>
   import ProductCard from "@/components/features/product/ProductCard.vue";
   import Skeleton from "@/components/base/Skeleton.vue";

   export default {
      name: "Product List",
      components: {
         ProductCard,
         Skeleton,
      },
      props: {
         "products": { type: Array },
         "columns": { type: Number, default: 3 },
         "isLoading": { type: Boolean, default: true },
         "type": { type: String, default: 'basic' },
      },
      computed: {
         columnsClass() {
            if (this.type === 'advanced') return "product-grid-two list mt-30";
            if (this.columns === 3) return "col-xl-4 col-lg-6 col-6";
            if (this.columns === 4) return "col-xl-3 col-lg-4 col-6";
         }
      },
   }
</script>

<style lang="scss" scoped>
.skeletons {
   display: flex;
   justify-content: space-between;
   align-items: center;
   margin-top: 50px
}

.center-skeletons {
   margin: 0 auto;
   max-width: 100%;
   overflow: hidden;
}
</style>