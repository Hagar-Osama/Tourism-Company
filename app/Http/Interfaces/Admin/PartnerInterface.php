<?php

namespace App\Http\Interfaces\Admin;

interface PartnerInterface
{
    public function index();

    public function create();

    public function upload($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);


}
