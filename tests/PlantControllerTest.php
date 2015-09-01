<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 7/28/2015
 * Time: 12:20 AM
 */

class PlantControllerTest extends TestCase{
 public function testStorePlant()
    {
        $id = \App\Plot::where("name","like","Test plot 0")->first()->id;
        $plant= array(
            'name'=>'Test plant',
            'type'=>'Test',
            'DOB'=>'2015-07-27',
            'harvestDay'=>30,
            'plot_id'=>$id
        );
        $plantController = new \App\Http\Controllers\plantController();
        $request = new \Illuminate\Http\Request();
        $request->replace($plant);
        $plantController->store($request);
        $this->seeInDatabase('plant',$plant);
        $plant2= array();
        $request->replace($plant2);
        $this->assertNull($plantController->show(null));
    }
    public function testShowPlant(){
        $plantController = new \App\Http\Controllers\plantController();
        $id = \App\Plant::where("name","like",'Test plant')->first()->id;
        $plant1 = $plantController->show($id);
        $plant2 = \App\Plant::find($id);
        $this->assertEquals($plant1,$plant2);
        $this->assertNull($plantController->show(null));
    }
    public function testUpdatePlant(){
        $id = \App\Plot::where("name","like","Plot test 0")->first()->id;
        $plant= array(
            'name'=>'Test plant',
            'DOB'=>'2015-07-28',
            'harvestDay'=>50,
            'type'=>'Test2',
            'plot_id'=>$id
        );
        $plantId =  \App\Plant::where("name","like","Test plant")->first()->id;
        $plantController = new \App\Http\Controllers\plantController();
        $request = new \Illuminate\Http\Request();
        $request->replace($plant);
        $plantController->update($plantId,$request);
        $this->seeInDatabase('plant',$plant);
        $this->assertNull($plantController->update(null,$request));
    }
    public function testDestroyPlant(){
        $id = \App\Plant::where("name","like","Test plant2")->first()->id;
        $plantController =new \App\Http\Controllers\plantController();
        $plantController->destroy($id);
        $this->assertNull($plantController->show($id));
        $this->assertNull($plantController->destroy(null));
    }
}