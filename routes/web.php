<?php

use App\Http\Controllers\CommentCoctroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostCoctroller;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SectionController;

//اضافة لايك للمشنور
Route::post('/likes/{like}/store',[CommentCoctroller::class,'likes'])->name('store.like')->middleware('auth');
//اضافة تعليق
Route::post('/comments/{comment}',[CommentCoctroller::class,'comment'])->name('store.comment')->middleware('auth.redirect');

Route::get('/',[SectionController::class,'welcome'])->name('posts.welcome');
//اظهار جميع المنشورات
Route::get('/posts/{post}/show_all',[SectionController::class,'show_all'])->name('posts.show_all');
//اظهار المنشور فقط
Route::get('/posts/{post}/show',[SectionController::class,'show'])->name('posts.show');
//هذه  مش مهم حالياً
Route::post('users',[PostCoctroller::class,'storeUser'])->name('store.user');

Route::get('/search',[SearchController::class,'search'])->name('search');


//هولاء جميع الرواتات الذي تتحكم با المنشورات حذف , تعديل واضافة
Route::middleware(['auth','admin','admin2'])->group(function () {
    Route::post('/posts',[PostCoctroller::class,'store'])->name('posts.store');
    Route::delete('/posts/{post}',[PostCoctroller::class,'destroy'])->name('posts.destroy');
    Route::get('/posts/{post}/edit',[PostCoctroller::class,'edit'])->name("posts.edit");
    Route::put('/posts/{post}',[PostCoctroller::class,'update'])->name('posts.update');



    //اضافة الاقسام
    Route::get('/Control/create',[SectionController::class,'create'])->name('Control.create');
    Route::post('/Control',[SectionController::class,'store'])->name('Control.store');

});

Route::middleware(['auth','admin'])->group(function () {
    //اظهار المستخدين
    Route::get('/showUsers',function(){
        return view('posts.show_users');
    })->name('show.users');
<<<<<<< HEAD
=======
    //تعديل الصلاحيات
>>>>>>> 1b1f1e2748dcae6c885c9110c7c40b7b097f63f1
    Route::post('users/{id}',[UserController::class,'update'])->name('user.edit');

});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
  Route::middleware('auth')->group(function () {
      Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
      Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
      Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


require __DIR__.'/auth.php';

