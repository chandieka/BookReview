<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    // option 1 
    protected $fillable = ['name', 'description', 'date'];

    // RELATIONSHIP

    public function reviews()
    {
        return $this->HasMany(Review::class);
    }

}
