<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;

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

Route::Resource('category',CategoryController::class)->middleware('auth');
Route::Resource('food',FoodController::class)->middleware('auth');

Auth::routes(['register'=>false]);

Route::get('/', [FoodController::class,'listFood'])->name('home');
