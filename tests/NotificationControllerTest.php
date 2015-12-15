<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 12/15/2015
 * Time: 4:12 PM
 */
class NotificationControllerTest extends TestCase{
    public function testGetNotificationOverall()
    {
        $userID = \App\User::where("username","=","testAuth")->first()->id;
        $this->action('GET', 'notificationController@getNotificationOverall', array('id' => $userID));
        $this->assertResponseStatus(200);
        $this->seeJsonContains(array("minHumidityPercentage" => 10,"maxHumidityPercentage"=>30,"minCelsius"=>15,"maxCelsius"=>30));
        $this->action('GET', 'notificationController@getNotificationOverall');
        $this->isEmpty();
    }
    public function testChangeNotificationStatus(){
        $userID = \App\User::where("username","=","testAuth")->first()->id;
        $minMaxID = \App\MinMaxMonitor::where("sensor_id","=","6")->first()->id;
        $this->action('GET','notificationController@changeNotificationStatus',array('user_id'=>$userID,'status'=>'off','id'=>$minMaxID));
        $this->assertResponseStatus(200);
        $this->seeInDatabase("min_max_monitor_user",array('user_id'=>$userID,'status'=>'off','min_max_monitor_id'=>$minMaxID));
        $this->action('GET','notificationController@changeNotificationStatus',array('user_id'=>$userID,'status'=>'on','id'=>$minMaxID));
        $this->assertResponseStatus(200);
        $this->seeInDatabase("min_max_monitor_user",array('user_id'=>$userID,'status'=>'on','min_max_monitor_id'=>$minMaxID));
    }
    public function testGetNotificationTaskStatus(){
        $userID = \App\User::where("username","=","testAuth")->first()->id;
        $this->action('GET','notificationController@getNotificationTaskStatus',array('id'=>$userID));
        $this->contains("off");
        $this->action('GET','notificationController@getNotificationTaskStatus',array());
        $this->isEmpty();
    }
    public function testChangeNotificationTaskStatus(){
        $userID = \App\User::where("username","=","testAuth")->first()->id;
        $this->action('GET','notificationController@changeNotificationTaskStatus',array('id'=>$userID,'status'=>'on'));
        $this->assertResponseStatus(200);
        $this->seeInDatabase("users",array('id'=>$userID,'task_status'=>'on'));
        $this->action('GET','notificationController@changeNotificationTaskStatus',array('id'=>$userID,'status'=>'off'));
        $this->assertResponseStatus(200);
        $this->seeInDatabase("users",array('id'=>$userID,'task_status'=>'off'));
    }
    public function testSetMinMaxMonitor(){
        $MinMaxMonitor2 = array(
            "minHumidityPercentage"=>0,
            "maxHumidityPercentage"=>20,
            "minCelsius"=>15,
            "maxCelsius"=>30,
            "minSoilMoisture"=>500,
            "maxSoilMoisture"=>1024,
            "minLux"=>0,
            "maxLux"=>10000,
            "deviceID"=>"test10test",
            "plant_id"=>274,
            "farm_id"=>332
        );
        $this->action('POST','notificationController@setMinMaxMonitor',$MinMaxMonitor2);
        $this->assertResponseStatus(200);
        $this->seeInDatabase("minmaxmonitor",array(
            "minHumidityPercentage"=>0,
            "maxHumidityPercentage"=>20,
            "minCelsius"=>15,
            "maxCelsius"=>30,
            "minSoilMoisture"=>500,
            "maxSoilMoisture"=>1024,
            "minLux"=>0,
            "maxLux"=>10000,
            "sensor_id"=>6,
            "plant_id"=>274
        ));
        $this->action('POST','notificationController@setMinMaxMonitor',null);
        $this->assertResponseStatus(500);
    }
    public function testGetMinMaxMonitor(){
        $minMaxID = \App\MinMaxMonitor::where("sensor_id","=","6")->first()->id;
        $this->action('GET','notificationController@getMinMaxMonitor',array('id'=>$minMaxID));
        $this->assertResponseStatus(200);
        $this->seeJsonContains(array("minHumidityPercentage" => 10,"maxHumidityPercentage"=>30,"minCelsius"=>15,"maxCelsius"=>30));
        $this->action('GET','notificationController@getMinMaxMonitor',null);
        $this->isNull();
    }
    public function testDeleteNotification(){
        $minMaxID = \App\MinMaxMonitor::where("sensor_id","=",6)->where("maxHumidityPercentage","=",20.00)->first()->id;
        $this->action('GET','notificationController@deleteNotification',array('id'=>$minMaxID));
        $this->assertResponseStatus(200);
        $this->notSeeInDatabase("minmaxmonitor",array(
            "sensor_id"=>6,
            "maxHumidityPercentage"=>20.00
        ));
        $this->action('GET','notificationController@deleteNotification',null);
        $this->assertResponseStatus(500);
    }

}