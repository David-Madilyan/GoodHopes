@extends('layouts.app')

@section('title-block')Описание номеров @endsection


@section('content')
  <section id="description" class="description ">

    <div class="container margin-top-desc" data-aos="fade-up">
      <div class="section-title">
        <h2 class="description-title-text">Фотографии гостевого дома</h2>
        <p class="description-title-text">У нас вы можете отдохнуть от городской суеты и насладится теплыми сочинскими вечерами. Мы стараемся сделать проживание во время отдыха для каждого клиента незабываемым и приятным. Для этого  во дворе имеется мангал для шашлыков с беседкой. Столики размещены в живописном месте откуда открывается красивый вид на море. Для детей имеется игровая площадка. В гостевом доме располагается также летняя кухня. Однако, проживание с животными не разрешается.</p>
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
            <img src="assets/img/desc/vid7.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 1</p>
              <div class="description-links">
                <a href="assets/img/desc/vid7.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 1"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-all-item filter-home">
          <div class="description-wrap">
            <img src="assets/img/desc/zakat2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 2</p>
              <div class="description-links">
                <a href="assets/img/desc/zakat2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 2"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-all-item filter-sea">
          <div class="description-wrap">
            <img src="assets/img/desc/zakat.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 3</p>
              <div class="description-links">
                <a href="assets/img/desc/zakat.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 3"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-all-item filter-home">
          <div class="description-wrap">
            <img src="assets/img/desc/vid1.JPG" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 4</p>
              <div class="description-links">
                <a href="assets/img/desc/vid1.JPG" onclick="return hs.expand(this)" class="highslide" title="Фото 4"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-all-item filter-home">
          <div class="description-wrap">
            <img src="assets/img/desc/vid10.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 5</p>
              <div class="description-links">
                <a href="assets/img/desc/vid10.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 5"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-all-item filter-home">
          <div class="description-wrap">
            <img src="assets/img/desc/vid2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 6</p>
              <div class="description-links">
                <a href="assets/img/desc/vid2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
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
            <img src="assets/img/desc/room1/1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 1</p>
              <div class="description-links">
                <a href="assets/img/desc/room1/1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 1"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item filter-bath">
          <div class="description-wrap">
            <img src="assets/img/desc/room1/bath1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 2</p>
              <div class="description-links">
                <a href="assets/img/desc/room1/bath1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 2"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item filter-room">
          <div class="description-wrap">
            <img src="assets/img/desc/room1/2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 3</p>
              <div class="description-links">
                <a href="assets/img/desc/room1/2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 3"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item filter-room">
          <div class="description-wrap">
            <img src="assets/img/desc/room1/3.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 4</p>
              <div class="description-links">
                <a href="assets/img/desc/room1/3.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 4"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item filter-bath">
          <div class="description-wrap">
            <img src="assets/img/desc/room1/bath2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 5</p>
              <div class="description-links">
                <a href="assets/img/desc/room1/bath2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 5"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item filter-room">
          <div class="description-wrap">
            <img src="assets/img/desc/room1/4.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 6</p>
              <div class="description-links">
                <a href="assets/img/desc/room1/4.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    @if($room->type == 2)
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
        <a class="btn btn-outline-light description-btn" href="reservation/2">Забронировать</a>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="description-flters3">
            <li data-filter="*" class="filter-active3">Все фотографии</li>
            <li data-filter=".filter-room">Комната</li>
            <li data-filter=".filter-bath">Уборная</li>
          </ul>
        </div>
      </div>
      <div class="row description-container3" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-4 col-md-6 description-item3 filter-room">
          <div class="description-wrap">
            <img src="assets/img/desc/room2/1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 1</p>
              <div class="description-links">
                <a href="assets/img/desc/room2/1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 1"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item3 filter-bath">
          <div class="description-wrap">
            <img src="assets/img/desc/room2/bath1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 2</p>
              <div class="description-links">
                <a href="assets/img/desc/room2/bath1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 2"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item3 filter-room">
          <div class="description-wrap">
            <img src="assets/img/desc/room2/2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 3</p>
              <div class="description-links">
                <a href="assets/img/desc/room2/2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 3"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item3 filter-room">
          <div class="description-wrap">
            <img src="assets/img/desc/room2/3.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 4</p>
              <div class="description-links">
                <a href="assets/img/desc/room2/3.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 4"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item3 filter-bath">
          <div class="description-wrap">
            <img src="assets/img/desc/room2/bath2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 5</p>
              <div class="description-links">
                <a href="assets/img/desc/room2/bath2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 5"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item3 filter-room">
          <div class="description-wrap">
            <img src="assets/img/desc/room2/4.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 6</p>
              <div class="description-links">
                <a href="assets/img/desc/room2/4.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
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
        <a class="btn btn-outline-light description-btn" href="/reservation/3">Забронировать</a>
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
            <img src="assets/img/desc/room3/1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 1</p>
              <div class="description-links">
                <a href="assets/img/desc/room3/1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 1"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item1 filter-room1">
          <div class="description-wrap">
            <img src="assets/img/desc/room3/2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 3</p>
              <div class="description-links">
                <a href="assets/img/desc/room3/2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 3"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item1 filter-bath1">
          <div class="description-wrap">
            <img src="assets/img/desc/room3/bath1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 2</p>
              <div class="description-links">
                <a href="assets/img/desc/room3/bath1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 2"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item1 filter-room1">
          <div class="description-wrap">
            <img src="assets/img/desc/room3/3.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 4</p>
              <div class="description-links">
                <a href="assets/img/desc/room3/3.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 4"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item1 filter-bath1">
          <div class="description-wrap">
            <img src="assets/img/desc/room3/bath2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 5</p>
              <div class="description-links">
                <a href="assets/img/desc/room3/bath2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 5"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 description-item1 filter-room1">
          <div class="description-wrap">
            <img src="assets/img/desc/room3/4.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 7</p>
              <div class="description-links">
                <a href="assets/img/desc/room3/4.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 7"><i class="fas fa-search"></i></a>
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
        <h2 id="sportTitle" class="description-title-text">Услуги</h2>
        <p class="description-title-text">Для нас, качественный сервис — это ключевая характеристика хорошего отдыха. Представленный список услуг соответствует уровню нашего гостевого дома. Мы всегда стараемся привносить новое или улучшать существующий сервис, основываясь на опыте предыдущих лет и на отзывах клиентов. Ниже вы можете подробней ознакомиться с ними</p>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="description-flters2">
            <li data-filter="*" class="filter-active2">Все фотографии</li>
            <li data-filter=".filter-sport">Спортивный зал</li>
            <li data-filter=".filter-bild">Трансфер</li>
            <li data-filter=".filter-pool">Бассейн</li>
            <li data-filter=".filter-pong">Столовая</li>
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
                <a href="assets/img/desc/other/z1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 1"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-pool">
          <div class="description-wrap">
            <img src="assets/img/desc/other/p1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 2</p>
              <div class="description-links">
                <a href="assets/img/desc/other/p1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 3"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-sport">
          <div class="description-wrap">
            <img src="assets/img/desc/other/z2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 3</p>
              <div class="description-links">
                <a href="assets/img/desc/other/z2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 2"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-pool">
          <div class="description-wrap">
            <img src="assets/img/desc/other/p2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 4</p>
              <div class="description-links">
                <a href="assets/img/desc/other/p2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 5"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-pool">
          <div class="description-wrap">
            <img src="assets/img/desc/other/p3.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 5</p>
              <div class="description-links">
                <a href="assets/img/desc/other/p3.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-bild">
          <div class="description-wrap">
            <img src="assets/img/desc/other/t1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 6</p>
              <div class="description-links">
                <a href="assets/img/desc/other/t1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-pong">
          <div class="description-wrap">
            <img src="assets/img/desc/other/s1.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 7</p>
              <div class="description-links">
                <a href="assets/img/desc/other/s1.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 description-item2 filter-pong">
          <div class="description-wrap">
            <img src="assets/img/desc/other/s2.jpg" class="img-fluid" alt="">
            <div class="description-info">
              <p>Фото 8</p>
              <div class="description-links">
                <a href="assets/img/desc/other/s2.jpg" onclick="return hs.expand(this)" class="highslide" title="Фото 6"><i class="fas fa-search"></i></a>
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
