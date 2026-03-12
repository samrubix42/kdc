<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home.home')->name('home');
Route::livewire('/login', 'admin::login')->name('login');
Route::livewire('/blog', 'pages::blog.blog')->name('blog');
Route::livewire('/blog/{slug}', 'pages::blog.blog-detail')->name('blog.detail');
Route::livewire('/contact', 'pages::contact.contact')->name('contact'); 
Route::livewire('/service', 'pages::service.service')->name('service');
Route::livewire('/client', 'pages::client.client')->name('client');
Route::livewire('/project', 'pages::project.project')->name('project');
Route::livewire('/profile', 'pages::profile.profile')->name('profile');



Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::livewire('/', 'admin::dashboard.dashboard')->name('admin.dashboard');
        Route::livewire('/', 'admin::testimonial.testimonial-list')->name('admin.testimonial');
        Route::livewire('/blog-categories', 'admin::blog.blogcategory-list')->name('admin.blog-category');
        Route::livewire('/blogs', 'admin::blog.blog-list')->name('admin.blogs');
        Route::livewire('/contacts', 'admin::contact.contact-list')->name('admin.contact-list');
        Route::livewire('/blog/add', 'admin::blog.add-blog')->name('admin.blog.add');
        Route::livewire('/blog/update/{id}', 'admin::blog.update-blog')->name('admin.blog.update');
        Route::livewire('/contact', 'admin::contact.contact-list')->name('admin.contact-list');
    });
});
