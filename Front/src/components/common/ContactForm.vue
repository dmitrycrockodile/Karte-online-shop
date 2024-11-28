<template>
   <div class="contact-box">
      <div class="contact-form">
         <h3>Send Us Message</h3>
         <form @submit.prevent="handleSubmit" class="common-form">
            <div class="row">
               <div class="col-lg-6">
                  <div class="form-group">
                     <label for="name">Your Name*</label>
                     <input
                        type="text"
                        id="name"
                        class="form-control"
                        placeholder="Enter your name"
                        required
                        v-model="formData.name"
                     />
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label for="number"> Phone Number </label>
                     <input
                        type="text"
                        id="number"
                        class="form-control"
                        placeholder="Enter your phone"
                        v-model="formData.phone_number"
                     />
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label for="email_for_answer"> Email Address* </label>
                     <input
                        type="email"
                        id="email_for_answer"
                        class="form-control"
                        placeholder="Enter your email"
                        required
                        v-model="formData.email"
                     />
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <p>Question*</p>
                     <div class="sellect-box">
                        <select 
                           v-model="formData.question" 
                           name="question"
                           required
                           class="question-select"
                        >
                           <option value="" selected disabled>Select your question</option>
                           <option value="Want to know order status">Want to know order status</option>
                           <option value="Want to get refund">Want to get refund</option>
                           <option value="Want to buy a product">Want to buy a product</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="col-12">
                  <div class="form-group m-0">
                     <label for="message"> Write Message </label>
                     <textarea v-model="formData.message" id="message" placeholder="Hi, Good Afternoon..."></textarea>
                  </div>
               </div>
            </div>
            <button type="submit" class="btn--primary style2">Send Message</button>
         </form>
      </div>
   </div>
</template>

<script>
   import { mapGetters } from 'vuex';

   import { useToast } from "vue-toastification";

   import CustomSelect from '../base/CustomSelect.vue';

   export default {
      name: 'Contact form',
      data() {
         return {
            formData: {
               name: '',
               phone_number: '',
               email: '',
               message: '',
               question: '',
            }
         }
      },
      components: {
         CustomSelect,
      },
      computed: {
         ...mapGetters({
            user: 'auth/getUserData'
         })
      },
      setup() {
         const toast = useToast();

         return { toast }
      },
      methods: {
         async handleSubmit() {
            try {
               const res = await this.axios.post('http://localhost:8876/api/questions', this.formData);
   
               if (res.status === 200) {
                  this.formData = {
                     name: '',
                     phone_number: '',
                     email: '',
                     message: '',
                     question: '',
                  }

                  this.toast.success('Thank you for your question!', { timeout: 2000 })
               }
            } catch (err) {
               console.error(err)

               this.toast.error('Sorry, something went wrong. Please check the form data and try again.', { timeout: 2000 });
            }
         }
      },
   };
</script>

<style lang="scss" scoped>
.question-select {
   border: 1px solid #e4e4e4;
   background: transparent;
   padding: 14px 2px;
   border-radius: 4px;
   color: var(--thm-gray);
   font-weight: 300;
   width: 75%;
}
</style>