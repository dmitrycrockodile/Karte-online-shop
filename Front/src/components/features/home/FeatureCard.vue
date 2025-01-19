<template>
   <div class="core-features__box d-flex">
      <span class="one"></span> <span class="two"></span>
      <div class="icon">
        <img :src="icon" :alt="title" />
      </div>
      <div class="core-features__box-content">
        <router-link :to="user ? { name: 'account.index' } : { name: 'login.index' }" class="d-block">
          <h4>{{ title }}</h4>
        </router-link>
        <slot></slot>
      </div>
    </div>
</template>

<script>
   import { mapGetters } from "vuex";

   export default {
      name: 'Feature Card',
      props: {
         icon: String,
         title: String,
      },
      computed: {
         ...mapGetters({
            user: 'auth/getUserData'
         }), 
      },
   }
</script>

<style scoped>

</style>