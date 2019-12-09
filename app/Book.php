<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'date'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
    // RELATIONSHIP

    public function reviews()
    {
        return $this->HasMany(Review::class);
    }

}
