<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farm extends Model {
    use SoftDeletes;
    protected $table= 'farm';
    protected $fillable =['id','name', 'latitude', 'longitude', 'address', 'description'];
    protected $dates = ['deleted_at'];
    public function plot(){
        return $this->hasMany('App\Plot');
    }
}
