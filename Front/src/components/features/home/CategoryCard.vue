<template>
   <router-link 
      :to="{ name: 'category.index', params: { id: categoryId } }" 
      :class="`catagory-single ${fullSize ? 'one' : ''} home3cat`"
   > 
      <img
         :src="category.banner"
         :alt="title"
         :class="`background-img bg-img ${fullSize ? 'imgone' : ''}`"
      />
      <div :class="`content ${white ? 'white' : ''}`">
         <div class="row w-100 h-100 align-items-center">
            <div class="col-xl-7 col-md-9">
               <h5 class="wow animated fadeInUp" data-wow-delay="0.2s">
                  {{ keyWord }}
               </h5>
               <h3 class="wow animated fadeInUp" data-wow-delay="0.3s">
                  {{ title }}
               </h3>
               <span
                  class="link wow animated fadeInUp"
                  data-wow-delay="0.4s"
               >
                  explore now
               </span>
            </div>
         </div>
      </div>
   </router-link>
</template>

<script>
   import { getCategory } from '@/services/categoriesService';

   export default {
      props: {
         categoryId: Number,
         title: String,
         keyWord: String,
         fullSize: Boolean,
         white: Boolean
      },
      data() {
         return {
            category: {},
         }
      },
      async mounted() {
         const res = await getCategory(this.categoryId);

         if (res.success) {
            this.category = res.data.category;
         }
      },
   }
</script>

<style>
.catagory4 .catagory-single {
   display: block;
   position: relative;
   overflow: hidden;
}
.catagory4 .catagory-single .bg-img {
   height: unset;
   -webkit-transition: all 0.5s linear;
   transition: all 0.5s linear;
   min-width: 101%;
}
.catagory4 .catagory-single .content {
   position: absolute;
   top: 0px;
   left: 0px;
   width: 100%;
   height: 100%;
   object-fit: cover;
   transform: scale(1);
   transition: all 0.5s linear;
   padding: 40px 40px;
}
.catagory4 .catagory-single .content h5 {
   color: white;
   background-color: #ff858b;
   width: fit-content;
   padding: 5px;
}
.catagory4 .catagory-single .content h5 span {
   color: var(--thm-black);
}
.catagory4 .catagory-single .content h3 {
   padding: 15px 0px 20px;
   font-weight: 500;
   color: #451d1d;
}
.catagory4 .catagory-single .content .link {
   font-weight: 500;
   font-size: 14px;
   text-transform: uppercase;
   color: #000000;
   font-family: "Poppins", sans-serif;
   position: relative;
   display: inline-block;
}
.catagory4 .catagory-single .content .link::before {
   position: absolute;
   top: 100%;
   left: 0px;
   height: 2px;
   width: 0%;
   content: "";
   background: #ff858b;
   z-index: 2;
   transition: width 0.3s linear;
}
.catagory4 .catagory-single .content.white h5 {
   color: var(--thm-white);
}
.catagory4 .catagory-single .content.white h3 {
   color: var(--thm-white);
}
.catagory4 .catagory-single .content.white .link {
   color: var(--thm-white);
}
.catagory4 .catagory-single:hover .link::before {
   width: 100%;
   transition: width 0.3s linear;
}
.catagory4 .catagory-single:hover .background-img {
   transform: scale(1.04);
   transition: all 0.5s linear;
}
@media (max-width: 991px) {
   .catagory4 .catagory-single .imgone {
     height: 300px;
   }
   .catagory4 .catagory-single .content h3 {
     padding: 10px 0px 15px;
   }
}
@media (max-width: 575px) {
   .catagory4 .catagory-single .content h3 {
     padding: 10px 0px 15px;
   }
}
</style>