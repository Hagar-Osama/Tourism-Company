<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AuthInterface;
use App\Http\Requests\Admin\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authInterface;

    public function __construct(AuthInterface $auth)
    {
        $this->authInterface = $auth;
    }

    public function index()
    {
        return $this->authInterface->loginPage();
    }

    public function login(AuthRequest $request)
    {
        return $this->authInterface->login($request);
    }

    public function logout()
    {
        return $this->authInterface->logout();
    }
}
