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

//Auth::routes();

//Route::prefix('magic')->group(function () {

    /** Publicly Available Routes **/
    //Route::view('/', 'home')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard/update', 'DashboardController@update')->name('dashboard.update');

    /**  Scavenger Hunt Routes  **/
    Route::middleware(['patron.auth', 'auth'])->group(function () {

        Route::get('/play', 'PlayController@index')->name('play');
        Route::get('/play', 'PlayController@index')->name('play');
        Route::get('/sort', 'PlayController@index')->name('play.submit');
        Route::get('/play/{waypoint}', 'PlayController@waypoint')->name('play.waypoint');
        Route::post('/play/{waypoint}', 'PlayController@waypointCheck')->name('play.waypoint.check');
        Route::get('/coupon', 'PlayController@coupon')->name('coupon');

    });

//});


