<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController as ControllersLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateUserController;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::controller(ControllersLoginController::class)->group(function(){
    Route::get('/login','index')->name('login.index');
    Route::post('/login','store')->name('login.store');
    Route::get('/logout','destroy')->name('login.destroy');
    
});

Route::controller(CreateUserController::class)->group(function(){
    Route::get('/New-User', [CreateUserController::class, 'index'])->name('index'); // Rota para exibir o formulário
    Route::post('/New-User', [CreateUserController::class, 'create'])->name('create'); // Rota para processar a criação do usuário
    
});