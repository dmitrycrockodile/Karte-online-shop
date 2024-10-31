@component('mail::message')    
Hello, {{ $name }}! 

Thank you for the report!

We want to tell you that the problem was resolved by our administrators!

The review you reported to:

<h5>{{ $review }}</h5>

@endcomponent