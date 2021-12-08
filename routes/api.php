<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', function (Request $request) {
    // $username = $request->username
    dd($request->all());
     if ($request->username == 'admin' || $request->password  == '123') {
        return response()->josn(['ket' => 'login berhasil']);

    } else {
        return response()->json(['ket' => 'login gagal '], 403);
    }
});
