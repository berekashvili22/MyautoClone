<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $guarded = [];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturers::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
