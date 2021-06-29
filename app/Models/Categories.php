<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table='books_category';

    protected $fillable = [
        'book_category_id',
        'book_category_name',
        'book_category_parent_id'
    ];
}
