<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\GalleryInterface;
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
}
