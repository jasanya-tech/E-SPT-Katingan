<?php

use App\Helpers\SPT;
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
    $data = [
        'title' => 'Landing Page'
    ];
    return view('welcome', $data);
});

Route::get('/admin', [Dashboard::class, 'index']);

Route::resource('/guest/pendaftaran', GuestPendaftaran::class);
Route::resource('/guest/registrasi', GuestRegistrasi::class);
Route::resource('/guest/pengambilan', GuestPengambilan::class);

Route::get('/guest/check-registrasi', [GuestRegistrasi::class, 'check']);
Route::get('/guest/form-check-registrasi', [GuestRegistrasi::class, 'formCheck']);

Route::get('/test', function () {
    return SPT::generateNoRegis();
});
