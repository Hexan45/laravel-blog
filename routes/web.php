<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\CeoController;

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
    Route::get('/', 'index')
        ->name('default.home');

    Route::get('/articles', 'articles')
        ->name('default.articles');

    Route::get('/article/{article}', 'article')
        ->where('id', '[0-9]+')
        ->name('default.article');

    Route::get('/about-me', 'about')
        ->name('default.about');

    Route::get('/contact', 'contact')
        ->name('default.contact');
});

Route::prefix('ceo')->group(function () {
    Route::get('/login', [CeoController::class, 'login']);
});