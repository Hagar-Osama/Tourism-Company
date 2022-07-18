<?php

namespace App\Http\Interfaces\Admin;

interface ContactUsInterface
{
    public function index();

    public function unread();

    public function update($request);

    public function destroy($request);
}
