

$(document).ready(function () {
  $('#dtBasicUsers').DataTable();
  $('.dataTables_length').addClass('bs-select');
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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
    },
    error: function (data) {
      alert(data.error);
    }
  });
}
