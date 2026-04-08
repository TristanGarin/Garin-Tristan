<?php

use App\Http\Controllers\PortalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect()->route('login'); });


Route::get('/login', [PortalController::class, 'showLogin'])->name('login');
Route::post('/login', [PortalController::class, 'login'])->name('login.post');
Route::get('/register', [PortalController::class, 'showRegister'])->name('register');
Route::post('/register', [PortalController::class, 'register'])->name('register.post');


Route::middleware(['isStudent'])->group(function () {
    Route::get('/dashboard', [PortalController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [PortalController::class, 'settings'])->name('user.settings');
    Route::post('/settings', [PortalController::class, 'updateSettings'])->name('user.settings.update');
    Route::post('/logout', [PortalController::class, 'logout'])->name('logout');
});