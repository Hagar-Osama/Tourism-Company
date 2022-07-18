<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\PartnerInterface;
use App\Http\Requests\Admin\Partner\AddPartnerRequest;
use App\Http\Requests\Admin\Partner\DeletePartnerRequest;
use App\Http\Requests\Admin\Partner\UpdatePartnerRequest;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    private $partnerInterface;

    public function __construct(PartnerInterface $partner)
    {
        $this->partnerInterface = $partner;
    }

    public function index()
    {
        return $this->partnerInterface->index();
    }

    public function create()
    {
        return $this->partnerInterface->create();
    }

    public function upload(AddPartnerRequest $request)
    {
        return $this->partnerInterface->upload($request);
    }

    public function edit($id)
    {
        return $this->partnerInterface->edit($id);
    }

    public function update(UpdatePartnerRequest $request)
    {
        return $this->partnerInterface->update($request);
    }

    public function destroy(DeletePartnerRequest $request)
    {
        return $this->partnerInterface->destroy($request);
    }
}

