$('#review-link').remove();
$('#services-link').remove();
$("#masked-phone-text").mask("8(999) 999-99-99");
var array = {};
var dis = {};
function getCurDate() {
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();
  today = mm + '/' + dd + '/' + yyyy;
  return today;
}

function setDates(dates){
  array = dates;
}
function setDisabledDates(disabled){
  dis = disabled;
}
// datepicker path code
function InitDatePicker(arrDisebledDates){
  // console.log(arrDisebledDates);
  // var arrDates = JSON.parse(arrDisebledDates);
  $('#datepicker').datepicker({
    language: "ru",
    clearBtn: true,
    orientation: "bottom auto",
    multidate: false,
    todayHighlight: true,
    startDate: getCurDate(),
    format: 'mm/dd/yyyy',
    toggleActive: true,
    datesDisabled: arrDisebledDates
  });
}
// .on('show', function(e){
//   $('#datepicker').datepicker('setDatesDisabled', dis);
// });

$(function(){
  $('#inlineRoomSelect').change(function(){
    var type = $( '#inlineRoomSelect' ).children("option:selected").val();
    // setDisabledDates(array[type - 1]);
    $('#input-start').datepicker('setDatesDisabled', array[type - 1]);
    $('#input-end').datepicker('setDatesDisabled', array[type - 1]);
    console.log(array[type - 1]);
  });
});
$('.datepicker').datepicker()
  .on("show", function(e) {
      // `e` here contains the extra attributes
});
// $('#datepicker input').datepicker({
//     datesDisabled: ['06/06/2020', '06/21/2020']
// });
