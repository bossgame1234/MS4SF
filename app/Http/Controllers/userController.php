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
}

