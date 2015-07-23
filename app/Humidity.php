<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Humidity extends Model
{
    protected $table= 'airhumidity';
    protected $fillable =['humidityPercentage'];
    public function sensor(){
        return $this->belongsTo('App\Sensor');
    }
}
