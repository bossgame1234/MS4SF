/**
 * Created by USER on 7/15/2015.
 */
'use strict';

var plotMainController = angular.module('plotMainController',['plotServices']);
plotMainController.controller('listPlotController', ['$scope', '$http', '$routeParams', '$location', '$rootScope','plotService',
    function ($scope, $http, $routeParams, $location, $rootScope,plotService) {
        $http.get("plot/" + $rootScope.FarmId+"/edit").success(function (data) {
            $scope.plots = data;
        });
        $scope.deletePlot = function(id){
            var answer = confirm("Do you want to delete the plot?");
            if (answer) {
                plotService.delete({id:id},function(){
                    $location.path("viewFarm/"+$rootScope.FarmId);
                }).
                    error(function(data) {
                        alert("There is a problem! Your request has not been fulfilled, please try again");
                    });
            }}
    }]);
plotMainController.controller('addPlotToFarmController',['$scope', '$routeParams', '$http','$location', '$rootScope','plotService',
    function ($scope,$routeParams, $http,$location, $rootScope,plotService) {
        $scope.addPlot = true;
        $scope.editPlot = false;
        $scope.plot = {farm_id:'',description:'',DOB:'',name:''};
        $scope.plot.farm_id = $rootScope.FarmId;
        $scope.addPlot = function() {
            plotService.save($scope.plot, function (data) {
                $location.path("viewFarm/"+$scope.plot.farm_id);
            }, function (error) {
                alert("There is a problem! Your request has not been fulfilled, please try again");
            })
        }
    }]);
plotMainController.controller('editPlotController', ['$scope', '$http', '$routeParams', '$location', '$rootScope','plotService',
    function ($scope, $http, $routeParams, $location, $rootScope,plotService) {
        $scope.addPlot = false;
        $scope.editPlot = true;
        var id = $routeParams.id;
        $http.get("plot/" + id).success(function (data) {
            $scope.plot = data;
            $scope.plot.DOB = new Date(data.DOB);
        });

        $scope.editPlot = function () {
            //$http.put("/plot", $scope.plot).then(function () {
            plotService.update({id:$scope.plot.id},$scope.plot,function(){
                $location.path("viewFarm/"+$scope.plot.farm_id);
            }, function (error) {
                alert("There is a problem! Your request has not been fulfilled, please try again");
            }
            );
        }
    }]);

plotMainController.controller('viewPlotController', ['$scope', '$http', '$routeParams', '$location', '$rootScope','plotService',
    function ($scope, $http, $routeParams, $location, $rootScope,plotService) {
        $rootScope.plantManagement =true;
        var id = $routeParams.id;
        $rootScope.plotId = id;
        $http.get("plot/" + id).success(function (data) {
            $scope.plot = data;
        });
    }]);