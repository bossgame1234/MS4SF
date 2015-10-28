<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 7/28/2015
 * Time: 12:20 AM
 */

class FarmControllerTest extends TestCase{
    public function testStoreFarm()
    {
        $farm= array(
            'name'=>'test',
            'description'=>'Test farm',
            'address' => 'CAMT',
            'latitude' =>'18.800474',
            'longitude'=> '98.950507'
        );
        $farmController = new \App\Http\Controllers\farmController();
        $request = new Illuminate\Http\Request();
        $request->replace($farm);
        $farmController->store($request);
        $this->seeInDatabase('farm',$farm);
        $farm2 = array();
        $request->replace($farm2);
        $this->assertNull($farmController->store($request));
    }
    public function testShowFarm(){
        $id = \App\Farm::where("name","like","test")->first()->id;
        $farmController = new \App\Http\Controllers\farmController();
        $farm1 = $farmController->show($id);
        $farm2 = \App\Farm::find($id);
        $this->assertEquals($farm1,$farm2);
        $this->assertNull($farmController->show(null));
    }
    public function testUpdateFarm(){
        $farm= array(
            'name'=>'test',
            'description'=>'Test update farm',
            'address' => 'CAMT update',
            'latitude' =>'18.800474',
            'longitude'=> '98.950507'
        );
        $id = \App\Farm::where("name","like"    ,"test")->first()->id;
        $farmController = new \App\Http\Controllers\farmController();
        $request = new Illuminate\Http\Request();
        $request->replace($farm);
        $farmController->update($id,$request);
        $this->seeInDatabase('farm',$farm);
        $this->assertNull($farmController->update(null,$request));
    }
    public function testDestroyFarm(){
        $id = \App\Farm::where("name","like","test")->first()->id;
        $farmController = new \App\Http\Controllers\farmController();
       $request = new \Illuminate\Http\Request();
        $farmController->destroy($id,$request);
        $this->assertNull($farmController->show($id));
        $this->assertNull($farmController->destroy(null,$request));
    }
}