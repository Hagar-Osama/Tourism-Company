<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\PackageInterface;
use App\Http\Requests\Admin\Package\AddPackageRequest;
use App\Http\Requests\Admin\Package\DeletePackageRequest;
use App\Http\Requests\Admin\Package\UpdatePackageRequest;
use Illuminate\Http\Request;

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

    public function create()
    {
        return $this->packageInterface->create();
    }

    public function store(AddPackageRequest $request)
    {
        return $this->packageInterface->store($request);
    }

    public function edit($id)
    {
        return $this->packageInterface->edit($id);
    }

    public function update(UpdatePackageRequest $request)
    {
        return $this->packageInterface->update($request);
    }

    public function destroy(DeletePackageRequest $request)
    {
        return $this->packageInterface->destroy($request);
    }
}
