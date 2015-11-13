/**
 * Created by USER on 11/16/2015.
 */
'use strict';
var taskService = angular.module('taskServices',['ngResource']);
taskService.factory('taskService',function($resource){
    return $resource('index.php/task/:id', { id: '@_id' }, {
        update: {
            method: 'PUT' // this method issues a PUT request
        }});
});
