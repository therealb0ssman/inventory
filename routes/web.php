<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route:: resource('/inventory' , 'Admin\InventoryController' , ['except' => ['destroy']]);
});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route:: resource('/borrow' , 'Admin\BorrowController' , ['except' => ['destroy']]);
});
Route::get('/search', 'Admin\InventoryController@search')->name('search');
