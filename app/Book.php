<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'date'];

<<<<<<< HEAD
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
=======
    // RELATIONSHIP

    public function reviews()
    {
        return $this->HasMany(Review::class);
    }

>>>>>>> 5b164f95e9298c29ecfb59d9f1944b2d01c5d48a
}
