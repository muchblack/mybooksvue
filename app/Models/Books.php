<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable = [
        'books_ISBN' ,
        'books_ISBN13',
        'books_category',
        'books_author' ,
        'books_publisher',
        'books_name'  ,
        'books_sub_title' ,
        'books_desc'  ,
        'books_ver'  ,
        'books_var_date' ,
        'books_is_audit' ,
        'books_is_set' ,
        'books_set_no' ,
    ];
}
