@component('mail::message')
# Introduction

Blood Bank reset pass.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}
<p> this bin code is:{{$code}} </p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
