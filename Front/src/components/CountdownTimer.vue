<template>
   <ul class="time-countdown-two">
     <li v-for="unit in countdown" :key="unit.label">
       <div class="box">
         <span :class="unit.label">{{ unit.value }}</span>
         <span class="timeRef" :class="unit.colorClass">{{ unit.label }}</span>
       </div>
     </li>
   </ul>
 </template>
 
 <script>
 import moment from 'moment';
 
 export default {
   props: {
     countdownTime: {
       type: String,
       required: true
     }
   },
   data() {
     return {
       countdown: [
         { label: 'days', value: '00', colorClass: '' },
         { label: 'hours', value: '00', colorClass: 'clr-1' },
         { label: 'min', value: '00', colorClass: 'clr-2' },
         { label: 'sec', value: '00', colorClass: 'clr-3' }
       ],
       intervalId: null
     };
   },
   mounted() {
     this.startCountdown();
   },
   beforeDestroy() {
     clearInterval(this.intervalId);
   },
   methods: {
     startCountdown() {
       const targetDate = moment(this.countdownTime);
 
       this.intervalId = setInterval(() => {
         const now = moment();
         const duration = moment.duration(targetDate.diff(now));
 
         if (duration.asSeconds() <= 0) {
           clearInterval(this.intervalId);
           return;
         }
 
         this.countdown = [
           { label: 'days', value: duration.days().toString().padStart(2, '0'), colorClass: '' },
           { label: 'hours', value: duration.hours().toString().padStart(2, '0'), colorClass: 'clr-1' },
           { label: 'minutes', value: duration.minutes().toString().padStart(2, '0'), colorClass: 'clr-2' },
           { label: 'seconds', value: duration.seconds().toString().padStart(2, '0'), colorClass: 'clr-3' }
         ];
       }, 1000);
     }
   }
 };
 </script>
 
 <style scoped>
 
 </style>
 