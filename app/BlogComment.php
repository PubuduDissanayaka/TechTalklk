<?php

namespace App;
use App\BlogPost;
use App\User;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    public function blog()
    {
        return $this->belongsTo(BlogPost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
