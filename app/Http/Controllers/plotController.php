<?php

namespace App\Http\Controllers;

use App\Plot;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class plotController extends Controller
{
    public function store(Request $request)
    {
        $plot = new Plot();
        $plot->name = $request->input('name');
        $plot->description = $request->input('description');
        $plot->DOB = $request->input('DOB');
        $plot->farm_id = $request->input('farm_id');
        $plot->save();
        return $plot;
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
        $plot = Plot::find($id);//
        return $plot;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $plot= Plot::where('farm_id','like',$id)->get();
        return $plot;////
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $plotUpdate = $request->all();
        $plot = Plot::find($id);//
        $plot->update($plotUpdate);
        return $plot;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Plot::find($id)->delete();
        return $id;
    }
}
