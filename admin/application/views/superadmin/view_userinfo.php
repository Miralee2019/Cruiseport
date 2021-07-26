<?php error_reporting(0); ?>
<?php $path = TEMP_PATH; ?>
<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
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
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/selects/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/datatables_basic.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/dashboard.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <!-- /theme JS files -->
        <style type="text/css">
            .table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th {
                padding: 4px 10px!important;
            }
            .dataTables_info {
                padding-left:12px;
            }
            .dataTables_paginate {
                padding-top: 11px;
                padding-right: 26px;
            }
            .dataTables_filter input {
                margin-left: 7px;
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
            .icon-size {
                font-size: 35px; margin: 20%;
            }
            .panel-body {
                padding: 0px;
            }
        </style>
    </head>
    <body>
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
                                <h4> <span class="text-semibold">User Details</span></h4>
                                <ul class="breadcrumb position-left">
                                    <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-home2 position-left"></i> Home</a></li>
                                    <li><a href="#">User Details</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">


                        <div class="row">

                            <div class="col-lg-4" >
                                <!-- Current server load -->
                                <div class="panel facebook">
                                    <div class="panel-body" style="color: white;">
                                        <div class="col-lg-4 col-xs-4">
                                            <i class='icon-users icon-size'></i>
                                        </div>
                                        <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%;">
                                            <h3 class="no-margin" style="font-size: 30px;"><b><?php
                                                    if ($total_store) {
                                                        echo count($total_store);
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?></b></h3>
                                            <p style="font-weight: 700;font-size: 13px;">Total Users</p>
                                        </div>
                                    </div>
                                    <div id="server-load"></div>
                                </div>
                                <!-- /current server load -->
                            </div>
                            <div class="col-lg-4">
                                <!-- Today's revenue -->
                                <div class="panel walk">
                                    <div class="panel-body">
                                        <div class="col-lg-4 col-xs-4">
                                            <i class="icon-user-check icon-size"></i>
                                        </div>
                                        <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%;">
                                            <h3 class="no-margin" style="font-size: 30px;"><b><?php
                                                    if ($active_stores) {
                                                        echo count($active_stores);
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?></b></h3>
                                            <p style="font-weight: 700;font-size: 13px;"> Active Users</p>
                                        </div>
                                    </div>
                                    <div id="today-revenue"></div>
                                </div>

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
                                                    ?></b></h3>
                                            <p style="font-weight: 700;font-size: 13px;">Blocked Users</p>
                                        </div>
                                    </div>
                                    <div id="today-revenue"></div>
                                </div>

                            </div>
                        </div>

                        <div id="hidemenow">
                            <?php
                            if ($this->session->flashdata()) {
                                echo $this->session->flashdata('user_blocked');
                            }
                            if ($this->session->flashdata()) {
                                echo $this->session->flashdata('notification_user_message');
                            }
                            if ($this->session->flashdata()) {
                                echo $this->session->flashdata('refresh_message1');
                            }
                            ?>
                        </div>
                        <div class="panel panel-flat" style="overflow-x: auto;">

                            <div class="panel-heading">

                                <h6 class="panel-title" ><b>User Details</b></h6>
                                <div class="heading-elements">

                                    <button class="btn bg-blue btn-labeled heading-btn" style="padding: 10px 30px;
                                                        font-size: 14px; border-radius: 4px !important;" onclick="exporttocsv()">
                                                    Export</button>
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a id="shows" data-action="reload"></a></li>
                                    </ul>
                                </div>
                            </div>
                                         <script type="text/javascript">
                                            function exporttocsv() {
                                                    // $('#sample_3 tr').find('th:last-child, td:last-child').remove();
                                                    $("#sample_3").tableToCSV({
                                                        filename: 'User_Information'
                                                    });
                                                    // $('#sample_3 tr').find('th:last-child, td:last-child').add();
                                                    // location.reload();
                                                }
                                            </script>   

                            <table class="table table-hover" id="sample_3">
                                <thead>
                                    <tr>
                                        <th><b>ID</b></th>
                                        <th class="col-md-2"><b>Registration Date</b></th>
                                        <th style="width: 0px !important;"><b>Username</b></th>
                                        <th><b>Email</b></th>
                                        <th><b>Status</b></th>
                                        <th><b>View Details</b></th>
                                        <th class="text-center"><b>Actions</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (array_reverse($users) as $key) { ?>
                                        <tr>
                                            <td><?php echo $key->user_id; ?></td>
                                            <td class="col-md-2"><?php echo $key->created_date; ?></td>
                                            <td style="width: 100%;">
                                                <?php if ($key->profile_image) { ?>
                                                    <img src="<?= $path; ?>api/uploads/<?php echo $key->profile_image; ?>" width="40px" height="40px" class= "img img-circle" > <?php } else { ?>
                                                    <img src="http://eadb.org/wp-content/uploads/2015/08/profile-placeholder.jpg" width="40px" height="40px" class= "img img-circle" > <?php } ?>
                                                <?php echo $key->name; ?></td>
                                            <td><?php echo $key->email; ?></td>
                                            <?php if ($key->status_id == 5) { ?>
                                                <td class="center "><span class="label label-sm label-danger"> Blocked </span></td>
                                            <?php } else { ?>
                                                <td class="center "><span class="label label-sm label-info"> Approved </span></td>
                                            <?php } ?>
                                            <td class="col-md-2">
                                                <ul class="list-inline list-inline-condensed heading-text">
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>index.php/superadmin/userReportByUser/<?php echo $key->user_id; ?>" class="text-default"><i class="icon-eye8"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>

                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>
                                                        <ul class = "dropdown-menu left" role = "menu">
                                                            <!-- <li><a href = "#   "> <i class="icon-envelope"></i>  Send Email</a></li> -->
                                                            <li><a href="" id="notify_user" data-user="<?php echo $key->user_id ?>" data-toggle="modal" data-target="#myModal"> <i class="icon-envelope"></i>  Send Notification </a></li>
                                                            <!-- <li><a id="delete-sub"><i class="icon-cross"></i> Block User </a></li> -->
                                                            <?php if ($key->status_id != 5) { ?>
                                                            <li><a href="#" id="change_userstatus" data-user = <?php echo $key->user_id; ?>  data-status = "5" ><i class="icon-cross"></i> Block User</a></li>
                                                            <li>
                                                            <?php } ?>
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
                </div>
                <!-- /content area -->
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
        <!-- model         -->

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="sname">Send Notification</h4>
                        <br>
                        <form action="<?php echo base_url(); ?>index.php/superadmin/sendNotificationToUser" method="post" class="form-horizontal"  role="form">
                          <!-- <input type="hidden" name="userId" id="userId"> -->
                            <div>
                                <input type="text" class="form-control input-lg" class="form-control" name="subject" placeholder="Enter subject" value="Cashrub Registration">
                            </div>
                            <br>
                            <input type="hidden" name="user_id" id="user_id">
                            <div>
                                <textarea maxlength="120" id="changemsg" class="form-control input-lg" style="max-width:557px;max-height: 148px;" rows="5" name="message" placeholder="Enter message">Dear user, &#13;&#10;Welcome to Cashrub website.</textarea>
                            </div>
                            <br><br>
                            <div align="center">
                                <button type="submit" style="font-size: 19px;" class="btn btn-info btn-lg">Send notification</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- end model -->

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
                    '<form action="<?php echo base_url(); ?>/index.php/superadmin/dateRangeUser">' +
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

            // $("#clearme").click(function(){
            //     window.location.href = "<?php echo base_url(); ?>index.php/superadmin/view_userinfo/chk2";
            // });
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
            $(document).on("click", "#change_userstatus", function () {
                var status = $(this).data('status');
                var user = $(this).data('user');
                $.post("<?php echo base_url(); ?>index.php/superadmin/changeUserStatus/" + user + "/" + status + "", function (data, status) {
                    location.reload();
                });
            });
            $(document).on("click", "#notify_user", function () {
                var user_id = $(this).data('user');
                $(".modal-body #user_id").val(user_id);
            });

            $('#shows').click(function () {
                window.location.href = "<?php echo base_url(); ?>index.php/superadmin/view_userinfo/chk";
            });

            $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);

        </script>

        <script>

              jQuery.fn.tableToCSV = function (options) {

                var settings = $.extend({

                    filename: ""

                }, options);



                var clean_text = function (text) {

                    text = $.trim(text.replace(/"/g, '""'));

                    return '"' + text + '"';

                };



                $(this).each(function () {

                    var table = $(this);

                    var caption = settings.filename;

                    var title = [];

                    var rows = [];

                    $(this).find('tr').each(function () {

                        var data = [];

                        $(this).find('th').each(function () {

                            if (title.length < 5) {

                                var text = clean_text($(this).text());

                                title.push(text);

                            }

                        });



                        $(this).find('td').each(function () {

                            if (data.length < 5) {

                                var text = clean_text($(this).text());

                                data.push(text);

                            }

                        });

                        data = data.join(",");

                        rows.push(data);

                    });

                    title = title.join(",");

                    rows = rows.join("\n");

                    var csv = title + rows;

                    var uri = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);

                    var download_link = document.createElement('a');

                    download_link.href = uri;

                    var ts = new Date().getTime();

                    if (caption == "") {

                        download_link.download = ts + ".csv";

                    } else {

                        download_link.download = caption + "-" + ts + ".csv";

                    }

                    document.body.appendChild(download_link);

                    download_link.click();

                    document.body.removeChild(download_link);

                });

            };

        </script>

    </body>
    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
</html>
