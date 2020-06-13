@component('mail::message')

{{ $bodyMessage }}

<br>Вопрос задал:{{ $name }}.<br>
 С адресcа: <h2>{{ $fromEmail }}</h2>
@endcomponent
