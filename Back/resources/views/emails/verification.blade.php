@component('mail::message')
# Hello, {{ $name }}

Please click the button below to verify your email address.

@component('mail::button', ['url' => $url])
Verify Email
@endcomponent

If you did not create an account, no further action is required.

Thanks,<br>
Karte|Online-shop
@endcomponent