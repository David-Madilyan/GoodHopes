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
          <th class="th-sm table-title">Телефон</th>
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
                <button class="btn btn-primary user-button" type="button" name="button">Изменить</button>
                <button class="btn btn-danger" type="button" name="button" onclick='DClientRequest("{{ $record->uuid }}", "{{ $loop->index }}");'>Удалить</button>
              </td>
            </tr>
        @endforeach
      </tbody>

  </table>
  <button class="btn btn-primary user-button" type="button" name="button">Добавить бронивароние</button>
</section>
@endsection

@section('scripts')
  <script type="text/javascript" src="js/vendor/datatables/datatables.min.js"></script>
  <script type="text/javascript" src="js/panel.js"></script>
@endsection
