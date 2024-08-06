<template>
  <main class="overflow-hidden">
    <!--Start Breadcrumb Style2-->
    <section
      class="breadcrumb-area"
      :style="{ backgroundImage: `url(${breadCrumbsBGImage}) `}"
    >
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="breadcrumb-content text-center wow fadeInUp animated">
              <h2>Register</h2>
              <div class="breadcrumb-menu">
                <ul>
                  <li>
                    <a href="index.html"
                      ><i class="flaticon-home pe-2"></i>Home</a
                    >
                  </li>
                  <li><i class="flaticon-next"></i></li>
                  <li class="active">Register</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Breadcrumb Style2-->

    <!--Start Login Page-->
    <section class="login-page pt-120 pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8 col-md-9 wow fadeInUp animated">
            <div
              class="login-register-form"
              :style="{ backgroundImage: `url(${formBGImage})` }"
            >
              <div class="top-title text-center">
                <h2>Register</h2>
                <p>Already have an account? <router-link to="/login">Log in</router-link></p>
              </div>
              <form class="common-form" method="post" @submit.prevent="handleSubmit">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Your Name"
                    v-model="name"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Surname"
                    v-model="surname"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Your Email"
                    v-model="email"
                    required
                  />
                  <p class="alert-form-message" v-if="formErrors && formErrors.email">{{formErrors.email[0]}}</p>
                </div>
                <div class="form-group eye">
                  <div class="icon icon-1"><i class="flaticon-hidden"></i></div>
                  <input
                    type="password"
                    id="password-field"
                    class="form-control"
                    placeholder="Password"
                    v-model="password"
                    required
                  />
                  <div class="icon icon-2">
                    <i class="flaticon-visibility"></i>
                  </div>
                </div>
                <div class="form-group eye">
                  <div class="icon icon-1"><i class="flaticon-hidden"></i></div>
                  <input
                    type="password"
                    id="password-confirmation-field"
                    class="form-control"
                    placeholder="Confirm your passwod"
                    v-model="passwordConfirm"
                    required
                  />
                  <div class="icon icon-2">
                    <i class="flaticon-visibility"></i>
                  </div>
                </div>
                <div class="checkk">
                  <div class="form-check p-0 m-0">
                    <input type="checkbox" name="acceptedTerms" id="remember" v-model="acceptedTerms" required />
                    <label class="p-0" for="remember">
                     Accept the Terms and Privacy Policy
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn--primary style2">
                  Register
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Login Page-->
  </main>
</template>

<script>
   import { mapActions, mapState } from "vuex";

   import formBGImage from '@/assets/images/inner-pages/login-bg.png';
   import breadCrumbsBGImage from '@/assets/images/inner-pages/breadcum-bg.png';

   export default {

      data() {
         return {
            formBGImage,
            breadCrumbsBGImage,
            name: '',
            surname: '',
            email: '',
            password: '',
            passwordConfirm: '',
            acceptedTerms: false,
            formErrors: {
               email: null, 
            },
         }
      },
      methods: {
         ...mapActions('auth', ['register']),
         handleSubmit() {
            this.register({
               name: this.name, 
               surname: this.surname, 
               email: this.email, 
               password: this.password, 
               password_confirmation: this.passwordConfirm
            })
            .then(() => {
               this.$router.push({ name: 'main' });
            });
         },
      },
   };
</script>

<style scoped></style>
