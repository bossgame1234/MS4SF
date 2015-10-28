<?php
use App\activity;

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/20/2015
 * Time: 7:31 PM
 */
class ActivityControllerTest extends TestCase{
    public function testIndex()
    {

        $Activity1 = new \App\activity();
        $Activity1->description ='Test';
        $Activity1->date ='2015-10-05';
        $Activity1->time ='00:00:00';
        $Activity1->plant_id =\App\Plant::where("name", "=", "TestActivityPlant")->first()->id;
        $Activity1->weather= 'few cloud';

        $Activity2 = new \App\activity();
        $Activity2->description ='Test2';
        $Activity2->date ='2015-10-05';
        $Activity2->time ='00:00:00';
        $Activity2->plant_id =\App\Plant::where("name", "=", "TestActivityPlant")->first()->id;
        $Activity2->weather= 'rain';

        if(Activity::where("plant_id","=",\App\Plant::where("name","=","TestActivityPlant")->first()->id)->count()<=2) {
            $Activity1->save();
            $Activity2->save();
        }
        $Activity1->toArray();
        $ActivityController = new \App\Http\Controllers\activityController();
        $farmID = array(
            'farmID' => \App\Farm::where("name","=","TestActivityFarm")->first()->id
        );
        $request = new \Illuminate\Http\Request();
        $request->replace($farmID);
        $test = $ActivityController->index($request);
        print_r ($test[0]==$Activity2);
        $this->assertEquals($test[0], $Activity2->toArray());
        $this->assertEquals($test[1], $Activity1->toArray());
        $request->replace(null);
        $test2 = $ActivityController->index($request);
        $this->assertEquals(null,$test2);
    }
    public function testStore(){
        $Activity3 = array(
            "description" => "Test store activity",
            "date" =>"2015-10-5",
            "time" => "00:00:00" ,
            "plant_id" =>\App\Plant::where("name", "=", "TestActivityPlant")->first()->id,
            "weather" =>"cloud"
        );
        $request = new \Illuminate\Http\Request();
        $request->replace($Activity3);
        $ActivityController = new \App\Http\Controllers\activityController();
        $ActivityController->store($request);
        $this->seeInDatabase("activity",$Activity3);
        $ActivityBlank = array();
        $request->replace($ActivityBlank);
        $ActivityController->store($request);
        $this->action('POST','activityController@store',array());
        $this->assertResponseStatus(500);
    }
    public function testUpdate(){
        $Activity3 = array(
            "description" => "Test store activity updated",
            "date" =>"2015-10-5",
            "time" => "23:00:00" ,
            "plant_id" =>\App\Plant::where("name", "=", "TestActivityPlant")->first()->id,
            "weather" =>"fews cloud"
        );
        $ActivityController = new \App\Http\Controllers\activityController();
        $request = new \Illuminate\Http\Request();
        $request->replace($Activity3);
        $ActivityController->update($request,activity::where("description","=","Test store activity")->first()->id);
        $this->seeInDatabase("activity",$Activity3);
        $this->assertNull($ActivityController->update($request,null));

    }
    public function testDestroy(){
        $Activity3 = array(
            "description" => "Test store activity updated",
            "date" =>"2015-10-5",
            "time" => "23:00:00" ,
            "plant_id" =>\App\Plant::where("name", "=", "TestActivityPlant")->first()->id,
            "weather" =>"fews cloud"
        );
        $ActivityController = new \App\Http\Controllers\activityController();
        $ActivityController->destroy(activity::where("description","=","Test store activity updated")->first()->id);
        $this->notSeeInDatabase("activity",$Activity3);
        $this->assertNull($ActivityController->destroy(null));
    }
}