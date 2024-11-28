<template>
  <BasePopup :active="active" :closePopup="togglePopup">
    <div v-if="active && product" class="quick-view-popup" @click.stop>
      <div class="container">
        <button
          @click.prevent="togglePopup"
          title="Close (Esc)"
          type="button"
          class="popup__close-button"
        >
          ×
        </button>
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-6">
            <div class="popup-product-single-image">
              <img :src="product.preview_image" :alt="product.title" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="popup-right-content">
              <h3>{{ product.title }}</h3>
              <div class="ratting">
                <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                <i class="flaticon-star"></i> <span>(112)</span>
              </div>
              <p class="text">
                {{ cutString(product.description, 200) }}
              </p>
              <div class="price">
                <h2>
                  ${{ product.price }}
                  <del v-if="!!product.old_price">
                    ${{ product.old_price }} USD</del
                  >
                </h2>
                <h6>
                  {{ product.count > 0 ? "In stuck" : "Out of stuck" }}
                </h6>
              </div>

              <div class="options">
                <div>
                  <h3 v-if="choosenProductOptions.selectedColor">
                    Color: ({{ choosenProductOptions.selectedColor.title }})
                  </h3>
                  <h3 v-else>Choose the color</h3>
                  <ColorsRadioGroup
                    :colors="product.colors"
                    :selectedValue="choosenProductOptions.selectedColor"
                    :setValue="setSelectedColor"
                    type="small"
                  />
                </div>

                <div>
                  <h3 v-if="choosenProductOptions.selectedSize">
                    Size: ({{ choosenProductOptions.selectedSize.title }})
                  </h3>
                  <h3 v-else>Choose the size</h3>

                  <SizesRadioGroup
                    :setValue="setSelectedSize"
                    :sizes="product.sizes"
                    :selectedValue="choosenProductOptions.selectedSize"
                  />
                </div>
              </div>

              <div class="add-product">
                <h6>Qty:</h6>
                <div class="button-group">
                  <QuantitySelector
                     v-model="choosenProductOptions.selectedQuantity"
                     :min="1"
                     :max="product.count"   
                  />

                  <button 
                     class="btn--primary add-btn"
                     @click.prevent="this.addToCart({ product, choosenProductOptions }).then(togglePopup)"
                     :disabled="!choosenProductOptions.selectedSize || !choosenProductOptions.selectedSize"
                  >Add to Cart</button>
                </div>
              </div>
              <div class="payment-method">
                <a href="#0">
                  <img
                    src="@/assets/images/payment_method/method_1.png"
                    alt=""
                  />
                </a>
                <a href="#0">
                  <img
                    src="@/assets/images/payment_method/method_2.png"
                    alt=""
                  />
                </a>
                <a href="#0">
                  <img
                    src="@/assets/images/payment_method/method_3.png"
                    alt=""
                  />
                </a>
                <a href="#0">
                  <img
                    src="@/assets/images/payment_method/method_4.png"
                    alt=""
                  />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </BasePopup>
</template>

<script>
import { mapActions } from "vuex";

import BasePopup from '@/components/base/BasePopup.vue';
import ColorsRadioGroup from "@/components/common/radios/ColorsRadioGroup.vue";
import SizesRadioGroup from "@/components/common/radios/SizesRadioGroup.vue";
import QuantitySelector from "@/components/base/QuantitySelector.vue";

import { cutString } from "@/utils/helpers.js";

export default {
  props: {
    product: Object,
    active: Boolean,
    togglePopup: Function,
  },
  data() {
    return {
      choosenProductOptions: {
        selectedQuantity: 1,
        selectedColor: null,
        selectedSize: null,
      },
    };
  },
  components: {
    BasePopup,
    ColorsRadioGroup,
    SizesRadioGroup,
    QuantitySelector,
  },
  methods: {
    cutString,
    setSelectedSize(data) {
      this.choosenProductOptions.selectedSize = data;
    },
    setSelectedColor(data) {
      this.choosenProductOptions.selectedColor = data;
    },
    ...mapActions({
      addToCart: "cart/addToCart",
    }),
  },
};
</script>

<style lang="scss" scoped>
.quick-view-popup {
  z-index: 100;
  background: #fff;
  width: 100vw;
  max-width: 992px;
  margin: 50px auto;
  border-radius: 10px;
  display: block;
}
.quick-view-popup .container {
  padding: 30px;
  position: relative;
}
.quick-view-popup .popup__close-button {
  overflow: visible;
  cursor: pointer;
  background: transparent;
  border: 0;
  display: block;
  outline: none;
  padding: 0;
  z-index: 1046;
  box-shadow: none;
  touch-action: manipulation;
  width: 44px;
  height: 44px;
  line-height: 44px;
  position: absolute;
  right: 0;
  top: 10px;
  text-decoration: none;
  text-align: center;
  opacity: 0.65;
  color: #000;
  font-style: normal;
  font-size: 28px;
  font-family: Arial, Baskerville, monospace;
  transition: all 0.2s ease;
}
.quick-view-popup .popup__close-button:hover {
  transition: all 0.2s ease;
  color: #f69c63;
}
.options {
  display: flex;
  align-items: flex-start;

  h3 {
    font-size: 20px;
  }

  > :last-child {
    margin-left: 50px;
  }
}
.popup-product-single-image img {
  width: 430px;
  height: 520px;
}

.popup-right-content .ratting {
  font-size: 18px;
  font-weight: 700;
  display: flex;
}
.popup-right-content .ratting span {
  font-weight: 500;
  padding-left: 10px;
  margin-top: -1px;
}
.popup-right-content p.text {
  font-size: 18px;
  padding-top: 10px;
}
.popup-right-content .price {
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  padding: 20px 0px 20px;
}
.popup-right-content .price h2 {
  color: var(--thm-base);
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.popup-right-content .price del {
  padding-left: 10px;
  font-size: 16px;
  color: var(--thm-black);
}
.popup-right-content .price h6 {
  font-weight: 600;
  padding-left: 15px;
}
.popup-right-content .add-product {
  padding: 14px 0px 30px;
}
.popup-right-content .add-product h6 {
  text-transform: uppercase;
  font-weight: 600;
  padding-bottom: 22px;
}
.popup-right-content .button-group {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.popup-right-content .button-group .btn--primary {
  width: 200px;
  height: 52px;
}
.ratting {
  font-size: 14px;
}
.ratting i {
  margin: 1px;
  color: var(--thm-base);
}
.payment-method a {
  display: inline-block;
  margin: 10px 10px 10px;
}
.payment-method a:first-child {
  margin-left: 0px;
}
.add-btn:disabled {
   cursor: default;
   background-color: #ccc;
}
.add-btn:disabled:hover:before {
   transform: scale(0);
   transform-origin: none;
}
@media (min-width: 1200px) {
  .quick-view-popup .container {
    padding: 40px;
  }
}
@media (min-width: 992px) {
  .quick-view-popup {
    display: block;
  }
}
</style>
