<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AssetsInterface;
use App\Http\Traits\AssetsTrait;
use App\Http\Traits\UploaderTrait;
use App\Models\Asset;
use Illuminate\Support\Facades\Session;

class AssetsRepository implements AssetsInterface
{
    use UploaderTrait;
    use AssetsTrait;
    private $assetModel;

    public function __construct(Asset $asset)
    {
        $this->assetModel = $asset;
    }

    public function index()
    {
        $assets = $this->showAssets();
        return view('admin.assets.index',compact('assets'));
    }

    public function create()
    {
        return view('admin.assets.create');
    }

    public function store($request)
    {
        $image = $request->file('image');
        $imageName = $this->uploadFile($image, 'assets');
        $this->assetModel::create([
            'slug'=>$request->slug,
            'image'=> $imageName
        ]);
        Session::flash('done', 'Asset Added Successfully');
        return redirect(route('admin.assets.index'));
    }

    public function edit($id)
    {
        $asset = $this->getAssetsById($id);
        return view('admin.assets.edit', compact('asset'));
    }

    public function update($request)
    {
        $asset = $this->getAssetsById($request->assets_id);
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = $this->uploadFile($image,'assets', $asset->image);
        }

        $asset->update([
            'slug' => $request->slug,
            'image' => (isset($imageName)) ? $imageName : $asset->image
        ]);
        Session::flash('done', 'Asset Updated Successfully');
        return redirect(route('admin.assets.index'));

    }

    public function destroy($request)
    {
        $asset = $this->getAssetsById($request->assets_id);
        $asset->delete();
        if($asset->image) {
            $this->deleteFile($asset->image);
        }
        Session::flash('done', 'Asset Deleted Successfully');
        return redirect(route('admin.assets.index'));
    }


}
