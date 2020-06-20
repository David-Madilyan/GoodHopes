$(document).ready(function () {
  $('#dtBasicUsers').DataTable();
  $('.dataTables_length').addClass('bs-select');
  $("#masked-phone-text1").mask("8(999) 999-99-99");
  $('#open-form-button').show();
  $('#AddForm').hide();
  $('#save-button-form').hide();
  $('#price-room-form').hide();
  $('#price-one-day').attr('type', 'number');
});

function getCurDate() {
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();
  today = mm + '/' + dd + '/' + yyyy;
  return today;
}

$('.input-daterange').datepicker({
  language: "ru",
  clearBtn: true,
  orientation: "bottom auto",
  multidate: false,
  todayHighlight: true,
  startDate: getCurDate(),
  format: 'mm/dd/yyyy',
  toggleActive: true
});

var uuid = "";
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// подтверждение статуса заявки
function ConfirmedClient(u){
  var d = {};
		d['uuid'] = u;
  $.ajax({
    url: 'panel/confirm-client-request',
    data: d,
    type: 'POST',
    dataType: 'json',
    success: function (response) {
      alert(response.success);
      u = '#' + u;
      $(u).prop('disabled', true).html('Подтверждено');
      // $(u_class).css({'visibility' : 'visible'});
    },
    error: function (response) {
        alert(response.error);
    }
  });
}

// удаление заявки на заселение
function DClientRequest(d, i){
  var u = {};
  u['uuid'] = d;
  $.ajax({
    url: 'panel/delete-client-request',
    data: u,
    type: 'POST',
    dataType: 'json',
    success: function (data) {
      alert(data.success);
      i = '#' + i;
      $(i).remove();
      document.location.reload(true);
    },
    error: function (data) {
      alert(data.error + + '. Запрос не был выполнен!');
    }
  });
}

// передает данные с таблицы на форму, форма для изменения данных о заявки бронирования номера
function ChangeRecordId (object){
  $( '#open-form-button' ).hide();
  $( '#add-button-form' ).hide();
  $( '#save-button-form' ).show();
  $( '.form-check' ).show();
  $( '#AddForm' ).show();
  $( '#price-one-day' ).show();
  if(object.confirmed == 0){
    $("#check-settle").prop( "checked", false );
  }else{
    $("#check-settle").prop( "checked", true );
  }
  uuid = object.uuid;
  $( '#arrival-date' ).val(object.arrival_date);
  $( '#departure-date' ).val(object.departure_date);
  $( '#option-type-room' ).children("option:selected").val(object.type_room);
  $( '#count-persons' ).val(object.count_persons);
  $( '#username-form' ).val(object.username);
  $( '#email-form' ).val(object.email);
  $( '#masked-phone-text1' ).val(object.phone);
  if(object.price > 0){
    $( '#price-one-day' ).val(object.price);
  }else{
    $( '#price-one-day' ).val('');
  }
}

// добавляет нового клиента
function AddNewClient(){
  var array = GetAllInputForm();
  array['daysLag'] = GetDaysLag(array);
  $.ajax({
    url: 'panel/add-client-request',
    data: array,
    type: 'POST',
    dataType: 'json',

    success: function (response) {
      alert(response.success);
      document.location.reload(true);
      $( '#arrival-date' ).val("");
      $( '#departure-date' ).val("");
      $( '#option-type-room' ).children("option:selected").val("");
      $( '#count-persons' ).val("");
      $( '#username-form' ).val("");
      $( '#email-form' ).val("");
      $( '#masked-phone-text1' ).val("");
    },
    error: function (response) {
      // alert(response.error + '. Запрос не был выполнен!');
    }
  });
}

// функция для сохранения данных о комнатах
function SaveChangePriceRoom(){
  var rowCount = $('#table-prices tr').length - 1;
  var listRoom = {};
  for(let i = 0; i < rowCount; i++){
    var d = {};
    d['name'] = $('#item-price-name-' + i).val();
    d['price'] = parseInt($('#item-price-price-' + i).val());
    d['description'] = $('#item-price-discription-' + i).val();
    d['type'] = $('#item-price-type-' + i).val();
    listRoom['room' + i] = d;
  }
  // console.log(listRoom);
  $.ajax({
    url: 'panel/change-rooms-request',
    data: listRoom,
    type: 'POST',
    dataType: 'json',

    success: function (response) {
      alert(response.success);
    },
    error: function (response) {
      alert(response.error + '. Запрос не был выполнен!');
    }
  });
}

// сохраняет данные об измениях на сервере
function SaveChangeClient(){
  var array = GetAllInputForm();
  array['uuid'] = uuid;
  array['price'] = parseInt($( '#price-one-day' ).val());
  // array['price'] = GetPrice(array);
  $.ajax({
    url: 'panel/change-client-request',
    data: array,
    type: 'POST',
    dataType: 'json',

    success: function (response) {
      alert(response.success);
      document.location.reload(true);
      uuid = "";
    },
    error: function (response) {
      alert(response.error + '. Запрос не был выполнен!');
    }
  });
}

function GetDaysLag(a){
  var date1 = new Date(a['arrival']);
  var date2 = new Date(a['depart']);
  var daysLag = Math.ceil(Math.abs(date2.getTime() - date1.getTime()) / (1000 * 3600 * 24));
  return daysLag;
}

// открывает форму для добавления нового клиента
$('#open-form-button').click(function(){
  $('#open-form-button').hide();
  $( "#AddForm" ).show();
  $( '#add-button-form' ).show();
  $( '#save-button-form' ).hide();
  $( '#price-one-day' ).hide();
  $( '#check-settle' ).prop( "checked", false );
  $( '#arrival-date' ).val("");
  $( '#departure-date' ).val("");
  $( '#option-type-room' ).val("");
  $( '#count-persons' ).val("");
  $( '#username-form' ).val("");
  $( '#email-form' ).val("");
  $( '#masked-phone-text1' ).val("");
});

$('#open-price-button').click(function(){
  $( '#price-room-form' ).show();
  $( '#open-price-button' ).hide();

});


function GetAllInputForm(){
  var array = {};
  array['arrival'] = $( '#arrival-date' ).val();
  array['depart'] = $( '#departure-date' ).val();
  array['type'] = $( '#option-type-room' ).children("option:selected").val();
  array['count'] = $( '#count-persons' ).val();
  array['username'] = $( '#username-form' ).val();
  array['email'] = $( '#email-form' ).val();
  array['phone'] = $( '#masked-phone-text1' ).val();
  if( $("#check-settle").prop('checked') ){
    array['confirmed'] = 1;
  }else{
    array['confirmed'] = 0;
  }
  return array;
}

function CloseAddForm(){
  $('#open-form-button').show();
  $("#AddForm").hide();
}

function ClosePriceTable(){

  $("#price-room-form").hide();
  $("#open-price-button").show();
}
