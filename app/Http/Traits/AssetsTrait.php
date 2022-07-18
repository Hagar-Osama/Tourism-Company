<?php

namespace App\Http\Traits;

trait AssetsTrait {

    private function showAssets()
    {
        return $this->assetModel::get();
    }

    private function getAssetsById($id)
    {

        return $this->assetModel::find($id);
    }
}
