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

Route::get('login','AuthController@getLogin')->name('login');
Route::post('login','AuthController@postLogin')->name('auth.postLogin');

Route::group(['prefix' => 'data-lembaga'], function (){

    Route::get('profil', 'ProfilLembagaController@index')->name('profil.index');
    Route::get('profil/edit', 'ProfilLembagaController@edit')->name('profil.edit');
//    Route::post('profil', 'ProfilLembagaController@update')->name('profil.update'); //tidak digunakan

    Route::get('pelayanan', 'PelayananLembagaController@index')->name('pelayanan.index');

});


Route::get('/lihat', function () {

   $halo = ["nama" => "Mahrus Khomaini"];
    return response()->json($halo, 203);
});
