<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Frontend\CustomerController as FrontendCustomer;
use App\Http\Controllers\Frontend\VendorController as FrontendVendor;
use App\Http\Controllers\Frontend\ProductController as FrontendProduct;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategory;
use App\Http\Controllers\Frontend\BrandController as FrontendBrand;
use App\Http\Controllers\Customer\CustomerController as Customer;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\DashboardController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/admin/login', [AdminDashboardController::class, 'login'])->name('admin.login');
Route::post('/admin/login-check', [AdminDashboardController::class, 'loginCheck'])->name('admin.login.check');

Route::group(['middleware'=>['auth', 'checkAdmin'],'prefix'=>'admin'],function(){
    Route::get('/logout', [AdminDashboardController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Product Route
    Route::get('/product-list', [ProductController::class, 'index'])->name('admin.product.list');
    Route::get('/product-create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product-store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/product-update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/product-delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    Route::get('/product-show/{id}', [ProductController::class, 'show'])->name('admin.product.show');
    //Category Route
    Route::get('/category-list', [CategoryController::class, 'list'])->name('admin.category.list');
    Route::get('/category-create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('category-edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category-update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category-delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    Route::get('/category-show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');

    //Brand Route
    Route::get('/brand-list', [BrandController::class, 'list'])->name('admin.brand.list');
    Route::get('/brand-create',[BrandController::class, 'create'])->name('admin.brand.create');
    Route::post('/brand-store', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::get('/brand-edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::put('/brand-update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
    Route::get('brand-delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');
    Route::get('/brand/show/{id}', [BrandController::class, 'view'])->name('admin.brand.view');

    //Setting Route
    Route::get('/setting-deatils', [SettingController::class, 'index'])->name('admin.setting.details');
    Route::get('/setting-create', [SettingController::class, 'create'])->name('admin.setting.create');
    Route::post('/setting-store', [SettingController::class, 'store'])->name('admin.setting.store');
    Route::get('/setting-edit/{id}', [SettingController::class, 'edit'])->name('admin.setting.edit');
    Route::put('/setting-update/{id}', [SettingController::class, 'update'])->name('admin.setting.update');

    //Customer Route
    Route::get('/customer-list', [CustomerController::class, 'index'])->name('admin.customer.list');
    Route::get('/customer-create', [CustomerController::class, 'create'])->name('admin.customer.create');
    Route::post('/customer-store', [CustomerController::class, 'store'])->name('admin.customer.store');
    Route::get('/customer-edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
    Route::put('/customer-update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
    Route::get('/customer-show/{id}', [CustomerController::class, 'show'])->name('admin.customer.view');
    Route::get('/customer-delete/{id}', [CustomerController::class, 'delete'])->name('admin.customer.delete');
    Route::get('/customer-sms/{id}', [CustomerController::class, 'sms'])->name('admin.customer.sms');

    //vendor Route
    Route::get('/vendor-list', [VendorController::class, 'index'])->name('admin.vendor.list');
    Route::get('/vendor-create', [VendorController::class, 'create'])->name('admin.vendor.create');
    Route::post('/vendor-store', [VendorController::class, 'store'])->name('admin.vendor.store');
    Route::get('/vendor-edit/{id}', [VendorController::class, 'edit'])->name('admin.vendor.edit');
    Route::get('/vendor-delete/{id}', [VendorController::class, 'delete'])->name('admin.vendor.delete');
    Route::put('/vendor-update/{id}', [VendorController::class, 'update'])->name('admin.vendor.update');
    Route::get('/vendor-view/{id}', [VendorController::class, 'show'])->name('admin.vendor.show');

    //Banner Route
    Route::get('/banner-list', [BannerController::class, 'index'])->name('admin.banner.list');
    Route::get('/banner-create', [BannerController::class, 'create'])->name('admin.banner.create');
    Route::post('/banner-store', [BannerController::class, 'store'])->name('admin.banner.store');
    Route::get('/banner-edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
    Route::put('/banner-update/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
    Route::get('/banner-delete/{id}', [BannerController::class, 'delete'])->name('admin.banner.delete');
    Route::get('/banner-show/{id}', [BannerController::class, 'show'])->name('admin.banner.show');

    //optimization
    Route::get('/optimization', [AdminDashboardController::class, 'optimization'])->name('admin.optimization');
});



//Order Route
// Route::get('/do-login',[FrontendCustomer::class,'doLogin'])->name('login.do');
//Blog Route

//Blog Category Route



//Frontend
Route::get('/', [DashboardController::class, 'dashboard'])->name('frontend.dashboard');
Route::get('/checkout', [DashboardController::class, 'checkout_1'])->name('frontend.checkout.1');
Route::get('/wishlist', [DashboardController::class, 'wishlist'])->name('frontend.wishlist');
Route::get('/product/wishlist/{id}', [DashboardController::class, 'addWishlist'])->name('product.wishlist');
Route::get('/contact-us', [DashboardController::class, 'contact_us'])->name('frontend.contact_us');
//send email with mailtrap.io
Route::post('/send-eamil', [DashboardController::class, 'sendEmail'])->name('send.email');
// Route::get('/send-sms', [DashboardController::class, 'toVonage'])->name('send.sms');
Route::get('/about-us', [DashboardController::class, 'about_us'])->name('frontend.about_us');
Route::view('/blog', 'frontend.pages.blog.index')->name('frontend.blog');

// Frontend Product Route
Route::get('/all-product-grid', [FrontendProduct::class, 'grid_product'])->name('frontend.grid.product');
Route::get('/all-product-list', [FrontendProduct::class, 'list_product'])->name('frontend.list.product');
Route::get('/product/single-product-details/{id}', [FrontendProduct::class, 'single_product'])->name('frontend.single.product');
Route::get('/product/search-product-grid/', [FrontendProduct::class, 'search_product'])->name('frontend.search.product');
Route::get('/product/search-product-list/', [FrontendProduct::class, 'search_product'])->name('frontend.search.product.list');

// Add to cart
Route::get('/product/cart/addcart/{id}', [CartController::class, 'addToCart'])->name('product.add.cart');
Route::get('/product/cart-list',[CartController::class, 'cartView'])->name('product.cart.view');
Route::get('/product/cart-delete/{id}', [CartController::class, 'deleteCartItem'])->name('delete.cart.item');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');
Route::get('/product/cart-update/{id}', [CartController::class, 'updateCart'])->name('product.cart.update');

//category Product
Route::get('/product/category-product-grid/{id}', [FrontendCategory::class, 'grid_category'])->name('frontend.category.grid');
Route::get('/product/category-product-list/{id}', [FrontendCategory::class, 'list_category'])->name('frontend.category.list');

//Brand Wise Product
Route::get('/product/brand-product-grid/{id}', [FrontendBrand::class, 'grid_brand'])->name('frontend.brand.grid');
Route::get('/product/brand-product-list/{id}', [FrontendBrand::class, 'list_brand'])->name('frontend.brand.list');

//Customer Route
Route::post('/customer-registration',[FrontendCustomer::class,'store'])->name('customer.registration');
Route::post('/customer-login',[FrontendCustomer::class,'login'])->name('customer.login');
Route::get('/customer-logout',[FrontendCustomer::class,'logout'])->name('customer.logout');

Route::get('/customer/dashboard/', [Customer::class, 'dashboard'])->name('customer.dashboard');




//Vendor Route
Route::post('/vendor-registration', [FrontendVendor::class, 'store'])->name('vendor.registration');
Route::post('/vendor-login',[FrontendVendor::class,'login'])->name('vendor.login');
Route::get('/vendor-logout',[FrontendVendor::class,'logout'])->name('vendor.logout');


//Multiple Image Upload







