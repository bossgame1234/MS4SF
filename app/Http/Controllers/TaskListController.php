<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Farm;
use App\Plant;
use App\TaskList;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $taskCheck = TaskList::all();
        foreach($taskCheck as $task) {
            $date = strtotime($task->date.' '.$task->time);
            $date2 = date("Y-m-d h:i:s");
            $date1 = strtotime($date2);
            if ($date1 > $date) {
                if ($task->status == "Remaining") {
                    $task->status = "Late";
                    $task->update();
                }
            }
        }
        $i=0;
        $onlyTask = array();
        $farmID = $request->input('id');
        $farmList = Farm::with("plot.plant.taskList.workerMember")->where("id","=",$farmID)->get();
        foreach($farmList as $farm){
            foreach($farm->plot as $plot){
                foreach($plot->plant as $plant){
                    foreach($plant->taskList as $task){
                        $date = date("Y-m-d");
                        if(strtotime($task->date)>strtotime($date."- 7 days")){
                            $onlyTask[$i] = $task;
                            $onlyTask[$i]->plantName = $plant->name;
                            $onlyTask[$i]->plotName  = $plot->name;
                            $i++;
                        }
                    }
                }
            }
        }
        return $onlyTask;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('plant_id')==null){return response()->json("invalid","500");};
        $user = User::where('username', '=', $request->input('username'))->first();
        $task = new TaskList();
        $task->description = $request->input('description');
        $task->date = date("Y-m-d", strtotime($request->input('date')));
        $task->time = $request->input('time');
        $task->status = "Remaining";
        $task->user_id = $user->id;
        $task->plant_id = $request->input('plant_id');
        $typeActivity[] = $request->input('type');
        $task->save();
        $worker = $request->input('worker');
        foreach ($worker as $uid) {
            if ($uid != "0") {
                $notificationControl = new notificationController();
                $task->workerMember()->attach($uid);
                $detailPlantPlot = Plant::where("id","=",$task->plant_id)->with("plot")->first();
                $message = "".$user->name." ".$user->surname."has assigned you a task!";
                $notificationControl->sentTaskToFarmWorker($message,$uid);
            }
        }
        foreach ($typeActivity as $id) {
            if ($id != "0") {
                $task->activityType()->attach($id);
            }
        }
        return $task;//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = TaskList::where("id","=",$id)->with('activityType','plant.plot','workerMember')->first();//
        return $task;
    }


    public function getTaskList(Request $request)
    {
        $taskCheck = TaskList::all();
        foreach($taskCheck as $task) {
            $date = strtotime($task->date.' '.$task->time);
            $date2 = date("Y-m-d h:i:s");
            $date1 = strtotime($date2);
            if ($date1 > $date) {
                if ($task->status == "Remaining") {
                    $task->status = "Late";
                    $task->update();
                }
            }
        }
        $userID = $request->input('id');
        $mode = $request->input('mode');
        $taskList = User::with("taskList.plant.plot","taskList.activityType","taskList.ownerTask")->where("id","=",$userID)->get();
        $taskSort = array();
        $i=0;
        foreach($taskList[0]->taskList as $task){
            if(($task->status!="Done"&&$task->status!="Late done")||$mode=="profile"){
                $taskSort[$i] = $task;
            $i++;
            }
        }
        return $taskSort;//
    }

    public function workingStatus(Request $request){
        $status = $request->input('status');
        $taskID = $request->input('id');
        $task =  TaskList::find($taskID);
        if($status=="Remaining"||$status=="Late"){
        $task->status = "Working";
        $task->update();
        }
        if($status=="Working"){
            $date = strtotime($task->date.' '.$task->time);
            $date2 = date("Y-m-d h:i:s");
            $date1 = strtotime($date2);
        if($date<$date1) {
            $task->status = "Late done";
        }else{
            $taskForActivity =  TaskList::where("id","=",$taskID)->with("workerMember","activityType")->first();
            $task->status = "Done";
            $activity  = new activity();
            $activity->description = $taskForActivity->description;
            $activity->date = $taskForActivity->date;
            $activity->time = $taskForActivity->time;
            $activity->weather = "";
            $activity->plant_id = $taskForActivity->plant_id;
            $activity->pictureDist = $taskForActivity->pictureLocation;
            $activity->save();
            foreach($taskForActivity->workerMember as $user){
                $activity->user()->attach($user->id);
            }
            foreach($taskForActivity->activityType as $activityType){
                $activity->activityType()->attach($activityType->id);
            }
            }
            $task->update();
        }
    }
    public function update(Request $request, $id)
    {
        if($request->input('date')==""||$request->input('time')==""||$request->input('description')==""){
            return response()->json("input data not enough",500);
        }
        if($id==null){
            return null;
        }
        $task =  TaskList::find($id);
        $task->description = $request->input('description');
        $task->date =date("Y-m-d", strtotime($request->input('date')));
        $task->time =$request->input('time');
        $task->plant_id =$request->input('plant_id');
        $typeActivity[] = $request->input('type');
        if($request->input('status')!="Working") {
            $task->status = "Remaining";
        }
        $worker[] = $request->input('worker');
        $task->activityType();
        $task->update();
        $task->activityType()->detach();
        $task->workerMember()->detach();
        foreach($typeActivity as $id){
            $task->activityType()->attach($id);
        }
        foreach ($worker as $id) {
            if ($id != "0") {
                $task->workerMember()->attach($id);
            }
        }
        return $task;//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id==null){
            return response("fail",500);
        }
        $taskList = TaskList::find($id);
        $taskList->activityType()->detach();
        $taskList->workerMember()->detach();
        $taskList->delete();
        return response("success",200);
    }
}
