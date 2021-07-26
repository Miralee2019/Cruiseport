<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Feb 2017 12:23:01 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
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
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/dashboard.js"></script>
        <!-- /theme JS files -->
        <!-- Global stylesheets -->
        <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/dashboard.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <!-- /global stylesheets -->

        <style type="text/css">
            .table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th {
                padding: 4px 10px!important;
            }
            #add {
                display: inline-block;
                margin-left: 10px;
                /*position: absolute;*/
                margin-top: 10px;
            }
            @media (min-width: 320px) and (max-width: 767px){
                #add {
                    position: relative;
                    margin-bottom: 10px;
                }
            }
            @media (min-width: 980px){

                .daterangepicker{
                    left: 415px !important;
                }
                .calendar{
                    margin: 0px !important;
                }
            }
            .daterangepicker_input{
                display: none;
            }
            .calendar > .right{
                border-left-style: none;
            }
            .calendar > .left{
                border-right-style: none;
            }
            .panel-body {
                padding: 0px;
            }
            .icon-size {
                font-size: 35px; margin: 20%;
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

                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4> <span class="text-semibold" style="letter-spacing:1px;" >Store Details</span></h4>
                                <ul class="breadcrumb position-left">
                                    <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-home2 position-left"></i> Home</a></li>
                                    <li><a href="#">Store Details</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!-- /page header -->
                    <!-- Content area -->
                    <div class="content">
                        <!-- 					<div style="text-align:center;display:none;" id="styleme">
                                                <div class="alert alert-success">
                                                    <strong>Refresh successful.</strong>
                                                </div>
                                            </div> -->

                        <!-- Main charts -->
                        <!-- <div class="row"> -->
                        <!-- Quick stats boxes -->
                        <div class="row">

                            <div class="col-lg-4">
                                <!-- Current server load -->
                                <div class="panel facebook">
                                    <div class="panel-body">
                                        <div class="col-lg-4 col-xs-4">
                                            <i class='icon-store icon-size'></i>
                                        </div>
                                        <div class="col-md-8 col-xs-8 text-center" style="margin-left: -12%;">
                                            <h3 class="no-margin" style="font-size: 30px;"> <b><?php
                                                    if ($total_store) {
                                                        echo count($total_store);
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?> </b></h3>
                                            <p style="font-weight: 700;font-size: 13px;">Registered Store</p>
                                        </div>
                                    </div>
                                    <div id="server-load"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- Today's revenue -->
                                <div class="panel walk">
                                    <div class="panel-body">

                                        <!-- <div class="heading-elements"> -->
                                        <div class="col-lg-4 col-xs-4">
                                            <i class="icon-user-check icon-size"></i>
                                        </div>
                                        <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%;">

                                            <h3 class="no-margin" style="font-size: 30px;"> <b><?php
                                                    if ($active_stores) {
                                                        echo count($active_stores);
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?> </b></h3>
                                            <p style="font-weight: 700;font-size: 13px;"> Total Activated </p>
                                        </div>
                                    </div>
                                    <div id="today-revenue"></div>
                                </div>
                                <!-- /today's revenue -->
                            </div>
                            <div class="col-lg-4">
                                <!-- Today's revenue -->
                                <div class="panel purchase">
                                    <div class="panel-body">

                                        <div class="col-lg-4 col-xs-4">
                                            <i class="icon-user-cancel icon-size"></i>
                                        </div>
                                        <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%;">
                                            <h3 class="no-margin" style="font-size: 30px;"> <b><?php
                                                    if ($suspend_stores) {
                                                        echo count($suspend_stores);
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?> </b></h3>
                                            <p style="font-weight: 700;font-size: 13px;">Suspended</p>
                                        </div>
                                    </div>
                                    <div id="today-revenue"></div>
                                </div>

                            </div>
                        </div>
                        <div id="hidemenow">

                            <?php
                            if ($this->session->flashdata()) {
                                echo $this->session->flashdata('notification_message');
                            }
                            if ($this->session->flashdata()) {
                                echo $this->session->flashdata('store_blocked');
                            }
                            if ($this->session->flashdata()) {
                                echo $this->session->flashdata('refresh_message2');
                            }
                            ?>
                        </div>

                        <div class="loader"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Marketing campaigns -->
                                <div class="panel panel-flat"  style="overflow-x: scroll; ">
                                    <div class="panel-heading">
                                        <h6 class="panel-title" style="letter-spacing:1px;" ><b>Store Details</b></h6>
                                        <!-- 										<div>
                                                                                    <h5>Select Date Range : </h5><input type="text" style="padding: 12px; border: 1px solid #ccc;" id="myDate" size="21" name="daterange" value="<?php echo $s_date; ?> - <?php echo $e_date; ?>" /><i class="icon-calendar" style="font-size: 16px;margin-left: -24px;color: grey;margin-top: -2px;"></i>
                                                                                </div> -->

                                                                        <!-- <h6 class="panel-title"> <i class="icon-store facebook social-border"></i> Store Details</h6> -->

                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                                <li><a id="shows" data-action="reload"></a></li>
                                                <!-- <li><a data-action="reload"></a></li>  -->
                                                <!--    <li><a data-action="close"></a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="">

                                        <table class="table table-hover" id="sample_3">

                                            <thead>
                                                <tr>
                                                    <th class="col-md-1"><b>ID</b></th>
                                                    <th class="col-md-2"><b>Registration Date</b></th>
                                                    <th class="col-md-2"><b>Store Name</b></th>
                                                    <th class="col-md-2"><b>Store Email</b></th>
                                                    <th class="col-md-2"><b>Address</b></th>
<!-- <th>Address 2</th> -->
                                                    <th class="col-md-1"><b>Status</b></th>
                                                    <!-- <th class="col-md-1"><b>Credits</b></th> -->
                                                    <th class="col-md-2"><b>View Details </b></th>
                                                    <th class="col-md-1"><b>Actions</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php foreach (array_reverse($total_store) as $key) { ?>
                                                    <tr>
                                                        <td class="col-md-1"><?php echo $key->store_id; ?></td>
                                                        <td class="col-md-2"><?php echo $key->created_date; ?></a></td>
                                                        <td class="col-md-2"><?php echo $key->store_first_name; ?></a></td>
                                                        <td class="col-md-2"><?php echo $key->store_email; ?></a></td>
                                                <!-- 	<td class="col-md-2"><?php echo wordwrap($key->store_address1 ? : '', 35, "<br />\n"); ?></td> -->
                                                        <td class="col-md-2" style="word-break: break-all;"><?php echo wordwrap($key->store_address1 ? : '', 35, "<br />\n"); ?></td>
                                                        <!-- <td class="col-md-2"><?php echo $key->store_address2; ?></td> -->
                                                        <?php if ($key->status_id == 1) { ?>
                                                            <td class="center col-md-1"><span class="label label-sm label-info">Active </span></td>
                                                        <?php } elseif ($key->status_id == 6) { ?>
                                                            <td class="center col-md-1"><span class="label label-sm label-danger">Registered</span></td>
                                                        <?php } elseif ($key->status_id == 5) { ?>
                                                            <td class="center col-md-1"><span class="label label-sm label-danger">cancelled </span></td>
                                                        <?php } elseif ($key->status_id == 2) { ?>
                                                            <td class="center col-md-1"><span class="label label-sm label-danger">pending </span></td>
                                                        <?php } elseif ($key->status_id == 7) { ?>
                                                            <td class="center col-md-1"><span class="label label-sm label-danger">Suspended</span></td>
                                                        <?php } elseif ($key->status_id == 8) { ?>
                                                            <td class="center col-md-1"><span class="label label-sm label-danger">Rejected</span></td>
    													<?php } elseif ($key->status_id == 11) { ?>
                                                            <td class="center col-md-1"><span class="label label-sm label-danger">Removed</span></td>
    													<?php } else { ?>
                                                            <td class="center"><span class="label label-sm label-danger">unknown </span></td>
    													<?php } ?>
                                            <!-- <td class="col-md-1"><?php echo $key->store_point; ?></td> -->

                                                        <td class="col-md-2">
                                                            <ul class="list-inline list-inline-condensed heading-text">

                                                                <li>
                                                                    <a href="<?php echo base_url(); ?>index.php/superadmin/view_shopinfo/<?php echo $key->store_id; ?>" class="text-default"><i class="icon-eye8"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>

                                                        <td class="col-md-1">
                                                            <ul class="icons-list">
                                                                <li class="dropdown">
                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                        <i class="icon-menu9"></i>
                                                                    </a>
                                                                    <ul class = "dropdown-menu shop-list left" role = "menu">
                                                                        <?php if ($key->status_id == 1) { ?>
                                                                            <li><a href="#" id="change_status3" data-store =<?php echo $key->store_id; ?> data-status = "7"><i class="icon-cross"></i> Suspend </a></li>
                                                                            <li>
                                                                        <?php } elseif ($key->status_id == 6) { ?>
                                                                            <li ><a href="#" id="change_status" data-store =<?php echo $key->store_id; ?> data-status = "2"> <i class="icon-check"></i> Approve</a></li>

                                                                            <li><a href="#" id="change_status2" data-store =<?php echo $key->store_id; ?> data-status = "8"><i class="icon-cross"></i> Reject</a></li>
																		<?php } ?>

                                                                            <?php if ($key->status_id == 2) { ?>
                                                                            <!-- <li><a href="#" id="change_status4" data-store = <?php echo $key->store_id; ?> data-status = "1" ><i class="icon-check"></i> Approve </a></li>
                                                                            <li>
                                                                            <li><a href="#" id="change_status4" data-store = <?php echo $key->store_id; ?> data-status = "8" ><i class="icon-cross"></i> Reject </a></li>
                                                                            <li> -->
                                                                            <li><a href="#" id="change_status4" data-store = <?php echo $key->store_id; ?> data-status = "11" ><i class="glyphicon-remove"></i> Remove </a></li>
                                                                            <li>
																		<?php } ?>
                                                                        <li>
                                                                            <a href="" id="notify_store" data-store="<?php echo $key->store_id ?>" data-toggle="modal" data-target="#myModal"> <i class="icon-envelope"></i>  Send Notification </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
												<?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /marketing campaigns -->

                                <!-- </div>	 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- model		   -->

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="sname">Send Notification</h4>
                        <br>

                        <form action="<?php echo base_url(); ?>index.php/superadmin/sendNotificationToStore" method="post" class="form-horizontal"  role="form">
                        <!-- <input type="hidden" name="userId" id="userId"> -->
                            <div>
                                <input type="text" class="form-control input-lg" class="form-control" name="subject" value="Cashrub Registration" placeholder="Enter subject">
                            </div>
                            <br>
                            <input type="hidden" name="store_id" id="store_id" >

                            <div>
                                <textarea maxlength="120" id="changemsg" class="form-control input-lg" style="max-width:557px;max-height: 148px;" rows="5" name="message" placeholder="Enter message">Dear user, &#13;&#10;Welcome to Cashrub website.</textarea>
                            </div>

                            <br><br>
                            <!-- <fieldset>

                            </fieldset> -->
                            <div align="center">

                                <button type="submit" style="font-size: 19px;" class="btn btn-info btn-lg">Send notification</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- end model -->
    </body>

    <script>

        $("#sample_3").DataTable({
            "paging": true,
            "lengthChange": false,
            "pageLength": 10,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            dom: 'l<"#add">frtip'

        });

        $('<label/>').text('Custom Search: ').appendTo('#add')

        $select = $('' +
                '<form action="<?php echo base_url(); ?>/index.php/superadmin/dateRangeStore">' +
                '<div class="input-group date form_date col-md-12" id="chh" style="margin-left: 102px;margin-top: -36px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >' +
                '<span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;">' +
                '</span></span>' +
                '<input class="form-control" size="4" style="width:130px;" data-date-start-date="+0d" id="changedate1" name="startdate" placeholder="Start Date" style="font-size: 15px;" type="text" value="<?php echo $e_date; ?>" readonly>' +
                '</div>' +
                '<input type="hidden" id="dtp_input2" value="" /><br/><h7 style="color: red;float: left;" id ="date_error2"></h7>' +
                '<div class="input-group date form_date2 col-md-12" id="chh" style="float:right;margin-right: -276px;margin-top: -56px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >' +
                '<span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;">' +
                '</span></span>' +
                '<input class="form-control" size="4" style="width:130px;" data-date-start-date="+0d" id="changedate2" name="enddate" placeholder="End Date" style="font-size: 15px;" type="text" value="<?php echo $e_date; ?>" readonly>' +
                '</div>' +
                '<input type="hidden" id="dtp_input2" value="" /><br/><h7 style="color: red;float: left;" id ="date_error2"></h7>' +
                '<input type="submit" value="Apply" id="getValidate" style="margin-left: 455px;margin-top: -137px;padding-left:10px !important;" class="btn bg-blue btn-labeled heading-btn" >' +
                '<input type="reset" id="clearme" value="Cancel"  style="margin-left:5px;padding-left:10px !important; margin-top:-137px;color:black;" class="btn bg-red btn-labeled heading-btn" >' +
                '</form>').appendTo('#add');
    </script>
    <script type="text/javascript">

        $('#getValidate').click(function () {
            if ($('#changedate2').val() == '') {
                alert("Please enter end date");
                return false;
            }
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript">

        $('.form_date2').datetimepicker({
            language: 'fr',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        }).datetimepicker("update", "");
        $('.form_date2').datetimepicker('setEndDate', new Date);
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
        $('.form_date').datetimepicker('setEndDate', new Date);
        $('#changedate1').change(function () {
            var s_date = $('.form_date').datetimepicker('getDate');
            $('.form_date2').datetimepicker('setDate', s_date);
            $('.form_date2').datetimepicker('setStartDate', s_date);
            $('#errorSelDate').html("");
        });
    </script>

    <script type="text/javascript">
        $(document).on("click", "#change_status", function () {

            var status = $(this).data('status');
            var store = $(this).data('store');
            $.post("<?php echo base_url(); ?>index.php/superadmin/changeStoreStatus/" + store + "/" + status + "", function (data, status) {
                $(".loader").fadeOut("slow");
                location.reload();
            });
        });
        $(document).on("click", "#change_status2", function () {

            var status = $(this).data('status');
            var store = $(this).data('store');
            $.post("<?php echo base_url(); ?>index.php/superadmin/changeStoreStatus/" + store + "/" + status + "", function (data, status) {
                // $(".loader").fadeOut("slow");
                location.reload();
            });
        });

        $(document).on("click", "#change_status4", function () {

            var status = $(this).data('status');
            var store = $(this).data('store');
            $.post("<?php echo base_url(); ?>index.php/superadmin/changeStoreStatus/" + store + "/" + status + "", function (data, status) {
                $(".loader").fadeOut("slow");
                location.reload();
            });
        });

        $(document).on("click", "#change_status3", function () {

            var status = $(this).data('status');
            var store = $(this).data('store');
            $.post("<?php echo base_url(); ?>index.php/superadmin/changeStoreStatus/" + store + "/" + status + "", function (data, status) {
                // $(".loader").fadeOut("slow");
                location.reload();
            });
        });
        $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);
        $('#shows').click(function () {
            window.location.href = "<?php echo base_url(); ?>index.php/superadmin/shop_screen/chk";
        });
    </script>
    <script type="text/javascript">
        $(document).on("click", "#notify_store", function () {
            var store_id = $(this).data('store');
            $(".modal-body #store_id").val(store_id);
        });
    </script>
    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Feb 2017 12:34:08 GMT -->
</html>
