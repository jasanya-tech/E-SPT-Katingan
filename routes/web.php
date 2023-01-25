<?php

use App\Http\Controllers\admin\Dashboard;
use App\Http\Controllers\guest\PendaftaranController as GuestPendaftaran;
use App\Http\Controllers\guest\RegistrasiController as GuestRegistrasi;
use App\Http\Controllers\guest\PengambilanController as GuestPengambilan;
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

Route::get('/admin', [Dashboard::class, 'index']);

Route::resource('/guest/pendaftaran', GuestPendaftaran::class);
Route::resource('/guest/registrasi', GuestRegistrasi::class);
Route::resource('/guest/pengambilan', GuestPengambilan::class);

Route::get('/test', function () {
    $data = [
        'title' => 'pengambilan berhasil'
    ];
    return view('guest.registrasi.success', $data);
});
