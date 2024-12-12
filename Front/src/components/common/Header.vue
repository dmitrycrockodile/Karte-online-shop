<template>
   <header class="header-style-3">
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
                      <router-link :to="{ name: 'main' }" class="logo">
                        <img src="@/assets/images/logo/logo.png" alt="Our logo" />
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
            </div>
          </div>
          <div class="d-lg-block d-none">
            <div class="row g-0 position-relative">
              <div
                class="col-lg-3 d-flex align-items-center justify-content-center border-rit"
              >
                <div class="logo">
                  <router-link :to="{ name: 'main' }">
                    <img src="@/assets/images/logo/logo.png" alt="Our logo" />
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
                          <CustomSelect 
                            :options="[
                              {title: 'USD', value: 'USD'}, 
                              {title: 'INR', value: 'INR'}, 
                              {title: 'BDT', value: 'BDT'}
                            ]" 
                            v-model="selectedCurrency"
                          />
                        </div>
                        <div class="language two">
                          <CustomSelect 
                            :options="[
                              {title: 'English', value: 'EN'}, 
                              {title: 'German', value: 'GE'}, 
                              {title: 'French', value: 'FR'}
                            ]" 
                            v-model="selectedLanguage"
                          />
                        </div>
                        <div v-if="!user">
                           <router-link class="router-link" :to="{ name: 'login.index' }"> Sign In </router-link>
                           <span>&nbsp;/&nbsp;</span>
                           <router-link class="router-link" :to="{ name: 'register.index' }"> Register </router-link>
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
                              <router-link :to="{ name: 'main' }"><span>Home</span></router-link>
                            </li>
                            <li class="dropdown-list">
                              <router-link :to="{ name: 'products.index' }"><span>Products</span></router-link>
                            </li>
                            <li class="dropdown-list">
                              <router-link :to="{ name: 'aboutUs.index' }"><span>About Us</span></router-link>
                            </li>
                            <li class="dropdown-list">
                              <router-link :to="{ name: 'faq.index' }"><span>FAQ</span></router-link>
                            </li>
                            <li class="dropdown-list">
                              <router-link :to="{ name: 'cart.index' }"><span>Cart</span></router-link>
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
                              <router-link :to="{ name: 'account.index'}"
                                ><i class="flaticon-user"></i>
                              </router-link>
                            </li>
                            <li class="d-lg-block d-none">
                              <router-link :to="{ name: 'compare.index' }" class="number">
                                <i class="flaticon-left-and-right-arrows"></i>
                                <span class="count">({{ $store.state.compare.comparedProducts.length }})</span>
                              </router-link>
                            </li>
                            <li class="d-lg-block d-none">
                              <router-link :to="{ name: 'wishlist.index' }" class="number"
                                ><i class="flaticon-heart"></i>
                                <span class="count">({{ $store.state.wishlist.wishedItems.length }})</span>
                              </router-link>
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
              <router-link :to="{ name: 'products.index' }" class="offer-link"> Offer </router-link>
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
                  <router-link :to="{ name: 'main' }" class="logo">
                    <img src="@/assets/images/logo/logo.png" alt="Our Logo" />
                  </router-link>
                  <div class="cart-holder">
                    <router-link :to="{ name: 'cart.index' }" class="cart cart-icon position-relative">
                      <i class="flaticon-shopping-cart"></i>
                    </router-link>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container position-relative d-lg-block d-none">
          <div class="d-flex align-items-center justify-content-between">
            <router-link :to="{ name: 'main' }" class="logo me-2">
              <img src="@/assets/images/logo/logo.png" alt="Our logo" />
            </router-link>
            <div class="mega-menu-default mega-menu d-lg-block d-none">
              <div class="container">
                <div class="row">
                  <nav>
                     <ul
                        class="page-dropdown-menu d-flex align-items-center justify-content-center"
                     >
                      <li class="dropdown-list">
                        <router-link :to="{ name: 'main' }">
                           <span>Home</span>
                        </router-link>
                      </li>
                      <li class="dropdown-list">
                        <router-link :to="{ name: 'products.index' }">
                           <span>Products</span>
                        </router-link>
                      </li>
                      <li class="dropdown-list">
                        <router-link :to="{ name: 'account.index' }">
                           <span>Account</span>
                        </router-link>
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
   </header>
</template>

<script>
  import { mapState, mapActions } from "vuex";

  import CartSideMenu from "@/components/common/CartSideMenu.vue";
  import CustomSelect from "@/components/base/CustomSelect.vue";

  export default {
    name: 'Header',
    props: {
      headerClasses: { type: Object, required: true }
    },
    data() {
      return {
        isCartModalActive: false,
        selectedLanguage: '',
        selectedCurrency: '',
      }
    },
    components: {
      CartSideMenu,
      CustomSelect,
    },
    computed: {
      ...mapState('auth', ['user']),
    },
    methods: {
      ...mapActions('auth', ['logout']),
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
        this.logout().then(() => this.$router.push({ name: 'login.index' }))
      },
    }
  }
</script>

<style lang="scss" scoped>

</style>