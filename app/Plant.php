<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $table= 'plant';
    protected $fillable =['name','type','DOB','harvestDay','plot_id'];
    public function plot(){
        return $this->belongsTo('App\plot');
    }
}
