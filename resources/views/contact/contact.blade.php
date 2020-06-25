@extends('layouts.app')
@section('title-block')Связаться с нами @endsection

@section('content')
<div class="d-flex justify-content-center map-container">
  <div id="yandex-map"></div>
</div>
<section class="contact-background-style" id="form-contact">
  <div class="container wrapper">
      <div class="row main-row">
          <div class="col-sm-12 col-lg-8 col-md-6 form-container form-style" data-form-type="formoid">
              <h2 class="text-section-title">Связаться</h2>
              <!-- <div data-form-alert="" hidden="">Спасибо что связались с нами!</div> -->
              <form id="form-contact-id" class="contact-form" action="{{ route('contact-form') }}" method="post">
                  @csrf
                  <div class="row input-main" >
                      <div class="col-md-12 col-lg-6 input-data-contact" data-for="firstname">
                          <input type="text" class="field display-7" name="firstname" placeholder="Имя" data-form-field="Ваше имя" required="" id="firstname-form-c">
                      </div>
                      <div class="col-md-12 col-lg-6 input-data-contact" data-for="email">
                          <input type="email" class="field display-7" name="email" data-form-field="Email" placeholder="Email" required="" id="email-form-c">
                      </div>
                  </div>
                  <div class="row input-main-contact">
                      <div class="col-md-12 col-lg-12 form-group" data-for="message">
                          <textarea type="text" class="form-control display-7" name="message" rows="7" data-form-field="Message" placeholder="Сообщение" id="message-form-c"></textarea>
                      </div>
                  </div>
                  @if($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                  @if (session('error-contact'))
                      <div class="alert alert-danger text-center msg" id="custom-error">
                        <strong>{{ session('error-contact') }}</strong>
                      </div>
                  @endif
                  @if(Session::has('success-contact'))
                  <div class="alert alert-success text-center msg" role="alert">
                    <strong>{{ session('success-contact') }}</strong>
                  </div>
                  @endif
                  <div class="row input-main-contact">
                      <div class="col-md-12 col-lg-12 btn-row">
                          <span class="input-group-btn">
                              <button href="" type="submit" class="btn btn-form">ОТПРАВИТЬ</button>
                          </span>
                      </div>
                  </div>
              </form>
          </div>

          <div class="col-sm-12 col-lg-4 col-md-6 px-0 text-block">
              <div class="content-panel">
                  <div class="text-block pb-3">
                      <h5 class="title-address-contact">Адрес</h5>
                      <p class="other-text-form">Город Сочи, Кудепста, улица Добрых надежд, дом 3, 354349</p>
                  </div>
                  <div class="text-block pb-3">
                      <h5 class="title-address-contact">Позвоните нам</h5>
                      <p class="other-text-form">+ 7 (918) 405 54 27</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection

@section('scripts')
  <script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?apikey=3aa60409-53c1-4e7d-91d8-4d7835bf5104&load=package.full&lang=ru_RU"></script>
  <script type="text/javascript" src="js/map.js"></script>
@endsection
