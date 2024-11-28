<template>
   <div class="map">
      <div id="map"></div>
   </div>
   
</template>

<script>
   export default {
      name: 'Map',
      props: {
         lat: {
            type: Number,
            required: true
         },
         lng: {
            type: Number,
            required: true
         },
         zoom: {
            type: Number,
            default: 14
         }
      },
      mounted() {
         this.initMap();
      },
      methods: {
         initMap() {
            new google.maps.Map(document.getElementById('map'), {
               center: { lat: this.lat, lng: this.lng },
               zoom: this.zoom,
            });
         }
      },
   }
</script>


<style lang="scss" scoped>
.map {
   height: 500px;
   width: 100%;
}
</style>