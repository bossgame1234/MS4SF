<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 12/15/2015
 * Time: 4:27 PM
 */
class TaskControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->action('GET', 'TaskListController@index', array('id' => 332));
        $this->assertResponseStatus(200);
        $this->seeJsonContains(array("description"=>"TestTask2"));
        $this->seeJsonContains(array("description"=>"TestTask"));
        $this->action('GET', 'TaskListController@index',null);
        $this->isNull();
    }
    public function testStore(){
        $Task3 = array(
            "description" =>"TestTask",
            "date"    =>"2015-12-06",
            "time"    =>"22:00:00",
            "plant_id"=>\App\Plant::where("name","=","TestActivityPlant")->first()->id,
            "username"=>"testAuth"
        );
        $this->action('POST','TaskListController@store',$Task3);
        $this->seeInDatabase("tasklist",array(
            "description" =>"TestTask",
            "date"    =>"2015-12-06",
            "time"    =>"22:00:00",
            "plant_id"=>\App\Plant::where("name","=","TestActivityPlant")->first()->id,
            "user_id"=>66
        ));
        $this->action('POST','TaskListController@store',null);
        $this->assertResponseStatus(500);
    }
    public function testShow(){
        $TaskID = \App\TaskList::where("description","=","TestTask")->first()->id;
        $this->action("GET",'TaskListController@show',array("id"=>$TaskID));
        $this->seeJsonContains(array("description"=>"TestTask","pictureLocation"=>"Temp/task.jpg"));
        $this->action("GET",'TaskListController@show',null);
        $this->isNull();
    }
    public function testGetTaskList(){
        $this->action('GET', 'TaskListController@getTaskList', array('id' => 66,'mode'=>'profile'));
        $this->assertResponseStatus(200);
        $this->seeJsonContains(array("description"=>"TestTask2"));
        $this->seeJsonContains(array("description"=>"TestTask"));
        $this->action('GET', 'TaskListController@index',null);
        $this->isNull();
    }
    public function testUpdate(){
        $taskID =  \App\TaskList::where("plant_id","=",\App\Plant::where("name","=","TestActivityPlant")->first()->id)->where("time","=","22:00:00")->first()->id;
        $Task3 = array(
            "id"=>$taskID,
            "description" =>"TestTask",
            "date"    =>"2015-12-06",
            "time"    =>"16:00:00",
            "plant_id"=>\App\Plant::where("name","=","TestActivityPlant")->first()->id,
            "user_id"=>66
        );
        $this->action('PUT', 'TaskListController@update',$Task3);
        $this->seeInDatabase("tasklist",$Task3);
        $this->action('PUT', 'TaskListController@update',null);
        $this->isNull();
    }
    public function testDestroy(){
        $taskID =  \App\TaskList::where("plant_id","=",\App\Plant::where("name","=","TestActivityPlant")->first()->id)->where("time","=","16:00:00")->first()->id;
        $Task3 = array(
            "id"=>$taskID,
            "description" =>"TestTask",
            "date"    =>"2015-12-06",
            "time"    =>"16:00:00",
            "plant_id"=>\App\Plant::where("name","=","TestActivityPlant")->first()->id,
            "user_id"=>66
        );
        $this->action('DELETE', 'TaskListController@destroy',array("id"=>$taskID));
        $this->notSeeInDatabase("tasklist",$Task3);
        $this->action('DElETE', 'TaskListController@destroy',null);
        $this->assertResponseStatus(405);
    }
}