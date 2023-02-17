@component('mail::message')


{{-- verification email --}}
@component('mail::panel')
    <h3>Hi {{ $details['firstname'] }},</h3>
    <p>Thank you for registering with us. Please click the button below to verify your email address.</p>
    <p>Thank you.</p>
@endcomponent
    
    {{-- verification button --}}
@component('mail::button', ['url' => $details["url"]])
    Verify Email
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
