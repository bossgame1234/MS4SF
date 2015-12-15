<?php

namespace App\Http\Controllers;
use App\Farm;
use App\MinMaxMonitor;
use App\User;
use Illuminate\Http\Request;
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 11/16/2015
 * Time: 9:52 PM
 */
class notificationController extends Controller
{
    public function getNotificationOverall(Request $request){
        $userId = $request->input('id');
        $userWithNotification = User::where("id","=",$userId)->with("minMaxMonitor.plant.plot","minMaxMonitor.sensor.sensingDevice")->first()->minMaxMonitor;
        return $userWithNotification;
    }

    public function changeNotificationStatus(Request $request){
        $userID = $request->input('user_id');
        $notificationID = $request->input('id');
        $status = $request->input('status');
        $users = MinMaxMonitor::find($notificationID)->user()->get();
        foreach ($users as $user)
        {
            if($user->pivot->user_id==$userID&&$user->pivot->min_max_monitor_id==$notificationID){
                $user->pivot->status = $status;
                $user->pivot->save();
                return response("success",200);
            }
        }
         return response("error",500);
    }

    public function getNotificationTaskStatus(Request $request){
        $notificationID = $request->input('id');
        $notification = User::where("id","=",$notificationID)->first()->task_status;
        return $notification;
    }

    public function changeNotificationTaskStatus(Request $request){
        $notificationID = $request->input('id');
        $status = $request->input('status');
        $notification = User::where("id","=",$notificationID)->first();
        $notification->task_status = $status;
        $notification->update();
        return response('success',200);
    }

    public function setMinMaxMonitor(Request $request)
    {
        $id = $request->input('id');
        if($id!=null){
        $minMaxMonitor = MinMaxMonitor::find($id);
        }else{
            $minMaxMonitor = new MinMaxMonitor();
        }
        $minMaxMonitor->plant_id = $request->input('plant_id');
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
            $member = Farm::find($request->input('farm_id'))->users()->get();
            foreach($member as $person){
                $minMaxMonitor = MinMaxMonitor::find($minMaxMonitor->id);
                $minMaxMonitor->user()->attach($person->id);
            }
        }else{
            $minMaxMonitor->update();
        }
        return $minMaxMonitor;
    }
    public function getMinMaxMonitor($id)
    {
        if(is_numeric($id)){
            $minMaxMonitor = MinMaxMonitor::where("id","=",$id)->first();
            return $minMaxMonitor;
        }
        $device = \App\SensingDevice::where("device_id","=",$id)->first();
        $sensor  = \App\Sensor::where("sensingDevice_id","=",$device->id)->first();
        $minMaxMonitor = MinMaxMonitor::where("sensor_id","=",$sensor->id)->first();
        return $minMaxMonitor;
    }
    public function sentMonitorNotification($message,$device_id){
        $deviceWithUser = \App\SensingDevice::where("device_id","=",$device_id)->with("sensor.notification.user")->first();
        $device_token = null;
        $msg = $message;
        foreach($deviceWithUser->sensor[0]->notification->user as $user) {
            $device_token = $user->device_token;
            if($user->pivot->status=="on"){
                if ($device_token != null) {
                    $url = 'https://push.ionic.io/api/v1/push';
                    $data = array(
                        'tokens' => array($device_token),
                        'notification' => array('alert' => $msg,
                            "ios"=>array(
                                     'badge'=>1,
                                     'sound'=>"chime.aiff",
                                     'expiry'=> 1423238641,
                                     'priority'=> 10,
                                     'contentAvailable'=> true
                            )
                        )
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
                    $result = curl_exec($ch);
                    curl_close($ch);
                }
            }
        }
    return  response("Sent notification success",200);
    }
    public function sentTaskToFarmWorker($message,$user_id){
        $UserToken = User::where('id','=',$user_id)->first()->device_token;
        $status = User::where('id','=',$user_id)->first()->task_status;
        $msg = $message;
        $device_token= $UserToken;
        if($device_token!=null) {
            if($status=="on") {
                $url = 'https://push.ionic.io/api/v1/push';
                $data = array(
                    'tokens' => array($device_token),
                    'notification' => array('alert' => $msg,
                        "ios"=>array(
                            'badge'=>1,
                            'sound'=>"chime.aiff",
                            'expiry'=> 1423238641,
                            'priority'=> 10,
                            'contentAvailable'=> true
                        )
                    )
                );
                $content = json_encode($data);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
                curl_setopt($ch, CURLOPT_USERPWD, "f9e571076976cd282ce1ded84e3c95c4cb39545374a188ee");
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'X-Ionic-Application-Id: b86d0d75'
                ));
                $test = curl_exec($ch);
                curl_close($ch);
            }
        }
    }

    public function deleteNotification(Request $request){
        $id = $request->input('id');
        $mix = MinMaxMonitor::where("id","=",$id)->first();
        if($mix==null){
            return response("Error",500);
        }
        $mix->user()->detach();
        $mix->delete();
        return response("Delete notification success",200);
    }
}

