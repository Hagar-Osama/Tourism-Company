<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Traits\AboutUsTrait;
use App\Http\Traits\AssetsTrait;
use App\Http\Traits\CategoriesTrait;
use App\Http\Traits\GalleryTrait;
use App\Http\Traits\SettingTrait;
use App\Http\Traits\SliderTrait;
use App\Models\AboutUs;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Packages;
use App\Models\Setting;
use App\Models\Slider;
use Facade\Ignition\Support\Packagist\Package;

class HomeRepository implements HomeInterface
{
    use SliderTrait;
    use CategoriesTrait;
    use AboutUsTrait;
    use SettingTrait;
    use GalleryTrait;
    use AssetsTrait;

    private $sliderModel;
    private $categoryModel;
    private $aboutModel;
    private $settingModel;
    private $galleryModel;
    private $assetModel;

    public function __construct(Category $category, Slider $slider, AboutUs $aboutUs, Setting $setting, Gallery $gallery, Asset $asset)
    {
        $this->sliderModel = $slider;
        $this->categoryModel = $category;
        $this->aboutModel = $aboutUs;
        $this->settingModel = $setting;
        $this->galleryModel = $gallery;
        $this->assetModel = $asset;
    }

    public function index()
    {
        $categories = $this->show_all_categories();
        $sliders = $this->show_all_slider();
        $abouts = $this->show_all_about();
        $settings = $this->show_all_setting();
        $galleries = $this->show_all_gallery();
        $lastPackages = Packages::inRandomOrder()->limit(5)->get();
        $assets = $this->showAssets();
        return view('index', compact('categories','sliders', 'abouts', 'settings', 'galleries', 'lastPackages', 'assets'));
    }

}
