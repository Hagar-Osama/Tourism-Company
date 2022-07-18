<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\Admin\HomeInterface',
            'App\Http\Repositories\Admin\HomeRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\AuthInterface',
            'App\Http\Repositories\Admin\AuthRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\CategoriesInterface',
            'App\Http\Repositories\Admin\CategoriesRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\SlidersInterface',
            'App\Http\Repositories\Admin\SlidersRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\GalleryInterface',
            'App\Http\Repositories\Admin\GalleryRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\AdsInterface',
            'App\Http\Repositories\Admin\AdsRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\AboutUsInterface',
            'App\Http\Repositories\Admin\AboutUsRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\SettingInterface',
            'App\Http\Repositories\Admin\SettingRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\ContactUsInterface',
            'App\Http\Repositories\Admin\ContactUsRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\PackageInterface',
            'App\Http\Repositories\Admin\PackageRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\BookInterface',
            'App\Http\Repositories\Admin\BookRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\AssetsInterface',
            'App\Http\Repositories\Admin\AssetsRepository'
        );

         $this->app->bind(
            'App\Http\Interfaces\Admin\PartnerInterface',
            'App\Http\Repositories\Admin\PartnerRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\EndUser\HomeInterface',
            'App\Http\Repositories\EndUser\HomeRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\EndUser\ContactInterface',
            'App\Http\Repositories\EndUser\ContactRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\EndUser\GalleryInterface',
            'App\Http\Repositories\EndUser\GalleryRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\EndUser\PackageInterface',
            'App\Http\Repositories\EndUser\PackageRepository'
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
