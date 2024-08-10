<template>
  <main class="overflow-hidden">
    <!--Start Breadcrumb Style2-->
    <section
      class="breadcrumb-area"
      :style="{ backgroundImage: `url(${authBGImage}) ` }"
    >
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="breadcrumb-content text-center wow fadeInUp animated">
              <h2>Login</h2>
              <div class="breadcrumb-menu">
                <ul>
                  <li>
                    <a href="index.html"
                      ><i class="flaticon-home pe-2"></i>Home</a
                    >
                  </li>
                  <li><i class="flaticon-next"></i></li>
                  <li class="active">Login</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Breadcrumb Style2-->
    <!--Start Login Page-->
    <section class="login-page pt-120 pb-120 wow fadeInUp animated">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8 col-md-9">
            <div
              class="login-register-form"
              :style="{ backgroundImage: `url(${loginFormBGImage})` }"
            >
              <div class="top-title text-center">
                <h2>Login</h2>
                <p>
                  Don't have an account yet?
                  <router-link to="/register">Sign up for free</router-link>
                </p>
              </div>
              <form class="common-form" method="post" @submit.prevent="handleSubmit">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Your Email Address"
                    v-model="email"
                  />
                </div>

                <PasswordInput v-model="password" placeholder="Password" :required="true" />

                <div class="checkk">
                  <div class="form-check p-0 m-0">
                    <input type="checkbox" id="remember" />
                    <label class="p-0" for="remember"> Remember Me</label>
                  </div>
                  <a href="#0" class="forgot"> Forgot Password?</a>
                </div>
                <button type="submit" class="btn--primary style2">Login</button>
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

import PasswordInput from "@/components/PasswordInput.vue";

import authBGImage from "@/assets/images/inner-pages/auth_bg.jpg";
import loginFormBGImage from "@/assets/images/inner-pages/login-bg.png";

export default {
   name: 'Login',
   components: {
    PasswordInput
   },
   data() {
      return {
         authBGImage,
         loginFormBGImage,
         email: '',
         password: null,
      };
   },
   computed: {
      ...mapState('auth', ['user', 'token'])
   },
   methods: {
      ...mapActions('auth', ['login']),
      handleSubmit() {
         this.login({email: this.email, password: this.password})
         .then(() => {
            this.$router.go(-1);
         });
      },
   },
};
</script>

<style scoped></style>