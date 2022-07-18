<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\PackageInterface;
use App\Http\Traits\CategoriesTrait;
use App\Http\Traits\UploaderTrait;
use App\Http\Traits\PackagesTrait;
use App\Models\Category;
use App\Models\PackageImage;
use App\Models\Packages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PackageRepository implements PackageInterface
{
    use UploaderTrait;
    use PackagesTrait;
    use CategoriesTrait;

    private $packageModel;
    private $packageImagesModel;
    private $categoryModel;


    public function __construct(Packages $packages, PackageImage $packageImage, Category $categories)
    {
        $this->packageModel = $packages;
        $this->packageImagesModel = $packageImage;
        $this->categoryModel = $categories;
    }

    public function index()
    {
        $packages = $this->show_all_packages();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $categories = $this->show_all_categories();
        return view('admin.packages.create', compact('categories'));
    }

    public function store($request)
    {
        DB::transaction(function () use ($request) {

            $image = $request->file('image');
            $imageName = $this->uploadFile($image,'packages', null);

            $file = $request->file('plan_pdf');
            $fileName = $this->uploadFile($file, 'plan_packages', null);

            $package =$this->packageModel::create([
                'title' => $request->title,
                'price' => $request->price,
                'main_image' => $imageName,
                'plan_pdf' => $fileName,
                'location' => $request->location,
                'start_date' => $request->start_date,
                'body' => $request->body,
                'category_id'=>$request->category_id
            ]);

            $images = $request->file('images');
            if ($request->hasFile('images'))
            {
                foreach ($images as $image)
                {
                    $image = $this->uploadFile($image, 'special', null);
                    $this->packageImagesModel::create([
                        'package_id' => $package->id,
                        'image' => $image,
                    ]);
                }
            }

        });

        Session::flash('done', 'Data Created Successfully');
        return redirect(route('admin.package.index'));

    }

    public function edit($id)
    {
        $package = $this->get_package_by_id($id);
        $categories = $this->show_all_categories();
        return view('admin.packages.edit', compact('package', 'categories'));
    }

    public function update($request)
    {
        DB::transaction(function () use ($request) {

            $package = $this->get_package_by_id($request->package_id);
            if ($request->hasFile('image') && $request->hasFile('file'))
            {
                $image = $request->file('image');
                $imageName = $this->uploadFile($image, 'packages', $package->main_image );

                $file = $request->file('plan_pdf');
                $pdf = $this->uploadFile($file, 'plan_packages', $package->plan_pdf);
            }
            $package->update([
                'title' => $request->title,
                'price' => $request->price,
                'main_image' => isset($imageName) ? $imageName : $package->main_image,
                'plan_pdf' => isset($pdf) ? $pdf : $package->plan_pdf,
                'location' => $request->location,
                'start_date' => $request->start_date,
                'body' => $request->body,
                'category_id'=>$request->category_id

            ]);

            $packageImage = $this->packageImagesModel::with('package')->first();
            $images = $request->file('images');
            if ($request->hasFile('images'))
            {
                foreach ($images as $image)
                {
                    $image = $this->uploadFile($image, 'special', $packageImage->image);
                    $packageImage->update([
                        'package_id' => $package->id,
                        'image' => isset($image) ? $image : $packageImage->image,
                    ]);
                }
            }
        });
        Session::flash('done', 'Data Updated Successfully');
        return redirect(route('admin.package.index'));

    }

    public function destroy($request)
    {
        $package = $this->get_package_by_id($request->package_id);
        $path[] = env('AWS_URL'). '/packages'. "/" . $package->main_image;
        $path[] = env('AWS_URL'). '/plan_packages'. "/" . $package->plan_pdf;
        $package->delete();
        if (isset($package->main_image) && isset($package->plan_pdf))
        {
            foreach ($path as $file)
            {
                $this->deleteFile($file);
            }
        }
        Session::flash('done', 'Data Deleted Successfully');
        return back();
    }
}
