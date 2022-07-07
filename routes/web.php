<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/post/category/{category}',[HomeController::class,'postCategory']);
Route::get('/post/user/{user}',[HomeController::class,'postUser']);
Route::get('/post/{user}/{slug}',[HomeController::class,'showPost']);
Route::post('/post/search',[HomeController::class,'searchPost'])->name('searchPost');
Route::post('/send/message',[HomeController::class,'sendMessage'])->name('sendMessage');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'authenticate']);

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::get('/post/create',[PostController::class,'create'])->name('postCreate')->middleware('isBanned');
Route::post('/post/store',[PostController::class,'store'])->name('postStore')->middleware('isBanned');
Route::post('/post/edit',[PostController::class,'edit'])->name('postEdit')->middleware('isBanned');
Route::post('/post/update',[PostController::class,'update'])->name('postUpdate')->middleware('isBanned');
Route::post('/post/delete',[PostController::class,'destroy'])->name('postDelete');
Route::post('/post/publish',[PostController::class,'publish'])->name('postPublish')->middleware('isBanned');
Route::post('/post/arsip',[PostController::class,'arsip'])->name('postArsip');
Route::get('/post/preview/{user}/{slug}',[PostController::class,'previewPost']);

Route::get('/categories',[CategoryController::class,'index'])->name('categories')->middleware('isAdmin');
Route::post('/category/store',[CategoryController::class,'store'])->name('categoryStore')->middleware('isAdmin');
Route::post('/category/edit',[CategoryController::class,'edit'])->name('categoryEdit')->middleware('isAdmin');
Route::post('/category/update',[CategoryController::class,'update'])->name('categoryUpdate')->middleware('isAdmin');
Route::post('/category/delete',[CategoryController::class,'destroy'])->name('categoryDelete')->middleware('isAdmin');

Route::get('/users',[UserController::class,'index'])->name('users')->middleware('isAdmin');
Route::get('/user/profile/{name}',[UserController::class,'edit']);
Route::post('/user/update',[UserController::class,'update'])->name('userUpdate');
Route::post('/user/delete',[UserController::class,'destroy'])->name('userDelete')->middleware('isAdmin');
Route::post('/user/activated',[UserController::class,'activated'])->name('userActivated')->middleware('isAdmin');
Route::post('/user/banned',[UserController::class,'banned'])->name('userBanned')->middleware('isAdmin');

Route::post('/logout',function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('login');
})->name('logout')->middleware('auth');