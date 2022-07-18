<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email', 'date', 'message','package_id', 'status'];

    public function packageBook()
    {
        return $this->belongsTo(Packages::class, 'package_id');
    }
}
