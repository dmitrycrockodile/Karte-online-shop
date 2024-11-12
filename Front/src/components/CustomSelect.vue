<template>
   <div class="dropdown__wrapper" ref="dropDown" :name="name">
      <div class="dropdown__selected-option" @click="isDropdownVisible = !isDropdownVisible">
         {{ selectedOption.title }}
         <i :class="`flaticon-down-arrow ${isDropdownVisible ? 'active' : ''}`"></i>
      </div>
      <transition name="slide-fade"> 
         <div class="options__wrapper" v-if="isDropdownVisible">
            <div 
               :class="`option ${isDisabledOptions[option.value] ? 'disabled' : ''}`" 
               v-for="(option, i) in options" 
               @click.prevent="!isDisabledOptions[option.value] && selectOption(option)"
               :key="i"
            >
               {{ option.title }}
            </div>
         </div>
      </transition>
   </div>
</template>

<script>
export default {
   data() {
      return {
         selectedOption: this.options[0],
         isDropdownVisible: false,
      };
   },
   props: {
      options: { type: Object, required: true },
      modelValue: { default: null },
      name: { type: String, default: ''},
   },
   methods: {
      selectOption(option) {
         this.$emit('update:modelValue', option)
         this.selectedOption = option;
         this.isDropdownVisible = false;
      },
      closeDropdown(event) {
         if (!this.$refs.dropDown.contains(event.target)) {
            this.isDropdownVisible = false;
         }
      }
   },
   computed: {
      isDisabledOptions() {
         return this.options.reduce((acc, option) => {
            acc[option.value] = this.selectedOption && this.selectedOption.value === option.value;
            return acc;
         }, {});
      },
   },
   mounted() {
      window.addEventListener('click', this.closeDropdown)
   },
   unmounted() {
      window.removeEventListener('click', this.closeDropdown)
   },
};
</script>

<style>
.dropdown__wrapper {
   cursor: pointer;
   min-width: 100px;
   height: 20px;
   margin: 0 auto;
   text-align: center;
   font-size: 12px;
   position: relative;
   z-index: 100;
   text-transform: uppercase;
}

.dropdown__selected-option {
   box-sizing: border-box;
   margin-bottom: 4px;
   height: 20px;
   font-weight: 500;
   position: relative;
}

.dropdown__selected-option i {
   display: inline-block;
   transition: all .1s;
   position: absolute;
   transform-origin: center; 
   top: 3px;
   right: 6px;
}

.dropdown__selected-option i.active {
   transform: scaleY(-1) translateY(6px);
}

.options__wrapper {
   background-color: #fff;
}

.option:hover {
   background-color: #dadada;
}

.option {
   box-sizing: border-box;
   font-weight: 400;
   line-height: 1.2;
   width: 100%;
   height: 100%;
   padding: 6px 1px 6px 1px;
   border-top: 1px solid rgba(217, 217, 217, 0.3);
}

.option.disabled {
   background-color: #d2d2d2;
   cursor: default;
}

.option:first-of-type {
   border-top: none;
}

.slide-fade-enter-active {
   transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
   transition: all 0.2s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
   transform: translateY(-20px);
   opacity: 0;
}

</style>