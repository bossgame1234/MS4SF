/**
 * Created by Dell on 14/7/2558.
 */
'use strict'

var farmMainController = angular.module('farmMainController',[]);

farmMainController.controller('showFarmController',['$scope','$http','$location','$rootScope',function($scope,$http,$location, $rootScope)
{
    $http.get('/farm').success(function(data){
        $scope.farms = data;
    })
}])