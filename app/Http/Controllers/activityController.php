<?php

namespace App\Http\Controllers;

use App\Farm;
use App\Plot;
use App\User;
use Illuminate\Http\Request;
use App\Activity;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class activityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $activity = Array();
        $farm[] = Farm::with('plot.plant')->find($request->input('farmID'));
        $i = 0;
        foreach($farm as $plot) {
            foreach($plot->plot as $plot) {
                foreach($plot->plant as $plant){
                    if(Activity::with('activityType')->where('plant_id', '=', $plant->id)->first()!=null) {
                        $tempActivity = Activity::with('activityType','plant.plot','user')->where('plant_id', '=', $plant->id)->get()->toArray();
                        foreach($tempActivity as $temp) {
                            $activity[$i] = $temp;
                            $i++;
                        }
                    }
                }
            }
            $i++;
        }
        usort($activity,function ($a, $b){
            $rdiff = strcmp($b['date'], $a['date']);
            if($rdiff) return $rdiff;
            return strcmp($b['time'], $a['time']);
        });
        return $activity;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->input('plant_id')==null){return response()->json("invalid","500");};
            $user = User::where('username', '=', $request->input('username'))->first();
            $activity = new Activity();
            $activity->description = $request->input('description');
            $activity->date = date("Y-m-d", strtotime($request->input('date')));
            $activity->time = $request->input('time');
            $activity->weather = $request->input('weather');
            $activity->plant_id = $request->input('plant_id');
            $typeActivity[] = $request->input('type');
            $activity->save();
            foreach ($typeActivity as $id) {
                if ($id != "0") {
                    $activity->activityType()->attach($id);
                }
            }
            if ($user != null) {
                $activity->user()->attach($user->id);
            }

       return $activity;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $activity = Activity::where("id","=",$id)->with('activityType','plant.plot')->first();//
        return $activity;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if($request->input('date')==""||$request->input('time')==""||$request->input('description')==""){
            return response()->json("input data not enough",500);
        }
        if($id==null){
            return null;
        }
        $activity =  Activity::find($id);
        $activity->description = $request->input('description');
        $activity->date =date("Y-m-d", strtotime($request->input('date')));
        $activity->time =$request->input('time');
        $activity->weather = $request->input('weather');
        $activity->plant_id =$request->input('plant_id');
        $typeActivity[] = $request->input('type');
        $activity->activityType();
        $activity->update();
        $activity->activityType()->detach();
        foreach($typeActivity as $id){
            $activity->activityType()->attach($id);
        }
        return $activity;
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
        $activity = Activity::find($id);
        $activity->activityType()->detach();
        $activity->user()->detach();
        $activity->delete();
        return response("success",200);
    }
}
