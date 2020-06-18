<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="ie=edge" http-equiv="X-RU-Compatible">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.8/css/all.css">
  <link rel = "icon" href ="assets/img/logo.png" type = "image/x-icon">
  <link rel="stylesheet" href="css/styles.css">
  <!-- <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" > -->
  <link rel="stylesheet" href="js/vendor/datepicker/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="js/vendor/datepicker/bootstrap-datepicker3.min.css">
  <link rel="stylesheet" href="js/vendor/datepicker/bootstrap-datepicker3.standalone.min.css">
  @yield('styles-user')

  <title>@yield('title-block')</title>
</head>
  <body data-spy="scroll" data-target=".navbar" data-offset="200">

    <header id="#header" class="fixed-top">
      @include('includes.navbar')
    </header>

      @yield('content')
      @guest
        <footer>
          @include('includes.footer')
        </footer>
      @endguest
      <div id="preloader"></div>

      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
      <script type="text/javascript" src="js/vendor/jquery.waypoints.min.js"></script>
      <script type="text/javascript" src="js/vendor/venobox.min.js"></script>
      <script type="text/javascript" src="js/vendor/highslide/highslide.min.js"></script>
      <script type="text/javascript" src="js/vendor/isotope.pkgd.min.js"></script>
      <script type="text/javascript" src="js/vendor/animatescroll.min.js"></script>
      <script type="text/javascript" src="js/vendor/counterup.min.js"></script>
      <script type="text/javascript" src="js/vendor/bootstrap-input-spinner.js"></script>
      <script type="text/javascript" src="js/vendor/datepicker/bootstrap-datepicker.min.js"></script>
      <script type="text/javascript" src="js/vendor/datepicker/bootstrap-datepicker.ru.min.js"></script>
      <script type="text/javascript" src="js/vendor/jquery.maskedinput.min.js"></script>
      @yield('scripts')
      <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
