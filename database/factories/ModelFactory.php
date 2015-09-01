<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 7/28/2015
 * Time: 3:37 PM
 */

$factory->define(App\Farm::class,function($faker){
    return [
      'name' =>$faker->name,
        'description' =>$faker->description,
        'address'=>$faker->address,
        'latitude'=>$faker->latitude,
        'longitude'=>$faker->longitude,
    ];
});