<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Frontend\CustomerController as FrontendCustomer;
use App\Http\Controllers\Frontend\VendorController as FrontendVendor;
use App\Http\Controllers\Frontend\ProductController as FrontendProduct;

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

Route::get('/home', function (){
    return "This site is under construction...";
});

Route::get('/modal-product', function (){
    return view('frontend.pages.product');
});
// Route::get('/all-product', function(){
//     return view('frontend.pages.all-product');
// });
Route::get('/all-product', [FrontendProduct::class, 'index'])->name('frontend.all-product');
Route::get('/all', function(){
    return view('frontend.pages.all-product');
});




Route::get('/admin', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
// Product Route
Route::get('/admin/product-list', [ProductController::class, 'index'])->name('admin.product.list');
Route::get('/admin/product-create', [ProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/product-store', [ProductController::class, 'store'])->name('admin.product.store');
Route::get('/admin/product-edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::put('/admin/product-update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
Route::get('/admin/product-delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
Route::get('/admin/product-show/{id}', [ProductController::class, 'show'])->name('admin.product.show');

//Category Route
Route::get('/admin/category-list', [CategoryController::class, 'list'])->name('admin.category.list');
Route::get('/admin/category-create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category-store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('admin/category-edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('/admin/category-update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category-delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
Route::get('/admin/category-show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');

//Brand Route
Route::get('/admin/brand-list', [BrandController::class, 'list'])->name('admin.brand.list');
Route::get('/admin/brand-create',[BrandController::class, 'create'])->name('admin.brand.create');
Route::post('/admin/brand-store', [BrandController::class, 'store'])->name('admin.brand.store');
Route::get('/admin/brand-edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
Route::put('/admin/brand-update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
Route::get('admin/brand-delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');
Route::get('/admin/brand/show/{id}', [BrandController::class, 'view'])->name('admin.brand.view');

//Setting Route
Route::get('/admin/setting-deatils', [SettingController::class, 'index'])->name('admin.setting.details');
Route::get('/admin/setting-create', [SettingController::class, 'create'])->name('admin.setting.create');
Route::post('/admin/setting-store', [SettingController::class, 'store'])->name('admin.setting.store');
Route::get('/admin/setting-edit/{id}', [SettingController::class, 'edit'])->name('admin.setting.edit');
Route::put('/admin/setting-update/{id}', [SettingController::class, 'update'])->name('admin.setting.update');

//Customer Route
Route::get('/admin/customer-list', [CustomerController::class, 'index'])->name('admin.customer.list');
Route::get('/admin/customer-create', [CustomerController::class, 'create'])->name('admin.customer.create');
Route::post('/admin/customer-store', [CustomerController::class, 'store'])->name('admin.customer.store');
Route::get('/admin/customer-edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
Route::put('/admin/customer-update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
Route::get('/admin/customer-delete/{id}', [CustomerController::class, 'delete'])->name('admin.customer.delete');

//vendor Route
Route::get('/admin/vendor-list', [VendorController::class, 'index'])->name('admin.vendor.list');
Route::get('/admin/vendor-create', [VendorController::class, 'create'])->name('admin.vendor.create');
Route::post('/admin/vendor-store', [VendorController::class, 'store'])->name('admin.vendor.store');
Route::get('/admin/vendor-edit/{id}', [VendorController::class, 'edit'])->name('admin.vendor.edit');
Route::get('/admin/vendor-delete/{id}', [VendorController::class, 'delete'])->name('admin.vendor.delete');
Route::put('/admin/vendor-update/{id}', [VendorController::class, 'update'])->name('admin.vendor.update');
Route::get('/admin/vendor-view/{id}', [VendorController::class, 'show'])->name('admin.vendor.show');




//Order Route
// Route::get('/do-login',[FrontendCustomer::class,'doLogin'])->name('login.do');
//Blog Route

//Blog Category Route

//Frontend
Route::get('/', function (){
    return view('frontend.pages.dashboard');
});


//Customer Route
Route::post('/customer-registration',[FrontendCustomer::class,'store'])->name('customer.registration');
Route::post('/customer-login',[FrontendCustomer::class,'login'])->name('customer.login');
Route::get('/customer-logout',[FrontendCustomer::class,'logout'])->name('logout');

//Vendor Route
Route::post('/vendor-registration', [FrontendVendor::class, 'store'])->name('vendor.registration');
Route::post('/vendor-login',[FrontendVendor::class,'login'])->name('vendor.login');
Route::get('/vendor-logout',[FrontendVendor::class,'logout'])->name('vendor.logout');


