<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\SettingInterface;
use App\Http\Requests\Admin\Setting\AddSettingsRequest;
use App\Http\Requests\Admin\Setting\DeleteSettingsRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingsRequest;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $settingInterface;

    public function __construct(SettingInterface $setting)
    {
        $this->settingInterface = $setting;
    }

    public function index()
    {
        return $this->settingInterface->index();
    }

    public function create()
    {
        return $this->settingInterface->create();
    }

    public function store(AddSettingsRequest $request)
    {
        return $this->settingInterface->store($request);
    }

    public function edit($id)
    {
        return $this->settingInterface->edit($id);
    }

    public function update(UpdateSettingsRequest $request)
    {
        return $this->settingInterface->update($request);
    }

    public function destroy(DeleteSettingsRequest $request)
    {
        return $this->settingInterface->destroy($request);
    }
}
