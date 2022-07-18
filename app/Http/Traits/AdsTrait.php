<?php

namespace App\Http\Traits;

trait AdsTrait
{
    private function show_all_ads()
    {
        return $this->adsModel::get();
    }

    private function get_ad_by_id($id)
    {
        return $this->adsModel::findOrFail($id);
    }
}
