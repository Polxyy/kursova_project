<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Пренасочване на началната страница към страницата за вход, ако потребителят не е аутентикиран
Route::get('/', function () {
    return redirect()->route('login');
});

// Маршрути за автентикация
Auth::routes();

// Група маршрути, които изискват автентикация
Route::middleware(['auth'])->group(function () {
    // Начална страница след логин (сега ще води към списъка с игри)
    Route::get('/home', [GameController::class, 'index'])->name('home');

    // Ресурсни маршрути за игри (всички CRUD операции изискват автентикация)
    Route::resource('games', GameController::class);
});