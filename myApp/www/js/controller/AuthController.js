/**
 * Created by USER on 9/30/2015.
 */
'use strict';
var authMainController = angular.module('authMainController',['loginServices','ngCookies']);
authMainController.controller('AuthController',['$scope','$rootScope', 'loginService', '$ionicPopup', '$state','$http', '$stateParams', 'ionicMaterialInk','$timeout','$cookieStore',
    function($scope,$rootScope, loginService, $ionicPopup, $state,$http, $stateParams, ionicMaterialInk,$timeout,$cookieStore) {
        $scope.$parent.clearFabs();
        $timeout(function() {
            $scope.$parent.hideHeader();
        }, 0);
        ionicMaterialInk.displayEffect();
        $scope.data = {};
            $scope.login = function() {
                loginService.save($scope.data,function(data) {
                    $http.get("../../public/api/user/member?username=" + $scope.data.username).success(function (data) {
                        $rootScope.User = data;
                        if ($rootScope.User == undefined) {
                        } else {
                            $cookieStore.put('authToken',$rootScope.User);
                            $rootScope.UserIdentify = true;
                            $state.go("app.myProfile");
                            console.log(data);
                        }
                    });
                },function(error) {
                    $ionicPopup.alert({
                        title: 'Login failed!',
                        template: 'Please check your credentials!'
                    });
                });
            }
    }]);