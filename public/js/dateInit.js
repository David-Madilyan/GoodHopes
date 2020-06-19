$('#review-link').remove();
$('#services-link').remove();
$("#masked-phone-text").mask("8(999) 999-99-99");

function getCurDate() {
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();
  today = mm + '/' + dd + '/' + yyyy;
  return today;
}

// datepicker path code
$('.input-daterange').datepicker({
  language: "ru",
  clearBtn: true,
  orientation: "bottom auto",
  multidate: false,
  todayHighlight: true,
  startDate: getCurDate(),
  format: 'mm/dd/yyyy',
  toggleActive: true,
  datesDisabled: ['06/06/2020', '06/21/2020']
});
// $('#datepicker input').datepicker({
//     datesDisabled: ['06/06/2020', '06/21/2020']
// });
