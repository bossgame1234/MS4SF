<?php

namespace App\Http\Controllers;

use App\Humidity;
use App\Light;
use App\SensingDevice;
use App\Sensor;
use App\SoilMoisture;
use App\Temperature;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class sensorController extends Controller
{

    public function store(Request $request)
    {
        $sensor = new Sensor();
        $sensor->device_id = $request->input('device_id');
        $sensor->name = "basic package";
        return $sensor;
    }
    public function show($id){
        $sensor = Sensor::where('sensingDevice_id','=',$id)->first();
        return $sensor;
    }
    public function getCurrentEnvironmentValue($id){
        $currentLight = Light::where("sensor_id","=",$id)->orderBy('created_at', 'desc')->first();
        $currentSoilMoisture = SoilMoisture::where("sensor_id","=",$id)->orderBy('created_at', 'desc')->first();
        $currentTemperature = Temperature::where("sensor_id","=",$id)->orderBy('created_at', 'desc')->first();
        $currentAirHumidity = Humidity::where("sensor_id","=",$id)->orderBy('created_at', 'desc')->first();
        $json = array();
        $json[0] =  $currentLight;
        $json[1] =  $currentTemperature;
        $json[2] = $currentAirHumidity ;
        $json[3] =$currentSoilMoisture;
        return  $json;
    }

}

