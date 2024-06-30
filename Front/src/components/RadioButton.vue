<template>
   <label :class="['radio-button-wrapper', wrapperClass]">
      <input
        class="radio-input"
        type="radio"
        :value="value"
        :checked="isChecked"
        @change="$emit('change', $event.target.value)"
      />
      <span :class="['radio-label', labelClass]">
         <slot></slot>
      </span>
   </label>
</template>

<script>
   export default {
      name: 'RadioButton',
      model: {
         prop: 'modelValue',
         event: 'change',
      },
      props: {
         value: { type: [String, Number], required: true },
         modelValue: { required: true },
         wrapperClass: { type: String, default: '' },
         labelClass: { type: String, default: '' },
      },
      computed: {
         isChecked() {
            return this.modelValue == this.value
         }
      },
   }
</script>

<style scoped>

</style>