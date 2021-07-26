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
								<h4> 

								<a href="<?php echo base_url(); ?>index.php/superadmin/new_offer_requests"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">View Store Offer Details</span></h4>
									<ul class="breadcrumb position-right">
								
								<li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-home2 position-left"></i> Home</a></li>
								<!-- <li><a href="<?php echo base_url(); ?>index.php/superadmin/view_userinfo">Users</a></li> -->
								<li><a href="#">New Store Offer Details</a></li>
							
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
                                        echo $this->session->flashdata('refresh_message5');
                                }
                            ?>

                    </div>


                    <!-- <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Walkin report</button> -->
                    <?php if(!$offerdetails) { ?>

                        <div class="alert alert-danger" style="text-align: center;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong >There is no report for this Store Offer</strong>
                        </div>

                    <?php die; } ?>


                    <div class="panel panel-flat" style="overflow-x: auto;">
                        
                        
                        
                            <div class="panel-heading">
                                        

                                        <!-- <h6 class="panel-title" ><b>View User Report Details</b></h6> -->

                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li> 
                                                <!-- <li><a data-action="reload"></a></li>  -->
                                                <li><a id="shows" data-action="reload"></a></li> 

                                            <!--    <li><a data-action="close"></a></li> -->    
                                            </ul>
                                        </div>
                                    </div>


                            <table class="table table-hover" id="sample_3">
                                                                                            
                                <thead>
                                    <tr>

                                        <th><b>ID</b></th>
                                        <th><b>Description</b></th>
                                        <th class="col-md-2"><b>Category</b></th>
                                        <th><b>Expiry Date</b></th>
                                        <th><b>Offer Image</b></th>
                                        <th><b>Maximum Points</b></th>
                                        <th><b>Offer Visibility</b></th>
                                        <th><b>Terms and Condition</b></th>
                                        <th><b>Status</b></th>
                                        <!-- <th class="text-center"><b>Actions</b></th> -->
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php foreach ($offerdetails as $key) { ?>

                                    <tr>

                                      <td><?php echo $key->store_offer_id ; ?></td>

                                        <?php 

                                            $CI = & get_instance();
                                            $CI->load->model('Supermodel');

                                            $cat = $CI->Supermodel->select_data('T_Categorys', array('category_id' => $key->category_id));
                                            $termcondition = $CI->Supermodel->select_data('T_StoreOfferTermCondition', array('offer_term_condition_id' => $key->offer_term_condition_id));
                                        ?>
                               
                                        <td style="word-break: break-all;"><?php echo $key->description ; ?></td>
                                        <td class="col-md-2"><?php echo $cat[0]->name ; ?></td>
		                                <td style="word-break: break-all;"><?php echo $key->expiry_date ?></td>
		                                <td>
                                        <img src="<?= base_url('uploads/').$key->offer_image; ?>" width="40px" height="40px" /> 

                                        </td>
                                        <td> <?= $key->maximum_point; ?></td>
                                        <td><?= $key->offer_visibility.'Kms' ?></td>
                                        <td style="word-break: break-all;"><?php echo $termcondition[0]->text; ?></td>

                                        <td>
                                                    
                                            <?php if($key->offer_status == "2") { ?>

                                            <span class="label label-warning">Pending</span>

                                            <?php } elseif ($key->offer_status == "1") { ?>

                                            <span class="label label-success">Approved</span>

                                            <?php } elseif ($key->offer_status == "8") { ?>

                                            <span class="label label-danger">Rejected</span>

                                            <?php } elseif($key->offer_status == "9") { ?>

                                            <span class="label label-danger">Expired</span>

                                            <?php } elseif($key->offer_status == "11") { ?>

                                            <span class="label label-danger">Removed</span>

                                            <?php } else { ?>

                                            <span class="label label-danger">Unknown</span>
                                            
                                            <?php } ?>    
                                        </td>
		                                    
		                                    <!-- <td class="text-center">
		                                        <ul class="icons-list">
		                                            <li class="dropdown">
		                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                                                    <i class="icon-menu9"></i>
		                                                </a>
		                                                <ul class = "dropdown-menu left" role = "menu">
		                                                    <li><a href="" id="notify_user" data-user="<?php echo $key->user_id ?>" data-toggle="modal" data-target="#myModal"> <i class="icon-envelope"></i>  Send Email </a></li>
														</ul>
		                                            </li>
		                                        </ul>
		                                    </td> -->
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
			
			
		</div>
					


		<script>
			$("#sample_3").DataTable({
				"paging": true, 
		        "lengthChange": false,
		        "searching": true,
		        "ordering":false,
		        "info": true,
		        "autoWidth": true
				
			} ); 





    
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
        
        $('.form_datetime').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1,
            autoclose: false
            // startDate: '-0d'

        });
        $('.form_date').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            autoclose: false
            // startDate: '-0d'
        });
        $('.form_time').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0,
            autoclose: false
        });

    </script>      



	</body>

	<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
	</html>
