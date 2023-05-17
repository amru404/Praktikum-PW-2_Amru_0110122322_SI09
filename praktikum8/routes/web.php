<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HasilController;


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

Route::get('/helo/{nama}/{alamat}', function ($nama,$alamat) {
    return "<h2>hello : $nama, Dari : $alamat </h2>";
});
Route::get('/produk/{id}', function ($id) {
    return view('index',['id'=>$id]);
});


Route::get('/form', [FormController::class, 'index']);
Route::post('/coba', [HasilController::class, 'index']);
Route::post('/hasil', [FormController::class, 'Cetak']);
Route::get('/daftar', [FormController::class, 'daftar']);
Route::post('/store', [FormController::class, 'store'])->name('user/store');
