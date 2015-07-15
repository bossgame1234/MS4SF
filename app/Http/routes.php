<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::resource(
    'farm',
    'farmController',
    ['only' => ['store','index','show','edit']]
);

Route::get(
    '/',
    function() {
        return view('index');
    }
);
//route to add
Route::get('ms4sf','ms4sfAppController@index');
