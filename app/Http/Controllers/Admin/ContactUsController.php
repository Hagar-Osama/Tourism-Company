<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ContactUsInterface;
use App\Http\Requests\Admin\ContactUs\DeleteContactRequest;
use App\Http\Requests\Admin\ContactUs\UpdateContactRequest;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    private $contactInterface;

    public function __construct(ContactUsInterface $contactUs)
    {
        $this->contactInterface = $contactUs;
    }

    public function index()
    {
        return $this->contactInterface->index();
    }

    public function unread()
    {
        return $this->contactInterface->unread();
    }


    public function update(UpdateContactRequest $request)
    {
        return $this->contactInterface->update($request);
    }

    public function destroy(DeleteContactRequest $request)
    {
        return $this->contactInterface->destroy($request);
    }
}
