/**
 * Created by USER on 7/15/2015.
 */
'use strict';

var plantMainController = angular.module('plantMainController',['plantServices']);
plantMainController.controller('listPlantController', ['$scope', '$http', '$routeParams', '$location', '$rootScope','plantService',
    function ($scope, $http, $routeParams, $location, $rootScope,plantService) {
        $http.get("plant/" + $rootScope.plotId+"/edit").success(function (data) {
            $scope.plants = data;
        });
        $scope.deletePlant = function(id){
            var answer = confirm("Do you want to delete the plant?");
            if (answer) {
                plantService.delete({id:id},function(){
                    $location.path("viewPlot/"+$rootScope.plotId);
                }).
                    error(function(data) {
                        alert("There is a problem! Your request has not been fulfilled, please try again");
                    });
            }}
    }]);
plantMainController.controller('addPlantToPlotController',['$scope', '$routeParams', '$http','$location', '$rootScope','plantService',
    function ($scope,$routeParams, $http,$location, $rootScope,plotService) {
        $scope.addPlant = true;
        $scope.editPlant = false;
        $scope.plant = {plant_id:'',type:'',DOB:'',harvestDay:'',name:''};
        $scope.plant.plot_id = $rootScope.plotId;
        $scope.addPlant = function() {
            plotService.save($scope.plant, function (data) {
                $location.path("viewPlot/"+$scope.plant.plot_id);
            }, function (error) {
                alert("There is a problem! Your request has not been fulfilled, please try again");
            })
        }
    }]);
plantMainController.controller('editPlantController', ['$scope', '$http', '$routeParams', '$location', '$rootScope','plantService',
    function ($scope, $http, $routeParams, $location, $rootScope,plotService) {
        $scope.addPlant = false;
        $scope.editPlant = true;
        var id = $routeParams.id;
        $http.get("plant/" + id).success(function (data) {
            $scope.plant = data;
            $scope.plant.DOB = new Date(data.DOB);
        });
        $scope.editPlant = function () {
            //$http.put("/plot", $scope.plot).then(function () {
            plotService.update({id:$scope.plant.id},$scope.plant,function(){
                    $location.path("viewPlot/"+$scope.plant.plot_id);
                }, function (error) {
                    alert("There is a problem! Your request has not been fulfilled, please try again");
                }
            );
        }
    }]);

plantMainController.controller('viewPlantController', ['$scope', '$http', '$routeParams', '$location', '$rootScope','plantService',
    function ($scope, $http, $routeParams, $location, $rootScope,plotService) {
        $rootScope.plantID = $routeParams.id;
        var id = $routeParams.id;
        $http.get("plot/" + id).success(function (data) {
            $scope.plot = data;
        });
    }]);