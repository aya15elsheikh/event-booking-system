<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\EventController;
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

// Route::resource('events', EventController::class)->middleware([AdminMiddleware::class,'auth']);


Route::resource('events', EventController::class)->only(['index', 'show']);

Route::middleware([AdminMiddleware::class, 'auth'])->group(function () {
    Route::get('events/create', [EventController::class, 'create']);
    Route::post('events', [EventController::class, 'store']);
    Route::get('events/{event}/edit', [EventController::class, 'edit']);
    Route::put('events/{event}', [EventController::class, 'update']);
    Route::delete('events/{event}', [EventController::class, 'destroy']);
});
