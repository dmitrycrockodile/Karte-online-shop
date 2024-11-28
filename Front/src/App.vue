<template>
  <div>
    <Header :headerClasses="headerClasses" />

    <router-view :key="$route.fullPath"></router-view>

    <Footer />

    <!-- Scroll bottom to top -->
    <button
      :class="scrollButtonClasses"
      class="scrollToTop"
      @click="scrollToTop"
    >
      <i class="flaticon-up-arrow"></i>
    </button>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import axios from "axios";

import Header from "@/components/common/Header.vue";
import Footer from "@/components/common/Footer.vue";

export default {
  name: "App",
  data() {
    return {
      scrollPosition: 0,
    };
  },
  components: {
    Header,
    Footer,
  },
  computed: {
    scrollButtonClasses() {
      return {
        fadeInDown: this.scrollPosition >= 150,
        animated: this.scrollPosition >= 150,
        activeScrollToTop: this.scrollPosition >= 150,
      };
    },
    headerClasses() {
      return {
        animated: this.scrollPosition >= 150,
        fadeInDown: this.scrollPosition >= 150,
        fixed: this.scrollPosition >= 150,
      };
    },
  },
  methods: {
    ...mapActions('categories', ['setCategories']),
    scrollToTop() {
      window.scrollTo({
      top: 0,
      behavior: "smooth",
      });
    },
    handleScroll() {
      this.scrollPosition = window.scrollY;
    },
    getCategories() {
      axios.get('http://localhost:8876/api/categories')
        .then(res => {
          this.setCategories(res.data.data)
        })
    },
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll);
    this.handleScroll();

    this.getCategories();
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this.handleScroll);
  },
};
</script>