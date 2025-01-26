<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'showGreeting'])->name('index');

Route::get('/dashboard', function () {
    return view('pages/admin/dashboard');
})->name('admin-dashboard');