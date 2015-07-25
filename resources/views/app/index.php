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
    <!-- Bootstrap core CSS -->

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <!-- Custom styles for this template -->
    <link href="assets/css/map.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <!--Main App-->
    <script src="js/app.js"></script>

    <!--Js Controller App-->
    <script src="js/controller/FarmController.js"></script>
    <script src="js/controller/PlotController.js"></script>
    <script src="js/controller/PlantController.js"></script>
    <script src="js/controller/SensingDeviceController.js"></script>
    <!--Js Service App-->
    <script src="js/service/PlotService.js"></script>
    <script src="js/service/FarmService.js"></script>
    <script src="js/service/PlantService.js"></script>
    <script src="js/service/DeviceService.js"></script>

</head>
<body ng-app="ms4sf">
<section id="container" >
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right"></div>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo"><b>MS4SF</b></a>
        <div class="nav notify-row" id="top_menu">
        </div>
   </header>
    <!--header end-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-desktop"></i>
                        <span>Farm management</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="#/showFarmList">View farm list</a></li>
                        <li><a  href="#/addFarm">Add farm</a></li>
                    </ul>
                </li>
                <li class="sub-menu" ng-show="plotManagement">
                    <a href="javascript:;" >
                        <i class="fa fa-inbox"></i>
                        <span>Plot management</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="#/viewPlotList/{{FarmId}}">View plot list</a></li>
                        <li><a  href="#/addPlot">Add plot</a></li>
                    </ul>
                </li>
                <li class="sub-menu" ng-show="plantManagement">
                    <a href="javascript:;" >
                        <i class="fa fa-pagelines"></i>
                        <span>Plant Management</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="#/viewPlant">View plant list</a></li>
                        <li><a  href="#/addPlant">Add plant</a></li>
                    </ul>
                </li>
                <li class="mt">
                    <a href="#/sensingDeviceList">
                        <i class="fa fa-cog"></i>
                        <span>S.Device management</span>
                    </a>
                </li>
                <li class="sub-menu" ng-show="deviceSummary">
                    <a href="javascript:;" >
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Sensor Monitoring</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="#/viewDevice/{{deviceId}}">Daily summary</a></li>
                        <li><a  href="#/viewWeeklySummary/{{deviceId}}">Weekly summary</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
    <ng-view>
        Loading...
    </ng-view>
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<!--script for this page-->
<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>
<!--script for this page-->
</body>
</html>