<template>
   <main class="overflow-hidden">
      <BreadCrumps 
        :backgroundImageUrl="contacBGImage"
        :title="'Contact Us'"
      />
      
      <section class="contact-page-info pt-120 pb-60">
         <div class="container">
         <div class="row mt--30">
            <div class="col-xl-4 col-lg-6 wow fadeInUp animated">
               <div class="contact-page-info__single mt-30">
               <div class="thumb">
                  <img src="../../assets/images/inner-pages/location.png" alt="" />
               </div>
               <div class="contact-box">
                  <h4>Address</h4>
                  <p class="text1">272 Rodney St, Brooklyn, NY 11211</p>
                  <p class="text2">76 East Houston Street <br />New York City</p>
               </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-6 wow fadeInUp animated">
               <div class="contact-page-info__single mt-30">
               <div class="thumb">
                  <img src="../../assets/images/inner-pages/contact.png" alt="" />
               </div>
               <div class="contact-box">
                  <h4>Contact</h4>
                  <ul>
                     <li>
                     <p>Mobile: <a href="tel:123456789">068 26589 996</a></p>
                     </li>
                     <li>
                     <p>Hotline: <a href="tel:123456789">1900 26886</a></p>
                     </li>
                     <li>
                     <p>
                        E-mail:
                        <a href="mailto:yourmail@email.com">info@google.com</a>
                     </p>
                     </li>
                  </ul>
               </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-6 wow fadeInUp animated">
               <div class="contact-page-info__single mt-30">
               <div class="thumb">
                  <img src="../../assets/images/inner-pages/clockt.png" alt="" />
               </div>
               <div class="contact-box">
                  <h4>Office Hour</h4>
                  <p class="text1">Monday - Friday: 08:30 - 20:00</p>
                  <p class="text2">
                     Saturday & Sunday: 09:30 -<br />
                     21:30
                  </p>
               </div>
               </div>
            </div>
         </div>
         </div>
      </section>
      <!--End Contact Page Info-->
      <!-- Contact box Start -->
      <section class="contact-box pt-60 pb-120">
         <div class="container">
         <div
            class="row g-0 background align-items-center wow fadeInUp animated"
         >
            <div class="col-lg-5">
               <Map :lat="52.245460510253906" :lng="16.848663330078125" />
            </div>
            <div class="col-lg-7">
               <ContactForm />
            </div>
         </div>
         </div>
      </section>
      <!-- Contact box End -->
   </main>
</template>

<script>
   import ContactForm from "@/components/common/ContactForm.vue"; 
   import Map from "@/components/common/Map.vue";
   import BreadCrumps from "@/components/common/BreadCrumps.vue";

   import contacBGImage from "@/assets/images/inner-pages/contact-us_bg.jpg";

   export default {
      name: "Contact us",
      components: {
         ContactForm,
         Map,
         BreadCrumps,
      },
      data() {
         return {
            contacBGImage,
         };
      },
   };
</script>

<style lang="scss" scoped>

</style>