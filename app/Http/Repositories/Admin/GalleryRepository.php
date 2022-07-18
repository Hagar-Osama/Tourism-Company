<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\GalleryInterface;
use App\Http\Traits\GalleryTrait;
use App\Http\Traits\UploaderTrait;
use App\Models\Gallery;
use Illuminate\Support\Facades\Session;

class GalleryRepository implements GalleryInterface
{
    use UploaderTrait;
    use GalleryTrait;
    private $galleryModel;

    public function __construct(Gallery $gallery)
    {
        $this->galleryModel = $gallery;
    }

    public function index()
    {
        $galleries = $this->show_all_gallery();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store($request)
    {
        $image = $request->file('image');
        $imageName = $this->uploadFile($image,'galleries', null);

        $this->galleryModel::create(['image' => $imageName]);
        Session::flash('done', 'Image Has Been Added Successfully');
        return redirect(route('admin.gallery.index'));
    }

    public function edit($id)
    {
        $gallery = $this->get_gallery_by_id($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update($request)
    {
        $gallery = $this->get_gallery_by_id($request->gallery_id);
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = $this->uploadFile($image,'galleries', $gallery->image);

        }

        $gallery->update([
            'image' => (isset($imageName)) ? $imageName : $gallery->image
        ]);

        Session::flash('done', 'Image Updated Successfully');
        return redirect(route('admin.gallery.index'));

    }

    public function destroy($request)
    {
        $gallery = $this->get_gallery_by_id($request->gallery_id);
        $gallery->delete();
        if ($gallery->image)
            $this->deleteFile($gallery->image);
        Session::flash('done', 'Item Has Been Deleted');
        return redirect()->back();
    }
}
