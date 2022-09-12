<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    public function library()
    {
        return  $this->belongsTo(Library::class);
    }
    public function store()
    {
        return  $this->belongsTo(Store::class);
    }
}
