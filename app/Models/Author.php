<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';
    protected $guarded = [];
    // protected $fillable = ['title', 'slug', 'dob', 'designation'];
    use HasFactory;

    public function author_books() {
        return $this->hasMany(Book::class, 'author_id');
    }


}