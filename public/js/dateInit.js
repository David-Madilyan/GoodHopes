$('#review-link').remove();
$('#services-link').remove();
$("#masked-phone-text").mask("8(999) 999-99-99");
$('.input-data-user').hide();

var type = 0;
function getCurDate() {
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();
  today = mm + '/' + dd + '/' + yyyy;
  return today;
}

$(window).on('load', function() {
  var pathname = window.location.pathname;
  if(pathname == "/reservation/rooms/getAvailable" ){
    $('.fetch-room-title').animatescroll({padding:100});
  }
});
// datepicker path code
$('.input-daterange').datepicker({
  language: "ru",
  clearBtn: true,
  orientation: "bottom auto",
  multidate: false,
  todayHighlight: true,
  format: 'mm/dd/yyyy',
  startDate: getCurDate(),
  toggleActive: true
});
function OpenInputDataForm(t){
  $('.input-data-user').slideDown();
  $('#type-selected-room').val(t);

}
