<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home.home')->name('home');

Route::redirect('/login', '/admin/login')->name('login');

Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::livewire('/login', 'admin::login')->name('admin.login');
    });

    Route::middleware('auth')->group(function () {
        Route::livewire('/', 'admin::dashboard.dashboard')->name('admin.dashboard');
    });
});
