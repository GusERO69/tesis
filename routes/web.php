<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pings', [PingController::class, 'index'])->name('ping.index');
Route::post('/pings/{ping}/ping', [PingController::class, 'ping'])->name('ping');
