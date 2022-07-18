<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\SettingInterface;
use App\Http\Traits\SettingTrait;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;

class SettingRepository implements SettingInterface
{
    use SettingTrait;

    private $settingModel;

    public function __construct(Setting $setting)
    {
        $this->settingModel = $setting;
    }

    public function index()
    {
        $settings = $this->show_all_setting();
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.create');
    }

    public function store($request)
    {
        $this->settingModel::create([
            'key' => $request->key,
            'value' => $request->value
        ]);
        Session::flash('done', 'Data Has Been Created');
        return redirect(route('admin.setting.index'));
    }

    public function edit($id)
    {
        $setting = $this->get_setting_by_id($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update($request)
    {
        $setting = $this->get_setting_by_id($request->setting_id);
        $setting->update([
            'key' => $request->key,
            'value' => $request->value
        ]);
        Session::flash('done', 'Data Updated Success');
        return redirect(route('admin.setting.index'));
    }

    public function destroy($request)
    {
        $setting = $this->get_setting_by_id($request->setting_id);
        $setting->delete();

        Session::flash('done', 'Data Deleted Success');
        return back();
    }

}
