<?php

use App\Http\Controllers\CommentCoctroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostCoctroller;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SectionController;
use App\Models\Post;
use Illuminate\Routing\Controllers\Middleware;


Route::post('/posts1',[PostCoctroller::class,'store'])->name('posts.store');
Route::post('/posts/{post}/store/',[CommentCoctroller::class,'storeshow'])->name('store.show');
Route::post('/posts/{post}',[CommentCoctroller::class,'comment'])->name('store.comment');

Route::get('/',[SectionController::class,'welcome'])->name('posts.welcome');
Route::get('/posts/{post}/show_all',[SectionController::class,'show_all'])->name('posts.show_all');
Route::get('/posts/{post}/show',[SectionController::class,'show'])->name('posts.show');
Route::post('store',[PostCoctroller::class,'storeUser'])->name('store.user');
Route::get('/search',[SearchController::class,'search'])->name('search');

Route::middleware(['auth','admin'])->group(function () {

    Route::delete('/posts/{post}',[PostCoctroller::class,'destroy'])->name('posts.destroy');
    Route::get('/posts/{post}/edit',[PostCoctroller::class,'edit'])->name("posts.edit");
    Route::put('/posts/{post}',[PostCoctroller::class,'update'])->name('posts.update');
    Route::get('/Control/create',[SectionController::class,'create'])->name('Control.create');
    Route::post('/Control',[SectionController::class,'store'])->name('Control.store');
});
Route::post('users/{id}',[UserController::class,'update'])->name('user.edit');

Route::middleware(['auth'])->group(function () {
    Route::get('/posts6',function(){
        return view('posts.show_users');
    })->name('posts.store');
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->middleware(['auth', 'verified'])->name('dashboard');

  Route::middleware('auth')->group(function () {
      Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
      Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
      Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });
});


require __DIR__.'/auth.php';

