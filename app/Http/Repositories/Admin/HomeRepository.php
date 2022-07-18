<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\HomeInterface;

class HomeRepository implements HomeInterface
{

    public function homePage()
    {
        return view('admin.index');
    }
}
