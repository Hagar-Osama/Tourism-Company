<?php

namespace App\Providers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*',function($view) {
            $view->with('categories', Category::all());
            $view->with('settings', Setting::all());
            $view->with('galleries', Gallery::all());
            $view->with('assets', Asset::all());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
