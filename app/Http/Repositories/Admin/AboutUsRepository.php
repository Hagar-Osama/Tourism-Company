<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AboutUsInterface;
use App\Http\Traits\AboutUsTrait;
use App\Http\Traits\UploaderTrait;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Description;

class AboutUsRepository implements AboutUsInterface
{
    use UploaderTrait;
    use AboutUsTrait;
    private $aboutModel;

    public function __construct(AboutUs $aboutUs)
    {
        $this->aboutModel = $aboutUs;
    }

    public function index()
    {
        $abouts = $this->show_all_about();
        return view('admin.about_us.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about_us.create');
    }

    public function store($request)
    {
        $image = $request->file('image');
        $imageName = $this->uploadFile($image,'abouts', null);
        $this->aboutModel::create([
            'slug' => $request->slug,
            'body' => $request->body,
            'image' => $imageName
        ]);
        Session::flash('done', 'Record Has Been Created');
        return redirect(route('admin.about.index'));
    }

    public function edit($id)
    {
        $about = $this->get_about_by_id($id);
        return view('admin.about_us.edit', compact('about'));
    }

    public function update($request)
    {
        $about = $this->get_about_by_id($request->about_id);
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = $this->uploadFile($image,'abouts', $about->image);
        }

        $about->update([
            'slug' => $request->slug,
            'body' => $request->body,
            'image' => (isset($imageName)) ? $imageName : $about->image
        ]);

        Session::flash('done', 'Record Updated Success');
        return redirect(route('admin.about.index'));
    }

    public function destroy($request)
    {
        $about = $this->get_about_by_id($request->about_id);
        $about->delete();
        if ($about->image)
        {
            $this->deleteFile($about->image);
        }
        Session::flash('done', 'Record Deleted Success');
        return back();
    }
}
