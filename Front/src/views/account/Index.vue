<template>
   <main class="overflow-hidden">
      <!--Start Breadcrumb Style2-->
      <section
         class="breadcrumb-area"
         :style="`background-image: url(${accountBGImage})`"
      >
         <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="breadcrumb-content text-center wow fadeInUp animated">
               <h2>My Account</h2>
               <div class="breadcrumb-menu">
                  <ul>
                     <li>
                     <router-link :to="{ name: 'main' }">
                        <i class="flaticon-home pe-2"></i>
                        Home
                     </router-link>
                     </li>
                     <li><i class="flaticon-next"></i></li>
                     <li class="active">My Account</li>
                  </ul>
               </div>
               </div>
            </div>
         </div>
         </div>
      </section>
      <!--End Breadcrumb Style2-->
      <!--Start My Account Page-->
      <section class="my-account-page pt-120 pb-120">
         <div class="container">
         <div class="row wow fadeInUp animated">
            <!--Start My Account Page Menu-->
            <div class="col-xl-3 col-lg-4">
               <div class="d-flex align-items-start">
               <div
                  class="nav my-account-page__menu flex-column nav-pills me-3 shadow-sm"
                  id="v-pills-tab"
                  role="tablist"
                  aria-orientation="vertical"
               >
                  <button
                     class="nav-link active"
                     id="v-pills-orders-tab"
                     data-bs-toggle="pill"
                     data-bs-target="#v-pills-orders"
                     type="button"
                     role="tab"
                     aria-controls="v-pills-orders"
                     aria-selected="true"
                  >
                     <span>Orders</span>
                  </button>
                  <button
                     class="nav-link"
                     id="v-pills-profile-tab"
                     data-bs-toggle="pill"
                     data-bs-target="#v-pills-profile"
                     type="button"
                     role="tab"
                     aria-controls="v-pills-profile"
                     aria-selected="false"
                  >
                     <span>Profile</span>
                  </button>
                  <button
                     class="nav-link"
                     id="v-pills-contact-tab"
                     data-bs-toggle="pill"
                     data-bs-target="#v-pills-contact"
                     type="button"
                     role="tab"
                     aria-controls="v-pills-contact"
                     aria-selected="false"
                  >
                     <span>Contact Us</span>
                  </button>
                  <button @click.prevent="handleLogout" class="nav-link"><span> Logout </span></button>
               </div>
               </div>
            </div>
            <div class="col-lg-7">
               <div class="tab-content" id="v-pills-tabContent">
                  <div
                     class="tab-pane fade show active"
                     id="v-pills-orders"
                     role="tabpanel"
                     aria-labelledby="v-pills-orders-tab"
                  >
                     <div class="tabs-content__single">
                        <h4><span>Hello Admin</span> (Not Admin? Logout)</h4>
                        <h5>
                        From your account dashboard you can view your
                        <span>Recent Orders, manage your shipping</span> and
                        <span>billing addresses,</span> and edit your
                        <span>Password and account details</span>
                        </h5>
                     </div>
                  </div>
                  <div
                     class="tab-pane fade"
                     id="v-pills-profile"
                     role="tabpanel"
                     aria-labelledby="v-pills-profile-tab"
                  >
                     <div class="tabs-content__single">
                        <div class="card p-4 shadow-sm">
                        <h2 class="mb-4">Profile information</h2>
                        
                        <form>
                           <!-- Gender Buttons -->
                           <div class="mb-3">
                              <label class="form-label">Sex :</label>
                              <div class="row">
                                 <div class="col-6">
                                 <input
                                    type="radio"
                                    class="btn-check"
                                    name="gender"
                                    id="female"
                                    value="Female"
                                    v-model="userDataForm.sex"
                                 />
                                 <label class="btn btn-outline-dark w-100" for="female">Female</label>
                                 </div>
                                 <div class="col-6">
                                 <input
                                    type="radio"
                                    class="btn-check"
                                    name="gender"
                                    id="male"
                                    value="Male"
                                    v-model="userDataForm.sex"
                                 />
                                 <label class="btn btn-outline-dark w-100" for="male">Male</label>
                                 </div>
                              </div>
                           </div>
                           <!-- Name, surname and patronymic -->
                           <div class="row mb-3">
                              <div class="col-md-6 mb-3">
                              <label for="first-name" class="form-label">Name*</label>
                              <input
                                 type="text"
                                 class="form-control"
                                 id="first-name"
                                 v-model.trim.lazy="userDataForm.name"
                                 placeholder="Enter your name"
                                 required
                              />
                              </div>
                              <div class="col-md-6 mb-3">
                              <label for="last-name" class="form-label">Surname</label>
                              <input
                                 type="text"
                                 class="form-control"
                                 id="last-name"
                                 v-model.trim.lazy="userDataForm.surname"
                                 placeholder="Enter your surname"
                              />
                              </div>
                              <div class="col-md-6">
                              <label for="patronymic" class="form-label">Patronymic</label>
                              <input
                                 type="text"
                                 class="form-control"
                                 id="patronymic"
                                 v-model.trim.lazy="userDataForm.patronymic"
                                 placeholder="Enter your patronymic"
                              />
                              </div>
                           </div>

                           <!-- Address -->
                           <div class="row mb-3">
                              <div class="col-md-6 mb-3">
                              <label for="address" class="form-label">Adress</label>
                              <input
                                 type="text"
                                 class="form-control"
                                 id="address"
                                 v-model.trim.lazy="userDataForm.address"
                                 placeholder="Enter your address"
                              />
                              </div>
                              <div class="col-md-6 mb-3">
                              <label for="postal-code" class="form-label">Postal code</label>
                              <input
                                 type="text"
                                 class="form-control"
                                 id="postal-code"
                                 v-model.trim.lazy="userDataForm.postal_code"
                                 placeholder="Kod pocztowy"
                              />
                              </div>
                              <div class="col-md-6 mb-3">
                              <label for="city" class="form-label">City</label>
                              <input
                                 type="text"
                                 class="form-control"
                                 id="city"
                                 v-model.trim.lazy="userDataForm.city"
                                 placeholder="Enter your city"
                              />
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label for="country" class="form-label">Country</label>
                                 <select class="form-select" id="country">
                                    <option selected>Polska</option>
                                    <!-- Other countries can be added here -->
                                 </select>
                              </div>
                           </div>

                           <!-- Date of Birth and Age -->
                           <div class="row mb-3">
                              <div class="col-md-6">
                              <label for="dob" class="form-label">Date of birth</label>
                              <input
                                 type="date"
                                 class="form-control"
                                 id="dob"
                                 v-model="userDataForm.date_of_birth"
                              />
                              </div>

                              <div class="col-md-6">
                                 <label for="age" class="form-label">Age</label>
                                 <input
                                    type="number"
                                    class="form-control"
                                    id="age"
                                    placeholder="Enter your age"
                                    v-model="userDataForm.age"
                                 />
                              </div>
                           </div>

                           <!-- Phone Number -->
                           <div class="mb-4">
                              <label for="phone" class="form-label">Phone number</label>
                              <div class="phone-input">
                                 <div class="phone-code">
                                    <img
                                       src="https://flagicons.lipis.dev/flags/4x3/pl.svg"
                                       alt="PL Flag"
                                    />
                                    <select class="form-select" id="phone_code">
                                       <option selected>+48</option>
                                       <!-- Other number codes can be added here -->
                                    </select>
                                 </div>
                                 <input
                                    type="text"
                                    class="form-control"
                                    id="phone"
                                    v-model.trim.lazy="userDataForm.phone_number"
                                    placeholder="Enter phone number"
                                 />
                              </div>
                           </div>

                           <button :disabled="compareObjects" @click.prevent="handleUserDataChange" type="submit" class="btn btn-dark w-100">
                              Save changes
                           </button>
                        </form>
                        </div>

                        <div class="card p-4 shadow-sm mt-4">
                        <h2 class="mb-2">E-mail</h2>

                        <p><b>My email address</b>: {{ userDataForm.email }}</p>

                        <!-- Email -->
                        <form>
                           <div class="row mb-4">
                              <div class="col-md-6">
                              <label for="email" class="form-label">
                                 New email address*
                              </label>
                              <input
                                 type="email"
                                 class="form-control"
                                 id="email"
                                 placeholder="Enter new email"
                                 v-model="emailChangeForm.email"
                                 required
                              />
                              </div>
                              <div class="col-md-6">
                              <label for="password_for_email" class="form-label"
                                 >Password*</label
                              >
                              <input
                                 type="password"
                                 class="form-control"
                                 id="password_for_email"
                                 placeholder="Your password"
                                 v-model="emailChangeForm.password"
                                 required
                              />
                              </div>
                           </div>

                           <button @click.prevent="handleEmailChange" type="submit" class="btn btn-dark w-100">
                              Save changes
                           </button>
                        </form>
                        </div>
                        <div class="card p-4 shadow-sm mt-4">
                        <h2 class="mb-2">Password</h2>

                        <form>
                           <div class="row mb-4">
                              <div class="col-md-6">
                              <label for="password" class="form-label"
                                 >Current password*</label
                              >
                              <input
                                 type="password"
                                 class="form-control"
                                 id="password"
                                 v-model="passwordChangeForm.password"
                                 placeholder="Enter password"
                              />
                              </div>
                              <div class="col-md-6">
                              <label for="new_password" class="form-label"
                                 >New password*</label
                              >
                              <input
                                 type="password"
                                 class="form-control"
                                 id="new_password"
                                 v-model="passwordChangeForm.newPassword"
                                 placeholder="Enter new password"
                              />
                              </div>
                           </div>

                           <button @click.prevent="handlePasswordChange" type="submit" class="btn btn-dark w-100">
                              Save changes
                           </button>
                        </form>
                        </div>
                     </div>
                  </div>
                  <div
                     class="tab-pane fade"
                     id="v-pills-contact"
                     role="tabpanel"
                     aria-labelledby="v-pills-contact-tab"
                  >
                     <div class="tabs-content__single contact-us shadow-sm">
                        <ContactForm />
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>
      <!--End My Account Page-->
   </main>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import { areObjectsEqual } from "@/utils/helpers";
import { useToast } from "vue-toastification";

import SizesRadioGroup from "@/components/radios/SizesRadioGroup.vue";
import ContactForm from "@/components/ContactForm.vue";

import accountBGImage from "@/assets/images/inner-pages/account_bg.jpg";

export default {
   name: "User Account",
   data() {
      return {
         userDataForm: {},
         emailChangeForm: {
            email: '',
            password: ''
         },
         passwordChangeForm: {
            password: '',
            newPassword: ''
         },
         accountBGImage,
      };
   },
   computed: {
      compareObjects() {
         if (this.userDataForm && this.userData) {
            return areObjectsEqual(this.userDataForm, this.userData)
         }
      },
      ...mapGetters({
         userData: "auth/getUserData",
      }),
   },
   components: {
      SizesRadioGroup,
      ContactForm,
   },
   setup() {
      const toast = useToast();

      return { toast }
   },
   mounted() {
      this.userDataForm = JSON.parse(JSON.stringify(this.userData));
   },
   methods: {
      handleUserDataChange() {
         this.axios.patch(`http://localhost:8876/api/user/update/${this.userDataForm.id}`, this.userDataForm)
         .then(res => {
            if (res.status === 200) {
               const newUserData = res.data.user;

               this.$store.commit('auth/SET_USER', { user: newUserData });
               this.toast.success(res.data.message, { timeout: 2000 });
            }
         })
         .catch(err => {
            this.toast.error(err.response.data.message, { timeout: 2000 })
         })
      }, 
      handleEmailChange() {
         this.axios.patch(`http://localhost:8876/api/user/update/email/${this.userDataForm.id}`, { 
            email: this.emailChangeForm.email, 
            password: this.emailChangeForm.password 
         })
         .then(res => {
            if (res.status === 200) {
               // Clears the form
               this.emailChangeForm.email = '';
               this.emailChangeForm.password = '';

               this.toast.success(res.data.message, { timeout: 2000 });

               // Sets the new email
               this.userDataForm.email = res.data.new_email;
               this.$store.commit('auth/SET_USER', { user: this.userDataForm });
            }
         })
         .catch(err => {
            this.toast.error(err.response.data.message, { timeout: 2000 })
         })
      },
      handlePasswordChange() {
         this.axios.patch(`http://localhost:8876/api/user/update/password/${this.userDataForm.id}`, { 
            new_password: this.passwordChangeForm.newPassword, 
            password: this.passwordChangeForm.password 
         })
         .then(res => {
            if (res.status === 200) {
               // Clears the form
               this.passwordChangeForm.newPassword = '';
               this.passwordChangeForm.password = '';

               this.toast.success(res.data.message, { timeout: 2000 });
            }
         })
         .catch(err => {
            this.toast.error(err.response.data.message, { timeout: 2000 })
         })
      },
      handleLogout() {
         this.logout()
            .then(() => this.$router.push({name: 'login.index'}))
      }, 
      ...mapActions({
         logout: 'auth/logout'
      }),
   },
};
</script>

<style lang="scss">
input[type="radio"].btn-check:checked + label.btn {
   background-color: #000;
   color: #fff;
}

input[type="radio"].btn-check + label.btn {
   cursor: pointer;
}

input[type="radio"].btn-check:checked {
   background-color: #000;
   color: #fff;
   border-color: #000;
}
input[type="radio"].btn-check:focus + label {
   box-shadow: 0 0 0 2px rgba(0, 191, 255, 0.7) !important;
}

.phone-input {
   display: flex;
}

#phone_code {
   width: min-content;
   margin-right: 24px;
   background-color: transparent;
   border: 1px solid rgb(183 183 183 / 80%);
}

#phone_code:focus {
   box-shadow: 0 0 0 2px rgba(0, 191, 255, 0.7) !important;
}

#phone_code:focus + #phone_code {
   box-shadow: none !important;
}

.phone-code {
   display: flex;
   align-items: center;
   padding: 10px;
   background-color: #f4f4f4;
   border: 1px solid #ced4da;
   border-right: none;
   width: min-content;
   border-radius: 5px 0 0 5px;

   img {
      width: 24px;
      height: 18px;
      margin-right: 10px;
   }
}

#country:focus {
   box-shadow: 0 0 0 2px rgba(0, 191, 255, 0.7) !important;
}

#country:focus + #country {
   box-shadow: none !important;
}

.form-control[disabled] {
   background-color: #f8f9fa;
}

.contact-us {
   border: 1px solid rgba(0, 0, 0, .125);
   border-radius: .25rem;
}

.contact-us .contact-form {
   padding: 40px 40px 30px;
}

h2 {
   font-size: 30px;
}
</style>
