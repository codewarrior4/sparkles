@component('mail::message')


{{-- reset email --}}
@component('mail::panel')
    <h3>Hi {{ $details['firstname'] }},</h3>
    <p>Click the button below to reset your password.</p>
    <p>Thank you.</p>
@endcomponent
    
    {{-- verification button --}}
@component('mail::button', ['url' => $details["url"]])
    Reset Password
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
