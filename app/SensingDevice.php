<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensingDevice extends Model
{
    protected $table= 'sensingdevice';
    protected $fillable =['device_id'];
    public function sensor(){
        return $this->hasMany('App\Sensor');
    }
    public function plot(){
        return $this->belongsTo('App\Plot');
    }
}
