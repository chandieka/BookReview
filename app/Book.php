<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // option 1 
    protected $fillable = ['name', 'description', 'date'];

}
