<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

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
  return view('home', [
    'title' => 'Home',
    'active' => 'home'
  ]);
});

Route::get('/about', function () {
  return view('about', [
    'title' => 'About',
    'active' => 'active',
    'nama' => 'RafiSR',
    'email' => 'abdur.rafi@mhs.itenas.ac.id',
  ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category:slug}', [CategoryController::class, 'postInCategory']);

Route::get('/authors/{author:username}', [UserController::class, 'postInAuthor']);

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['guest'])->group(function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login');
});

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
  Route::resource('/dashboard/posts', DashboardPostController::class);
  Route::get('/dashboard', function () {
    return view('dashboard.index');
  })->middleware('auth');
});

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');