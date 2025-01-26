<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/user/home');
})->name('index');

Route::get('/dashboard', function () {
    return view('pages/admin/dashboard');
})->name('admin-dashboard');