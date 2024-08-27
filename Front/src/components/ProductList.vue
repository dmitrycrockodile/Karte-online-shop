<template>
   <div
      v-if="products.length && !isLoading"
      v-for="product in products"
      :class="columnsClass"
   >

      <ProductCard :product="product" :key="product.id" />
      
   </div>
   <div v-if="isLoading" class="skeletons">
      <!-- SKELETONS... -->
      <Skeleton width="300px" height="350px" borderRadius="10px" />
      <Skeleton width="300px" height="350px" borderRadius="10px" />
      <Skeleton width="300px" height="350px" borderRadius="10px" />
      <Skeleton v-if="columns == 4" width="300px" height="350px" borderRadius="10px" />
   </div>
</template>

<script>
   import ProductCard from "@/components/ProductCard.vue";
   import Skeleton from "@/components/Skeleton.vue";

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
      },
      computed: {
         columnsClass() {
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
</style>