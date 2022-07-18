<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\ContactUsInterface;
use App\Http\Traits\ContactUsTrait;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Session;

class ContactUsRepository implements ContactUsInterface
{
    use ContactUsTrait;

    private $contactModel;

    public function __construct(ContactUs $contactUs)
    {
        $this->contactModel = $contactUs;
    }

    public function index()
    {
        $messages = $this->show_all_messages();
        return view('admin.contacts.index', compact('messages'));
    }


    public function update($request)
    {
        $message = $this->get_message_by_id($request->message_id);

            $message->update([
                'status' => 1
            ]);
            Session::flash('done', 'Message Approved');
            return back();
    }

    public function destroy($request)
    {
        $message = $this->get_message_by_id($request->message_id);
        if ($message)
            $message->delete();
        Session::flash('done', 'Message Deleted Success');
        return back();
    }

    public function unread()
    {
        $messages = $this->show_unread_messages();
        return view('admin.contacts.unread', compact('messages'));
    }
}
