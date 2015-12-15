<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {
    protected $baseUrl = 'http://localhost:8000';
	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}
    public function testMockObject()
    {
	if(\App\Farm::where('name','=','TestActivityFarm')->count()==0) {
		$Farm = new \App\Farm();
		$Farm->name = 'TestActivityFarm';
		$Farm->description = 'TestActivityFarm';
		$Farm->address = 'CAMT';
		$Farm->Latitude = 18.800474;
		$Farm->Longitude = 98.950507;
		$Farm->save();
		$Plot = new \App\Plot();
		$Plot->name = 'TestActivityPlot';
		$Plot->farm_id = $Farm->id;
		$Plot->description = 'Test plot';
		$Plot->DOB = '2015-01-01';
		$Plot->save();
		$Plant = new \App\Plant();
		$Plant->name = 'TestActivityPlant';
		$Plant->type = 'Vegetable';
		$Plant->DOB = '2015-01-01';
		$Plant->harvestDay = 30;
		$Plant->plot_id = $Plot->id;
		$Plant->save();
		$User = new \App\User();
		$User->username = 'testAuth';
		$User->password = Hash::make("testAuth");
		$User->name = 'Auth';
		$User->lastname = 'Auth';
		$User->phoneNumber = '054000000';
		$User->email = 'auth@test.com';
		$User->role = 'test';
		$User->save();
		$Device = new \App\SensingDevice();
		$Device->device_id = "test10test";
		$Device->plot_id = $Plot->id;
		$Device->save();
		$Sensor = new \App\Sensor();
		$Sensor->name = "basic package";
		$Sensor->sensingDevice_id = $Device->id;
		$Sensor->save();
		$Task1 = new \App\TaskList();
		$Task1->description = "TestTask";
		$Task1->pictureLocation = "Temp/task.jpg";
		$Task1->status = "Remaining";
		$Task1->date = "2015-12-10";
		$Task1->time = "18:00:00";
		$Task1->plant_id = $Plant->id;
		$Task1->user_id = $User->id;
		$Task1->save();
		$Task1->workerMember()->attach($User->id);
		$Task2 = new \App\TaskList();
		$Task2->description = "TestTask2";
		$Task2->pictureLocation = "Temp/task.jpg";
		$Task2->status = "Late";
		$Task2->date = "2015-12-10";
		$Task2->time = "20:00:00";
		$Task2->plant_id = $Plant->id;
		$Task2->user_id = $User->id;
		$Task2->save();
		$Task2->workerMember()->attach($User->id);
		$MinMaxMonitor = new \App\MinMaxMonitor();
		$MinMaxMonitor->minHumidityPercentage = 10;
		$MinMaxMonitor->maxHumidityPercentage = 30;
		$MinMaxMonitor->minCelsius = 15;
		$MinMaxMonitor->maxCelsius = 30;
		$MinMaxMonitor->minSoilMoisture = 500;
		$MinMaxMonitor->maxSoilMosture = 1024;
		$MinMaxMonitor->minLux = 50;
		$MinMaxMonitor->maxLux = 10000;
		$MinMaxMonitor->sensor_id = $Sensor->id;
		$MinMaxMonitor->plant_id = $Plant->id;
		$MinMaxMonitor->save();
		$MinMaxMonitor->user()->attach($User->id);
	}

    }

}
