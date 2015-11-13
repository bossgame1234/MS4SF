/**
 * Created by USER on 9/30/2015.
 */
'use strict';

var authMainController = angular.module('authMainController',[]);
authMainController.controller('AuthController',['$http','$auth','$rootScope','$location','$timeout',
function($http,$auth,$rootScope,$location,$timeout) {

    var vm = this;
    if($rootScope.User==null){
      //  $.backstretch("assets/img/farm-scenery.svg", {speed: 500,opacity: 1.0});
        $location.url("login");
        $rootScope.UserIdentify= false;
        if($location.path()!="login"){
            $location.url("login");
        }
    }else{
        $location.path("userProfile");
    }

    vm.login = function() {
        var credentials = {
            username: vm.username,
            password: vm.password
        };
        // Use Satellizer's $auth service to login
        $auth.login(credentials).then(function(data) {
            // If login is successful, redirect to the users state
            $http.get("index.php/api/user/member?username=" + data.config.data.username).success(function (data) {
               $rootScope.User = data;
                if ($rootScope.User == undefined) {
                } else {
                    $rootScope.UserIdentify = true;
                    $.backstretch("assets/img/blk.svg", {speed: 500});
                    $location.path("userProfile");
                }
            });
        },function(error){
            alert("Incorrect username or password");
        });
    };
}]);

