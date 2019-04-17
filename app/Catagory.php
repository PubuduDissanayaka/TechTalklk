<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    public function blogpost()
    {
        return $this->hasMany('App\BlogPost');
    }
}
