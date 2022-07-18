<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\SlidersInterface;
use App\Http\Requests\Admin\Slider\AddSliderRequest;
use App\Http\Requests\Admin\Slider\DeleteSliderRequest;
use App\Http\Requests\Admin\Slider\UpdateSliderRequest;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $sliderInterface;

    public function __construct(SlidersInterface $sliders)
    {
        $this->sliderInterface = $sliders;
    }

    public function index()
    {
        return $this->sliderInterface->index();
    }

    public function create()
    {
        return $this->sliderInterface->create();
    }

    public function store(AddSliderRequest $request)
    {
        return $this->sliderInterface->store($request);
    }

    public function edit($id)
    {
        return $this->sliderInterface->edit($id);
    }

    public function update(UpdateSliderRequest $request)
    {
        return $this->sliderInterface->update($request);
    }

    public function delete(DeleteSliderRequest $request)
    {
        return $this->sliderInterface->destroy($request);
    }
}
