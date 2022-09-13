<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function borrowers()
{
    return $this->belongsToMany(Borrower::class,'books_borrower');
}
public function author()
{
    return $this->belongsTo(Author::class);
}
public function section()
{
    return $this->belongsTo(Section::class);
}
public function metaphor()
{
    return $this->belongsTo(Metaphor::class);
}
}
