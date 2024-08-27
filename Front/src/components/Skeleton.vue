<template>
   <div class="skeleton" :style="style"></div>
</template>

<script>
export default {
   props: {
      width: {
         type: String,
         default: '100%',
      },
      height: {
         type: String,
         default: '20px',
      },
      borderRadius: {
         type: String,
         default: '4px',
      },
   },
   computed: {
      style() {
         return {
         width: this.width,
         height: this.height,
         borderRadius: this.borderRadius,
         background: 'linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%)',
         backgroundSize: '200% 100%',
         animation: 'skeleton-loading 1.5s infinite',
         };
      },
   },
};
</script>

<style>
@keyframes skeleton-loading {
   0% {
      background-position: 200% 0;
   }
   100% {
      background-position: -200% 0;
   }
}
</style>