/**
 * Created by Dell on 14/7/2558.
 */
var app =  angular.module('ms4sf',[
    'ngRoute',
    'farmMainController',
    'farmServices',
    'plotMainController',
    'plotServices',
    'plantMainController',
    'plantServices',
    'deviceMainController',
    'deviceServices',
    'uiGmapgoogle-maps',
    'googlechart'
]).value("rndAddToLatLon", function () {
        return Math.floor(((Math.random() < 0.5 ? -1 : 1) * 2) + 1);
    });
app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/showFarmList', {
                templateUrl: 'view/farmList.html',
                controller: 'showFarmController'
            }).
            when('/addFarm', {
                templateUrl: 'view/addFarmPage.html',
                controller: 'addFarmController'
            }).
            when('/editFarm/:id', {
                templateUrl: 'view/addFarmPage.html',
                controller: 'editFarmController'
            }).
            when('/viewFarm/:id', {
                templateUrl: 'view/ViewFarmPage.html',
                controller: 'viewFarmController'
            }).
            when('/addPlot', {
                templateUrl: 'view/addPlotPage.html',
                controller: 'addPlotToFarmController'
            }).
            when('/editPlot/:id', {
                 templateUrl: 'view/addPlotPage.html',
                controller: 'editPlotController'
             }).
            when('/addPlant', {
                templateUrl: 'view/addPlantPage.html',
                controller: 'addPlantToPlotController'
            }).
            when('/editPlant/:id', {
                templateUrl: 'view/addPlantPage.html',
                controller: 'editPlantController'
            }).
            when('/viewPlot/:id',{
                templateUrl: 'view/ViewPlotPage.html',
                controller: 'viewPlotController'
            }).
            when('/viewPlotList/:id',{
                templateUrl: 'view/plotList.html',
                controller: 'listPlotController'
            }).
            when('/viewPlant',{
                templateUrl: 'view/ViewPlantPage.html',
                controller: 'listPlantController'
            }).
        when('/sensingDeviceList',{
            templateUrl: 'view/addDevicePage.html',
            controller: 'listDeviceController'
        }).
        when('/viewDevice/:id',{
                templateUrl: 'view/ViewDeviceInfoPage.html',
                controller: 'sensorMonitoringSummaryController'
            }).
        when('/viewWeeklySummary/:id',{
            templateUrl: 'view/ViewDeviceInfoPage.html',
            controller: 'sensorMonitoringWeeklySummaryController'
        }).
            otherwise({
                redirectTo: '/view'
            });
    }]);
app.config(['uiGmapGoogleMapApiProvider', function (GoogleMapApi) {
    GoogleMapApi.configure({
//    key: 'your api key',
        v: '3.17',
        libraries: 'weather,geometry,visualization'
    });
}]);
app.run(['$templateCache', function ($templateCache) {
            $templateCache.put('searchbox.tpl.html', '<input id="pac-input" class="pac-controls" type="text" placeholder="Search">');
    $templateCache.put('window.tpl.html', '<div ng-controller="WindowCtrl" ng-init="showPlaceDetails(parameter)">{{place.name}}</div>');
}])