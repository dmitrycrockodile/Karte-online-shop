<template>
   <select
      @change.prevent="handleSelectChange"
      class="wide"
      v-model="selectedValue"
   >
      <option value="all">All</option>
      <option value="bestseller">Best selling</option>
      <option value="sale">On sale</option>
      <option value="title(ASC)">Alphabetically, A-Z</option>
      <option value="title(DESC)">Alphabetically, Z-A</option>
      <option value="price(ASC)">Price, low to high</option>
      <option value="price(DESC)">Price, high to low</option>
   </select>
</template>

<script>
   export default {
      name: "Sort Select",
      props: {
         "onChange": { type: Function, required: true },
      },
      data() {
         return {
            selectedValue: 'all',
         }
      },
      methods: { 
         handleSelectChange() {
            this.onChange(this.selectedValue);
         },
      },
   }
</script>