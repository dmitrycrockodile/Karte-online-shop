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
                     <h3>Oops! It seems like you are not allowed to be here.</h3>
                     <p class="w-50 d-inline-block">
                        If you are curios why is it so, feel free to contact our support team by this email address: karte_support@gmail.com or using the link below. 
                        Maybe try one of the links below or a search?
                     </p>
                     <div class="btn-box"> 
                        <router-link :to="{ name: 'contact.index' }" class="btn--primary style2">Contact Us</router-link> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</template>

<script>

</script>

<style>
.error-page__img {
   width: auto;
   height: 440px;
}
</style>