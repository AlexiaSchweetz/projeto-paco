<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ConversaoMoedaController;

use App\Http\Controllers\LoginController;
use Laravel\Passport\Http\Controllers\AccessTokenController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:api')->group(function () {
    Route::get('/historico', [ConversaoMoedaController::class, 'index']);
    Route::post('/conversoes', [ConversaoMoedaController::class, 'store']);
});


Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::post('oauth/token', [AccessTokenController::class, 'issueToken']);
