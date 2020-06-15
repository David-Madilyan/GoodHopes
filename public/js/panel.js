$(document).ready(function () {
  $('#dtBasicUsers').DataTable();
  $('.dataTables_length').addClass('bs-select');
  $("#masked-phone-text1").mask("8(999) 999-99-99");
  $('#open-form-button').show();
  $('#AddForm').hide();
  $('#save-button-form').hide();
});

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

  if(object.confirmed == 0){
    $("#check-settle").prop( "checked", false );
  }else{
    $("#check-settle").prop( "checked", true );
  }

  // console.log(JSON.stringify(object));
  $( '#arrival-date' ).val(object.arrival_date);
  $( '#departure-date' ).val(object.departure_date);
  $( '#option-type-room' ).children("option:selected").val(object.type_room);
  $( '#count-persons' ).val(object.count_persons);
  $( '#username-form' ).val(object.username);
  $( '#email-form' ).val(object.email);
  $( '#masked-phone-text1' ).val(object.phone);
}

// добавляет нового клиента
function AddNewClient(){
  var array = GetAllInputForm();

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
      alert(response.error + '. Запрос не был выполнен!');
    }
  });
}

function SaveChangeClient(s){
  var array = GetAllInputForm();
  array['uuid'] = s;
  $.ajax({
    url: 'panel/change-client-request',
    data: array,
    type: 'POST',
    dataType: 'json',

    success: function (response) {
      alert(response.success);
      document.location.reload(true);
    },
    error: function (response) {
      alert(response.error + '. Запрос не был выполнен!');
    }
  });
}

// открывает форму для добавления нового клиента
$('#open-form-button').click(function(){
  $('#open-form-button').hide();
  $( "#AddForm" ).show();
  $( '#add-button-form' ).show();
  $( '#save-button-form' ).hide();
  $( '#check-settle' ).prop( "checked", false );
  $( '#arrival-date' ).val("");
  $( '#departure-date' ).val("");
  $( '#option-type-room' ).val("");
  $( '#count-persons' ).val("");
  $( '#username-form' ).val("");
  $( '#email-form' ).val("");
  $( '#masked-phone-text1' ).val("");
});


function CloseAddForm(){
  $('#open-form-button').show();
  $("#AddForm").hide();
}


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
