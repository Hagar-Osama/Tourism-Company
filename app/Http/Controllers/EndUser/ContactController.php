<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\ContactInterface;
use App\Http\Requests\Admin\ContactUs\AddContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactInterface;

    public function __construct(ContactInterface $contact)
    {
        $this->contactInterface = $contact;
    }

    public function index()
    {
        return $this->contactInterface->index();
    }

    public function store(AddContactRequest $request)
    {
        return $this->contactInterface->store($request);
    }
}
