<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AssetsInterface;
use App\Http\Requests\Admin\Assets\AddAssetRequest;
use App\Http\Requests\Admin\Assets\DeleteAssetRequest;
use App\Http\Requests\Admin\Assets\UpdateAssetRequest;

class AssetController extends Controller
{
    private $assetInterface;

    public function __construct(AssetsInterface $asset)
    {
        $this->assetInterface = $asset;

    }

    public function index()
    {
        return $this->assetInterface->index();
    }

    public function create()
    {
        return $this->assetInterface->create();
    }

    public function store(AddAssetRequest $request)
    {
        return $this->assetInterface->store($request);
    }

    public function edit($id)
    {
        return $this->assetInterface->edit($id);
    }

    public function update(UpdateAssetRequest $request)
    {
        return $this->assetInterface->update($request);
    }

    public function destroy(DeleteAssetRequest $request)
    {
        return $this->assetInterface->destroy($request);
    }


}
