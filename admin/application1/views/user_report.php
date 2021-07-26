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
        <!-- //////////// B 05.01.2018 ///////////////		 -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <!-- //////////// End B 05.01.2018 ///////////////		 -->
        <!-- /global stylesheets -->
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
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/user_pages_profile.js"></script>
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
                                <h4> <a href="<?php echo base_url(); ?>index.php/control/userReport"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">User Report </span></h4>
                                <ul class="breadcrumb position-right">
                                    <li><a href="<?php echo base_url(); ?>index.php/control/userReport"><i class="icon-home2 position-left"></i> Home</a></li>
                                    <li><a href="#">Reports</a></li>
                                    <li class=active>User Report</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /page header -->
                    <!-- Content area -->
                    <!-- <div class="content"> -->
                    <div style="text-align:center;display:none;" id="hidemenow">
                        <?php
                        if ($this->session->flashdata()) {
                            echo $this->session->flashdata('success');
                        }
                        ?>
                    </div>
                    <!-- User profile -->
                    <!-- /content area -->
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="panel facebook">
                                <div class="panel-body padding10">
                                    <div class="col-md-3 col-xs-6" style="margin-left: -20px;">
                                        <img src="<?php echo base_url(); ?>assets/vdvds.png">
                                        <!-- <i class="fa fa-share-alt" style="font-size: 20px;margin-top: 20px;"></i> -->
                                    </div>
                                    <div class="col-md-9 col-xs-6">
                                        <div class="" style="margin-top: -40px;">
                                                <!-- <p class=""><b style="font-size:30px;"> <?php echo $total_shares[0]->shares; ?> </b></p> -->
                                            <h2 class="text-center" style="margin-left: -10px;font-size: 30px;font-weight: 700;">
                                                <?php
                                                /* if($total_Walkins){ echo $total_Walkins[0]->walkin; } else { echo "0"; } */
                                                $m = 0;
                                                foreach ($userWalkinData as $uservalue) {
                                                    $count_walk[$m] = $uservalue->name;
                                                    $m++;
                                                } echo count($count_walk);
                                                ?></h2>
                                            <h5 class="text-center"><p style="margin-top: -10px; margin-left: -10px;">Total Walkins</p></h5>
                                        </div>
                                        <!-- 			<div class="text-size-small">$37,578 avg</div> -->
                                    </div>
                                </div>
                                <div id="today-revenue"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="panel facebook">
                                <div class="panel-body padding10">
                                    <div class="col-md-3 col-xs-6" style="margin-left: -20px;">
                                            <!-- <img src="<?php echo base_url(); ?>assets/hourglass.png" style="margin-top: -4px;width: 52px;height: 52px;"> -->
                                        <i class="fa fa-hourglass" style="font-size:30px;color:white; margin-top:7px;margin-left: 10px;"></i>
                                        <!-- <i class="fa fa-share-alt" style="font-size: 20px;margin-top: 20px;"></i> -->
                                    </div>
                                    <div class="col-md-9 col-xs-6">
                                        <div class="" style="margin-top: -40px;">
                                                <!-- <p class=""><b style="font-size:30px;"> <?php echo $total_shares[0]->shares; ?> </b></p> -->
                                            <h2 class="text-center" style="margin-left: -10px;font-size: 30px;font-weight: 700;"><?php
                                                if ($total_time_spent[0]->time) {
                                                    echo round($total_time_spent[0]->time) . " Min";
                                                } else {
                                                    echo "0";
                                                }
                                                ?></h2>
                                            <h5 class="text-center"><p style="margin-top: -10px; margin-left: -10px;">Total Time Spent</p></h5>
                                        </div>
                                        <!-- 			<div class="text-size-small">$37,578 avg</div> -->
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
                                        <!-- <i class="fa fa-share-alt" style="font-size: 20px;margin-top: 20px;"></i> -->
                                    </div>
                                    <div class="col-md-9 col-xs-6">
                                        <div class="" style="margin-top: -40px;">
                                            <h2 class="text-center" style="margin-left: 20px;font-size: 30px;font-weight: 700;"><?php
                                                $sum = 0;
                                                $m = 0;
                                                foreach ($userActivity as $key) {
                                                    //if(!empty($point)){
                                                    // $sum=$sum+$point->walking_point;
                                                    if ($key->activity_type == "share") {
                                                        $getpoints = $this->Adminmodel->select_data('T_SocialSharePoint', array('user_id' => $key->user_id, 'store_id' => $key->store_id, 'store_offer_id' => $key->store_offer_id));
                                                        $point = $getpoints[$m]->points;
                                                        $sum = $sum + $point;
                                                    }
                                                    //}
                                                    //$sum; Need to add walkin points here - dependant on walkin api
                                                }
                                                $m++;
                                                if (!empty($sum)) {
                                                    echo $sum;
                                                } else {
                                                    echo "0";
                                                }
                                                /* if($today_Walkins){ echo $today_Walkins[0]->walkin; } else { echo "0"; } */
                                                ?></h2>
                                            <h5 class="text-center"><p style="margin-top: -10px; margin-left: 20px;">Points Earned</p></h5>
                                        </div>
                                        <!-- 			<div class="text-size-small">$37,578 avg</div> -->
                                    </div>
                                </div>
                                <div id="today-revenue"></div>
                            </div>
                        </div>
                        <!-- </div> -->

                        <div class="col-md-12">
                            <div class="panel panel-flat" style="overflow-x: auto;">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><b>User Report</b></h6>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li> <!-- <a id="#shows"> <i class="fa fa-refresh"></i></li> </a>  -->
                                            <li><a id="shows" data-action="reload"></a></li>
                                            <!-- 	<li><a data-action="close"></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive" style="border: none;">
                                    <table class="table table-hover" id="sample_3">
                                        <thead>
                                            <tr>
                                                <th><b>Activity Date</b></th>
                                                <th style="width: 270px;"><b>Profile & User Name</b></th>
                                                <!-- <th><b>Profile</b></th> -->
                                                <th><b>User Email</b></th>
                                                <th><b>Activity Type</b></th>
                                                <th><b>Offer Name/Store Name</b></th>
                                                <th><b>Points</b></th>
                                                <th><b>Action</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $m = 0;
                                            foreach ($userActivity as $key) {
                                                ?>
                                                <tr>
                                                    <?php
                                                    $CI = & get_instance();
                                                    $CI->load->model('adminmodel');
                                                    $storeName = $this->Adminmodel->storeName($key->store_id);
                                                    if ($key->activity_type == 'share' || $key->activity_type == 'favorite_offer') {
                                                        $offerName = $this->Adminmodel->offerName($key->store_offer_id);
                                                        $name = $offerName[0]->title;
                                                    } elseif ($key->activity_type == 'rating' || $key->activity_type == 'favorite_store') {
                                                        $name = $storeName[0]->store_first_name;
                                                    }
                                                    $point = $this->Adminmodel->select_data('T_SocialSharePoint', array('user_id' => $key->user_id, 'store_id' => $key->store_id, 'store_offer_id' => $key->store_offer_id), array('social_share_point_id' => 'desc'));
                                                    // $total_spend_time_of_user = $this->Adminmodel->totalTimeSpentOfUser($dash[0]->store_id, $key->user_id);
                                                    // $offer_details = $this->Adminmodel->select_data('T_SocialSharePoint', array("store_id" => $dash[0]->store_id, "user_id" => $key->user_id));
                                                    ?>
                                                    <td>
    													<?= $key->activity_date . " " . $key->activity_time; ?>
                                                    </td>
                                            <!-- <td>
                                                    <a href="<?= base_url(); ?>index.php/control/userdetails/<?php echo $key->user_id ?>"> <?php echo $key->name; ?></a>
                                            </td> -->
                                                    <td>
                                                        <img class="img-circle" src='<?= $path; ?>api/uploads/<?php
                                                        if (isset($key->profile_image)) {
                                                            echo $key->profile_image;
                                                        } else {
                                                            echo "user_img.png";
                                                        }
                                                        ?>' style="width: 40px; height: 40px; text-align: left;" alt="<?php echo $key->name; ?>" >
                                                        <a style="margin-left: 5px;" href="<?= base_url(); ?>index.php/control/userdetails/<?php echo $key->user_id ?>"> <?php echo $key->name; ?></a>
                                                    </td>
                                                    <td>
                                                        <?= $key->email; ?>
                                                    </td>
                                                    <td>
                                                        <span style="background: #01a8f6; padding: 4px 0px 2px 0px; border-radius: 4px; color: #fff;">
                                                            <?php
                                                            if ($key->activity_type == "share") {
                                                                if ($point[$m]->share_type == "facebook_points") {
                                                                    echo "Facebook Share";
                                                                } else {
                                                                    echo "Twitter Share";
                                                                }
                                                            } else {
                                                                echo ucwords($key->activity_type);
                                                            }
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                    <?= $name; ?>
                                                    </td>
                                                    <td>
												    <?php
												    echo $points = $key->activity_type == "share" ? $point[$m]->points : "-";
												    ?>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            <a class="btn btn-info" style="font-size: 15px;border-radius:5px !important;" id="click" data-email="<?= $key->email; ?>" data-id="<?= $key->user_id; ?>" data-toggle="modal" data-target="#myModal">Send Notification</a>
                                                        </div>
                                                    </td>
                                                </tr>
											<?php } $m++; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-md-12">

                        <div class="panel panel-flat">
                                        <div class="panel-heading">
                                                                <h6 class="panel-title"><b>Activity </b></h6>
                                                                <div class="heading-elements"> -->
                        <!-- <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                        </ul> -->
                        <!-- </div>
</div>


</div> -->
<?php //foreach ($userWalkinData as $key) {   ?>
                        <!-- <div class="row">
                                <div class="col-lg-12">
                                        <div class="tabbable">
                                                <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="activity">
                        -->
                        <!-- Timeline -->
                        <!-- <div class="timeline timeline-left content-group">
                                <div class="timeline-container"> -->
                        <!-- Sales stats -->
                        <!-- <div class="timeline-row">
                                <div class="timeline-icon">
                                        <a href="#">
<?php if ($key->profile_image) { ?>

                                                                <img src="<?= $path; ?>api/uploads/<?php echo $key->profile_image; ?>" alt="">
<?php } ?>
                                        </a>
                                </div>
                                <div class="panel panel-flat timeline-content">
                                        <div class="panel-heading">
                                                <h6 class="panel-title" ><b> <?php echo $key->name; ?> </b> </h6>
                                                <div class="heading-elements">
                                                        <span class="heading-text"><i class="icon-history position-left text-success"></i> Updated <?php echo $key->difftime; ?> hours ago</span>
                                                        <ul class="icons-list">
                                                <li><a data-action="reload"></a></li>
                                        </ul>
                                </div>
                                        </div>
                                        <div class="panel-body">
                                                <div class="panel panel-heading">
                                                        <p>Walkin to Store at <b><?php echo $key->detected_time . " On " . $key->detected_date; ?></b> </p>
                                                </div>
                                                <div class="panel panel-heading">
                                                        <p>WalkOut from Store at <b><?php echo $key->exit_time . " On " . $key->exit_date; ?></b> </p>
                                                </div>
                        -->
                                <!-- <p>Walin to Store at <b><?php echo $key->detected_time . " On " . $key->detected_date; ?></b> </p>
                                        <p>WalOut from Store at <b><?php echo $key->exit_time . " On " . $key->exit_date; ?></b> </p> -->
                        <!-- 	</div>
                        </div>
                </div> -->
                        <!-- /sales stats -->
                        <!-- 	</div>
                        </div> -->
                        <!-- /timeline -->
                        <!-- </div>
                </div>
        </div>
</div>
</div> -->
                        <!-- /user profile -->

<?php //}   ?>
                        <!-- </div> -->
                        <!-- /page content -->
                    </div>







                    <!-- modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <form action="<?= base_url() ?>index.php/control/send_notification" method="POST">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Send Notification</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="email_to" id="email_to">
                                        <p>
                                            <textarea maxlength="120" id="changemsg" required="" class="form-control input-lg" style="font-size: 19px;max-width:557px;max-height: 148px;" rows="5" name="message" placeholder="Enter message here.."></textarea>
                                        	<h6 class="pull-right" id="count_message"></h6>
                                        </p>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <input type="submit" class="btn btn-primary" name="send_notification" value="Send">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end model -->

                    <!-- /page container -->
                    <!-- <footer><a href="www.cashrub.com" style="color: #777777;">@CashRub</a></footer> -->

                    <script>
                        $(document).on("click", "#click", function () {
                            var myBookId = $(this).data('id');
                            var user = $(this).data('user');
                            var name = $(this).data('name');
                            var email_to = $(this).data('email');

                            $(".modal-body #selectedValue").val(myBookId);
                            $(".modal-body #userId").val(user);
                            $("#email_to").val(email_to);

                            $("#sname").text(name + "\'s notification");

                            $.post("<?php echo base_url(); ?>index.php/control/mydata/" + user + "/" + name + "", function (data, status) {
                                $(".modal-body #selectedValue").val(myBookId);
                                $(".modal-body #userId").val(user);
                                $("#sname").text(name + "\'s notification");
                                $(".modal-body #changedate1").val(data.split('|')[3]);
                                $(".modal-body #changedate2").val(data.split('|')[4]);
                                $(".modal-body #changemsg").val(data.split('|')[2]);
                                var all = data.split('|')[2].length
                                var text_max = 120;
                                $('#count_message').html(text_max - all + '/' + text_max);
                                $('#changemsg').keyup(function () {
                                    var text_length = $('#changemsg').val().length;
                                    var text_remaining = text_max - text_length;
                                    $('#count_message').html(text_remaining + '/' + text_max);
                                });
                                // alert(data.split('|')[1]);
                                // alert("Data: " + data + "\nStatus: " + status);
                            });
                            // alert(name);
                            //      $(".modal-body #selectedValue").val( myBookId );
                            //      $(".modal-body #userId").val( user );
                            // $("#sname").text(name+"\'s notification");
                            // alert(myBookId);
                        });

                        // $("#sample_3").DataTable({
                        // 	"paging": true,
                        //     "lengthChange": false,
                        //     "pageLength": 20,
                        //     "searching": true,
                        //     "ordering":false,
                        //     "info": false,
                        //     "autoWidth": true
                        // });
                        //    $("#sample_3").on('click','#delete-sub',function(){
                        //     	if (confirm("Are you sure to delete this Beacon ?") == false) {
                        // 							return;
                        // 	}
                        //           alert("Beacon Deleted");
                        //           $(this).closest('tr').remove();
                        //        });

                        // 	$(document).on("click", "#delete-sub", function () {
                        // 		var Id = $(this).data('id');
                        // 		$.post("<?php echo base_url(); ?>index.php/control/deleteBeacon/"+Id, function(data, status){
                        //     });
                        // });
                    </script>
                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tagsinput.min.js"></script>
                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tokenfield.min.js"></script>
                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/maxlength.min.js"></script>
                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/formatter.min.js"></script>
                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_floating_labels.js"></script>

                    <!-- ============================== B 01.05.2018================================= -->
                    <script>
                        $('#shows').click(function () {
                            window.location.href = "<?php echo base_url(); ?>index.php/control/userReport/chk";
                        });
                        $("#hidemenow").delay(500).fadeIn(300).delay(1000).fadeOut(300);


                        // function refreshPage(){
                        // 	window.location.reload();
                        // 	callMe();
                        // }
                        // function callMe(){
                        // 	$('#styleme').show();
                        // 	setTimeout(20000);
                        // 	 //$("#styleme").delay(2000).fadeIn(5000).delay(5000).fadeOut(5000);
                        // }
                    </script>
                    <script  src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
                    <script>

                        $("#sample_3").DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "pageLength": 20, // Linosys developer code
                            "searching": true,
                            "ordering": false,
                            "info": true,
                            "autoWidth": true,
                            dom: 'l<"#add">frtip'
                                    // fnInitComplete: function() {
                                    // 	$('#add').addClass('pull-right');
                                    // }

                        });
                        $('<label/>').text('Custom Search: ').appendTo('#add')
                        $select = $('' +
                                '<form action="<?php echo base_url(); ?>/index.php/control/dateRange_user_report">' +
                                '<div class="input-group date form_date col-md-12" id="chh" style="margin-left: 110px;margin-top: -36px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >' +
                                '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" style="float: left;">' +
                                '</span></span>' +
                                '<input class="form-control" size="4"  style="width:130px;" data-date-start-date="+0d" id="changedate1" name="startdate" placeholder="Start Date" style="font-size: 15px;" type="text" value="<?php echo $s_date; ?>" readonly>' +
                                '</div>' +
                                '<input type="hidden" id="dtp_input1" value="" /><br/><h7 style="color: red;float: left;" id ="date_error"></h7>' +
                                '<div class="input-group date form_date2 col-md-12" id="chh" style="float:right;padding-left:8px;margin-right: -276px;margin-top: -58px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >' +
                                '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" style="float: left;">' +
                                '</span></span>' +
                                '<input class="form-control" size="4" style="width:130px;" data-date-start-date="+0d" id="changedate2" name="enddate" placeholder="End Date" style="font-size: 15px;" type="text" value="<?php echo $e_date; ?>" readonly>' +
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
                        $('#changedate1').change(function () {
                            var s_date = $('.form_date').datetimepicker('getDate');
                            $('.form_date2').datetimepicker('setDate', s_date);
                            $('.form_date2').datetimepicker('setStartDate', s_date);
                            $('#errorSelDate').html("");
                        });
                        $('#getValidate').click(function () {
                            if ($('#changedate1').val() == '' || $('#changedate2').val() == '') {
                                $('#errorSelDate').html("Please select Start Date and End Date");
                                return false;
                            }
                            else {
                                $('#errorSelDate').html("");
                            }
                        });

                    </script>
                    <!-- ============================== End B 01.05.2018================================= -->
                    </body>
                    </html>
