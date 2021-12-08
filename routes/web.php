<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Crud_pegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
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

Route::get('index.html', [Crud_pegawaiController::class, 'index'])->name('index.html');
Route::get('home.index', [Crud_pegawaiController::class, 'index'])->name('home.index');

Route::get('', [Crud_pegawaiController::class, 'index'])->name('');
Route::resource('crudpegawai', Crud_pegawaiController::class);

Route::prefix('api')->name('api.')->group(function () {

    Route::get('crudpegawai', [Crud_pegawaiController::class, 'api'])->name('crudpegawai');
});

Auth::routes([
    'register' => false,
    'login' => false,
]);
