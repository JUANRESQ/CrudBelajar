<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Post1Controller;

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



route::post('/actionlogin',[LoginController::class, 'authenticate']);


Route::group(['middleware' => 'backhistory'], function(){
    Route::resource('post', PostController::class)->middleware('auth');
    // route::get('pertama',[PostController::class, 'index'])->middleware('auth');
    // route::get('/create',[PostController::class, 'create'])->middleware('auth');
    // route::get('/edit',[PostController::class, 'edit'])->middleware('auth');
    Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');
    route::get('/logout',[LoginController::class, 'logout'])->name('logout')->middleware('auth');
});
// google
Route::get('/auth/redirect', [LoginController::class, 'redirectToProvider']);
Route::get('/auth/callback', [LoginController::class, 'handleProviderCallback']);