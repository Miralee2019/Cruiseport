<?php error_reporting(0);  ?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cash Rub</title>






    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

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

.icon-size {
    font-size: 35px; margin: 20%;
}
.facebook {
    height: 83.33px;
    color: #fff !important;
}

.img-ht{
    width: 40px;
    height: 40px;
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
                            <h4><span class="text-semibold">Walkin Details</span></h4>

                            <!--    <div class="heading-elements">
                            <div class="heading-btn-group">
                                    <a href="add_beacons.html" class="btn bg-blue btn-labeled heading-btn"><b><i class=" icon-feed"></i></b> Add Store  </a>
                            
                            </div>
                        </div> -->  

                        <ul class="breadcrumb position-left">
                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome""><i class="icon-home2 position-left"></i> Home</a></li>
                            <li><a href="">Walkin Details</a></li>
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
                        <div class="panel facebook" style="background-color: green;">
                            <div class="panel-body" style="color: white;">

                                <div class="col-lg-4 col-xs-4">
                                    <img class="img-ht" src="<?php echo base_url(); ?>assets/vdvds.png">
                                    <!-- <i class='icon-users' style="font-size: 45px;"></i> -->
                                </div>

                                <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%; margin-top: -5%;">

                                    <h3 class="no-margin" style="font-size: 30px;"><b> <?php echo $todayWalkinsMade[0]->walkin ? : '0'; ?> </b></h3>

                                    <p style="font-weight: 700;font-size: 13px;">Today's Walkins</p>

                                </div>

                            </div>

                            <div id="server-load"></div>
                        </div>
                        <!-- /current server load -->

                    </div>

                    <div class="col-lg-4">

                        <!-- Today's revenue -->
                        <div class="panel facebook" style="background-color: red;color: white;">
                            <div class="panel-body">

                                <div class="col-lg-4 col-xs-4">
                                    <img class="img-ht" src="<?php echo base_url(); ?>assets/vdvds.png">
                                    <!-- <i class=" fa fa-star star star-border" style="margin-left: 16px;"></i> -->
                                    <!-- <i class="icon-user-check" style="font-size: 45px;"></i> -->
                                </div>

                                <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%; margin-top: -5%;">

                                    <h3 class="no-margin text-center" style="font-size: 30px;"> <b> <?php echo $last_month_walkin[0]->month_walkin; ?></b> </h3>
                                    <p style="font-weight: 700;font-size: 13px;"> This Month Walkins </p>
                                </div>
                            </div>

                            <div id="today-revenue"></div>
                        </div>


                    </div>

                    <div class="col-lg-4">

                        <!-- Today's revenue -->
                        <div class="panel facebook" style="background-color: blue; color: white;">
                            <div class="panel-body">

                                <div class="col-lg-4 col-xs-4">
                                    <img class="img-ht" src="<?php echo base_url(); ?>assets/vdvds.png">

                                    <!-- <i class="icon-user-cancel" style="font-size: 45px;"></i> -->
                                </div>

                                <div class="col-lg-8 col-xs-8 text-center" style="margin-left: -12%; margin-top: -5%;">

                                    <h3 class="no-margin" style="font-size: 30px;"> <b> <?php echo $total_w[0]->walkin_count; ?> </b> </h3>

                                    <p style="font-weight: 700;font-size: 13px;"> Total Walkins</p>

                                </div>



                            </div>

                            <div id="today-revenue"></div>
                        </div>


                    </div>
                </div>



                <div id="hidemenow">

                    <?php

                    if ($this->session->flashdata()) {
                        echo $this->session->flashdata('refresh_message4');
                    }
                    if ($this->session->flashdata()) {
                        echo $this->session->flashdata('notification_user_message');
                    }
                    ?>

                </div>




                <div class="panel panel-flat" style="overflow-x:auto;">
                    <div class="panel-heading">

                        <h6 class="panel-title"><b>Walkin Details</b></h6>

<!--                                         <div>
                                            <h5>Select Date Range : </h5><input type="text" style="padding: 12px; border: 1px solid #ccc;" id="myDate" size="21" name="daterange" value="<?php echo $s_date; ?> - <?php echo $e_date; ?>" /><i class="icon-calendar" style="font-size: 16px;margin-left: -24px;color: grey;margin-top: -2px;"></i>
                                        </div> -->



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
                                                <!-- <th><b>ID</b></th> -->
                                                <th><b>Walkin Date</b></th>
                                                <th><b>Store Name</b></th>
                                                <th><b>User Name</b></th>
                                                <th><b>Time In</b></th>
                                                <th><b>Time Out</b></th>
                                                <th><b>Total Time Spent</b></th>
                                                <th><b>Points</b></th>
                                                <th><b>View Details </b></th>
                                                <th class="text-center"><b>Actions</b></th>
                                                <!-- <th><b>Shares</b></th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($total_walkins as $key) { ?>

                                            <tr>
                                                <!-- <td><?php echo $key->beacon_activity_id; ?></td> -->

                                                <?php 

                                                $CI =& get_instance();
                                                $CI->load->model('Supermodel');

                                                $user = $CI->Supermodel->select_data('T_User', array('user_id' => $key->user_id));
                                                $store = $CI->Supermodel->select_data('T_Store', array('store_id' => $key->store_id));
                                            // $user_point = $CI->Supermodel->getUserWalkinPoints($key->user_id);
                                                $user_point = $CI->Supermodel->select_data('T_Userstorewalkinpoint', array('user_id' => $key->user_id, 'store_id'=>$key->store_id));


                                                ?>
                                                <td><?php echo $key->detected_date; ?></td>
                                                <td><?php echo $store[0]->store_first_name; ?></td>


                                                <td> 
                                                    <?php echo $user[0]->name; ?>
                                                </a> 
                                            </td>


                                            <td><?php echo $key->detected_time; ?></td>
                                            <td><?php echo $key->exit_time; ?></td>
                                            <td><?php echo $key->total_spent_time; ?></td>
                                            <!-- <td><?php echo $key->total_spent_time > 1 ? $user_point[0]->user_w_points : '0' ; ?></td> -->
                                            <td><?php echo $user_point[0]->walkin_points;  ?></td>

                                            <td> <a href="<?php echo base_url(); ?>index.php/superadmin/userReportByUser/<?php echo $key->user_id; ?>" class="text-default"><i class="icon-eye8"></i></td>
                                                <td class="text-center">
                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>
                                                            <ul class = "dropdown-menu left" role = "menu">

                                                                <li><a href="" id="notify_user" data-user="<?php echo $key->user_id ?>" data-toggle="modal" data-target="#myModal"> <i class="icon-envelope"></i>  Send Notification </a></li>

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

                          <form action="<?php echo base_url(); ?>index.php/superadmin/sendNotificationToWalkinUser" method="post" class="form-horizontal"  role="form">
                            <!-- <input type="hidden" name="userId" id="userId"> -->
                            <div>
                                <input type="text" class="form-control input-lg" class="form-control" name="subject" placeholder="Enter subject" value="Cashrub - Walkin Detail">   
                            </div>
                            <br>
                            <input type="hidden" name="user_id" id="user_id">

                            <div>
                                <textarea maxlength="120" id="changemsg" class="form-control input-lg" style="max-width:557px;max-height: 148px;" rows="5" name="message" placeholder="Enter message">Dear user, &#13;&#10;You've just walkin to store. Keep visiting for more.</textarea>   
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


        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/datatables_basic.js"></script>
        <script src="https://use.fontawesome.com/405c986bfb.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.16/api/fnFilterClear.js"></script>
        <!-- /theme JS files -->


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

            '<form action="<?php echo base_url(); ?>/index.php/superadmin/dateRangeWalkin">'+

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
           '<input type="reset" id="clearme" value="Cancel" style="margin-left:5px;padding-left:10px !important; margin-top:-137px;color:black;" class="btn bg-red btn-labeled heading-btn" >'+
            
            
            '</form>').appendTo('#add'); 

        </script>

            <script type="text/javascript">

                $('#getValidate').click(function(){
                    if($('#changedate2').val() == '' ){
                        alert("Please enter end date");
                        return false;
                    }

                });

                $("#clearme").click(function(){
                    $('#changedate1').val('');
                    $('#changedate2').val('');
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






            <script>


                $('#shows').click(function() {

                    window.location.href = "<?php echo base_url(); ?>index.php/superadmin/view_walkins/chk";
                });

                $(document).on("click", "#notify_user", function () {
                    var user_id = $(this).data('user');
                    $(".modal-body #user_id").val( user_id );
                });    

                $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);    






            </script>

            <!-- new code 25 july -->


        </body>

        <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
        </html>
