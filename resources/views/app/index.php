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
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
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
    <script src="js/controller/testMapController.js"></script>
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
        <div class="sidebar-toggle-box ">
            <div class="fa fa-bars tooltips" data-placement="right"></div>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo"><b>MS4SF</b></a>
        <div class="nav " id="top_menu" style="font-size: 20px;color: #ffffff;padding-top: 10px">
            <div class="row" ng-show="SelectedFarm">
                <b class="col-lg-5" >{{FarmName}}<label ng-show="SelectedPlot">-->{{PlotName}}</label><label ng-show="SelectedDevice">-->{{Device_id}}</label></b>
            </div>
        </div>
   </header>
    <!--header end-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <ul class="sidebar-menu" id="nav-accordion">
            <!-- sidebar menu start-->
            <li class="mt">
                <a href="#/showFarmList">
                    <i class="fa fa-desktop"></i>
                    <span>My farm</span>
                </a>
            </li>
                <li class="mt" ng-hide="true">
                    <a href="#/test">
                        <i class="fa fa-map-marker"></i>
                        <span>Test map</span>
                    </a>
                </li>
                <li class="sub-menu" >
                    <a href="javascript:;" >
                        <i class="fa fa-inbox"></i>
                        <span>Farm monitoring</span>
                    </a>
                    <ul class="sub" ng-controller="NavigationCtrl">
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

                <li class="mt">
                    <a href="#/sensingDeviceRegister">
                        <i class="fa fa-cog"></i>
                        <span>Admin Management</span>
                    </a>
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
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<!--script for this page-->
<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

<!--custom switch-->
<script src="assets/js/bootstrap-switch.js"></script>

<!--custom tagsinput-->
<script src="assets/js/jquery.tagsinput.js"></script>

<!--custom checkbox & radio-->

<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


<script src="assets/js/form-component.js"></script>


<script>
    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>>

</body>
</html>