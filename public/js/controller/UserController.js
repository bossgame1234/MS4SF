/**
 * Created by USER on 10/4/2015.
 */
'use strict';

var userMainController = angular.module('userMainController',['userMainServices','activityServices']);
    userMainController.controller('registerController',['$http','$scope','$rootScope','$location','userService',function($http,$scope,$rootScope,$location,userService){
        $scope.editMode = false;
        $scope.registerUser = {};
        $scope.checkRole = function() {
            $scope.farmWorker = $scope.registerUser.role == "farmWorker";
        };
        $scope.Register = function(flowFiles){
            userService.save($scope.registerUser,function(data){
                    flowFiles.opts.target = 'uploadPicture';
                    flowFiles.opts.testChunks = false;
                    flowFiles.opts.query ={id:data.id,mode:'register'};
                    flowFiles.upload();
                    $location.path("login");
                    alert("Success");
                },function(error)
            {
                if(error.status=="502") {
                    alert("Username already exist");
                }else if(error.status=="501"){
                    alert("Wrong Farm ID");
                }else{
                    alert("There is a problem! Your request has not been fulfilled, please try again");
                }
            })
        };
    }]);
userMainController.controller('logoutController',['$http','$scope','$rootScope','$location',function($http,$scope,$rootScope,$location){
    $scope.logout = function() {
        $.backstretch('assets/img/768.png', {speed: 500,opacity: 1.0});
        delete ($rootScope.User);
        delete ($rootScope.PlotName);
        delete ($rootScope.plotId);
        delete ($rootScope.SelectedPlot);
        delete ($rootScope.DeviceId);
        delete ($rootScope.Device_id);
        delete ($rootScope.SelectedDevice);
        delete ($rootScope.Latitude);
        delete ($rootScope.Longitude);
        delete ($rootScope.UserIdentify);
        delete ($rootScope.FarmName);
        delete ($rootScope.FarmId);
        delete  ($rootScope.plantName);
        delete ($rootScope.PlantId);
        delete ($rootScope.SelectedPlant);
        delete ($rootScope.SelectedFarm);
        $location.path("login");
    }
}]);

userMainController.controller('viewProfileListController',['$http','$scope','$rootScope','$location','userService',function($http,$scope,$rootScope,$location,userService){
    $http.get("api/user?farmID="+$rootScope.farm_id).success(function(data){
        if($rootScope.User==null){
            $location.path("login");
        }
        $scope.memberList = data;
    }).error(function(error){
        alert("There is a problem! Your request has not been fulfilled, please try again");
    })
}]);
userMainController.controller('viewOwnProfileController',['$http','$scope','$rootScope','activityService','$route',function($http,$scope,$rootScope,activityService,$route){
    $http.get("api/user/member?id=" + $rootScope.User.id).success(function (data) {
        if($rootScope.User==null){
            $location.path("login");
        }
        $scope.ownProfile = true;
        $scope.member = data;
        if($scope.member!=undefined) {
            $http.get('taskList?id=' + $scope.member.id).success(function (data) {
                $scope.taskList = data[0].task_list;
                $scope.taskDone = 0;
                $scope.taskLate = 0;
                for (var i = 0; i < $scope.taskList.length; i++) {
                    if ($scope.taskList[i].status == "Done") {
                        $scope.taskDone++;
                    } else if ($scope.taskList[i].status == "Late done") {
                        $scope.taskLate++;
                    }
                }
                $scope.taskSum = $scope.taskLate + $scope.taskDone;
                $scope.percentTaskDone = ($scope.taskDone * 100) / $scope.taskSum;
                $scope.percentTaskLate = ($scope.taskLate * 100) / $scope.taskSum;
                $scope.taskDoneStyle = {width: $scope.percentTaskDone + '%'};
                $scope.taskLateStyle = {width: $scope.percentTaskLate + '%'};
            });
        }
        $scope.User.pictureDist = data.pictureDist ;
    });
}]);
userMainController.controller('viewMemberProfileController',['$http','$scope','$rootScope','$location','userService','$routeParams','$route',function($http,$scope,$rootScope,$location,userService,$routeParams,$route){
    var id = $routeParams.id ;
    if($rootScope.User==null){
        $location.path("login");
    }
    $scope.ownProfile = false;
    $http.get("api/user/member?id=" + id).success(function (data) {
        $scope.member = data;
        if($scope.member!=undefined) {
            $http.get('taskList?id=' + $scope.member.id).success(function (data) {
                $scope.taskList = data[0].task_list;
                $scope.taskDone = 0;
                $scope.taskLate = 0;
                for (var i = 0; i < $scope.taskList.length; i++) {
                    if ($scope.taskList[i].status == "Done") {
                        $scope.taskDone++;
                    } else if ($scope.taskList[i].status == "Late done") {
                        $scope.taskLate++;
                    }
                }
                $scope.taskSum = $scope.taskLate + $scope.taskDone;
                $scope.percentTaskDone = ($scope.taskDone * 100) / $scope.taskSum;
                $scope.percentTaskLate = ($scope.taskLate * 100) / $scope.taskSum;
                $scope.taskDoneStyle = {width: $scope.percentTaskDone + '%'};
                $scope.taskLateStyle = {width: $scope.percentTaskLate + '%'};
            });
        }
    });

}]);

userMainController.controller('editProfileController',['$http','$scope','$rootScope','$location','userService','$routeParams','$route',function($http,$scope,$rootScope,$location,userService,$routeParams,$route){
    $http.get("api/user/member?username=" + $rootScope.User.username).success(function (data) {
        $scope.registerUser = data;
    });
    $scope.editMode = true;
    if($rootScope.User==null){
        $location.path("login");
    }
  $scope.Edit = function(flowFiles){
      var answer = confirm("Do you want to update the profile?");
      if(answer) {
          userService.update($scope.registerUser, function (data) {
              $rootScope.User = $scope.registerUser;
              flowFiles.opts.target = 'uploadPicture';
              flowFiles.opts.testChunks = false;
              flowFiles.opts.query = {id: data.id, mode: 'register'};
              flowFiles.upload();
              $location.path("userProfile");
              alert("Success");
          }, function (error) {
              if (error.status == "502") {
                  alert("Username already exist");
              } else if (error.status == "501") {
                  alert("Wrong Farm ID");
              } else {
                  alert("There is a problem! Your request has not been fulfilled, please try again");
              }

          });
      }
  }
}]);