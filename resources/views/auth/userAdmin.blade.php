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
          <th class="th-sm table-title">ФИО</th>
          <th class="th-sm table-title">Телефон </th>
          <th class="th-sm table-title">Комната</th>
          <th class="th-sm table-title">Количество</th>
          <th class="th-sm table-title">Цена</th>
          <th class="th-sm table-title">Заселение</th>
          <th class="th-sm table-title">Действия</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($records as $record)
            <tr id="{{ $loop->index }}">
              <td>{{ $record->arrival_date }}</td>
              <td>{{ $record->departure_date }}</td>
              <td>{{ $record->email }}</td>
              <td>{{ $record->username }}</td>
              <td>{{ $record->phone }}</td>
              <td>{{ $record->type_room }}</td>
              <td>{{ $record->count_persons }}</td>
              <td>0$</td>
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
  <button id="open-form-button" class="btn btn-primary user-button" type="button" name="button">Добавить бронивароние</button>

  <div id="formContainer" class="d-flex justify-content-center" >
    <form id="AddForm" action="" method="POST">
      @csrf
      <div class="input-daterange input-group" id="datepicker-panel">
        <input id="arrival-date" type="text" required="" class="input-sm" name="arrival" />
        <span class="input-group-addon"> до </span>
        <input id="departure-date" type="text" required="" class="input-sm" name="departure" />
      </div>
      <div class="col-auto my-1 select-div">
        <select id="option-type-room" class="custom-select" name="add-room" required="">
          <option value="">Выберите номер</option>
          <option value="1">Делюкс</option>
          <option value="2">Семейный</option>
          <option value="3">С видом на море</option>
          <option value="4">Флеш роял</option>
        </select>
      </div>
      <input id="count-persons" type="number" style="text-align: center;" name="count-person" count-person"text-area-count" required="" placeholder="Количество персон" max="10">
      <input id="username-form" type="text" required="" name="add-username" value="" class="form-control input-style-form input1" placeholder="Ф И О">
      <input id="email-form" type="text" required="" name="add-email" value="" class="form-control input-style-form input1" placeholder="Электронная почта">
      <input id="masked-phone-text1" type="text" required="" name="add-phone" value="" class="form-control input-style-form input1" placeholder="Номер телефона">

      <div class="container container-fluid d-flex justify-content-center">
        <button id="add-button-form" class="btn btn-form btn-outline-light btn-primary panel-button-add" type="sumbit" onclick="AddNewClient()">Добавить</button>
        <button id="save-button-form" class="btn btn-form btn-outline-light btn-primary panel-button-add" type="button" onclick="SaveChangeClient();">Сохранить</button>
        <button class="btn btn-form btn-outline-light btn-warning panel-button-add" type="button" onclick="CloseAddForm();">Закрыть</button>
    </div>
    </form>
  </div>
</section>
@endsection

@section('scripts')
  <script type="text/javascript" src="js/vendor/datatables/datatables.min.js"></script>
  <script type="text/javascript" src="js/panel.js"></script>
@endsection
