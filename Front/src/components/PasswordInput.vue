<template>
   <div class="form-group eye">
      <button ref="showPassword" @click.prevent="toggleInputType" class="icon icon-1">
         <i class="flaticon-hidden"></i>
      </button>
      <input
        :type="inputType"
        class="form-control"
        :placeholder="placeholder"
        v-model="password"
        :required="required"
        @input="emitInput"
      />
      <button ref="hidePassword" @click.prevent="toggleInputType" class="icon icon-2">
        <i class="flaticon-visibility"></i>
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
               this.$refs.hidePassword.style.display = 'block'
               this.$refs.showPassword.style.display = 'none'
            } else {
               this.inputType = 'password'
               this.$refs.showPassword.style.display = 'block'
               this.$refs.hidePassword.style.display = 'none'
            }
         }
      },
   }
</script>

<style scoped>

</style>