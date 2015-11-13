/**
 * Created by Boss on 7/15/2015.
 */
'use strict';
var taskMainController = angular.module('taskMainController',['taskServices']);
taskMainController.controller('addTaskController',['$scope', '$http','$location', '$rootScope','taskService','$filter',
    function ($scope, $http,$location, $rootScope,taskService,$filter) {
        if($rootScope.User==null){
            $location.path("login");
        }
        $scope.editTask = false;
        $scope.task = {
            username : $rootScope.User.username
        };
        $scope.task.type = new Array();
        $scope.task.worker = new Array();
        $scope.plot_id = 0;
        $('#picker').datepicker({
            endDate: 0
        }).on('changeDate', function(e) {
            $scope.task.date = $filter('date')(e.date,"MM/dd/yyyy"); // `e` here contains the extra attributes
        });
        $('#timepicker').timepicker({
            minuteStep: 1,
            template: 'modal',
            appendWidgetTo: 'body',
            showSeconds: true,
            showMeridian: false,
            defaultTime: false
        });
        $http.get("plot/" + $rootScope.FarmId+"/edit").success(function (data) {
            $scope.plots = data;
            $scope.loadPlot = true;
        });
        $http.get("allMember?id=" + $rootScope.FarmId).success(function (data) {
            $scope.members = data;
            if( $scope.members!=undefined) {
            for(var i=0;i<$scope.members.length;i++)
            {
                if($scope.members[i].username==$rootScope.User.username){
                    $scope.members.splice(i,1);
                }
            }
                $scope.loadMember = true;
            }
        });
        $scope.savePlotID = function(id) {
            $http.get("plant/" + id + "/edit").success(function (data) {
                $scope.plants = data;
                $scope.loadPlant = true;
            });
        };
        $scope.task.date =  $filter('date')(new Date(),"MM/dd/yyyy");
        $scope.task.time = $filter('date')(new Date(),"HH:mm:ss");
        $scope.tillingCheck = function(){
            if(!$rootScope.tillingSelected) {
                $scope.task.type[0] = 1;
                $rootScope.tillingSelected = true;
            }else{
                $scope.task.type[0] = 0;
                $rootScope.tillingSelected = false;
            }
        };
        $scope.plantingCheck = function(){
            if(!$rootScope.plantingSelected) {
                $scope.task.type[1] = 2;
                $rootScope.plantingSelected = true;
            }else{
                $scope.task.type[1] = 0;
                $rootScope.plantingSelected = false;
            }
        };
        $scope.pruningCheck = function(){
            if(!$rootScope.pruningSelected) {
                $scope.task.type[2] = 3;
                $rootScope.pruningSelected = true;
            }else{
                $scope.task.type[2] = 0;
                $rootScope.pruningSelected= false;
            }
        };
        $scope.harvestingCheck = function(){
            if(!$rootScope.harvestingSelected) {
                $scope.task.type[3] = 4;
                $rootScope.harvestingSelected = true;
            }else{
                $scope.task.type[3] = 0;
                $rootScope.harvestingSelected = false;
            }
        };
        $scope.fertilizingCheck = function(){
            if(!$rootScope.fertilizingSelected) {
                $scope.task.type[4] = 5;
                $rootScope.fertilizingSelected = true;
            }else{
                $scope.task.type[4] = 0;
                $rootScope.fertilizingSelected = false;
            }
        };

        $scope.wateringCheck = function(){
            if(!$rootScope.wateringSelected) {
                $scope.task.type[5] = 6;
                $rootScope.wateringSelected = true;
            }else{
                $scope.task.type[5] = 0;
                $rootScope.wateringSelected = false;
            }
        };
        $scope.scoutingCheck = function(){
            if(!$rootScope.scoutingSelected) {
                $scope.task.type[6] = 7;
                $rootScope.scoutingSelected = true;
            }else{
                $scope.task.type[6] = 0;
                $rootScope.scoutingSelected = false;
            }
        };
        var $i=0;
        $scope.name = new Array();
        $scope.addMember=function(member){
            var found =false;
            var a = member.split(".");
            if(a!=undefined) {
                var memberID = a[0];
                for(var j=0;j< $scope.task.worker.length;j++){
                    if($scope.task.worker[j] == memberID){
                        found =true;
                    }
                }
                if(!found) {
                    $scope.name[$i] = a[1];
                    $scope.task.worker[$i] = memberID;
                    $i++;
                }
            }
        };
        $scope.removeMember=function(memberID){
            for(var j=0;j< $scope.task.worker.length;j++){
                if($scope.task.worker[j] == memberID){
                    $scope.task.worker.splice(j,1);
                    $scope.name.splice(j,1);
                    $i--;
                }
            }
        };
        $scope.addTask = function(flowFiles){
            taskService.save($scope.task,function(data){
                flowFiles.opts.target = 'uploadPicture';
                flowFiles.opts.testChunks = false;
                flowFiles.opts.query ={id:data.id,mode:'task'};
                flowFiles.upload();
                alert("Success");
                $location.path("viewOverAllTask");
            },function(error){
                if(error.status=="500"){
                    alert("There is a problem! Your request has not been fulfilled, please try again \n ERROR : Please input all information");
                }
            });
        }
    }]);
taskMainController.controller('editTaskController', ['$scope', '$http', '$routeParams', '$location', '$rootScope','taskService','$filter',
    function ($scope, $http, $routeParams, $location, $rootScope,taskService,$filter) {
        $scope.editTask = true;
        var $i = 0;
        if($rootScope.User==null){
            $location.path("login");
        }
        $('#date-container input').datepicker({
            endDate: "today"
        }).on('changeDate', function(e) {
            $scope.task.date = $filter('date')(e.date,"MM/dd/yyyy"); // `e` here contains the extra attributes
        });
        $('#timepicker').timepicker({
            minuteStep: 1,
            template: 'modal',
            appendWidgetTo: 'body',
            showSeconds: true,
            showMeridian: false,
            defaultTime: false
        });
        $http.get("plot/" + $rootScope.FarmId+"/edit").success(function (data) {
            $scope.plots = data;
            $scope.loadPlot = true;
        });
        $http.get("allMember?id=" + $rootScope.FarmId).success(function (data) {
            $scope.members = data;
            if( $scope.members!=undefined) {
                for(var i=0;i<$scope.members.length;i++)
                {
                    if($scope.members[i].username==$rootScope.User.username){
                        $scope.members.splice(i,1);
                    }
                }
                $scope.loadMember = true;
            }
        });
        $scope.savePlotID = function(id) {
            $http.get("plant/" + id + "/edit").success(function (data) {
                $scope.plants = data;
                $scope.loadPlant = true;
            });
        };
        $http.get('task/'+$routeParams.id).success(function(data){
            $scope.task= data;
            $scope.task.worker = new Array();
            $scope.name = new Array();
            //   $scope.task.date =  $filter('date')(data.date,"MM/dd/yyyy");
            $scope.task.type = new Array();
            $scope.plot_id = data.plant.plot.id;
            if( $scope.task!=undefined) {
                $i = data.worker_member.length;
                for (var j = 0; j < data.worker_member.length; j++) {
                    $scope.name[j] = data.worker_member[j].name;
                    $scope.task.worker[j] = data.worker_member[j].id;
                }
                for (var i = 0; i < data.activity_type.length; i++) {
                    switch (data.activity_type[i].id) {
                        case 1:
                            $scope.task.type[0] = 1;
                            $rootScope.tillingSelected = true;
                            break;
                        case 2:
                            $scope.task.type[1] = 2;
                            $rootScope.plantingSelected = true;
                            break;
                        case 3:
                            $scope.task.type[2] = 3;
                            $rootScope.pruningSelected = true;
                            break;
                        case 4:
                            $scope.task.type[3] = 4;
                            $rootScope.harvestingSelected = true;
                            break;
                        case 5:
                            $scope.task.type[4] = 5;
                            $rootScope.fertilizingSelected = true;
                            break;
                        case 6:
                            $scope.task.type[5] = 6;
                            $rootScope.wateringSelected = true;
                            break;
                        case 7:
                            $scope.task.type[6] = 7;
                            $rootScope.scoutingSelected = true;
                            break;
                    }
                }
            }
        }).error(function(error){
            if(error.status=="500"){
                alert("There is a problem! Your request has not been fulfilled, please try again \n ERROR : Please input all information");
            }
        });
        $scope.editTask = function(flowFiles){
            var answer = confirm("Do you want to update task?");
            if(answer) {
                taskService.update({id: $scope.task.id}, $scope.task, function (data) {
                    flowFiles.opts.target = 'uploadPicture';
                    flowFiles.opts.testChunks = false;
                    flowFiles.opts.query = {id: data.id, mode: 'task'};
                    flowFiles.upload();
                    if($rootScope.User.role=="farm worker"){
                        $location.path("viewOwnTask");
                    }else {
                        $location.path("viewOverAllTask");
                    }
                    alert("success");
                },function(error){
                    if(error.status=="500"){
                        alert("There is a problem! Your request has not been fulfilled, please try again \n ERROR : Please input all information");
                    }
                })
            }
        };
        $scope.tillingCheck = function(){
            if(!$rootScope.tillingSelected) {
                $scope.task.type[0] = 1;
                $rootScope.tillingSelected = true;
            }else{
                $scope.task.type[0] = 0;
                $rootScope.tillingSelected = false;
            }
        };
        $scope.plantingCheck = function(){
            if(!$rootScope.plantingSelected) {
                $scope.task.type[1] = 2;
                $rootScope.plantingSelected = true;
            }else{
                $scope.task.type[1] = 0;
                $rootScope.plantingSelected = false;
            }
        };
        $scope.pruningCheck = function(){
            if(!$rootScope.pruningSelected) {
                $scope.task.type[2] = 3;
                $rootScope.pruningSelected = true;
            }else{
                $scope.task.type[2] = 0;
                $rootScope.pruningSelected= false;
            }
        };
        $scope.harvestingCheck = function(){
            if(!$rootScope.harvestingSelected) {
                $scope.task.type[3] = 4;
                $rootScope.harvestingSelected = true;
            }else{
                $scope.task.type[3] = 0;
                $rootScope.harvestingSelected = false;
            }
        };
        $scope.fertilizingCheck = function(){
            if(!$rootScope.fertilizingSelected) {
                $scope.task.type[4] = 5;
                $rootScope.fertilizingSelected = true;
            }else{
                $scope.task.type[4] = 0;
                $rootScope.fertilizingSelected = false;
            }
        };

        $scope.wateringCheck = function(){
            if(!$rootScope.wateringSelected) {
                $scope.task.type[5] = 6;
                $rootScope.wateringSelected = true;
            }else{
                $scope.task.type[5] = 0;
                $rootScope.wateringSelected = false;
            }
        };
        $scope.scoutingCheck = function(){
            if(!$rootScope.scoutingSelected) {
                $scope.task.type[6] = 7;
                $rootScope.scoutingSelected = true;
            }else{
                $scope.task.type[6] = 0;
                $rootScope.scoutingSelected = false;
            }
        };
        $scope.addMember=function(member){
            var found =false;
            var a = member.split(".");
            if(a!=undefined) {
                var memberID = a[0];
                for(var j=0;j< $scope.task.worker.length;j++){
                    if($scope.task.worker[j] == memberID){
                        found =true;
                    }
                }
                if(!found) {
                    $scope.name[$i] = a[1];
                    $scope.task.worker[$i] = memberID;
                    $i++;
                }
            }
        };
        $scope.removeMember=function(memberID){
            for(var j=0;j< $scope.task.worker.length;j++){
                if($scope.task.worker[j] == memberID){
                    $scope.task.worker.splice(j,1);
                    $scope.name.splice(j,1);
                    $i--;
                }
            }
        };
    }]);





taskMainController.controller('timeLineTaskController', ['$scope', '$http', '$routeParams', '$route', '$rootScope','$filter','taskService',
    function ($scope, $http, $routeParams, $route, $rootScope,$filter,taskService) {
        $scope.tillingCount =0;
        $scope.plantingCount =0;
        $scope.pruningCount =0;
        $scope.harvestingCount =0;
        $scope.fertilizingCount=0;
        $scope.wateringCount=0;
        $scope.scoutingCount=0;
        $scope.check =false;
        if($rootScope.User==null){
            $location.path("login");
        }
        Date.prototype.withoutTime = function () {
            var d = new Date(this);
            d.setHours(0, 0, 0, 0);
            return d
        };
        $scope.set = new Array();
        $scope.icon = new Array();
        $scope.toDay =  $filter('date')(new Date(),"yyyy-MM-dd");
        $http.get('taskList?id='+$rootScope.User.id).success(function(data){
            $scope.taskList = data[0].task_list;
            for(var i=0;i<data[0].task_list.length;i++) {
                    $scope.check = true;
                    if ($scope.taskList[i].pictureLocation != '') {
                        var showImage = '<img class="img-responsive" src="' + $scope.taskList[i].pictureLocation + '">';
                    }
                    var colorBadge = '';
                    var badgeIcon = '';
                    if ($scope.taskList[i].status == "Working") {
                        colorBadge = 'warning';
                        badgeIcon = 'glyphicon-edit';
                    } else if ($scope.taskList[i].status == "Late") {
                        colorBadge = 'danger';
                        badgeIcon = 'glyphicon-exclamation-sign';
                    }else if ($scope.taskList[i].status == "Done") {
                        colorBadge = 'success';
                        badgeIcon = 'glyphicon-ok';
                    }else if ($scope.taskList[i].status == "Late done" ) {
                        colorBadge = 'danger';
                        badgeIcon = 'glyphicon-ok';
                    }else {
                        colorBadge = 'info';
                        badgeIcon = 'glyphicon-map-marker';
                    }
                    for (var j = 0; j < data[0].task_list[i].activity_type.length; j++) {
                        $scope.icon[j] = data[0].task_list[i].activity_type[j].name;
                    }
                    if($scope.taskList[i].status!="Done"&&$scope.taskList[i].status!="Late done") {
                        for (var k = 0; k < data[0].task_list[i].activity_type.length; k++) {
                            switch (data[0].task_list[i].activity_type[k].name) {
                                case 'tilling' :
                                    $scope.tillingCount++;
                                    break;
                                case 'planting':
                                    $scope.plantingCount++;
                                    break;
                                case 'pruning' :
                                    $scope.pruningCount++;
                                    break;
                                case 'harvesting' :
                                    $scope.harvestingCount++;
                                    break;
                                case 'fertilizing' :
                                    $scope.fertilizingCount++;
                                    break;
                                case 'watering':
                                    $scope.wateringCount++;
                                    break;
                                case 'scouting':
                                    $scope.scoutingCount++;
                                    break;
                            }
                        }
                    }
                    $scope.set[i] = {
                        badgeClass: colorBadge,
                        badgeIconClass: badgeIcon,
                        title: data[0].task_list[i].plant.plot.name + '->' + data[0].task_list[i].plant.name,
                        when: $scope.taskList[i].date + ' ' + $scope.taskList[i].time,
                        who: {
                            name: $scope.taskList[i].owner_task.name + ' ' + $scope.taskList[i].owner_task.lastname,
                            id: $scope.taskList[i].owner_task.id
                        },
                        titleContentHtml: showImage,
                        contentHtml: $scope.taskList[i].description,
                        icons: $scope.icon,
                        username: $scope.taskList[i].owner_task.username,
                        taskID: $scope.taskList[i].id,
                        status: $scope.taskList[i].status
                    };
                    $scope.icon = new Array();
                    showImage = null;

            }
                console.log($scope.set);
                $scope.events = $scope.set;
                $scope.addEvent = function () {
                    $scope.events.push({
                        badgeClass: 'info',
                        badgeIconClass: 'glyphicon-check',
                        title: 'First heading',
                        when: '3 hours ago via Twitter',
                        content: 'Some awesome content.'
                    });

                };
                $scope.acceptTask = function (id, status) {
                    $http.post("status", {id: id, status: status}).success(function (data) {
                        alert("Success");
                        $route.reload();
                    }).error(function (error) {
                        alert("There is a problem! Your request has not been fulfilled, please try again");
                    })
                };
                $scope.finishTask = function (id, status) {
                    $http.post("status", {id: id, status: status}).success(function (data) {
                        alert("Success");
                        $route.reload();
                    }).error(function (error) {
                        alert("There is a problem! Your request has not been fulfilled, please try again");
                    })
                };
                // optional: not mandatory (uses angular-scroll-animate)
                $scope.animateElementIn = function ($el) {
                    $el.removeClass('hidden');
                    $el.addClass('bounce-in');
                };
                // optional: not mandatory (uses angular-scroll-animate)
                $scope.animateElementOut = function ($el) {
                    $el.addClass('hidden');
                    $el.removeClass('bounce-in');
                };
            }).error(
            function(error){
                if(error.status=="500"){
                    alert("There is a problem! Your request has not been fulfilled, please try again");
                }
            }
        );
    }]);
taskMainController.controller('overAllTaskController',['$scope','$routeParams','$route', '$interval','$http','$location', '$rootScope','taskService',
    function ($scope,$routeParams,$route,$interval, $http,$location, $rootScope,taskService) {
       var remaining =0;
       var working=0;
       var done =0;
       var lateDone =0;
       var late=0;
        if($rootScope.User==null){
            $location.path("login");
        }
        $http.get("allMember?id=" + $rootScope.FarmId).success(function (data) {
            $scope.members = data;
            if( $scope.members!=undefined) {
                for(var i=0;i<$scope.members.length;i++)
                {
                    if($scope.members[i].username==$rootScope.User.username){
                        $scope.members.splice(i,1);
                    }
                }
                $scope.loadMember = true;
            }
        });
        $http.get("top3?id=" + $rootScope.FarmId).success(function (data) {
            $scope.tops = data;
        });
        var id=   $rootScope.FarmId;
        $http.get("task?id="+id).success(function(data){
        $scope.tasks = data;
        for(var i=0;i<$scope.tasks.length;i++){
            if($scope.tasks[i].status=="Remaining"){
                remaining++;
            }else if($scope.tasks[i].status=="Done"){
                done++;
            }else if($scope.tasks[i].status=="Late done"){
                lateDone++;
            }else if($scope.tasks[i].status=="Late"){
                late++;
            }else if($scope.tasks[i].status=="Working"){
                working++;
            }
        }
            $scope.chartObject = {
                "type": "PieChart",
                "displayed": false,
                "data": {
                    "cols": [
                        {
                            "id": "status",
                            "label": "Status",
                            "type": "string",
                            "p": {}
                        },
                        {
                            "id": "count",
                            "label": "count",
                            "type": "number",
                            "p": {}
                        }
                    ],
                    "rows": [
                        {
                            "c": [
                                {
                                    "v": "remaining"
                                },
                                {
                                    "v": remaining
                                }
                            ]
                        },
                        {
                            "c": [
                                {
                                    "v": "working"
                                },
                                {
                                    "v": working
                                }
                            ]
                        },
                        {
                            "c": [
                                {
                                    "v": "done"
                                },
                                {
                                    "v": done
                                }
                            ]
                        },
                        {
                            "c": [
                                {
                                    "v": "late done"
                                },
                                {
                                    "v": lateDone
                                }
                            ]
                        },
                        {
                            "c": [
                                {
                                    "v": "late"
                                },
                                {
                                    "v": late
                                }
                            ]
                        }
                    ]
                },
                "options": {
                    backgroundColor: '#F4EBDA',
                    "title": "",
                    "isStacked": "true",
                    "fill": 20,
                    "displayExactValues": true,
                    "vAxis": {
                        "title": "Count",
                        "gridlines": {
                            "count": 10
                        }
                    },
                    "hAxis": {
                        "title": "Status"
                    }
                },
                "formatters": {}
            }
        }).error(function(error){
            if(error.status=="500"){
                alert("There is a problem! Your request has not been fulfilled, please try again");
            }
        });
        $scope.deleteTask= function(TaskID){
            var answer = confirm("Do you want to delete task?");
            if(answer) {
                taskService.delete({id: TaskID}, function (data) {
                    alert("Success");
                    $route.reload();
                }, function (error) {
                    if(error.status=="500"){
                        alert("There is a problem! Your request has not been fulfilled, please try again");
                    }
                })
            }
        }
    }]);