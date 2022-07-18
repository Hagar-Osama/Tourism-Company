<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\PackageInterface;
use App\Http\Traits\PackagesTrait;
use App\Models\Book;
use App\Models\PackageImage;
use App\Models\Packages;
use Illuminate\Support\Facades\Session;

class PackageRepository implements PackageInterface
{
    use PackagesTrait;

    private $packageModel;
    private $packageImageModel;
    private $bookModel;

    public function __construct(Packages $packages, PackageImage $packageImage, Book $book)
    {
        $this->packageModel = $packages;
        $this->packageImageModel = $packageImage;
        $this->bookModel = $book;
    }

    public function index()
    {
        $packages = $this->show_all_packages();
        return view('endUser.tour-list', compact('packages'));
    }

    public function packageDetails($id)
    {
        $package = $this->get_package_by_id($id);
        $package_images = $this->packageImageModel::with('package')->get();
        return view('endUser.tour-details',compact('package', 'package_images'));
    }

    public function book($request)
    {
        try {
            $this->bookModel::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'date' => $request->date,
                'message' => $request->message,
                'package_id' => $request->package_id
            ]);
            Session::flash('message', 'Your Massage Has Been Sent Success');
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }



    }
}
