<template>
   <footer class="footer-default footer-3">
      <div class="footer-default__shap_1 position-absolute">
        <img src="@/assets/images/shape/footer-shape-1.png" alt="Footer shape" />
      </div>
      <div class="footer-default__main-footer position-relative">
        <div class="container">
          <div class="row">
            <div
              class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-30fadeInUp animated wow"
            >
              <div class="footer-default__single-box">
                <div class="company-info">
                  <div class="footer-title">
                    <h4>Office</h4>
                  </div>
                  <div class="text1">
                    <p>29 Holles Place, Dublin 2 D02 YY46</p>
                  </div>
                  <div class="text2">
                    <p>
                      68 Jay Street, Suite 902 New Side <br />
                      Brooklyn, NY 11201
                    </p>
                  </div>
                  <div class="text3">
                    <p>New York, United States</p>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="col-xl-2 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated"
            >
              <div class="footer-default__single-box">
                <div class="footer-title">
                  <h4>Useful Links</h4>
                </div>
                <ul class="footer-links">
                  <li><router-link :to="{ name: 'account.index' }">Account</router-link></li>
                  <li><router-link :to="{ name: 'login.index' }">Sign In</router-link></li>
                  <li><router-link :to="{ name: 'cart.index' }">View Cart</router-link></li>
                  <li><router-link :to="{ name: 'wishlist.index' }" >My WishList</router-link></li>
                  <li><router-link :to="{ name: 'compare.index' }">Compare Products</router-link></li>
                </ul>
              </div>
            </div>
            <div
              class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated"
            >
              <div class="footer-default__single-box">
                <div class="footer-title">
                  <h4>Information</h4>
                </div>
                <ul class="footer-links">
                  <li><router-link :to="{ name: 'aboutUs.index' }">About us</router-link></li>
                  <li><router-link :to="{ name: 'contact.index' }">Contact Us</router-link></li>
                  <li><router-link :to="{ name: 'faq.index' }">Faq</router-link></li>
                  <li><a href="order-track.html">Order Track</a></li>
                </ul>
              </div>
            </div>
            <div
              class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated"
            >
            <div class="footer-default__single-box">
              <div class="footer-title">
                  <h4> Newsletter </h4>
              </div>
              <div class="footer-newsletter">
                  <p class="text">
                    Enter your email to receive our latest updates about our products & promotions. 
                  </p>
                  <form @submit.prevent="subscribe" class="footer-default__subscrib-form">
                    <div class="footer-input-box">
                      <input 
                        type="email" 
                        v-model="email"
                        placeholder="Email address"
                        name="email" 
                        required
                      /> 
                      <button type="submit" class="subscribe_btn">Subscribe</button> 
                    </div>
                  </form>
              <div class="newsletter-bottom d-flex align-items-center">
                <div class="footer-title-box">
                  <p>Follow Us:</p>
                </div>
                <div
                  class="footer__medio-boxx medio-boxx d-flex align-items-center"
                >
                  <ul>
                    <li>
                      <a
                        href="https://www.facebook.com/"
                        target="_blank"
                        class="active"
                        ><i class="flaticon-facebook-app-symbol"></i
                      ></a>
                    </li>
                    <li>
                      <a href="https://www.youtube.com/" target="_blank"
                        ><i class="flaticon-youtube"></i
                      ></a>
                    </li>
                    <li>
                      <a href="https://twitter.com/"
                        ><i class="flaticon-twitter" target="_blank"></i
                      ></a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/"
                        ><i class="flaticon-instagram" target="_blank"></i
                      ></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
      <div class="footer_bottom position-relative">
        <div class="container">
          <div class="footer_bottom_content">
            <div class="copyright wow fadeInUp animated">
              <p>© 2024 <router-link :to="{ name: 'main' }">Karte.</router-link> All Rights Reserved.</p>
            </div>
            <div class="footer-payment wow fadeInUp animated">
              <a href="#0">
                <img
                  src="@/assets/images/payment_method/method_1.png"
                  alt="payment"
                />
              </a>
              <a href="#0">
                <img
                  src="@/assets/images/payment_method/method_2.png"
                  alt="payment"
                />
              </a>
              <a href="#0">
                <img
                  src="@/assets/images/payment_method/method_3.png"
                  alt="payment"
                />
              </a>
              <a href="#0">
                <img
                  src="@/assets/images/payment_method/method_4.png"
                  alt="payment"
                />
              </a>
            </div>
          </div>
        </div>
      </div>
   </footer>
</template>

<script>
  import { useToast } from "vue-toastification";
  import { subscribeToNewsletter } from "@/services/userService";

  export default {
    name: 'Footer',
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
      },
    },
  }
</script>