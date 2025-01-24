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
                      <td>
                        <div v-if="!cartItem.withCoupon">
                          ${{ cartItem.price.toFixed(2) }}
                        </div>
                      </td>
                      <td class="qty">
                        <div v-if="!cartItem.withCoupon" class="qtySelector text-center">
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
                        <div v-if="cartItem.withCoupon" class="container">
                          <del>${{ (cartItem.price * cartItem.quantity).toFixed(2) }}</del>
                          <span>${{ (cartItem.priceWithCoupon * cartItem.quantity).toFixed(2) }}</span>
                        </div>
                        <div v-else>
                          ${{ (cartItem.price * cartItem.quantity).toFixed(2) }}
                        </div>
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
                    <p>Coupons</p>
                  </div>
                  <div class="right">
                    <p>
                      <span>Coupons discount:</span> ${{ totalCouponDiscount }}
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
                <form class="apply-coupon wow fadeInUp animated" method="post" @submit.prevent="handleCouponSubmit">
                  <div class="apply-coupon-input-box mt-30">
                    <input
                      type="text"
                      v-model.trim="usedCoupon"
                      placeholder="Coupon title"
                    />
                  </div>
                  <div class="apply-coupon-button mt-30">
                    <button class="btn--primary style2" type="submit">
                      Apply Coupon
                    </button>
                  </div>
                </form>
              </div>
              <div class="cart-button-box-right wow fadeInUp animated">
                <router-link
                  :to="{ name: 'products.index' }"
                  class="btn--primary mt-30"
                  >Continue Shopping</router-link
                >

                <button @click.prevent="checkoutCart" v-if="user" class="btn--primary mt-30" type="submit">
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
import { useToast } from "vue-toastification";

import BasicRadioGroup from "@/components/base/BaseRadioGroup.vue";
import QuantitySelector from "@/components/base/QuantitySelector.vue";
import BreadCrumps from "@/components/common/BreadCrumps.vue";

import { BASE_API_URL } from "@/utils/constants";

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
      errorMessage: '',
      toast: useToast(),
    };
  },
  mounted() {
    this.setShippingMethod(SHIPPING);
  },
  computed: {
    ...mapGetters({
      cartItems: "cart/cartItems",
      totalProductsPrice: "cart/totalProductsPrice",
      totalCouponDiscount: "cart/totalCouponDiscount"
    }),
    ...mapState("auth", ["user"]),
    totalPrice() {
      return (Number(this.totalProductsPrice) + Number(this.shippingPrice)).toFixed(2);
    },
    shippingPrice() {
      switch (this.shippingMethod) {
        case FLAT_RATE:
          return ((this.totalProductsPrice * FLAT_RATE_PROCENT) / 100).toFixed(2);
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
      activateCoupon: "cart/activateCoupon"
    }),
    setShippingMethod(method) {
      this.shippingMethod = method;
    },
    handleCouponSubmit() {
      let couponMatch = this.findCouponMatch(this.usedCoupon);

      if (couponMatch) {  
        this.activateCoupon(couponMatch);
        this.usedCoupon = '';
        this.toast.success('Your coupon was activated!', { timeout: 2000 });
      } else {
        this.usedCoupon = '';
        this.toast.error('Invalid coupon!', { timeout: 2000 });
      }
    },
    findCouponMatch(coupon) {
      // Check product-level coupons
      const productCouponMatch = this.cartItems.find((cartItem) =>
        cartItem.coupons.some((productCoupon) => {
          if (coupon === productCoupon.title) {
            const newPrice = ((productCoupon.percentage / 100) * cartItem.price).toFixed(2);
            return (cartItem.coupon = { newPrice, id: cartItem.id });
          }
          return false;
        })
      );

      if (productCouponMatch) {
        return productCouponMatch.coupon;
      }

      // Check category-level coupons
      const categoryCouponMatch = this.cartItems.find((item) =>
        item.category.coupons.some((categoryCoupon) => {
          if (coupon === categoryCoupon.title) {
            const singleDiscount = ((categoryCoupon.percentage / 100) * item.price).toFixed(2);
            const categoriedItems = this.cartItems.filter(
              (filteredItem) => filteredItem.category.title === item.category.title
            );
            const totalCategoryDiscount = categoriedItems.reduce(
              (total, current) => total + singleDiscount * current.quantity,
              0
            );

            return (item.category.coupon = { totalCategoryDiscount });
          }
          return false;
        })
      );

      return categoryCouponMatch ? categoryCouponMatch.category.coupon : null;
    },
    async checkoutCart() {
      try {
        const res = await this.axios.post(`${BASE_API_URL}/products/checkout`, {
          products: this.cartItems,
          shippingPrice: this.shippingPrice,
        });

        if (res.status === 200 && res.data.url) {
          window.location.href = res.data.url;
        }
      } catch (error) {
        this.toast.error("An error occurred during checkout. Please try again.");
        console.error("Checkout error:", error);
      }
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

  .sub-total .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 0;
  }

  .sub-total .container del {
    font-size: 14px;
  }

  .sub-total .container span { 
    color: var(--thm-base);
  }
</style>