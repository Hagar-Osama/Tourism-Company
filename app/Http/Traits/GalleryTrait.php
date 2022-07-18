<?php

namespace App\Http\Traits;

trait GalleryTrait
{

    private function show_all_gallery()
    {
        return $this->galleryModel::get();
    }

    private function get_gallery_by_id($id)
    {
        return $this->galleryModel::findOrFail($id);
    }
}
