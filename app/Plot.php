<?php namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 15/7/2558
 * Time: 0:23
 */
class Plot extends Model
{
    protected $table= 'plot';
    protected $fillable =['name', 'latitude', 'longitude', 'address', 'description'];
}
