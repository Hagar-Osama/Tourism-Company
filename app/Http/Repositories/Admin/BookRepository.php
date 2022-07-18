<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\BookInterface;
use App\Http\Traits\BookTrait;
use App\Models\Book;
use Illuminate\Support\Facades\Session;

class BookRepository implements BookInterface
{
    use BookTrait;

    private $bookingModel;

    public function __construct(Book $book)
    {
        $this->bookingModel = $book;
    }

    public function index()
    {
        $booking = $this->show_all_booking()->where('is_delete',0);
        return view('admin.booking.index', compact('booking'));
    }

    public function showDetails($id)
    {
        $data = $this->get_booking_by_id($id);
        return view('admin.booking.show', compact('data'));
    }

    public function updateStatus($request)
    {
        $data = $this->get_booking_by_id($request->booking_id);
        try {
            if ($data)
                $data->update([
                    'status' => $request->status,
                ]);
            Session::flash('done', 'Record Has Been Updated');
            return redirect(route('admin.booking.index'));
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function softDelete($request)
    {
        $data = $this->get_booking_by_id($request->booking_id);
        try {
            if ($data)
                $data->is_delete = 1;
                $data->save();
            Session::flash('done', 'Record Has Been Deleted');
            return back();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}
