<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'administrator/page'], function () {
  Auth::routes([
    'reset' => false,
    'confirm' => false,
    'register' => false,
    'verify' => false
  ]);
  Route::get('logout', 'Auth\LoginController@logout')->name('get-logout');
});

// необходим кастомный middleware для этих маршрутов, чтобы не было портянок
// маршруты используемые после авторизации администратора
Route::group(['middleware' => 'auth'], function() {
    Route::get('/panel', 'AdminController@Index')->name('admin-panel');

    Route::group(['prefix' => 'panel'], function () {
      Route::post('/confirm-client-request', 'AdminController@ComfirmClient')->name('comfirm-client');
      Route::post('/delete-client-request', 'AdminController@DeleteRequestClient')->name('delete-client');
      Route::post('/add-client-request', 'AdminController@AddNewClient')->name('add-client');
      Route::post('/change-client-request', 'AdminController@ChangeDataClient')->name('change-client');
      Route::post('/change-rooms-request', 'AdminController@ChangeDataRooms')->name('change-rooms');
    });

});

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'index');


Route::get('reservation/confirm/client/{uuid?}', 'ReservationController@ConfirmClient')->name('confirm-email');
Route::get('reservation/{type?}', 'ReservationController@index')->name('reserv-page')->where('type', '[0-9]+');
Route::post('reservation/rooms/getAvailable/', 'ReservationController@FetchRoomsByType')->name('fetch-rooms');
Route::post('/reservation/sumbit/room', 'ReservationController@AddUserToSheduler')->name('reserv-request');

Route::get('description', 'HomeController@GetAllRooms')->name('description-page');
Route::view('contact', 'contact.contact')->name('contact-page');


Route::post('contact/sumbit/message', 'ContactController@SumbitMessage')->name('contact-form');
