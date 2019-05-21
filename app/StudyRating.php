<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyRating extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function study()
    {
        return $this->belongsTo('App\Study');
    }
}
