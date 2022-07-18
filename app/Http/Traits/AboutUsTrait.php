<?php

namespace App\Http\Traits;

trait AboutUsTrait
{
    private function show_all_about()
    {
        return $this->aboutModel::get();
    }

    private function get_about_by_id($id)
    {
        return $this->aboutModel::findOrFail($id);
    }
}
