/**
 * Created by Dell on 14/7/2558.
 */
'use strict';

var farmMainController = angular.module('farmMainController',['farmServices','uiGmapgoogle-maps']);

farmMainController.controller('showFarmController',['$scope','$http','$location','$rootScope','$route','farmService',function($scope,$http,$location, $rootScope,$route,farmService)
{

   // $http.get('farm').success(function(data){
        var data = farmService.query(function(){
            $scope.farms = data;
        },function(error) {
            alert("There is a problem! Your request has not been fulfilled, please try again");
        });
       $scope.deleteFarm = function(id){
           var answer = confirm("Do you want to delete the farm?");
           if (answer) {
               farmService.delete({id:id},function(){
                   $rootScope.deleteSuccess = true;
                   $location.path("showFarmList");
               },function(error) {
                   alert("There is a problem! Your request has not been fulfilled, please try again");
               });
           }
       }
}]);
farmMainController.controller('addFarmController',['$scope', '$http','$timeout','uiGmapLogger','rndAddToLatLon','uiGmapGoogleMapApi','$location', '$rootScope','farmService',
    function ($scope, $http,$timeout, $log, rndAddToLatLon,GoogleMapApi,$location, $rootScope,farmService) {
        $scope.addFarm = true;
        $scope.editFarm = false;
        $scope.farm = {latitude:'',longitude:'',description:'',name:'',address:''};
        $scope.addFarm =function(){
        farmService.save($scope.farm,function(data) {
            $location.path("showFarmList");
        },function(error) {
            alert("There is a problem! Your request has not been fulfilled, please try again");
        }
        )
        }
        GoogleMapApi.then(function(maps) {
        angular.extend($scope, {
            map: {
                show: true,
                control: {},
                version: "unknown",
                heatLayerCallback: function (layer) {
                    //set the heat layers backend data
                    var mockHeatLayer = new MockHeatLayer(layer);
                },
                showTraffic: true,
                showBicycling: false,
                showWeather: false,
                showHeat: false,
                center: {
                    latitude: 14.5623,
                    longitude: 100.6127
                },
                options: {
                    streetViewControl: false,
                    panControl: false,
                    maxZoom: 20,
                    minZoom: 3
                },
                zoom: 6,
                dragging: false,
                bounds: {},
                clickedMarker: {
                    id: 0,
                    options: {}
                },
                events: {
                    click: function (mapModel, eventName, originalEventArgs) {
                        var e = originalEventArgs[0];
                        var lat = e.latLng.lat(),
                            lon = e.latLng.lng();
                        $scope.farm.latitude =  e.latLng.lat();
                        $scope.farm.longitude =  e.latLng.lng();
                        $scope.map.clickedMarker = {
                            id: 0,
                            options: {
                                labelContent: 'You clicked here ' + 'lat: ' + lat + ' lon: ' + lon,
                                labelClass: "marker-labels",
                                labelAnchor: "50 0"
                            },
                            latitude: lat,
                            longitude: lon
                        };
                        //scope apply required because this event handler is outside of the angular domain
                        $scope.$apply();
                    }
                }
            }
        });
        })
    }]);
farmMainController.controller('editFarmController',['$scope', '$routeParams', '$http','$timeout','uiGmapLogger','rndAddToLatLon','uiGmapGoogleMapApi','$location', '$rootScope','farmService',
    function ($scope,$routeParams, $http,$timeout, $log, rndAddToLatLon,GoogleMapApi,$location, $rootScope,farmService) {
        $scope.editFarm = true;
        $scope.addFarm = false;
        $scope.farm = {latitude:'',longitude:'',description:'',name:'',address:''};
        var id = $routeParams.id;
        var x = null;
        var y = null;
        $http.get("farm/" + id).success(function (data) {
             x = data.latitude;
              y = data.longitude;
            $scope.farm = data;
            GoogleMapApi.then(function(maps) {
                angular.extend($scope, {
                    map: {
                        show: true,
                        control: {},
                        version: "unknown",
                        heatLayerCallback: function (layer) {
                            //set the heat layers backend dat
                            var mockHeatLayer = new MockHeatLayer(layer);
                        },
                        showTraffic: true,
                        showBicycling: false,
                        showWeather: false,
                        showHeat: false,
                        center: {
                            latitude: x,
                            longitude: y
                        },
                        options: {
                            streetViewControl: false,
                            panControl: false,
                            maxZoom: 20,
                            minZoom: 3
                        },
                        zoom: 7,
                        dragging: false,
                        bounds: {}
                    }});

                $scope.marker = {
                    id: 0,
                    coords: {
                        latitude: x,
                        longitude: y
                    },
                    options: { draggable: true },
                    events: {
                        dragend: function (marker, eventName, args) {
                            $log.log('marker dragend');
                            var lat = marker.getPosition().lat();
                            var lon = marker.getPosition().lng();
                            $scope.farm.latitude =  lat;
                            $scope.farm.longitude =  lon;
                            $scope.marker.options = {
                                draggable: true,
                                labelContent: "lat: " + $scope.marker.coords.latitude + ' ' + 'lon: ' + $scope.marker.coords.longitude,
                                labelAnchor: "100 0",
                                labelClass: "marker-labels"
                            };
                        }
                    }
                };
            })
        }
        ).error(function() {
                alert("There is a problem! Your request has not been fulfilled, please try again");
            }
        );
        $scope.editFarm =function(){
            farmService.update({id:$scope.farm.id},$scope.farm,function(data) {
                    $location.path("showFarmList");
                },function(error) {
                    alert("There is a problem! Your request has not been fulfilled, please try again");
                }
            )
        };

    }]);
farmMainController.controller('viewFarmController',['$scope', '$routeParams', '$http','$timeout','uiGmapLogger','rndAddToLatLon','uiGmapGoogleMapApi','$location', '$rootScope','farmService',
    function ($scope,$routeParams, $http,$timeout, $log, rndAddToLatLon,GoogleMapApi,$location, $rootScope,farmService) {
        $rootScope.FarmId = $routeParams.id;
        $rootScope.plotManagement = true;
        $http.get("farm/" + $rootScope.FarmId).success(function (data) {
                $scope.farm = data;
                GoogleMapApi.then(function(maps) {
                    angular.extend($scope, {
                        map: {
                            show: true,
                            control: {},
                            version: "unknown",
                            heatLayerCallback: function (layer) {
                                //set the heat layers backend dat
                                var mockHeatLayer = new MockHeatLayer(layer);
                            },
                            showTraffic: true,
                            showBicycling: false,
                            showWeather: false,
                            showHeat: false,
                            center: {
                                latitude: $scope.farm.latitude,
                                longitude: $scope.farm.longitude
                            },
                            options: {
                                streetViewControl: false,
                                panControl: false,
                                maxZoom: 20,
                                minZoom: 3
                            },
                            zoom: 7,
                            dragging: false,
                            bounds: {}
                        }});

                    $scope.marker = {
                        id: 0,
                        coords: {
                            latitude: $scope.farm.latitude,
                            longitude: $scope.farm.longitude
                        }
                    };
                })
            }
        ).error(function() {
                alert("There is a problem! Your request has not been fulfilled, please try again");
            }
        );
    }]);


