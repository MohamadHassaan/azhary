<?php

use App\Http\Controllers\SuAdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/suadmin', [App\Http\Controllers\SuAdminController::class, 'index'])->name('suadmin');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/moderator', [App\Http\Controllers\ModeratorController::class, 'index'])->name('moderator');


Route::get('/logout', function () {
    auth()->logout();
    return view('welcome');
});

Route::get('/adduser',[App\Http\Controllers\SuAdmin\UsersController::class,'create']);
Route::Post('/adduser/store',[App\Http\Controllers\SuAdmin\UsersController::class,'store'])->name ('adduser.store');
Route::get('/users',[App\Http\Controllers\SuAdmin\UsersController::class,'index'])->name ('users.index');
Route::get('/users/edit/{id}',[App\Http\Controllers\SuAdmin\UsersController::class,'edit'])->name ('users.edit');
Route::Post('/users/update/{id}',[App\Http\Controllers\SuAdmin\UsersController::class,'update'])->name ('users.update');
Route::get('/users/delete/{id}',[App\Http\Controllers\SuAdmin\UsersController::class,'destroy'])->name ('users.destroy');