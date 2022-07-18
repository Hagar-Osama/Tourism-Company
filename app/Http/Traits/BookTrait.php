<?php

namespace App\Http\Traits;

trait BookTrait
{
    private function show_all_booking()
    {
        return $this->bookingModel::get();
    }

    private function get_booking_by_id($id)
    {
        return $this->bookingModel::findOrFail($id);
    }
}
