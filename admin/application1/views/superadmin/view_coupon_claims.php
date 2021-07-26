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

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

        .panel-body{
            padding: 0px;
        }

        .icon-size {
            font-size: 35px; margin: 20%;
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
            
            <!-- Page header -->
                    
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4> 

                                <a href="<?php echo base_url(); ?>index.php/superadmin/viewCoupons"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Coupon Claim Details</span></h4>
                                    <ul class="breadcrumb position-right">
                                
                                <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-home2 position-left"></i> Home</a></li><!-- 
                                <li><a href="<?php echo base_url(); ?>index.php/superadmin/view_userinfo">Users</a></li> -->
                                <li><a href="#">Coupon Claim Details</a></li>
                            
                            </ul>
                        </div>
                        </div>
                    </div>
                    <!-- /page header -->



<!--         <div class="page-header">
                    <div class="page-header-content">
                        <div class="page-title">
                            <a href="<?php echo base_url(); ?>index.php/superadmin/view_userinfo"><i class="icon-arrow-left52 position-left"></i></a> <h4><span class="text-semibold">Coupon Claim Details</span></h4>
                                <ul class="breadcrumb position-left">
                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome""><i class="icon-home2 position-left"></i> Home</a></li>
                            <li><a href="">Coupon Claim Details</a></li>
                        </ul>
                    </div>
                    </div>
        
                </div> -->
            
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- ********************this cards code added on 26022018 -->

                    <div class="row">
                        <?php if($coupon_status[0]->status == 1){?>

                        <div class="col-lg-4 col-md-4" >

                             <div id="todaysClaimsDiv" class="panel" style="background-color: green;">

                                <div class="panel-body" style="color: white;">                                            

                                    <div class="col-lg-4 col-xs-4">

                                        <!-- <img src="<?php echo base_url(); ?>assets/vdvds.png"> -->

                                         <i class="fa fa-money icon-size"></i>

                                    </div>


                                    <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%;">                                                    
                                            <h3 class="no-margin" style="font-size: 30px;font-weight: bold;"><?php   echo $todays_claims[0]->todaysClaims ? $todays_claims[0]->todaysClaims : '0'; ?> </h3>
                                            <p style="font-weight: 700;font-size: 13px;">Today's Claims </p>

                                    </div>

                                 </div> <!-- panel body -->                                      



                            </div>   <!-- panel -->                                               

                        </div> <!-- col --> 
                        <?php } ?>

                        <div class="col-lg-4 col-md-4" >

                             <div class="panel" style="background-color: blue;">

                                <div class="panel-body" style="color: white;">                                            

                                    <div class="col-lg-4 col-xs-4">

                                        <!-- <img src="<?php echo base_url(); ?>assets/vdvds.png"> -->

                                        <i class="fa fa-money icon-size"></i>

                                    </div>


                                    <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%;">                                                    

                                        <h3 class="no-margin" style="font-size: 30px;font-weight: bold;"><?php echo $total_claims[0]->totalClaims ? $total_claims[0]->totalClaims : '0'; ?> </h3>
                                            <p style="font-weight: 700;font-size: 13px;">Total Claims </p>

                                    </div>

                                 </div> <!-- panel body -->                                      

                            </div>   <!-- panel -->                                               

                        </div> <!-- col --> 

                            
                    </div> <!-- row -->                                      



                    



                    <!--********************* -->

                    <div id="hidemenow">
                            
                            <?php

                                if ($this->session->flashdata()) {
                                        echo $this->session->flashdata('refresh_message_claim');
                                }
                            ?>

                    </div>
                    

                    
                    <div class="panel panel-flat" style="overflow-x:auto;">
                            <div class="panel-heading">
                                        <h6 class="panel-title"><b>Coupon Claim Details</b></h6>
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
                                        <th><b>Claim Date</b></th>
                                        <!-- <th><b>User Id</b></th> -->
                                        <th><b>User Name</b></th>
                                        <th><b>User Email</b></th>
                                        <th><b>Store Name</b></th>
                                        <th><b>Coupon Points</b></th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($coupon_claims as $key) { ?>

                                    <tr>
                                        <td><?php echo $key->id; ?></td>

                                        <?php 

                                            $CI =& get_instance();
                                            $CI->load->model('adminmodel');
                                            
                                            $user = $CI->Supermodel->select_data('T_User', array('user_id' => $key->user_id));
                                            $coupon = $CI->Supermodel->select_data('T_Coupon', array('coupon_id' => $key->coupon_id));
                                            $store = $CI->Supermodel->select_data('T_Store', array('store_id' => $coupon[0]->store_id ));
                                            

                                            // $store = $CI->Supermodel->select_data('T_Store', $key->store_id);
                                            // $twitter = $CI->Supermodel->getTwitterPoints($key->user_id);
                                            // $facebook = $CI->Supermodel->getFacebookPoints($key->user_id);
                                            
                                        ?>
                                        <td><?php echo $key->created_date; ?></td>
                                        <!-- <td><?php echo $key->user_id; ?></td> -->
                                        <td><?php echo $user[0]->name; ?></td>
                                        <td><?php echo $user[0]->email; ?></td>
                                        <td><?php echo $store[0]->store_first_name; ?></td>
                                        <td><?php echo $key->claim_for_rubs; ?></td>


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

    <script>
        $("#sample_3").DataTable({

                                "paging": true, 
                                "lengthChange": false,
                                "pageLength": 10,
                                "searching": true,
                                "ordering":false,
                                "info": true,
                                "autoWidth": true,
                                dom : 'l<"#add">frtip'

        }); 


        $('<label/>').text('Custom Search: ').appendTo('#add')

    

        $select = $(''+

        '<form action="<?php echo base_url(); ?>/index.php/superadmin/dateRangeCouponClaim">'+

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




         $("#sample_3").on('click','#delete-sub',function(){

            if (confirm("Are you sure to delete this Beacon ?") == false) {
                                    return;
                                }
              alert("Beacon Deleted");
               $(this).closest('tr').remove();
             });

            $('#shows').click(function() {

                window.location.href = "<?php echo base_url(); ?>index.php/superadmin/viewCouponClaims/<?php echo $coupon_id_t; ?>/chk";
            });

    </script>

    <script type="text/javascript">
        
        $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);    

        $('#getValidate').click(function(){
            if($('#changedate2').val() == '' ){
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





    </body>

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
    </html>
