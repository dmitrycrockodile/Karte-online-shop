<template>
   <div class="wrapper">
      <div class="slider">
         <div class="progress" :style="{ left: progressLeft + '%', right: progressRight + '%' }"></div>
      </div>
      <div class="range-input">
         <input 
            type="range" 
            class="range-min"
            :value="minPrice" 
            @input="event => updateRange(event, 'min')" 
            :min="min" 
            :max="max" 
            :step="step" 
         />
         <input 
            type="range" 
            class="range-max"
            :value="maxPrice" 
            @input="event => updateRange(event, 'max')" 
            :min="min" 
            :max="max" 
            :step="step"
         />
      </div>
      <p class="values">Price: ${{ minPrice }} - ${{ maxPrice }}</p>
   </div>
</template>
 
<script>
   export default {
      props: {
         min: { type: Number, default: 0 },
         max: { type: Number, required: true },
         step: { type: Number, default: 100 },
         gap: { type: Number, default: 500 },
         minPrice: { required: true },
         maxPrice: { required: true },
      },
      emits: {
         "update:minPrice": value => typeof value === 'number',
         "update:maxPrice": value => typeof value === 'number',
      },
      computed: {
         progressLeft() {
            return (this.minPrice / this.max) * 100;
         },
         progressRight() {
            return 100 - (this.maxPrice / this.max) * 100;
         }
      },
      methods: {
         updateRange(e, type) {
            const value = Number(e.target.value);

            if (type === 'min') {
               if (value > this.maxPrice - this.gap) {
                  e.target.value = this.maxPrice - this.gap;
                  this.$emit('update:minPrice', this.maxPrice - this.gap);
               } else {
                  this.$emit('update:minPrice', value);
               }
            } else if (type === 'max') {
               if (value < this.minPrice + this.gap) {
                  e.target.value = this.minPrice + this.gap;
                  this.$emit('update:maxPrice', this.minPrice + this.gap);
               } else {
                  this.$emit('update:maxPrice', value);
               }
            }
         }
      }
   };
</script>
 
<style lang="scss" scoped>
* {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   font-family: 'Poppins', sans-serif;
}

.price-input {
   width: 100%;
   display: flex;
   margin: 30px 0 35px;
}

.price-input .field {
   display: flex;
   width: 100%;
   height: 45px;
   align-items: center;
}

.field input {
   width: 100%;
   height: 100%;
   outline: none;
   font-size: 19px;
   margin-left: 12px;
   border-radius: 5px;
   text-align: center;
   border: 1px solid #999;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
   -webkit-appearance: none;
}

.price-input .separator {
   width: 130px;
   display: flex;
   font-size: 19px;
   align-items: center;
   justify-content: center;
}

.slider {
   height: 5px;
   position: relative;
   background: #ddd;
   border-radius: 5px;
}

.slider .progress {
   height: 100%;
   position: absolute;
   border-radius: 5px;
   background: var(--thm-black);
}

.range-input {
   position: relative;
}

.range-input input {
   position: absolute;
   width: 96%;
   height: 5px;
   top: -5px;
   left: -2px;
   background: none;
   pointer-events: none;
   appearance: none;
   border: none;
}

input[type="range"]::-webkit-slider-thumb {
   height: 17px;
   width: 17px;
   border-radius: 50%;
   background: var(--thm-black);
   pointer-events: auto;
   -webkit-appearance: none;
   box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
}

input[type="range"]::-moz-range-thumb {
   height: 17px;
   width: 17px;
   border-radius: 50%;
   background: var(--thm-black);
   pointer-events: auto;
   -moz-appearance: none;
   box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
}

.values {
   margin-top: 15px;
   margin-bottom: 15px;
}
</style>