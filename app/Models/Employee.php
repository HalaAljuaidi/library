<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Library;

class Employee extends Model
{
    use HasFactory;
    public function library()
    {
        return $this->belongsTo(Library::class);
    }

}
