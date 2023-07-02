<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\UserController;


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

#belajar
Route::get('/', function () {
    return view('welcome');
});

Route::get('/helo/{nama}/{alamat}', function ($nama,$alamat) {
    return "<h2>hello : $nama, Dari : $alamat </h2>";
});
Route::get('/produk/{id}', function ($id) {
    return view('index',['id'=>$id]);
});





#admin
Route::get('/admin/produk', [UserController::class, 'admin'])->name('admin');
Route::get('/admin/produk/create', [UserController::class, 'create'])->name('produk.create');
Route::post('/admin/produk/store', [UserController::class, 'store'])->name('produk.store');
Route::get('/admin/produk/edit', [UserController::class, 'edit'])->name('produk.edit');
Route::post('/admin/produk/update', [UserController::class, 'update'])->name('produk.update');
Route::delete('/admin/produk/destroy', [UserController::class, 'destroy'])->name('produk.destroy');

#user
Route::get('/', [UserController::class, 'index']);
Route::get('/about', [UserController::class, 'about']);
#form praktik


Route::get('/form', [FormController::class, 'index']);
Route::post('/coba', [HasilController::class, 'index']);
Route::post('/hasil', [FormController::class, 'Cetak']);
Route::get('/daftar', [FormController::class, 'daftar']);
Route::post('/store', [FormController::class, 'store'])->name('user/store');