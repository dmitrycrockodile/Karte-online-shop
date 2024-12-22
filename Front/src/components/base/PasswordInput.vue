<template>
   <div class="form-group eye">
      <input
        :type="inputType"
        class="form-control"
        :placeholder="placeholder"
        v-model="password"
        :required="required"
        @input="emitInput"
      />
      <button type="button" @click.prevent="toggleInputType" class="icon">
        <i :class="inputType === 'password' ? 'flaticon-hidden' : 'flaticon-visibility'"></i>
      </button>
   </div>
</template>

<script>
   export default {
      name: 'Password Input',
      props: {
         modelValue: {
            type: String,
            default: ''
         },
         placeholder: {
            type: String,
            default: 'Password'
         },
         required: {
            type: Boolean,
            default: false,
         }
      },
      emits: {
         "update:modelValue": value => typeof value === 'string'
      },
      data() {
         return {
            password: this.modelValue,
            inputType: 'password'
         }
      },
      methods: {
         emitInput() {
            this.$emit('update:modelValue', this.password)
         },
         toggleInputType() {
            if (this.inputType === 'password') {
               this.inputType = 'text'
            } else {
               this.inputType = 'password'
            }
         }
      },
   }
</script>

<style scoped>

</style>