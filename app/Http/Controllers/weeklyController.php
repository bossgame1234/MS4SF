<?php

namespace App\Http\Controllers;

use App\Weekly;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class weeklyController extends Controller
{
    public function show($id)
    {
        $showWeeklyAll = Weekly::where("sensor_id","like",$id)->get();
        return $showWeeklyAll;////
    }
    public function getLightWeeklySummary($id){
        $lightMax = Weekly::where('sensor_id','like',$id)->max('maxLight');
        $lightMin = Weekly::where('sensor_id','like',$id)->min('minLight');
        $lightAverage = Weekly::where('sensor_id','like',$id)->avg('avgLight');
        return response()->json(['lightMin'=>$lightMin,'lightMax'=>$lightMax,'lightAverage'=>$lightAverage]);
    }
    public function getTemperatureWeeklySummary($id){
        $tempMax = Weekly::where('sensor_id','like',$id)->max('maxTemperature');
        $tempMin = Weekly::where('sensor_id','like',$id)->min('minTemperature');
        $tempAverage = Weekly::where('sensor_id','like',$id)->avg('avgTemperature');
        return response()->json(['tempMin'=>$tempMin,'tempMax'=>$tempMax,'tempAverage'=>$tempAverage]);
    }
    public function getSoilMoistureWeeklySummary($id){
        $soilMax = Weekly::where('sensor_id','like',$id)->max('maxSoilMoisture');
        $soilMin = Weekly::where('sensor_id','like',$id)->min('minSoilMoisture');
        $soilAverage = Weekly::where('sensor_id','like',$id)->avg('avgSoilMoisture');
        return response()->json(['soilMin'=>$soilMin,'soilMax'=>$soilMax,'soilAverage'=>$soilAverage]);
    }
    public function getHumidityWeeklySummary($id){
        $humidityMax = Weekly::where('sensor_id','like',$id)->max('maxAirHumidity');
        $humidityMin = Weekly::where('sensor_id','like',$id)->min('minAirHumidity');
        $humidityAverage = Weekly::where('sensor_id','like',$id)->avg('avgAirHumidity');
        return response()->json(['humidityMin'=>$humidityMin,'humidityMax'=>$humidityMax,'humidityAverage'=>$humidityAverage]);
    }
}
