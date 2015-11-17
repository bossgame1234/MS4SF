<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinMaxMonitor extends Model
{
    protected $table= 'minmaxmonitor';
    protected $fillable =['*'];
    public function sensor(){
        return $this->belongsTo('App\Sendor');
    }
}
