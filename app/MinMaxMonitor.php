<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinMaxMonitor extends Model
{
    protected $table= 'minmaxmonitor';
    protected $fillable =['*'];
    public function sensor(){
        return $this->belongsTo('App\Sensor');
    }
    public function plant(){
        return $this->belongsTo('App\Plant');
    }
    public function user(){
        return $this->belongsToMany('App\User')->withPivot("status");
    }
}
