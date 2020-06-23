@extends('layouts.app')

@section('title-block')Описание номеров @endsection


@section('content')
  <section id="description" class="description ">

    <div class="container margin-top-desc" data-aos="fade-up">
      <div class="section-title">
        <h2 class="description-title-text">Фотографии гостевого дома</h2>
        <p class="description-title-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="description-flters-all">
            <li data-filter="*" class="filter-all-active">Все фотографии</li>
            <li data-filter=".filter-sea">Виды на море</li>
            <li data-filter=".filter-home">Территория дома</li>
          </ul>
        </div>
      </div>
      <div class="row description-container-all" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-4 col-md-6 description-all-item filter-sea">
          <div class="description-wrap">
            <img src="assets/img/other/sea1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 1</p>
              <div class="description-links">
                <a href="assets/img/other/sea1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 1"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-all-item filter-home">
          <div class="description-wrap">
            <img src="assets/img/other/home1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 2</p>
              <div class="description-links">
                <a href="assets/img/other/home1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 2"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-all-item filter-sea">
          <div class="description-wrap">
            <img src="assets/img/other/sea2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 3</p>
              <div class="description-links">
                <a href="assets/img/other/sea2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 3"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-all-item filter-home">
          <div class="description-wrap">
            <img src="assets/img/other/home2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 4</p>
              <div class="description-links">
                <a href="assets/img/other/home2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 4"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-all-item filter-home">
          <div class="description-wrap">
            <img src="assets/img/other/home4.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 5</p>
              <div class="description-links">
                <a href="assets/img/other/home4.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 5"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-all-item filter-home">
          <div class="description-wrap">
            <img src="assets/img/other/home3.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 6</p>
              <div class="description-links">
                <a href="assets/img/other/home3.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @foreach($rooms as $room)
    @if($room->type == 1)
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2 class="description-title-text">{{ $room->name }}</h2>
        <p class="description-title-text">{{ $room->description }}</p>
        <div class="row counters d-flex justify-content-center">
          <div class="col-lg-2 col-6 text-center">
              <img src="assets/img/icons/wif.png">
            <p class="description-list-price">Бесплатный wi-fi</p>
          </div>
          <div class="col-lg-2 col-6 text-center">
              <img src="assets/img/icons/pri.png">
            <p class="description-list-price">{{ $room->price }} руб./сутки</p>
          </div>
          <div class="col-lg-2 col-6 text-center">
              <img src="assets/img/icons/wav.png">
            <p class="description-list-price">Вид на море</p>
          </div>
          <div class="col-lg-2 col-6 text-center">
              <img src="assets/img/icons/ven.png">
            <p class="description-list-price">Кондиционер</p>
          </div>
          <div class="col-lg-2 col-6 text-center">
              <img src="assets/img/icons/par.png">
            <p class="description-list-price">Бесплатная парковка</p>
          </div>
        </div>
        <a class="btn btn-outline-light description-btn" href="reservation/1">Забронировать</a>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="description-flters">
            <li data-filter="*" class="filter-active">Все фотографии</li>
            <li data-filter=".filter-room">Комната</li>
            <li data-filter=".filter-bath">Уборная</li>
          </ul>
        </div>
      </div>
      <div class="row description-container" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-4 col-md-6 description-item filter-room">
          <div class="description-wrap">
            <img src="assets/img/room1/room_type1_1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 1</p>
              <div class="description-links">
                <a href="assets/img/room1/room_type1_1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 1"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item filter-bath">
          <div class="description-wrap">
            <img src="assets/img/room1/bath1_1.png" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 2</p>
              <div class="description-links">
                <a href="assets/img/room1/bath1_1.png" onclick="return hs.expand(this)" class="highslide" title="Фото 2"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item filter-room">
          <div class="description-wrap">
            <img src="assets/img/room1/room_type1_2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 3</p>
              <div class="description-links">
                <a href="assets/img/room1/room_type1_2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 3"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item filter-room">
          <div class="description-wrap">
            <img src="assets/img/room1/room_type1_3.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 4</p>
              <div class="description-links">
                <a href="assets/img/room1/room_type1_3.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 4"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item filter-bath">
          <div class="description-wrap">
            <img src="assets/img/room1/bath1_2.png" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 5</p>
              <div class="description-links">
                <a href="assets/img/room1/bath1_2.png" onclick="return hs.expand(this)" class="highslide" title="Фото 5"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item filter-room">
          <div class="description-wrap">
            <img src="assets/img/room1/room_type1_4.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 6</p>
              <div class="description-links">
                <a href="assets/img/room1/room_type1_4.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    @if($room->type == 3)
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2 id="room2Title" class="description-title-text">{{ $room->name }}</h2>
        <p class="description-title-text">{{ $room->description }}</p>
        <div class="row counters d-flex justify-content-center">
          <div class="col-lg-2 col-6 text-center">
              <img src="assets/img/icons/wif.png">
            <p class="description-list-price">Бесплатный wi-fi</p>
          </div>
          <div class="col-lg-2 col-6 text-center">
              <img src="assets/img/icons/pri.png">
            <p class="description-list-price">{{ $room->price }} руб./сутки</p>
          </div>
          <div class="col-lg-2 col-6 text-center">
              <img src="assets/img/icons/wav.png">
            <p class="description-list-price">Вид на море</p>
          </div>
          <div class="col-lg-2 col-6 text-center">
              <img src="assets/img/icons/ven.png">
            <p class="description-list-price">Кондиционер</p>
          </div>
          <div class="col-lg-2 col-6 text-center">
              <img src="assets/img/icons/par.png">
            <p class="description-list-price">Бесплатная парковка</p>
          </div>
        </div>
        <a class="btn btn-outline-light description-btn" href="/reservation/4">Забронировать</a>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="description-flters1">
            <li data-filter="*" class="filter-active1">Все фотографии</li>
            <li data-filter=".filter-room1">Комната</li>
            <li data-filter=".filter-bath1">Уборная</li>
          </ul>
        </div>
      </div>
      <div class="row description-container1" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-4 col-md-6 description-item1 filter-room1">
          <div class="description-wrap">
            <img src="assets/img/room2/room_type2_1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 1</p>
              <div class="description-links">
                <a href="assets/img/room2/room_type2_1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 1"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item1 filter-room1">
          <div class="description-wrap">
            <img src="assets/img/room2/room_type2_2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 3</p>
              <div class="description-links">
                <a href="assets/img/room2/room_type2_2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 3"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item1 filter-bath1">
          <div class="description-wrap">
            <img src="assets/img/room2/bath2_1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 2</p>
              <div class="description-links">
                <a href="assets/img/room2/bath2_1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 2"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item1 filter-room1">
          <div class="description-wrap">
            <img src="assets/img/room2/room_type2_3.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 4</p>
              <div class="description-links">
                <a href="assets/img/room2/room_type2_3.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 4"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item1 filter-bath1">
          <div class="description-wrap">
            <img src="assets/img/room2/bath2_2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 5</p>
              <div class="description-links">
                <a href="assets/img/room2/bath2_2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 5"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item1 filter-room1">
          <div class="description-wrap">
            <img src="assets/img/room2/room_type2_4.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 6</p>
              <div class="description-links">
                <a href="assets/img/room2/room_type2_4.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item1 filter-room1">
          <div class="description-wrap">
            <img src="assets/img/room2/room_type2_5.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 7</p>
              <div class="description-links">
                <a href="assets/img/room2/room_type2_5.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 7"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    @endforeach
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2 id="sportTitle" class="description-title-text">Спортивный зал и немного другое</h2>
        <p class="description-title-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="description-flters2">
            <li data-filter="*" class="filter-active2">Все фотографии</li>
            <li data-filter=".filter-sport">Спортивный зал</li>
            <li data-filter=".filter-bild">Бильярд</li>
            <li data-filter=".filter-pool">Бассейн</li>
            <li data-filter=".filter-pong">Пинг-понг</li>
          </ul>
        </div>
      </div>

      <div class="row description-container2" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-4 col-md-6 description-item2 filter-sport">
          <div class="description-wrap">
            <img src="assets/img/other/sport_room1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 1</p>
              <div class="description-links">
                <a href="assets/img/other/sport_room1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 1"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-pool">
          <div class="description-wrap">
            <img src="assets/img/other/pool1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 3</p>
              <div class="description-links">
                <a href="assets/img/other/pool1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 3"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-sport">
          <div class="description-wrap">
            <img src="assets/img/other/sport_room2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 2</p>
              <div class="description-links">
                <a href="assets/img/other/sport_room2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 2"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-sport">
          <div class="description-wrap">
            <img src="assets/img/other/sport_room3.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 4</p>
              <div class="description-links">
                <a href="assets/img/other/sport_room3.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 4"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-pool">
          <div class="description-wrap">
            <img src="assets/img/other/pool1_1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 5</p>
              <div class="description-links">
                <a href="assets/img/other/pool1_1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 5"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-pool">
          <div class="description-wrap">
            <img src="assets/img/other/pool1_2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 6</p>
              <div class="description-links">
                <a href="assets/img/other/pool1_2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-bild">
          <div class="description-wrap">
            <img src="assets/img/other/bild1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 6</p>
              <div class="description-links">
                <a href="assets/img/other/bild1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-sport">
          <div class="description-wrap">
            <img src="assets/img/other/sport_room4.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 6</p>
              <div class="description-links">
                <a href="assets/img/other/sport_room4.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-pong">
          <div class="description-wrap">
            <img src="assets/img/other/pong1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 6</p>
              <div class="description-links">
                <a href="assets/img/other/pong1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script type="text/javascript" src="http://127.0.0.1:8000/js/vendor/highslide/highslide.min.js"></script>
  <script type="text/javascript" src="http://127.0.0.1:8000/js/photo.js"></script>
@endsection
