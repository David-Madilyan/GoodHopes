$('#review-link').remove();
$('#services-link').remove();
$("#masked-phone-text").mask("8(999) 999-99-99");
$('.input-data-user').hide();
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

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
  $('.type-selected-room').val(t);

}
// function ReservUserRequest(a, d, c, t){
//   var array = {};
// 		array['arrival'] = a;
// 		array['depart'] = d;
// 		array['count'] = c;
// 		array['type'] = t;
// 		array['username'] = $( '#username' ).val();
// 		array['email'] = $( '#email' ).val();
// 		array['phone'] = $( '#masked-phone-text' ).val();
//   $.ajax({
//     url: 'http://127.0.0.1:8000/reservation/sumbit/room',
//     data: array,
//     type: 'POST',
//     dataType: 'json',
//     success: function (response) {
//       alert(response.success);
//     },
//     error: function (response) {
//         alert(response.error);
//     }
//   });
// }
// function setDates(dates){
  //   array = dates;
  // }
  // function setDisabledDates(disabled, check){
    //   dis = disabled;
    //   ch = check;
    // }

// function InitDatePicker(){
//   if(ch){
//     $('#input-start').datepicker('setDatesDisabled', dis).datepicker('setStartDate', getCurDate());
//     $('#input-end').datepicker('setDatesDisabled', dis).datepicker('setStartDate', getCurDate());
//   }
//   $('#input-start').datepicker('setStartDate', getCurDate());
//   $('#input-end').datepicker('setStartDate', getCurDate());
//
// }

// // функиция делает недоступными занятые даты в datepicker
// $(function(){
//   $('#inlineRoomSelect').change(function(){
//       var type = $( '#inlineRoomSelect' ).children("option:selected").val();
//       if(type > 0 || type != ""){
//         $('#input-start').datepicker('setDatesDisabled', array[type - 1]).datepicker('setStartDate', getCurDate());
//         $('#input-end').datepicker('setDatesDisabled', array[type - 1]).datepicker('setStartDate', getCurDate());
//         $('#input-start').datepicker('setDate', null);
//         $('#input-end').datepicker('setDate', null);
//         setDisabledDates(array[type - 1]);
//         // console.log(array[type - 1]);
//       }else{
//         $('#input-start').datepicker('setDatesDisabled', "");
//         $('#input-end').datepicker('setDatesDisabled', "");
//       }
//   });
// });
// // функция проверяет не находится ли выбранный промежуток дат пользователем между занятыми датами
// $('#datepicker').datepicker().on('changeDate', function (ev) {
//     // console.log($('#input-end').val());
//     var start = new Date($('#input-start').val());
//     var end = new Date($('#input-end').val());
//     for(let i =0; i < dis.length; i++){
//       var disDate = new Date(dis[i]);
//       if((start < disDate) && (end > disDate)){
//         $('#input-end').datepicker('setDate', null).datepicker('setStartDate', getCurDate());
//         $('#input-start').datepicker('setDate', null).datepicker('setStartDate', getCurDate());
//         // console.log('is date not valid');
//         break;
//       }
//     }
// });
