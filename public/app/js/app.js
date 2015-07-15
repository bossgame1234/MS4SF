/**
 * Created by Dell on 14/7/2558.
 */
var app =  angular.module('ms4sfApp',['ngRoute','farmMainController']);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/showFarmList', {
                templateUrl: 'view/farmList.html',
                controller: 'showFarmController'
            }).
            when('/addFarm', {
                templateUrl: 'view/list.html',
                controller: 'addFarmController'
            }).
            otherwise({
                redirectTo: '/view'
            });
    }]);