<template>
   <div v-if="type === 'basic'" class="products-three-single w-100 mt-30" key="product.id">
      <div class="products-three-single-img">
        <router-link
          :to="{
            name: 'products.show',
            params: { id: product.id },
          }"
          class="d-block"
        >
          <img
            :src="product.preview_image"
            class="first-img"
            :alt="product.title"
          />
          <img
            src="@/assets/images/home-three/productss2-hover-1.png"
            alt=""
            class="hover-img"
          />
        </router-link>
        <div class="products-grid-one__badge-box">
          <span
            v-for="tag in product.tags"
            :key="tag.id"
            class="bg_base badge discount"
            >{{ tag.title }}</span
          >
        </div>
        <router-link
          :to="{
            name: 'products.show',
            params: { id: product.id },
          }"
          class="addcart btn--primary style2"
        >
          Add To Cart
        </router-link>
        <div class="products-grid__usefull-links">
          <ul>
            <li>
              <a 
                @click.prevent="handleWishlistAdd" 
                :class="`${isActive ? 'active' : ''}`"
                href="/"
              >
                <i class="flaticon-heart"> </i>
                <span> wishlist</span>
              </a>
            </li>
            <li>
              <a href="compare.html">
                <i
                  class="flaticon-left-and-right-arrows"
                ></i>
                <span> compare</span>
              </a>
            </li>
            <li>
              <a
                @click.prevent="getPopupProduct(product.id)"
                :href="`#popup${product.id}`"
                class="popup_link"
              >
                <i class="flaticon-visibility"></i>
                <span> quick view</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div
        class="products-three-single-content text-center"
      >
        <span>{{ product.category.title }}</span>
        <h5>
          <router-link
            :to="{
              name: 'products.show',
              params: { id: product.id },
            }"
          >
            {{ product.title }}
          </router-link>
        </h5>
        <p>
          <del v-if="!!product.old_price"
            >${{ product.old_price }}
          </del>
          ${{ product.price }}
        </p>
      </div>
    </div>

  <div v-if="type === 'advanced'" class="product-grid-two list mt-30 ">
    <div class="product-grid-two__img">
      <router-link
        :to="{
          name: 'products.show',
          params: { id: product.id },
        }"
        class="d-block"
      >
        <img
          :src="product.preview_image"
          class="first-img"
          :alt="product.title"
        />
        <img
          src="@/assets/images/home-three/productss2-hover-1.png"
          :alt="product.title" 
          class="hover-img" 
        /> 
      </router-link>
        <div class="products-grid-one__badge-box"> 
          <span
            v-for="tag in product.tags"
            :key="tag.id"
            class="bg_base badge discount"
            >{{ tag.title }}</span
          >
        </div>
    </div>
    <div class="product-grid-two-content text-center">
      <span>{{ product.category.title }}</span>
      <h5>
        <router-link
          :to="{
            name: 'products.show',
            params: { id: product.id },
          }"
          class="d-block"
        > 
          {{ product.title }}
        </router-link>
      </h5>
      <p>
        <del v-if="!!product.old_price">
          ${{ product.old_price }}
        </del> 
        ${{ product.price }}
      </p>
      <p class="text"> 
        {{ product.description }}
      </p>
    <div class="product-grid-two__overlay-box">
        <div class="title">
            <h6>
              <router-link :to="{
                name: 'products.show',
                params: { id: product.id }
              }">
                Add To Cart
              </router-link>
            </h6>
        </div>
        <div class="icon">
          <ul>
            <li>
              <a 
                @click.prevent="getPopupProduct(product.id)"
                :href="`#popup${product.id}`"
                class="popup_link"
              >
                <i class="flaticon-eye"></i>
              </a> 
            </li>
            <li>
              <a 
                @click.prevent="handleWishlistAdd" 
                :class="`${isActive ? 'active' : ''}`"
                href="/"
              >
                <i class="flaticon-heart"></i>
              </a> 
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <ProductPopup :product="popupProduct" :active="popupActive" :togglePopup="togglePopup" />
</template>

<script>
  import { mapActions, mapGetters } from "vuex";
  import { getProduct } from "@/services/productsService";
  import ProductPopup from "@/components/common/popups/ProductPopup.vue";

  export default {
    name: 'Product Card',
    props: {
      "product": { type: Object, required: true },
      "type": { type: String, default: 'basic' },
    },
    components: {
      ProductPopup,
    },
    data() {
      return {
        popupProduct: null,
        popupId: null,
        popupActive: false,
      }
    },
    methods: {
      async getPopupProduct(id) {
        const res = await getProduct(id);

        if (res.success) {
          this.popupId = id;
          this.popupProduct = res.product;
          this.togglePopup();
        }
      },
      togglePopup() {
        this.popupActive = !this.popupActive
      },
      handleWishlistAdd() {
        this.toggleWishlistItem(this.product.id);
      },
      ...mapActions('wishlist', ['toggleWishlistItem']),
    },
    computed: {
      isActive() {
        return this.wishlistItems.some(item => item.product_id === this.product.id)
      },
      ...mapGetters('wishlist', ['wishlistItems']),
    },
  }
</script>