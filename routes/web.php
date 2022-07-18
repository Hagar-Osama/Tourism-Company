<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\EndUser\ContactController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\EndUser\GalleryController as EndUserGallery;
use App\Http\Controllers\EndUser\PackageController as EndUserPackage;
use App\Models\Category;
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


Route::group(['prefix' => '/', 'as' => 'user.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function (){
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::post('/', [ContactController::class, 'store'])->name('store');
    });

    Route::get('/gallery',[EndUserGallery::class, 'index'])->name('gallery.index');
    Route::get('/tour-list',[EndUserPackage::class, 'index'])->name('package.index');
    Route::get('/tour-details/{id}',[EndUserPackage::class, 'packageDetails'])->name('package.details');
    Route::post('/book-tour', [EndUserPackage::class, 'book'])->name('package.book');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    #================ Route Categories ===================#
    Route::group(['prefix' => 'categories', 'as' => 'category.'], function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('index');
        Route::get('/create', [CategoriesController::class, 'create'])->name('create');
        Route::post('/store', [CategoriesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('edit')->where(['id' => '[0-9]+']);
        Route::put('/update', [CategoriesController::class, 'update'])->name('update');
        Route::delete('/delete', [CategoriesController::class, 'delete'])->name('delete');
    });

    #================ Route Sliders ===================#
    Route::group(['prefix' => 'sliders', 'as' => 'slider.'], function () {
        Route::get('/', [SliderController::class, 'index'])->name('index');
        Route::get('/create', [SliderController::class, 'create'])->name('create');
        Route::post('/store', [SliderController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('edit')->where(['id' => '[0-9]+']);
        Route::put('/update', [SliderController::class, 'update'])->name('update');
        Route::delete('/delete', [SliderController::class, 'delete'])->name('delete');
    });

    #================ Route Galleries ===================#
    Route::group(['prefix' => 'galleries', 'as' => 'gallery.'], function () {
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::get('/create', [GalleryController::class, 'create'])->name('create');
        Route::post('/store', [GalleryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('edit')->where(['id' => '[0-9]+']);
        Route::put('/update', [GalleryController::class, 'update'])->name('update');
        Route::delete('/delete', [GalleryController::class, 'destroy'])->name('delete');
    });

    #================ Route Ads ===================#
    Route::group(['prefix' => 'ads', 'as' => 'ads.'], function () {
        Route::get('/', [AdsController::class, 'index'])->name('index');
        Route::get('/create', [AdsController::class, 'create'])->name('create');
        Route::post('/store', [AdsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdsController::class, 'edit'])->name('edit')->where(['id' => '[0-9]+']);
        Route::put('/update', [AdsController::class, 'update'])->name('update');
        Route::delete('/delete', [AdsController::class, 'destroy'])->name('delete');
    });

    #================ Route AboutUs ===================#
    Route::group(['prefix' => 'about_us', 'as' => 'about.'], function () {
        Route::get('/', [AboutUsController::class, 'index'])->name('index');
        Route::get('/create', [AboutUsController::class, 'create'])->name('create');
        Route::post('/store', [AboutUsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AboutUsController::class, 'edit'])->name('edit')->where(['id' => '[0-9]+']);
        Route::put('/update', [AboutUsController::class, 'update'])->name('update');
        Route::delete('/delete', [AboutUsController::class, 'destroy'])->name('destroy');
    });

    #================ Route Setting ===================#
    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::get('/create', [SettingController::class, 'create'])->name('create');
        Route::post('/store', [SettingController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('edit')->where(['id' => '[0-9]+']);
        Route::put('/update', [SettingController::class, 'update'])->name('update');
        Route::delete('/delete', [SettingController::class, 'destroy'])->name('destroy');
    });

    #================ Route ContactUs ===================#
    Route::group(['prefix' => 'contact-us', 'as' => 'contact.'], function () {
        Route::get('/', [ContactUsController::class, 'index'])->name('index');
        Route::get('/unread', [ContactUsController::class, 'unread'])->name('unread');
        Route::put('/update', [ContactUsController::class, 'update'])->name('update');
        Route::delete('/delete', [ContactUsController::class, 'destroy'])->name('destroy');
    });

    #================ Route Packages ===================#
    Route::group(['prefix' => 'package', 'as' => 'package.'], function () {
        Route::get('/', [PackageController::class, 'index'])->name('index');
        Route::get('/create', [PackageController::class, 'create'])->name('create');
        Route::post('/store', [PackageController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PackageController::class, 'edit'])->name('edit')->where(['id' => '[0-9]+']);
        Route::put('/update', [PackageController::class, 'update'])->name('update');
        Route::delete('/delete', [PackageController::class, 'destroy'])->name('destroy');
    });

    #================ Route Booking ===================#
    Route::group(['prefix' => 'booking', 'as' => 'booking.'], function () {
        Route::get('/', [BookController::class, 'index'])->name('index');
        Route::get('/show/{id}', [BookController::class, 'show'])->name('show');
        Route::put('/update', [BookController::class, 'update'])->name('update');
        Route::delete('/delete', [BookController::class, 'destroy'])->name('destroy');
    });

     #================ Route Assets ===================#
     Route::group(['prefix' => 'assets', 'as' => 'assets.'], function () {
        Route::get('/', [AssetController::class, 'index'])->name('index');
        Route::get('/create', [AssetController::class, 'create'])->name('create');
        Route::post('/store', [AssetController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AssetController::class, 'edit'])->name('edit');
        Route::put('/update', [AssetController::class, 'update'])->name('update');
        Route::delete('/delete', [AssetController::class, 'destroy'])->name('destroy');
    });

      #================ Route Partners ===================#
      Route::group(['prefix' => 'partners', 'as' => 'partners.'], function () {
        Route::get('/', [PartnerController::class, 'index'])->name('index');
        Route::get('/create', [PartnerController::class, 'create'])->name('create');
        Route::post('/upload', [PartnerController::class, 'upload'])->name('upload');
        Route::get('/edit/{id}', [PartnerController::class, 'edit'])->name('edit');
        Route::put('/update', [PartnerController::class, 'update'])->name('update');
        Route::delete('/delete', [PartnerController::class, 'destroy'])->name('destroy');
    });

});

Route::group(['prefix' => 'login', 'as' => 'login.'], function () {
   Route::get('/',[AuthController::class, 'index'])->name('page');
   Route::post('/',[AuthController::class, 'login'])->name('index');
});


