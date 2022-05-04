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

Route::prefix('guru')->name('guru.')->namespace('Guru')->group(function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('siswa','SiswaController@index')->name('siswa');

    Route::get('guru','GuruController@index')->name('guru');

    Route::get('kelas','KelasController@index')->name('kelas');

    Route::get('bimbingan-konseling/masuk','BKController@index')->name('bimbingan.masuk');
    Route::get('bimbingan-konseling/ditanggapi','BKTanggapanController@index')->name('bimbingan.ditanggapi');
});

Route::prefix('siswa')->name('siswa.')->namespace('Siswa')->group(function(){
    Route::get('/','DashboardController@index')->name('dashboard');

    Route::get('bimbingan-konseling/karir','BKKarirController@index')->name('bimbingan.karir');
    Route::get('bimbingan-konseling/konseling-kelompok','BKKonselingKelompokController@index')->name('bimbingan.konseling.kelompok');
    Route::get('bimbingan-konseling/kelompok','BKKelompokController@index')->name('bimbingan.kelompok');
    Route::get('bimbingan-konseling/pribadi','BKPribadiController@index')->name('bimbingan.pribadi');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
