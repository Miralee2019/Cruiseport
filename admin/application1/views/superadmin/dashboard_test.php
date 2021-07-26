<?php error_reporting(0); ?>
<?php
// echo "<pre>";
// print_r($dashboard_user);
// echo "</pre>";
// die();
?>
<!DOCTYPE html>

<html lang="en">

<!-- Added by HTTrack -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cash Rub</title>
    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/charts/d3/lines/lines_basic.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/charts/d3/lines/lines_basic_bivariate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/charts/d3/lines/lines_basic_area.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/chartScrollbar/d3/lines/lines_basic_multi_series.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/charts/d3/lines/lines_basic_stacked.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/charts/d3/lines/lines_basic_stacked_nest.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/charts/d3/lines/lines_basic_gradient.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/dashboard.js"></script>
    <!-- /theme JS files -->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
    <script src="<?php echo base_url(); ?>superassets/utils.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" /> -->
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>    
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/none.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <!-- Global stylesheets -->
    <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/dashboard.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">  
    <script  src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <!-- /global stylesheets -->
    <style type="text/css">
    body{
        font-family:"Raleway", sans-serif !important;
        overflow-x: hidden !important;
    }
    #chartdiv {
        width   : 100%;
        height  : 500px;
    }
    .amcharts-chart-div a{
        display: none !important;
    }
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    #chartdiv2 {
        width: 100%;
        height: 500px;
    }
    #chartdiv3 {
        width: 100%;
        height: 370px;
        font-size: 11px;
    }
    #chartdiv4 {
        width: 100%;
        height: 450px;
        font-size: 11px;
    }
    .table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th {
        padding: 4px 10px!important;
    }
    #changedate1,#changedate2 {
        border-radius: 3px!important;       
    }
</style>

</head>
<body>
    <!-- Main navbar -->
    <?php include 'include/mainheader.php'; ?>
    <!-- /main navbar -->
    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
            <!-- Main sidebar -->
            <?php include 'include/supersidebar.php'; ?>
            <!-- /main sidebar -->
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Content area -->
                <div class="content">
                    <h6 class="content-group text-semibold" style="font-size: 19px;">
                        System Details
                        <small class="display-block"></small>
                    </h6>
                    <!-- Main charts -->
                    <div class="row">
                        <!-- Quick stats boxes -->
                        <!-- <div class="row"> -->
                            <div class="col-lg-12 col-lg-offset-6">
                            <form action="<?= base_url();?>index.php/superadmin/superdashbored" method="post">
                                <label>Custom Search: </label>
                                <div class="input-group date form_date col-md-12" id="chh1" style="margin-left: 102px;margin-top: -36px;" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar" style="float: left;"></span>
                                    </span>
                                    <input class="form-control" size="4" style="width:130px;" data-date-start-date="+0d" id="changedate1" name="startdate" placeholder="Start Date" value="<?php echo $sdate;?>" readonly="" type="text">
                                </div>
                                <input id="dtp_input1" value="" type="hidden"><br>
                                <h7 style="color: red;float: left;" id="date_error"></h7>
                                <div class="input-group date form_date2 col-md-12" id="chh2" style="float:right;margin-right: -276px;margin-top: -56px;" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar" style="float: left;"></span>
                                    </span>
                                    <input class="form-control" size="4" style="width:130px;" data-date-start-date="+0d" id="changedate2" name="enddate" placeholder="End Date" value="<?php echo $edate;?>" readonly="" type="text">
                                </div>
                                <input id="dtp_input2" value="" type="hidden"><br>
                                <h7 style="color: red;float: left;" id="date_error2"></h7>
                                <input value="Apply" id="getValidate" style="margin-left: 455px;margin-top: -137px;padding-left:10px !important;" class="btn bg-blue btn-labeled heading-btn" type="submit">
                                <a href="<?php echo base_url(); ?>index.php/superadmin/superhome" class="btn bg-blue btn-labeled heading-btn" style="margin-left:5px;padding-left:10px !important; margin-top:-137px;" title="Refresh"><span class="glyphicon glyphicon-refresh"></span></a>
                                <!-- <input type="reset" id="getRefresh" value="Refresh"  style="margin-left:5px;padding-left:10px !important; margin-top:-137px;" class="btn bg-blue btn-labeled heading-btn" >
                                -->
                            </form>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel twitter">
                                <div class="panel-body">
                                    <div class="col-lg-4 col-xs-4">
                                        <i class="icon-user" style="font-size: 35px;" ></i>    
                                    </div>
                                    <div class="col-lg-8 col-xs-8" style="margin-top: -10px;" >
                                        <div class="col-md-12 col-xs-12" style="margin-top: -8px;">
                                            <h1 class="no-margin" > <b style="text-align: center;font-size: 30px;margin-left: 0px;" > <?php echo count($total_users);?> </b> </h1>
                                        </div>
                                        <div class="col-md-12 col-xs-12"  style="margin-top:-10px;">
                                            <span ><?php echo strtoupper('Total Users') ?></span>    
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div id="members-online"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel facebook">
                                <div class="panel-body">
                                    <div class="col-lg-4 col-xs-4">
                                        <i class='icon-store' style="font-size: 35px;"></i>    
                                    </div>
                                    <div class="col-lg-8 col-xs-8" style="margin-top: -10px;" >
                                        <div class="col-md-12 col-xs-12" style="margin-top: -8px;">
                                            <h1 class="no-margin"> <b style="text-align: center;font-size: 30px;margin-left: 0px;"> <?php echo count($total_store);?> </b> </h1>
                                        </div>
                                        <div class="col-md-12 col-xs-12" style="margin-top:-10px;">
                                            <span><?php echo strtoupper('Total shop') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="server-load"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel walk">
                                <div class="panel-body">
                                    <div class="col-lg-4 col-xs-4">
                                        <img src="<?php echo base_url(); ?>assets/vdvds.png" width="45" height="35">
                                    </div>
                                    <div class="col-lg-8 col-xs-8" style="margin-top: -10px;" >
                                        <div class="col-md-12 col-xs-12" style="margin-top: -8px;">
                                            <h1 class="no-margin"> <b style="text-align: center;font-size: 30px;margin-left: 0px;" > <?php if($total_walkins){ echo count($total_walkins); } else { echo "0"; } ;?> </b> </h1>
                                        </div>
                                        <div class="col-md-12 col-xs-12" style="margin-top:-10px;">
                                            <span><?php echo strtoupper('walkins') ?></span>	
                                        </div>
                                    </div>
                                </div>
                                <div id="today-revenue"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel purchase">
                                <div class="panel-body">
                                    <div class="col-lg-4 col-xs-4">
                                        <i class="icon-cart-add purchase" style="font-size: 35px;"></i>
                                    </div>
                                    <div class="col-lg-8 col-xs-8" style="margin-top: -10px;" >
                                        <div class="col-md-12 col-xs-12" style="margin-top: -8px;">
                                            <h1 class="no-margin"> <b style="text-align: center;font-size: 30px;margin-left: 0px;"> <?php if($getCountCredits[0]->credits) { echo round($getCountCredits[0]->credits); } else { echo "0"; } ?> </b> </h1>	
                                        </div>
                                        <div class="col-md-12 col-xs-12" style="margin-top:-10px;">
                                            <span style="margin-right: -10px;padding-right:0px;
                                            float:left;"><?php echo strtoupper('Total Credits') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="today-revenue"></div>
                            </div>
                        </div>
                    </div>
                    <div id="add">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-flat" style="height: 450px;">
                                <div class="panel-heading">
                                    <h6 class="panel-title text-semibold" style="font-size: 17px;"><i class="icon-user twitter social-border"></i>&nbsp;User Details</h6>
                                </div>
                                <div id="chartdiv"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-flat" style="height: 450px;">
                                <div class="panel-heading">
                                    <h6 class="panel-title text-semibold" style="font-size: 17px;"><i class="icon-user twitter social-border"></i>&nbsp;Stores Details</h6>
                                </div>
                                <div id="chartdiv2"></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-flat" style="height: 450px;">
                                <div class="panel-heading">
                                    <h6 class="panel-title text-semibold" style="font-size: 17px;"><i class="icon-user twitter social-border"></i>&nbsp;Billing Details</h6>
                                </div>
                                <div id="chartdiv3"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-flat" style="height: 450px;">
                                <div class="panel-heading">
                                    <h6 class="panel-title text-semibold" style="font-size: 17px;"><i class="icon-user twitter social-border"></i>&nbsp;Walkin Details</h6>
                                </div>
                                <div id="chartdiv4"></div>
                            </div>
                        </div>
                    </div>
                </div>                                     
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
        // Datepicker code
        $('.form_date2').datetimepicker({
            language: 'fr',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        }).datetimepicker("update","");

        $('.form_date2').datetimepicker('setEndDate',new Date);
        $('.form_date').datetimepicker({
            language: 'fr',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
        }).datetimepicker("update");
        $('.form_date').datetimepicker('setEndDate',new Date);

        $('#changedate1').change(function(){
            var s_date= $('.form_date').datetimepicker('getDate');
            $('.form_date2').datetimepicker('setDate',s_date);
            $('.form_date2').datetimepicker('setStartDate',s_date);
            $('#errorSelDate').html("");
        });
        
        // $('#getValidate').click(function(){
        //     if($('#changedate1').val() == '' || $('#changedate2').val() == '' ){
        //         $('#errorSelDate').html("Please select Start Date and End Date");
        //         return false;
        //     }
        //     else{
        //         $('#errorSelDate').html("");                             
        //     }
        // });

        $('#getValidate').click(function(){
            if($('#changedate2').val() == '' ){
                alert("Please enter end date");
                return false;
            }

        });



        // Datepicker code
        $.get("<?php echo base_url(); ?>index.php/superadmin/graphCall", function(data, status){
            nice = data.trim();
            <?php
            $CI =& get_instance();
            $CI->load->model('Supermodel');
            ?>
            var chart = AmCharts.makeChart("chartdiv", {
                "type": "serial",
                "theme": "none",
                "marginRight": 40,
                "marginLeft": 40,
                "autoMarginOffset": 140,
                "mouseWheelZoomEnabled":true,
                "dataDateFormat": "YYYY-MM-DD",
                "valueAxes": [{
                    "id": "v1",
                    "axisAlpha": 0,
                    "gridThickness":0,
                    "position": "left",
                    "ignoreAxisWidth":true,
                    "minimum": 0
                }],

                "balloon": {
                    "borderThickness": 1,
                    "shadowAlpha": 0
                },
                //new code - 2nd march 2018
                // "valueScrollbar":{
                //     "oppositeAxis":false,
                //     "offset":50,
                //     "scrollbarHeight": < ?php echo count($dashboard_walkin); ?>
                // },
                // "chartScrollbar": {
                //     "graph": "g1",
                //     "oppositeAxis":false,
                //     "offset":30,
                //     "scrollbarHeight": 20,
                //     "backgroundAlpha": 0,
                //     "selectedBackgroundAlpha": 0.1,
                //     "selectedBackgroundColor": "#888888",
                //     "graphFillAlpha": 0,
                //     "graphLineAlpha": 0.5,
                //     "selectedGraphFillAlpha": 0,
                //     "selectedGraphLineAlpha": 1,
                //     "autoGridCount":true,
                //     "color":"#AAAAAA"
                // },
                //new code - 2nd march 2018
                "graphs": [{
                    "id": "g1",
                    "balloon":{
                        "drop":true,
                        "adjustBorderColor":false,
                        "color":"#000000"
                    },
                    "bullet": "round",
                    "bulletBorderAlpha": 1,
                    "bulletColor": "#FFFFFF",
                    "bulletSize": 5,
                    "hideBulletsCount": 50,
                    "lineThickness": 2,
                    "title": "red line",
                    "useLineColorForBulletBorder": true,
                    "valueField": "value",
                    "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
                }],
                "chartCursor": {
                    "pan": true,
                    "valueLineEnabled": true,
                    "valueLineBalloonEnabled": true,
                    "cursorAlpha":1,
                    "cursorColor":"#258cbb",
                    "limitToGraph":"g1",
                    "valueLineAlpha":0.2,
                    "valueZoomable":true
                },
                "categoryField": "date",
                "categoryAxis": {
                    "parseDates": true,
                    "dashLength": 1,
                    "gridThickness":0,
                    "minorGridEnabled": true
                },
                "dataProvider": <?php echo $dashboard_user; ?>
            });

            chart.addListener("rendered", zoomChart);
            zoomChart();
            function zoomChart() {
                chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
            }
        });
    </script>
    <script type="text/javascript">
        $.get("<?php echo base_url(); ?>index.php/superadmin/graphCall", function(data, status){
            console.log(data);
            nice = data.trim();
            <?php
            $CI =& get_instance();
            $CI->load->model('Supermodel');
            ?>
            var chart = AmCharts.makeChart("chartdiv2", {
                "type": "serial",
                "theme": "none",
                "marginRight": 40,
                "marginLeft": 40,
                "autoMarginOffset": 140,
                "mouseWheelZoomEnabled":true,
                "dataDateFormat": "YYYY-MM-DD",
                "valueAxes": [{
                    "id": "v1",
                    "axisAlpha": 0,
                    "gridThickness":0,
                    "position": "left",
                    "ignoreAxisWidth":true,
                    "minimum": 0
                }],

                "balloon": {
                    "borderThickness": 1,
                    "shadowAlpha": 0
                },
                //new code - 2nd march 2018
                // "valueScrollbar":{
                //     "oppositeAxis":false,
                //     "offset":50,
                //     "scrollbarHeight": < ?php echo count($dashboard_walkin); ?>
                // },
                // "chartScrollbar": {
                //     "graph": "g1",
                //     "oppositeAxis":false,
                //     "offset":30,
                //     "scrollbarHeight": 20,
                //     "backgroundAlpha": 0,
                //     "selectedBackgroundAlpha": 0.1,
                //     "selectedBackgroundColor": "#888888",
                //     "graphFillAlpha": 0,
                //     "graphLineAlpha": 0.5,
                //     "selectedGraphFillAlpha": 0,
                //     "selectedGraphLineAlpha": 1,
                //     "autoGridCount":true,
                //     "color":"#AAAAAA"
                // },
                //new code - 2nd march 2018
                "graphs": [{
                    "id": "g1",
                    "balloon":{
                        "drop":true,
                        "adjustBorderColor":false,
                        "color":"#000000"
                    },
                    "bullet": "round",
                    "bulletBorderAlpha": 1,
                    "bulletColor": "#FFFFFF",
                    "bulletSize": 5,
                    "hideBulletsCount": 50,
                    "lineThickness": 2,
                    "title": "red line",
                    "useLineColorForBulletBorder": true,
                    "valueField": "value",
                    "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
                }],
                "chartCursor": {
                    "pan": true,
                    "valueLineEnabled": true,
                    "valueLineBalloonEnabled": true,
                    "cursorAlpha":1,
                    "cursorColor":"#258cbb",
                    "limitToGraph":"g1",
                    "valueLineAlpha":0.2,
                    "valueZoomable":true
                },
                "categoryField": "date",
                "categoryAxis": {
                    "parseDates": true,
                    "dashLength": 1,
                    "gridThickness":0,
                    "minorGridEnabled": true
                },
                "dataProvider": <?php echo $dashboard_store; ?>
            });

            chart.addListener("rendered", zoomChart);
            zoomChart();
            function zoomChart() {
                chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
            }
        });
    </script>
    <script type="text/javascript">

        var chart = AmCharts.makeChart( "chartdiv3", {

            "type": "serial",

            "theme": "light",

            "dataProvider": <?php echo $dashboard_purchase; ?>,

            "valueAxes": [ {

                "gridColor": "#FFFFFF",

                "gridAlpha": 0.2,

                "dashLength": 0,

                "minimum": 0

            } ],

            "gridAboveGraphs": true,

            "startDuration": 1,

            "graphs": [ {

                "balloonText": "[[category]]: <b>[[value]]</b>",

                "fillAlphas": 0.8,

                "lineAlpha": 0.2,

                "type": "column",

                "valueField": "purchase"

            } ],

            "chartCursor": {

                "categoryBalloonEnabled": false,

                "cursorAlpha": 0,

                // "zoomable": true
                "valueZoomable":true

            },

            "categoryField": "month",

            "categoryAxis": {

                "gridPosition": "start",


                "gridAlpha": 0,

                "tickPosition": "start",

                "tickLength": 15

            },

            //new code - 2nd march 2018

            "valueScrollbar":{

                "oppositeAxis":false,

                "offset":50,

                "scrollbarHeight": <?php echo count($dashboard_purchase); ?>

            },

            "chartScrollbar": {

                "graph": "g1",

                "oppositeAxis":false,

                "offset":30,

                "scrollbarHeight": 20,

                "backgroundAlpha": 0,

                "selectedBackgroundAlpha": 0.1,

                "selectedBackgroundColor": "#888888",

                "graphFillAlpha": 0,

                "graphLineAlpha": 0.5,

                "selectedGraphFillAlpha": 0,

                "selectedGraphLineAlpha": 1,

                "autoGridCount":true,

                "color":"#AAAAAA"

            },

            //new code - 2nd march 2018

        });

    </script>



    <script type="text/javascript">







        $.get("<?php echo base_url(); ?>index.php/superadmin/graphCall", function(data, status){



            nice = data.trim();



            <?php



            $CI =& get_instance();

            $CI->load->model('Supermodel');



            $jan = $CI->Supermodel->getStoreDashboardDataaByMonth("1");

            $feb = $CI->Supermodel->getStoreDashboardDataaByMonth("2");

            $mar = $CI->Supermodel->getStoreDashboardDataaByMonth("3");

            $apr = $CI->Supermodel->getStoreDashboardDataaByMonth("4");

            $may = $CI->Supermodel->getStoreDashboardDataaByMonth("5");

            $jun = $CI->Supermodel->getStoreDashboardDataaByMonth("6");

            $jul = $CI->Supermodel->getStoreDashboardDataaByMonth("7");

            $aug = $CI->Supermodel->getStoreDashboardDataaByMonth("8");

            $sep = $CI->Supermodel->getStoreDashboardDataaByMonth("9");

            $oct = $CI->Supermodel->getStoreDashboardDataaByMonth("10");

            $nov = $CI->Supermodel->getStoreDashboardDataaByMonth("11");

            $dec = $CI->Supermodel->getStoreDashboardDataaByMonth("12");    



            ?>



            var chart = AmCharts.makeChart("chartdiv4", {

                "type": "serial",

                "theme": "none",

                "marginTop": 10,

                "marginRight": 40,

                "marginLeft": 40,

                "autoMarginOffset": 100,

                "mouseWheelZoomEnabled":true,

                "dataDateFormat": "YYYY-MM-DD",

                "valueAxes": [{

                    "id": "v1",

                    "axisAlpha": 0,

                    "gridThickness":0,

                    "position": "left",

                    "ignoreAxisWidth":true,
                    
                    "minimum": 0

                }],

                "balloon": {

                    "borderThickness": 1,

                    "shadowAlpha": 0

                },

                "graphs": [{

                    "id": "g1",

                    "balloon":{

                        "drop":true,

                        "adjustBorderColor":false,

                        "color":"#000000"

                    },

                    "bullet": "round",

                    "bulletBorderAlpha": 1,

                    "bulletColor": "#FFFFFF",

                    "bulletSize": 5,

                    "hideBulletsCount": 50,

                    "lineThickness": 2,

                    "title": "red line",

                    "useLineColorForBulletBorder": true,

                    "valueField": "value",

                    "balloonText": "<span style='font-size:18px;'>[[value]]</span>"

                }],

                "chartCursor": {

                    "pan": true,

                    "valueLineEnabled": true,

                    "valueLineBalloonEnabled": true,

                    "cursorAlpha":1,

                    "cursorColor":"#258cbb",

                    "limitToGraph":"g1",

                    "valueLineAlpha":0.2,

                    "valueZoomable":true

                },

                //new code - 2nd march 2018

                // "valueScrollbar":{

                //     "oppositeAxis":false,

                //     "offset":50,

                //     "scrollbarHeight": <?php echo count($dashboard_walkin); ?>

                // },

                // "chartScrollbar": {

                //     "graph": "g1",

                //     "oppositeAxis":false,

                //     "offset":30,

                //     "scrollbarHeight": 20,

                //     "backgroundAlpha": 0,

                //     "selectedBackgroundAlpha": 0.1,

                //     "selectedBackgroundColor": "#888888",

                //     "graphFillAlpha": 0,

                //     "graphLineAlpha": 0.5,

                //     "selectedGraphFillAlpha": 0,

                //     "selectedGraphLineAlpha": 1,

                //     "autoGridCount":true,

                //     "color":"#AAAAAA"

                // },

                //new code - 2nd march 2018

                "categoryField": "date",

                "categoryAxis": {

                    "parseDates": true,

                    "dashLength": 1,

                    "gridThickness":0,

                    "minorGridEnabled": true

                },

                "dataProvider": <?php echo $dashboard_walkin; ?>

            });



            chart.addListener("rendered", zoomChart);



            zoomChart();



            function zoomChart() {

                chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);

            }







        });





    </script>

    </html>