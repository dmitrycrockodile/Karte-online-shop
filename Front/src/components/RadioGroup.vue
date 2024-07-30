<template>
   <div :class="`container ${type}`">
      <div v-for="(option, i) in options"> 
         <input type="radio" 
            :name="option.label" 
            :id="`option_${i}`" 
            @click="setValue(option.label)" 
            :checked="isChecked(option.label)"
         > 
         <label class="label" :for="`option_${i}`">
            <span></span>
            {{ option.label }}
         </label> 
      </div>

      <span v-show="!selectedValue" class="warning">Please choose the shipping method!</span>
   </div>
</template>
 
<script>

export default {
   name: 'Radio Group',
   props: {
      "options": { type: Array, required: true },
      "type": { type: String, required: true },
      "selectedValue": { type: String },
      "setValue": { type: Function },
   },
   methods: {
      isChecked(label) {
         return this.selectedValue === label ? ' checked' : false;
      }
   },
}
</script>
 
<style lang="scss" scoped>
   .container {
      position: relative;
      display: block;
   }

   .basic {
      input[type=radio] + label span {
         position: absolute;
         display: block;
         top: 6px;
         left: 0;
         width: 16px;
         height: 16px;
         border-radius: 50%;
         background-color: transparent;
         border: 1px solid #1a1a1a;
         cursor: pointer;
         -webkit-transition: all 300ms ease;
         transition: all 300ms ease;
      }

      .label {
         position: relative;
         display: inline-block;
         padding-left: 40px;
         margin-right: 0px;
         margin-bottom: 0;
         color: #555555;
         font-size: 16px;
         line-height: 30px;
         font-weight: 500;
         cursor: pointer;
         font-family: var(--thm-font);
      }

      .label span:before {
         content: "";
         position: absolute;
         top: 4px;
         left: 4px;
         bottom: 4px;
         right: 4px;
         background: #1a1a1a;
         border-radius: 50%;
         opacity: 0;
         -webkit-transition: all 300ms ease;
         transition: all 300ms ease;
      }

      input[type=radio]:checked + label span:before {
         opacity: 1;
      }
   }

   input[type=radio] {
      display: none;
   }

   .warning {
      color: rgb(255, 42, 0);
      margin-top: 5px;
   }
</style>