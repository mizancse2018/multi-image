<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;

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

Route::get('/',[ImageController::class,'index'])->name('/');
Route::get('/dashboard',[ImageController::class,'manage'])->name('dashboard');
Route::post('/add-product',[ImageController::class,'store'])->name('add-product');
Route::post('/delete-image',[ImageController::class,'deleteImage'])->name('delete.image');
Route::get('/edit-image/{id}',[ImageController::class,'editImage'])->name('edit.image');
Route::post('/update-image',[ImageController::class,'updateImage'])->name('update.image');
