/**
 * Created by USER on 7/15/2015.
 */
'use strict';

var deviceMainController = angular.module('deviceMainController',['deviceServices']);
deviceMainController.controller('listDeviceController', ['$scope', '$http','$route', '$routeParams', '$location', '$rootScope','deviceService',
    function ($scope, $http,$route, $routeParams, $location, $rootScope,deviceService) {
        $http.get("device").success(function (data) {
            $scope.devices = data;
        });
        $scope.newDevice ={device_id:''};
        $scope.genCode = function(){
            var s = [];
            var hexDigits = "0123456789abcdef";
            for (var i = 0; i < 10; i++) {
                s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
            }
            var uuid = s.join("");
            $scope.newDevice.device_id = uuid;
        };
        $scope.deleteDevice = function(id){
            var answer = confirm("Do you want to delete the sensingDevice?");
            if (answer) {
                deviceService.delete({id:id},function(){
                    $route.reload();
                },function(error) {
                    alert("There is a problem! Your request has not been fulfilled, please try again");
                });

            }};
        $scope.addDevice = function() {
            deviceService.save($scope.newDevice, function (data) {
                    $http.get("device/access/"+$scope.newDevice.device_id).success(function (data) {
                        $route.reload();
                    }, function (error) {
                        alert("There is a problem! Your request has not been fulfilled, please try again");
                    });
                }
            , function (error) {
                alert("Error duplicate device id ,Generate code again");
            });
        }
    }]);
deviceMainController.controller('PlotWithDeviceController',['$scope','$routeParams','$route','$http','$location', '$rootScope','deviceService',
    function ($scope,$routeParams,$route, $http,$location, $rootScope,deviceService) {
        $http.get("device/"+$scope.plotId+"/edit").success(function (data) {
            $scope.devices = data;
        });
        $scope.deviceP ={device_id:''};
        $scope.deleteDevice = function(id){
            var answer = confirm("Do you want to delete the sensingDevice from plot?");
            if (answer) {
                $http.get("device/destroy/"+id).success(function () {
                    $route.reload();
                }).
                    error(function() {
                        alert("There is a problem! Your request has not been fulfilled, please try again");
                    });
            }};
        $scope.addDevice = function() {
            deviceService.update({id:$scope.deviceP.device_id},{plot_id:$rootScope.plotId}, function () {
                    $route.reload();
                }
                , function (error) {
                    alert("Not found device id in the base system");
                });
        }
    }]);
deviceMainController.controller('sensorMonitoringSummaryController',['$scope','$routeParams','$route','$http','$location', '$rootScope',
    function ($scope,$routeParams,$route, $http,$location, $rootScope) {
    var id =$routeParams.id;
        $rootScope.deviceId = id;
        $rootScope.deviceSummary = true;
        $scope.daily=true;
        $scope.weekly=false;
        $scope.showLight = function(){
            $scope.title = "Light sensor";
            $scope.measure = "Lux .";
            $scope.lightGraph = true;
            $scope.humidityGraph = false;
            $scope.soilMoistureGraph = false;
            $scope.temperatureGraph = false;
            $scope.description = "max light";
            $scope.description2 = "average light";
            $scope.description3 = "min light";

           $scope.showGraph();
        };
        $scope.showHumidity = function(){
            $scope.title = "Humidity sensor";
            $scope.measure = " %";
            $scope.lightGraph = false;
            $scope.humidityGraph = true;
            $scope.soilMoistureGraph = false;
            $scope.temperatureGraph = false;
            $scope.description = "max air humidity";
            $scope.description2 = "average air humidity";
            $scope.description3 = "min air humidity";

            $scope.showGraph();
        };
        $scope.showTemperature = function(){
            $scope.title = "Temperature sensor";
            $scope.measure = " celsius";
            $scope.lightGraph = false;
            $scope.humidityGraph = false;
            $scope.soilMoistureGraph = false;
            $scope.temperatureGraph = true;
            $scope.description = "max temperature";
            $scope.description2 = "average temperature";
            $scope.description3 = "min temperature";
            $scope.showGraph();
        };
        $scope.showSoilMoisture = function(){
            $scope.title = "Soil moisture sensor";
            $scope.measure = " ";
            $scope.lightGraph = false;
            $scope.humidityGraph = false;
            $scope.soilMoistureGraph = true;
            $scope.temperatureGraph = false;
            $scope.description = "max soil moisture";
            $scope.description2 = "average soil moisture";
            $scope.description3 = "min soil moisture";
            $scope.showGraph();
        };
    $http.get("sensor/"+id).success(function(data){
        $scope.SensorID = data.id;
        $rootScope.showSensor = true;
        $http.get("lightSummary/"+$scope.SensorID).success(function(data){
            $scope.light = data;
        });
        $http.get("humiditySummary/"+$scope.SensorID).success(function(data){
            $scope.humidity = data;
        });
        $http.get("soilMoistureSummary/"+$scope.SensorID).success(function(data){
            $scope.soilMoisture = data;
        });
        $http.get("temperatureSummary/"+$scope.SensorID).success(function(data){
            $scope.temperature = data;
        });
        $http.get("daily/"+$scope.SensorID).success(function(data){
            $scope.hours = data;
        });
        $http.get("currentEnvironmentValue/"+$scope.SensorID).success(function(data){
            $scope.current = data;
        });
    });
        $scope.showGraph =function() {
            $scope.rows = new Array();
            var xValues = new Array(); // date data points
            var avgValues = new Array(); // current values
            var desAvgValues = new Array(); // current description
            var minValues = new Array();
            var maxValues = new Array();
            var desMinValue = new Array();
            var desMaxValue = new Array();

            for (var i = 0; i < $scope.hours.length; i++) {
                xValues[i] = $scope.hours[i].created_at;
                if ($scope.lightGraph) {
                    avgValues[i] = $scope.hours[i].avgLight;
                    desAvgValues[i] = $scope.hours[i].avgLight + " lux";
                    minValues[i] = $scope.hours[i].minLight;
                    desMinValue[i] = $scope.hours[i].minLight + " lux";
                    maxValues[i] = $scope.hours[i].maxLight;
                    desMaxValue[i] = $scope.hours[i].maxLight + " lux";
                }
                if ($scope.humidityGraph) {
                    avgValues[i] = $scope.hours[i].avgAirHumidity;
                    desAvgValues[i] = $scope.hours[i].avgAirHumidity + " %";
                    minValues[i] = $scope.hours[i].minAirHumidity;
                    desMinValue[i] = $scope.hours[i].minAirHumidity + " %";
                    maxValues[i] = $scope.hours[i].maxAirHumidity;
                    desMaxValue[i] = $scope.hours[i].maxAirHumidity + " %";
                }
                if ($scope.temperatureGraph) {
                    avgValues[i] = $scope.hours[i].avgTemperature;
                    desAvgValues[i] = $scope.hours[i].avgTemperature + " celsius";
                    minValues[i] = $scope.hours[i].minTemperature;
                    desMinValue[i] = $scope.hours[i].minTemperature + " celsius";
                    maxValues[i] = $scope.hours[i].maxTemperature;
                    desMaxValue[i] = $scope.hours[i].maxTemperature + " celsius";
                }
                if ($scope.soilMoistureGraph) {
                    avgValues[i] = $scope.hours[i].avgSoilMoisture;
                    desAvgValues[i] = $scope.hours[i].avgSoilMoisture + ".";
                    minValues[i] = $scope.hours[i].minSoilMoisture;
                    desMinValue[i] = $scope.hours[i].minSoilMoisture + ".";
                    maxValues[i] = $scope.hours[i].maxSoilMoisture;
                    desMaxValue[i] = $scope.hours[i].maxSoilMoisture + ".";
                }
            }
            for (var j = 0; j < 24; j++) {
                if(j<$scope.hours.length) {
                    $scope.rows[j] = {c: [{v: xValues[j].substr(10, 20)},{v: maxValues[j], f: desMaxValue[j]} ,{v: avgValues[j], f: desAvgValues[j]} , {v: minValues[j], f: desMinValue[j]}]};
                    if(j==0) {
                        $scope.date = xValues[j].substr(0, 10);
                    }
                }else{
                }
            }
            var chart1 = {};
            chart1.type = "LineChart";
            chart1.displayed = false;
            chart1.data = {
                "cols": [
                    {id: "hour", label: "hour", type: "string"},
                    {id: "measure-id", label: $scope.description, type: "number"},
                    {id: "measure-id", label: $scope.description2, type: "number"},
                    {id: "measure-id", label: $scope.description3, type: "number"}
                ], "rows": $scope.rows

            };
            chart1.options = {
                "title": $scope.title,
                "isStacked": "true",
                "fill": 24,
                "displayExactValues": true,
                "vAxis": {
                    "title": $scope.measure, "gridlines": {"count": 10}
                },
                "hAxis": {
                    "title": "Date " + $scope.date
                }
            };
            $scope.chart = chart1;
            $scope.cssStyle = "height:600px; width:100%;";
        }

    }]);
deviceMainController.controller('sensorMonitoringWeeklySummaryController',['$scope','$routeParams','$route','$http','$location', '$rootScope',
    function ($scope,$routeParams,$route, $http,$location, $rootScope) {
        var id =$routeParams.id;
        $scope.daily=false;
        $scope.weekly=true;
        $scope.showLight = function(){
            $scope.title = "Light sensor";
            $scope.measure = "Lux .";
            $scope.lightGraph = true;
            $scope.humidityGraph = false;
            $scope.soilMoistureGraph = false;
            $scope.temperatureGraph = false;
            $scope.description = "max light";
            $scope.description2 = "average light";
            $scope.description3 = "min light";

            $scope.showGraph();
        };
        $scope.showHumidity = function(){
            $scope.title = "Humidity sensor";
            $scope.measure = " %";
            $scope.lightGraph = false;
            $scope.humidityGraph = true;
            $scope.soilMoistureGraph = false;
            $scope.temperatureGraph = false;
            $scope.description = "max air humidity";
            $scope.description2 = "average air humidity";
            $scope.description3 = "min air humidity";

            $scope.showGraph();
        };
        $scope.showTemperature = function(){
            $scope.title = "Temperature sensor";
            $scope.measure = " celsius";
            $scope.lightGraph = false;
            $scope.humidityGraph = false;
            $scope.soilMoistureGraph = false;
            $scope.temperatureGraph = true;
            $scope.description = "max temperature";
            $scope.description2 = "average temperature";
            $scope.description3 = "min temperature";
            $scope.showGraph();
        };
        $scope.showSoilMoisture = function(){
            $scope.title = "Soil moisture sensor";
            $scope.measure = " ";
            $scope.lightGraph = false;
            $scope.humidityGraph = false;
            $scope.soilMoistureGraph = true;
            $scope.temperatureGraph = false;
            $scope.description = "max soil moisture";
            $scope.description2 = "average soil moisture";
            $scope.description3 = "min soil moisture";
            $scope.showGraph();
        };
        $http.get("sensor/"+id).success(function(data){
            $scope.SensorID = data.id;
            $scope.showSensor = true;
            $http.get("lightWeeklySummary/"+$scope.SensorID).success(function(data){
                $scope.light = data;
            });
            $http.get("humidityWeeklySummary/"+$scope.SensorID).success(function(data){
                $scope.humidity = data;
            });
            $http.get("soilMoistureWeeklySummary/"+$scope.SensorID).success(function(data){
                $scope.soilMoisture = data;
            });
            $http.get("temperatureWeeklySummary/"+$scope.SensorID).success(function(data){
                $scope.temperature = data;
            });
            $http.get("weekly/"+$scope.SensorID).success(function(data){
                $scope.dailys = data;

            });
        });
        $scope.showGraph =function() {
            $scope.rows = new Array();
            var xValues = new Array(); // date data points
            var avgValues = new Array(); // current values
            var desAvgValues = new Array(); // current description
            var minValues = new Array();
            var maxValues = new Array();
            var desMinValue = new Array();
            var desMaxValue = new Array();
            for (var i = 0; i < $scope.dailys.length; i++) {
                xValues[i] = $scope.dailys[i].created_at;
                if ($scope.lightGraph) {
                    avgValues[i] = $scope.dailys[i].avgLight;
                    desAvgValues[i] = $scope.dailys[i].avgLight + " lux";
                    minValues[i] = $scope.dailys[i].minLight;
                    desMinValue[i] = $scope.dailys[i].minLight + " lux";
                    maxValues[i] = $scope.dailys[i].maxLight;
                    desMaxValue[i] = $scope.dailys[i].maxLight + " lux";
                }
                if ($scope.humidityGraph) {
                    avgValues[i] = $scope.dailys[i].avgAirHumidity;
                    desAvgValues[i] = $scope.dailys[i].avgAirHumidity + " %";
                    minValues[i] = $scope.dailys[i].minAirHumidity;
                    desMinValue[i] = $scope.dailys[i].minAirHumidity + " %";
                    maxValues[i] = $scope.dailys[i].maxAirHumidity;
                    desMaxValue[i] = $scope.dailys[i].maxAirHumidity + " %";
                }
                if ($scope.temperatureGraph) {
                    avgValues[i] = $scope.dailys[i].avgTemperature;
                    desAvgValues[i] = $scope.dailys[i].avgTemperature + " celsius";
                    minValues[i] = $scope.dailys[i].minTemperature;
                    desMinValue[i] = $scope.dailys[i].minTemperature + " celsius";
                    maxValues[i] = $scope.dailys[i].maxTemperature;
                    desMaxValue[i] = $scope.dailys[i].maxTemperature + " celsius";
                }
                if ($scope.soilMoistureGraph) {
                    avgValues[i] = $scope.dailys[i].avgSoilMoisture;
                    desAvgValues[i] = $scope.dailys[i].avgSoilMoisture + ".";
                    minValues[i] = $scope.dailys[i].minSoilMoisture;
                    desMinValue[i] = $scope.dailys[i].minSoilMoisture + ".";
                    maxValues[i] = $scope.dailys[i].maxSoilMoisture;
                    desMaxValue[i] = $scope.dailys[i].maxSoilMoisture + ".";
                }
            }
            for (var j = 0; j <= 7; j++) {
                if(j<$scope.dailys.length) {
                    $scope.rows[j] = {c: [{v: xValues[j].substr(0, 10)}, {v: maxValues[j], f: desMaxValue[j]},{v: avgValues[j], f: desAvgValues[j]},{v: minValues[j], f: desMinValue[j]} ]};
                }else{
                }
            }
            var chart1 = {};
            chart1.type = "LineChart";
            chart1.displayed = false;
            chart1.data = {
                "cols": [
                    {id: "day", label: "day", type: "string"},
                    {id: "measure-id", label: $scope.description, type: "number"},
                    {id: "measure-id", label: $scope.description2, type: "number"},
                    {id: "measure-id", label: $scope.description3, type: "number"}
                ], "rows": $scope.rows

            };
            chart1.options = {
                "title": $scope.title,
                "isStacked": "true",
                "fill": 24,
                "displayExactValues": true,
                "vAxis": {
                    "title": $scope.measure, "gridlines": {"count": 10}
                },
                "hAxis": {
                    "title": "Date "
                }
            };
            $scope.chart = chart1;
            $scope.cssStyle = "height:600px; width:100%;";
        }

    }]);