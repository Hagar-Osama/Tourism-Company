<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\SlidersInterface;
use App\Http\Traits\UploaderTrait;
use App\Http\Traits\SliderTrait;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;

class SlidersRepository implements SlidersInterface
{
    use SliderTrait;
    use UploaderTrait;
   private $sliderModel;

   public function __construct(Slider $slider)
   {
       $this->sliderModel = $slider;
   }

    public function index()
    {
        $sliders = $this->show_all_slider();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store($request)
    {
        $image = $request->file('image');
        $imageName = $this->uploadFile($image, 'sliders/', null);

        $this->sliderModel::create([
            'link' => $request->link,
            'image' => $imageName
        ]);
        Session::flash('done', 'Slider Created Successfully');
        return redirect(route('admin.slider.index'));
    }

    public function edit($id)
    {
        $slider = $this->get_slider_by_id($id);
        return view('admin.sliders.edit',  compact('slider'));
    }

    public function update($request)
    {
        $slider = $this->get_slider_by_id($request->slider_id);

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName= $this->uploadFile($image,'sliders',$slider->image);
        }

        $slider->update([
            'link' => $request->link,
            'image' => (isset($imageName)) ? $imageName : $slider->image
        ]);

        Session::flash('done', 'Slider Has Been Updated');
        return redirect(route('admin.slider.index'));
    }

    public function destroy($request)
    {
        $slider = $this->get_slider_by_id($request->slider_id);
        $slider->delete();
        if ($slider->image)
        {
            $this->deleteFile($slider->image);
        }

        Session()->flash('done','Slider Has Been Deleted');
        return redirect()->back();
    }
}
