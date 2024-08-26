<template>
   <div
      v-for="product in products"
      :class="columnsClass"
   >

      <ProductCard :product="product" :key="product.id" />
      
   </div>
</template>

<script>
   import ProductCard from "@/components/ProductCard.vue";

   export default {
      name: "Product List",
      components: {
         ProductCard,
      },
      props: {
         "products": { type: Array },
         "columns": { type: Number, default: 3 },
      },
      computed: {
         columnsClass() {
            if (this.columns === 3) return "col-xl-4 col-lg-6 col-6";
            if (this.columns === 4) return "col-xl-3 col-lg-4 col-6";
         }
      },
   }
</script>