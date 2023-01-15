<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();

Route::get('/', function () {
    return redirect('admin/');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get("admin/", 'AdminController@beranda')->middleware('auth');
Route::resource('admin/kamar', 'KamarController')->middleware('auth');
Route::get('admin/delete/{id}', 'KamarController@destroy')->middleware('auth');
Route::resource('admin/pesanan', 'PesananController')->middleware('auth');
Route::get('admin/pesanan/delete/{id}', 'PesananController@destroy')->middleware('auth');
Route::resource('admin/pembayaran', 'PembayaranController')->middleware('auth');
// Route::resource('admin/laporan', 'LaporanController');
Route::get('admin/fasilitas/delete/{id}', 'FasilitasController@destroy')->middleware('auth');
Route::get('admin/laporan', 'LaporanController@index')->middleware('auth');
Route::post('admin/laporan/show', 'LaporanController@show')->middleware('auth');
// Route::get('admin/pesanan/create/', 'PesananController@create');