<template>
   <div class="review-one__single-content">
      <div class="review-one__aurthor">
         <div class="thumb">
            <img :src="icon" :alt="name" />
         </div>
         <span class="quate">
            <i class="flaticon-right-quotes-symbol"></i>
         </span>
      </div>
      <div class="review-one__review-text">
         <slot></slot>
        <h4>{{ name }}</h4>
        <span>{{ job }}</span>
      </div>
   </div>
</template>

<script>
   export default {
      name: 'Testimonial Card',
      props: {
         icon: String,
         name: String,
         job: String
      }
   }
</script>