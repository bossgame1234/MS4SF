<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    protected $table= 'light';
    protected $fillable =['luxValue'];
    public function sensor(){
        return $this->belongsTo('App\Sensor');
    } //
}
