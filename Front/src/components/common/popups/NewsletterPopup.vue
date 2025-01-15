<template>
   <BasePopup :active="active" :closePopup="closePopup">
      <div id="newsLetter-popup" class="p-4" role="dialog" @click.stop>
         <button @click.prevent="closePopup" title="Close (Esc)" type="button" class="mfp-close">×</button>
         <div class="row align-items-center justify-content-sm-between">
            <div class="col-lg-5 d-lg-block">
               <div class="newsLetter-popup__thumb imgenews">
                  <img
                     src="@/assets/images/inner-pages/newsletter-1.jpg"
                     alt="newsletter"
                  />
               </div>
            </div>
            <div class="col-lg-7 col-md-8 col-sm-10">
               <div class="newsLetter-popup__content mb-4">
                  <div class="text-center">
                  <router-link :to="{ name: 'main' }" class="logo">
                     <img src="@/assets/images/logo/logo.png" alt="logo" />
                  </router-link>
                  <h2>Join <span>with us.</span></h2>
               </div>
               <form @submit.prevent="subscribe" class="newsLetter-popup__subscrib-form">
                  <p>Subscribe to receive news from Karte every month!</p>
                  <div class="input_box">
                     <input
                        type="email"
                        v-model="email"
                        placeholder="Enter your email Address"
                        required
                     />
                     <button type="submit" class="subscribe_btn">Submit</button>
                  </div>
                  <div class="form-group checkbox__container">
                     <input type="checkbox" id="html" required />
                     <label for="html">
                        By providing my information, I agree to Karte
                        <a href="#0"> Privacy Policy</a> and
                        <a href="#0"> Legal Statement</a>
                     </label>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </BasePopup>
</template>

<script>
   import BasePopup from '@/components/base/BasePopup.vue';
   import { useToast } from "vue-toastification";

   import { subscribeToNewsletter } from "@/services/userService";

   export default {
      props: {
         active: Boolean,
         closePopup: Function,
      },
      data() {
         return {
            email: '',
            toast: useToast(),
         }
      },
      methods: {
         async subscribe() {
            const res = await subscribeToNewsletter(this.email);

            if (res.success) {
               this.toast.success(res.message, { timeout: 2000 });
            } else {
               this.toast.info(res.message);
            }

            this.closePopup();
         },
      },
      components: {
         BasePopup
      }
   };
</script>

<style> 
#newsLetter-popup {
   position: relative;
   background-color: var(--thm-white);
   max-width: calc(100% - 2vh);
   margin: 22vh auto;
   padding: 20px 20px 20px;
   border-radius: 18px;
}
#newsLetter-popup .mfp-close {
   font-size: 40px;
   color: var(--thm-black);
   right: 10px;
   top: 10px;
   font-weight: 400;
   background: transparent;
   position: absolute;
   right: 20px;
   top: 0px;
   transition: all .2s;
}
#newsLetter-popup .mfp-close:hover {
   color: var(--thm-base);
}
.newsLetter-popup__content {
   padding-right: 0px;
}
.newsLetter-popup__content h2 {
   padding: 20px 0px 10px;
   text-transform: capitalize;
}
.newsLetter-popup__content h2 span {
   color: var(--thm-base);
}
.newsLetter-popup__content p {
   font-size: 16px;
   color: var(--thm-black);
}
.newsLetter-popup__subscrib-form {
   width: 100%;
   margin-top: 40px;
}
.newsLetter-popup__subscrib-form .input_box {
   background: var(--thm-white);
   display: flex;
   justify-content: space-between;
   align-items: center;
   padding: 5px;
   border: 2px solid var(--thm-black);
   margin: 5px 0px 20px;
   border-radius: 8px;
}
.newsLetter-popup__subscrib-form .input_box input {
   border: none;
   box-shadow: 0px solid rgba(0, 0, 0, 0);
   border-radius: 0px;
   color: var(--thm-black);
   font-weight: 500;
   padding: 0px 10px 0px 20px;
}
.newsLetter-popup__subscrib-form .input_box input::placeholder {
   color: var(--thm-black);
}
.newsLetter-popup__subscrib-form .input_box .subscribe_btn {
   display: inline-flex;
   background-color: var(--thm-black);
   justify-content: center;
   align-items: center;
   padding: 10px 20px 10px;
   font-size: 12px;
   font-weight: 600;
   text-transform: uppercase;
   color: var(--thm-white);
   font-family: var(--font-heading-family);
   transition: 0.3s;
   border: 2px solid var(--thm-black);
   border-radius: 9px;
}
.newsLetter-popup__subscrib-form .input_box .subscribe_btn:hover {
   background: var(--thm-white);
   color: var(--thm-black);
}
.checkbox__container {
   position: relative;
}
.newsLetter-popup__subscrib-form .form-group input {
   padding: 0;
   height: initial;
   width: initial;
   margin-bottom: 0;
   display: inline-block;
   opacity: 0;
   cursor: pointer;
   position: absolute;
   left: 3px;
   top: 8px;
}
.newsLetter-popup__subscrib-form .form-group label {
   position: relative;
   cursor: pointer;
   font-size: 12px;
   color: var(--thm-black);
}
.newsLetter-popup__subscrib-form .form-group label a {
   color: var(--thm-black);
   text-decoration: underline;
}
.newsLetter-popup__subscrib-form .form-group label:before {
   content: "";
   background-color: transparent;
   border: 2px solid var(--thm-base);
   box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
   padding: 7px;
   display: inline-block;
   position: relative;
   vertical-align: middle;
   cursor: pointer;
   margin-right: 5px;
}
.newsLetter-popup__subscrib-form .form-group input:checked + label:after {
   content: "";
   display: block;
   position: absolute;
   top: 4px;
   left: 6px;
   width: 5px;
   height: 9px;
   border: solid var(--thm-base);
   border-width: 0 2px 2px 0;
   transform: rotate(45deg);
}
.newsLetter-popup__thumb {
   overflow: hidden;
   position: relative;
}
.newsLetter-popup__thumb .newsLetter-popup__absolute-image {
   position: absolute;
   bottom: 0px;
   right: -19%;
}
.imgenews {
   max-height: 400px;
}
.imgenews img {
   object-fit: cover;
   border-radius: 18px;
}

@media (min-width: 576px) {
   #newsLetter-popup {
      max-width: calc(100% - 25vh);
   }
}
@media (min-width: 768px) {
   #newsLetter-popup {
      max-width: calc(100% - 35vh);
   }
}
@media (min-width: 992px) {
   #newsLetter-popup {
      max-width: calc(100% - 25vh);
   }

   #newsLetter-popup {
      padding: 30px 30px 0px 0px;
      max-width: 800px;
   }

   .newsLetter-popup__content {
      padding-right: 40px;
   }

   .newsLetter-popup__content p {
      font-size: 16px;
   }

   .newsLetter-popup__subscrib-form .input_box {
      margin: 17px 0px 9px;
   }

   .newsLetter-popup__content h2 {
      padding: 10px 0px 0px;
      font-size: 40px;
   }

   .newsLetter-popup__subscrib-form .input_box .subscribe_btn {
      padding: 10px 35px 10px;
      font-size: 12px;
   }
}
</style>