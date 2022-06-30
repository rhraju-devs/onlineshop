<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('/', function (){
    return "This site is under construction...";
});
Route::get('/admin', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/product-list', [ProductController::class, 'index'])->name('admin.product.list');