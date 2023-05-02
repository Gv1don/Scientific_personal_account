<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;

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

Route::get('/profile', function(){
    if(Auth::check()){
        return view('profile');
    }
    else{
        return redirect()->route('login');
    }
})->name('profile');

Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('login');
})->name('logout');