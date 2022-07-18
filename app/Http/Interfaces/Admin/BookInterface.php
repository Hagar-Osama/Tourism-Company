<?php

namespace App\Http\Interfaces\Admin;

interface BookInterface
{
    public function index();

    public function showDetails($id);

    public function updateStatus($request);

    public function softDelete($request);

}
