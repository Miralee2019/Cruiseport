<?php error_reporting(0); ?>
<?php $path = TEMP_PATH;?> 

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cash Rub</title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <!-- /global stylesheets -->
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
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->
    <script src="https://use.fontawesome.com/405c986bfb.js"></script>
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
        <!-- Main content -->
        <div class="content-wrapper">
           <!-- Page header -->
           <div class="page-header">
              <div class="page-header-content">
                 <div class="page-title">
                    <h4><a href="<?php echo base_url(); ?>index.php/superadmin/view_userinfo"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">View User Details</span></h4>
                    <ul class="breadcrumb position-right">
                        <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-home2 position-left"></i> Home</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/superadmin/view_userinfo">Users</a></li>
                        <li><a href="#">User Details</a></li>
                    </ul>                        
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="col-lg-1 col-md-2">
                                <?php if($userName[0]->profile_image){ ?>
                                <img class="img-circle" src="<?= $path; ?>api/uploads/<?php echo $userName[0]->profile_image; ?>" class= "img img-responsive"  style="width: 90px; height: 85px;" > 
                                <!-- <img class="img-circle" src="http://139.59.18.176/api/uploads/<?php echo $userName[0]->profile_image; ?>" class= "img img-responsive"  style="width: 90px; height: 85px;" >  -->
                                <?php }else{?>
                                <img class="img-circle" src="http://eadb.org/wp-content/uploads/2015/08/profile-placeholder.jpg"  style="width: 90px; height: 85px;" class="img img-responsive" > 
                                <?php } ?>
                            </div>
                            <div class="col-lg-3 col-md-3" style="margin: 0.5%;">
                                <b style="font-size: 16px;">Username : <?php echo $userName[0]->name; ?></b>
                                <br>
                                <h5 style="font-size: 13px;">First Walkin Date : 
                                    <?php                       
                                    foreach ($userWalkinData as $key) {
                                        if ($key === end($userWalkinData)) {
                                            ?>
                                            <?php echo $key->detected_date; } /* end if*/ }//end foreach ?></h5>
                                            <h5 style="font-size: 13px;">Last Walkin Date :
                                                <?php 
                                                foreach ($userWalkinData as $key) { 
                                                    if ($key === reset($userWalkinData)) {
                                                        ?>
                                                        <?php echo $key->detected_date; } /* end if*/ }//end foreach?></h5>
                                                    </div>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /page header -->
                                <!-- Content area -->
                                <div class="content">
                                   <div class="row">
                                    <div class="col-lg-4" >
                                        <!-- Current server load -->
                                        <div class="panel facebook" style="background-color: green;">
                                            <div class="panel-body" style="color: white;">
                                                <div class="col-lg-4 col-xs-4">
                                                    <img src="<?php echo base_url(); ?>assets/vdvds.png" style="height: 40px; width: 40px; margin: 15px;">
                                                   <!-- <i class='icon-users' style="font-size: 45px;"></i> -->
                                               </div>
                                               <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%;">
                                                <h3 style="font-size: 30px;" class="no-margin" ><b> <?php echo $total_w ? : '0'; ?> </b></h3>
                                                <p style="font-weight: 700;font-size: 13px;">Total Walkins</p>
                                            </div>
                                        </div>
                                        <div id="server-load"></div>
                                    </div>
                                    <!-- /current server load -->
                                </div>
                                <div class="col-lg-4">
                                    <!-- Today's revenue -->
                                    <div class="panel walk" style="background-color: red;color: white;">
                                        <div class="panel-body">
                                            <div class="col-lg-4 col-xs-4">
                                                <img src="<?php echo base_url(); ?>assets/vdvds.png" style="height: 40px; width: 40px; margin: 15px;">
                                                <!-- <i class=" fa fa-star star star-border" style="margin-left: 16px;"></i> -->
                                                <!-- <i class="icon-user-check" style="font-size: 45px;"></i> -->
                                            </div>
                                            <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%;">
                                                <h3 style="font-size: 30px;"  class="no-margin"> <b> <?php echo round($total_spent[0]->walkin_spent) ? : '0' ; ?> </b></h3>
                                                <p style="font-weight: 700;font-size: 13px;">Total Time Spent</p>
                                            </div>
                                        </div>
                                        <div id="today-revenue"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <!-- Today's revenue -->
                                    <div class="panel purchase" style="background-color: blue;color: white;">
                                        <div class="panel-body">
                                            <div class="col-lg-4 col-xs-4">
                                                <i class="fa fa-trophy" aria-hidden="true" style="font-size: 40px; margin: 15px;"></i>
                                                <!-- <i class="icon-user-cancel" style="font-size: 45px;"></i> -->
                                            </div>
                                            <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%;">
                                                <h3 style="font-size: 30px;" class="no-margin"><b> <?php echo ($w_p[0]->walkin_p + $t_p[0]->twitter_p  + $f_p[0]->facebook_p + $user_points[0]->reward_points) - $user_points[0]->coupon_redeem_rubs  ? : '0'; ?> </b>
                                                     </h3>
                                                <p style="font-weight: 700;font-size: 13px;">Points Earned</p>
                                            </div>
                                        </div>
                                        <div id="today-revenue"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="hidemenow">
                                <?php
                                if ($this->session->flashdata()) {
                                    echo $this->session->flashdata('refresh_message5');
                                }
                                ?>
                            </div>
                            <?php if(!$user_report) { ?>
                            <div class="alert alert-danger" style="text-align: center;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong >There is no report for this user</strong>
                            </div>
                            <?php die; } ?>
                            <div class="panel panel-flat" style="overflow-x: auto;">
                                <div class="panel-heading">
                                    <div class="heading-elements">
                                         <button class="btn bg-blue btn-labeled heading-btn" style="padding: 10px 30px; font-size: 12px; border-radius: 4px !important;" onclick="exporttocsv()">Export </button>
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
                                            filename: 'User_Details'
                                         });
                                                    // $('#sample_3 tr').find('th:last-child, td:last-child').add();
                                                    // location.reload();
                                    }
                                </script>

                                <table class="table table-hover" id="sample_3">
                                    <thead>
                                        <tr>
                                            <th class="col-md-2"><b>Date &amp; Time</b></th>
                                            <th><b>Activity Type</b></th>
                                            <th><b>Store/Offer Name</b></th>
                                            <th><b>Points</b></th>
                                            <th><b>Time In</b></th>
                                            <th><b>Time Out</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $m=0;
                                        $CI =& get_instance();
                                        $CI->load->model('Supermodel');
                                       // $point = $CI->Supermodel->select_data("T_SocialSharePoint", array('user_id'=>$userName[0]->user_id));
                                        if($user_report)
                                        {
                                        foreach ($user_report as $key) {
                                           
                                            
                                            $store = $CI->Supermodel->select_data("T_Store",array('store_id' => $key->store_id ));
                                            $storeoffer = $CI->Supermodel->select_data("T_StoreOffer", array('store_offer_id'=>$key->store_offer_id));
                                            $user = $CI->Supermodel->select_data("T_User",array('user_id' => $key->user_id ));
                                            $t_time = $CI->Supermodel->select_data('T_BeaconActivity', array('store_id'=>$key->store_id, 'user_id'=>$key->user_id));
                                            ?>
                                            <?php //if($store[0]->store_email != '') { ?>
                                            <tr>

                                                <td class="col-md-2"><?php echo $key->activity_date." - ".$key->activity_time; ?></td>
                                                <?php if($key->activity_type == "walkin" ) { ?>
                                                <td><span class="label label-info"><?php echo $key->activity_type; ?></span></td>
                                                <?php } elseif ( $key->activity_type == "share" ) { 
                                                        $pts =$point[$m]->points;  
                                                        $nm = $key->activity_type;
                                                        
                                                        if ($point[$m]->share_type == "facebook_points") {                                                                    
                                                                    $nm = "Facebook Share";
                                                                } else {
                                                                    $nm = "Twitter Share";
                                                                }
                                                         $m = $m + 1 ;                                                     

                                                ?>
                                                <td><span class="label label-primary"><?php echo $nm; ?></span></td>
                                                <?php } elseif ( $key->activity_type == "offer_share" ) { ?>
                                                <td><span class="label label-primary"><?php echo $key->activity_name; ?></span></td>
                                                <?php } elseif ( $key->activity_type == "favorite_offer"  ) { ?>
                                                <td><span class="label label-primary"><?php echo $key->activity_type; ?></span></td>       
                                                <?php } elseif ( $key->activity_type == "favorite_store"  ) { ?>                        
                                                <td><span class="label label-primary"><?php echo $key->activity_type; ?></span></td>       
                                                <?php } elseif ( $key->activity_type == "favorite_coupon"  ) { ?>                        
                                                <td><span class="label label-primary"><?php echo $key->activity_type; ?></span></td>  
                                                <?php } elseif ( $key->activity_type == "offer_invite"  ) { ?>                        
                                                <td><span class="label label-primary"><?php echo $key->activity_type; ?></span></td>
                                                 <?php } elseif ( $key->activity_type == "rate_store"  ) { ?>                        
                                                <td><span class="label label-primary"><?php echo $key->activity_type; ?></span></td>                   
                                                <?php } elseif ( $key->activity_type == "redeem_coupon"  ) { ?>                        
                                                <td><span class="label label-warning"><?php echo $key->activity_type; ?></span></td>                                                       
                                                 <?php } elseif ( $key->activity_type == "convert_to_paytm"  ) { ?>                        
                                                <td><span class="label label-warning"><?php echo $key->activity_type; ?></span></td>       
                                                <?php } else { ?>
                                                <td><span class="label label-warning"><?php echo $key->activity_type; ?></span></td>                               
                                                <?php } ?>


                                                 <?php if($key->activity_type == "walkin" ) { ?>
                                                <td><span><?php echo $key->activity_name; ?></span></td>
                                                <?php } elseif ( $key->activity_type == "share" ) { ?>
                                                <td><span><?php echo $storeoffer[0]->title;  ?></span></td>
                                                <?php } elseif ( $key->activity_type == "offer_share" ) { ?>
                                                <td><span><?php echo $storeoffer[0]->title; ?></span></td>
                                                <?php } elseif ( $key->activity_type == "favorite_offer"  ) { ?>
                                                <td><span><?php echo $storeoffer[0]->title; ?></span></td>       
                                                <?php } elseif ( $key->activity_type == "favorite_store"  ) { ?>                        
                                                <td><span><?php echo $store[0]->store_first_name; ?></span></td>       
                                                <?php } elseif ( $key->activity_type == "favorite_coupon"  ) { ?>                        
                                                <td><span><?php echo $key->activity_name; ?></span></td>  
                                                <?php } elseif ( $key->activity_type == "offer_invite"  ) { ?>                        
                                                <td><span><?php echo $storeoffer[0]->title;  ?></span></td>
                                                 <?php } elseif ( $key->activity_type == "rate_store"  ) { ?>                        
                                                <td><span><?php echo $store[0]->store_first_name; ?></span></td>                   
                                                <?php } elseif ( $key->activity_type == "coupon_redeem"  ) { ?>                        
                                                <td><span><?php echo $key->activity_name; ?></span></td>                                                       
                                                 <?php } elseif ( $key->activity_type == "convert_to_paytm"  ) { ?>                        
                                                <td><span><?php ?></span></td>       
                                                <?php } else { ?>
                                                <td><span><?php echo $key->activity_type; ?></span></td>                               
                                                <?php }

                                               if ( $key->activity_type == "coupon_redeem"  ) { 
                                                    $r_temp = $this->Supermodel->getCouponByStoreOfferId($key->store_offer_id);
                            
                                                ?>
                                                <td><?php  //echo $r_temp[0]->claim_for_rubs;   ?> </td>
                                                <?php }  elseif ( $key->activity_type == "convert_to_paytm"  ) { 
                                                            $r = $this->Supermodel->getPaytmRedeemByStoreOfferId($key->store_offer_id);
                                                ?> 
                                               <td><?php echo $r[0]->no_of_rubs;  ?></td>
                                               <?php }  elseif ( $key->activity_type == "share"  ) { 
                                                ?>
                                                <td><?php  echo $pts; //$points[$m]->points;  ?> </td>
                                               <?php   }  elseif ( $key->activity_type == "walkin"  ) { 
                                                ?>
                                                <td><?php  echo $user[0]->walking_points; //$points[$m]->points;  ?> </td>
                                               <?php   } else { ?> <td></td> <?php } ?>
                                               
                                                <td><?php echo $t_time[0]->detected_time; ?></td>
                                                <td><?php echo $t_time[0]->exit_time; ?> </td>
                                               
                                                </tr>
                                                <?php// } ?>
                                                <?php } } ?>
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
                </div>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
                <script>
                 $("#sample_3").DataTable({
                    "paging": true, 
                    "lengthChange": false,
                    "searching": true,
                    "ordering":false,
                    "info": true,
                    "autoWidth": true,
                    dom : 'l<"#add">frtip'
                });
                 $('<label/>').text('Custom Search: ').appendTo('#add')
                 $select = $(''+
                    '<form action="<?php echo base_url(); ?>/index.php/superadmin/dateRangeUserReport/<?php echo $key->user_id; ?>">'+
                    '<div class="input-group date form_date col-md-12" id="chh" style="margin-left: 102px;margin-top: -36px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >'+
                    '<span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;">'+
                    '</span></span>'+
                    '<input class="form-control" size="4"  style="width:130px;" data-date-start-date="+0d" id="changedate1" name="startdate" placeholder="Start Date" style="font-size: 15px;" type="text" value="<?php //echo $s_date ; ?>" readonly>'+
                    '</div>'+
                    '<input type="hidden" id="dtp_input1" value="" /><br/><h7 style="color: red;float: left;" id ="date_error"></h7>'+
                    '<div class="input-group date form_date2 col-md-12" id="chh" style="float:right;margin-right: -276px;margin-top: -56px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >'+
                    '<span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;">'+
                    '</span></span>'+
                    '<input class="form-control" size="4" style="width:130px;" data-date-start-date="+0d" id="changedate2" name="enddate" placeholder="End Date" style="font-size: 15px;" type="text" value="<?php //echo $e_date ; ?>" readonly>'+
                    '</div>'+
                    '<input type="hidden" id="dtp_input2" value="" /><br/><h7 style="color: red;float: left;" id ="date_error2"></h7>'+
                    '<input type="submit" value="Apply" id="getValidate" style="margin-left: 455px;margin-top: -137px;padding-left:10px !important;" class="btn bg-blue btn-labeled heading-btn" >'+
                    '<input type="reset" id="clearme" value="Cancel"  style="margin-left:5px;padding-left:10px !important; margin-top:-137px;color:black;" class="btn bg-red btn-labeled heading-btn" >'+
                    '</form>').appendTo('#add'); 
                 $("#sample_3").on('click','#delete-sub',function(){
                    if (confirm("Are you sure to delete this Store ?") == false) {
                        return;
                    }
                    alert("Store Deleted");
                    $(this).closest('tr').remove();
                });
                 $('#shows').click(function() {
            // alert("<?php echo base_url(); ?>index.php/superadmin/userReportByUser/<?php echo $selected_user_detail[0]->user_id; ?>/chk");
                    window.location.href = "<?php echo base_url(); ?>index.php/superadmin/userReportByUser/<?php echo $selected_user_detail[0]->user_id; ?>/chk";
                });
                 $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);  
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
                 $('#getValidate').click(function(){
                    if($('#changedate1').val() == '' || $('#changedate2').val() == '' ){
                        $('#errorSelDate').html("Please select Start Date and End Date");
                        return false;
                    }
                    else{
                        $('#errorSelDate').html("");
                    }
                });  
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

                            if (title.length < 6) {

                                var text = clean_text($(this).text());

                                title.push(text);

                            }

                        });



                        $(this).find('td').each(function () {

                            if (data.length < 6) {

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
        </html>
