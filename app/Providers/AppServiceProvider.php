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
use App\Models\Shipping;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

// Use for Macro Builder
use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $searchTerm = trim($searchTerm);
            $this->where(static function (Builder $query) use ($searchTerm, $attributes) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(Str::contains($attribute, '.'), static function (Builder $query) use ($searchTerm, $attribute) {
                        [$relationName, $relationAttribute] = explode('.', $attribute);
                        $query->orWhereHas($relationName, static function (Builder $query) use ($relationAttribute, $searchTerm) {
                            $query->where($relationAttribute, 'LIKE', "{$searchTerm}%");
                        });
                    }, static function (Builder $query) use ($attribute, $searchTerm) {
                        $query->orWhere($attribute, 'LIKE', "{$searchTerm}%");
                    });
                }
            });

            return $this;
        });


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

        $search = $request['search'] ?? "";
        View::share('search', $search);

        $shipping = Shipping::all();
        View::share('shipping', $shipping);
    }
}
