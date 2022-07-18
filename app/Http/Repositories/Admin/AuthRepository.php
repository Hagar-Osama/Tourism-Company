<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AuthInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthRepository implements AuthInterface
{

    public function loginPage()
    {
        return view('login');
    }

    public function login($request)
    {
        $userData = $request->only(['email', 'password']);

        if (Auth::attempt($userData))
        {
            return redirect(route('admin.index'));
        }
        session()->flash('error','Email Or Password Is Wrong');
        return redirect()->back();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login.page'));
    }
}
