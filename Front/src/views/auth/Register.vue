<template>
  <main class="overflow-hidden">
    <BreadCrumps 
      :backgroundImageUrl="authBGImage"
      :title="'Register'"
    />

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
                <p>Already have an account? <router-link :to="{ name: 'login.index' }">Log in</router-link></p>
              </div>
              <form class="common-form" method="post" @submit.prevent="handleSubmit">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Your Name*"
                    v-model.trim.lazy="name"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Surname"
                    v-model.trim.lazy="surname"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Your Email*"
                    v-model.trim.lazy="email"
                    required
                  />
                  <p class="alert-form-message" v-if="formErrors && formErrors.email">{{formErrors.email[0]}}</p>
                </div>

                <PasswordInput v-model.lazy="password" placeholder="Password" :required="true" />

                <PasswordInput v-model.lazy="passwordConfirm" placeholder="Confirm your passwod" :required="true" />

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
  import { mapActions } from "vuex";

  import PasswordInput from '@/components/base/PasswordInput.vue';
  import BreadCrumps from "@/components/common/BreadCrumps.vue";

  import formBGImage from '@/assets/images/inner-pages/login-bg.png';
  import authBGImage from "@/assets/images/inner-pages/auth_bg.jpg";

  export default {
    data() {
      return {
        formBGImage,
        authBGImage,
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
    components: {
      PasswordInput,
      BreadCrumps
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
          this.$router.go(-1);
        })
      },
    },
  };
</script>

<style scoped></style>
