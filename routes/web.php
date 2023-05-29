<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;

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
Route::get('/',[PublicController::class,'index'])->middleware();
Route::get('/dashboard',[AdminController::class,'index'])->middleware(['auth','Admin']);
Route::get('/home',[PublicController::class,'home'])->middleware('auth');


Route::get('/login',[AuthController::class, 'indexLogin'])->name('login');
Route::post('/login',[AuthController::class, 'authenticating']);
Route::get('/register',[AuthController::class, 'indexRegister']);


Route::get('/notactive',function() {
    return view('layouts.i');
});