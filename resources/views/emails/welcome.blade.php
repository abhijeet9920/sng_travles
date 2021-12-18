@component('mail::message')
# Welcome Onboard

<h3>{{ $details['title'] }}</h3>
<h3>{{ $details['body'] }}</h3>

@component('mail::button', ['url' => $details['url']])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent