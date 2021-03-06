<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ServantController;
use App\Http\Controllers\MenuController;



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

Auth::routes(["register"=>false , "reset"=>false]);
Route::resource('categories', CategoryController::class);
Route::resource('tables', TableController::class);
Route::resource('servants', ServantController::class);
Route::resource('menus', MenuController::class);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
