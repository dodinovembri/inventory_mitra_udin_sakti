<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::post('/update_data/{id}', [App\Http\Controllers\HomeController::class, 'update_data'])->name('update_data');
Route::post('/update_purchasing/{id}', [App\Http\Controllers\HomeController::class, 'update_purchasing'])->name('update_purchasing');
Route::post('/update_sales/{id}', [App\Http\Controllers\HomeController::class, 'update_sales'])->name('update_sales');
Route::get('/destroy/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('index');
Route::post('/profile/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');

