<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AboutUsInterface;
use App\Http\Requests\Admin\AboutUs\AddAboutUsRequest;
use App\Http\Requests\Admin\AboutUs\DeleteAboutUsRequest;
use App\Http\Requests\Admin\AboutUs\UpdateAboutUsRequest;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    private $aboutInterface;

    public function __construct(AboutUsInterface $aboutUs)
    {
        $this->aboutInterface = $aboutUs;
    }

    public function index()
    {
        return $this->aboutInterface->index();
    }

    public function create()
    {
        return $this->aboutInterface->create();
    }

    public function store(AddAboutUsRequest $request)
    {
        return $this->aboutInterface->store($request);
    }

    public function edit($id)
    {
        return $this->aboutInterface->edit($id);
    }

    public function update(UpdateAboutUsRequest $request)
    {
        return $this->aboutInterface->update($request);
    }

    public function destroy(DeleteAboutUsRequest $request)
    {
        return $this->aboutInterface->destroy($request);
    }
}
