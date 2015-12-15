<?php
use App\Http\Controllers\notificationController;
use App\MinMaxMonitor;
use App\SensingDevice;
use App\Sensor;
use Illuminate\Http\Request;
use App\Temperature;
use App\SoilMoisture;
use App\Humidity;
use App\Light;
use App\WeeklyHistory;
use App\Daily;
use App\Weekly;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function(){return view('app.index');});
Route::group(['middleware' => 'cors','prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::post('user','userController@register');
    Route::get('user','userController@getMemberListInFarm');
    Route::get('user/member','userController@getMemberProfile');
    Route::put('user','userController@updateProfile');
});
Route::group(['middleware' => 'cors'], function() {
    Route::get('notification', 'notificationController@getNotificationOverall');
    Route::get('changeNotice', 'notificationController@changeNotificationStatus');
    Route::get('changeTaskNotice', 'notificationController@changeNotificationTaskStatus');
    Route::get('getTaskNotice', 'notificationController@getNotificationTaskStatus');
    Route::get('deleteNotice', 'notificationController@deleteNotification');
    Route::get('allMember', 'userController@getAllMember');
    Route::get('taskList', 'TaskListController@getTaskList');
    Route::get('top3', 'userController@getTop3Farm');
    Route::post('status', 'TaskListController@workingStatus');
    Route::get('device/destroy/{id}', 'sensingDeviceController@removePlotFromDevice');
    Route::get('lightSummary/{id}', 'dailyController@getLightDailySummary');
    Route::get('humiditySummary/{id}', 'dailyController@getHumidityDailySummary');
    Route::get('soilMoistureSummary/{id}', 'dailyController@getSoilMoistureDailySummary');
    Route::get('temperatureSummary/{id}', 'dailyController@getTemperatureDailySummary');
    Route::get('lightWeeklySummary/{id}', 'weeklyController@getLightWeeklySummary');
    Route::get('humidityWeeklySummary/{id}', 'weeklyController@getHumidityWeeklySummary');
    Route::get('soilMoistureWeeklySummary/{id}', 'weeklyController@getSoilMoistureWeeklySummary');
    Route::get('temperatureWeeklySummary/{id}', 'weeklyController@getTemperatureWeeklySummary');
    Route::get('currentEnvironmentValue/{id}', 'sensorController@getCurrentEnvironmentValue');
    Route::get('note','notificationController@sentMonitorNotification');
    Route::get('notificationMonitor/{id}','notificationController@getMinMaxMonitor');
    Route::post('updateNotificationMonitor','notificationController@setMinMaxMonitor');
//not yet
    Route::post('uploadPicture', 'FileUploadController@upload');

//farm CRUD route
    Route::resource('task', 'TaskListController');
    Route::resource('activity', 'activityController');
    Route::resource('farm', 'farmController');
    Route::resource('plot', 'plotController');
    Route::resource('plant', 'plantController');
    Route::resource('device', 'sensingDeviceController');
    Route::resource('sensor', 'sensorController');
    Route::resource('daily', 'dailyController');
    Route::resource('weekly', 'weeklyController');
});
//Link SEND farm data
Route::get('sensingResister/{device_id}/{temperature}/{soilmoisture}/{light}/{humidity}',function($id,$temp,$soil,$lux,$humid){
    $DeviceBaseId = DB::table('sensingdevice')->where('device_id', $id)->value('id');
    $SensorPrimaryKey = DB::table('sensor')->where('sensingDevice_id',$DeviceBaseId)->value('id');
    $checkHourly = Light::where('sensor_id','=',$SensorPrimaryKey)->count();
    $Sensor = Sensor::find($SensorPrimaryKey);
    $notificationController = new notificationController();
    $device = \App\SensingDevice::where("device_id","=",$id)->first();
    $sensor  = \App\Sensor::where("sensingDevice_id","=",$device->id)->first();
    $notificationCheck= MinMaxMonitor::where("sensor_id","=",$sensor->id)->first();
    if($notificationCheck!=null) {
            if ($notificationCheck->minHumidityPercentage != 0 && $notificationCheck->minHumidityPercentage > $humid) {
                $notificationController->sentMonitorNotification("Alert!! : " . $id . " reach minimum humidity <" . $notificationCheck->minHumidityPercentage . " %", $id);
            }
            if ($notificationCheck->maxHumidityPercentage != 0 && $notificationCheck->maxHumidityPercentage < $humid) {
                $notificationController->sentMonitorNotification("Alert!! : " . $id . " reach maximum humidity >" . $notificationCheck->maxHumidityPercentage . " %", $id);
            }
            if ($notificationCheck->minCelsius != 0 && $notificationCheck->minCelsius > $temp) {
                $notificationController->sentMonitorNotification("Alert!! : " . $id . " reach minimum temperature <" . $notificationCheck->minCelsius . " celsius", $id);
            }
            if ($notificationCheck->maxCelsius != 0 && $notificationCheck->maxCelsius < $temp) {
                $notificationController->sentMonitorNotification("Alert!! : " . $id . " reach minimum temperature >" . $notificationCheck->maxCelsius . " celsius", $id);
            }
            if ($notificationCheck->minSoilMoisture != 0 && $notificationCheck->minSoilMoisture > $soil) {
                $notificationController->sentMonitorNotification("Alert!! : " . $id . " reach minimum soil moisture <" . $notificationCheck->minSoilMoisture, $id);
            }
            if ($notificationCheck->maxSoilMoisture != 0 && $notificationCheck->maxSoilMoisture < $soil) {
                $notificationController->sentMonitorNotification("Alert!! : " . $id . " reach maximum soil moisture >" . $notificationCheck->maxSoilMoisture, $id);
            }
            if ($notificationCheck->minLux != 0 && $notificationCheck->minLux > $humid) {
                $notificationController->sentMonitorNotification("Alert!! : " . $id . " reach minimum light <" . $notificationCheck->minLux . " lux", $id);
            }
            if ($notificationCheck->maxLux != 0 && $notificationCheck->maxLux < $humid) {
                $notificationController->sentMonitorNotification("Alert!! : " . $id . " reach maximum light >" . $notificationCheck->maxLux . " lux", $id);
            }
    }
    if($checkHourly==6) {
        $lightMin = Light::where('sensor_id','=',$SensorPrimaryKey)->min('luxValue');
        $lightAverage = Light::where('sensor_id','=',$SensorPrimaryKey)->avg('luxValue');
        $lightMax = Light::where('sensor_id','=',$SensorPrimaryKey)->max('luxValue');
        Light::where('sensor_id','like',$SensorPrimaryKey)->delete();

        $temperatureMin = Temperature::where('sensor_id','=',$SensorPrimaryKey)->min('celsiusValue');
        $temperatureAverage = Temperature::where('sensor_id','=',$SensorPrimaryKey)->avg('celsiusValue');
        $temperatureMax = Temperature::where('sensor_id','=',$SensorPrimaryKey)->max('celsiusValue');
        Temperature::where('sensor_id','like',$SensorPrimaryKey)->delete();

        $humidityMin = Humidity::where('sensor_id','=',$SensorPrimaryKey)->min('humidityPercentage');
        $humidityAverage = Humidity::where('sensor_id','=',$SensorPrimaryKey)->avg('humidityPercentage');
        $humidityMax = Humidity::where('sensor_id','=',$SensorPrimaryKey)->max('humidityPercentage');
        Humidity::where('sensor_id','like',$SensorPrimaryKey)->delete();

        $soilMoistureMin = SoilMoisture::where('sensor_id','=',$SensorPrimaryKey)->min('soilValue');
        $soilMoistureAverage = SoilMoisture::where('sensor_id','=',$SensorPrimaryKey)->avg('soilValue');
        $soilMoistureMax = SoilMoisture::where('sensor_id','=',$SensorPrimaryKey)->max('soilValue');
        SoilMoisture::where('sensor_id','like',$SensorPrimaryKey)->delete();

        $daily = new Daily();
        $daily->minLight = $lightMin;
        $daily->avgLight = $lightAverage;
        $daily->maxLight = $lightMax;

        $daily->minTemperature = $temperatureMin;
        $daily->avgTemperature = $temperatureAverage;
        $daily->maxTemperature = $temperatureMax;

        $daily->minAirHumidity = $humidityMin;
        $daily->avgAirHumidity = $humidityAverage;
        $daily->maxAirHumidity = $humidityMax;

        $daily->minSoilMoisture = $soilMoistureMin;
        $daily->avgSoilMoisture = $soilMoistureAverage;
        $daily->maxSoilMoisture = $soilMoistureMax;
        $Sensor->daily()->save($daily);

        $checkDaily = Daily::where('sensor_id','=',$SensorPrimaryKey)->count();
        if($checkDaily==24){
            $lightDailyMin = Daily::where('sensor_id','=',$SensorPrimaryKey)->min('minLight');
            $lightDailyAverage = Daily::where('sensor_id','=',$SensorPrimaryKey)->avg('avgLight');
            $lightDailyMax = Daily::where('sensor_id','=',$SensorPrimaryKey)->max('maxLight');

            $temperatureDailyMin = Daily::where('sensor_id','=',$SensorPrimaryKey)->min('minTemperature');
            $temperatureDailyAverage = Daily::where('sensor_id','=',$SensorPrimaryKey)->avg('avgTemperature');
            $temperatureDailyMax = Daily::where('sensor_id','=',$SensorPrimaryKey)->max('maxTemperature');

            $humidityDailyMin = Daily::where('sensor_id','=',$SensorPrimaryKey)->min('minAirHumidity');
            $humidityDailyAverage = Daily::where('sensor_id','=',$SensorPrimaryKey)->avg('avgAirHumidity');
            $humidityDailyMax = Daily::where('sensor_id','=',$SensorPrimaryKey)->max('maxAirHumidity');

            $soilMoistureDailyMin = Daily::where('sensor_id','=',$SensorPrimaryKey)->min('minSoilMoisture');
            $soilMoistureDailyAverage = Daily::where('sensor_id','=',$SensorPrimaryKey)->avg('avgSoilMoisture');
            $soilMoistureDailyMax = Daily::where('sensor_id','=',$SensorPrimaryKey)->max('maxSoilMoisture');

            $weekly = new Weekly();
            $weekly->minLight = $lightDailyMin;
            $weekly->avgLight = $lightDailyAverage;
            $weekly->maxLight = $lightDailyMax;

            $weekly->minTemperature = $temperatureDailyMin;
            $weekly->avgTemperature = $temperatureDailyAverage;
            $weekly->maxTemperature = $temperatureDailyMax;

            $weekly->minAirHumidity = $humidityDailyMin;
            $weekly->avgAirHumidity = $humidityDailyAverage;
            $weekly->maxAirHumidity = $humidityDailyMax;

            $weekly->minSoilMoisture = $soilMoistureDailyMin;
            $weekly->avgSoilMoisture = $soilMoistureDailyAverage;
            $weekly->maxSoilMoisture = $soilMoistureDailyMax;
            $Sensor->weekly()->save($weekly);
            Daily::where('sensor_id','like',$SensorPrimaryKey)->delete();

            $checkWeekly = Weekly::where('sensor_id','=',$SensorPrimaryKey)->count();
            if($checkWeekly==7){
                $lightWeeklyMin = Weekly::where('sensor_id','=',$SensorPrimaryKey)->min('minLight');
                $lightWeeklyAverage = Weekly::where('sensor_id','=',$SensorPrimaryKey)->avg('avgLight');
                $lightWeeklyMax = Weekly::where('sensor_id','=',$SensorPrimaryKey)->max('maxLight');

                $temperatureWeeklyMin = Weekly::where('sensor_id','=',$SensorPrimaryKey)->min('minTemperature');
                $temperatureWeeklyAverage = Weekly::where('sensor_id','=',$SensorPrimaryKey)->avg('avgTemperature');
                $temperatureWeeklyMax = Weekly::where('sensor_id','=',$SensorPrimaryKey)->max('maxTemperature');

                $humidityWeeklyMin = Weekly::where('sensor_id','=',$SensorPrimaryKey)->min('minAirHumidity');
                $humidityWeeklyAverage = Weekly::where('sensor_id','=',$SensorPrimaryKey)->avg('avgAirHumidity');
                $humidityWeeklyMax = Weekly::where('sensor_id','=',$SensorPrimaryKey)->max('maxAirHumidity');

                $soilMoistureWeeklyMin = Weekly::where('sensor_id','=',$SensorPrimaryKey)->min('minSoilMoisture');
                $soilMoistureWeeklyAverage = Weekly::where('sensor_id','=',$SensorPrimaryKey)->avg('avgSoilMoisture');
                $soilMoistureWeeklyMax = Weekly::where('sensor_id','=',$SensorPrimaryKey)->max('maxSoilMoisture');

                $weeklyHistory = new WeeklyHistory();
                $weeklyHistory->minLight = $lightWeeklyMin;
                $weeklyHistory->avgLight = $lightWeeklyAverage;
                $weeklyHistory->maxLight = $lightWeeklyMax;

                $weeklyHistory->minTemperature = $temperatureWeeklyMin;
                $weeklyHistory->avgTemperature = $temperatureWeeklyAverage;
                $weeklyHistory->maxTemperature = $temperatureWeeklyMax;

                $weeklyHistory->minAirHumidity = $humidityWeeklyMin;
                $weeklyHistory->avgAirHumidity = $humidityWeeklyAverage;
                $weeklyHistory->maxAirHumidity = $humidityWeeklyMax;

                $weeklyHistory->minSoilMoisture = $soilMoistureWeeklyMin;
                $weeklyHistory->avgSoilMoisture = $soilMoistureWeeklyAverage;
                $weeklyHistory->maxSoilMoisture = $soilMoistureWeeklyMax;
                $Sensor->weeklyHistory()->save($weeklyHistory);
                Weekly::where('sensor_id','like',$SensorPrimaryKey)->delete();
            }
        }
    }
    $temperature = new Temperature();
    $soilMoisture= new SoilMoisture();
    $light = new Light();
    $humidity = new Humidity();
    $temperature->celsiusValue = $temp;
    $soilMoisture->soilValue = $soil;
    $light->luxValue = $lux;
    $humidity->humidityPercentage = $humid;
    $Sensor->temperature()->save($temperature);
    $Sensor->soilMoisture()->save($soilMoisture);
    $Sensor->light()->save($light);
    $Sensor->humidity()->save($humidity);
});
//add sensor to sensingDevice
Route::get('device/access/{id}',function($id){
    $DeviceBaseId = DB::table('sensingdevice')->where('device_id', $id)->value('id');
    $deviceA = new Sensor();
    $deviceA->sensingDevice_id = $DeviceBaseId;
    $deviceA->name = "basic package";
    $deviceA->save();
});
Route::get('test',function(){
    echo url();
});
//delete sensor