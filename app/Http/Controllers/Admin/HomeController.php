<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\HomeInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $homeInterface;

    public function __construct(HomeInterface $home)
    {
        $this->homeInterface = $home;
    }

    public function index()
    {
        return $this->homeInterface->homePage();
    }
}
