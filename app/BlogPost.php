<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_posts';

    public $primarykey = 'id';


    public function catagory()
    {
        return $this->belongsTo('App\Catagory', 'cat_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class,'post_id');
    }
}
