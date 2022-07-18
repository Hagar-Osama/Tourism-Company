<?php

namespace App\Http\Traits;

trait ContactUsTrait
{
    private function show_all_messages()
    {
        return $this->contactModel::get();
    }

    private function show_unread_messages()
    {
        return $this->contactModel::where('status', 0)->get();
    }

    private function get_message_by_id($id)
    {
        return $this->contactModel::findOrFail($id);
    }
}
