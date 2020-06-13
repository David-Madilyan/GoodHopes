@extends('layouts.app')
@section('title-block')Бронивароние номера @endsection
@section('content')
<div class="reserv-top-100"></div>
<section class="reserv-section">
  <h2 class="reserv-title">Бронирование в гостевом доме</h2>
  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  @if(Session::has('success-record'))
  <div class="alert alert-success" id="alert-message" role="alert" style="margin-left: 2rem; margin-right: 2rem;">
    Заявка была отправлена.
  </div>
  @endif

  <div class="container form-container form-style" data-form-type="formoid">
  <form class="form-reserv" action="{{ route('reserv-request') }}" method="post">
    @csrf
    <div class="input-daterange input-group" id="datepicker">
      <div class="container wrapper">
          <div class="row justify-content-center">
            <div class="row col-xl-6 col-lg-5 col-md-10 col-sm-12 col-12 justify-content-center">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" data-for="date-start">
                <input type="text" class="input-sm form-control" name="date-start" id="input-start" required="" placeholder="Дата заезда"/>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" data-for="date-end">
                <input type="text" class="input-sm form-control" name="date-end" required="" id="input-end" placeholder="Дата отъезда"/>
              </div>
            </div>

            <div class="row col-xl-6 col-lg-7 col-md-8 col-sm-8 col-12 justify-content-center set-margin-group">
              <div class="col-xl-6 col-lg-5 col-md-7 col-sm-10 col-10 d-flex justify-content-center">
                <div class="col-auto my-1">
                  <select class="custom-select mr-sm-2" id="inlineRoomSelect" name="type-room" required="">
                    <option selected>Выберите номер</option>
                    <option value="1">Первый</option>
                    <option value="2">Второй</option>
                    <option value="3">Третий</option>
                    <option value="4">Четвертый</option>
                  </select>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-7 col-sm-10 col-10 d-flex justify-content-center">
                <div class="set-center-counter">
                  <input type="number" style="text-align: center;" class="form-control" name="count-person" count-person"text-area-count" required="" placeholder="Количество персон" max="10">
                </div>
              </div>
            </div>
          </div>
      </div>
      </div>
      <div class="form-group">
        <div class="d-flex justify-content-center">
          <input type="text" required="" name="username" value="" class="form-control input-style-form input1" placeholder="Ф И О">
        </div>
      </div>

      <div class="form-group">
        <div class="d-flex justify-content-center">
          <input type="text" required="" name="email" value="" class="form-control input-style-form" placeholder="Введите email">
        </div>
      </div>

      <div class="form-group">
        <div class="d-flex justify-content-center">
          <input id="masked-phone-text" type="text" required="" name="phone" value="" class="form-control input-style-form" placeholder="Номер телефона">
        </div>
      </div>

      <div class="container container-fluid d-flex justify-content-center">
        <button class="btn btn-form btn-outline-light reserv-btn" type="submit" href="">Подать заявку</button>
      </div>

    </form>
  </div>
</section>
@endsection
