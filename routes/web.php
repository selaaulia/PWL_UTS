<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangCOntroller;
use Illuminate\Http\Request;

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
Route::resource('barang', BarangCOntroller::class);
Route::get('barang/cari/',[BarangCOntroller::class, 'search']);

Route::get('/', function () {
    return view('welcome');
});
