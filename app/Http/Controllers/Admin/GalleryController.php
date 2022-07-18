<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\GalleryInterface;
use App\Http\Requests\Admin\Gallery\AddGalleryRequest;
use App\Http\Requests\Admin\Gallery\DeleteGalleryRequest;
use App\Http\Requests\Admin\Gallery\UpdateGalleryRequest;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    private $galleryInterface;

    public function __construct(GalleryInterface $gallery)
    {
        $this->galleryInterface = $gallery;
    }

    public function index()
    {
        return $this->galleryInterface->index();
    }

    public function create()
    {
        return $this->galleryInterface->create();
    }

    public function store(AddGalleryRequest $request)
    {
        return $this->galleryInterface->store($request);
    }

    public function edit($id)
    {
        return $this->galleryInterface->edit($id);
    }

    public function update(UpdateGalleryRequest $request)
    {
        return $this->galleryInterface->update($request);
    }

    public function destroy(DeleteGalleryRequest $request)
    {
        return $this->galleryInterface->destroy($request);
    }
}
