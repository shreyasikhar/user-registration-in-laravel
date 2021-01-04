@component('mail::message')
# Dear {{$email}},
Don't worry much if you have forgot your password, just click below button to reset it

@component('mail::button', ['url' => request()->getHttpHost().'/reset/'.$token])
Click Here to Reset
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
