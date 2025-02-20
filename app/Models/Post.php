<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
	public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}




