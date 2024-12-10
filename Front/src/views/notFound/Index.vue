<template>
   <section class="error-page">
      <div class="container">
         <div class="row align-items-center justify-content-center">
            <div class="col-xl-12">
               <div class="error-page__inner text-center pt-60 pb-120">
                  <div class="thumb wow fadeInUp animated"> 
                     <img class="error-page__img" src="@/assets/images/inner-pages/notFoundImage.png" alt="NotFound">
                  </div>
                  <div class="error-page__content wow fadeInUp animated">
                     <h3>Oops! That page can’t be found.</h3>
                     <p>
                        It looks like nothing was found at this location. 
                        Maybe try one of the links below or a search?
                     </p>
                     <div class="btn-box"> 
                        <router-link :to="{ name: 'products.index' }" class="btn--primary style2">Products Page</router-link> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
  </section>
</template>

<script>
   export default {
      
   }
</script>

<style>
.error-page__img {
   width: auto;
   height: 440px;
}
</style>