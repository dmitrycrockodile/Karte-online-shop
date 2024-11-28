<template>
   <ul class="shop-details-top-size-list">
      <li
        :class="{ active: selectedValue && selectedValue.title === size.title}"
        v-for="size in sizes"
        :key="size.id"
        @click.prevent="setValue(size)"
      >
        <button
         
        >
          {{ size.title }}
        </button>
      </li>
   </ul>
</template>

<script>
   export default {
      name: "Sizes Radio Group",
      props: {
         "selectedValue": { type: Object },
         "sizes": { type: Array },
         "setValue": { type: Function },
      }
   }
</script>