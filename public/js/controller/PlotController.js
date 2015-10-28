/**
 * Created by USER on 7/15/2015.
 */
'use strict';

var plotMainController = angular.module('plotMainController',['plotServices']);
plotMainController.controller('listPlotController', ['$scope', '$http','$route', '$routeParams', '$location', '$rootScope','plotService',
    function ($scope, $http, $route,$routeParams, $location, $rootScope,plotService) {
        if($rootScope.User==null){
            $location.path("login");
        }
        $http.get("plot/" + $rootScope.FarmId+"/edit").success(function (data) {
            $scope.plots = data;
        });
        $scope.deletePlot = function(id){
            var answer = confirm("Do you want to delete the plot? \n*removing the plot will also remove its plants and devices");
            if (answer) {
                plotService.delete({id:id},function(data){
                    alert("Success");
                    $route.reload();
                }).
                    error(function(data) {
                        alert("There is a problem! Your request has not been fulfilled, please try again");
                    });
            }
        };
        $scope.selectPlot= function(id,name){
            $rootScope.DeviceId = null;
            $rootScope.Device_id = null;
            $rootScope.SelectedDevice = false;
            $rootScope.PlantId = null;
            $rootScope.plantName = null;
            $rootScope.SelectedPlant = false;
            if( $rootScope.plotId==id){
                $rootScope.PlotName = null;
                $rootScope.plotId = null;
                $rootScope.SelectedPlot = false;
            }else {
                $rootScope.PlotName = name;
                $rootScope.plotId = id;
                $rootScope.SelectedPlot = true;
            }
        }
    }]);
plotMainController.controller('addPlotToFarmController',['$scope', '$routeParams', '$http','$location', '$rootScope','plotService',
    function ($scope,$routeParams, $http,$location, $rootScope,plotService) {
        if($rootScope.User==null){
            $location.path("login");
        }
        if($rootScope.FarmId==null){
            $location.path("showFarmList")
        }
        $scope.addPlot = true;
        $scope.editPlot = false;
        $scope.plot = {farm_id:'',description:'',DOB:'',name:''};
        $scope.plot.farm_id = $rootScope.FarmId;
        $scope.addPlot = function() {
            plotService.save($scope.plot, function (data) {
                alert("success");
                $location.path("/viewPlotList");
            }, function (error) {
                alert("There is a problem! Your request has not been fulfilled, please try again");
            })
        }
    }]);
plotMainController.controller('editPlotController', ['$scope', '$http', '$routeParams', '$location', '$rootScope','plotService',
    function ($scope, $http, $routeParams, $location, $rootScope,plotService) {
        if($rootScope.User==null){
            $location.path("login");
        }
        $scope.addPlot = false;
        $scope.editPlot = true;
        var id = $routeParams.id;
        $http.get("plot/" + id).success(function (data) {
            $scope.plot = data;
            $scope.plot.DOB = new Date(data.DOB);
        });

        $scope.editPlot = function () {
            var answer = confirm("Do you want to update the plot?");
            if (answer) {
                //$http.put("/plot", $scope.plot).then(function () {
                plotService.update({id: $scope.plot.id}, $scope.plot, function () {
                        alert("success");
                        $location.path("/viewPlotList");
                    }, function (error) {
                        alert("There is a problem! Your request has not been fulfilled, please try again");
                    }
                );
            }
        }
    }]);

plotMainController.controller('viewPlotController', ['$scope', '$http', '$routeParams', '$location', '$rootScope','plotService',
    function ($scope, $http, $routeParams, $location, $rootScope,plotService) {
        if($rootScope.User==null){
            $location.path("login");
        }
        var id = $routeParams.id;
        $rootScope.plotId = id;
        $http.get("plot/" + id).success(function (data) {
            $scope.plot = data;
        });
    }]);