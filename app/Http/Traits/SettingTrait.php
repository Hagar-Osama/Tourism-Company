<?php

namespace App\Http\Traits;

trait SettingTrait
{
    private function show_all_setting()
    {
        return $this->settingModel::get();
    }

    private function get_setting_by_id($id)
    {
        return $this->settingModel::findOrFail($id);
    }
}
