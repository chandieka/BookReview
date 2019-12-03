<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // option 1 
    protected $fillable = ['title', 'rating', 'content'];

    // option 2
    // protected $guarder = [];
}
