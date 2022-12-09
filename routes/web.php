<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::controller(DefaultController::class)->group(function () {
    Route::get('/', 'index')->name('default.home');

    Route::get('/articles', 'articles')->name('default.articles')->middleware('auth.user:loggedIn');

    Route::get('/article/{article}', 'article')->where('id', '[0-9]+')->name('default.article')->middleware('auth.user:loggedIn');

    Route::get('/about-me', 'about')->name('default.about')->middleware('auth.user:loggedIn');

    Route::get('/contact', 'contact')->name('default.contact')->middleware('auth.user:loggedIn');
});

Route::prefix('user')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('user.login')->middleware('auth.user:notLoggedIn');

    Route::post('/login', [LoginController::class, 'loginAuth'])->name('user.login.auth')->middleware('auth.user:notLoggedIn');

    Route::get('/register', [RegisterController::class, 'register'])->name('user.register')->middleware('auth.user:notLoggedIn');

    Route::post('/register', [RegisterController::class, 'registerValidate'])->name('user.register.validate')->middleware('auth.user:notLoggedIn');

    Route::get('/auth-token/{token}', [AuthController::class, 'emailVerify'])->name('user.auth.token')->where('token', '[a-zA-Z0-9]+')->middleware('auth.user:notLoggedIn');
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout')->middleware('auth.user:loggedIn');
});

Route::middleware(['auth.user:loggedIn', 'auth.user.role:Administrator'])->prefix('admin')->group(function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});