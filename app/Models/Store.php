<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    public function library()
    {
        return $this->belongsTo(Library::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
