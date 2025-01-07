<div id="success-message" class="vertical-center bg-info mb-4">
   <p>{{ $slot }}</p>
</div>

<style>
   .vertical-center {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 45px;
   }

   .vertical-center p {
      margin: 0;
      text-align: center;
      font-size: 16px;
   }
</style>

<script>
   document.addEventListener('DOMContentLoaded', function() {
       setTimeout(function() {
           const message = document.getElementById('success-message');
           if (message) {
               message.style.display = 'none';
           }
       }, 3000);
   });
</script>