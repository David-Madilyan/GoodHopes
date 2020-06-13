@section('navbar')
  <nav class="navbar navbar-expand-xl navbar-light sticky-top">
    @guest
      <a class="navbar-brand" href="{{ route('home') }}"><img class="navbar-img-logo" src="assets/img/icons/logo1.PNG" /></a>
    @endguest
    @auth
      <h5>Панель администратора</h5>
    @endauth
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsItems" aria-controls="navbarsItems" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="navbar-collapse collapse" id="navbarsItems">
        <ul class="navbar-nav ml-auto">

          @guest
          <li class="nav-item">
            <a id="main-link" class="nav-link" href="{{ route('home') }}">На главную</a>
          </li>
          <li class="nav-item">
            <a id="reserv-link" class="nav-link" href="{{ route('reserv-page') }}">Забронировать номер</a>
          </li>
          <li class="nav-item">
            <a id="descr-link" class="nav-link" href="{{ route('description-page') }}">Описание</a>
          </li>
            <li class="nav-item">
              <a id="services-link" class="nav-link " href="#services" onclick="$('#services').animatescroll({padding:100});">Услуги</a>
            </li>
            <li class="nav-item">
              <a id="review-link" class="nav-link" href="#containerReviews" onclick="$('#containerReviews').animatescroll({padding:200});">Отзывы</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact-page') }}">Написать нам</a>
          </li>
          @endguest
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('get-logout') }}">Выйти</a>
          </li>
          @endauth
      </ul>
    </div>
  </nav>
