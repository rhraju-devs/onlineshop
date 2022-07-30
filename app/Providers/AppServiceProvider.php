<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);


        $products = Product::all();
        View::share('products', $products);

        $categories = Category::all();
        View::share('categories', $categories);

        $brands = Brand::all();
        View::share('brands', $brands);

        $vendors = Vendor::all();
        View::share('vendors', $vendors);

        $customers = Customer::all();
        View::share('customers', $customers);

        $banners = Banner::all();
        View::share('banners', $banners);

        $settings = Setting::all();
        View::share('settings', $settings);

    }
}
