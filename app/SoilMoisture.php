<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoilMoisture extends Model
{
    protected $table= 'soilmoisture';
    protected $fillable =['soilValue','soilState'];
    public function sensor(){
        return $this->belongsTo('App\Sensor');
    } //
}
