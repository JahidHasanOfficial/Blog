<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\frontend\FrontendController;

// Route::get('/', function () {
//     return view('frontend.home.index');
// });
Route::get('/', [FrontendController::class,'index']);
Route::get('/post/details/{id}', [FrontendController::class,'postDetails'])->name('post.details');
Route::post('/post/commment/{id}', [FrontendController::class,'postComment'])->name('post.comment');


Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=> 'category'], function () {
    Route::get('/add', [CategoryController::class, 'addCategory']);
    Route::get('/manage', [CategoryController::class, 'manageCategory']);
    Route::post('/store', [CategoryController::class,'storeCategory'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class,'editCategory'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class,'updateCategory'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class,'deleteCategory'])->name('category.delete');

});

Route::group(['prefix'=> 'post'], function () {
    Route::get('/add', [PostController::class, 'addPost']);
    Route::get('/manage', [PostController::class, 'managePost']);
    Route::post('/store', [PostController::class,'storePost'])->name('post.store');
    Route::get('/edit/{id}', [PostController::class,'editPost']);
    Route::post('/update/{id}', [PostController::class,'updatePost'])->name('post.update');
    Route::get('/delete/{id}', [PostController::class,'deletePost'])->name('post.delete');

});
