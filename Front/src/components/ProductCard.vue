<template>
   <div class="products-three-single w-100 mt-30" key="product.id">
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
            src="../assets/images/home-three/productss2-hover-1.png"
            alt=""
            class="hover-img"
          />
        </router-link>
        <div class="products-grid-one__badge-box">
          <span
            v-for="tag in product.tags"
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
              <a href="wishlist.html">
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
            >${{ product.old_price }}</del
          >
          ${{ product.price }}
        </p>
      </div>
    </div>

    <ProductPopup :product="popupProduct" :active="popupActive" :togglePopup="togglePopup" />
</template>

<script>
   import ProductPopup from "@/components/popups/ProductPopup.vue";

   export default {
      name: 'Product Card',
      props: {
         "product": { type: Object, required: true },
      },
      components: {
         ProductPopup,
      },
      methods: {
         getPopupProduct(id) {
            this.axios.get(`http://localhost:8876/api/products/${id}`).then((res) => {
               this.popupId = id;
               this.popupProduct = res.data.data;
               this.togglePopup();
            });
         },
         togglePopup() {
            this.popupActive = !this.popupActive
         },
      },
      data() {
         return {
            popupProduct: null,
            popupId: null,
            popupActive: false,
         }
      },
   }
</script>

<style>

</style>