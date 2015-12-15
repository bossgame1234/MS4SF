<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table= 'sensor';
    protected $fillable =['name','sensingDevice_id'];
    public function sensingDevice(){
        return $this->belongsTo('App\SensingDevice','id');
    }
    public function temperature(){
        return $this->hasMany('App\Temperature');
    } //
    public function soilMoisture(){
        return $this->hasMany('App\SoilMoisture');
    } //
    public function light(){
        return $this->hasMany('App\Light');
    } //
    public function humidity(){
        return $this->hasMany('App\Humidity');
    } //
    public function weeklyHistory(){
    return $this->hasMany('App\WeeklyHistory');
    }
    public function daily(){
        return $this->hasMany('App\Daily');
    }
    public function weekly(){
        return $this->hasMany('App\Weekly');
    }
    public function notification(){
        return $this->hasOne('App\MinMaxMonitor');
    }
}
