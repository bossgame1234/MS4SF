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
    'googlechart',
    'testController'
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
            when('/viewPlotList',{
                templateUrl: 'view/plotList.html',
                controller: 'listPlotController'
            }).
            when('/addPlot', {
                templateUrl: 'view/addPlotPage.html',
                controller: 'addPlotToFarmController'
            }).
            when('/editPlot/:id', {
                 templateUrl: 'view/addPlotPage.html',
                controller: 'editPlotController'
             }).
            when('/viewPlot/:id',{
                templateUrl: 'view/ViewPlotPage.html',
                controller: 'viewPlotController'
            }).
            when('/viewPlantList',{
                templateUrl: 'view/plantList.html',
                controller: 'listPlantController'
            }).
            when('/viewPlant/:id',{
                templateUrl: 'view/ViewPlantPage.html',
                controller: 'viewPlantController'
            }).
            when('/addPlant', {
                templateUrl: 'view/addPlantPage.html',
                controller: 'addPlantToPlotController'
            }).
            when('/editPlant/:id', {
                templateUrl: 'view/addPlantPage.html',
                controller: 'editPlantController'
            }).
            when('/sensingDeviceRegister',{
            templateUrl: 'view/addDevicePage.html',
            controller: 'listDeviceController'
            }).
            when('/sensingDeviceList', {
            templateUrl: 'view/devicelist.html',
            controller:  'PlotWithDeviceController'
            }).
            when('/viewDailySummary/:id',{
                templateUrl: 'view/ViewDeviceInfoPage.html',
                controller: 'sensorMonitoringSummaryController'
            }).
            when('/viewWeeklySummary/:id',{
                templateUrl: 'view/ViewDeviceInfoPage.html',
                controller: 'sensorMonitoringWeeklySummaryController'
            }).
            when('/test',{
                templateUrl: 'view/testmap.html',
                controller: 'SearchBoxController'
            }).
            otherwise({
                redirectTo: '/view'
            });
    }]);
app.config(['uiGmapGoogleMapApiProvider', function (GoogleMapApi) {
    GoogleMapApi.configure({
//    key: 'your api key',
        v: '3.17',
        libraries: 'weather,geometry,visualization,places'
    });
}]);
app.run(['$templateCache', function ($templateCache) {
            $templateCache.put('searchbox.tpl.html', '<input id="pac-input" class="pac-controls" type="text" placeholder="Search">');
    $templateCache.put('window.tpl.html', '<div ng-controller="WindowCtrl" ng-init="showPlaceDetails(parameter)">{{place.name}}</div>');
}]);
app.controller('NavigationCtrl', ['$scope', '$location', function ($scope, $location) {
    $scope.isCurrentPath = function (path) {
        return $location.path() == path;
    };
}]);
app.controller('WindowCtrl', function ($scope) {
    $scope.place = {};
    $scope.showPlaceDetails = function(param) {
        $scope.place = param;
    }
})
