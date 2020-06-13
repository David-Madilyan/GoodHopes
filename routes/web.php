<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'administrator'], function () {
});

Auth::routes([
  'reset' => false,
  'confirm' => false,
  'register' => false,
  'verify' => false
]);

// маршруты используемые после авторизации администратора
Route::get('logout', 'Auth\LoginController@logout')->name('get-logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/panel', 'AdminController@Index')->name('admin-panel');
    Route::group(['prefix' => 'panel'], function () {
      Route::post('/confirm-client-request', 'AdminController@ComfirmClient')->name('comfirm-client');
      Route::post('/delete-client-request', 'AdminController@DeleteRequestClient')->name('delete-client');
    });

});

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'index');



Route::view('description', 'description')->name('description-page');
Route::view('reservation', 'reserv')->name('reserv-page');
Route::view('contact', 'contact.contact')->name('contact-page');


Route::post('contact/sumbit/message', 'ContactController@SumbitMessage')->name('contact-form');
Route::post('reservation/sumbit/room', 'ReservationController@AddUserToSheduler')->name('reserv-request');

Route::get('/send', 'MailController@send')->name('sender-control');
