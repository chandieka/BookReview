<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'date'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
