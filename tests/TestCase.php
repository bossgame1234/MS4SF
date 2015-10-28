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
			$User->lastname ='Auth';
			$User->phoneNumber ='054000000';
			$User->email = 'auth@test.com';
			$User->role ='test';
			$User->save();
		}
    }

}
