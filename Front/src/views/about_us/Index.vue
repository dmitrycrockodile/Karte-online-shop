<template>
  <main class="overflow-hidden">
    <BreadCrumps 
      :backgroundImageUrl="pageBGImage" 
      :title="'About us'"
    />
    
    <section class="about pt-120 pb-120">
      <div class="container">
        <div
          class="row g-0 about__background align-items-center justify-content-lg-between justify-content-center"
        >
          <div class="col-lg-5 col-10 wow fadeInLeft animated">
            <div class="about__img">
              <div class="img-box">
                <img
                  src="../../assets/images/inner-pages/about-v1-img2.png"
                  alt=""
                />
              </div>
              <div class="about__img-inner">
                <img
                  src="../../assets/images/inner-pages/about-v1-img.jpg"
                  alt=""
                />
              </div>
            </div>
          </div>
          
          <div class="col-lg-7 col-md-11">
            <div class="about__content text-center">
              <div class="shape1">
                <img
                  src="../../assets/images/shape/about-v1-shape1.png"
                  alt=""
                />
              </div>
              <div class="shape2">
                <img
                  src="../../assets/images/shape/about-v1-shape2.png"
                  alt=""
                />
              </div>
              <div class="title wow fadeInUp animated">
                <h6>Our Company</h6>
                <h2>The Highest Quality <br />Products</h2>
              </div>
              <div class="text wow fadeInUp animated">
                <p>
                  Monotonectally initiate covalent intellectual capital without
                  scalable mindshare. Synergistically recaptiualize maintainable
                  users whereas fully tested initiatives. Appropriately create
                  superior scenarios for professional services. Holisticly
                  envision emerging portal egestas sapien hac urna telluses nam
                  pulvinar per luctus ipsum.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="mission">
      <div class="shape1">
        <img src="../../assets/images/shape/mission-v1-shape1.png" alt="" />
      </div>
      <div class="shape2">
        <img src="../../assets/images/shape/mission-v1-shape2.png" alt="" />
      </div>
      <div class="auto-container container mission__background pt-120 pb-120">
        <div class="container">
          <div class="row mt--30 align-items-center justify-content-center">
            <div class="col-lg-6 col-md-10 mt-30">
              <div class="mission__content text-lg-start text-center">
                <h2 class="wow fadeInUp animated">Our Mission</h2>
                <p class="wow fadeInUp animated">
                  Energistically optimize reliable leadership skills and
                  cross-platform internal or "organic" sources. Dramatically
                  restore orthogonal ROI whereas flexib "outside the box"
                  thinking. Uniquely re-engineer top-line methodologies whereas
                  intermandated bandwidth. Authoritatively strategize accurate
                  linkage with tactical
                </p>
                <div class="btn-box wow fadeInUp animated">
                  <router-link :to="{ name: 'faq.index' }" class="btn--secondary style2">Get More Info</router-link>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 mt-30">
              <div class="mission__thumb wow fadeInRight animated">
                <img
                  src="../../assets/images/inner-pages/mission-v1-img1.jpg"
                  alt=""
                />
                <div class="content-box">
                  <div class="icon"><i class="flaticon-quote"></i></div>
                  <h3>
                    Success usually comes to those who are too busy to be
                    looking for it
                  </h3>
                  <div class="author-box">
                    <h5>Sowat Ahsan <span> Founder, CEO </span></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="team pt-120 pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-9">
            <div class="section-head text-center wow fadeInUp animated">
              <h2 class="title">
                We pride ourselves on have a team of high skilled
              </h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-4 col-lg-4 col-md-6 col-10 wow fadeInUp animated">
            <div class="team__single mt-30">
              <div class="team__single-img">
                <img
                  src="../../assets/images/inner-pages/team_member_1.jpg"
                  alt=""
                />
                <div class="overlay-text">
                  <ul>
                    <li>
                      <h6>
                        <a href="https://www.facebook.com/" target="_blank"
                          >Facebook</a
                        >
                      </h6>
                    </li>
                    <li>
                      <h6>
                        <a href="https://twitter.com/" target="_blank"
                          >Twitter</a
                        >
                      </h6>
                    </li>
                    <li>
                      <h6>
                        <a href="https://www.instagram.com/" target="_blank"
                          >Instagram</a
                        >
                      </h6>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h2>Heidi Roy<span>Founder</span></h2>
              </div>
            </div>
          </div>
          
          <div class="col-xl-4 col-lg-4 col-md-6 col-10 wow fadeInUp animated">
            <div class="team__single mt-30">
              <div class="team__single-img">
                <img
                  src="../../assets/images/inner-pages/team_member_2.jpg"
                  alt=""
                />
                <div class="overlay-text">
                  <ul>
                    <li>
                      <h6>
                        <a href="https://www.facebook.com/" target="_blank"
                          >Facebook</a
                        >
                      </h6>
                    </li>
                    <li>
                      <h6>
                        <a href="https://twitter.com/" target="_blank"
                          >Twitter</a
                        >
                      </h6>
                    </li>
                    <li>
                      <h6>
                        <a href="https://www.instagram.com/" target="_blank"
                          >Instagram</a
                        >
                      </h6>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h2>Jara Malika<span>CEO</span></h2>
              </div>
            </div>
          </div>
          
          <div class="col-xl-4 col-lg-4 col-md-6 col-10 wow fadeInUp animated">
            <div class="team__single mt-30">
              <div class="team__single-img">
                <img
                  src="../../assets/images/inner-pages/team_member_3.jpg"
                  alt=""
                />
                <div class="overlay-text">
                  <ul>
                    <li>
                      <h6>
                        <a href="https://www.facebook.com/" target="_blank"
                          >Facebook</a
                        >
                      </h6>
                    </li>
                    <li>
                      <h6>
                        <a href="https://twitter.com/" target="_blank"
                          >Twitter</a
                        >
                      </h6>
                    </li>
                    <li>
                      <h6>
                        <a href="https://www.instagram.com/" target="_blank"
                          >Instagram</a
                        >
                      </h6>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h2>Trevor Davis<span>Founder</span></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="testimonial-two pb-120">
      <div class="container">
        <div class="section-header text-center wow fadeInUp animated">
          <p>Testimonials</p>
          <h2>Happy Client's</h2>
        </div>
        <div class="row">
          <div class="col-xl-12 wow fadeInUp animated">
            <div class="testimonial-two__container">
              <div class="testimonial-two__single">
                <div class="testimonial-two__single-inner">
                  <div class="testimonial-two__single-img">
                    <img
                      src="../../assets/images/testimonial/client_1.jpg"
                      alt=""
                    />
                  </div>
                  <div class="testimonial-two__single-content">
                    <div class="text">
                      <p>
                        “Grow tactical "outside the box" thinking whereas
                        principle entered internal or organic" sources”
                      </p>
                    </div>
                    <div class="client-info">
                     <h6>David Smith</h6>
                     <span>Founder</span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="testimonial-two__single">
                <div class="testimonial-two__single-inner">
                  <div class="testimonial-two__single-img">
                    <img
                      src="../../assets/images/testimonial/client_2.jpg"
                      alt=""
                    />
                  </div>
                  <div class="testimonial-two__single-content">
                    <div class="text">
                      <p>
                        “Grow tactical "outside the box" thinking whereas
                        principle entered internal or organic" sources”
                      </p>
                    </div>
                    <div class="client-info">
                     <h6>Christina Meyer</h6>
                     <span>Founder</span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="testimonial-two__single">
                <div class="testimonial-two__single-inner">
                  <div class="testimonial-two__single-img">
                    <img
                      src="../../assets/images/testimonial/client_3.jpg"
                      alt=""
                    />
                  </div>
                  <div class="testimonial-two__single-content">
                    <div class="text">
                      <p>
                        “Grow tactical "outside the box" thinking whereas
                        principle entered internal or organic" sources”
                      </p>
                    </div>
                    <div class="client-info">
                     <h6>Marsha Webb</h6>
                     <span>Founder</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <div class="partner-one mb-120">
      <div class="container wow fadeInUp animated">
        <div class="row wow fadeInUp animated">
          <div class="partner-one__container">
            <div
              href="#0"
              class="partner-one__brand d-flex justify-content-center align-items-center"
            >
              <img src="../../assets/images/brand/brand-logo-1.png" alt="" />
            </div>
            <div
              href="#0"
              class="partner-one__brand justify-content-center align-items-center"
            >
              <img src="../../assets/images/brand/brand-logo-2.png" alt="" />
            </div>
            <div
              href="#0"
              class="partner-one__brand justify-content-center align-items-center"
            >
              <img src="../../assets/images/brand/brand-logo-3.png" alt="" />
            </div>
            <div
              href="#0"
              class="partner-one__brand justify-content-center align-items-center"
            >
              <img src="../../assets/images/brand/brand-logo-4.png" alt="" />
            </div>
            <div
              href="#0"
              class="partner-one__brand justify-content-center align-items-center"
            >
              <img src="../../assets/images/brand/brand-logo-5.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import BreadCrumps from '@/components/common/BreadCrumps.vue';

import pageBGImage from '@/assets/images/inner-pages/about_us_bg.jpg';

export default {
  name: "About Us",
  components: {
    BreadCrumps
  },  
  data() {
    return {
        pageBGImage,
    }
  },
};
</script>

<style lang="scss" scoped>
   .testimonial-two__container {
      display: flex;
      align-items: center;
      justify-content: space-between;
   }

   .partner-one__container {
      display: flex;
      align-items: center;
      justify-content: space-around;
   }
</style>