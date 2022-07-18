<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\PackageInterface;
use App\Http\Requests\EndUser\AddBookRequest;


class PackageController extends Controller
{
    private $packageInterface;

    public function __construct(PackageInterface $package)
    {
        $this->packageInterface = $package;
    }

    public function index()
    {
        return $this->packageInterface->index();
    }

    public function packageDetails($id)
    {
        return $this->packageInterface->packageDetails($id);
    }

    public function book(AddBookRequest $request)
    {
        return $this->packageInterface->book($request);
    }
}
