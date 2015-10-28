<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 7/28/2015
 * Time: 12:20 AM
 */

class PlotControllerTest extends TestCase{
    public function testStorePlot()
    {
        $id = \App\Farm::where("name","like","TestActivityFarm")->first()->id;
        $plot= array(
            'name'=>'test',
            'description'=>'Test plot',
            'DOB'=>'2015-07-29',
            'farm_id'=> $id
        );
        $plotController = new \App\Http\Controllers\plotController();
        $request = new \Illuminate\Http\Request();
        $request->replace($plot);
        $plotController->store($request);
        $this->seeInDatabase('plot',$plot);
        $plot2 = array();
        $request->replace($plot2);
         $this->assertNull($plotController->store($request));
    }
    public function testShowPlot(){
        $id = \App\Plot::where("name","like","test")->first()->id;
        $plotController = new \App\Http\Controllers\plotController();
        $plot1 = $plotController->show($id);
        $plot2 = \App\Plot::find($id);
        $this->assertEquals($plot1,$plot2);
        $this->assertNull($plotController->show(null));
    }
    public function testUpdatePlot(){
        $id = \App\Plot::where('name','like','test')->first()->id;
        $farmId = \App\Farm::where("name","like","TestActivityFarm")->first()->id;
        $plot= array(
            'name'=>'Test',
            'DOB'=>'2015-07-30',
            'description'=>'Test plot 2',
            'farm_id'=>$farmId
        );
        $plotController = new \App\Http\Controllers\plotController();
        $request = new \Illuminate\Http\Request();
        $request->replace($plot);
        $plotController->update($id,$request);
        $this->seeInDatabase('plot',$plot);
    }
    public function testDestroyPlot(){
        $id = \App\Plot::where('name','like','Test')->first()->id;
        $plotController = new \App\Http\Controllers\plotController();
        $plotController->destroy($id);
        $this->assertNull($plotController->show($id));
        $this->assertNull($plotController->destroy(null));
    }
}