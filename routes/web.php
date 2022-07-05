<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);


Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'authenticate']);

Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::post('/post/store',[PostController::class,'store'])->name('postStore');
Route::post('/post/edit',[PostController::class,'edit'])->name('postEdit');
Route::post('/post/update',[PostController::class,'update'])->name('postUpdate');
Route::post('/post/delete',[PostController::class,'destroy'])->name('postDelete');

Route::get('/categories',[CategoryController::class,'index'])->name('categories');
Route::post('/category/store',[CategoryController::class,'store'])->name('categoryStore');
Route::post('/category/edit',[CategoryController::class,'edit'])->name('categoryEdit');
Route::post('/category/update',[CategoryController::class,'update'])->name('categoryUpdate');
Route::post('/category/delete',[CategoryController::class,'destroy'])->name('categoryDestroy');

Route::get('/users',[UserController::class,'index'])->name('users');
Route::post('/user/edit',[UserController::class,'edit'])->name('userEdit');
Route::post('/user/update',[UserController::class,'update'])->name('userUpdate');
Route::post('/user/delete',[UserController::class,'destroy'])->name('userDelete');