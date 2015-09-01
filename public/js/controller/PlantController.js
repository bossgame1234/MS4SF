/**
 * Created by USER on 7/15/2015.
 */
'use strict';

var plantMainController = angular.module('plantMainController',['plantServices']);
plantMainController.controller('listPlantController', ['$scope', '$http','$route', '$routeParams', '$location', '$rootScope','plantService',
    function ($scope, $http,$route, $routeParams, $location, $rootScope,plantService) {
        $http.get("plant/" + $rootScope.plotId+"/edit").success(function (data) {
            $scope.plants = data;
        });
        $scope.deletePlant = function(id){
            var answer = confirm("Do you want to delete the plant?");
            if (answer) {
                plantService.delete({id:id},function(){
                    alert("Success");
                   $route.reload();
                }).
                    error(function(data) {
                        alert("There is a problem! Your request has not been fulfilled, please try again");
                    });
            }}
    }]);
plantMainController.controller('addPlantToPlotController',['$scope', '$routeParams', '$http','$location', '$rootScope','plantService',
    function ($scope,$routeParams, $http,$location, $rootScope,plotService) {
        if($rootScope.plotId==null){
            $location.path("showFarmList")
        }
        $scope.addPlant = true;
        $scope.editPlant = false;
        $scope.plant = {plant_id:'',type:'',DOB:'',harvestDay:'',name:''};
        $scope.plant.plot_id = $rootScope.plotId;
        $scope.addPlant = function() {
            plotService.save($scope.plant, function (data) {
                alert("success");
                $location.path("viewPlant");
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
            var answer = confirm("Do you want to update the plant?");
            if (answer) {
                //$http.put("/plot", $scope.plot).then(function () {
                plotService.update({id: $scope.plant.id}, $scope.plant, function () {
                        alert("success");
                        $location.path("viewPlant");
                    }, function (error) {
                        alert("There is a problem! Your request has not been fulfilled, please try again");
                    }
                );
            }
        }
    }]);

plantMainController.controller('viewPlantController', ['$scope', '$http', '$routeParams', '$location', '$rootScope','plantService',
    function ($scope, $http, $routeParams, $location, $rootScope,plotService) {
        $rootScope.plantID = $routeParams.id;
        var id = $routeParams.id;
        $http.get("plant/" + id).success(function (data) {
            $scope.plant = data;
        });
    }]);