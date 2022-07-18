<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdsInterface;
use App\Http\Traits\AdsTrait;
use App\Http\Traits\UploaderTrait;
use App\Models\Ads;
use Illuminate\Support\Facades\Session;

class AdsRepository implements AdsInterface
{
    use UploaderTrait;
    use AdsTrait;
    private $adsModel;

    public function __construct(Ads $ads)
    {
        $this->adsModel = $ads;
    }

    public function index()
    {
        $ads = $this->show_all_ads();
        return view('admin.ads.index', compact('ads'));
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store($request)
    {
        $image = $request->file('image');
        $imageName = $this->uploadFile($image,'ads', null);
        $this->adsModel::create([
            'link' => $request->link,
            'image' => $imageName
        ]);
        Session::flash('done', 'Ad Has Been Created Successfully');
        return redirect(route('admin.ads.index'));
    }

    public function edit($id)
    {
       $ad = $this->get_ad_by_id($id);
       return view('admin.ads.edit', compact('ad'));
    }

    public function update($request)
    {
        $ad = $this->get_ad_by_id($request->ad_id);
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = $this->uploadFile($image,'ads', $ad->image);
        }

        $ad->update([
            'link' => $request->link,
            'image' => (isset($imageName)) ? $imageName : $ad->image
        ]);

        Session::flash('done', 'Ad Has Been Updated Success');
        return redirect(route('admin.ads.index'));
    }

    public function destroy($request)
    {
        $ad = $this->get_ad_by_id($request->ad_id);
        $ad->delete();
        if ($ad->image)
            $this->deleteFile($ad->image);

        Session::flash('done', 'Ad Has Been Deleted Successfully');
        return back();
    }
}
