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

Route::get('/', 'PageController@index')->middleware('cek.status.login.user');
Route::get('/verifikasi', 'PageController@verifikasi')->middleware('cek.status.login.user');
Route::post('/verifikasi', 'PageController@verifikasi_cek');
Route::post('/verifikasi/inputdata', 'PageController@input_data_post')->middleware('cek.status.login.user');
Route::get('/verifikasi/email/{id}', 'PageController@verifikasi_email')->middleware('cek.status.login.user');
Route::post('/verifikasi/email', 'PageController@verifikasi_email_post')->middleware('cek.status.login.user');
Route::get('/verifikasi/password/{id}', 'PageController@verifikasi_password')->middleware('cek.status.login.user');
// Route::get('/verifikasi/inputdata/{id}', 'PageController@input_data')->middleware('cek.status.login.user');
Route::post('/registrasiuser', 'LoginController@registasi_user');
Route::post('/login', 'LoginController@login_user');

// Route::get('/sweetalert', 'SweetalertController@index');
// Route::post('/sweetalert/setuju', 'SweetalertController@setuju');
// Route::get('/sweetalert/hapus/{id}', 'SweetalertController@hapus');

Route::get('/suara', 'PageController@suara');

Route::post('/voting', 'PageController@voting');
Route::get('/logoutuser', 'LoginController@logout_user');

Route::get('/admin/login', 'LoginController@index')->name('/admin/login')->middleware(['guest']);
Route::get('/admin/logoutadmin', 'LoginController@logout_admin');
Route::post('/admin/proseslogin', 'LoginController@proseslogin');

Route::group(['middleware' => ['cek.login.user']], function () {
    Route::get('/home', 'PageController@home');
    Route::get('/voting', 'PageController@voting');
    Route::post('/voting', 'PageController@voting_kandidat');
});

Route::group(['middleware' => ['auth', 'check.role:admin']], function () {
    Route::get('/admin/dashboard', 'DashboardController@index');
    Route::get('/admin/dashboard/kelas', 'DashboardController@kelas');
    Route::get('/admin/dashboard/kandidat', 'DashboardController@kandidat');
    Route::get('/admin/dashboard/user', 'DashboardController@user');
    Route::get('/admin/dashboard/suara', 'DashboardController@suara');
    Route::get('/admin/dashboard/totalsuara', 'DashboardController@totalsuara');
    Route::get('/admin/dashboard/chart', 'DashboardController@chart');

    Route::get('/admin/database', 'DatabaseController@index');
    Route::post('/admin/database', 'DatabaseController@store');
    Route::post('/admin/database/{id}/update', 'DatabaseController@update');
    Route::get('/admin/database/{id}/destroy', 'DatabaseController@destroy');
    Route::get('/admin/database/truncate', 'DatabaseController@truncate');
    Route::post('/admin/database/import', 'DatabaseController@import');
    Route::get('/admin/database/export', 'DatabaseController@export');

    Route::get('/admin/kandidat', 'KandidatController@index');
    Route::get('/admin/kandidat/create', 'KandidatController@create');
    Route::post('/admin/kandidat', 'KandidatController@save');
    Route::get('/admin/kandidat/{kandidat}/edit', 'KandidatController@edit');
    Route::post('/admin/kandidat/update/{kandidat}', 'KandidatController@update');
    Route::get('/admin/kandidat/{kandidat}/destroy', 'KandidatController@destroy');

    Route::get('/admin/poster', 'PosterController@index');
    Route::get('/admin/poster/create', 'PosterController@create');
    Route::post('/admin/poster', 'PosterController@save');
    Route::get('/admin/poster/{poster}/edit', 'PosterController@edit');
    Route::post('/admin/poster/update/{poster}', 'PosterController@update');
    Route::get('/admin/poster/{poster}/destroy', 'PosterController@destroy');
    Route::get('/admin/poster/truncate', 'PosterController@truncate');

    Route::get('/admin/visimisi', 'VisiMisiController@index');
    Route::get('/admin/visimisi/create', 'VisiMisiController@create');
    Route::post('/admin/visimisi', 'VisiMisiController@store');
    Route::get('/admin/visimisi/{visiMisi}/edit', 'VisiMisiController@edit');
    Route::post('/admin/visimisi/update/{id}', 'VisiMisiController@update');
    Route::get('/admin/visimisi/{visiMisi}/destroy', 'VisiMisiController@destroy');
    Route::get('/admin/visimisi/truncate', 'VisiMisiController@truncate');

    Route::get('/admin/suara', 'SuaraController@index');
    Route::get('/admin/suara/export', 'SuaraController@export');
    Route::get('/admin/suara/truncate', 'SuaraController@truncate');

    Route::get('/admin/user', 'UserController@index');
    Route::get('/admin/user/{id}/destroy', 'UserController@destroy');
    Route::get('/admin/user/export', 'UserController@export');
    Route::get('/admin/user/truncate', 'UserController@truncate');

    Route::get('/admin/profile', 'ProfileController@index');
    Route::post('/admin/profile/update/{id}', 'ProfileController@update');
    Route::post('/admin/profile/updatepassword/{id}', 'ProfileController@updatepassword');

    Route::get('/admin/waktu', 'WaktuController@index');
    Route::post('/admin/waktu/update/{id}', 'WaktuController@update');
});
