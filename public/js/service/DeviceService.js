/**
 * Created by USER on 7/16/2015.
 */
'use strict';
var deviceService = angular.module('deviceServices',['ngResource']);
deviceService.factory('deviceService',function($resource){
    return $resource('device/:id', { id: '@_id' }, {
        update: {
            method: 'PUT' // this method issues a PUT request
        }});

});
