@component('mail::message')    
Hello, {{ $name }}! 

We want to tell you that our administrators decided to restore your comment, that was previously deleted!

The review you reported to:

<h5>{{ $review }}</h5>

Please accept our apologies for the inconvenience caused.

@endcomponent