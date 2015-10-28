'use strict';
var testMainController = angular.module('testController',['farmServices','uiGmapgoogle-maps']);

testMainController.controller("SearchBoxController",['$scope', '$timeout', 'uiGmapLogger', '$http','uiGmapGoogleMapApi'
, function ($scope, $timeout, $log, $http, GoogleMapApi) {
$log.doLog = true;

GoogleMapApi.then(function(maps) {
maps.visualRefresh = true;
$scope.defaultBounds = new google.maps.LatLngBounds(
new google.maps.LatLng(40.82148, -73.66450),
new google.maps.LatLng(40.66541, -74.31715));
$scope.map.bounds = {
northeast: {
latitude:$scope.defaultBounds.getNorthEast().lat(),
longitude:$scope.defaultBounds.getNorthEast().lng()
},
southwest: {
latitude:$scope.defaultBounds.getSouthWest().lat(),
longitude:-$scope.defaultBounds.getSouthWest().lng()

}
};
$scope.searchbox.options.bounds = new google.maps.LatLngBounds($scope.defaultBounds.getNorthEast(), $scope.defaultBounds.getSouthWest());
});

angular.extend($scope, {
selected: {
options: {
visible:false

},
templateurl:'window.tpl.html',
templateparameter: {}
},
map: {
control: {},
center: {
latitude: 40.74349,
longitude: -73.990822
},
zoom: 12,
dragging: false,
bounds: {},
markers: [],
idkey: 'place_id',
events: {
idle: function (map) {

},
dragend: function(map) {
//update the search box bounds after dragging the map
var bounds = map.getBounds();
var ne = bounds.getNorthEast();
var sw = bounds.getSouthWest();
$scope.searchbox.options.bounds = new google.maps.LatLngBounds(sw, ne);
//$scope.searchbox.options.visible = true;
}
}
},
searchbox: {
template:'searchbox.tpl.html',
options: {
autocomplete:true,
types: ['(cities)'],
componentRestrictions: {country: 'th'}
},
events: {
place_changed: function (autocomplete){

var place = autocomplete.getPlace()

if (place.address_components) {

var newMarkers = [];
var bounds = new google.maps.LatLngBounds();

var marker = {
id:place.place_id,
place_id: place.place_id,
name: place.address_components[0].long_name,
latitude: place.geometry.location.lat(),
longitude: place.geometry.location.lng(),
options: {
visible:false
},
templateurl:'window.tpl.html',
templateparameter: place
};

newMarkers.push(marker);

bounds.extend(place.geometry.location);

$scope.map.bounds = {
northeast: {
latitude: bounds.getNorthEast().lat(),
longitude: bounds.getNorthEast().lng()
},
southwest: {
latitude: bounds.getSouthWest().lat(),
longitude: bounds.getSouthWest().lng()
}
}

_.each(newMarkers, function(marker) {
marker.closeClick = function() {
$scope.selected.options.visible = false;
marker.options.visble = false;
return $scope.$apply();
};
marker.onClicked = function() {
$scope.selected.options.visible = false;
$scope.selected = marker;
$scope.selected.options.visible = true;
};
});

$scope.map.markers = newMarkers;
} else {
console.log("do something else with the search string: " + place.name);
}
}
}


}
});




}]);

testMainController.controller("TestTimelineController",['$rootScope','$document','$timeout','$scope'
    , function ($rootScope, $document, $timeout, $scope) {

        var lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. " +
            "Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor." +
            "Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, " +
            "ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non tortor." +
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";

        $scope.events = [{
            badgeClass: 'info',
            badgeIconClass: 'glyphicon-check',
            title: 'First heading',
            when: '11 hours ago via Twitter',
            content: 'Some awesome content.'
        }, {
            badgeClass: 'warning',
            badgeIconClass: 'glyphicon-credit-card',
            title: 'Second heading',
            when: '12 hours ago via Twitter',
            content: 'More awesome content.'
        }, {
            badgeClass: 'default',
            badgeIconClass: 'glyphicon-credit-card',
            title: 'Third heading',
            titleContentHtml: '<img class="img-responsive" src="http://www.freeimages.com/assets/183333/1833326510/wood-weel-1444183-m.jpg">',
            contentHtml: lorem,
            footerContentHtml: '<a href="">Continue Reading</a>'
        }];

        $scope.addEvent = function() {
            $scope.events.push({
                badgeClass: 'info',
                badgeIconClass: 'glyphicon-check',
                title: 'First heading',
                when: '3 hours ago via Twitter',
                content: 'Some awesome content.'
            });

        };
        // optional: not mandatory (uses angular-scroll-animate)
        $scope.animateElementIn = function($el) {
            $el.removeClass('hidden');
            $el.addClass('bounce-in');
        };

        // optional: not mandatory (uses angular-scroll-animate)
        $scope.animateElementOut = function($el) {
            $el.addClass('hidden');
            $el.removeClass('bounce-in');
        };
    }]);