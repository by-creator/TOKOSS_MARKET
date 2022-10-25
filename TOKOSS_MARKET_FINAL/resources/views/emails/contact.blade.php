@component('mail::message')
# {{$name}}, {{$subject}}

{{$message}}

{{ config('app.name') }}
@endcomponent
