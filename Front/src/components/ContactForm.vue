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
                     <label for="email"> Email Address* </label>
                     <input
                        type="text"
                        id="email"
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
      computed: {
         ...mapGetters({
            user: 'auth/getUserData'
         })
      },
      // mounted() {
      //    $("select").niceSelect();
      // },
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
               }
            } catch (err) {
               console.error(err)
            }
         }
      },
   };
</script>

<style lang="scss" scoped>

</style>