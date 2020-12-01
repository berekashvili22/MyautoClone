<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturers extends Model
{
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function brands()
    {
        return $this->hasMany(Brands::class, 'manufacturer_id');
    }
}
