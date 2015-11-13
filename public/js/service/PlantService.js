/**
 * Created by USER on 7/20/2015.
 */
'use strict';
var plantService = angular.module('plantServices',['ngResource']);
plantService.factory('plantService',function($resource){
    return $resource('index.php/plant/:id', { id: '@_id' }, {
        update: {
            method: 'PUT' // this method issues a PUT request
        }});
});
