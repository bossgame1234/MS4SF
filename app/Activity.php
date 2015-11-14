<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    protected $table= 'activity';
    protected $fillable =['*'];
    public function activityType(){
    return $this->belongsToMany('App\ActivityType');
    } ////
    public function plant(){
    return $this->belongsTo('App\Plant');
    }
    public function user(){
    return $this->belongsToMany('App\User');
    }
}
