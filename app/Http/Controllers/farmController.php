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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $farm = Request::all();
        Farm::create($farm);
        return $farm;
        ///
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
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
        Farm::find($id)->delete();
        return $id;//
    }
}
