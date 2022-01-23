<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['auth','admin']],function () {

    Route::get('/dashboard', function() { return view('admin.dashboard'); });
    //Route::get('/icons', function() { return view('admin.icons'); });
    //Route::get('/tables', function() { return view('admin.tables'); });
    //Route::get('/typography', function() { return view('admin.typography'); });
    //Route::get('/upgrade', function() { return view('admin.upgrade'); });

    Route::get('/role-register','Admin\DashboardController@registered');
    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
    Route::put('/role-update/{id}','Admin\DashboardController@registerupadte');
    Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

    Route::get('/abouts','Admin\AboutusController@index');
    Route::post('/save-aboutus','Admin\AboutusController@store');
    Route::get('/aboutus/{id}','Admin\AboutusController@edit');
    Route::put('/aboutus-update/{id}','Admin\AboutusController@update');
    Route::delete('/aboutus-delete/{id}','Admin\AboutusController@delete');

    Route::get('/services-category','Admin\ServiceController@index');
    Route::get('/service-create','Admin\ServiceController@create');
    Route::post('/service-store','Admin\ServiceController@store');
    Route::get('/service-edit/{id}','Admin\ServiceController@edit');
    Route::put('/service-update/{id}','Admin\ServiceController@update');
    Route::delete('/service-delete/{id}','Admin\ServiceController@delete');

    Route::get('/services-list','Admin\ServicelistController@index');
    Route::post('/services-list-add','Admin\ServicelistController@store');
    Route::get('/services-list-edit/{id}','Admin\ServicelistController@edit');
    Route::put('/services-list-update/{id}','Admin\ServicelistController@update');
    Route::delete('/services-list-delete/{id}','Admin\ServicelistController@delete');

});
