<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activityType extends Model
{
    protected $table= 'activityType';
    protected $fillable =['*'];
    public function activityType(){
        return $this->belongsToMany('App\Activity');
    } ////
}
