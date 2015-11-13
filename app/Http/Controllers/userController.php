<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/10/2015
 * Time: 6:20 PM
 */

namespace App\Http\Controllers;

use App\Farm;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function register(Request $request)
    {
        $farmChecking = $request->input("farmID");
        $usernameCheck = $request->input("username");
        $user = new User();
        if (User::where("username", "=", $usernameCheck)->count() == 0){
            $user->name= $request->input("name");
            $user->lastname = $request->input("lastname");
            $user->username = $request->input("username");
            $user->password =  Hash::make($request->input("password"));
            $user->email = $request->input("email");
            $user->role = $request->input("role");
            $user->phoneNumber =$request->input("phoneNumber");

             if ($farmChecking!=0||$farmChecking!=null) {
                 $farmID = ($farmChecking-320001)/100;
                 if(Farm::find($farmID)!=null){
                    $farm = Farm::find($farmID);
                     $user->save();
                    $user->farm()->save($farm);
                }
                else{
                    return response()->json(['error' => 'Wrong Farm ID'], 501);
                }
             }else {
                 $user->save();
             }
         } else {
             return response()->json(['error' => 'duplicate username'], 502);
         }
            return $user::where("username","=",$user->username)->first();
    }
    public function getMemberProfile(Request $request){
       $userID = $request->input("id");
       $username =$request->input("username");
        if($userID!=null) {
            $user = User::where("id","=",$userID)->with("activity","activity.plant","activity.activityType")->first();
        }else{
            $user =User::where("username","=",$username)->first();
        }
        return $user;
    }
    public function getAllMember(Request $request){
        $farmID = $request->input("id");
        $users = Farm::find($farmID)->users()->get()->toJson();
        return $users;
    }
    public function updateProfile(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $user->name= $request->input("name");
        $user->lastname = $request->input("lastname");
        $user->username = $request->input("username");
        if($request->input("password")!='') {
            $user->password = Hash::make($request->input("password"));
        }
        $user->email = $request->input("email");
        $user->role = $request->input("role");
        $user->phoneNumber =$request->input("phoneNumber");
        $user->update();
        return $user;
    }
    public function getTop3Farm(Request $request)
    {
        $farmID = $request->input('id');
        $farm = Farm::where("id","=",$farmID)->with("plot.plant.taskList.workerMember")->first();
        $taskUse = array();
        $i = 0;
        foreach($farm->plot as $plot){
            foreach($plot->plant as $plant){
                foreach($plant->taskList as $task){
                    if($task->status=="Done") {
                        foreach($task->workerMember as $worker){
                        $taskUse[$i] = $worker;
                            $i++;
                        }
                    }
                }
            }
        }
        $member = array();
        $k=0;
        $defaultID=0;
        $count=0;
        for($j=0;$j<sizeof($taskUse);$j++){
                        $member[$k] = $taskUse[$j];
                        $k++;
            }
        usort($member,function ($a, $b){
            return strcmp($b['id'], $a['id']);
        });
        $l=0;
        $memberResult = array();
        for($j=0;$j<sizeof($member);$j++){
            if($j==0){
                $memberResult[$l]=$member[$j];
                $memberResult[$l]->count=0;
                $defaultID=$member[$j]->id;
            }else
            if($member[$j]->id!=$defaultID)
            {
                $memberResult[$l]->count=$count;
                $l++;
                $memberResult[$l]=$member[$j];
                $defaultID=$member[$j]->id;
                $count=0;
            }
            if($j==sizeof($member)-1){
                $count++;
                $memberResult[$l]->count=$count;
            }
            $count++;
        }
        usort($memberResult,function ($a, $b){
            return strcmp($b['count'], $a['count']);
        });
        $output = array_slice($memberResult, 0, 3);
        return $output;
    }
}

