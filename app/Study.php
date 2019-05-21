<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Study;
use App\StudyRating;

class Study extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'studies';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'cover', 'photo', 'google', 'user_id', 'document'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\StudyComment');
    }

    public function studyratings()
    {
        return $this->hasMany('App\StudyRating');
    }

    public function ratings()
    {
        return $this->hasMany('App\StudyRating');
    }

    public function getavarage(){
        return DB::table('study_ratings');
    }
}
