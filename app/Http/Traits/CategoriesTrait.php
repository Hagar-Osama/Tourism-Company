<?php

namespace App\Http\Traits;

trait CategoriesTrait
{
    private function show_all_categories()
    {
        return $this->categoryModel::get();
    }

    private function get_category_by_id($id)
    {
        return $this->categoryModel::findOrFail($id);
    }
}
