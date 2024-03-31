<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('home', HomeController::class);
    Route::resource('ping', PingController::class);
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('profile', [UserController::class, 'updateP'])->name('profile.update');
    Route::resource('usuarios', UserController::class);
    Route::post('/pings/{ping}/ping', [PingController::class, 'ping'])->name('ping');
});



Route::view('/login', "admin.login")->name('login');
Route::view('/register', "admin.register")->name('register');


Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/', function () {
    return view('template');
});
