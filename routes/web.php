<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home.home')->name('home');
Route::livewire('/login', 'admin::login')->name('login');
Route::livewire('/blog', 'pages::blog.blog')->name('blog');
Route::livewire('/blog/{slug}', 'pages::blog.blog-view')->name('blog.detail');
Route::livewire('/contact', 'pages::contact.contact')->name('contact'); 
Route::livewire('/service', 'pages::service.service')->name('service');
Route::livewire('/client', 'pages::client.client')->name('client');
Route::livewire('/project', 'pages::project.project')->name('project');
Route::livewire('/project/{slug}', 'pages::project.project-view')->name('project.detail');
Route::livewire('/profile', 'pages::profile.profile')->name('profile');



Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::livewire('/', 'admin::dashboard.dashboard')->name('admin.dashboard');
        Route::livewire('/', 'admin::testimonial.testimonial-list')->name('admin.testimonial');
        Route::livewire('/blog-categories', 'admin::blog.blogcategory-list')->name('admin.blog-category');
        Route::livewire('/blogs', 'admin::blog.blog-list')->name('admin.blogs');
        Route::livewire('/project-categories', 'admin.project.project-category-list')->name('admin.project-category');
        Route::livewire('/portfolio', 'admin.project.project-list')->name('admin.portfolio.list');
        Route::livewire('/projects', 'admin.project.project-list')->name('admin.projects');
        Route::livewire('/project/add', 'admin::project.add-project')->name('admin.project.add');
        Route::livewire('/project/update/{id}', 'admin::project.update-project')->name('admin.project.update');
        Route::livewire('/contacts', 'admin::contact.contact-list')->name('admin.contact-list');
        Route::livewire('/blog/add', 'admin::blog.add-blog')->name('admin.blog.add');
        Route::livewire('/blog/update/{id}', 'admin::blog.update-blog')->name('admin.blog.update');
        Route::livewire('/contact', 'admin::contact.contact-list')->name('admin.contact-list');
    });
});
