<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Middleware\AdminMiddleware;
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

Route::resource('events', EventController::class)->only(['create','store', 'update','edit', 'destroy'])->middleware([AdminMiddleware::class,'auth']);

Route::get('/users/admin', [UserController::class, 'adminPanel'])->middleware([AdminMiddleware::class, 'auth'])->name('admin');

Route::resource('events', EventController::class)->only(['index', 'show']);

Route::get('/events/{event}/book', [BookingController::class, 'book'])->middleware(['auth'])->name('book');

Route::get('/bookhistory', [BookingController::class, 'history'])->middleware(['auth'])->name('book.history');

Route::resource('users', UserController::class)->middleware(['auth']);
