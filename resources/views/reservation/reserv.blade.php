@extends('layouts.app')
@section('title-block')Бронивароние номера @endsection
@section('content')
<div class="reserv-top-100"></div>
<section class="reserv-section">
  <h2 class="reserv-title">Бронирование в гостевом доме</h2>
  @if($errors->any())
  <div class="alert alert-danger" id="alert-message" style="margin-left: 2rem; margin-right: 2rem;">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  @if (session('error'))
      <div class="alert alert-danger text-center msg" id="custom-error">
      <strong>{{ session('error') }}</strong>
      </div>
  @endif
  @if(Session::has('success-record'))
  <div class="alert alert-success text-center msg" id="alert-message" role="alert" style="margin-left: 2rem; margin-right: 2rem;">
    <strong>{{ session('success-record') }}</strong>
  </div>
  @endif
  <div class="container form-container form-style" data-form-type="formoid">
  <form class="form-reserv" action="{{ route('fetch-rooms') }}" method="post">
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
                    <option value="0" selected>Любой номер</option>
                    @foreach($rooms as $room)
                      @if($type == $room->type)
                          <option value="{{ $room->type }}" selected>{{ $room->name }}</option>
                      @else
                          <option value="{{ $room->type }}">{{ $room->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-7 col-sm-10 col-10 d-flex justify-content-center">
                <div class="set-center-counter">
                  <input type="number" style="text-align: center;" class="form-control" name="count-person" count-person"text-area-count" required="" placeholder="Количество персон" min="1" max="10">
                </div>
              </div>
            </div>
          </div>
      </div>
      </div>
      <div class="container container-fluid d-flex justify-content-center">
        <button class="btn btn-form btn-outline-light reserv-btn" type="submit" href="">Найти номера</button>
      </div>
    </form>
  </div>
  <div>
    @if(isset($data['available1'])  && isset($data['available2']) && isset($data['available3']))
      @if($data['available1'] < 10 || $data['available2'] < 4 || $data['available3'] < 5)
        <div class="text-center msg reserv-text-strong">
          <hr>
          <div class="fetch-room-title">Доступные номера</div>
        </div>
        <hr>
      @else
        <div class="text-center msg reserv-text-strong">
          <div class="alert alert-danger text-center msg fetch-room-title">
            <div class="fetch-text-error">
              К сожалению, с {{ $arrival }} по {{ $depart }} нет свободных номеров, вы можете выбрать более поздние даты)).
            </div>
          </div>
        </div>
      @endif
      <div class="container">
        <div class="row">
          @if(intval($type) > 0)
            @foreach($rooms as $room)
              @if($data['available1'] < 10 && intval($type) == $room->type)
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-60 shadow p-3 mb-5 bg-white fetch-container-item">
                        <div class="card-body text-center">
                          <div class="fetch-name-room">{{ $room->name }}</div>
                          <div class="fetch-price-room">{{ $room->price }} руб. за сутки</div>
                          <a class="btn btn-outline-light fetch-data-input" onclick='OpenInputDataForm("{{ $room->type }}");'>Ввести данные</a>
                        </div>
                    </div>
                </div>
              @endif
              @if($data['available2'] < 4 && intval($type) == $room->type)
                <div class="col-md-4 mb-3 mb-md-0">
                  {{$data['available2']}}
                    <div class="card py-4 h-60 shadow p-3 mb-5 bg-white fetch-container-item">
                        <div class="card-body text-center">
                          <div class="fetch-name-room">{{ $room->name }}</div>
                          <div class="fetch-price-room">{{ $room->price }} руб. за сутки</div>
                          <a class="btn btn-outline-light fetch-data-input" onclick='OpenInputDataForm("{{ $room->type }}");'>Ввести данные</a>
                        </div>
                    </div>
                </div>
              @endif
              @if($data['available3'] < 5 && intval($type) == $room->type)
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-60 shadow p-3 mb-5 bg-white fetch-container-item">
                        <div class="card-body text-center">
                          <div class="fetch-name-room">{{ $room->name }}</div>
                          <div class="fetch-price-room">{{ $room->price }} руб. за сутки</div>
                          <a class="btn btn-outline-light fetch-data-input" onclick='OpenInputDataForm("{{ $room->type }}");'>Ввести данные</a>
                        </div>
                    </div>
                </div>
              @endif
            @endforeach
          @else
            @foreach($rooms as $room)
              @if($data['available1'] < 10 && $room->type == 1)
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-60 shadow p-3 mb-5 bg-white fetch-container-item">
                        <div class="card-body text-center">
                          <div class="fetch-name-room">{{ $room->name }}</div>
                          <div class="fetch-price-room">{{ $room->price }} руб. за сутки</div>
                          <a class="btn btn-outline-light fetch-data-input" onclick='OpenInputDataForm("{{ $room->type }}");'>Ввести данные</a>
                        </div>
                    </div>
                </div>
              @endif
              @if($data['available2'] < 4 && $room->type == 2)
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-60 shadow p-3 mb-5 bg-white fetch-container-item">
                        <div class="card-body text-center">
                          <div class="fetch-name-room">{{ $room->name }}</div>
                          <div class="fetch-price-room">{{ $room->price }} руб. за сутки</div>
                          <a class="btn btn-outline-light fetch-data-input" onclick='OpenInputDataForm("{{ $room->type }}");'>Ввести данные</a>
                        </div>
                    </div>
                </div>
              @endif
              @if($data['available3'] < 5 && $room->type == 3)
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-60 shadow p-3 mb-5 bg-white fetch-container-item">
                        <div class="card-body text-center">
                          <div class="fetch-name-room">{{ $room->name }}</div>
                          <div class="fetch-price-room">{{ $room->price }} руб. за сутки</div>
                          <button class="btn btn-outline-light fetch-data-input" onclick='OpenInputDataForm("{{ $room->type }}");'>Ввести данные</button>
                        </div>
                    </div>
                </div>
              @endif
            @endforeach
          @endif
        </div>
      </div>
      <div class="input-data-user">
        <form class="form-reserv" action="{{ route('reserv-request') }}" method="post">
          @csrf
          <input type="hidden" name="arrival" value="{{ $arrival }}">
          <input type="hidden" name="depart" value="{{ $depart }}">
          <input id="type-selected-room" type="hidden" name="type" value="">
          <input type="hidden" name="count" value="{{ $count }}">
          <div class="form-group">
            <div class="d-flex justify-content-center">
              <input id="username" type="text" required="" name="username" value="" class="form-control input-style-form input1" placeholder="Ф И О">
            </div>
          </div>
          <div class="form-group">
            <div class="d-flex justify-content-center">
              <input id="email" type="text" required="" name="email" value="" class="form-control input-style-form" placeholder="Введите email">
            </div>
          </div>
          <div class="form-group">
            <div class="d-flex justify-content-center">
              <input id="masked-phone-text" type="text" required="" name="phone" value="" class="form-control input-style-form" placeholder="Номер телефона">
            </div>
          </div>
          <div class="container container-fluid d-flex justify-content-center">
            <button class="btn btn-form btn-outline-light reserv-btn btn-request" type="submit" >Забронировать</button>
          </div>
          <!-- onclick='ReservUserRequest("{{ $arrival }}", "{{ $depart }}", "{{ $count }}, "{{ $type }}");' -->
        </form>
      </div>
    @endif
    <div class="text-center msg reserv-text-strong">
      <strong>Заезд в номера производится с 14:00.<br>
        Выезд из номеров проживания осуществляется до 12:00.
      </strong>
    </div>
  </div>
</section>
@endsection

@section('scripts')
  <script type="text/javascript" src="http://127.0.0.1:8000/js/vendor/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="http://127.0.0.1:8000/js/vendor/datepicker/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="http://127.0.0.1:8000/js/vendor/datepicker/bootstrap-datepicker.ru.min.js"></script>
  <script type="text/javascript" src="http://127.0.0.1:8000/js/dateInit.js"></script>
@endsection
