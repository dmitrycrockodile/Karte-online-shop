<template>
    <div v-if="isPageLoading" class="loader"><span>Karte...</span></div>
    <main v-show="!isPageLoading" class="overflow-hidden ">
      <BreadCrumps 
        :backgroundImageUrl="category.banner"
        :title="`${category.title}`"
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
      <!--End Product Categories One-->
      <!--Start product-grid-->
      <section class="product-grid pt-60 pb-120">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="shop-grid-page-top-info justify-content-md-between justify-content-center">
                          <div class="left-box wow fadeInUp animated">
                              <p>
                                Showing 
                                {{ products.length ? `1-${products.length} of ${pagination.total}` : 0 }}
                                Results
                              </p>
                          </div>
                          <div
                            class="right-box justify-content-md-between justify-content-center wow fadeInUp animated">
                            <div class="short-by">
                              <div class="select-box"> 
                                <SortSelect :onChange="fetchProductsByCategory" />
                              </div>
                            </div>
                          </div>
                      </div>
                      <div v-if="!products.length && !isProductsLoading">
                        <h4 class="empty-list">Sorry, we do not have products for {{ category.title }} category for now</h4>
                      </div>
                  </div>
              </div>
              <div class="row">
                <ProductList :products="products" :columns="4" :isLoading="isProductsLoading" />
              </div>
              <div v-if="pagination.last_page > 1" class="row">
                <div
                  class="col-12 d-flex justify-content-center wow fadeInUp animated"
                >
                  <ul class="pagination text-center">
                    <li v-if="pagination.current_page !== 1" class="next">
                      <a
                        @click.prevent="fetchProductsByCategory(_, pagination.first_page, dataPerPage)"
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
                            @click.prevent="fetchProductsByCategory(_, link.label, dataPerPage)"
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
                        @click.prevent="fetchProductsByCategory('all', pagination.current_page + 1, dataPerPage)"
                        href="#0"
                      >
                        <i class="flaticon-next-1" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
          </div>
      </section>
  </main>
</template>

<script>
  import { mapGetters } from "vuex";

  import ProductCard from '@/components/features/product/ProductCard.vue';
  import ProductList from "@/components/features/product/ProductList.vue";
  import SortSelect from "@/components/features/filter/SortSelect.vue";
  import BreadCrumps from "@/components/common/BreadCrumps.vue";

  import { getProducts } from "@/services/productsService";

  export default {
    name: "Category List",
    components: {
      ProductCard,
      SortSelect,
      ProductList,
      BreadCrumps
    },
    data() {
      return {
        category: {},
        products: [],
        isPageLoading: true,
        isProductsLoading: true,
        pagination: [],
        dataPerPage: 16,
        page: 1,
      }
    },
    computed: {
      ...mapGetters({
        categories: 'categories/categories',
      }),
    },
    methods: {
      getCategory(id) {
        this.axios.get(`http://localhost:8876/api/categories/${id}`)
        .then(res => {
          this.category = res.data.data
        })
        .then(() => {
          this.fetchProductsByCategory('all', this.pageNumber, this.dataPerPage)
        })
        .finally(() => this.isPageLoading = false)
      },
      async fetchProductsByCategory(sortby = 'all', pageNumber = 1, dataPerPage = 16) {
        this.isProductsLoading = true;
        this.products = [];

        const res = await getProducts({
          categories: [this.category.id],
          page: pageNumber,
          sortby: sortby,
          dataPerPage: this.dataPerPage || dataPerPage,
        });

        if (res.success) {
          this.products = res.products;
          // this.pagination = res.data.meta;
        }
        this.isProductsLoading = false;
      },
    },
    mounted() {
      this.getCategory(this.$route.params.id)
    },
  }
</script>

<style lang="scss" scoped>
.inner img {
  transform: scale(1.5);
}
.empty-list {
  font-size: 22px;
  color: #6a3b3b;
}
</style>