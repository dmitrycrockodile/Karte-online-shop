@component('mail::message')    
Welcome, {{ $name }}! 

We are happy that you are now the part of Karte family!

If you want to know more about Karte rules, click to the button below

@component('mail::button', ['url' => 'https://www.google.com/'])
   Show the rules
@endcomponent
@endcomponent
