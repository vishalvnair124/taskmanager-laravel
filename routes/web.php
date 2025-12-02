<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\TaskController;

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Register routes
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Login routes
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

// Logout route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
});


Route::get('/dashboard', function () {
    $user = Auth::user();

    $total = $user->tasks()->count();
    $completed = $user->tasks()->where('is_completed', true)->count();
    $pending = $user->tasks()->where('is_completed', false)->count();
    $overdue = $user->tasks()->whereDate('due_date', '<', today())->where('is_completed', false)->count();
    $today = $user->tasks()->whereDate('due_date', today())->count();

    return view('dashboard', compact('total', 'completed', 'pending', 'overdue', 'today'));
})->name('dashboard');
