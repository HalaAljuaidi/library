<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;
    public function stores()
    {
        return  $this->hasMany(Stor::class);
    }
    public function manager()
    {
        return  $this->belongsTo(Manager::class);
    }
    public function sections()
    {
        return  $this->hasMany(Section::class);
    }
}
