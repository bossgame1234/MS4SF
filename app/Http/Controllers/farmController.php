<?php namespace App\Http\Controllers;
use App\Farm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class farmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $farm = Farm::all();
        return $farm;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->input('name')==null){
            return null;
        }
        $farm = new Farm();
        $farm->name = $request->input('name');
        $farm->description = $request->input('description');
        $farm->address = $request->input('address');
        $farm->latitude = $request->input('latitude');
        $farm->longitude = $request->input('longitude');
        $farm->save();
        return $farm;
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
        $farm = Farm::find($id);//
        return $farm;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       $farm =Farm::find($id);
        return $farm;
        /////
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        if($id==null||$request==null){
            return null;
        }
        $farmUpdate = $request->all();
        $farm=Farm::find($id);
        $farm->update($farmUpdate); //
        return $farm;
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
        Farm::find($id)->delete();
        return $id;//
    }
}
