<template>
  <div>
    <!-- header-default start -->
    <header class="header-style-3">
      <!-- Start Desktop Menu -->
      <div class="menubox">
        <div class="container-fluid">
          <div class="row d-lg-none d-block">
            <div class="mobile-menu">
              <div class="mobile-menu__menu-top border-bottom-0">
                <div class="container">
                  <div class="row">
                    <div
                      class="menu-info d-flex justify-content-between align-items-center"
                    >
                      <div class="menubar">
                        <span></span> <span></span> <span></span>
                      </div>
                      <router-link to="/" class="logo">
                        <img src="./assets/images/logo/logo.png" alt="" />
                      </router-link>
                      <div class="cart-holder">
                        <a href="#0" class="cart cart-icon position-relative">
                          <i class="flaticon-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="menu-closer"></div>
              <div class="mobile-menu__sidebar-menu">
                <div class="menu-closer two">
                  <span> Close Menu</span>
                  <span class="cross"><i class="flaticon-cross"></i></span>
                </div>
                <div class="search-box-holder">
                  <form action="#0">
                    <div class="form-group search-box menu">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Search for products"
                      />
                      <span class="search-icon">
                        <i class="flaticon-magnifying-glass"></i>
                      </span>
                    </div>
                  </form>
                </div>
                <ul class="page-dropdown-menu">
                  <li class="dropdown-list">
                    <router-link to="/"><span>Home</span></router-link>
                  </li>
                  <li class="dropdown-list">
                    <router-link to="/products"
                      ><span>Products</span></router-link
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="d-lg-block d-none">
            <div class="row g-0 position-relative">
              <div
                class="col-lg-3 d-flex align-items-center justify-content-center border-rit"
              >
                <div class="logo">
                  <router-link to="/">
                    <img src="./assets/images/logo/logo.png" alt="" />
                  </router-link>
                </div>
              </div>
              <div class="col-lg-9 g-0 p-0">
                <div class="row g-0 holder">
                  <div class="col-12">
                    <div class="some-info">
                      <p class="d-flex align-items-center">
                        <span class="icon">
                          <i class="flaticon-power"></i>
                        </span>
                        Welcome to Karte Online Shop
                      </p>
                      <div class="right d-flex align-items-center">
                        <div class="language currency">
                          <select>
                            <option>USD</option>
                            <option value="1">INR</option>
                            <option value="2">BDT</option>
                          </select>
                        </div>
                        <div class="language two">
                          <select>
                            <option>ENGLISH</option>
                            <option value="1">GERMAN</option>
                            <option value="4">FRENCH</option>
                          </select>
                        </div>
                        <div v-if="!user">
                           <router-link class="router-link" to="/login"> Sign In </router-link>
                           <span>&nbsp;/&nbsp;</span>
                           <router-link class="router-link" to="/register"> Register </router-link>
                        </div>
                        <div v-if="user">
                          <form method="post" @submit.prevent="handleLogout">
                            <button type="submit" class="router-link">Logout</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="border-one"></div>
                <div class="row g-0 holder">
                  <div class="col-12">
                    <div class="mega-menu-default mega-menu d-lg-block d-none">
                      <div
                        class="d-flex align-items-center justify-content-between"
                      >
                        <nav>
                          <ul
                            class="page-dropdown-menu d-flex align-items-center justify-content-center"
                          >
                            <li class="dropdown-list">
                              <router-link to="/"
                                ><span>Home</span></router-link
                              >
                            </li>
                            <li class="dropdown-list">
                              <router-link to="/products"
                                ><span>Products</span></router-link
                              >
                            </li>
                          </ul>
                        </nav>

                        <div
                          class="right d-flex align-items-center justify-content-end"
                        >
                          <ul
                            class="main-menu__widge-box d-flex align-items-center"
                          >
                            <li class="d-lg-block d-none">
                              <a href="my-account.html"
                                ><i class="flaticon-user"></i>
                              </a>
                            </li>
                            <li class="d-lg-block d-none">
                              <a href="wishlist.html" class="number"
                                ><i class="flaticon-heart"></i>
                                <span class="count">(2)</span>
                              </a>
                            </li>
                            <li class="cartm">
                              <button
                                @click.prevent="setIsModalActive(true)"
                                class="number cart-icon"
                                ref="openCartButton"
                              >
                                <i class="flaticon-shopping-cart"></i>
                                <span class="count"
                                  >({{
                                    $store.state.cart.cartItems.length
                                  }})</span
                                >
                              </button>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <a href="shop-grid.html" class="offer-link"> Offer </a>
            </div>
          </div>
        </div>
      </div>

      <div :class="headerClasses" class="sticy-header">
        <div class="mobile-menu d-lg-none d-block">
          <div class="mobile-menu__menu-top border-bottom-0">
            <div class="container">
              <div class="row">
                <div
                  class="menu-info d-flex justify-content-between align-items-center"
                >
                  <div class="menubar">
                    <span></span> <span></span> <span></span>
                  </div>
                  <a href="index.html" class="logo">
                    <img src="./assets/images/logo/logo.png" alt="" />
                  </a>
                  <div class="cart-holder">
                    <a href="#0" class="cart cart-icon position-relative">
                      <i class="flaticon-shopping-cart"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container position-relative d-lg-block d-none">
          <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo me-2">
              <img src="./assets/images/logo/logo.png" alt="" />
            </a>
            <div class="mega-menu-default mega-menu d-lg-block d-none">
              <div class="container">
                <div class="row">
                  <nav>
                    <ul
                      class="page-dropdown-menu d-flex align-items-center justify-content-center"
                    >
                      <li class="dropdown-list">
                        <router-link to="/"><span>Home</span></router-link>
                      </li>
                      <li class="dropdown-list">
                        <router-link to="/products"
                          ><span>Products</span></router-link
                        >
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <CartSideMenu :active="isCartModalActive" @setActive="setIsModalActive" ref="cartMenu" />
      <div class="sidebar-content-closer"></div>
    </header>

    <router-view :key="$route.fullPath"></router-view>

    <!--  Footer Three start -->
    <footer class="footer-default footer-3">
      <div class="footer-default__shap_1 position-absolute">
        <img src="./assets/images/shape/footer-shape-1.png" alt="" />
      </div>
      <!--Start Footer-->
      <div class="footer-default__main-footer position-relative">
        <div class="container">
          <div class="row">
            <div
              class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated"
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
                  <li><a href="my-account.html">Account</a></li>
                  <li><router-link to="/login">Sign In</router-link></li>
                  <li>
                    <router-link :to="{ name: 'cart.index' }"
                      >View Cart</router-link
                    >
                  </li>
                  <li><a href="wishlist.html">My WishList</a></li>
                  <li><a href="compare.html">Compare Products</a></li>
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
                  <li><a href="about-us.html">About us</a></li>
                  <li><a href="contact.html">Contact Us </a></li>
                  <li><a href="faq.html">Faq</a></li>
                  <li><a href="blog.html">Latest Posts</a></li>
                  <li><a href="order-track.html">Order Track</a></li>
                </ul>
              </div>
            </div>
            <div
              class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated"
            >
              <div class="footer-default__single-box">
                <div class="footer-title">
                  <h4>Newsletter</h4>
                </div>
                <div class="footer-newsletter">
                  <p class="text">
                    Enter your email to receive our latest updates about our
                    products & promotions.
                  </p>
                  <form action="#0" class="footer-default__subscrib-form">
                    <div class="footer-input-box">
                      <input
                        type="email"
                        placeholder="Email address"
                        name="email"
                      />
                      <button type="submit" class="subscribe_btn">
                        Subscribe
                      </button>
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
      <!-- footer-bottom Footer-->
      <div class="footer_bottom position-relative">
        <div class="container">
          <div class="footer_bottom_content">
            <div class="copyright wow fadeInUp animated">
              <p>© 2024 <a href="index.html">Karte.</a> All Rights Reserved.</p>
            </div>
            <div class="footer-payment wow fadeInUp animated">
              <a href="#0">
                <img
                  src="./assets/images/home-four/method-1.jpg"
                  alt="payment"
                />
              </a>
              <a href="#0">
                <img
                  src="./assets/images/home-four/method-2.jpg"
                  alt="payment"
                />
              </a>
              <a href="#0">
                <img
                  src="./assets/images/home-four/method-3.jpg"
                  alt="payment"
                />
              </a>
              <a href="#0">
                <img
                  src="./assets/images/home-four/method-4.jpg"
                  alt="payment"
                />
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!--===scroll bottom to top===-->
    <button
      :class="scrollButtonClasses"
      class="scrollToTop wow"
      @click="scrollToTop"
    >
      <i class="flaticon-up-arrow"></i>
    </button>
    <!--===scroll bottom to top===-->
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
import axios from "axios";

import CartSideMenu from "@/components/CartSideMenu.vue";

export default {
   name: "App",
   components: {
      CartSideMenu,
   },
   mounted() {
      window.addEventListener("scroll", this.handleScroll);
      this.handleScroll();
      $("select").niceSelect();

      this.getCategories()
   },
   beforeDestroy() {
      window.removeEventListener("scroll", this.handleScroll);
   },
   data() {
      return {
        scrollPosition: 0,
        isCartModalActive: false,
      };
   },
   computed: {
      headerClasses() {
         return {
            animated: this.scrollPosition >= 150,
            fadeInDown: this.scrollPosition >= 150,
            fixed: this.scrollPosition >= 150,
         };
      },
      scrollButtonClasses() {
         return {
            fadeInDown: this.scrollPosition >= 150,
            animated: this.scrollPosition >= 150,
            activeScrollToTop: this.scrollPosition >= 150,
         };
      },
      ...mapState('auth', ['user']),
   },
   methods: {
      scrollToTop() {
         window.scrollTo({
         top: 0,
         behavior: "smooth",
         });
      },
      handleScroll() {
         this.scrollPosition = window.scrollY;
      },
      setIsModalActive(status) {
         this.isCartModalActive = status;
         
         if (status) {
            document.addEventListener('click', this.handleClickOutsideCart);
         } else {
            document.removeEventListener('click', this.handleClickOutsideCart);
         }
      },
      handleClickOutsideCart(event) {
         const cartMenu = this.$refs.cartMenu.$el;
         const openCartButton = this.$refs.openCartButton;

         if (cartMenu && !cartMenu.contains(event.target) && !openCartButton.contains(event.target)) {
            this.setIsModalActive(false);
         }
      },
      handleLogout() {
        this.logout().then(this.$router.push({ name: 'login' }))
      },
      getCategories() {
        axios.get('http://localhost:8876/api/categories')
          .then(res => {
            this.setCategories(res.data.data)
          })
      },
      ...mapActions('auth', ['logout']),
      ...mapActions('categories', ['setCategories']),
   }
};
</script>

<style scoped></style>
