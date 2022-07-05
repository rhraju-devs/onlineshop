<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
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

// Product Route
Route::get('/admin/product-list', [ProductController::class, 'index'])->name('admin.product.list');
Route::get('/admin/product-create', [ProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/product-store', [ProductController::class, 'store'])->name('admin.product.store');

//Category Route
Route::get('/admin/category-list', [CategoryController::class, 'list'])->name('admin.category.list');
Route::get('/admin/category-create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category-store', [CategoryController::class, 'store'])->name('admin.category.store');


//Brand Route
Route::get('/admin/brand-list', [BrandController::class, 'list'])->name('admin.brand.list');
Route::get('/admin/brand-create',[BrandController::class, 'create'])->name('admin.brand.create');
Route::post('/admin/brand-store', [BrandController::class, 'store'])->name('admin.brand.store');
