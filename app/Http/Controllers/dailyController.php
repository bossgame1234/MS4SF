<?php

namespace App\Http\Controllers;

use App\Daily;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class dailyController extends Controller
{
    public function show($id)
    {
        $showDaily = Daily::where("sensor_id","like",$id)->get();
        return $showDaily;////
    }
    public function getLightDailySummary($id){
        $lightMin = Daily::where('sensor_id','like',$id)->min('minLight');
        $lightAverage = Daily::where('sensor_id','like',$id)->avg('avgLight');
        $lightMax = Daily::where('sensor_id','like',$id)->max('maxLight');
        return response()->json(['lightMin'=>$lightMin,'lightMax'=>$lightMax,'lightAverage'=>$lightAverage]);
    }
    public function getTemperatureDailySummary($id){
        $tempMin = Daily::where('sensor_id','like',$id)->min('minTemperature');
        $tempAverage = Daily::where('sensor_id','like',$id)->avg('avgTemperature');
        $tempMax = Daily::where('sensor_id','like',$id)->max('maxTemperature');
        return response()->json(['tempMin'=>$tempMin,'tempMax'=>$tempMax,'tempAverage'=>$tempAverage]);
    }
    public function getHumidityDailySummary($id){
        $humidityMin = Daily::where('sensor_id','like',$id)->min('minAirHumidity');
        $humidityAverage = Daily::where('sensor_id','like',$id)->avg('avgAirHumidity');
        $humidityMax = Daily::where('sensor_id','like',$id)->max('maxAirHumidity');
        return response()->json(['humidityMin'=>$humidityMin,'humidityMax'=>$humidityMax,'humidityAverage'=>$humidityAverage]);
    }
    public function getSoilMoistureDailySummary($id){
        $soilMin = Daily::where('sensor_id','like',$id)->min('minSoilMoisture');
        $soilAverage = Daily::where('sensor_id','like',$id)->avg('avgSoilMoisture');
        $soilMax = Daily::where('sensor_id','like',$id)->max('maxSoilMoisture');
        return response()->json(['soilMin'=>$soilMin,'soilMax'=>$soilMax,'soilAverage'=>$soilAverage]);
    }

}
