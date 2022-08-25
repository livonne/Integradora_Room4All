<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentacuartosController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\Admin\CategoriesController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/posts/{category}', [HomeUserController::class, 'postByCategory'])->name('posts.category');

Route::get('/post', [HomeUserController::class, 'index'])->name('post');


//titulo (no necesariamente debe ser el titulo pero asi de mientras para que jale :,c)
Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('Administrador.categories.index');
Route::post('/admin/categories/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('Administrador.categories.store');
Route::post('/admin/categories/{categoryId}/update', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('Administrador.categories.update');
Route::delete('/admin/categories/{categoryId}/delete', [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('Administrador.categories.delete');


//posts
Route::get('/admin/posts', [App\Http\Controllers\Admin\PostsController::class, 'index'])->name('Administrador.posts.index');
Route::post('/admin/posts/store', [App\Http\Controllers\Admin\PostsController::class, 'store'])->name('Administrador.posts.store');
Route::post('/admin/posts/{postId}/update', [App\Http\Controllers\Admin\PostsController::class, 'update'])->name('Administrador.posts.update');
Route::delete('/admin/posts/{postId}/delete', [App\Http\Controllers\Admin\PostsController::class, 'delete'])->name('Administrador.posts.delete');










Auth::routes();

//para renta de cuartosss

//Route::get('/post', [App\Http\Controllers\RentacuartosController::class, 'index']);





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [UserController::class, 'index'])->name('user');

Route::get('/superAdmin', [SuperController::class, 'index'])->name('super');


