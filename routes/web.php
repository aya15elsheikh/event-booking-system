<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('homelog');


Route::get('/login', [AuthManager::class,'login'])->name('login');
Route::Post('/login', [AuthManager::class,'loginPost'])->name('login.post');
Route::get('/register', [AuthManager::class,'register'])->name('register');
Route::Post('/register', [AuthManager::class,'registerPost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name("home");
});
Route::resource('events', EventController::class);


