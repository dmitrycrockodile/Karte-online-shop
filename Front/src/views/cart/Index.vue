<template>
  <main>
    <BreadCrumps 
      :backgroundImageUrl="backgroundImage"
      :title="'Cart'"
    />
    
    <section class="cart-area pt-120 pb-120">
      <div class="container">
        <div class="row wow fadeInUp animated">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="cart-table-box">
              <div class="table-outer">
                <table class="cart-table">
                  <thead class="cart-header">
                    <tr>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Subtotal</th>
                      <th class="hide-me"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="cartItem in cartItems" :key="cartItem.id">
                      <td>
                        <div class="thumb-box">
                          <router-link
                            :to="{
                              name: 'products.show',
                              params: { id: cartItem.product_id },
                            }"
                            class="thumb"
                          >
                            <img :src="cartItem.image" :alt="cartItem.title" />
                          </router-link>
                          <div class="product__info">
                            <router-link
                              :to="{
                                name: 'products.show',
                                params: { id: cartItem.product_id },
                              }"
                              class="title"
                            >
                              <h5>{{ cartItem.title }}</h5>
                            </router-link>

                            <div class="d-flex mt-2 align-items-center">
                              <div class="product__color">Color: <span :style="`background-color: ${cartItem.color.title}`"></span></div>
                              <div class="product__size">Size: <span>{{ cartItem.size.title }}</span></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>${{ cartItem.price.toFixed(2) }}</td>
                      <td class="qty">
                        <div class="qtySelector text-center">
                          <button
                            @click.prevent="cartItem.quantity > 1 ? decreaseQty(cartItem) : removeFromCart(cartItem)"
                            class="decreaseQty"
                          >
                            <i class="flaticon-minus"></i>
                          </button>
                          <input
                            type="number"
                            disabled
                            class="qtyValue"
                            v-model="cartItem.quantity"
                          />
                          <button
                            @click.prevent="increaseQty({cartItem, quantity: 1})"
                            class="increaseQty"
                          >
                            <i class="flaticon-plus"></i>
                          </button>
                        </div>
                      </td>
                      <td class="sub-total">
                        ${{ (cartItem.price * cartItem.quantity).toFixed(2) }}
                      </td>
                      <td>
                        <button
                          @click.prevent="removeFromCart(cartItem)"
                          class="remove"
                        >
                          <i class="flaticon-cross"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-120">
          <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
            <div class="cart-total-box">
              <div class="inner-title">
                <h3>Cart Totals</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt--30">
          <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
            <div class="cart-total-box mt-30">
              <div class="table-outer">
                <table class="cart-table2">
                  <tr>
                    <td class="shipping">Shipping</td>
                    <td class="selact-box1">
                      <ul class="shop-select-option-box-1">
                        <li>
                          <BasicRadioGroup
                            type="basic"
                            :setValue="setShippingMethod"
                            :selectedValue="shippingMethod"
                            :options="options"
                          />
                        </li>
                      </ul>
                      <div class="inner-text">
                        <p>Shipping options will be updated during checkout</p>
                      </div>
                      <h4>Calculate Shipping</h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h4 class="total">Total Shipping price</h4>
                    </td>
                    <td class="subtotal">${{ shippingPrice }}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
            <div class="cart-check-out mt-30">
              <h3>Check Out</h3>
              <ul class="cart-check-out-list">
                <li>
                  <div class="left">
                    <p>Subtotal</p>
                  </div>
                  <div class="right">
                    <p>${{ totalProductsPrice }}</p>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <p>Shipping</p>
                  </div>
                  <div class="right">
                    <p>
                      <span>{{ shippingMethod }}:</span> ${{ shippingPrice }}
                    </p>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <p>Coupon</p>
                  </div>
                  <div class="right">
                    <p>
                      <span>Coupon discount:</span> ${{ couponDiscount }}
                    </p>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <p>Total Price:</p>
                  </div>
                  <div class="right">
                    <p>${{ totalPrice }}</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <div class="cart-button-box">
              <div class="coupon__box">
                <form v-show="!isCouponActive" class="apply-coupon wow fadeInUp animated" method="post" @submit.prevent="handleCouponSubmit">
                  <div class="apply-coupon-input-box mt-30">
                    <input
                      type="text"
                      v-model.trim.lazy="usedCoupon"
                      placeholder="Coupon title"
                      ref="couponTitle"
                    />
                  </div>
                  <div class="apply-coupon-button mt-30">
                    <button class="btn--primary style2" type="submit">
                      Apply Coupon
                    </button>
                  </div>
                </form>
                <p v-if="isCouponActive" class="success">Your coupon was activated!</p>
                <p v-if="errorMessage" class="error">Invalid coupon!</p>
              </div>
              <div class="cart-button-box-right wow fadeInUp animated">
                <router-link
                  :to="{ name: 'products.index' }"
                  class="btn--primary mt-30"
                  >Continue Shopping</router-link
                >

                <button v-if="user" class="btn--primary mt-30" type="submit">
                  Checkout
                </button>
                <router-link
                  v-if="!user"
                  class="btn--primary mt-30"
                  style="margin-left: 10px"
                  :to="{ name: 'login.index' }"
                  >Please login to order</router-link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
import { mapActions, mapGetters, mapState } from "vuex";

import BasicRadioGroup from "@/components/base/BaseRadioGroup.vue";
import QuantitySelector from "@/components/base/QuantitySelector.vue";
import BreadCrumps from "@/components/common/BreadCrumps.vue";

import {
  FLAT_RATE_PROCENT,
  FLAT_RATE,
  SHIPPING,
  LOCAL_PICKUP,
  TOTAL_PRICE_FOR_FREE_SHIPPING,
} from "@/utils/constants";

import backgroundImage from "@/assets/images/inner-pages/cart_bg.jpg";

export default {
  name: "Show",
  components: {
    BasicRadioGroup,
    QuantitySelector,
    BreadCrumps,
  },
  data() {
    return {
      increaseBy: 1,
      shippingMethod: null,
      options: [
        { label: SHIPPING },
        { label: FLAT_RATE },
        { label: LOCAL_PICKUP },
      ],
      backgroundImage,
      usedCoupon: '',
      isCouponActive: false,
      couponDiscount: 0,
      errorMessage: '',
    };
  },
  mounted() {
    this.setShippingMethod(SHIPPING);
  },
  computed: {
    ...mapGetters({
      cartItems: "cart/cartItems",
      totalProductsPrice: "cart/totalProductsPrice",
    }),
    ...mapState("auth", ["user"]),
    totalPrice() {
      return Number(this.totalProductsPrice) + Number(this.shippingPrice) - Number(this.couponDiscount);
    },
    shippingPrice() {
      switch (this.shippingMethod) {
        case FLAT_RATE:
          return (this.totalProductsPrice * FLAT_RATE_PROCENT) / 100;
        case SHIPPING:
          if (this.totalProductsPrice > TOTAL_PRICE_FOR_FREE_SHIPPING) {
            return 0;
          } else {
            return 70;
          }
        case LOCAL_PICKUP:
          return 0;
      }
    },
  },
  methods: {
    ...mapActions({
      decreaseQty: "cart/decreaseQty",
      removeFromCart: "cart/removeFromCart",
      increaseQty: "cart/increaseQty",
    }),
    setShippingMethod(method) {
      this.shippingMethod = method;
    },
    handleCouponSubmit() {
      let couponCheck = this.checkIfCouponMatch(this.usedCoupon);

      if (couponCheck) {
        this.isCouponActive = true;
        this.errorMessage = '';    
        this.couponDiscount = couponCheck;  
      } else {
        this.errorMessage = 'The coupon title is invalid';
        this.$refs.couponTitle.value = '';
        this.usedCoupon = '';
      }
    },
    checkIfCouponMatch(coupon) {
      let result;

      // Check product coupons
      this.cartItems.some(item => {
        return item.coupons.some(productCoupon => {
          if (coupon === productCoupon.title) {
            result = ((productCoupon.percentage / 100) * item.price).toFixed(2);
            return true;
          };
          return false;
        })
      });

      if (result) return result;

      // Check category coupons
      this.cartItems.some(item => {
        return item.category.coupons.some(categoryCoupon => {
          if (coupon === categoryCoupon.title) {
            let singleDiscount = ((categoryCoupon.percentage / 100) * item.price).toFixed(2);
            let categoriedItems = this.cartItems.filter(filteredItem => filteredItem.category.title === item.category.title);
            let categoriedItemsQuantity = categoriedItems.reduce((total, current) => total + current.quantity, 0);
            
            result = singleDiscount * categoriedItemsQuantity;
            
            return true;
          }
          return false;
        })
      })

      return result;
    }
  },
};
</script>

<style scoped>
  .product__info {
    padding-left: 20px;
  }

  .product__color {
    display: flex;
    align-items: center;
  }

  .product__color span {
    border: 1px solid #eeeeee;
    border-radius: 5px;
    width: 30px;
    height: 30px;
    margin-left: 5px;
  }

  .product__size {
    font-size: 16px;
    color: #555555;
    margin-left: 10px;
  }

  .coupon__box {
    display: flex;
    flex-direction: column;
  }

  .coupon__box .error {
    color: #dd4848;
    margin-left: 10px;
    margin-top: 2px;
  }

  .coupon__box .success {
    color: #16c216;
  }
</style>