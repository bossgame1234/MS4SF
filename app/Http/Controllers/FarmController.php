<?php namespace App\Http\Controllers;
use App\Farm;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexFarmGetRequest; // Request to perform validation
use App\Http\Requests\StoreFarmPostRequest; // Request to perform validatio

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
class FarmController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(IndexFarmGetRequest $req)
	{
		if(!$req->has('sp')){ //skip
          $sp=0;
		} else {
		  $sp = intval($req->input('sp'));
		}

		$response =[
			'sp' => $sp+10,
			'farm' => Farm::orderBy('created_at','desc')->skip($sp)->take(10)->get()
		];

		if(count($response['farm'])>0){
			return response()->json($response,200);
		}else{
			return response()->json($response,402);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreFarmPostRequest $req)
	{
		//
		$farm = Farm::create($req->only('name', 'latitude', 'longitude', 'address', 'description'));
		return response()->json($farm,200);//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$farm = Farm::findOrFail($id);
		return response()->json($farm, 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$farm = Farm::save
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
