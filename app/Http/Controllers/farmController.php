<?php namespace App\Http\Controllers;
use App\Farm;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class farmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $farm = User::where("username","=",$request->input('username'))->first()->farm()->get()->toJson();
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
        $owner = $request->input('username');
        $farm = new Farm();
        $farm->name = $request->input('name');
        $farm->description = $request->input('description');
        $farm->address = $request->input('address');
        $farm->latitude = $request->input('latitude');
        $farm->longitude = $request->input('longitude');
        $farm->save();
        $user = User::where("username","=",$owner)->first();
        if($user!=null) {
            $user->farm()->attach($farm->id);
        }
        return $farm;
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
        $farm->update($farmUpdate);
        return $farm;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $username = $request->input('username');
        if($id==null){
            return null;
        }
        Farm::find($id)->delete();
        if($username!=null) {
            $user = User::where("username", "=", $username)->first();
            $user->farm()->detach($id);
        }
        return $id;
    }
}
