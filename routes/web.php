<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Category;

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
Route::get('/new', function (){
    return view('backend.admin.product.edit');
});
Route::get('/admin', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

// Product Route
Route::get('/admin/product-list', [ProductController::class, 'index'])->name('admin.product.list');
Route::get('/admin/product-create', [ProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/product-store', [ProductController::class, 'store'])->name('admin.product.store');

Route::get('/admin/product-delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');



//Category Route
Route::get('/admin/category-list', [CategoryController::class, 'list'])->name('admin.category.list');
Route::get('/admin/category-create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category-store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category-delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

//Brand Route
Route::get('/admin/brand-list', [BrandController::class, 'list'])->name('admin.brand.list');
Route::get('/admin/brand-create',[BrandController::class, 'create'])->name('admin.brand.create');
Route::post('/admin/brand-store', [BrandController::class, 'store'])->name('admin.brand.store');
Route::get('/admin/brand-edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
Route::put('/admin/brand-update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');

Route::get('admin/brand-delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');
Route::get('/admin/brand/show/{id}', [BrandController::class, 'view'])->name('admin.brand.view');
