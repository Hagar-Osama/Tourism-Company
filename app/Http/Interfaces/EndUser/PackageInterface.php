<?php

namespace App\Http\Interfaces\EndUser;

interface PackageInterface
{
    public function index();

    public function packageDetails($id);

    public function book($request);
}
