<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login','UserController@getloginAdmin');
Route::post('admin/login','UserController@postloginAdmin');
Route::get('admin/logout','UserController@getlogoutAdmin');

Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function () {
  Route::get('register/list','DangKyController@getDangky');
  Route::get('download', 'ExportController@getExport');

  Route::get('add', 'UserController@getAdd');
  Route::post('add', 'UserController@postAdd');
});


Route::get('pages/dangky','PagesController@getdangky');
Route::post('pages/dangky','PagesController@postdangky');

Route::get('download','ExportController@getExport');

Route::get('sendmail{id}','PagesController@getDangky');
Route::post('sendmail{id}','SendMailController@postsendMail');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
