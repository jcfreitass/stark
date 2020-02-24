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

Route::get ('/visitors', 'visitorsController@index')->name('visitors');
Route::post ('/create_user', 'visitorsController@store');
Route::get ('/exit/{id}', 'visitorsController@exit');

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/inside', 'HomeController@index')->name('home');
