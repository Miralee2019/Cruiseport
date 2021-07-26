<?php error_reporting(0); ?>

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
    <!-- /theme JS files -->

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
                            <h4><span class="text-semibold">Coupon redemption requests</span></h4>

                            <!--    <div class="heading-elements">
                            <div class="heading-btn-group">
                                    <a href="add_beacons.html" class="btn bg-blue btn-labeled heading-btn"><b><i class=" icon-feed"></i></b> Add Store  </a>
                            
                            </div>
                        </div> -->  

                        <ul class="breadcrumb position-left">
                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome""><i class="icon-home2 position-left"></i> Home</a></li>
                            <li><a href="">Coupon redemption requests</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <div style="text-align:center;display:none;" id="styleme">
                    <div class="alert alert-success">
                        <strong>Refresh successful.</strong>
                    </div>    
                </div>

                <div id="hidemenow">

                    <?php
                    if ($this->session->flashdata()) {
                        echo $this->session->flashdata('coupon_redeemption_status');
                    }

                    if ($this->session->flashdata()) {
                        echo $this->session->flashdata('notification_user_message');
                    }
                    if ($this->session->flashdata()) {
                        echo $this->session->flashdata('refresh_message6');
                    }
                    ?>

                </div>



                <div class="panel panel-flat" style="overflow-x:auto;">
                    <div class="panel-heading">
                        <h6 class="panel-title"><b>Coupon Redemption Details</b></h6>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li> 
                                <li><a id="shows" data-action="reload"></a></li>
                                <!-- <li><a data-action="reload"></a></li>  -->
                                <!--    <li><a data-action="close"></a></li> -->    
                            </ul>
                        </div>
                    </div>


                    <table class="table table-hover" id="sample_3">

                        <thead>
                            <tr>
                                <th><b>ID</b></th>
                                <th><b>Request Date</b></th>
                                <th><b>User Id</b></th>
                                <th><b>Coupon Id</b></th>
                                <th><b>Coupon Title</b></th>
                                <!-- <th><b>User Name</b></th> -->
                                <th><b>User Email</b></th>
                                <th><b>Rubs</b></th>
                                <th><b>Status</b></th>
                                <th><b>Action</b></th>



                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach (array_reverse($requests) as $key) { ?>

                            <tr>
                                <td><?php echo $key->id;  ?></td>

                                <?php 

                                $CI =& get_instance();
                                $CI->load->model('Supermodel');

                                $user = $CI->Supermodel->select_data('T_User', array('user_id' => $key->user_id));
                                $coupon = $CI->Supermodel->select_data('T_Coupon', array('coupon_id' => $key->coupon_id));

                                ?>
                                <td><?php echo $key->created_date; ?></td>
                                <td><?php echo $key->user_id; ?></td>
                                <td><?php echo $key->coupon_id; ?></td>
                                <td><?php echo $coupon[0]->coupon_title; ?></td>
                                <!-- <td><?php echo $user[0]->name; ?></td> -->
                                <td><?php echo $user[0]->email; ?></td>
                                <td><?php echo $key->claim_for_rubs; ?> </td>

                                <td>

                                    <?php if($key->request_status == "2") { ?>

                                    <span class="label label-warning">Pending</span>

                                    <?php } elseif ($key->request_status == "10") { ?>

                                    <span class="label label-success">Accepted</span>

                                    <?php } elseif ($key->request_status == "8") { ?>

                                    <span class="label label-danger">Rejected</span>

                                    <?php } else if(empty($coupon[0]->coupon_id)){ ?>

                                    <span class="label label-danger">Deleted</span>

                                    <?php } else {  ?>

                                    <span class="label label-danger">Unknown</span>

                                    <?php } ?>                                    


                                </td>

                                <td>
                                    <?php if($key->request_status == "2") { ?>  

                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <ul class = "dropdown-menu left" role = "menu">

                                                <li>
                                                    <a href="#" id="notify_user" data-claim = <?php echo $key->id; ?>  data-toggle="modal" data-target="#redeemption_modal" data-user = <?php echo $key->user_id; ?> data-coupon = <?php echo $key->coupon_id; ?>  data-status = "10" ><i class="icon-check"></i> Accept </a></li>
                                                    <li>

                                                        <li>
                                                            <a href="#" id="notify_user" data-claim = <?php echo $key->id; ?>  data-toggle="modal" data-target="#redeemption_modal" data-user = <?php echo $key->user_id;?> data-coupon = <?php echo $key->coupon_id; ?> data-status = "8" ><i class="icon-cross"></i> Reject </a></li>
                                                            <li>
                                                            </ul>
                                                        </li>
                                                    </ul>

                                                </td>

                                                <?php } ?>



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
               
                <div id="redeemption_modal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-body">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" id="sname">Send Notification</h4>
                          <br>

                          <form action="<?php echo base_url(); ?>index.php/superadmin/changeCouponRedeemptionStatus" method="post" class="form-horizontal"  role="form">
                            <!-- <input type="hidden" name="userId" id="userId"> -->
                            <div>
                                <input type="text" class="form-control input-lg" id="sub_text" class="form-control" name="subject" placeholder="Enter subject">   
                            </div>
                            <br>
                            <input type="hidden" name="user_id" id="user_id">
                            <input type="hidden" name="status" id="status">
                            <input type="hidden" name="claim" id="claim">
                            <input type="hidden" name="rubs" id="rubs">
                            <input type="hidden" name="coupon" id="coupon">

                            <div>
                                <textarea maxlength="120" id="changemsg" class="form-control input-lg" style="max-width:557px;max-height: 148px;" rows="5" name="desc" placeholder="Enter message"></textarea>   
                            </div>

                            <br><br>

                            <div align="center">

                                <button type="submit" id="btn_Notification" style="font-size: 19px;" class="btn btn-info btn-lg">Send notification</button>

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
                "pageLength": 20,
                "searching": true,
                "ordering":false,
                "info": true,
                "autoWidth": true,
                dom : 'l<"#add">frtip'
            }); 


            $('<label/>').text('Custom Search: ').appendTo('#add')



            $select = $(''+

        '<form action="<?php echo base_url(); ?>/index.php/superadmin/dateRangeCoupon">'+

         '<div class="input-group date form_date col-md-12" id="chh" style="margin-left: 102px;margin-top: -36px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >'+

        '<span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;">'+
        '</span></span>'+

        '<input class="form-control" size="4" style="width:130px;" data-date-start-date="+0d" id="changedate1" name="startdate" placeholder="Start Date" style="font-size: 15px;" type="text" value="<?php echo $e_date ; ?>" readonly>'+

        '</div>'+


        '<input type="hidden" id="dtp_input2" value="" /><br/><h7 style="color: red;float: left;" id ="date_error2"></h7>'+

        '<div class="input-group date form_date2 col-md-12" id="chh" style="float:right;margin-right: -276px;margin-top: -56px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >'+

        '<span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;">'+
        '</span></span>'+

        '<input class="form-control" size="4" style="width:130px;" data-date-start-date="+0d" id="changedate2" name="enddate" placeholder="End Date" style="font-size: 15px;" type="text" value="<?php echo $e_date ; ?>" readonly>'+

        '</div>'+

        '<input type="hidden" id="dtp_input2" value="" /><br/><h7 style="color: red;float: left;" id ="date_error2"></h7>'+



        '<input type="submit" value="Apply" id="getValidate" style="margin-left: 455px;margin-top: -137px;padding-left:10px !important;" class="btn bg-blue btn-labeled heading-btn" >'+

        '<input type="reset" id="clearme" value="Cancel"  style="margin-left:5px;padding-left:10px !important; margin-top:-137px;color:black;" class="btn bg-red btn-labeled heading-btn" >'+

        '</form>').appendTo('#add'); 



            </script>

            <script type="text/javascript">

                $('#getValidate').click(function(){
                    if($('#changedate2').val() == '' ){
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

            </script> 

            <script type="text/javascript">

                $(document).on("click", "#change_redeemstatus", function () {

                    var status = $(this).data('status');
                    var user = $(this).data('user');
                    var coupon = $(this).data('coupon');
                    var claim = $(this).data('claim');

                    $.post("<?php echo base_url(); ?>index.php/superadmin/changeCouponRedeemptionStatus/"+user+"/"+status+"/"+coupon+"/"+claim+"", function(data, status){
                        console.log(status);
                        location.reload();
                    });
                });

                $(document).on("click", "#notify_user", function () {
                   var user_id = $(this).data('user');
                   var status = $(this).data('status');
                   var user = $(this).data('user');
                   var claim = $(this).data('claim');
                   var coupon = $(this).data('coupon');
                   var rubs = $(this).data('rubs');
                   var sub_text="",changemsg="",btn_text="";

                   if(status == 10) {
                    sub_text="Accept user coupon redemption request";
                    btn_text = "Accept And Send  Notification ";
                    changemsg="Your coupon redemption request accepted.";
                } else {
                    sub_text="Reject user coupon redemption request";   
                    btn_text = "Reject And Send Notification";
                    changemsg="Your coupon redemption request rejected.";   
                }

                $(".modal-body #user_id").val( user );
                $(".modal-body #status").val( status );
                $(".modal-body #claim").val( claim );
                $(".modal-body #coupon").val( coupon );
                $(".modal-body #rubs").val( rubs );
                $(".modal-body #sub_text").val( sub_text );
                $(".modal-body #changemsg").val( changemsg );
                $(".modal-body #btn_Notification").html( btn_text );
            });    


                $('#shows').click(function() {

                    window.location.href = "<?php echo base_url(); ?>index.php/superadmin/couponRedeemRequests/chk";

                });


                $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);    


            </script>







        </body>

        <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
        </html>
