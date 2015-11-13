<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $table= 'tasklist';
    protected $fillable =['*'];
    public function ownerTask(){
        return $this->belongsTo('App\User',"user_id");
    }
    public function workerMember(){
        return $this->belongsToMany('App\User');
    }
    public function plant(){
        return $this->belongsTo('App\Plant');
    }
    public function activityType(){
        return $this->belongsToMany('App\ActivityType');
    }
     //
}
