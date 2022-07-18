<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'price', 'main_image', 'location', 'start_date', 'plan_pdf'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
