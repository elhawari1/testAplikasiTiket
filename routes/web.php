<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TiketController;

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

Route::controller(AuthController::class)->group(function (){
    Route::get('/login', 'indexLogin')->name('login');
    Route::post('/login/post', 'postLogin');
    // Route::get('/logout', 'logout')->name('logout');
});


Route::get('/', function () {
    return view('v_formulir');
});
Route::controller(TiketController::class)->group(function (){
    // Route::get('/', 'tiket')->name('tiket');
    Route::get('/admin', 'index')->name('admin');
    Route::post('/admin/tiket/store', 'store');
    Route::get('/admin/tiket/update/{id}', 'update');
    Route::get('/admin/tiket/destroy/{id}', 'destroy');
});


