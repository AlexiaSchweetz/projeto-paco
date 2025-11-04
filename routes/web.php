<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;



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

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/password', function () {
    return view('welcome');
})->name('password');

Route::post('/login', [LoginController::class, 'login'])->name('login');



Route::get('/logout', function (Request $request) {
    Auth::logout();  
    $request->session()->invalidate();  
    $request->session()->regenerateToken();  
    return redirect('/');  
})->name('logout');