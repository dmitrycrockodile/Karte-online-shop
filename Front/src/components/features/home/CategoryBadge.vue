<template>
   <div class="categories-three__list-item-inner">
      <router-link :to="{ name: 'category.index', params: { id: categoryId } }" class="img-box">
         <img
            :src="category.preview_image"
            :alt="category.title"
         />
         <div class="text"><span>{{ category.products_count }} Items</span></div>
      </router-link>
      <div class="title text-center">
         <h4>
            <router-link :to="{ name: 'category.index', params: { id: categoryId } }">
               {{ category.title }}
            </router-link>
         </h4>
      </div>
   </div>
</template>

<script>
   import { getCategory } from '@/services/categoriesService';

   export default {
      name: 'Category Badge',
      props: {
         categoryId: Number
      },
      data() {
         return {
            category: {},
         }
      },
      async mounted() {
         const res = await getCategory(this.categoryId);

         if (res.success) {
            this.category = res.category;
         }
      },
   }
</script>