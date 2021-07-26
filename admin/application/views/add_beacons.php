<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cash Rub</title>
        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->
        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png" />
        <!-- /core JS files -->
        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_inputs.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
        <!-- /theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>
        <style>
        html,body{
            overflow-x: hidden;
        }
            .btn-labeled > b {
                position: absolute;
                top: -1px;
                left: -1px;
                background-color: rgba(0, 0, 0, .15);
                display: block;
                line-height: 1;
                padding: 13.5px;
            }
            .btn-labeled {
                padding-left: 48px;
                padding-right: 20px;
                padding-top: 10px;
                padding-bottom: 10px;
                font-size: 17px;
                font-weight: 500;
            }
            /*.form-group {
            margin-bottom: 40px;
        }*/
            .dataTables_filter input {
                margin-left: 7px;
            }
            /*        .close-icon {
                        display: none;
                        float: right;
                        margin-top: -33px;
                        margin-right: 12px;
                        background-color: white;
                        box-shadow: white;
                        background-color: rgb(3, 169, 244);
                        color: white;
                    }*/
        </style>
    </head>
    <body>
        <!-- Main navbar -->
        <?php include 'include/header.php'; ?>
        <!-- /main navbar -->
        <!-- Page container -->
        <div class="page-container">
            <!-- Page content -->
            <div class="page-content">
                <!-- Main sidebar -->
                <?php include 'include/sidebar.php'; ?>
                <!-- /main sidebar -->
                <!-- Main content -->
                <div class="content-wrapper">
                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4> <a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">Add Beacon</span></h4>
                                <ul class="breadcrumb position-right">
                                    <li><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-home2 position-left"></i> Home</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/control/viewBeacon">Beacons</a></li>
                                    <li class=active>Add Beacons</li>
                                </ul>
                            </div>
                            <!-- =========================Yashraj code ===================-->
                            <div style="text-align:center;display:none;" id="hidemenow-1">
                                <?php
                                if ($this->session->flashdata()) {
                                    echo $this->session->flashdata('success');
                                }
                                ?>
                            </div>
                            <!-- =========================Yashraj code ===================-->
                        </div>
                    </div>
                    <!-- /page header -->
                    <!-- Content area -->
                    <div class="content">
                        <!--
                                                    <div style="text-align:center;display:none;" id="styleme">
                                                        <div class="alert alert-success">
                                                            <strong>Refresh successful.</strong>
                                                        </div>
                                                    </div>
                        -->
                        <div id="hidemenow">
                            <?php
                            if ($this->session->flashdata()) {
                                echo $this->session->flashdata('beacon');
                            }
                            ?>
                        </div>
                        <div style="display: none;" id="show-del_b">
                            <div class="alert alert-success">
                                <strong>Beacon deleted successfully.</strong>
                            </div>
                        </div>
                        <div class="row">
                            <!-- boxes start -->
                            <div class="col-md-12">
                         <?php    /*    <a href="" data-toggle="modal" data-target="#addBeaconModal">
                                    <div class="col-md-4 col-md-offset-2">
                                        <img src="<?php echo base_url(); ?>assets/cashrub_beacon.png" class ="img-responsive">
                                        <!-- <div class="panel facebook">
                                            <div class="panel-body">
                                                <div class="col-md-3 col-xs-6">
                                                <img src="<?php echo base_url(); ?>/assets/logo.png" width="70px;" height="60px;">
                                                </div>
                                                <div class="col-md-9 col-xs-6">
                                                    <div>
                                                        <h5 style="margin-top: 6%;"><p>Add CashRub Beacons</p></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </a>
                                <a href="" data-toggle="modal" data-target="#addThirdPartyBeaconModal">
                                    <div class="col-md-4">
                                        <img src="<?php echo base_url(); ?>assets/third_beacon.png" class ="img-responsive" >
                                        <!-- <div class="panel offer-back">
                                            <div class="panel-body">
                                                <div class="col-md-3 col-xs-6">
                                                    <img src="< ?php echo base_url();?>/assets/beacon.png" width="40px;" height="60px;">
                                                </div>
                                                <div class="col-md-9 col-xs-6">
                                                    <div>
                                                        <h5 style="margin-top: 6%;"><p>Add Third Party Beacons</p></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </a> */ ?>
                                <?php

                                function array_column_manual($array, $column) {
                                    $newarr = array();
                                    foreach ($array as $row) {
                                        array_push($newarr, $row->$column);
                                    }
                                    return $newarr;
                                }

                              /*  $is_entrance_beacon = array_column_manual($beacon, 'is_entrance_beacon');
                                if (in_array('1', $is_entrance_beacon)) {

                                } else {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="margin: 20px 0px 0px 11px; color: red; font-size: 20px;">
                                            <b>Please add atleast one entry beacon.</b>
                                        </div>
                                    </div>
                                <?php }*/ ?>
                                <!-- boxes end -->
                                <div class="col-md-12">
                                    <div class="panel panel-flat" style="margin-top: 3%;">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><b>View Beacon Details</b></h6>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <li><a data-action="collapse"></a></li>
                                                    <li><a id="shows" data-action="reload"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <table class="table table-hover" id="sample_3">
                                            <thead>
                                                <tr>
                                                    <!-- <th><b>Beacon Id</b></th> -->
                                                    <th><b>Beacon Name</b></th>
                                                    <th><b>Beacon Place</b></th>
                                                    <th><b>Beacon Type</b></th>
                                                    <th><b>Beacon Status</b></th>
                                                    <th><b>Created Date</b></th>
                                                    <th class="text-center"><b>Actions</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($beacon as $key) { ?>
                                                    <tr>
                                                                    <!-- <td>
                                                        <?php echo wordwrap($key->beacon_key ? : '', 15, "<br />\n"); ?>
                                                                    </td> -->
                                                        <td> <?php echo wordwrap($key->beacon_name); ?></td>
                                                        <td> <?php echo wordwrap($key->beacon_place); ?></td>
                                                        <td> <?php
                                                            if ($key->beacon_type == "cashrub_beacon") {
                                                                echo "CashRub Beacon";
                                                            } else {
                                                                echo "Third Party Beacon";
                                                            }
                                                            ?> </td>
                                                        <td> <?php echo "-"; //if($key->is_entrance_beacon == "0") { echo "Dead"; } else { echo "Active"; }       ?> </td>
                                                        <td> <?php echo wordwrap($key->created_date); ?></td>
                                                        <td class="text-center">
                                                            <ul class="icons-list">
                                                                <li class="dropdown">
                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                        <i class="icon-menu9"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu left" role="menu">
                                                                        <li><a href = "<?php echo base_url(); ?>index.php/control/editBeacon/<?php echo $key->beacon_key; ?>" ><i class="icon-pencil"></i> Edit</a></li>
                                                                       <!--  <li><a id="delete-sub" data-id="<?php //echo $key->beacon_key; ?>"><i class="icon-bin"></i> Delete </a></li> -->
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Panel flat end -->
                                </div>
                                <!-- col-md-7 end -->
                            </div>
                            <!-- /row end-->
                        </div>
                        <!-- content area end -->
                    </div>
                    <!-- /main content end -->
                </div>
                <!-- page content end -->
            </div>
        </div>
        <!-- /page container -->
        <!-- Modal -->
        <div id="addBeaconModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="col-md-12">
                        <button type="button" class="close" data-dismiss="modal" style="margin-right: 5px;margin-top: 5px;">&times;</button>
                        <!-- Profile info -->
                        <div class="panel panel-flat" style="padding-top: 30px;">
                            <div class="modal-header">
                                <h6 class="panel-title text-center" style="margin-top: -25px; font-size: 18px;"><i class="icon-feed"></i> &nbsp; <b>Add CashRub Beacon</b><a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                                <div class="heading-elements">
                                    <ul class="icons-list"></ul>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form action="<?php echo base_url(); ?>index.php/control/addBeacons" method="post">
                                    <div class="col-md-12" style="margin-top: 3%;">
                                        <div class="col-md-3">
                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Beacon Id</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control input-lg" id="beacon_name" name="beacon_key" placeholder="Beacon Id" maxlength="20">
                                            <span id="beaconnameerror" style="color: red"></span>
                                            <!-- <button class="close-icon" type="reset"><b>x</b></button> -->
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 3%;">
                                        <div class="col-md-3">
                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Beacon Place</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control input-lg" id="beacon_place" name="beacon_place" placeholder="Beacon Place" maxlength="20">
                                            <span id="beaconplaceerror" style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-left: 25%;margin-top: 3%;">
                                        <div class="checkbox">
                                            <label>
                                                <input align="center" type="checkbox" name="is_entrance" value="1">Check if this is entrance beacon</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-center" style="margin-top:30px;">
                                            <button id="addBeacon" type="submit" class="btn bg-blue btn-labeled heading-btn btn-labeled-left ml-10"><b><i class="icon-plus3"></i></b> Add</button>
                                                        <!-- <button type="reset" onclick="location.href = '<?php echo base_url(); ?>index.php/control/home';" class="btn bg-blue btn-labeled heading-btnbtn-labeled-right ml-10"><b><i class="icon-cross"></i></b> Cancel</button> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /row -->
                    </div>
                </div>
            </div>
            <!-- dialog end -->
        </div>
        <div id="addThirdPartyBeaconModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="panel-title text-center" style="font-size: 18px;"><i class="icon-feed"></i>&nbsp; <b>Add Third Party Beacon</b><a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="<?php echo site_url('control/save_beacondetail'); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" style="font-size: 14px;margin-top:6px;">Enter Beacon Name
                                        <red style="color: red;font-size: 20px;">*</red>
                                    </label>
                                    <br/>
                                    <input type="text" class="form-control" name="beacon_name" placeholder="Beacon Name" id="third_party_beacon_name" maxlength="20" autocomplete="off">
                                    <span id="third_party_beacon_name_error" style="color: red"></span>
                                    <span id="third_party_beacon_name_success" style="color: green"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" style="font-size: 14px;margin-top:6px;">Enter Beacon Place
                                        <red style="color: red;font-size: 20px;">*</red>
                                    </label>
                                    <br/>
                                    <input type="text" class="form-control" name="beacon_place" maxlength="30" placeholder="Beacon Place" id="third_party_beacon_place">
                                    <span id="third_party_beacon_place_error" style="color: red"></span>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 3%;">
                                <div class="col-md-12">
                                    <label class="control-label" style="font-size: 14px;margin-top:6px;">Enter Beacon UUID
                                        <red style="color: red;font-size: 20px;">*</red>
                                    </label>
                                    <br/>
                                    <input type="text" class="form-control" name="beacon_uuid" maxlength="50" placeholder="Beacon UUID" id="third_party_beacon_uuid">
                                    <span id="third_party_beacon_uuid_error" style="color: red"></span>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 3%;">
                                <div class="col-md-6">
                                    <label class="control-label" style="font-size: 14px;margin-top:6px;">Beacon Major
                                        <red style="color: red;font-size: 20px;">*</red>
                                    </label>
                                    <input type="text" class="form-control" name="beacon_major" maxlength="10" onkeypress="return isNumber(event)" placeholder="Beacon Major [in numbers eg.: 123]" id="third_party_beacon_major">
                                    <span id="third_party_beacon_major_error" style="color: red"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" style="font-size: 14px;margin-top:6px;">Beacon Minor
                                        <red style="color: red;font-size: 20px;">*</red>
                                    </label>
                                    <br/>
                                    <input type="text" class="form-control" name="beacon_minor" maxlength="10" onkeypress="return isNumber(event)" placeholder="Beacon Minor [in numbers eg.: 123]" id="third_party_beacon_minor">
                                    <span id="third_party_beacon_minor_error" style="color: red"></span>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 3%;">
                                <div class="col-md-12" style="margin-top: 2%;">
                                    <div class="checkbox">
                                        <label>
                                            <input align="center" type="checkbox" name="is_entrance_of_third_party" value="1">Check if this is entrance beacon</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 3%;">
                                <div class="text-center">
                                    <button id="addThirdPartyBeacon" type="submit" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-checkmark3"></i></b> Add</button>
                                            <!-- <button type="reset" onclick="location.href = '<?php echo base_url(); ?>index.php/control/home';" class="btn bg-blue btn-labeled heading-btnbtn-labeled-right ml-10"><b><i class="icon-cross"></i></b> Cancel</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end third party beacon modal -->
        <script type="text/javascript">
            /*<!-- =========================Yashraj code ===================-->*/
            $('#shows').click(function () {
                //alert ("sahdsadsad");
                //window.location.reload();
                window.location.href = "<?php echo base_url(); ?>index.php/control/viewBeacon/chk";
            });
            $("#hidemenow-1").delay(500).fadeIn(300).delay(1000).fadeOut(300);
            /*<!-- =========================Yashraj code close ===================-->*/
        </script>
        <!-- add beacon modal end -->
        <script type="text/javascript">
            function isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            $("#sample_3").DataTable({
                "paging": true,
                "lengthChange": false,
                "pageLength": 20,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true
            });
            $("#hidemenow").delay(7000).fadeIn(300).delay(1000).fadeOut(300);
            $("#sample_3").on('click', '#delete-sub', function () {
                if (confirm("Are you sure to delete this Beacon ?") == false) {
                    return;
                }
                // alert("Beacon Deleted");
                $("#show-del_b").show();
                $("#show-del_b").delay(5000).fadeIn(300).delay(1000).fadeOut(300);
                $(this).closest('tr').remove();
            });
            $(document).on("click", "#delete-sub", function () {
                var Id = $(this).data('id');
                $.post("<?php echo base_url(); ?>index.php/control/deleteBeacon/" + Id, function (data, status) {
                });
            });

            $("#addBeacon").click(function () {
                var beacon_name = $("#beacon_name").val();
                var beacon_place = $("#beacon_place").val();
                if (beacon_name == '') {
                    document.getElementById("beaconnameerror").innerHTML = 'Beacon id field is required.';
                    return false;
                } else {
                    document.getElementById("beaconnameerror").innerHTML = '';
                }
                if (beacon_place == '') {
                    document.getElementById("beaconplaceerror").innerHTML = 'Beacon place field is required.';
                    return false;
                } else {
                    document.getElementById("beaconplaceerror").innerHTML = '';
                }
                // alert("Sdasd");
            });

            $("#addThirdPartyBeacon").click(function () {
                var third_beacon_name = $("#third_party_beacon_name").val();
                var third_beacon_place = $("#third_party_beacon_place").val();
                var third_beacon_uuid = $("#third_party_beacon_uuid").val();
                var third_beacon_major = $("#third_party_beacon_major").val();
                var third_beacon_minor = $("#third_party_beacon_minor").val();
                if (third_beacon_name == '') {
                    document.getElementById("third_party_beacon_name_error").innerHTML = 'Beacon name field is required.';
                    return false;
                } else {
                    document.getElementById("third_party_beacon_name_error").innerHTML = '';
                }
                if (third_beacon_place == '') {
                    document.getElementById("third_party_beacon_place_error").innerHTML = 'Beacon place field is required.';
                    return false;
                } else {
                    document.getElementById("third_party_beacon_place_error").innerHTML = '';
                }
                if (third_beacon_uuid == '') {
                    document.getElementById("third_party_beacon_uuid_error").innerHTML = 'Beacon uuid field is required.';
                    return false;
                } else {
                    document.getElementById("third_party_beacon_uuid_error").innerHTML = '';
                }
                if (third_beacon_major == '') {
                    document.getElementById("third_party_beacon_major_error").innerHTML = 'Beacon major field is required.';
                    return false;
                } else {
                    document.getElementById("third_party_beacon_major_error").innerHTML = '';
                }
                if (third_beacon_minor == '') {
                    document.getElementById("third_party_beacon_minor_error").innerHTML = 'Beacon minor field is required.';
                    return false;
                } else {
                    document.getElementById("third_party_beacon_minor_error").innerHTML = '';
                }
            });
            // $(document).on('keyup change', '#beacon_name', function() {
            //     var beacon_name = $.trim($('#beacon_name').val());
            //     if (beacon_name.length !== 0) {
            //         $('.close-icon').show();
            //         // return false;
            //     } else {
            //         $('.close-icon').hide();
            //     }
            // });
            /*$('#shows').click(function() {
             $('#styleme').delay(2000).fadeIn(300).delay(1000).fadeOut(300);
             });
             */
            // $(document).on('click', '.close-icon', function() {
            //     // alert();
            //     $('.close-icon').hide();
            // });
        </script>
        <!-- New script 12 july -->
        <script type="text/javascript">
            // $(document).ready(function() {
            var x_timer;
            $("#third_party_beacon_name").keyup(function (e) {
                clearTimeout(x_timer);
                var user_name = $(this).val();
                x_timer = setTimeout(function () {
                    check_username_ajax(user_name);
                }, 200);
                // alert("Hello");
            });
            function check_username_ajax(username) {
                // $("#third_party_beacon_name_error").html('<img src="ajax-loader.gif" />');
                $.post('<?php echo base_url(); ?>index.php/control/checkIfAlreadyBeacon/' + username, function (data) {
                    get_data = data.replace(/^\s+/, "");
                    if (get_data != '') {
                        $("#third_party_beacon_name_error").html("  Beacon name already available");
                    } else {
                        $("#third_party_beacon_name_error").html("");
                    }
                });
            }
            // $("#third_party_beacon_name").keydown(function (e){
            //     var n_name = $("#third_party_beacon_name").val();
            //     $.post('<?php echo base_url(); ?>index.php/control/checkIfAlreadyBeacon/'+n_name, function(data) {
            //         get_data = data.replace(/^\s+/,"");
            //         if(get_data != ''){
            //             $("#third_party_beacon_name_error").html("  Beacon name not available");
            //         }else{
            //             $("#third_party_beacon_name_error").html("");
            //         }
            //     });
            // });
            $("#third_party_beacon_name").change(function () {
                var n_name = $("#third_party_beacon_name").val();
                $.post('<?php echo base_url(); ?>index.php/control/checkIfAlreadyBeacon/' + n_name, function (data) {
                    get_data = data.replace(/^\s+/, "");
                    if (get_data != '') {
                        $("#third_party_beacon_name_error").html("Beacon name already available");
                    } else {
                        $("#third_party_beacon_name_error").html("");
                    }
                });
            });
            // });
        </script>
        <!-- end -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tagsinput.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tokenfield.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/maxlength.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/formatter.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_floating_labels.js"></script>
    </body>
</html>