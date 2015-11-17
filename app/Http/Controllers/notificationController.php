<?php

namespace App\Http\Controllers;
use App\MinMaxMonitor;
use Illuminate\Http\Request;
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 11/16/2015
 * Time: 9:52 PM
 */
class notificationController extends Controller
{
    public function setMinMaxMonitor(Request $request)
    {

        $id = $request->input('id');
        if($id!=null){
        $minMaxMonitor = MinMaxMonitor::find($id);
        }else{
            $minMaxMonitor = new MinMaxMonitor();
        }
        $minMaxMonitor->minHumidityPercentage = $request->input('minHumidityPercentage');
        $minMaxMonitor->maxHumidityPercentage = $request->input('maxHumidityPercentage');
        $minMaxMonitor->minCelsius= $request->input('minCelsius');
        $minMaxMonitor->maxCelsius= $request->input('maxCelsius');
        $minMaxMonitor->minSoilMoisture= $request->input('minSoilMoisture');
        $minMaxMonitor->maxSoilMoisture= $request->input('maxSoilMoisture');
        $minMaxMonitor->minLux = $request->input('minLux');
        $minMaxMonitor->maxLux = $request->input('maxLux');
        if($request->input('sensor_id')==null) {
            $device = \App\SensingDevice::where("device_id", "=", $request->input('deviceID'))->first();
            $sensor = \App\Sensor::where("sensingDevice_id", "=", $device->id)->first();
        }else{
            $sensor = \App\Sensor::where("id", "=",$request->input('sensor_id'))->first();
        }
        $minMaxMonitor->sensor_id = $sensor->id;
        if($request->input('sensor_id')==null) {
            $minMaxMonitor->save();
        }else{
            $minMaxMonitor->update();
        }
        return $minMaxMonitor;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getMinMaxMonitor($id)
    {
        $device = \App\SensingDevice::where("device_id","=",$id)->first();
        $sensor  = \App\Sensor::where("sensingDevice_id","=",$device->id)->first();
        $minMaxMonitor = MinMaxMonitor::where("sensor_id","=",$sensor->id)->first();
        return $minMaxMonitor;
    }
    public function sentMonitorNotification($message,$device_id){
        $deviceWithUser = \App\SensingDevice::where("device_id","=",$device_id)->with("plot.farm.users")->first();
        $token = $deviceWithUser->plot->farm->users[0]->device_token;
        $msg = $message;
        $device_token= $token;
        if($device_token!=null) {
            $url = 'https://push.ionic.io/api/v1/push';
            $data = array(
                'tokens' => array($device_token),
                'notification' => array('alert' => $msg),
            );
            $content = json_encode($data);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
            curl_setopt($ch, CURLOPT_USERPWD, "f9e571076976cd282ce1ded84e3c95c4cb39545374a188ee");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'X-Ionic-Application-Id: b86d0d75'
            ));
            $result =curl_exec($ch);
            curl_close($ch);
        }
    return  response("Sent notification success",200);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $plant= Plant::where('plot_id','like',$id)->get();
        return $plant;////
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $plantUpdate = $request->all();
        if($id==null){
            return null;
        }
        $plant = Plant::find($id);//
        $plant->update($plantUpdate);
        return $plant;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($id==null){
            return null;
        }
        Plant::find($id)->delete();
        return $id;
    }
}

