@component('mail::message')
С сайта GoodHopes.ru, была отправлена заявка на бронирование номера <strong>{{ $room_name }}</strong>.<br>
<br>
Дата бронирование номера с <strong>{{ $record->arrival_date }} по {{ $record->departure_date }}</strong>.<br>
<hr>
  Имя заявителя: {{ $record->username }}.<br>
  Мобильный телефон: {{ $record->phone }}.<br>
  Электронная почта: {{ $record->email }}.<br>
  Cумма за проживание: {{ $record->price }}.<br>
<hr>
<a href="{{ $route_confirm }}" style="padding: 0 1rem;
  border: 0.25rem solid #79B9DD;
  border-radius: 0.5rem;
  background-color: transparent;
  font-size: 1.2rem;
  height: 2rem;
  width: 100%;
  text-align: center;
  line-height: 2.5rem;
  letter-spacing: 0.05em;
  transition-duration: 0.25s;
  margin-left: auto;
  margin-right: auto;
  color: #333;">Подтвердить заявку
</a>
  <br>
  <hr>
С уважением,<br>
{{ config('app.name') }}
@endcomponent
