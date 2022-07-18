<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\GalleryInterface;
use App\Http\Traits\GalleryTrait;
use App\Models\Gallery;

class GalleryRepository implements GalleryInterface
{
    use GalleryTrait;
    private $galleryModel;

    public function __construct(Gallery $gallery)
    {
        $this->galleryModel = $gallery;
    }

    public function index()
    {
        $galleries = $this->show_all_gallery();
        return view('endUser.gallery', compact('galleries'));
    }
}
