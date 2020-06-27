@extends('layouts.app')

@section('title-block')Панель администратора @endsection

@section('styles-user')
  <link rel="stylesheet" href="js/vendor/datatables/datatables.min.css">
@endsection

@section('content')
<meta  name="csrf-token" content="{{ csrf_token() }}" />
<section class="panel-section">

  <table id="dtBasicUsers" class="table table-striped table-bordered table-sm table-records" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th class="th-sm table-title">Заезд</th>
          <th class="th-sm table-title">Выезд</th>
          <th class="th-sm table-title">Почта</th>
          <th class="th-sm table-title panel-title">ФИО</th>
          <th class="th-sm table-title panel-title">Телефон </th>
          <th class="th-sm table-title panel-title">Комната</th>
          <th class="th-sm table-title">Количество</th>
          <th class="th-sm table-title">Цена</th>
          <th class="th-sm table-title">Заселение</th>
          <th class="th-sm table-title">Действия</th>
        </tr>
      </thead>
      <tbody class="panel-main-table">
        @foreach ($records as $record)
            <tr id="{{ $loop->index }}">
              <td>{{ $record->arrival_date }}</td>
              <td>{{ $record->departure_date }}</td>
              <td>{{ $record->email }}</td>
              <td>{{ $record->username }}</td>
              <td>{{ $record->phone }}</td>
              <td>
                @foreach($rooms as $room)
                  @if($record->type_room ==  $room->type)
                    {{$room->name}}
                  @endif
                @endforeach
              </td>
              <td>{{ $record->count_persons }}</td>
              <td>{{ $record->price }}</td>
              <td>
                @if ($record->confirmed)
                    Подтверждено
                @else
                  <button id="{{ $record->uuid }}" class="btn btn-primary" type="button" name="button" onclick='ConfirmedClient("{{ $record->uuid }}");'>Подтвердить</button>
                @endif
              </td>
              <td class="d-flex justify-content-center">
                <button class="btn btn-primary user-button" type="button" name="button" onclick='ChangeRecordId({{ json_encode($record) }});'> Изменить </button>
                <button class="btn btn-danger" type="button" name="button" onclick='DClientRequest("{{ $record->uuid }}", "{{ $loop->index }}");'>Удалить</button>
              </td>
            </tr>
        @endforeach
      </tbody>

  </table>
  <div class="d-flex justify-content-center">
    <button id="open-form-button" class="btn btn-primary user-button" type="button" name="button">Добавить бронивароние</button>
    <button id="open-price-button" class="btn btn-primary user-button" type="button" name="button">Цены и описание</button>
    <hr>
  </div>

<!-- форма для добавления нового бронирования или изменения уже оформленных броней -->
  <div id="formContainer" class="d-flex justify-content-center" >
    <form id="AddForm" action="" method="POST">
      @csrf
      <hr>
      <label class="d-flex justify-content-center panel-label-form" for="AddForm">Форма для работы с клиентами</label>
      <hr class="panel-hr">
      <div class="input-daterange input-group" id="datepicker-panel">
        <input id="arrival-date" type="text" required="" class="input-sm" name="arrival" />
        <span class="input-group-addon"> до </span>
        <input id="departure-date" type="text" required="" class="input-sm" name="departure" />
      </div>
      <div class="col-auto my-1 select-div">
        <select id="option-type-room" class="custom-select" name="add-room" required="">
          <option value="">Выберите номер</option>
          @foreach($rooms as $room)
            <option value="{{ $room->type }}">{{ $room->name }}</option>
          @endforeach
        </select>
      </div>
      <input id="count-persons" type="number" style="text-align: center;" name="count-person" count-person"text-area-count" required="" placeholder="Количество персон" max="10">
      <input id="username-form" type="text" required="" name="add-username" value="" class="form-control input-style-form input1" placeholder="Ф И О">
      <input id="email-form" type="text" required="" name="add-email" value="" class="form-control input-style-form input1" placeholder="Электронная почта">
      <input id="masked-phone-text1" type="text" required="" name="add-phone" value="" class="form-control input-style-form input1" placeholder="Номер телефона">
      <input id="price-one-day" type="text" name="change-price" value="" class="form-control input-style-form input1" placeholder="Цена проживания">
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="check-settle">
        <label class="form-check-label" for="check-settle">Подтвердить заселение</label>
      </div>
      <hr>
      <div class="container container-fluid d-flex justify-content-center">
        <button id="add-button-form" class="btn btn-form btn-outline-light btn-primary panel-button-add" type="sumbit" onclick="AddNewClient()">Добавить</button>
        <button id="save-button-form" class="btn btn-form btn-outline-light btn-primary panel-button-add" type="button" onclick='SaveChangeClient();'>Сохранить</button>
        <button class="btn btn-form btn-outline-light btn-warning panel-button-add" type="button" onclick="CloseAddForm();">Закрыть</button>
    </div>
    </form>
  </div>

<!-- таблица для работы с комнатами и их характеристиками -->
  <div id="price-room-form" class="panel-room-form">
    <hr>
    <table id="table-prices" class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Наименование</th>
          <th scope="col panel-col">Цена за сутки</th>
          <th scope="col">Описание комнаты</th>
          <th scope="col panel-col">Тип комнаты</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rooms as $room)
          <tr>
            <th scope="row">{{ $loop->index }}</th>
            <td><input id="item-price-name-{{ $loop->index }}" type="text" name="price-room-name" value="{{ $room->name }}" class="form-control panel-input-room" placeholder=""></td>
            <td class="panel-col"><input id="item-price-price-{{ $loop->index }}" type="text" name="price-room-price" value="{{ $room->price }}" class="form-control panel-input-room" placeholder=""></td>
            <td><textarea id="item-price-discription-{{ $loop->index }}" type="text" name="price-room-discription"  class="form-control panel-input-room" placeholder="">{{ $room->description }}</textarea></td>
            <td class="panel-col"><p id="item-price-type-{{$loop->index }}" class="panel-input-room">{{ $room->type }}</p></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <hr>
    <button id="save-button-price" class="btn btn-form btn-outline-light btn-primary panel-button-add" type="button" onclick='SaveChangePriceRoom();'>Сохранить</button>
    <button id="close-button-price" class="btn btn-form btn-outline-light btn-warning panel-button-add" type="button" onclick='ClosePriceTable();'>Закрыть</button>
  </div>
</section>
@endsection

@section('scripts')
  <script type="text/javascript" src="http://127.0.0.1:8000/js/vendor/datepicker/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="http://127.0.0.1:8000/js/vendor/datepicker/bootstrap-datepicker.ru.min.js"></script>
  <script type="text/javascript" src="http://127.0.0.1:8000/js/vendor/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="http://127.0.0.1:8000/js/vendor/datatables/datatables.min.js"></script>
  <script type="text/javascript" src="http://127.0.0.1:8000/js/panel.js"></script>
@endsection
