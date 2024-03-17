@component('mail::message')
# Bonjour
{{$data['email']}} <br>
{{$data['message']}}
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
