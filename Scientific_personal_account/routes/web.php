<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', function(){
    return view('registration');
})->name('registration');

Route::post('registration', [RegistrationController::class, 'registration']);

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::get('/profile', [ProfileController::class, 'profileRendering'])->middleware('auth')->name('profile');

Route::get('/article', function(){
    return view('article_registration');
})->name('article')->middleware('auth');

Route::post('/article/create', [ArticleController::class, 'createArticle'])->middleware('auth')->name('article-create');

Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('login');
})->name('logout');