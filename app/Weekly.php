<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 7/16/2015
 * Time: 11:09 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Weekly extends Model
{
    protected $table= 'weekly';
    protected $fillable =['*'];
    public function sensor(){
        return $this->belongsTo('App\Sensor');
    } //
}