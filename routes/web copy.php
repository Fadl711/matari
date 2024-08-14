<?php

  use Illuminate\Support\Facades\Route;

  use App\Http\Controllers\PostCoctroller;
  use App\Http\Controllers\SectionController;
 

  Route::post('/posts1',[PostCoctroller::class,'store'])->name('posts.store');


  Route::get('/welcome',[SectionController::class,'welcome'])->name('posts.welcome');
 Route::get('/Control/create',[SectionController::class,'create'])->name('Control.create');
 Route::post('/Control',[SectionController::class,'store'])->name('Control.store');
 Route::get('/includes',[SectionController::class,'nav'])->name('includes.nav');
 Route::get('/posts',[SectionController::class,'book'])->name('posts.book');
 Route::get('/posts/{post}/show_all',[SectionController::class,'show_all'])->name('posts.show_all');
 Route::get('/posts/{post}/show',[SectionController::class,'show'])->name('posts.show');