<template>
   <div class="star-rating__container">
      <div class="star-rating" :style="{ width: starRatingWidth }"></div>
   </div>
</template>

<script>
   import { MAX_PRODUCT_RATING } from "@/utils/constants";

   export default {
      name: 'Average Star Rating',
      props: {
         "rating": { type: Number, required: true },
      },
      computed: {
         starRatingWidth() {
            return (this.rating / MAX_PRODUCT_RATING * 100) + "%";
         },  
      },
   }
</script>

<style lang="scss" scoped>
.star-rating__container {
   position: relative;
   font-size: 20px;
   display: inline-block;
}
 
.star-rating__container::before {
   content: "\f005 \f005 \f005 \f005 \f005";
   font-family: 'Font Awesome 6 Free';
   font-weight: 600;
   color: #74787c;
}

.star-rating {
   position: absolute;
   top: 0;
   left: 0;
   width: 0;
   overflow: hidden;
}
 
.star-rating::before { 
   content: "\f005 \f005 \f005 \f005 \f005";
   font-family: 'Font Awesome 6 Free';
   color: #f69c63;
   font-weight: 600;
}
</style>