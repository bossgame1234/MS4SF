<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 7/16/2015
 * Time: 11:09 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    protected $table= 'daily';
    protected $fillable =['*'];
    public function sensor(){
        return $this->belongsTo('App\Sensor');
    } //
}