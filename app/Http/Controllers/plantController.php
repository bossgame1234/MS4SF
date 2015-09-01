<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class plantController extends Controller
{
    public function store(Request $request)
    {
        $plant = new Plant();
        $plant->name = $request->input('name');
        $plant->type = $request->input('type');
        $plant->DOB = $request->input('DOB');
        $plant->harvestDay = $request->input('harvestDay');
        $plant->plot_id = $request->input('plot_id');
        $plant->save();
        return $plant;
        ///
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $plant = Plant::find($id);//
        return $plant;
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

