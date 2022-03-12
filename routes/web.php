<?php

use App\Http\Controllers\AddAdminController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminCategoryController;
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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about']);

Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('/blog/post/{post:slug}', [PostController::class, 'showSinglePost']);
Route::get('/blog/category/{category_slug}', [PostController::class, 'postByCategory']);
Route::get('/blog/author/{author_username}', [PostController::class, 'postByAuthor']);

Route::post('/blog/search', [SearchController::class, 'redirect']); // redirect method will generate and redirect to /blog/search/{search_keyword}
Route::get('/blog/search/{keyword}', [SearchController::class, 'show']); // retrieve post by keyword

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/addadmin', [AddAdminController::class, 'index'])->middleware('admin');
Route::post('/dashboard/addadmin', [AddAdminController::class, 'add'])->middleware('admin');
Route::delete('/dashboard/addadmin', [AddAdminController::class, 'remove'])->middleware('admin');
