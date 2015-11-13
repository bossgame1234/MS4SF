// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js
angular.module('starter', [
  'ionic',
  'ionic-material',
  'ionMdInput',
  'flow',
  'googlechart',
  'uiGmapgoogle-maps',
  'starter.controllers',
  'starter.services',
  'authMainController',
  'loginServices',
  'userMainController',
  'userMainServices',
  'farmMainController',
  'plotMainController',
  'plantMainController',
  'deviceMainController',
  'activityMainController',
  'farmServices',
  'plotServices',
  'plantServices',
  'activityServices',
  'deviceServices'
]).value("rndAddToLatLon", function () {
    return Math.floor(((Math.random() < 0.5 ? -1 : 1) * 2) + 1);
})
.run(function($ionicPlatform,$cookieStore,$rootScope) {

  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
      var authToken = $cookieStore.get('authToken');
      if (authToken != undefined){
          $rootScope.User = authToken;
          $rootScope.UserIdentify= true;
      }
  });
}).config(['uiGmapGoogleMapApiProvider', function (GoogleMapApi) {
        GoogleMapApi.configure({
//    key: 'your api key',
            v: '3.17',
            libraries: 'weather,geometry,visualization,places'
        });
    }])
.controller('WindowCtrl', function ($scope) {
    $scope.place = {};
    $scope.showPlaceDetails = function(param) {
        $scope.place = param;
    }
})
.run(['$templateCache', function ($templateCache) {
        $templateCache.put('searchbox.tpl.html', '<input id="pac-input" class="pac-controls" type="text" placeholder="Search">');
        $templateCache.put('window.tpl.html', '<div ng-controller="WindowCtrl" ng-init="showPlaceDetails(parameter)">{{place.name}}</div>');
    }])
.config(function($stateProvider, $urlRouterProvider,$ionicConfigProvider,flowFactoryProvider) {
      $ionicConfigProvider.views.maxCache(0);
      flowFactoryProvider.defaults = {
          target: '',
          permanentErrors: [ 500, 501],
          maxChunkRetries: 1,
          chunkRetryInterval: 5000,
          simultaneousUploads: 4,
          singleFile: true,
          chunkSize: 1000*1000
      };
      flowFactoryProvider.on('catchAll', function (event) {
          console.log('catchAll', arguments);
      });
        // Can be used with different implementations of Flow.js
        // flowFactoryProvider.factory = fustyFlowFactory;
  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider

  // setup an abstract state for the tabs directive
    .state('app', {
    url: '/app',
    abstract: true,
    templateUrl: 'templates/menu.html',
    controller: 'AppCtrl'
  })

  // Each tab has its own nav history stack:

  .state('app.dash', {
    url: '/dash',
    views: {
      'menuContent': {
        templateUrl: 'templates/tab-dash.html',
        controller: 'DashCtrl'
      }
    }
  })
  .state('app.login', {
        url: '/login',
        views: {
          'menuContent': {
            templateUrl: 'templates/authView.html',
            controller: 'AuthController'
          },
            'fabContent': {
                template: ''
            }
        }
      })
  .state('app.register', {
        url: '/register',
        views: {
          'menuContent': {
            templateUrl: 'templates/registerPage.html',
            controller: 'registerController'
          },
            'fabContent': {
                template:''
            }
        }
      })
      .state('app.myProfile',{
        url: '/myProfile',
        views: {
          'menuContent': {
            templateUrl: 'templates/viewMemberProfile.html',
            controller: 'viewOwnProfileController'
          },
            'fabContent': {
                template:''
            }
        }
    })
      .state('app.editProfile',{
                url: '/editProfile',
                views: {
                    'menuContent': {
                        templateUrl: 'templates/registerPage.html',
                        controller: 'editProfileController'
                    }
                },
                'fabContent': {
                template: ''
                }
      })
      .state('app.farmList', {
        url: '/farmList',
        views: {
            'menuContent': {
                templateUrl: 'templates/farmList.html',
                controller: 'showFarmController'
            },
            'fabContent': {
                template: '<button id="fab-addFarm" ui-sref="app.addFarm" class="button button-fab button-fab-bottom-right expanded button-energized-900 spin" style="top :70%"><i class="icon ion-plus"></i></button>',
                controller: function ($timeout) {
                    $timeout(function () {
                        document.getElementById('fab-addFarm').classList.toggle('on');
                    }, 400);
                }
            }
         }
        })
      .state('app.addFarm', {
          url: '/addFarm',
          views: {
              'menuContent': {
                  templateUrl: 'templates/addFarmPage.html',
                  controller: 'addFarmController'
              },
              'fabContent': {
                  template: ''
              }
          }
      })
      .state('app.editFarm', {
          url: '/editFarm/:id',
          views: {
              'menuContent': {
                  templateUrl: 'templates/addFarmPage.html',
                  controller: 'editFarmController'
              },
              'fabContent': {
                  template: ''
              }
          }
      })
      .state('app.plotList', {
          url: '/plotList',
          views: {
              'menuContent': {
                  templateUrl: 'templates/plotList.html',
                  controller: 'listPlotController'
              },
              'fabContent': {
                  template: '<button id="fab-addPlot" ui-sref="app.addPlot" class="button button-fab button-fab-bottom-right expanded button-energized-900 spin" style="top :70%"><i class="icon ion-plus"></i></button>',
                  controller: function ($timeout) {
                      $timeout(function () {
                          document.getElementById('fab-addPlot').classList.toggle('on');
                      }, 400);
                  }
              }
          }
      })
      .state('app.addPlot', {
          url: '/addPlot',
          views: {
              'menuContent': {
                  templateUrl: 'templates/addPlotPage.html',
                  controller: 'addPlotToFarmController'
              },
              'fabContent': {
                  template: ''
              }
          }
      })
      .state('app.editPlot', {
          url: '/editPlot/:id',
          views: {
              'menuContent': {
                  templateUrl: 'templates/addPlotPage.html',
                  controller: 'editPlotController'
              },
              'fabContent': {
                  template: ''
              }
          }
      })
      .state('app.plantList', {
          url: '/plantList',
          views: {
              'menuContent': {
                  templateUrl: 'templates/plantList.html',
                  controller: 'listPlantController'
              },
              'fabContent': {
                  template: '<button id="fab-addPlant" ui-sref="app.addPlant" class="button button-fab button-fab-bottom-right expanded button-energized-900 spin" style="top :70%"><i class="icon ion-plus"></i></button>',
                  controller: function ($timeout) {
                      $timeout(function () {
                          document.getElementById('fab-addPlant').classList.toggle('on');
                      }, 400);
                  }
              }
          }
      })
      .state('app.addPlant', {
          url: '/addPlant',
          views: {
              'menuContent': {
                  templateUrl: 'templates/addPlantPage.html',
                  controller: 'addPlantToPlotController'
              },
              'fabContent': {
                  template:''
              }
          }
      })
      .state('app.editPlant', {
          url: '/editPlant/:id',
          views: {
              'menuContent': {
                  templateUrl: 'templates/addPlantPage.html',
                  controller: 'editPlantController'
              },
              'fabContent': {
                  template:''
              }
          }
      })
      .state('app.deviceList', {
          url: '/deviceList',
          views: {
              'menuContent': {
                  templateUrl: 'templates/devicelist.html',
                  controller: 'PlotWithDeviceController'
              },
              'fabContent': {
                  template:''
              }
          }
      })
      .state('app.fastMonitor', {
                url: '/fastMonitor',
                views: {
                    'menuContent': {
                        templateUrl: 'templates/smartSelectDevice.html',
                        controller: 'smartMonitoringController'
                    },
                    'fabContent': {
                        template:''
                    }
                }
            })
      .state('app.monitor', {
          url: '/monitor',
          views: {
              'menuContent': {
                  templateUrl: 'templates/ViewDeviceInfoPage.html',
                  controller: 'sensorMonitoringSummaryController'
              },
              'fabContent': {
                  template:''
              }
          }
      })
      .state('app.activityTimeline', {
          url: '/activity',
          views: {
              'menuContent': {
                  templateUrl: 'templates/activityTimelinePage.html',
                  controller: 'timeLineActivityController'
              },
              'fabContent': {
                  template: '<button id="fab-addActivity" ui-sref="app.addActivity" class="button button-fab button-fab-bottom-right expanded button-energized-900 spin" style="top :70%"><i class="icon ion-plus"></i></button>',
                  controller: function ($timeout) {
                      $timeout(function () {
                          document.getElementById('fab-addActivity').classList.toggle('on');
                      }, 400);
                  }
          }
        }
      })
      .state('app.addActivity',{
        url: '/addActivity',
            views: {
            'menuContent': {
                templateUrl: 'templates/addActivityPage.html',
                    controller: 'addActivityController'
            },
            'fabContent': {
                template:''
            }
        }
    })
      .state('app.editActivity',{
          url: '/editActivity',
          views: {
              'menuContent': {
                  templateUrl: 'templates/addActivityPage.html',
                  controller: 'addActivityController'
              },
              'fabContent': {
                  template:''
              }
          }
      })
      //
      //.state('tab.addFarm',{
      //  url: '/addFarm',
      //  views: {
      //    'tab-register': {
      //      templateUrl: 'templates/addFarmPage.html',
      //      controller: 'addFarmController'
      //    }
      //  }
      //})
      ;
  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/app/login');

});
