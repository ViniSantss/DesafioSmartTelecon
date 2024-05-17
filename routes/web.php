<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\LandPageController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandPageController::class,'index'])->name('inicio');
Route::get('/login', [loginController::class,'index'])->name('login')->middleware('guest');
Route::get('/register', [registerController::class,'index'])->name('register')->middleware('guest');

Route::post('/register', [registerController::class,'store'])->name('cadastro');
Route::post('/login', [loginController::class,'store'])->name('entrar');
Route::get('/logout', [loginController::class, 'destroy'])->name('logout.destroy');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function (){
        Route::get('/', [dashboardController::class,'index'])->name('home');
        Route::get('/create', [dashboardController::class,'create'])->name('create');
        Route::post('/create', [dashboardController::class,'store'])->name('createDone');
        Route::get('/admin', [dashboardController::class,'getadmin'])->name('getadmin');
    });
});