<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\ContactInterface;
use App\Http\Traits\SettingTrait;
use App\Models\ContactUs;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;

class ContactRepository implements ContactInterface
{
    use SettingTrait;

    private $contactModel;
    private $settingModel;

    public function __construct(ContactUs $contactUs, Setting $setting)
    {
        $this->contactModel = $contactUs;
        $this->settingModel = $setting;
    }

    public function index()
    {
        $settings = $this->show_all_setting();
        return view('endUser.contactus',compact('settings'));
    }

    public function store($request)
    {
        $this->contactModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        Session::flash('done', 'Your Message Has Been Sent Successfully,We Will replay later');
        return back();
    }
}
