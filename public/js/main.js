$(window).on('load', function() {
    var pathname = window.location.pathname;
    if(pathname == "/contact" ){
      $('#preloader').fadeOut('slow', function() {
        $(this).remove();
      });
    }else{
      if ($('#preloader').length) {
        $('#preloader').delay(200).fadeOut('slow', function() {
          $(this).remove();
        });
      }
    }

    if(pathname == "/description" ){
      $('#review-link').remove();
      $('#services-link').remove();
    }

    if(pathname == "/contact" ){
      $('#review-link').remove();
      $('#services-link').remove();
      $('#form-contact-id').animatescroll({padding:350});
    }

    if(pathname == "/" || pathname == "/home" ){
      $('#main-link').remove();
    }

  });

$('.counter-up').counterUp({ delay: 10,  time: 1500 });

// code for description

$(document).ready(function(){
  // убирает элемент если такой существует с задержкой
  if($("div").is("#alert-message")){
    $("#alert-message").fadeOut(3000, function(){});
  }

  // для контейнера <div class="container" data-aos="fade-up"> 0
   var descriptionIsotopeAll = $('.description-container-all').isotope({
     itemSelector: '.description-all-item'
   });

  $('#description-flters-all li').on('click', function() {
    $("#description-flters-all li").removeClass('filter-all-active');
    $(this).addClass('filter-all-active');

    descriptionIsotopeAll.isotope({ filter: $(this).data('filter')});
  });

  // для контейнера <div class="container" data-aos="fade-up"> 1
   var descriptionIsotope = $('.description-container').isotope({
     itemSelector: '.description-item'
   });

  $('#description-flters li').on('click', function() {
    $("#description-flters li").removeClass('filter-active');
    $(this).addClass('filter-active');

    descriptionIsotope.isotope({ filter: $(this).data('filter')});
  });

  // для контейнера <div class="container" data-aos="fade-up"> 2
  var descriptionIsotope1 = $('.description-container1').isotope({
    itemSelector: '.description-item1'
  });

 $('#description-flters1 li').on('click', function() {
   $("#description-flters1 li").removeClass('filter-active1');
   $(this).addClass('filter-active1');

   descriptionIsotope1.isotope({ filter: $(this).data('filter')});
 });

  // для контейнера <div class="container" data-aos="fade-up"> 3
  var descriptionIsotope2 = $('.description-container2').isotope({
    itemSelector: '.description-item2'
  });

 $('#description-flters2 li').on('click', function() {
   $("#description-flters2 li").removeClass('filter-active2');
   $(this).addClass('filter-active2');

   descriptionIsotope2.isotope({ filter: $(this).data('filter')});
 });

   // Initiate venobox (lightbox feature used in description)
  $(document).ready(function() {
    $('.venobox').venobox({'share': false});
  });
});

 $("input[type='number']").inputSpinner();
