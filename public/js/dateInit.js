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
  $('#datepicker #input-start, #input-end').datepicker({
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

// функиция делает недоступными занятые даты в датапикере
$(function(){
  $('#inlineRoomSelect').change(function(){
      var type = $( '#inlineRoomSelect' ).children("option:selected").val();
      if(type > 0){
        $('#input-start').datepicker('setDatesDisabled', array[type - 1]);
        $('#input-end').datepicker('setDatesDisabled', array[type - 1]);
        $('#input-start').datepicker('setDate', null);
        $('#input-end').datepicker('setDate', null);
        setDisabledDates(array[type - 1]);
        console.log(array[type - 1]);
      }else{
        $('#input-start').datepicker('setDatesDisabled', "");
        $('#input-end').datepicker('setDatesDisabled', "");
      }
  });
});
// функция проверяет не находится ли выбранный промежуток дат пользователем между занятыми датами
$('#datepicker').datepicker().on('changeDate', function (ev) {
    // console.log($('#input-end').val());
    var start = new Date($('#input-start').val());
    var end = new Date($('#input-end').val());
    for(let i =0; i < dis.length; i++){
      var disDate = new Date(dis[i]);
      if((start < disDate) && (end > disDate)){
        $('#input-end').datepicker('setDate', null);
        $('#input-start').datepicker('setDate', null);
        // console.log('is date not valid');
        break;
      }
    }
});
