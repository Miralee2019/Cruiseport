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

	<!-- /global stylesheets -->

	<!-- /theme JS files -->

</head>


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



</style>




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
                     <h4><span class="text-semibold">Billing Details</span></h4>

							<!-- 	<div class="heading-elements">
							<div class="heading-btn-group">
									<a href="add_beacons.html" class="btn bg-blue btn-labeled heading-btn"><b><i class=" icon-feed"></i></b> Add Store  </a>
							
							</div>
						</div> -->	

                        <ul class="breadcrumb position-left">
                         <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-home2 position-left"></i> Home</a></li>
                         <li><a href="#">Billing Details</a></li>
                     </ul>
                 </div>
             </div>

         </div>

         <!-- /page header -->


         <!-- Content area -->
         <div class="content">



            <div id="hidemenow">

                <?php
                if ($this->session->flashdata()) {
                    echo $this->session->flashdata('payment_status');
                }

                if ($this->session->flashdata()) {
                    echo $this->session->flashdata('notification_message');
                }

                if ($this->session->flashdata()) {
                    echo $this->session->flashdata('refresh_message3');
                }


                ?>

            </div>

            <div class="panel panel-flat" style="overflow-x:auto;">
             <div class="panel-heading">


              <h6 class="panel-title"><b>Billing Details</b></h6>

<!-- 										<div>
                                            <h5>Select Date Range : </h5><input type="text" style="padding: 12px; border: 1px solid #ccc;" id="myDate" size="21" name="daterange" value="<?php echo $s_date; ?> - <?php echo $e_date; ?>" /><i class="icon-calendar" style="font-size: 16px;margin-left: -24px;color: grey;margin-top: -2px;"></i>
                                        </div> -->

                                        <div class="heading-elements">
                                         <ul class="icons-list">
                                          <li><a data-action="collapse"></a></li> 
                                          <li><a id="shows" data-action="reload"></a></li>
                                          <!-- 	<li><a data-action="close"></a></li> -->	
                                      </ul>
                                  </div>
                              </div>


                              <table class="table table-hover" id="sample_3">

                               <thead>
                                  <tr>

                                   <th class="col-md-2" ><b>Payment ID</b></th>
                                   <!-- <th class="col-md-2" ><b>Payment date</b></th> -->
                                   <th class="col-md-2" ><b>Created date</b></th>

                                   <th class="col-md-2" ><b>Store Id</b></th>
                                   <th class="col-md-2" ><b>Store name</b></th>
                                   <th class="col-md-2" ><b>Store email</b></th>
                                   <!-- <th class="col-md-2" ><b>Bill description</b></th> -->
                                   <th class="col-md-2" ><b>Amount</b></th>
                                   <th class="col-md-2" ><b>Status</b></th>
                                   <th class="col-md-2" ><b>Action</b></th>


                               </tr>
                           </thead>

                           <tbody>
                               <?php foreach (array_reverse($purchase) as $key) { 
                                ?>
                               <tr>

                                 <?php

                                 $CI =& get_instance();
                                 $CI->load->model('adminmodel');

                                 $email = $CI->adminmodel->select_data("T_Store",array('store_id' => $key->store_id));

                                 ?>

                                 <td class="col-md-2" ><?php echo $key->payment_id; ?></td>
                                 <!-- <td class="col-md-2" > < ?php echo wordwrap(($key->payment_date),15,"<br>\n",TRUE) ? : '' ; ?> </td> -->
                                 <td class="col-md-2" ><?php echo $key->created_date; ?>  </td>
                                 <td class="col-md-2" ><?php echo $email[0]->store_id; ?></td>
                                 <td class="col-md-2" ><?php echo wordwrap(($email[0]->store_first_name),15,"<br>\n",TRUE) ? : '' ; ?></td>
                                 <td class="col-md-2" ><?php echo wordwrap($email[0]->store_email,25,"<br>\n",TRUE) ? : ''; ?> </td>
                                 <!-- <td class="col-md-2" > < ?php echo wordwrap($key->payment_name,15,"<br>\n",TRUE) ? : '' ; ?>  </a></td> -->
                                 <td class="col-md-2" ><?php echo wordwrap($key->points,10,"<br>\n",TRUE) ? : '' ; ?>  </td>

                                 <td>

                                    <?php if($key->payment_status == "2") { ?>

                                    <span class="label label-warning">Pending</span>

                                    <?php } elseif ($key->payment_status == "10") { ?>

                                    <span class="label label-success">Accepted</span>

                                    <?php } elseif ($key->payment_status == "8") { ?>

                                    <span class="label label-danger">Rejected</span>

                                    <?php } else { ?>

                                    <span class="label label-danger">Unknown</span>

                                    <?php } ?>    


                                </td>

                                <td>

                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <ul class = "dropdown-menu left" role = "menu">
                                                <!-- <li><a href = "#   "> <i class="icon-envelope"></i>  Send Email</a></li> -->

                                                <li><a href="" id="notify_store" data-store="<?php echo $key->store_id ?>" data-toggle="modal" data-target="#payment_modal"> <i class="icon-envelope"></i>  Send Notification </a></li>

                                                <!-- <li><a id="delete-sub"><i class="icon-cross"></i> Block User </a></li> -->

                                                <?php if($key->payment_status == 2) { ?>

                                                <li><a href="#" id="change_paymentstatus" data-store = <?php echo $key->store_id;?>   data-payment = <?php echo $key->payment_id; ?> data-points = <?php echo $key->points; ?> data-status = "10" ><i class="icon-check"></i> Accept </a></li>
                                                <li>

                                                    <li><a href="#" id="change_paymentstatus" data-store = <?php echo $key->store_id;?>   data-payment = <?php echo $key->payment_id; ?> data-status = "8" ><i class="icon-cross"></i> Reject </a></li>
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


        <!--  -->

        <!-- model         -->


        <div id="payment_modal" class="modal fade" role="dialog">
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
                        <input type="text" class="form-control input-lg" class="form-control" name="subject" placeholder="Enter subject" value="Cashrub - Billing">   
                    </div>
                    <br>
                    <input type="hidden" name="store_id" id="store_id">
                    
                    <div>
                        <textarea maxlength="120" id="changemsg" class="form-control input-lg" style="max-width:557px;max-height: 148px;" rows="5" name="message" placeholder="Enter message">Dear user, &#13;&#10;Your billing has been completed.</textarea>   
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

        '<form action="<?php echo base_url(); ?>/index.php/superadmin/dateRangePurchase">'+

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

        $(document).on("click", "#change_paymentstatus", function () {

            var status = $(this).data('status');
            var store = $(this).data('store');
            var payment = $(this).data('payment');
            var points = $(this).data('points');

            $.post("<?php echo base_url(); ?>index.php/superadmin/changePaymentStatus/"+store+"/"+status+"/"+payment+"/"+points+"", function(data, status){
                console.log(status);
                location.reload();
            });
        });

        $(document).on("click", "#notify_store", function () {
           var store_id = $(this).data('store');
           $(".modal-body #store_id").val( store_id );
       });    


        $('#shows').click(function() {

            window.location.href = "<?php echo base_url(); ?>index.php/superadmin/view_purchase/chk";

        });


        $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);    


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


    <script>

      $('#shows').click(function() {

       $('#styleme').delay(2000).fadeIn(300).delay(1000).fadeOut(300);;
   });

</script>



</body>

<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
</html>
