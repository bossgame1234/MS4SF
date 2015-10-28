<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content="3600">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<head>
    <title>Monitoring For Smart Farm</title>
    <!--Angular Library -->
    <script src="bower_components/angular/angular.js"></script>
    <script src="bower_components/angular-route/angular-route.js"></script>
    <script src="bower_components/angular-resource/angular-resource.js"></script>
    <script src="bower_components/angular-google-maps/dist/angular-google-maps.js"></script>
    <script src="bower_components/angular-google-chart/ng-google-chart.js"></script>
    <script src="bower_components/lodash/lodash.js"></script>
    <script src="bower_components/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="bower_components/satellizer/satellizer.js"></script>
    <script src="bower_components/angular-cookies/angular-cookies.js"></script>
    <script src="bower_components/flow.js/dist/flow.js"></script>
    <script src="bower_components/ng-flow/dist/ng-flow-standalone.js"></script>
    <script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
    <script src="bower_components/angular-scroll-animate/dist/angular-scroll-animate.js"></script>
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/map.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="assets/css/angular-timeline.css" rel="stylesheet"  />
    <link href="assets/css/angular-timeline-bootstrap.css" rel="stylesheet"  />
    <link href="assets/css/angular-timeline-animations.css" rel="stylesheet"/>
    <link href="assets/css/datepicker.css" rel="stylesheet"/>
    <!--Main App-->
    <script src="js/app.js"></script>
    <!--Js Controller App-->
    <script src="js/controller/FarmController.js"></script>
    <script src="js/controller/PlotController.js"></script>
    <script src="js/controller/PlantController.js"></script>
    <script src="js/controller/SensingDeviceController.js"></script>
    <script src="js/controller/testMapController.js"></script>
    <script src="js/controller/AuthController.js"></script>
    <script src="js/controller/UserController.js"></script>
    <script src="js/controller/externalFactorController.js"></script>
    <script src="js/controller/ActivityController.js"></script>
    <!--Js Service App-->
    <script src="js/service/PlotService.js"></script>
    <script src="js/service/FarmService.js"></script>
    <script src="js/service/PlantService.js"></script>
    <script src="js/service/DeviceService.js"></script>
    <script src="js/service/UserService.js"></script>
    <script src="js/service/ActivityService.js"></script>
</head>
<body ng-app="ms4sf">
<section id="container" >
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box " ng-show="UserIdentify">
            <div class="fa fa-bars tooltips" data-placement="right"></div>
        </div>
        <!--logo start-->
            <a class="logo"><b style="font-size: larger;">MS4SF</b></a>
        <div class="top-menu" ng-show="UserIdentify">
            <ul class="pull-right top-menu" style="margin-top: 5px">
                <lable style="font-size: 15px;color: #ffffff;padding-top: 10px">Welcome, {{User.name}} <div ng-controller="logoutController">
                        <a class="logout"  style="font-size: 15px;color: #0000C2;padding-top: 10px;margin-left: 70px" href="" ng-click="logout()"><button class="btn btn-theme04" style="height: 30px;width:60px;padding-top: 3px;padding-left: 5px"> Log out</button></a>
                </lable>
            </ul>
        </div>
        <br>
        <br>
        <div class="nav " style="font-size: 20px;color: #ffffff;margin-top: 10px">
            <div  ng-show="SelectedFarm">
                <b class="col-lg-10" style="margin-left: 17px">{{FarmName}}<label ng-show="SelectedPlot">-->{{PlotName}}</label><label ng-show="SelectedPlant">-->{{plantName}}</label><label ng-show="SelectedDevice">-->{{Device_id}}</label></b>
            </div>
        </div>
   </header>
    <!--header end-->
    <aside >
        <div id="sidebar"  class="nav-collapse " ng-show="UserIdentify">
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><a href="#userProfile"><img ng-if="User.pictureDist" src="{{User.pictureDist}}" class="img-circle" height="100" width="100">
                        <img ng-if="!User.pictureDist" src="assets/img/noimage.png" class="img-circle" height="100" width="100">
                    </a></p>
                <h5 class="centered">{{User.name}}    {{User.lastname}} <a href="#editUserProfile">
                        <i style="color: white" class="fa fa-edit"></i>
                    </a></h5>
            <!-- sidebar menu start-->
                <li class="mt" ng-hide="true">
                    <a href="#/test">
                        <i class="fa fa-map-marker"></i>
                        <span>Test map</span>
                    </a>
                </li>
                <li class="sub-menu" ng-hide="User.role=='admin'">
                    <a href="javascript:;" >
                        <i class="fa fa-inbox"></i>
                        <span>Farm monitoring</span>
                    </a>
                    <ul class="sub" ng-controller="NavigationCtrl">
                        <li ng-class="{ active: isCurrentPath('/showFarmList') }" ><div ng-show="isCurrentPath('/showFarmList')"><a href="#/showFarmList" >Farms</a></div>
                            <a ng-hide="isCurrentPath('/showFarmList')" href="#/showFarmList">Farms</a>
                        </li>
                        <li ng-class="{ active: isCurrentPath('/viewPlotList') }" ><div ng-show="isCurrentPath('/viewPlotList')"><a href="#/viewPlotList" >Plots</a></div>
                            <a ng-hide="isCurrentPath('/viewPlotList')" href="#/viewPlotList">Plots</a>
                        </li>
                        <li ng-class="{ active: isCurrentPath('/viewPlantList') }" ><div ng-show="isCurrentPath('/viewPlantList')"><a href="#/viewPlantList" >Plants</a></div>
                            <a ng-hide="isCurrentPath('/viewPlantList')" href="#/viewPlantList">Plants</a>
                        </li>
                        <li ng-class="{ active: isCurrentPath('/sensingDeviceList') }" ><div ng-show="isCurrentPath('/sensingDeviceList')"><a href="#/sensingDeviceList">Device</a></div>
                        <a ng-hide="isCurrentPath('/sensingDeviceList')"   href="#/sensingDeviceList">Device</a>
                        </li>
                        <li ng-class="{ active: isCurrentPath('/viewDailySummary/{{DeviceId}}') }" ng-show="SelectedDevice">
                          <div>
                            <a ng-hide="isCurrentPath('/viewDailySummary/{{DeviceId}}')" href="#/viewDailySummary/{{DeviceId}}">
                                <button type="button" class="btn btn-theme04 ">Monitor</button>
                            </a>
                              </div>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#/timeLineActivity" ng-show="SelectedFarm">
                        <i class="fa fa-leaf"></i>
                        <span>Farm's activity</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="#/weatherForecast" ng-show="SelectedFarm&&User.role == 'farmer'||User.role == 'farmer worker'"">
                        <i class="fa fa-cloud"></i>
                        <span>Weather Forecast</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="#/marketPrice" ng-show="User.role == 'farmer'"">
                        <i class="fa fa-usd"></i>
                        <span>Market Price</span>
                    </a>
                </li>
                <li class="sub-menu" ng-show="User.role == 'admin'">
                    <a href="#/sensingDeviceRegister">
                        <i class="fa fa-cog"></i>
                        <span>Admin Management</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <div ng-controller="AuthController">
    <ng-view>
        Loading...
    </ng-view>
    </div>
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

<script src="assets/js/angular-timeline.js"></script>
<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<!--script for this page-->
<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

<!--custom switch-->
<script src="assets/js/bootstrap-switch.js"></script>

<!--custom tagsinput-->
<script src="assets/js/jquery.tagsinput.js"></script>
<!--date picker-->
<script src="assets/js/bootstrap-datepicker.js"></script>
<!--time picker-->
<script src="assets/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
</body>
</html>