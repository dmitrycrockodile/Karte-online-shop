<template>
  <main class="overflow-hidden">
    <!-- NewsletterPopup -->
    <!-- <NewsletterPopup :active="isPopupActive" :closePopup="closePopup" /> -->

    <!-- Start Main Slider -->
    <section class="banner overflow-hidden">
      <!-- Banner Carousel -->
      <swiper
        :slides-per-view="1"
        :pagination="{ clickable: true }"
        :modules="modules"
        class="banner-slide"
      >
        <!-- Slide -->
        <swiper-slide>
          <div class="slide contant-box position-relative">
            <img
              class="bg-img hundread-vh"
              src="../../assets/images/inner-pages/shoes-banner-1.jpg"
              alt="image"
            />
            <div class="content-holder p-0 absolute-content">
              <div class="container w-100 h-100">
                <div
                  class="row align-items-center justify-content-start w-100 h-100"
                >
                  <div class="col-xl-6 col-md-9">
                    <div
                      class="content-common home3c position-relative"
                    >
                      <h6 class="new wow animated fadeInUp">NEW COLLECTION</h6>
                      <h1 class="wow animated fadeInUp" data-wow-delay="0.4s">
                        Run anywhere <br />
                        comfort everywhere.
                      </h1>
                      <p class="text wow animated fadeInUp">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vehicula faucibus massa est elit maecenas.
                      </p>
                      <router-link
                        :to="{ name: 'products.show', params: { id: 1 } }"
                        class="btn--primary button style2 wow animated fadeInUp"
                      >
                        See the shoes
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </swiper-slide>
        <!-- Slide -->
        <swiper-slide>
          <div class="slide contant-box position-relative">
            <img
              class="bg-img hundread-vh"
              src="../../assets/images/inner-pages/shoes-banner-2.jpg"
              alt="image"
            />

            <div class="content-holder p-0 absolute-content">
              <div class="container w-100 h-100">
                <div
                  class="row align-items-center justify-content-end w-100 h-100"
                >
                  <div class="col-xl-6 col-md-9">
                    <div
                      class="content-common slideup home3c position-relative text-center"
                    >
                      <h6 class="new wow animated fadeInUp">NEW COLLECTION</h6>
                      <h1 class="wow animated fadeInUp" data-wow-delay="0.4s">
                        Run anywhere <br />
                        comfort everywhere.
                      </h1>
                      <p class="text wow animated fadeInUp ms-auto me-auto">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vehicula faucibus massa est elit maecenas.
                      </p>
                      <router-link
                        :to="{ name: 'products.show', params: { id: 2 } }"
                        class="btn--primary button style2 wow animated fadeInUp"
                      >
                        See the shoes
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </swiper-slide>
      </swiper>
    </section>
    <!-- End Main Slider -->

    <!-- catagory4 Start -->
    <div class="catagory4 pt-60 pb-60">
      <div class="container">
        <div class="row mt--30">
          <div class="col-lg-6 h-100 mt-30">
            <CategoryCard 
              :categoryId="2" 
              title="Explore the best women shoes" 
              keyWord="Order & Enjoy" 
              fullSize
              white
            />
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="co-12 mt-30">
                <CategoryCard 
                  :categoryId="1" 
                  title="High quality men shoes" 
                  keyWord="Up to -20%" 
                  white
                />
              </div>
              <div class="col-12 mt-30">
                <CategoryCard 
                  :categoryId="3" 
                  title="Please her with a brand new jewerly" 
                  keyWord="Up to -20%" 
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- catagory4 End -->

    <!-- Categories tab Start -->
    <section class="categories-tab pt-60 pb-60 wow fadeInUp">
      <div class="container auto-container">
        <div class="row">
          <div class="col-12">
            <ul
              class="nav three nav-pills justify-content-center"
              id="pills-tab-two"
              role="tablist"
            >
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="pills-best-sellers-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-best-sellers"
                  type="button"
                  role="tab"
                  aria-controls="pills-best-sellers"
                  aria-selected="true"
                >
                  Best Sellers
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-new-arrivals-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-new-arrivals"
                  type="button"
                  role="tab"
                  aria-controls="pills-new-arrivals"
                  aria-selected="false"
                >
                  New Arrivals
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-top-rated-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-top-rated"
                  type="button"
                  role="tab"
                  aria-controls="pills-top-rated"
                  aria-selected="false"
                >
                  Top Rated
                </button>
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="tab-content" id="pills-tabContent-two">
            <div
              class="tab-pane tabs fade show active"
              id="pills-best-sellers"
              role="tabpanel"
              aria-labelledby="pills-best-sellers-tab"
            >
              <swiper
                class="catagory-slider-three"
                :slides-per-view="4"
                :pagination="{ clickable: true }"
                :modules="modules"
              >
                <swiper-slide v-for="item in bestsellers" class="products-three__inner">
                  <ProductCard :product="item" type="slide" />
                </swiper-slide>
              </swiper>
            </div>
            <div
              class="tab-pane fade"
              id="pills-new-arrivals"
              role="tabpanel"
              aria-labelledby="pills-new-arrivals-tab"
            >
              <swiper
                class="catagory-slider-three"
                :slides-per-view="4"
                :pagination="{ clickable: true }"
                :modules="modules"
              >
              <swiper-slide v-for="item in newArriwals" class="products-three__inner">
                <ProductCard :product="item" type="slide" />
              </swiper-slide>
              </swiper>
            </div>
            <div
              class="tab-pane fade"
              id="pills-top-rated"
              role="tabpanel"
              aria-labelledby="pills-top-rated-tab"
            >
              <swiper
                class="catagory-slider-three"
                :slides-per-view="4"
                :pagination="{ clickable: true }"
                :modules="modules"
              >
              <swiper-slide v-for="item in topRatedProducts" class="products-three__inner">
                <ProductCard :product="item" type="slide" />
              </swiper-slide>
              </swiper>
            </div>
            <div class="loder">
              <div id="overlay" style="display: none">
                <div class="spinner"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Categories tab End -->

    <!--Start Video Two-->
    <section class="video-two mt-60 mb-60 overflow-hidden">
      <div class="auto-container container">
        <div class="row g-0">
          <!--Start Video Two Img-->
          <div class="col-xl-6 wow fadeInLeft animated">
            <div class="video-main-box position-relative">
              <div
                class="video-two__img"
                style="
                  background-image: url('src/assets/images/home-three/video-preview.jpg');
                "
              >
                <div
                  class="icon wow zoomIn animated animated"
                  data-wow-delay="300ms"
                  data-wow-duration="1500ms"
                  style="
                    visibility: visible;
                    animation-duration: 1500ms;
                    animation-delay: 300ms;
                    animation-name: zoomIn;
                  "
                >
                  <a 
                    class="video-popup" 
                    href="https://www.youtube.com/watch?v=O5qMVkByyzE"
                    title="Video Gallery"
                    target="_blank"
                  >
                    <i class="flaticon-play"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--End Video Two Img-->
          <!--Start Video Two Content-->
          <div class="col-xl-6">
            <div class="video-two__content">
              <div class="video-two__content-inner">
                <div class="tagline wow fadeInUp animated">
                  <span>Hurry up, the deal will end soon</span>
                </div>
                <h2 class="wow fadeInUp animated">Best Deal Today</h2>
                <div class="text wow fadeInUp animated">
                  <p>
                    Credibly fabricate out of-the-boxn twice relationshi after
                    empowered alignments. Completely band productivate
                    client-based sources before enabled best practices.
                    Dramatically network maout-of-the-box best practices whereas
                    effective intellectual capital.
                  </p>
                </div>
                <div class="btn-box wow fadeInUp animated">
                  <router-link :to="{ name: 'products.index' }" class="btn--primary style2">
                    Discover More
                  </router-link>
                </div>
              </div>
            </div>
          </div>
          <!--End Video Two Content-->
        </div>
      </div>
    </section>
    <!--End Video Two-->

    <!--Start Products Six-->
    <section class="products-three pt-60 pb-60 overflow-hidden">
      <div class="auto-container container">
        <div class="section-header style3 text-center wow fadeInUp animated">
          <h2>Latest Products</h2>
          <p>This month updates</p>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <div class="products-three__inner">
              <ul>
                <li v-for="item in newArriwals" class="products-three-single wow fadeInUp animated">
                  <ProductCard :product="item"/>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Products Six-->

    <!--Start Products Eight-->
    <section
      class="product-slider-three position-relative pt-60 pb-60 overflow-hidden"
    >
      <div class="container">
        <div class="section-header style3 text-center wow fadeInUp animated">
          <h2>Bestseller Shoes</h2>
          <p>Weekend Top Brands</p>
        </div>
        <div class="row wow fadeInUp mt-30 animated">
          <div class="col-xl-12">
            <swiper
              class="product-slider-main position-relative"
              :slides-per-view="3"
              :pagination="{ clickable: true }"
              :modules="modules"
            >
              <swiper-slide v-for="item in bestsellers" class="product-slider__single text-center">
                <div
                  class="inner text-center d-flex flex-column justify-content-center align-items-center"
                >
                  <div class="img-box">
                    <img :src="item.preview_image" :alt="item.title" />
                  </div>
                  <div class="content-box mt-4">
                    <span v-if="item.old_price">On Sale</span>
                    <h2>
                      <del v-if="!!item.old_price">
                        ${{ item.old_price }}
                      </del>
                      ${{ item.price }}
                    </h2>
                    <h5>Enjoy 15% off your first order</h5>
                    <div class="btn-box">
                      <router-link :to="{ name: 'products.show', params: { id: item.id } }" class="btn--primary style2">
                        Select Option
                      </router-link>
                    </div>
                  </div>
                </div>
              </swiper-slide>
            </swiper>
          </div>
        </div>
      </div>
    </section>
    <!--End Products Eight-->

    <!--Start Products Seven-->
    <section class="products-cetagory-three pt-60 overflow-hidden">
      <div class="auto-container container">
        <div class="products-cetagory-three__inner">
          <div class="row justify-content-center">
            <!--Start Products Seven Single-->
            <div class="col-md-6 wow fadeInUp animated">
              <div class="products-cetagory-three__single">
                <div
                  class="products-cetagory-three__single-img height-400"
                  :style="`
                    background-image: url(${HomeDiscountBanner1});
                  `"
                ></div>
                <div class="products-cetagory-three__single-content">
                  <span>Puma Hot Deal</span>
                  <h2>2022 Shoes</h2>
                  <div class="text">
                    <p>
                      Enable interoperable channels via turnkey <br />
                      market models...
                    </p>
                  </div>
                  <div class="btn-box">
                    <router-link :to="{ name: 'products.index' }">Explore Items</router-link>
                  </div>
                </div>
              </div>
            </div>
            <!--End Products Seven Single-->
            <!--Start Products Seven Single-->
            <div class="col-xxl-3 col-md-6 wow fadeInUp animated">
              <div class="products-cetagory-three__single height-400 style2">
                <div class="inner h-100">
                  <h3>Take A Chance</h3>
                  <h2>
                    80
                    <span
                      >% <br />
                      OFF</span
                    >
                  </h2>
                  <div class="btn-box">
                    <router-link :to="{ name: 'cart.index' }" class="button">Code: LOVEBITE</router-link>
                  </div>
                  <p>Don't Miss Out: Coupon expires soon.</p>
                </div>
              </div>
            </div>
            <!--End Products Seven Single-->
            <!--Start Products Seven Single-->
            <div class="col-xxl-3 col-md-6 wow fadeInUp animated">
              <div class="products-cetagory-three__single style3">
                <div
                  class="products-cetagory-three__single-img height-400"
                  :style="`
                    background-image: url(${HomeDiscountBanner2});
                  `"
                ></div>
                <div class="products-cetagory-three__single-content">
                  <span>Puma Hot Deal</span>
                  <h2>2022 Shoes</h2>
                  <div class="text">
                    <p>
                      Enable interoperable channels via <br />
                      turnkey market models...
                    </p>
                  </div>
                  <div class="btn-box">
                    <router-link :to="{ name: 'products.index' }">Explore Items</router-link>
                  </div>
                </div>
              </div>
            </div>
            <!--End Products Seven Single-->
          </div>
        </div>
      </div>
    </section>
    <!--End Products Seven-->

    <!--Start Categories Two-->
    <section class="categories-three overflow-hidden">
      <div class="auto-container container">
        <div class="row">
          <div class="categories-three__inner pt-120 pb-120">
            <div
              class="row align-items-center justify-content-xl-start justify-content-center"
            >
              <div class="col-xl-4 col-md-7">
                <div
                  class="categories-three__content text-xl-start text-center wow fadeInUp animated"
                >
                  <div class="sec-title-style2 style3">
                    <h2>Shop by Categories</h2>
                  </div>
                  <p>
                    Continually enhance long-term don high impact niche markets
                    whereas user centric niche markets. actualize backward
                    compatible...
                  </p>
                  <div class="btn-box">
                    <router-link
                      :to="{ name: 'products.index' }"
                      class="btn--primary style2"
                    >
                      Discover More
                    </router-link>
                  </div>
                </div>
              </div>

              <div class="col-xl-8">
                <div class="row justify-content-center">
                  <div class="col-lg-4 col-sm-6">
                    <div class="categories-three__list-item mt-30 wow fadeInUp animated">
                      <CategoryBadge :categoryId="7"/>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                    <div class="categories-three__list-item mt-30 wow fadeInUp animated">
                      <CategoryBadge :categoryId="3"/>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                    <div class="categories-three__list-item mt-30 wow fadeInUp animated">
                      <CategoryBadge :categoryId="5"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Categories Two-->

    <!-- core-features Start -->
    <section class="core-features pt-120 mb-60 overflow-hidden">
      <div class="container auto-container">
        <div class="row mt--30">
          <div
            class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated"
            data-wow-delay="0.2s"
          >
          <FeatureCard 
            :icon="FeatureIcon1" 
            title="Secure Payment" 
          >
            <p>
              Everybody different which the why give offer styles for every
              body.
            </p>
          </FeatureCard>
          </div>
          <div
            class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated"
            data-wow-delay="0.3s"
          >
            <FeatureCard 
              :icon="FeatureIcon2" 
              title="27/7 Fast Delivery" 
            >
              <p>
                Everybody different which the why give offer styles for every
                body.
              </p>
            </FeatureCard>
          </div>
          <div
            class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated"
            data-wow-delay="0.4s"
          >
            <FeatureCard 
              :icon="FeatureIcon3" 
              title="Return & Refund" 
            >
              <p>
                Everybody different which the why give offer styles for every
                body.
              </p>
            </FeatureCard>
          </div>
          <div
            class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated"
            data-wow-delay="0.5s"
          >
            <FeatureCard 
              :icon="FeatureIcon4" 
              title="Quality Support" 
            >
              <p>
                Everybody different which the why give offer styles for every
                body.
              </p>
            </FeatureCard>
          </div>
        </div>
      </div>
    </section>

    <!-- review-one Start -->
    <section class="review-one pt-60 pb-60">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div
              class="review-one__section-head text-center wow fadeInUp animated"
            >
              <div class="title">
                <h2>What Client’s Say</h2>
              </div>
              <p>Over 10000 Reviews</p>
            </div>
          </div>
          <div class="col-12 wow fadeInUp animated">
            <swiper
              class="reviewOneSlider owl-carousel"
              :slides-per-view="3"
              :pagination="{ clickable: true }"
              :modules="modules"
            >
              <swiper-slide class="review-one__single-review">
                <TestimonialCard
                  :icon="TestimonialIcon1"
                  name="Ana Fleming"
                  job="Web Developer"
                >
                  <p>
                    “Quickly explot worldwide leadership long-term high-impact
                    "outside the box thinking. Quickly network synergistic
                    enterprise customer service”
                  </p>
                </TestimonialCard>
              </swiper-slide>
              <swiper-slide class="review-one__single-review">
                <TestimonialCard
                  :icon="TestimonialIcon2"
                  name="Jane Young"
                  job="Web Engineer"
                >
                  <p>
                    “Quickly explot worldwide leadership long-term high-impact
                    "outside the box thinking. Quickly network synergistic
                    enterprise customer service”
                  </p>
                </TestimonialCard>
              </swiper-slide>
              <swiper-slide class="review-one__single-review">
                <TestimonialCard
                  :icon="TestimonialIcon3"
                  name="Elaine Hayes"
                  job="Web Engineer"
                >
                  <p>
                    “Quickly explot worldwide leadership long-term high-impact
                    "outside the box thinking. Quickly network synergistic
                    enterprise customer service”
                  </p>
                </TestimonialCard>
              </swiper-slide>
              <swiper-slide class="review-one__single-review">
                <TestimonialCard
                  :icon="TestimonialIcon4"
                  name="Kim Douglas"
                  job="React Developer"
                >
                  <p>
                    “Quickly explot worldwide leadership long-term high-impact
                    "outside the box thinking. Quickly network synergistic
                    enterprise customer service”
                  </p>
                </TestimonialCard>
              </swiper-slide>
            </swiper>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Pagination, Autoplay } from "swiper/modules";

import { getProducts } from "@/services/productsService";

import NewsletterPopup from "@/components/common/popups/NewsletterPopup.vue";
import CategoryCard from "@/components/features/home/CategoryCard.vue";
import ProductCard from "@/components/features/product/ProductCard.vue";
import FeatureCard from "@/components/features/home/FeatureCard.vue";
import TestimonialCard from "@/components/features/home/TestimonialCard.vue";
import CategoryBadge from "@/components/features/home/CategoryBadge.vue";

import HomeDiscountBanner1 from "@/assets/images/home-three/home-discount-banner-1.jpg";
import HomeDiscountBanner2 from "@/assets/images/home-three/home-discount-banner-2.jpg";
import FeatureIcon1 from "@/assets/images/icon/f-icon-1.png";
import FeatureIcon2 from "@/assets/images/icon/f-icon-2.png";
import FeatureIcon3 from "@/assets/images/icon/f-icon-3.png";
import FeatureIcon4 from "@/assets/images/icon/f-icon-4.png";
import TestimonialIcon1 from "@/assets/images/testimonial/testimonial-1.jpg";
import TestimonialIcon2 from "@/assets/images/testimonial/testimonial-2.jpg";
import TestimonialIcon3 from "@/assets/images/testimonial/testimonial-3.jpg";
import TestimonialIcon4 from "@/assets/images/testimonial/testimonial-4.jpg";


import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/autoplay";

export default {
  name: "Index",
  components: {
    Swiper,
    SwiperSlide,
    NewsletterPopup,
    CategoryCard,
    ProductCard,
    FeatureCard,
    TestimonialCard,
    CategoryBadge,
  },
  async mounted() {
    this.bestsellers = await this.fetchProducts({ sortby: 'bestseller', dataPerPage: 6, page: 1});
    this.newArriwals = await this.fetchProducts({ tags: ['New'], dataPerPage: 6, page: 1});
    // Fetches products with rating > than 4
    this.topRatedProducts = await this.fetchProducts({ highRated: true, dataPerPage: 6, page: 1});
  },
  data() {
    return {
      isPopupActive: true,
      modules: [Pagination, Autoplay],
      bestsellers: [],
      newArriwals: [],
      topRatedProducts: [],
      latestProducts: [],
      HomeDiscountBanner1,
      HomeDiscountBanner2,
      FeatureIcon1,
      FeatureIcon2,
      FeatureIcon3,
      FeatureIcon4,
      TestimonialIcon1,
      TestimonialIcon2,
      TestimonialIcon3,
      TestimonialIcon4
    }
  },
  methods: {
    closePopup() {
      this.isPopupActive = false
    },
    async fetchProducts(filters) {
      const res = await getProducts(filters);

      if (res.success) {
        this.pagination = res.meta;
        return res.products;
      }
    }
  }
};
</script>

<style scoped></style>
