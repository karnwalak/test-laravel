<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

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

Route::GET('/', [UserController::class,'login'])->name('/');
Route::GET('/register', [UserController::class,'register'])->name('/register');
Route::POST('/store', [UserController::class,'store'])->name('/store');
Route::POST('/signin', [UserController::class,'auth'])->name('/signin');

Route::middleware('auth')->group(function () {
    Route::resource('student', StudentController::class);
    Route::GET('/logout', [UserController::class,'logout'])->name('/logout');
});

