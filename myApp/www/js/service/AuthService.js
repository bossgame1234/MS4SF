var loginService = angular.module('loginServices',['ngResource']);
loginService.factory('loginService',function($resource){
    return $resource('../../public/api/authenticate/:id', { id: '@_id',callback: 'JSON_CALLBACK' }, {
        update: {
            method: 'PUT' // this method issues a PUT request
        }});
});

//
//$http.jsonp(url, { params : {
//    lat : $rootScope.Latitude.toString(),
//    lon : $rootScope.Longitude.toString(),
//    appid : "bd82977b86bf27fb59a04b61b657fb6f",
//    callback: 'JSON_CALLBACK'
//}}).
//    success(function(data, status, headers, config) {
//        $scope.weather = data;
//        if($scope.weather.sys.country=="TH"){
//            $scope.weather.sys.country="Thailand";
//        }
//    }).
//    error(function(data, status, headers, config) {
//        // Log an error in the browser's console.
//        $log.error('Could not retrieve data from ' + url);
//    });