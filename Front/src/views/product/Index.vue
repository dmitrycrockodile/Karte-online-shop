<template>
  <Fallback v-if="isPageLoading" />
  <main v-if="!isPageLoading" class="overflow-hidden">
    <BreadCrumps 
      :backgroundImageUrl="productsBackGroundImage" 
      :title="'Products'"
    />
    
    <section class="product-categories-one pb-60">
      <div class="container">
        <div class="row wow fadeInUp animated">
          <div class="col-xl-12">
            <div class="product-categories-one__inner">
              <ul>
                <li v-for="category in categories" :key="category.id">
                  <router-link 
                    :to="{
                      name: 'category.index',
                      params: { id: category.id },
                    }" 
                    class="img-box"
                  >
                    <div class="inner">
                      <img
                        :src="category.preview_image"
                        :alt="category.title"
                      />
                    </div>
                  </router-link>
                  <div class="title">
                    <a href="#0">
                      <h6>{{ category.title }}</h6>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <div class="product-grid pt-60 pb-120">
      <div class="container">
        <div class="row gx-4">
          <div class="col-xl-3 col-lg-4">
            <div class="shop-grid-sidebar">
              <button class="remove-sidebar d-lg-none d-block">
                <i class="flaticon-cross"> </i>
              </button>
              <div class="sidebar-holder">
                <form
                  class="footer-default__subscrib-form m-0 p-0 wow fadeInUp animated"
                  @submit.prevent="fetchProducts()"
                >
                  <div class="footer-input-box p-0">
                    <input
                      type="text"
                      placeholder="Product title"
                      v-model="searchedTitle"
                    />
                    <button type="submit" class="subscribe_btn">
                      <i class="flaticon-magnifying-glass"></i>
                    </button>
                  </div>
                </form>
                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                  <h4>Select Categories</h4>
                  <div class="checkbox-item">
                    <form>
                      <div
                        v-for="category in productFilters.categories"
                        class="form-group"
                        :key="category.id"
                      >
                        <input
                          :value="category.id"
                          v-model="filterCategories"
                          type="checkbox"
                          :id="category.id"
                        />
                        <label :for="category.id">{{ category.title }}</label>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                  <h4>Color Option</h4>
                  <ul class="color-option">
                    <li v-for="color in productFilters.colors" :key="color.id">
                      <a
                        @click.prevent="addAttribute(color.id, 'colors')"
                        :href="`#${color.id}`"
                        :style="`background: ${color.title}`"
                        class="color-option-single"
                        :class="{ 'rounded-circle': colors.includes(color.id) }"
                      >
                        <span>{{ color.title }}</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div
                  class="single-sidebar-box mt-30 wow fadeInUp animated pb-0 border-bottom-0"
                >
                  <h4>Tags</h4>
                  <ul class="popular-tag">
                    <li v-for="tag in productFilters.tags" :key="tag.id">
                      <a
                        @click.prevent="addAttribute(tag.id, 'tags')"
                        :href="`#${tag.id}`"
                        :style="
                          tags.includes(tag.id)
                            ? 'color: #ffffff; background: #f69c63;'
                            : ''
                        "
                      >
                        {{ tag.title }}
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                  <h4>Filter By Price</h4>
                  <div class="slider-box">
                    <RangeSelect 
                      :min="productFilters.prices.minPrice" 
                      :max="productFilters.prices.maxPrice" 
                      :gap="200" 
                      :step="1" 
                      v-model:minPrice="this.prices.minPrice"
                      v-model:maxPrice="this.prices.maxPrice"
                    />
      
                    <button
                      @click.prevent="fetchProducts()"
                      class="filterbtn"
                      type="submit"
                    >
                      Filter
                    </button>
                    <button
                      @click.prevent="resetFilters()"
                      class="filterbtn"
                      type="submit"
                    >
                      Reset
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-9 col-lg-8">
            <div class="row">
              <div class="col-xl-12">
                <div
                  class="shop-grid-page-top-info p-0 justify-content-md-between justify-content-center"
                >
                  <div class="left-box wow fadeInUp animated">
                    <p>
                      Showing 
                      {{ products.length ? `${(pagination.current_page - 1) * pagination.per_page + 1}-${pagination.current_page * pagination.per_page < pagination.total ? pagination.current_page * pagination.per_page : pagination.total} of ${pagination.total}` : 0 }}
                      Results
                    </p>
                  </div>
                  <div
                    class="right-box justify-content-md-between justify-content-center wow fadeInUp animated"
                  >
                    <div class="short-by">
                      <div class="select-box">
                        <SortSelect :onChange="setSortBy" />
                      </div>
                    </div>
                      <div class="product-view-style d-flex justify-content-md-between justify-content-center">  
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button 
                                  class="nav-link active"
                                  data-bs-toggle="pill" 
                                  type="button" role="tab"  
                                  aria-selected="true"
                                  @click.prevent="handleProductListType('basic')"
                                >
                                  <i class="flaticon-grid"></i>
                                </button> 
                            </li>
                            <li class="nav-item" role="presentation">
                              <button 
                                class="nav-link"  
                                id="pills-list-tab" 
                                data-bs-toggle="pill" 
                                type="button" role="tab"
                                aria-selected="false"
                                @click.prevent="handleProductListType('advanced')"
                              >
                                <i class="flaticon-list"></i>
                              </button>
                            </li>
                        </ul>
                        <button class="slidebarfilter d-lg-none d-flex"><i  class="flaticon-edit"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                  <div
                    class="tab-pane fade show active"
                    id="pills-grid"
                    role="tabpanel"
                    aria-labelledby="pills-grid-tab"
                  >
                    <div class="row">
                      <ProductList :products="products" :isLoading="isProductsLoading" :type="type" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div v-if="pagination.last_page > 1" class="row">
              <div
                class="col-12 d-flex justify-content-center wow fadeInUp animated"
              >
                <ul class="pagination text-center">
                  <li v-if="pagination.current_page !== 1" class="next">
                    <a
                      @click.prevent="setPage(1)"
                      href="#0"
                    >
                      <i class="flaticon-left-arrows" aria-hidden="true"></i>
                    </a>
                  </li>

                  <template v-for="link in pagination.links" :key="link.label">
                    <template v-if="Number(link.label)">
                      <li
                        v-if="
                          (pagination.current_page - link.label > -2 &&
                            pagination.current_page - link.label < 2) ||
                          Number(link.label) === 1 ||
                          Number(link.label) == pagination.last_page
                        "
                      >
                        <a
                          @click.prevent="setPage(link.label)"
                          href="#0"
                          :class="link.active ? 'active' : ''"
                          >{{ link.label }}</a
                        >
                      </li>
                      <li
                        v-else-if="
                          pagination.current_page - link.label == 2 ||
                          pagination.current_page - link.label == -2
                        "
                      >
                        <a href="#0"> ... </a>
                      </li>
                    </template>
                  </template>

                  <li
                    v-if="pagination.current_page !== pagination.last_page"
                    class="next"
                  >
                    <a
                      @click.prevent="setPage(pagination.current_page + 1)"
                      href="#0"
                    >
                      <i class="flaticon-next-1" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import { mapGetters } from "vuex";

import ProductList from "@/components/features/product/ProductList.vue";
import SortSelect from "@/components/features/filter/SortSelect.vue";
import RangeSelect from "@/components/features/filter/RangeSelect.vue";
import BreadCrumps from "@/components/common/BreadCrumps.vue";
import Fallback from "@/components/common/Fallback.vue";

import { getProducts, getProductFilters } from "@/services/productsService";
import { scrollToTop } from "@/utils/helpers";

import productsBackGroundImage from '@/assets/images/inner-pages/products_bg.jpg';

export default {
  name: "Index",
  async mounted() {
    this.fetchProducts();

    const res = await getProductFilters();

    if (res.success) {
      this.productFilters = res.data;
      this.prices.minPrice = this.productFilters.prices.minPrice;
      this.prices.maxPrice = this.productFilters.prices.maxPrice;
    }
  },
  components: {
    ProductList,
    SortSelect,
    RangeSelect,
    BreadCrumps,
    Fallback,
  },
  data() {
    return {
      products: [],
      productFilters: [],
      filterCategories: [],
      colors: [],
      prices: {},
      tags: [],
      pagination: [],
      isPageLoading: true,
      isProductsLoading: true,
      productsBackGroundImage,
      type: 'basic',
      searchedTitle: '',
      sortBy: 'all',
      page: 1,
      dataPerPage: 3,
    };
  },
  computed: {
    ...mapGetters({
      categories: 'categories/categories',
    }),
  },
  watch: {
    sortBy(newVal, oldVal) {
      this.fetchProducts();
    },
    page(newVal, oldVal) {
      this.fetchProducts();
    }
  },
  methods: {
    resetFilters() {
      this.filterCategories = [];
      this.colors = [];
      this.prices = {
        minPrice: this.productFilters.prices.minPrice,
        maxPrice: this.productFilters.prices.maxPrice,
      };
      this.tags = [];

      this.fetchProducts();
    },
    addAttribute(attr, array) {
      if (!this[array].includes(attr)) {
        this[array].push(attr);
      } else {
        this[array] = this[array].filter((el) => el !== attr);
      }
    },
    async fetchProducts() {
      this.isProductsLoading = true;
      scrollToTop();
      
      const res = await getProducts({
        categories: this.filterCategories,
        colors: this.colors,
        prices: this.prices,
        tags: this.tags,
        title: this.searchedTitle,
        page: this.page,
        sortby: this.sortBy,
        dataPerPage: this.dataPerPage,
      });

      if (res.success) {
        this.products = res.data.products;
        this.pagination = res.data.meta;
      }

      this.isPageLoading = false;
      this.isProductsLoading = false;
    },
    handleProductListType(type) {
      return this.type = type;
    },
    setSortBy(sortBy) {
      this.sortBy = sortBy;
    },
    setPage(newPage) {
      this.page = newPage;
    }
  },
};
</script>

<style scoped>
.inner img {
  transform: scale(1.5);
}
</style>