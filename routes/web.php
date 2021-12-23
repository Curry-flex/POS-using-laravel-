<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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

//Resource route

Route::resource('/orders',OrderController::class);
Route::resource('/products',ProductController::class);
Route::resource('/suppliers',SupplierController::class);
Route::resource('/transactions',TransactionController::class);
Route::resource('/ordersdetails',OrderDetailsController::class);
Route::resource('/users',UserController::class);
Route::get('/barcode',[ProductController::class,'getbar'])->name('barcode.index');


