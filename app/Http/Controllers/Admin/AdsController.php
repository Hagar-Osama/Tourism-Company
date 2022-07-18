<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdsInterface;
use App\Http\Requests\Admin\Ads\AddAdsRequest;
use App\Http\Requests\Admin\Ads\DeleteAdsRequest;
use App\Http\Requests\Admin\Ads\UpdateAdsRequest;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    private $adsInterface;

    public function __construct(AdsInterface $ads)
    {
        $this->adsInterface = $ads;
    }

    public function index()
    {
        return $this->adsInterface->index();
    }

    public function create()
    {
        return $this->adsInterface->create();
    }

    public function store(AddAdsRequest $request)
    {
        return $this->adsInterface->store($request);
    }

    public function edit($id)
    {
        return $this->adsInterface->edit($id);
    }

    public function update(UpdateAdsRequest $request)
    {
        return $this->adsInterface->update($request);
    }

    public function destroy(DeleteAdsRequest $request)
    {
        return $this->adsInterface->destroy($request);
    }
}
