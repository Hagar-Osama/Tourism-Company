<?php

namespace App\Http\Traits;

trait SliderTrait
{
    private function show_all_slider()
    {
        return $this->sliderModel::get();
    }

    private function get_slider_by_id($id)
    {
        return $this->sliderModel::findOrFail($id);
    }
}
