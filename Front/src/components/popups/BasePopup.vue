<template>
   <Teleport to="body">
      <Transition name="popup-overlay">
         <div
            v-show="active"
            ref="overlay"
            class="quick-view-popup--overlay"
         >
         <Transition name="popup-content">
            <slot></slot>  
         </Transition>
         </div>
      </Transition>
   </Teleport>
</template>

<script>
   export default {
      props: {
         active: Boolean,
         closePopup: Function
      },
      methods: {
         handleClickOutside(event) {
            const overlay = this.$refs.overlay

            if (overlay && overlay.contains(event.target)) {
               this.closePopup()
            }
         },
      },
      mounted() {
         document.addEventListener('click', this.handleClickOutside);
      },    
      beforeDestroy() {
         document.removeEventListener('click', this.handleClickOutside);
      },
   };
</script>

<style> 
.popup-overlay-enter-to,
.popup-overlay-leave-from {
  opacity: 1;
}

.popup-overlay-enter-active,
.popup-overlay-leave-active {
  transition: opacity 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02);
}

.popup-overlay-enter-from,
.popup-overlay-leave-to {
   opacity: 0;
}

.popup-content-enter-to,
.popup-content-leave-from {
  opacity: 1;
  transform: scale(1);
}

.popup-content-enter-active{
   transition: all 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02) 0.15s;
}
.popup-content-leave-active {
   transition: all 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02);
}

.popup-content-enter-from{
   opacity: 0;
   transform: scale(0.8);
}
.popup-content-leave-to {
   transform: scale(0.8);
}

.quick-view-popup--overlay {
   position: fixed;
   top: 0;
   bottom: 0;
   right: 0;
   left: 0;
   z-index: 10;
   background-color: #24242483;
   display: block;
}
</style>