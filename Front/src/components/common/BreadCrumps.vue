<template>
   <div
      class="breadcrumb-area"
      :style="{backgroundImage: `url(${backgroundImageUrl})`}"
   >
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div
               class="breadcrumb-content pb-60 text-center wow fadeInUp animated"
               >
               <h2>{{ title }}</h2>
               <div class="breadcrumb-menu">
                  <ul>
                     <li>
                     <router-link :to="{ name: 'main' }">
                        <i class="flaticon-home pe-2"></i>
                        Home
                     </router-link>
                     </li>
                     <li><i class="flaticon-next"></i></li>
                     <li class="active">{{ title }}</li>
                  </ul>
               </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
   import defaultBackgroundUrl from '@/assets/images/inner-pages/breadcum-bg.png';

   export default {
      name: 'Breadcrumps',
      props: {
         backgroundImageUrl: { type: String, default: defaultBackgroundUrl },
         title: { type: String, required: true },
      }
   }
</script>