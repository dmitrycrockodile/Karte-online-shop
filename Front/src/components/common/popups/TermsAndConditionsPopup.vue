<template>
   <BasePopup :active="active" :closePopup="togglePopup">
      <div id="terms-popup" class="p-4" @click.stop>
         <button @click.prevent="togglePopup" title="Close (Esc)" type="button" class="mfp-close">×</button>
         <div class="container">
            <h1>Terms and Conditions</h1> <h2>1. Acceptance of Terms</h2> <p>By creating an account, accessing, or using our services, you agree to be bound by these Terms and Conditions, as well as our Privacy Policy.</p> <h2>2. Account Registration</h2> <p>To use our services, you must register an account by providing accurate and complete information. You are responsible for maintaining the confidentiality of your account information.</p> <h2>3. Use of Services</h2> <p>You agree to use our services in compliance with all applicable laws and regulations. You must not use the services for any unlawful or fraudulent activity.</p> <h2>4. User Conduct</h2> <p>You are responsible for your conduct and any content you submit, post, or display. You must not transmit any content that is offensive, harmful, or violates any third-party rights.</p> <h2>5. Intellectual Property</h2> <p>All content and services provided by us are protected by intellectual property rights. You may not reproduce, distribute, or create derivative works from our content without our prior written permission.</p> <h2>6. Termination</h2> <p>We reserve the right to suspend or terminate your account if you violate these Terms and Conditions or any applicable laws.</p> <h2>7. Limitation of Liability</h2> <p>We shall not be liable for any indirect, incidental, special, or consequential damages arising out of your use or inability to use our services.</p> <h2>8. Changes to Terms</h2> <p>We may modify these Terms and Conditions at any time. Any changes will be posted on this page and will take effect immediately upon posting.</p> <h2>9. Contact Information</h2> <p>If you have any questions or concerns about these Terms and Conditions, please contact us at [Your Contact Information].</p>
         </div>
      </div>
   </BasePopup>
</template>

<script>
   import BasePopup from '@/components/base/BasePopup.vue';

   export default {
      props: {
         active: Boolean,
         togglePopup: Function,
      },
      components: {
         BasePopup
      }
   };
</script>

<style scoped>
#terms-popup {
   position: relative;
   background-color: var(--thm-white);
   margin: 10% auto;
   width: 30%;
   font-size: 12px;
   height: 65vh;
   overflow-y: scroll;
}
#terms-popup h1 {
   font-size: 16px;
   text-align: center;
   margin-bottom: 7px;
}
#terms-popup h2 {
   font-size: 14px;
   color: var(--thm-base);
}
#terms-popup .mfp-close {
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
#terms-popup .mfp-close:hover {
   color: var(--thm-base);
}
</style>