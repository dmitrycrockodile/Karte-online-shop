<template>
  <div v-if="isLoading" class="loader"><span>Karte...</span></div>
  <main v-if="!isLoading">
    <!--Start Shop Details Breadcrumb-->
    <div class="shop-details-breadcrumb wow fadeInUp animated overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="shop-details-inner">
              <ul class="shop-details-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">Shop Details</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End Shop Details Breadcrumb-->
    <!--Start Shop Details Top-->
    <section class="shop-details-top two">
      <div class="container">
        <div class="row mt--30">
          <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
            <div class="single-product-box one">
              <swiper
                :spaceBetween="10"
                :slides-per-view="1"
                :pagination="{ clickable: true }"
                :modules="modules"
                :navigation="{
                  nextEl: '.mainNextArrow',
                  prevEl: '.mainPrevArrow',
                }"
                :thumbs="{ swiper: thumbsSwiper }"
                v-if="product.product_images.length"
                class="big-product single-product-one slider-for"
              >
                <div v-if="product.old_price !== null" class="ptag">
                  <span class="one">{{
                    this.countDiscountPercentage(
                      product.old_price,
                      product.price
                    )
                  }}</span>
                </div>

                <swiper-slide v-for="image in product.product_images">
                  <div class="single-item">
                    <img :src="image.url" :alt="image.title" />
                  </div>
                </swiper-slide>

                <button class="love"><i class="flaticon-like"></i></button>

                <button
                  class="slider-arrow mainPrevArrow"
                  aria-disabled="false"
                >
                  <i class="flaticon-left-arrow-1"></i>
                </button>
                <button
                  class="slider-arrow mainNextArrow"
                  aria-disabled="false"
                >
                  <i class="flaticon-next-1"></i>
                </button>
              </swiper>
              <div
                v-if="!product.product_images.length"
                class="big-product single-product-one"
              >
                <div class="single-item">
                  <img :src="product.preview_image" :alt="product.title" />
                  <div v-if="product.old_price !== null" class="ptag">
                    <span class="one">{{
                      this.countDiscountPercentage(
                        product.old_price,
                        product.price
                      )
                    }}</span>
                  </div>
                  <a href="#0" class="love"><i class="flaticon-like"></i></a>
                </div>
              </div>
              <div class="navholder" v-if="product.product_images.length">
                <swiper
                  @swiper="setThumbsSwiper"
                  :pagination="{ clickable: true }"
                  :spaceBetween="10"
                  :slidesPerView="3"
                  :freeMode="true"
                  :watchSlidesProgress="true"
                  :modules="modules"
                  class="single-product-one-nav slider-nav"
                >
                  <swiper-slide v-for="image in product.product_images">
                    <span class="single-item">
                      <img :src="image.url" :alt="image.title" />
                    </span>
                  </swiper-slide>
                </swiper>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
            <div class="shop-details-top-right">
              <div class="shop-details-top-right-content-box">
                <div class="shop-details-top-review-box">
                  <div class="shop-details-top-review">
                    <ul>
                      <li><i class="flaticon-star-1"></i></li>
                      <li><i class="flaticon-star-1"></i></li>
                      <li><i class="flaticon-star-1"></i></li>
                      <li><i class="flaticon-star-1"></i></li>
                      <li><i class="flaticon-star-1"></i></li>
                    </ul>
                    <p>(2 Reviews)</p>
                  </div>
                </div>
                <div class="shop-details-top-title">
                  <h3>{{ product.title }}</h3>
                </div>
                <ul class="shop-details-top-info">
                  <li><span>SKU:</span> 25d5214</li>
                  <li><span>Vendor:</span> Flemeno</li>
                </ul>
                <div class="shop-details-top-price-box">
                  <h3>
                    ${{ product.price }}
                    <del v-if="product.old_price">${{ product.old_price }}</del>
                  </h3>
                  <p>(+15% Vat Included)</p>
                </div>
                <p class="shop-details-top-product-sale">
                  <span>20</span> Products sold in last 12 hours
                </p>
                <div v-if="product.sizes.length" class="shop-details-top-size-box">
                  <h4 v-if="choosenProductOptions.selectedSize">Size: ({{ choosenProductOptions.selectedSize.title }})</h4>
                  <h4 v-else>Choose the size</h4>
                  <div class="shop-details-top-size-list-box">
                    <SizesRadioGroup :setValue="setSelectedSize" :sizes="product.sizes" :selectedValue="choosenProductOptions.selectedSize" />
                    
                    <p class="shop-details-top-size-guide">
                      <a href="#0">Size Guide</a>
                    </p>
                  </div>
                </div>
                <div v-if="product.colors.length" class="shop-details-top-color-sky-box">
                  <h4 v-if="choosenProductOptions.selectedColor">Color: ({{ choosenProductOptions.selectedColor.title }})</h4>
                  <h4 v-else>Choose the color</h4>
                  
                  <ColorsRadioGroup 
                    :colors="product.colors" 
                    :selectedValue="choosenProductOptions.selectedColor" 
                    :setValue="setSelectedColor" 
                    type="regular"
                  />
                    
                </div>
                <ul class="shop-details-top-ask-question">
                  <li>
                    <a href="#0">
                      <div class="icon">
                        <i class="flaticon-left-and-right-arrows"></i>
                      </div>
                      <div class="text">
                        <p>Add to Compare</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#0">
                      <div class="icon">
                        <i class="flaticon-chat-bubble"></i>
                      </div>
                      <div class="text">
                        <p>Ask Question</p>
                      </div>
                    </a>
                  </li>
                </ul>
                <div class="timer-box">
                  <h4>Running Offer</h4>
                  <div class="countdown-timer">
                    <div class="default-coundown">
                      <div class="box">
                        <CountdownTimer countdownTime="2024-12-31T23:59:59" />
                      </div>
                    </div>
                  </div>
                </div>
                <p class="shop-details-top-product-sale">
                  <span>20</span>
                  Persons looking for this product
                </p>
                <div class="product-quantity">
                  <h4>Quantity</h4>
                  <div
                    class="product-quantity-box d-flex align-items-center flex-wrap"
                  >

                    <QuantitySelector 
                      v-model="choosenProductOptions.selectedQuantity" 
                      :min="1" 
                      :max="product.count" 
                    />

                    <div class="product-quantity-check">
                      <template v-if="product.count">
                        <i class="flaticon-select"></i>
                        <p>In Stock</p>
                      </template>
                      <template v-else-if="!product.count">
                        <i class="fa-regular fa-rectangle-xmark"></i>
                        <p>Not in stock</p>
                      </template>
                    </div>
                  </div>
                </div>
                <div v-if="product.count" class="shop-details-top-order-now">
                  <i class="flaticon-point"></i>
                  <p>Order Now, Only {{ product.count }} Left !</p>
                </div>
                <div class="shop-details-top-cart-box-btn">
                  <button
                    class="btn--primary style2 add-btn"
                    type="submit"
                    @click.prevent="addToCart({ product, choosenProductOptions })"
                    :disabled="!choosenProductOptions.selectedSize || !choosenProductOptions.selectedSize"
                  >
                    Add to Cart
                  </button>
                </div>
                <div class="shop-details-top-free-shipping">
                  <i class="flaticon-shipping"></i>
                  <p>SPENT <span>$399.00</span> MORE FOR FREE SHIPPING</p>
                </div>
                <div class="shop-details-top-social-box">
                  <p>Share:</p>
                  <ul class="ps-1 social_link d-flex align-items-center">
                    <li>
                      <a
                        href="https://www.facebook.com/"
                        class="active"
                        target="_blank"
                        ><i class="flaticon-facebook-app-symbol"></i
                      ></a>
                    </li>
                    <li>
                      <a href="https://www.youtube.com/" target="_blank"
                        ><i class="flaticon-youtube"></i
                      ></a>
                    </li>
                    <li>
                      <a href="https://twitter.com/" target="_blank"
                        ><i class="flaticon-twitter"></i
                      ></a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/" target="_blank"
                        ><i class="flaticon-instagram"></i
                      ></a>
                    </li>
                  </ul>
                </div>
                <div class="checked-box">
                  <form>
                    <div class="form-group">
                      <input type="checkbox" id="html" />
                      <label for="html"
                        >I agree with all company terms & condition</label
                      >
                    </div>
                  </form>
                </div>
                <div class="shop-details-top-buy-now-btn">
                  <a href="#" class="btn--primary">Buy It Now</a>
                </div>
                <div class="shop-details-top-safe-checkout">
                  <h4>Guranteed Safe Checkout</h4>
                  <ul class="shop-details-top-safe-checkout-list">
                    <li>
                      <div class="shop-details-top-safe-checkout-img">
                        <a href="#0">
                          <img
                            src="../../assets/images/home-four/method-1.jpg"
                            alt="VISA"
                          />
                        </a>
                      </div>
                    </li>
                    <li>
                      <div class="shop-details-top-safe-checkout-img">
                        <a href="#0">
                          <img
                            src="../../assets/images/home-four/method-2.jpg"
                            alt="MasterCard"
                          />
                        </a>
                      </div>
                    </li>
                    <li>
                      <div class="shop-details-top-safe-checkout-img">
                        <a href="#0">
                          <img
                            src="../../assets/images/home-four/method-3.jpg"
                            alt="Skrill"
                          />
                        </a>
                      </div>
                    </li>
                    <li>
                      <div class="shop-details-top-safe-checkout-img">
                        <a href="#0">
                          <img
                            src="../../assets/images/home-four/method-4.jpg"
                            alt="PayPal"
                          />
                        </a>
                      </div>
                    </li>
                    <li>
                      <div class="shop-details-top-safe-checkout-img">
                        <a href="#0">
                          <img
                            src="../../assets/images/home-four/method-5.jpg"
                            alt="Maestro"
                          />
                        </a>
                      </div>
                    </li>
                    <li>
                      <div class="shop-details-top-safe-checkout-img">
                        <a href="#0">
                          <img
                            src="../../assets/images/home-four/method-6.jpg"
                            alt="PayGate"
                          />
                        </a>
                      </div>
                    </li>
                    <li>
                      <div class="shop-details-top-safe-checkout-img">
                        <a href="#0">
                          <img
                            src="../../assets/images/home-four/method-7.jpg"
                            alt="American Express"
                          />
                        </a>
                      </div>
                    </li>
                  </ul>
                </div>
                <p class="shop-details-top-product-delivery">
                  This product estimated delivery between
                  <span>Wednesday 27 October</span> <br />
                  <span>Tuesday 02 November</span>
                </p>
                <ul class="shop-details-top-category-tags">
                  <li>
                    Category: <span>{{ product.category.title }}</span>
                  </li>
                  <li>
                    Tags:
                    <span v-for="(tag, i) in product.tags" :key="tag.id">
                      {{
                        i + 1 === product.tags.length
                          ? tag.title
                          : `${tag.title}, &nbsp;`
                      }}
                    </span>
                  </li>
                </ul>
                <ul class="shop-details-top-feature">
                  <li>
                    <div class="icon"><i class="flaticon-portfolio"></i></div>
                    <div class="text">
                      <p>Money back guarantee</p>
                    </div>
                  </li>
                  <li>
                    <div class="icon"><i class="flaticon-truck"></i></div>
                    <div class="text">
                      <p>Free Shipping & Return</p>
                    </div>
                  </li>
                  <li>
                    <div class="icon"><i class="flaticon-security"></i></div>
                    <div class="text">
                      <p>Comportable Support</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Shop Details Top-->
    <!-- productdrescription-tabStart -->
    <section class="product pt-60 pb-60 wow fadeInUp overflow-hidden">
      <div class="container">
        <div class="row wow fadeInUp animated">
          <div class="col-12">
            <ul
              class="nav product-details-nav nav-one nav-pills justify-content-center"
              id="pills-tab-two"
              role="tablist"
            >
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="pills-description-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-description"
                  type="button"
                  role="tab"
                  aria-controls="pills-description"
                  aria-selected="true"
                >
                  Description
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-additional-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-additional"
                  type="button"
                  role="tab"
                  aria-controls="pills-additional"
                  aria-selected="false"
                >
                  Additional
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-sizechart-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-sizechart"
                  type="button"
                  role="tab"
                  aria-controls="pills-sizechart"
                  aria-selected="false"
                >
                  Size Chart
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-review-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-review"
                  type="button"
                  role="tab"
                  aria-controls="pills-review"
                  aria-selected="false"
                >
                  Review
                </button>
              </li>
            </ul>
          </div>
        </div>
        <div class="row wow fadeInUp animated">
          <div class="tab-content" id="pills-tabContent-two">
            <div
              class="tab-pane fade show active"
              id="pills-description"
              role="tabpanel"
              aria-labelledby="pills-description-tab"
            >
              <div class="product-drescription">
                <h4>Product Details:</h4>
                <p>
                  {{ product.description }}
                </p>
                <div class="row align-items-center">
                  <div class="col-lg-4 mt-30">
                    <div class="thumb">
                      <img :src="product.preview_image" :alt="product.title" />
                    </div>
                  </div>
                  <div class="col-lg-8 mt-30">
                    <h4>Specification:</h4>
                    <ul class="drescription-list">
                      <li>
                        1. Adipiscing hac cubilia, fermentum ipsum auctor
                        parturient tempus lobortis fermentum.
                      </li>
                      <li>
                        2. Euismod disagree soler imperdiet vehicula pede eros
                        ipsum cras mi feugiat.
                      </li>
                      <li>
                        3. Rhoncus consequat phasellus donec suspendisse
                        scelerisque facilisis gravida porttitor turpis.
                      </li>
                      <li>
                        4. Consequat phasellus donec suspendisse scelerisque
                        facilisis gravida porttitor turpis.
                      </li>
                      <li>
                        5. Consequat phasellus donec suspendisse scelerisque
                        facilisis gravida porttitor
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="pills-additional"
              role="tabpanel"
              aria-labelledby="pills-additional-tab"
            >
              <div class="product-drescription">
                <p class="pt-0">
                  {{ product.content }}
                </p>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="pills-sizechart"
              role="tabpanel"
              aria-labelledby="pills-sizechart-tab"
            >
              <div class="product-drescription">
                <div class="size-chirt">
                  <h4>Size Guide</h4>
                  <p class="pt-0">
                    Assertively conceptualize parallel process improvements
                    through user friendly colighue to action items.
                  </p>
                  <div class="size-tabble">
                    <table>
                      <thead>
                        <tr>
                          <th>Size</th>
                          <th>XXS - XS</th>
                          <th>XS - S</th>
                          <th>S - M</th>
                          <th>M - L</th>
                          <th>L - XL</th>
                          <th>XL - XXL</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>ARGENTINA</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                          <td>12</td>
                        </tr>
                        <tr>
                          <td>BOLIVIA</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                          <td>12</td>
                          <td>13</td>
                        </tr>
                        <tr>
                          <td>COLOMBIA</td>
                          <td>26</td>
                          <td>28</td>
                          <td>30</td>
                          <td>32</td>
                          <td>34</td>
                          <td>36</td>
                        </tr>
                        <tr>
                          <td>China</td>
                          <td>34</td>
                          <td>36</td>
                          <td>38</td>
                          <td>40</td>
                          <td>42</td>
                          <td>44</td>
                        </tr>
                        <tr>
                          <td>MEXICO</td>
                          <td>32</td>
                          <td>34</td>
                          <td>36</td>
                          <td>38</td>
                          <td>40</td>
                          <td>42</td>
                        </tr>
                        <tr>
                          <td>JAMAICA</td>
                          <td>40</td>
                          <td>42</td>
                          <td>44</td>
                          <td>46</td>
                          <td>48</td>
                          <td>50</td>
                        </tr>
                        <tr>
                          <td>MEXICO</td>
                          <td>32</td>
                          <td>34</td>
                          <td>36</td>
                          <td>38</td>
                          <td>40</td>
                          <td>42</td>
                        </tr>
                        <tr>
                          <td>Australia</td>
                          <td>6</td>
                          <td>8</td>
                          <td>10</td>
                          <td>12</td>
                          <td>14</td>
                          <td>16</td>
                        </tr>
                        <tr>
                          <td>USA</td>
                          <td>33</td>
                          <td>44</td>
                          <td>55</td>
                          <td>66</td>
                          <td>77</td>
                          <td>88</td>
                        </tr>
                        <tr>
                          <td>UK</td>
                          <td>6</td>
                          <td>8</td>
                          <td>10</td>
                          <td>12</td>
                          <td>14</td>
                          <td>16</td>
                        </tr>
                        <tr>
                          <td><strong>Pant</strong></td>
                          <td>22-23</td>
                          <td>24-25</td>
                          <td>26-27</td>
                          <td>28-29</td>
                          <td>30-31</td>
                          <td>32-33</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="pills-review"
              role="tabpanel"
              aria-labelledby="pills-review-tab"
            >
              <div class="product-drescription">
                <div class="review-single pt-0 hed">
                  <div class="ratting">
                    <i class="flaticon-star-1"></i>
                    <i class="flaticon-star-1"></i>
                    <i class="flaticon-star-1"></i>
                    <i class="flaticon-star-1"></i>
                    <i class="flaticon-star-1"></i>
                    <span class="ps-2">BASED ON 100 REVIEW</span>
                  </div>
                </div>
                <div class="review-single">
                  <div class="left">
                    <div class="ratting">
                      <i class="flaticon-star-1"></i>
                      <i class="flaticon-star-1"></i>
                      <i class="flaticon-star-1"></i>
                      <i class="flaticon-star-1"></i>
                      <i class="flaticon-star-1"></i>
                    </div>
                    <h6>
                      Vary Good quality Theme
                      <span>Raul Bates on January 28, 2022</span>
                    </h6>
                    <p>
                      Assertively conceptualize parallel process improvements
                      through user friendly colighue to action items.
                      Interactively antidos cultivate interdependent customer
                      service without clicks-and-mortar e-services.
                    </p>
                  </div>
                  <a href="#0" class="right-box"> Report this Comments </a>
                </div>
                <div class="review-single">
                  <div class="left">
                    <div class="ratting">
                      <i class="flaticon-star-1"></i>
                      <i class="flaticon-star-1"></i>
                      <i class="flaticon-star-1"></i>
                      <i class="flaticon-star-1"></i>
                      <i class="flaticon-star-1"></i>
                    </div>
                    <h6>
                      Amazing Theme <span>Kurt Morgan on January 28, 2022</span>
                    </h6>
                    <p>
                      Assertively conceptualize parallel process improvements
                      through user friendly colighue to action items.
                      Interactively antidos cultivate interdependent customer
                      service without clicks-and-mortar e-services.
                    </p>
                  </div>
                  <a href="#0" class="right-box">Report this Comments </a>
                </div>
                <div class="review-from-box mt-30">
                  <h6>Write a Review</h6>
                  <form action="#" class="review-from">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="ratting-box">
                          <p>RATING</p>
                          <div class="ratting">
                            <i class="flaticon-star-1"></i>
                            <i class="flaticon-star-1"></i>
                            <i class="flaticon-star-1"></i>
                            <i class="flaticon-star-1"></i>
                            <i class="flaticon-star-1"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="name">NAME</label>
                          <input
                            type="text"
                            id="name"
                            class="form-control"
                            placeholder="David Warner"
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="number">Number</label>
                          <input
                            type="text"
                            id="number"
                            class="form-control"
                            placeholder="Phone Number"
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="email"> Email </label>
                          <input
                            type="text"
                            id="email"
                            class="form-control"
                            placeholder="support@gmail.com"
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="namee"> REVIEW TITLE</label>
                          <input
                            type="text"
                            id="namee"
                            class="form-control"
                            placeholder="Give your review title"
                          />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group m-0">
                          <label for="email">BODY OF REVIEW (1500) </label>
                          <textarea
                            placeholder="Write Your Comments Here"
                          ></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn--primary style2">
                      Submit Review
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- productdrescription-tab End -->
    <!-- recent-products Start -->
    <section class="recent-products pt-60 pb-120 overflow-hidden wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp animated">
            <div class="section-head text-center">
              <h2>New Products</h2>
            </div>
          </div>
        </div>
        <div class="row mt-30 wow fadeInUp animated">
          <swiper
            :spaceBetween="10"
            :slides-per-view="4"
            :modules="modules"
            :navigation="{
              nextEl: '.recentNextArrow',
              prevEl: '.recentPrevArrow',
            }"
            class="catagory-slider"
          >
            <swiper-slide
              v-for="product in recentProducts"
              class="products-grid-one"
              :key="product.id"
            >

              <ProductCard :product="product" />

            </swiper-slide>

            <button class="slider-arrow recentPrevArrow" aria-disabled="false">
              <i class="flaticon-left-arrow-1"></i>
            </button>
            <button class="slider-arrow recentNextArrow" aria-disabled="false">
              <i class="flaticon-next-1"></i>
            </button>
          </swiper>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
import { ref } from "vue";
import { mapActions } from "vuex";

import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Thumbs } from "swiper/modules";

import CountdownTimer from "@/components/CountdownTimer.vue";
import ProductPopup from "@/components/popups/ProductPopup.vue";
import SizesRadioGroup from "@/components/radios/SizesRadioGroup.vue";
import ColorsRadioGroup from "@/components/radios/ColorsRadioGroup.vue";
import QuantitySelector from "@/components/QuantitySelector.vue";
import ProductCard from "@/components/ProductCard.vue";

import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/thumbs";

export default {
  name: "Show",
  components: {
    Swiper,
    SwiperSlide,
    CountdownTimer,
    ProductPopup,
    SizesRadioGroup,
    ColorsRadioGroup,
    QuantitySelector,
    ProductCard,
  },
  mounted() {
    this.getRecentProducts();
    this.getProduct(this.$route.params.id);
  },
  setup() {
    const thumbsSwiper = ref(null);

    const setThumbsSwiper = (swiper) => {
      thumbsSwiper.value = swiper;
    };

    return {
      thumbsSwiper,
      setThumbsSwiper,
      modules: [Navigation, Thumbs],
    };
  },
  data() {
    return {
      product: {},
      recentProducts: [],
      isLoading: true,
      minProductQuantity: 1,
      maxProductQuantity: null,
      choosenProductOptions: {
        selectedQuantity: 1,
        selectedColor: null,
        selectedSize: null,
      },
    };
  },
  methods: {
    getProduct(id) {
      this.axios.get(`http://localhost:8876/api/products/${id}`).then((res) => {
        this.product = res.data.data;
        this.maxProductQuantity = res.data.data.count;
      });
    },
    getRecentProducts() {
      this.axios
        .post("http://localhost:8876/api/products", {
          tags: { title: "new" },
        })
        .then((res) => {
          this.recentProducts = res.data.data;
        })
        .finally(() => {
          this.isLoading = false;
        });
    },
    countDiscountPercentage(oldPrice, newPrice) {
      if (!oldPrice) return "";

      const percentageChange = ((newPrice - oldPrice) / oldPrice) * 100;
      return `${percentageChange.toFixed()}%`;
    },
    goToProductPage(productId) {
      this.$router.push({ name: "products.show", params: { id: productId } });
    },
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

<style scoped>
.add-btn:disabled {
  cursor: default;
  background-color: #ccc;
}
.add-btn:disabled:hover:before {
  -webkit-transform: scale(0);
  transform: scale(0);
  -webkit-transform-origin: none;
  transform-origin: none;
}
</style>