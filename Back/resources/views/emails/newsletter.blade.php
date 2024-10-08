@component('mail::message')    
Hello, {{ $name }}! 

That's out monthly newsletter up here!

In that {{ $month }} newsletter we are going to introduce you a new...

We are happy that you are the part of Karte family!

If you want to unsubscribe, click to the button below

@component('mail::button', ['url' => 'http://localhost:5173/account'])
   Unsubscribe
@endcomponent
@endcomponent
