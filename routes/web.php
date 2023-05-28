<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('text');
})->middleware('auth');

Route::get('/login',[AuthController::class, 'indexLogin'])->name('login');
Route::post('/login',[AuthController::class, 'authenticating']);
Route::get('/register',[AuthController::class, 'indexRegister']);


Route::get('/notactive',function() {
    return view('text');
});