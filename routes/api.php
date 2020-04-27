<?php

use Illuminate\Http\Request;

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
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

// EVENT \\
Route::get('/event', 'event@tampil')->middleware('jwt.verify');
Route::put('/event/{id}', 'event@update')->middleware('jwt.verify');
Route::delete('/event/{id}', 'event@delete')->middleware('jwt.verify');
Route::post('/event', 'event@store')->middleware('jwt.verify');

// ADMIN \\
Route::get('/admin', 'admin@login');
Route::get('/tampiladmin', 'admin@tampiladmin')->middleware('jwt_ok');
Route::post('/admin', 'admin@register');
Route::put('/admin/{id}', 'admin@update');
Route::delete('/admin/{id}', 'admin@delete');

// TRANSAKSI \\
Route::get('/tampil_transaksi', 'transaksi@tampil_transaksi')->middleware('jwt.verify');
Route::put('/transaksi/{id}', 'transaksi@update')->middleware('jwt.verify');
Route::delete('/transaksi/{id}', 'transaksi@delete')->middleware('jwt.verify');
Route::post('/transaksi', 'transaksi@store')->middleware('jwt.verify');


// PEMINJAMAN \\
//Route::get('Peminjaman/{id}', 'Peminjaman@tampil_pinjam')->middleware('jwt.verify');
//Route::put('/Peminjaman/{id}', 'Peminjaman@update')->middleware('jwt.verify');
//Route::delete('/Peminjaman/{id}', 'Peminjaman@delete')->middleware('jwt.verify');
//Route::post('/Peminjaman', 'Peminjaman@store')->middleware('jwt.verify');
