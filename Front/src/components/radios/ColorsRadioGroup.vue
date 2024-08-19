<template>
   <ul class="group__container">
      <li v-for="color in colors">
         <button
            :title="color.title"
            :class="{ 
               active: selectedValue && selectedValue.title === color.title,
               regular: type === 'regular',
               small: type === 'small'
            }"
            :style="`background-color: ${color.title}`"
            @click.prevent="setValue(color)"
         >
            <span>{{ color.title }}</span>
         </button>
      </li>
   </ul>
</template>

<script>
   export default {
      name: 'Colors Radio Group',
      props: {
         "colors": { type: Array },
         "selectedValue": { type: Object },
         "setValue": { type: Function },
         // TYPE CAN BE SMALL AND REGULAR
         "type": { type: String, required: true, default: 'regular' }
      }
   }
</script>

<style lang="scss" scoped>

.group__container {
   display: flex;
   align-items: center;
}

.regular {
   position: relative;
   border: 1px solid #eeeeee;
   border-radius: 5px;
   width: 50px; 
   height: 50px; 

   &.active {
      border: 1px solid var(--thm-base);
   }

   img {
      min-width: 100%;
      border-radius: 5px;
   }

   span {
      position: absolute;
      bottom: 100%;
      left: 50%;
      background: var(--thm-black);
      padding: 2px 10px 2px;
      font-size: 10px;
      color: #ffffff;
      min-width: 40px;
      transform: translateX(-50%);
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 3px;
      bottom: calc(100% + 12px);
      opacity: 0;
      visibility: hidden;
      -webkit-transition: 0.3s;
      transition: 0.3s;
   }

   span::before {
      position: absolute;
      top: 68%;
      left: 50%;
      transform: translateX(-50%) rotate(45deg);
      content: "";
      background: var(--thm-black);
      height: 10px;
      width: 10px;
      z-index: -1;
   }

   &:hover span {
      bottom: calc(100% + 6px);
      opacity: 1;
      visibility: visible;
   }
}

.small {
   position: relative;
   height: 25px;
   width: 25px;
   border-radius: 50%;
   background: var(--thm-black);
   display: inline-block;
   margin: 5px;
   cursor: pointer;

   &.active {
      border: 1px solid var(--thm-base);
   }

   &:first-child {
      margin-left: 0px;
   }

   span {
      position: absolute;
      bottom: 100%;
      left: 50%;
      background: var(--thm-black);
      padding: 2px 10px 2px;
      font-size: 10px;
      color: #ffffff;
      min-width: 40px;
      transform: translateX(-50%);
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 3px;
      bottom: calc(100% + 12px);
      opacity: 0;
      visibility: hidden;
      transition: 0.3s;
   }

   span::before {
      position: absolute;
      top: 68%;
      left: 50%;
      transform: translateX(-50%) rotate(45deg);
      content: "";
      background: var(--thm-black);
      height: 10px;
      width: 10px;
      z-index: -1;
   }

   &:hover span {
      bottom: calc(100% + 6px);
      opacity: 1;
      visibility: visible;
   }
}

@media (max-width: 575px) {    
   .regular {
      width: 50px;
      height: 50px;
   }
}
</style>