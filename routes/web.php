<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home.home')->name('home');
Route::livewire('/login', 'admin::login')->name('login');



Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::livewire('/', 'admin::dashboard.dashboard')->name('admin.dashboard');
        Route::livewire('/', 'admin::testimonial.testimonial-list')->name('admin.testimonial');
        Route::livewire('/blog-categories', 'admin::blog.blogcategory-list')->name('admin.blog-category');
        Route::livewire('/blogs', 'admin::blog.blog-list')->name('admin.blogs');
        Route::livewire('/blog/add', 'admin::blog.add-blog')->name('admin.blog.add');
        Route::livewire('/blog/update/{id}', 'admin::blog.update-blog')->name('admin.blog.update');
    });
});
