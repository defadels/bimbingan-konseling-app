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
    Route::get('siswa/create','SiswaController@create')->name('siswa.create');
    Route::post('siswa','SiswaController@store')->name('siswa.store');
    Route::get('siswa/{siswa}','SiswaController@edit')->name('siswa.edit');
    Route::put('siswa/{siswa}','SiswaController@update')->name('siswa.update');
    Route::delete('siswa/{siswa}','SiswaController@destroy')->name('siswa.destroy');

    Route::get('guru','GuruController@index')->name('guru');
    Route::get('guru/create','GuruController@create')->name('guru.create');
    Route::post('guru','GuruController@store')->name('guru.store');
    Route::get('guru/{guru}','GuruController@edit')->name('guru.edit');
    Route::put('guru/{guru}','GuruController@update')->name('guru.update');
    Route::delete('guru/{guru}','GuruController@destroy')->name('guru.destroy');

    Route::get('kelas','KelasController@index')->name('kelas');
    Route::get('kelas/create','KelasController@create')->name('kelas.create');
    Route::post('kelas','KelasController@store')->name('kelas.store');
    Route::get('kelas/{kelas}','KelasController@edit')->name('kelas.edit');
    Route::put('kelas/{kelas}','KelasController@update')->name('kelas.update');
    Route::delete('kelas/{kelas}','KelasController@destroy')->name('kelas.destroy');

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
