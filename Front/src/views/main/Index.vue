<template>
  <main class="overflow-hidden">
    <!-- NewsletterPopup -->
    <NewsletterPopup :active="isPopupActive" :closePopup="closePopup" />

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
              categoryId="2" 
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
                  categoryId="1" 
                  title="High quality men shoes" 
                  keyWord="Up to -20%" 
                  white
                />
              </div>
              <div class="col-12 mt-30">
                <CategoryCard 
                  categoryId="3" 
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
              class="tab-pane fade show active"
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
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/products-1.jpg"
                          class="first-img"
                          alt=""
                        />
                        <img
                          src="../../assets/images/home-three/products-hover-1.png"
                          alt=""
                          class="hover-img"
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_base badge new">New</span>
                        <span class="bg_black badge discount">-40%</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Apex Sneakers </a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/products-2.jpg"
                          alt=""
                        />
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li>
                            <a href="wishlist.html">
                              <i class="flaticon-heart"> </i>
                              <span> wishlist</span>
                            </a>
                          </li>
                          <li>
                            <a href="#0">
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Sports Shoes</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/products-3.jpg"
                          class="first-img"
                          alt=""
                        />
                        <img
                          src="../../assets/images/home-three/products-hover-3.png"
                          alt=""
                          class="hover-img"
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_base badge new">New</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li>
                            <a href="#0">
                              <i class="flaticon-heart"> </i>
                              <span> wishlist</span>
                            </a>
                          </li>
                          <li>
                            <a href="#0">
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5>
                        <a href="shop-details-3.html">Trendy stylish shoes</a>
                      </h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/products-4.jpg"
                          alt=""
                        />
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Casual Shoes</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img img-bg">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/products-5.png"
                          alt=""
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_black badge discount">-10%</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5>
                        <a href="shop-details-3.html">High Quality Sneakers </a>
                      </h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/products-6.png"
                          alt=""
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_base badge new">New</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5>
                        <a href="shop-details-3.html">Outdoor Sports Shoes</a>
                      </h5>
                      <p><del>$200.00</del> $159.00</p>
                    </div>
                  </div>
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
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss2-1.jpg"
                          class="first-img"
                          alt=""
                        />
                        <img
                          src="../../assets/images/home-three/productss2-hover-1.png"
                          alt=""
                          class="hover-img"
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_base badge new">New</span>
                        <span class="bg_black badge discount">-40%</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Sport Sneakers</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss2-2.jpg"
                          alt=""
                        />
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li>
                            <a href="wishlist.html">
                              <i class="flaticon-heart"> </i>
                              <span> wishlist</span>
                            </a>
                          </li>
                          <li>
                            <a href="#0">
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5>
                        <a href="shop-details-3.html">Brown Office Shoe</a>
                      </h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss2-3.jpg"
                          class="first-img"
                          alt=""
                        />
                        <img
                          src="../../assets/images/home-three/productss2-hover-3.png"
                          alt=""
                          class="hover-img"
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_base badge new">New</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li>
                            <a href="#0">
                              <i class="flaticon-heart"> </i>
                              <span> wishlist</span>
                            </a>
                          </li>
                          <li>
                            <a href="#0">
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Sport Shoe Lilo</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss2-4.jpg"
                          alt=""
                        />
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5>
                        <a href="shop-details-3.html">Black Office Shoe</a>
                      </h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img img-bg">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss2-5.jpg"
                          alt=""
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_black badge discount">-10%</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5>
                        <a href="shop-details-3.html">Leather Sneakers</a>
                      </h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss2-2.jpg"
                          alt=""
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_base badge new">New</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5>
                        <a href="shop-details-3.html">White Casual Shoe</a>
                      </h5>
                      <p><del>$200.00</del> $159.00</p>
                    </div>
                  </div>
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
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss3-1.jpg"
                          class="first-img"
                          alt=""
                        />
                        <img
                          src="../../assets/images/home-three/productss3-hover-1.jpg"
                          alt=""
                          class="hover-img"
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_base badge new">New</span>
                        <span class="bg_black badge discount">-40%</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Sport Sneakers</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss3-2.jpg"
                          alt=""
                        />
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li>
                            <a href="wishlist.html">
                              <i class="flaticon-heart"> </i>
                              <span> wishlist</span>
                            </a>
                          </li>
                          <li>
                            <a href="#0">
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5>
                        <a href="shop-details-3.html">Brown Office Shoe</a>
                      </h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss3-3.jpg"
                          class="first-img"
                          alt=""
                        />
                        <img
                          src="../../assets/images/home-three/productss3-hover-3.png"
                          alt=""
                          class="hover-img"
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_base badge new">New</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li>
                            <a href="#0">
                              <i class="flaticon-heart"> </i>
                              <span> wishlist</span>
                            </a>
                          </li>
                          <li>
                            <a href="#0">
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Sport Shoe Lilo</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss3-4.jpg"
                          alt=""
                        />
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5>
                        <a href="shop-details-3.html">Black Office Shoe</a>
                      </h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img img-bg">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss3-5.png"
                          alt=""
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_black badge discount">-10%</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5>
                        <a href="shop-details-3.html">Leather Sneakers</a>
                      </h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </swiper-slide>
                <swiper-slide class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img
                          src="../../assets/images/home-three/productss3-3.jpg"
                          alt=""
                        />
                      </a>
                      <div class="products-grid-one__badge-box">
                        <span class="bg_base badge new">New</span>
                      </div>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart
                      </a>
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
                              <i class="flaticon-left-and-right-arrows"></i>
                              <span> compare</span>
                            </a>
                          </li>
                          <li>
                            <a href="shop-details-3.html">
                              <i class="flaticon-visibility"></i>
                              <span> quick view</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center">
                      <span>Men Shoes</span>
                      <h5>
                        <a href="shop-details-3.html">White Casual Shoe</a>
                      </h5>
                      <p><del>$200.00</del> $159.00</p>
                    </div>
                  </div>
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
                  background-image: url('src/assets/images/home-three/video-v2-img1.jpg');
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
                  <a class="video-popup" title="Video Gallery" href="">
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
                  <a href="shop-grid.html" class="btn--primary style2"
                    >Discover More</a
                  >
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
          <h2>Latest Shoes</h2>
          <p>Weekend Top Brands</p>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <div class="products-three__inner">
              <ul>
                <!--Start Products Six Single-->
                <li class="products-three-single wow fadeInUp animated">
                  <div class="products-three-single-img">
                    <a href="shop-details-3.html" class="d-block">
                      <img
                        src="../../assets/images/home-three/productss2-1.jpg"
                        class="first-img"
                        alt=""
                      />
                      <img
                        src="../../assets/images/home-three/productss2-hover-1.png"
                        alt=""
                        class="hover-img"
                      />
                    </a>
                    <div class="products-grid-one__badge-box">
                      <span class="bg_base badge new">New</span>
                    </div>
                    <a href="cart.html" class="addcart btn--primary style2">
                      Add To Cart
                    </a>
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
                            <i class="flaticon-left-and-right-arrows"></i>
                            <span> compare</span>
                          </a>
                        </li>
                        <li>
                          <a href="#popup5" class="popup_link">
                            <i class="flaticon-visibility"></i>
                            <span> quick view</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  
                  <div class="products-three-single-content text-center">
                    <span>Men Shoes</span>
                    <h5>
                      <a href="shop-details-3.html"> Trendy stylish shoes </a>
                    </h5>
                    <p><del>$200.00</del> $159.00</p>
                  </div>
                </li>
                <!--End Products Six Single-->
                <!--Start Products Six Single-->
                <li class="products-three-single wow fadeInUp animated">
                  <div class="products-three-single-img">
                    <a href="shop-details-3.html" class="d-block">
                      <img
                        src="../../assets/images/home-three/productss2-hover-2.png"
                        class="first-img"
                        alt=""
                      />
                      <img
                        src="../../assets/images/home-three/productss2-2.jpg"
                        alt=""
                        class="hover-img"
                      />
                    </a>
                    <div class="products-grid-one__badge-box">
                      <span class="bg_black badge discount">-70%</span>
                    </div>
                    <a href="cart.html" class="addcart btn--primary style2">
                      Add To Cart
                    </a>
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
                            <i class="flaticon-left-and-right-arrows"></i>
                            <span> compare</span>
                          </a>
                        </li>
                        <li>
                          <a href="#popup6" class="popup_link">
                            <i class="flaticon-visibility"></i>
                            <span> quick view</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                 
                  <div class="products-three-single-content text-center">
                    <span>Men Shoes</span>
                    <h5>
                      <a href="shop-details-3.html">Exclusive Sneakers </a>
                    </h5>
                    <p>$159.00</p>
                  </div>
                </li>
                <!--End Products Six Single-->
                <!--Start Products Six Single-->
                <li class="products-three-single wow fadeInUp animated">
                  <div class="products-three-single-img">
                    <a href="shop-details-3.html" class="d-block">
                      <img
                        src="../../assets/images/home-three/productss2-3.jpg"
                        alt=""
                      />
                    </a>

                    <a href="cart.html" class="addcart btn--primary style2">
                      Add To Cart
                    </a>
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
                            <i class="flaticon-left-and-right-arrows"></i>
                            <span> compare</span>
                          </a>
                        </li>
                        <li>
                          <a href="#popup7" class="popup_link">
                            <i class="flaticon-visibility"></i>
                            <span> quick view</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  
                  </div>
                  <div class="products-three-single-content text-center">
                    <span>Men Shoes</span>
                    <h5>
                      <a href="shop-details-3.html">Fashionable Sneakers </a>
                    </h5>
                    <p><del>$200.00</del> $159.00</p>
                  </div>
                </li>
                <!--End Products Six Single-->
                <!--Start Products Six Single-->
                <li class="products-three-single wow fadeInUp animated">
                  <div class="products-three-single-img">
                    <a href="shop-details-3.html" class="d-block">
                      <img
                        src="../../assets/images/home-three/productss2-4.jpg"
                        alt=""
                      />
                    </a>
                    <div class="products-grid-one__badge-box">
                      <span class="bg_black badge discount">-10%</span>
                    </div>
                    <a href="cart.html" class="addcart btn--primary style2">
                      Add To Cart
                    </a>
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
                            <i class="flaticon-left-and-right-arrows"></i>
                            <span> compare</span>
                          </a>
                        </li>
                        <li>
                          <a href="#popup8" class="popup_link">
                            <i class="flaticon-visibility"></i>
                            <span> quick view</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  
                  <div class="products-three-single-content text-center">
                    <span>Men Shoes</span>
                    <h5><a href="shop-details-3.html">Summer Shoes</a></h5>
                    <p>$159.00</p>
                  </div>
                </li>
                <!--End Products Six Single-->
                <!--Start Products Six Single-->
                <li class="products-three-single wow fadeInUp animated">
                  <div class="products-three-single-img">
                    <a href="shop-details-3.html" class="d-block">
                      <img
                        src="../../assets/images/home-three/productss2-5.jpg"
                        class="first-img"
                        alt=""
                      />
                      <img
                        src="../../assets/images/home-three/productss2-hover-5.png"
                        alt=""
                        class="hover-img"
                      />
                    </a>
                    <a href="cart.html" class="addcart btn--primary style2">
                      Add To Cart
                    </a>
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
                            <i class="flaticon-left-and-right-arrows"></i>
                            <span> compare</span>
                          </a>
                        </li>
                        <li>
                          <a href="#popup9" class="popup_link">
                            <i class="flaticon-visibility"></i>
                            <span> quick view</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  
                  <div class="products-three-single-content text-center">
                    <span>Men Shoes</span>
                    <h5>
                      <a href="shop-details-3.html">Outdoor Sports Shoes</a>
                    </h5>
                    <p><del>$200.00</del> $159.00</p>
                  </div>
                </li>
                <!--End Products Six Single-->

                <!--Start Products Six Single-->
                <li class="products-three-single wow fadeInUp animated">
                  <div class="products-three-single-img">
                    <a href="shop-details-3.html" class="d-block">
                      <img
                        src="../../assets/images/home-three/productss3-1.jpg"
                        class="first-img"
                        alt=""
                      />
                      <img
                        src="../../assets/images/home-three/productss3-hover-1.jpg"
                        alt=""
                        class="hover-img"
                      />
                    </a>
                    <div class="products-grid-one__badge-box">
                      <span class="bg_base badge new">New</span>
                      <span class="bg_black badge discount">-40%</span>
                    </div>
                    <a href="cart.html" class="addcart btn--primary style2">
                      Add To Cart
                    </a>
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
                            <i class="flaticon-left-and-right-arrows"></i>
                            <span> compare</span>
                          </a>
                        </li>
                        <li>
                          <a href="#popup" class="popup_link">
                            <i class="flaticon-visibility"></i>
                            <span> quick view</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  
                  <div class="products-three-single-content text-center">
                    <span>Men Shoes</span>
                    <h5><a href="shop-details-3.html">Sport Sneakers</a></h5>
                    <p>$159.00</p>
                  </div>
                </li>
                <!--End Products Six Single-->
                <!--Start Products Six Single-->
                <li class="products-three-single wow fadeInUp animated">
                  <div class="products-three-single-img">
                    <a href="shop-details-3.html" class="d-block">
                      <img
                        src="../../assets/images/home-three/productss3-2.jpg"
                        alt=""
                      />
                    </a>
                    <a href="cart.html" class="addcart btn--primary style2">
                      Add To Cart
                    </a>
                    <div class="products-grid__usefull-links">
                      <ul>
                        <li>
                          <a href="wishlist.html">
                            <i class="flaticon-heart"> </i>
                            <span> wishlist</span>
                          </a>
                        </li>
                        <li>
                          <a href="#0">
                            <i class="flaticon-left-and-right-arrows"></i>
                            <span> compare</span>
                          </a>
                        </li>
                        <li>
                          <a href="#popup1" class="popup_link">
                            <i class="flaticon-visibility"></i>
                            <span> quick view</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  
                  <div class="products-three-single-content text-center">
                    <span>Men Shoes</span>
                    <h5><a href="shop-details-3.html">Apex Sneakers </a></h5>
                    <p>$159.00</p>
                  </div>
                </li>
                <!--End Products Six Single-->
                <!--Start Products Six Single-->
                <li class="products-three-single wow fadeInUp animated">
                  <div class="products-three-single-img">
                    <a href="shop-details-3.html" class="d-block">
                      <img
                        src="../../assets/images/home-three/productss3-3.jpg"
                        alt=""
                      />
                    </a>
                    <div class="products-grid-one__badge-box">
                      <span class="bg_base badge new">New</span>
                    </div>
                    <a href="cart.html" class="addcart btn--primary style2">
                      Add To Cart
                    </a>
                    <div class="products-grid__usefull-links">
                      <ul>
                        <li>
                          <a href="#0">
                            <i class="flaticon-heart"> </i>
                            <span> wishlist</span>
                          </a>
                        </li>
                        <li>
                          <a href="#0">
                            <i class="flaticon-left-and-right-arrows"></i>
                            <span> compare</span>
                          </a>
                        </li>
                        <li>
                          <a href="#popup2" class="popup_link">
                            <i class="flaticon-visibility"></i>
                            <span> quick view</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                 
                  <div class="products-three-single-content text-center">
                    <span>Men Shoes</span>
                    <h5>
                      <a href="shop-details-3.html">Fashionable Sneakers </a>
                    </h5>
                    <p>$159.00</p>
                  </div>
                </li>
                <!--End Products Six Single-->
                <!--Start Products Six Single-->
                <li class="products-three-single wow fadeInUp animated">
                  <div class="products-three-single-img">
                    <a href="shop-details-3.html" class="d-block">
                      <img
                        src="../../assets/images/home-three/productss3-4.jpg"
                        alt=""
                      />
                    </a>
                    <a href="cart.html" class="addcart btn--primary style2">
                      Add To Cart
                    </a>
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
                            <i class="flaticon-left-and-right-arrows"></i>
                            <span> compare</span>
                          </a>
                        </li>
                        <li>
                          <a href="#popup3" class="popup_link">
                            <i class="flaticon-visibility"></i>
                            <span> quick view</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                 
                  <div class="products-three-single-content text-center">
                    <span>Men Shoes</span>
                    <h5>
                      <a href="shop-details-3.html">Outdoor Sports Shoes </a>
                    </h5>
                    <p>$159.00</p>
                  </div>
                </li>
                <!--End Products Six Single-->
                <!--Start Products Six Single-->
                <li class="products-three-single wow fadeInUp animated">
                  <div class="products-three-single-img img-bg">
                    <a href="shop-details-3.html" class="d-block">
                      <img
                        src="../../assets/images/home-three/productss2-1.jpg"
                        alt=""
                      />
                      <div class="products-grid-one__badge-box">
                        <span class="bg_black badge discount">-10%</span>
                      </div>
                    </a>
                    <a href="cart.html" class="addcart btn--primary style2">
                      Add To Cart
                    </a>
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
                            <i class="flaticon-left-and-right-arrows"></i>
                            <span> compare</span>
                          </a>
                        </li>
                        <li>
                          <a href="#popup4" class="popup_link">
                            <i class="flaticon-visibility"></i>
                            <span> quick view</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                   
                  </div>
                  <div class="products-three-single-content text-center">
                    <span>Men Shoes</span>
                    <h5>
                      <a href="shop-details-3.html">High Quality Sneakers</a>
                    </h5>
                    <p>$159.00</p>
                  </div>
                </li>
                <!--End Products Six Single-->
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
              :slides-per-view="1"
              :pagination="{ clickable: true }"
              :modules="modules"
            >
              <swiper-slide class="product-slider__single text-center">
                <div
                  class="inner text-center d-flex flex-column justify-content-center align-items-center"
                >
                  <div class="img-box">
                    <img src="../../assets/images/home-three/fimg.png" alt="" />
                  </div>
                  <div class="content-box mt-4">
                    <span>On Sale</span>
                    <h2>$1499.00</h2>
                    <h5>Enjoy 15% off your first order</h5>
                    <div class="btn-box">
                      <a href="shop-details-3.html" class="btn--primary style2"
                        >Select Option</a
                      >
                    </div>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide class="product-slider__single text-center">
                <div
                  class="inner text-center d-flex flex-column justify-content-center align-items-center"
                >
                  <div class="img-box">
                    <img src="../../assets/images/home-three/fimg.png" alt="" />
                  </div>
                  <div class="content-box mt-4">
                    <span>On Sale</span>
                    <h2>$1499.00</h2>
                    <h5>Enjoy 15% off your first order</h5>
                    <div class="btn-box">
                      <a href="shop-details-3.html" class="btn--primary style2"
                        >Select Option</a
                      >
                    </div>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide class="product-slider__single text-center">
                <div
                  class="inner text-center d-flex flex-column justify-content-center align-items-center"
                >
                  <div class="img-box">
                    <img src="../../assets/images/home-three/fimg.png" alt="" />
                  </div>
                  <div class="content-box mt-4">
                    <span>On Sale</span>
                    <h2>$1499.00</h2>
                    <h5>Enjoy 15% off your first order</h5>
                    <div class="btn-box">
                      <a href="shop-details-3.html" class="btn--primary style2"
                        >Select Option</a
                      >
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
                  style="
                    background-image: url(src/assets/images/shop/products-v7-img1.jpg);
                  "
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
                    <a href="shop-grid-left-sidebar.html">Explore Items</a>
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
                    <a href="cart.html" class="button">Code: LOVEBITE</a>
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
                  style="
                    background-image: url(src/assets/images/shop/products-v7-img2.jpg);
                  "
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
                    <a href="shop-list-right-sidebar.html">Explore Items</a>
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
                    <a
                      href="shop-grid-left-sidebar.html"
                      class="btn--primary style2"
                      >Discover More</a
                    >
                  </div>
                </div>
              </div>

              <div class="col-xl-8">
                <div class="row justify-content-center">
                  <div class="col-lg-4 col-sm-6">
                    <div
                      class="categories-three__list-item mt-30 wow fadeInUp animated"
                    >
                      <div class="categories-three__list-item-inner">
                        <a href="shop-grid-right-sidebar.html" class="img-box">
                          <img
                            src="../../assets/images/home-three/categories-v2-img1.jpg"
                            alt=""
                          />
                          <div class="text"><span>369 Items</span></div>
                        </a>
                        <div class="title text-center">
                          <h4>
                            <a href="shop-grid-left-sidebar.html"
                              >Sport’s Shoes</a
                            >
                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                    <div
                      class="categories-three__list-item mt-30 wow fadeInUp animated"
                    >
                      <div class="categories-three__list-item-inner">
                        <a href="shop-grid-left-sidebar.html" class="img-box">
                          <img
                            src="../../assets/images/home-three/categories-v2-img2.jpg"
                            alt=""
                          />
                          <div class="text"><span>369 Items</span></div>
                        </a>
                        <div class="title text-center">
                          <h4>
                            <a href="shop-grid-left-sidebar.html"
                              >Casual Shoes</a
                            >
                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                    <div
                      class="categories-three__list-item mt-30 wow fadeInUp animated"
                    >
                      <div class="categories-three__list-item-inner">
                        <a href="shop-grid-left-sidebar.html" class="img-box">
                          <img
                            src="../../assets/images/home-three/categories-v2-img3.jpg"
                            alt=""
                          />
                          <div class="text"><span>369 Items</span></div>
                        </a>
                        <div class="title text-center">
                          <h4>
                            <a href="shop-grid-left-sidebar.html"
                              >Office Shoes</a
                            >
                          </h4>
                        </div>
                      </div>
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
            <div class="core-features__box d-flex ms-0">
              <span class="one"></span> <span class="two"></span>
              <div class="icon">
                <img src="../../assets/images/icon/f-icon-1.png" alt="" />
              </div>
              <div class="core-features__box-content">
                <a href="login.html" class="d-block">
                  <h4>Secure Payment</h4>
                </a>
                <p>
                  Everybody different which the why give offer styles for every
                  body.
                </p>
              </div>
            </div>
          </div>
          <div
            class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated"
            data-wow-delay="0.3s"
          >
            <div class="core-features__box d-flex">
              <span class="one"></span> <span class="two"></span>
              <div class="icon">
                <img src="../../assets/images/icon/f-icon-2.png" alt="" />
              </div>
              <div class="core-features__box-content">
                <a href="login.html" class="d-block">
                  <h4>27/7 Fast Delivery</h4>
                </a>
                <p>
                  Everybody different which the why give offer styles for every
                  body.
                </p>
              </div>
            </div>
          </div>
          <div
            class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated"
            data-wow-delay="0.4s"
          >
            <div class="core-features__box d-flex">
              <span class="one"></span> <span class="two"></span>
              <div class="icon">
                <img src="../../assets/images/icon/f-icon-3.png" alt="" />
              </div>
              <div class="core-features__box-content">
                <a href="login.html" class="d-block">
                  <h4>Return & Refund</h4>
                </a>
                <p>
                  Everybody different which the why give offer styles for every
                  body.
                </p>
              </div>
            </div>
          </div>
          <div
            class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated"
            data-wow-delay="0.5s"
          >
            <div class="core-features__box d-flex me-0">
              <span class="one"></span> <span class="two"></span>
              <div class="icon">
                <img src="../../assets/images/icon/f-icon-4.png" alt="" />
              </div>
              <div class="core-features__box-content">
                <a href="login.html" class="d-block">
                  <h4>Quality Support</h4>
                </a>
                <p>
                  Everybody different which the why give offer styles for every
                  body.
                </p>
              </div>
            </div>
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
                <div class="review-one__single-content">
                  <div class="review-one__aurthor">
                    <div class="thumb">
                      <img
                        src="../../assets/images/testimonial/testimonial-v1-1.png"
                        alt=""
                      />
                    </div>
                    <span class="quate">
                      <i class="flaticon-right-quotes-symbol"></i>
                    </span>
                  </div>
                  <div class="review-one__review-text">
                    <p>
                      “Quickly explot worldwide leadership long-term high-impact
                      "outside the box thinking. Quickly network synergistic
                      enterprise customer service”
                    </p>
                    <h4><a href="#0">Ana Fleming </a></h4>
                    <span> Web Developer</span>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide class="review-one__single-review">
                <div class="review-one__single-content">
                  <div class="review-one__aurthor">
                    <div class="thumb">
                      <img
                        src="../../assets/images/testimonial/testimonial-v1-2.png"
                        alt=""
                      />
                    </div>
                    <span class="quate">
                      <i class="flaticon-right-quotes-symbol"></i>
                    </span>
                  </div>
                  <div class="review-one__review-text">
                    <p>
                      “Quickly explot worldwide leadership long-term high-impact
                      "outside the box thinking. Quickly network synergistic
                      enterprise customer service”
                    </p>
                    <h4><a href="#0">Elaine Hayes</a></h4>
                    <span>UI/UX Designer </span>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide class="review-one__single-review">
                <div class="review-one__single-content">
                  <div class="review-one__aurthor">
                    <div class="thumb">
                      <img
                        src="../../assets/images/testimonial/testimonial-v1-3.png"
                        alt=""
                      />
                    </div>
                    <span class="quate">
                      <i class="flaticon-right-quotes-symbol"></i>
                    </span>
                  </div>
                  <div class="review-one__review-text">
                    <p>
                      “Quickly explot worldwide leadership long-term high-impact
                      "outside the box thinking. Quickly network synergistic
                      enterprise customer service”
                    </p>
                    <h4><a href="#0">Jane Young </a></h4>
                    <span>Web Engineer </span>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide class="review-one__single-review">
                <div class="review-one__single-content">
                  <div class="review-one__aurthor">
                    <div class="thumb">
                      <img
                        src="../../assets/images/testimonial/testimonial-v1-2.png"
                        alt=""
                      />
                    </div>
                    <span class="quate">
                      <i class="flaticon-right-quotes-symbol"></i>
                    </span>
                  </div>
                  <div class="review-one__review-text">
                    <p>
                      “Quickly explot worldwide leadership long-term high-impact
                      "outside the box thinking. Quickly network synergistic
                      enterprise customer service”
                    </p>
                    <h4><a href="#0">Kim Douglas </a></h4>
                    <span>React Developer</span>
                  </div>
                </div>
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

import NewsletterPopup from "@/components/common/popups/NewsletterPopup.vue";
import CategoryCard from "@/components/features/home/CategoryCard.vue";

import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/autoplay";

export default {
  name: "Index",
  components: {
    Swiper,
    SwiperSlide,
    NewsletterPopup,
    CategoryCard
  },
  data() {
    return {
      isPopupActive: true,
      modules: [Pagination, Autoplay],
    }
  },
  methods: {
    closePopup() {
      this.isPopupActive = false
    }
  }
};
</script>

<style scoped></style>
