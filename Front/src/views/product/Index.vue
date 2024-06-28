<template>
    <div v-if="isLoading" class="loader"><span>Karte...</span></div>
    <main v-if="!isLoading" class="overflow-hidden ">
      <!--Start Breadcrumb Style2-->
      <div class="breadcrumb-area" style="background-image: url(assets/images/inner-pages/breadcum-bg.png);">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="breadcrumb-content pb-60 text-center wow fadeInUp animated">
                          <h2>Shop Grid</h2>
                          <div class="breadcrumb-menu">
                              <ul>
                                  <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                  <li> <i class="flaticon-next"></i> </li>
                                  <li class="active">Shop Grid</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--End Breadcrumb Style2-->
      <!--Start Product Categories One-->
      <section class="product-categories-one pb-60">
          <div class="container">
              <div class="row wow fadeInUp animated">
                  <div class="col-xl-12">
                      <div class="product-categories-one__inner">
                          <ul>
                              <li> <a href="#0" class="img-box">
                                      <div class="inner"> <img src="../../assets/images/shop/product-categories-v1-img1.png"
                                              alt="" /> </div>
                                  </a>
                                  <div class="title"> <a href="#0">
                                          <h6>Accessories</h6>
                                      </a> </div>
                              </li>
                              <li> <a href="#0" class="img-box">
                                      <div class="inner"> <img src="../../assets/images/shop/product-categories-v1-img2.png"
                                              alt="" /> </div>
                                  </a>
                                  <div class="title"> <a href="#0">
                                          <h6>Furnitures</h6>
                                      </a> </div>
                              </li>
                              <li> <a href="#0" class="img-box">
                                      <div class="inner"> <img src="../../assets/images/shop/product-categories-v1-img3.png"
                                              alt="" /> </div>
                                  </a>
                                  <div class="title"> <a href="#0">
                                          <h6>Jewellery</h6>
                                      </a> </div>
                              </li>
                              <li> <a href="#0" class="img-box">
                                      <div class="inner"> <img src="../../assets/images/shop/product-categories-v1-img4.png"
                                              alt="" /> </div>
                                  </a>
                                  <div class="title"> <a href="#0">
                                          <h6>Shoes</h6>
                                      </a> </div>
                              </li>
                              <li> <a href="#0" class="img-box">
                                      <div class="inner"> <img src="../../assets/images/shop/product-categories-v1-img5.png"
                                              alt="" /> </div>
                                  </a>
                                  <div class="title"> <a href="#0">
                                          <h6>Electronics</h6>
                                      </a> </div>
                              </li>
                              <li> <a href="#0" class="img-box">
                                      <div class="inner"> <img src="../../assets/images/shop/product-categories-v1-img6.png"
                                              alt="" /> </div>
                                  </a>
                                  <div class="title"> <a href="#0">
                                          <h6>Fashion</h6>
                                      </a> </div>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--End Product Categories One-->
      <!--Start product-grid-->
      <div class="product-grid pt-60 pb-120">
          <div class="container">
            <div :id="`popup${popupId}`" class="product-gird__quick-view-popup mfp-hide">
                <div v-if="popupProduct" class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6">
                            <div v-if="!popupProduct.product_images.length" class="popup-product-single-image">
                                <img :src="popupProduct.preview_image"
                                :alt="popupProduct.title" /> 
                            </div>
                            
                            <div class="quick-view__left-content">
                                <div class="tabs">
                                    <div class="popup-product-thumb-box">
                                        <ul>
                                            <li v-for="productImage in popupProduct.product_images" class="tab-nav popup-product-thumb">
                                                <a :href="`#tabb${productImage.id}`">
                                                    <img :src="productImage.url"
                                                        :alt="popupProduct.title" /> 
                                                </a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="popup-product-main-image-box">
                                        <div v-for="productImage in popupProduct.product_images" :id="`tabb${productImage.id}`" class="tab-item popup-product-image">
                                            <div class="popup-product-single-image">
                                                <img :src="productImage.url"
                                                :alt="popupProduct.title" /> 
                                            </div>
                                        </div>
                                        <template v-if="popupProduct.product_images.length > 1">
                                            <button class="prev"> 
                                                <i class="flaticon-back"></i>
                                            </button> 
                                            <button class="next"> 
                                                <i class="flaticon-next"></i>
                                            </button>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="popup-right-content">
                                <h3>{{ popupProduct.title }}</h3>
                                <div class="ratting"> <i
                                        class="flaticon-star"></i> <i
                                        class="flaticon-star"></i> <i
                                        class="flaticon-star"></i>
                                    <i class="flaticon-star"></i> <i
                                        class="flaticon-star"></i>
                                    <span>(112)</span> </div>
                                <p class="text"> 
                                  {{ popupProduct.description }}
                                </p>
                                <div class="price">
                                    <h2> ${{ popupProduct.price }} <del v-if="!!popupProduct.old_price"> ${{ popupProduct.old_price }} USD</del></h2>
                                    <h6>{{ popupProduct.count > 0 ? "In stuck" : "Out of stuck" }} </h6>
                                </div>
                                <div class="color-varient"> 
                                  <a v-for="color in popupProduct.colors" :style="`background: ${color.title};`" href="#0" class="color-name">
                                      <span>{{ color.title }}</span> 
                                  </a> 
                                </div>
                                <div class="add-product">
                                    <h6>Qty:</h6>
                                    <div class="button-group">
                                        <div class="qtySelector text-center">
                                            <span class="decreaseQty"><i
                                                    class="flaticon-minus"></i>
                                            </span> <input type="number"
                                                class="qtyValue" value="1" />
                                            <span class="increaseQty"> <i
                                                    class="flaticon-plus"></i>
                                            </span> </div>
                                        <button class="btn--primary "> Add to
                                            Cart </button>
                                    </div>
                                </div>
                                <div class="payment-method"> <a href="#0"> <img
                                            src="../../assets/images/payment_method/method_1.png"
                                            alt=""> </a>
                                    <a href="#0"> <img
                                            src="../../assets/images/payment_method/method_2.png"
                                            alt=""> </a> <a href="#0"> <img
                                            src="../../assets/images/payment_method/method_3.png"
                                            alt=""> </a>
                                    <a href="#0"> <img
                                            src="../../assets/images/payment_method/method_4.png"
                                            alt=""> </a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="row gx-4">
                  <div class="col-xl-3 col-lg-4">
                      <div class="shop-grid-sidebar"> <button class="remove-sidebar d-lg-none d-block"> <i
                                  class="flaticon-cross"> </i> </button>
                          <div class="sidebar-holder">
                              <form action="#0" class="footer-default__subscrib-form m-0 p-0 wow fadeInUp animated">
                                  <div class="footer-input-box p-0 "> <input type="email" placeholder="Email address"
                                          name="email"> <button type="submit" class="subscribe_btn"> <i
                                              class="flaticon-magnifying-glass"></i> </button> </div>
                              </form>
                              <div class="single-sidebar-box mt-30 wow fadeInUp animated ">
                                  <h4>Select Categories</h4>
                                  <div class="checkbox-item">
                                        <form>
                                            <div v-for="category in productFilters.categories" class="form-group"> 
                                                <input :value="category.id" v-model="categories" type="checkbox" :id="category.id"> 
                                                <label :for="category.id">{{ category.title }}</label> 
                                            </div>
                                        </form>
                                  </div>
                              </div>
                              <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                  <h4>Color Option </h4>
                                  <ul class="color-option">
                                        <li v-for="color in productFilters.colors">
                                            <a 
                                              @click.prevent="addAttribute(color.id, 'colors')" 
                                              :href="`#${color.id}`" 
                                              :style="`background: ${color.title}`"
                                              class="color-option-single"
                                              :class="{'rounded-circle': colors.includes(color.id)}"
                                            >
                                                <span>{{ color.title }}</span>
                                            </a>
                                        </li>
                                  </ul>
                              </div>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated pb-0 border-bottom-0 ">
                                    <h4>Tags </h4>
                                    <ul class="popular-tag">
                                        <li v-for="tag in productFilters.tags">
                                        <a 
                                            @click.prevent="addAttribute(tag.id, 'tags')"  
                                            :href="`#${tag.id}`"
                                            :style="tags.includes(tag.id) ? 'color: #ffffff; background: #f69c63;' : ''"
                                        >
                                            {{ tag.title }}
                                        </a>
                                    </li>
                                    </ul>
                                </div>
                              <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                  <h4>Filter By Price</h4>
                                  <div class="slider-box">
                                        <div id="price-range" class="slider"></div>
                                        <div class="output-price"> 
                                            <label for="priceRange">Price:</label> 
                                            <input type="text" id="priceRange" readonly> 
                                        </div> 
                                        <button @click.prevent="filterProducts()" class="filterbtn" type="submit">Filter</button>
                                        <button @click.prevent="resetFilters()" class="filterbtn" type="submit">Reset</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-9 col-lg-8">
                      <div class="row">
                          <div class="col-xl-12">
                              <div
                                  class="shop-grid-page-top-info p-0 justify-content-md-between justify-content-center">
                                  <div class="left-box wow fadeInUp animated">
                                      <p>Showing 1–{{ dataPerPage }} of {{ products.length }} Results</p>
                                  </div>
                                  <div
                                      class="right-box justify-content-md-between justify-content-center wow fadeInUp animated">
                                      <div class="short-by">
                                          <div class="select-box">
                                              <select @change.prevent="handleSelectChange" ref="mySelect" class="wide">
                                                    <option value="all" active>All</option>
                                                    <option value="bestseller">Best selling</option>
                                                    <option value="sale">On sale</option>
                                                    <option value="title(ASC)">Alphabetically, A-Z</option>
                                                    <option value="title(DESC)">Alphabetically, Z-A</option>
                                                    <option value="price(ASC)">Price, low to high</option>
                                                    <option value="price(DESC)">Price, high to low</option>
                                              </select>
                                          </div>
                                      </div>
                                      <button @click.prevent="getProducts(1)" type="submit" class="filterbtn" style="margin-left: 20px; margin-top: 10px">Reset</button>
                                      <button @click.prevent="handleSelectChange" type="submit" class="filterbtn" style="margin-left: 20px; margin-top: 10px">Sort</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-12">
                              <div class="tab-content" id="pills-tabContent">
                                  <div class="tab-pane fade show active" id="pills-grid" role="tabpanel"
                                      aria-labelledby="pills-grid-tab">
                                      <div class="row">
                                          <div v-for="product in products" class="col-xl-4 col-lg-6 col-6 ">
                                              <div class="products-three-single w-100  mt-30">
                                                  <div class="products-three-single-img"> 
                                                    <router-link :to="{name: 'products.show', params: {id: product.id}}" class="d-block"> 
                                                        <img :src="product.preview_image"
                                                            class="first-img" :alt="product.title" /> 
                                                        <img src="../../assets/images/home-three/productss2-hover-1.png"
                                                            alt="" class="hover-img" />
                                                    </router-link>
                                                      <div class="products-grid-one__badge-box"> 
                                                            <span v-for="tag in product.tags" class="bg_base badge discount">{{ tag.title }}</span>
                                                      </div> 
                                                      <router-link :to="{name: 'products.show', params: {id: product.id}}" class="addcart btn--primary style2"> Add To Cart </router-link>
                                                      <div class="products-grid__usefull-links">
                                                          <ul>
                                                              <li><a href="wishlist.html"> <i class="flaticon-heart">
                                                                      </i> <span>
                                                                          wishlist</span> </a> </li>
                                                              <li><a href="compare.html"> <i
                                                                          class="flaticon-left-and-right-arrows"></i>
                                                                      <span>
                                                                          compare</span> </a> </li>
                                                              <li><a @click="getPopupProduct(product.id)" :href="`#popup${popupId}`" class="popup_link"> <i
                                                                          class="flaticon-visibility"></i>
                                                                      <span> quick view</span>
                                                                  </a> </li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                                  <div class="products-three-single-content text-center"> 
                                                        <span>{{ product.category.title }}</span>
                                                        <h5>
                                                            <router-link :to="{name: 'products.show', params: {id: product.id}}"> {{ product.title }} </router-link>
                                                        </h5>
                                                        <p><del v-if="!!product.old_price">${{ product.old_price }}</del> ${{ product.price }} </p>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div v-if="pagination.last_page > 1" class="row">
                          <div class="col-12 d-flex justify-content-center wow fadeInUp animated">
                                <ul class="pagination text-center">
                                    <li v-if="pagination.current_page !== 1" class="next">
                                        <a @click.prevent="getProducts(pagination.first_page)" href="#0">
                                            <i class="flaticon-left-arrows" aria-hidden="true"></i> 
                                        </a>
                                    </li>

                                        <template v-for="link in pagination.links">
                                            <template v-if="Number(link.label)">
                                                <li v-if="(pagination.current_page - link.label > -2 &&
                                                    pagination.current_page - link.label < 2) || 
                                                    Number(link.label) === 1 || 
                                                    Number(link.label) == pagination.last_page
                                                ">
                                                    <a @click.prevent="getProducts(link.label)" href="#0" :class="link.active ? 'active' : ''">{{ link.label }}</a>
                                                </li>
                                                <li v-else-if="(pagination.current_page-link.label == 2 
                                                    || pagination.current_page-link.label == -2)">
                                                    <a href="#0"> ... </a>
                                                </li>
                                            </template>
                                        </template>
                                        
                                    <li v-if="pagination.current_page !== pagination.last_page" class="next">
                                        <a @click.prevent="getProducts(pagination.current_page + 1)" href="#0">
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
      <!--End product-grid-->
  </main>
</template>

<script>
   export default {
      name: 'Index',
      mounted() {
        this.getProducts()
        this.getFilters()
      },
      data() {
        return {
            products: [],
            popupProduct: null,
            popupId: null,
            productFilters: [],
            categories: [],
            colors: [],
            prices: [],
            tags: [],
            sortBy: null,
            pagination: [],
            dataPerPage: 12,
            isLoading: true,
        }
      },
      methods: {
        handleSelectChange() {
            this.sortBy = $(this.$refs.mySelect).val();

            switch (this.sortBy) {
                case "bestseller":
                    this.products = this.products.sort((a, b) => a.count - b.count);
                    break;
                case "sale":
                    this.products = this.products.filter(item => item.old_price)
                break;
                case "title(ASC)":
                    this.products = this.products.sort((a, b) => a.title.localeCompare(b.title));
                    break;
                case "title(DESC)":
                    this.products = this.products.sort((a, b) => b.title.localeCompare(a.title));
                    break;
                case "price(ASC)":
                    this.products = this.products.sort((a, b) => a.price - b.price)
                    break;
                case "price(DESC)":
                    this.products = this.products.sort((a, b) => b.price - a.price)
                    break;
            }
        },
        filterProducts(page = 1, dataPerPage = 12) {
            this.axios.post('http://localhost:8876/api/products', {
                'categories': this.categories,  
                'colors': this.colors,  
                'prices': this.prices,  
                'tags': this.tags,  
                'page': page,
                'dataPerPage': this.dataPerPage || dataPerPage,
            }).then(res => {
                this.products = res.data.data
            })
        },
        resetFilters() {
            this.categories = []
            this.colors = []
            this.prices = []
            this.tags = []

            this.filterProducts()
        },  
        addAttribute(attr, array) {
            if (!this[array].includes(attr)) {
                this[array].push(attr)
            } else {
                this[array] = this[array].filter(el => el !== attr)
            }
        },
        getProducts(page = 1, dataPerPage = 12) {
            this.isLoading = true
            this.axios.post('http://localhost:8876/api/products', {
                'categories': this.categories,  
                'colors': this.colors,  
                'prices': this.prices,  
                'tags': this.tags,
                'page': page,
                'dataPerPage': this.dataPerPage || dataPerPage,
            }).then(res => {
                this.products = res.data.data
                this.pagination = res.data.meta
            }).finally(() => {
                this.isLoading = false
                $(document).trigger('init')
            })
        },
        getPopupProduct(id) {
            this.popupProduct = null
            
            this.axios.get(`http://localhost:8876/api/products/${id}`).then(res => {
                this.popupId = id
                this.popupProduct = res.data.data
            })
        },
        getFilters() {
            this.axios.get('http://localhost:8876/api/products/filters').then(res => {
                this.productFilters = res.data

                let thisVue = this
                 //  Price Filter 
                if ($("#price-range").length) {
                    $("#price-range").slider({
                        range: true,
                        min: this.productFilters.prices.minPrice,
                        max: this.productFilters.prices.maxPrice,
                        values: [this.productFilters.prices.minPrice, this.productFilters.prices.maxPrice],
                        slide: function (event, ui) {
                            $("#priceRange").val("$" + ui.values[0] + " - $" + ui.values[1]);
                            thisVue.prices = [ui.values[0], ui.values[1]];
                        }
                    });
                    $("#priceRange").val("$" + $("#price-range").slider("values", 0) + " - $" + $("#price-range").slider("values", 1));
                };
            })
        },
      }
   }
</script>

<style scoped>

</style>