<template>
   <div class="qty mr-2">
      <div class="qtySelector text-center">
         <button @click="changeQuantity(-1)" class="decreaseQty">
           <i class="flaticon-minus"></i>
         </button>
   
         <input
           type="number"
           class="qtyValue"
           :value="quantity"
         />
   
         <button @click="changeQuantity(1)" class="increaseQty">
           <i class="flaticon-plus"></i>
         </button>
       </div>
   </div>
</template>

<script>
   export default {
      name: 'Quantity Selector',
      props: {
         modelValue: {
            type: Number,
            default: 1
         },
         min: {
            type: Number,
            default: 1
         },
         max: {
            type: Number
         },
      },
      computed: {
         quantity: {
            get() {
               return this.modelValue;
            },
            set(value) {
               this.$emit('update:modelValue', value);
            }
         }
      },
      methods: {
         changeQuantity(amount) {
            const newQuantity = this.quantity + amount;

            if (
               newQuantity >= this.min &&
               newQuantity <= this.max
            ) {
               this.quantity = newQuantity;
            }
         },
      }
   }
</script>

<style lang="scss" scoped>
.qty .qtySelector {
   width: 160px;
   padding: 0px 50px 0px;
   height: 50px;
   position: relative;

   input {
      padding: 0px 0px 0px 20px;
   }

   .increaseQty {
      position: absolute;
      top: 0px;
      right: 0px;
      height: 100%;
      width: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-left: 1px solid #e4e4e4;
   }

   .decreaseQty {
      position: absolute;
      top: 0px;
      left: 0px;
      height: 100%;
      width: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-right: 1px solid #e4e4e4;
   }
}

.qtySelector {
   display: flex;
   align-items: center;
   border: 1px solid var(--thm-black);
   padding: 5px 20px 5px;

   input {
      border: 0px solid rgba(255, 255, 255, 0);
      box-shadow: none;
      padding: 0px 0px 0px 40px;
      font-size: 18px;
      color: var(--thm-black);
   } 
   input::placeholder {
      color: var(--thm-black);
      font-size: 18px;
   }
   button {
      height: 30px;
      width: 30px;
      min-width: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: var(--thm-black);
      background: var(--thm-white);
      line-height: 0px;
      font-size: 18px;
      font-weight: 500;

      &:hover {
         background: var(--thm-base);
         color: var(--thm-white);
      }
   }
}

</style>