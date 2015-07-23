<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    protected $table= 'temperature';
    protected $fillable =['celsiusValue'];
    public function sensor(){
        return $this->belongsTo('App\Sensor');
    } ////
}
