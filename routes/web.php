<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
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

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/order', [OrderController::class, 'index'])->name('order');

Route::post('/order',[OrderController::class, 'store'])->name('orderpizza');
Route::get('/myorders',[MyOrderController::class, 'index'])->name('myorders');

Route::get('/myorders/{id}', [MyOrderController::class,'show'])->name('myordersid');
//all
Route::get('/admin/pizze', [PizzaController::class, 'index'])->name('pizze');

Route::get('/admin/pizze/{id}', [PizzaController::class,'edit'])->name('editpizza');
Route::put('/admin/pizze/{id}', [PizzaController::class,'update'])->name('update');

Route::delete('/admin/pizze/delete/{id}',[PizzaController::class,'destroy'])->name('delete');


Route::get('/admin/createpizza',[PizzaController::class,'create'])->name('createpizza');
Route::post('/admin/addpizza',[PizzaController::class,'store'])->name('addpizza');

Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('ordersnotrealised');
Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show'])->name('orderdetail');
Route::put('/admin/orders/{id}', [AdminOrderController::class,'update'])->name('zrealizuj');


Route::get('/admin/ordersrealised', [AdminOrderController::class, 'ordersrealised'])->name('zrealizowane');



