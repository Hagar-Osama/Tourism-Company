<?php

namespace App\Http\Traits;

trait PackagesTrait
{
    private function show_all_packages()
    {
        return $this->packageModel::get();
    }

    private function get_package_by_id($id)
    {
        return $this->packageModel::findOrFail($id);
    }
}
