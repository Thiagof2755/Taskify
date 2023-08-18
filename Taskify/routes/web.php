<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController as ControllersLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::controller(ControllersLoginController::class)->group(function(){
    Route::get('/login','index')->name('login.index');
    Route::post('/login','store')->name('login.store');
    Route::get('/logout','destroy')->name('login.destroy');
    
    
});