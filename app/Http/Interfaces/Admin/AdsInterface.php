<?php

namespace App\Http\Interfaces\Admin;

interface AdsInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);
}
