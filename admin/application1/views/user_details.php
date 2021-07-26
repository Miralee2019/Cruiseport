<?php error_reporting(0); ?>
<?php $path = TEMP_PATH; ?>
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
    <link href="<?php echo base_url(); ?>assets/css/custom1.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>		
    <!-- /global stylesheets -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">	

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_inputs.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>
    <!-- /theme JS files -->

    <style>

    .form-group {
        margin-bottom: 40px;
    }

    .dataTables_filter input {
        margin-left: 10px;
    }

    .dataTables_paginate .paginate_button.current, .dataTables_paginate .paginate_button.current:focus, .dataTables_paginate .paginate_button.current:hover {
        margin-top: 20px;
    }

    .dataTables_paginate {
        margin: 0 35px 20px 20px;
    }
    #add {

        display: inline-block;
        margin-left: 30px;
        /*position: absolute;*/
        margin-top: 8px;
        padding-right: 5px;
    }   

    #changedate1,#changedate2
    {
        border-radius: 3px!important;		
    }

    .table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th {
        padding: 4px 10px !important;
    }

    @media (min-width: 320px) and (max-width: 767px){  

        #add {
            position: relative;
            margin-bottom: 10px;
        }   

    }


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
                            <h4> <a href="<?php echo base_url(); ?>index.php/control/userReport">
                                <i class="icon-arrow-left15 position-left"></i></a> 
                                <span class="text-semibold">User Detail </span></h4>

                                <!-- <div class="heading-elements">
                                <div class="heading-btn-group">
                                <a href="view_beacons.html" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-eye8"></i></b> View Beacons </a>
                                
                                </div>
                            </div> -->

                            <ul class="breadcrumb position-right">
                                <li><a href="<?= base_url(); ?>index.php/control/home"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="<?= base_url(); ?>index.php/control/userReport">User Report</a></li>
                                <li class=active>User Detail</li>
                            </ul>
                            <br><br>
                            <div class="col-md-12" style="padding-left: 0px;padding-bottom: 20px;">
                                <div class="col-md-7" style="padding: 0;">
                                    <?php foreach ($userDetail as $upvalue) { ?>
                                    <div class="col-md-2" style="padding: 0;">
                                        <img class="img-circle" src='<?= $path; ?>api/uploads/<?php
                                        if (isset($upvalue->profile_image)) {
                                            echo $upvalue->profile_image;
                                        } else {
                                            echo "user_img.png";
                                        }
                                        ?>' style="width: 90px; height:85px;">
                                    </div>
                                    <div class="col-md-5" style="padding-top: 5px;">
                                        <span class="text-semibold"><h2 style="font-size: 18px;"><?php echo $upvalue->name; ?></h2></span>
                                        First Walkin Date :
                                        <?php foreach ($first_w_date as $key) { ?>
                                        <?php if ($key === reset($first_w_date)) { ?>
                                        <h5 style="font-size: 15px;"> <?php echo $key->detected_date; ?></h5>
                                        <?php } else { echo 'NA'; } } ?>
                                        <br>
                                        Last Walkin Date : 
                                        <?php
                                        foreach ($first_w_date as $key) {
                                            ?>
                                            <?php if ($key === end($first_w_date)) { ?>
                                            <h5 style="font-size: 15px;"><?php echo $key->detected_date; ?></h5>
                                            <?php
                                        } else { echo 'NA'; }
                                    }
                                    ?>


                                </div>
                                <?php } ?>

                            </div>

                            <div class="col-md-5">

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /page header -->

            <div style="text-align:center;display:none;" id="hidemenow">
                <?php
                if ($this->session->flashdata()) {
                    echo $this->session->flashdata('success');
                }
                ?>
            </div>

            <!-- Content area -->
            <!-- <div class="content"> -->

                <!-- User profile -->

                <!-- /content area -->
                <div class="col-md-12">
                    <div class="col-md-4">

                        <div class="panel facebook">
                            <div class="panel-body padding10">
                                <div class="col-md-3 col-xs-6" style="margin-left: -20px;">

                                    <img src="<?php echo base_url(); ?>assets/vdvds.png">
                                </div>
                                <div class="col-md-9 col-xs-6">

                                    <div class="" style="margin-top: -40px;">
                                        <h2 class="text-center" style="margin-left: -10px;font-size: 30px;font-weight: 700;"><?php
                                        if (isset($total_Walkins)) {
                                            echo $total_Walkins;
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </h2>
                                    <h5 class="text-center"><p style="margin-top: -10px; margin-left: -10px;">Total Walkins</p></h5>
                                </div>
                            </div>
                        </div>

                        <div id="today-revenue"></div>
                    </div>
                </div>


                <div class="col-md-4">

                    <div class="panel facebook">
                        <div class="panel-body padding10">
                            <div class="col-md-3 col-xs-6" style="margin-left: -20px;">
                                <i class="fa fa-hourglass" style="font-size:30px;color:white; margin-top:7px;margin-left: 10px;"></i>
                            </div>
                            <div class="col-md-9 col-xs-6">

                                <div class="" style="margin-top: -40px;">

                                    <h2 class="text-center" style="margin-left: -10px;font-size: 30px;font-weight: 700;"><?php
                                    if ($key->exit_time == "00:00:00") {

                                        echo "";
                                    } else {

                                        if (round($total_spend_time_of_user[0]->time_of_user, 0) < 60) {

                                            echo round($total_spend_time_of_user[0]->time_of_user, 2) . " min";
                                        } else {

                                            echo date('H', mktime(0, $total_spend_time_of_user[0]->time_of_user)) . " hr";
                                        }
                                    }
                                    ?>
                                </h2>
                                <h5 class="text-center"><p style="margin-top: -10px; margin-left: -10px;">Total Time Spent</p></h5>
                            </div>
                        </div>
                    </div>

                    <div id="today-revenue"></div>
                </div>
            </div>

            <div class="col-md-4">

                <div class="panel offer-back">
                    <div class="panel-body padding10">
                        <div class="col-md-3 col-xs-6"  style="margin-left: -20px;">
                            <i class=" fa fa-star star star-border"	style="margin-left: 16px;"></i>
                        </div>
                        <div class="col-md-9 col-xs-6">

                            <div class="" style="margin-top: -40px;">
                                <h2 class="text-center" style="margin-left: -10px;font-size: 30px;font-weight: 700;"><?php
                                if (isset($SumPOint)) {
                                    echo $SumPOint;
                                } else {
                                    echo "0";
                                }
                                ?>
                                <h5 class="text-center"><p style="margin-top: -10px; margin-left: -10px;">Points Earned</p></h5>
                            </div>
                        </div>
                    </div>

                    <div id="today-revenue"></div>
                </div>
            </div>
            <div class="col-md-12">

                <div class="panel panel-flat"  style="overflow-x: auto;">
                    <div class="panel-heading">
                        <h6 class="panel-title"><b>User Detail</b></h6>
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
                                <th class="col-md-2"> <b> Date </b> </th>
                                <th class="col-md-2"> <b> Offer Name/Store Name</b> </th> 
                                <th class="col-md-2"> <b> Activity Type </b> </th>
                                <th class="col-md-2"> <b> Points </b> </th>
                                <th class="col-md-2"> <b> Time In</b> </th>
                                <th class="col-md-2"> <b> Time Out </b> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $m = 0; $i = 0; foreach ($singleUserActivity as $key) { ?>
                            <tr>
                                <?php
                                $CI = & get_instance();
                                $CI->load->helper('text');
                                $CI->load->model('adminmodel');
                                $storeName = $this->Adminmodel->storeName($key->store_id);
                                if($key->activity_type == 'share' || $key->activity_type == 'favorite_offer') {
                                    $offerName = $this->Adminmodel->offerName($key->store_offer_id);
                                    $name = $offerName[0]->title;
                                } elseif ($key->activity_type == 'rating' || $key->activity_type == 'favorite_store') {
                                    $name = $storeName[0]->store_first_name;
                                }
                                ?>
                                <td class="col-md-2">
                                    <?= $date = $key->activity_date ." ".$key->activity_time; ?>
                                </td>
                                <td class="col-md-2">
                                    <?= $name ?>
                                </td>
                                <td class="col-md-2">
                                    <span style="background: #01a8f6; padding: 4px 0px 2px 0px; border-radius: 4px; color: #fff;">
                                        <?php 
                                        if($key->activity_type == "share") {
                                            if ($offer_array[$m][share_type] == "facebook_points") {
                                                echo "Facebook Share";
                                            } else {
                                                echo "Twitter Share";
                                            }
                                            $m++;
                                        } else {
                                            echo ucwords($key->activity_type);
                                        } ?>
                                    </span>
                                </td>
                                <td class="col-md-2">
                                    <?php 
                                    if($key->activity_type == "share") {
                                        echo $offer_array[$i][points];
                                        $i++;
                                    } else {
                                        echo "-";
                                    } ?>
                                </td>
                                <td class="col-md-2">
                                    <?= $walkinpoints = $key->activity_type == "walkin" ? "00:00:00" : "-"; ?>
                                </td>
                                <td class="col-md-2">
                                    <?= $walkinpoints = $key->activity_type == "walkin" ? "00:00:00" : "-"; ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <!-- /page content -->

    </div>


    <!-- modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Send Notification</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <textarea maxlength="120" id="changemsg" class="form-control input-lg" style="font-size: 19px;max-width:557px;max-height: 148px;" rows="5" name="message" placeholder="Enter message here.."></textarea>

                        <h6 class="pull-right" id="count_message"></h6>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- end model -->


    <!-- /page container -->

</div>
</div>
</div>


<script>
    $("#sample_3").DataTable({
        "paging": true,
        "lengthChange": false,
        "pageLength": 20,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": true
    });

    $(document).on("click", "#click", function () {
        var myBookId = $(this).data('id');
        var user = $(this).data('user');
        var name = $(this).data('name');
        $(".modal-body #selectedValue").val(myBookId);
        $(".modal-body #userId").val(user);
        $("#sname").text(name + "\'s notification");
        $.post("<?php echo base_url(); ?>index.php/control/mydata/" + user + "/" + name + "", function(data, status){

            $(".modal-body #selectedValue").val(myBookId);
            $(".modal-body #userId").val(user);
            $("#sname").text(name + "\'s notification");
            $(".modal-body #changedate1").val(data.split('|')[3]);
            $(".modal-body #changedate2").val(data.split('|')[4]);
            $(".modal-body #changemsg").val(data.split('|')[2]);
            var all = data.split('|')[2].length
            var text_max = 120;
            $('#count_message').html(text_max - all + '/' + text_max);
            $('#changemsg').keyup(function() {
                var text_length = $('#changemsg').val().length;
                var text_remaining = text_max - text_length;
                $('#count_message').html(text_remaining + '/' + text_max);
            });
        });</script>


        <script>

            $('#shows').click(function(){
                window.location.href = "<?php echo base_url(); ?>index.php/control/userdetails/<?php echo $offer_id_confirm; ?>";
            });
            $("#hidemenow").delay(500).fadeIn(300).delay(1000).fadeOut(300);    
        </script>
        <script  src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>


        <script>


            $("#sample_3").DataTable({

                "paging": true,
                "lengthChange": false,
                "pageLength": 10,
                "searching": true,
                "ordering":false,
                "info": true,
                "autoWidth": true,
                dom : 'l<"#add">frtip',
                fnInitComplete: function() {
                    //$('#add').addClass('pull-right');
                }

            });
            $('<label/>').text('Custom Search: ').appendTo('#add')



            $select = $('' +
                '<form action="<?php echo base_url(); ?>/index.php/control/dateRange_user_details/<?php echo $offer_id_confirm; ?>">' +
                '<div class="input-group date form_date col-md-12" id="chh" style="margin-left: 110px;margin-top: -36px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >' +
                '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" style="float: left;">' +
                '</span></span>' +
                '<input class="form-control" size="4"  style="width:130px;" data-date-start-date="+0d" id="changedate1" name="startdate" placeholder="Start Date" style="font-size: 15px;" type="text" value="<?php echo $s_date; ?>" readonly>' +
                '</div>' +
                '<input type="hidden" id="dtp_input1" value="" /><br/><h7 style="color: red;float: left;" id ="date_error"></h7>' +
                '<div class="input-group date form_date2 col-md-12" id="chh" style="float:right;padding-left:8px;margin-right: -276px;margin-top: -58px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >' +
                '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" style="float: left;">' +
                '</span></span>' +
                '<input class="form-control" size="4" style="width:130px;" data-date-start-date="+0d" id="changedate1" name="enddate" placeholder="End Date" style="font-size: 15px;" type="text" value="<?php echo $e_date; ?>" readonly>' +
                '</div>' +
                '<input type="hidden" id="dtp_input2" value="" /><br/><h7 style="color: red;float: left;" id ="date_error2"></h7>' +
                '<input type="submit" value="Apply" id="getValidate" style="border-radius:3px!important; margin-left: 462px;margin-top: -148px;padding-left:10px;" class="btn bg-blue heading-btn" >' +
                '<input type="reset" value="Cancel"  style="border-radius: 3px!important; margin-left:5px;padding-left:10px !important; margin-top:-148px;color:black; text-align:center;" class="btn bg-red heading-btn" >' +
                '<div class="center-block" width="20%" style="text-align:center; padding: 10px 5px;color:red;margin-top: -65px;margin-left: -190px;"><span id="errorSelDate"></span></div>' +
                '</form>').appendTo('#add');
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
            $('#changedate1').change(function(){
                var s_date = $('.form_date').datetimepicker('getDate');
                $('.form_date2').datetimepicker('setDate', s_date);
                $('.form_date2').datetimepicker('setStartDate', s_date);
                $('#errorSelDate').html("");
            });
            $('#getValidate').click(function(){
                if ($('#changedate1').val() == '' || $('#changedate2').val() == ''){
                    $('#errorSelDate').html("Please select Start Date and End Date");
                    return false;
                }
                else{
                    $('#errorSelDate').html("");
                }
            });</script>    

            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tagsinput.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tokenfield.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/maxlength.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/formatter.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_floating_labels.js"></script>

        </body>
        </html>