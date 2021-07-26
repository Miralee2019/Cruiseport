<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/components_thumbnails.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Feb 2017 05:37:07 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cash Rub</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="<?php echo base_url() ?>/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/ques.css" rel="stylesheet" type="text/css">


        <!-- other -->

        <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom1.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>        

        <!-- end -->


        <!--<link rel="stylesheet" href="<?php echo base_url() ?>/assets/js/plugins/iCheck/square/square.css">-->
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        
        <!--<script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/forms/styling/switchery.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/media/fancybox.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/uploaders/fileinput.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/pages/uploader_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/pages/components_thumbnails.js"></script>
   
      
    
       <style>

            .navbar-nav {
               margin-top: 15px;
               margin-left: 0px!important;
            } 

            .caret{
               margin-top: -14px;
            }

            .icon-paragraph-justify3{
               margin-top: -14px;
            }
     
            .fileinput-upload-button{
                display: none;
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
					<!-- <div class="page-header">
						<div class="page-header-content">
							<div class="page-title">
								
								</div>
								</div>

								
	                     <div class="breadcrumb-line breadcrumb-line-component">
									<ul class="breadcrumb">
                                    <li><a href="#"><i class="icon-home2 position-left"></i> Add New Beacon</a></li>
										<li class='active'>Add Beacon</li>
									</ul>
						</div>
					</div> -->


                    <div class="page-header">

                                <!-- Header content -->
                                <div class="page-header-content">
                                    <div class="page-title">
                                        <h4><a href="javascript:history.back()"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold"></span>Add Beacons</h4>
                                        <div class="heading-elements">
                                            <div class="heading-btn-group">


<!--                                                 <a href="<?php echo site_url('control/add_beacon/'.$space_detail->space_id);?>" class="btn bg-blue btn-labeled heading-btn">Add New Beacon </a> -->

                                            </div>
                                        </div>  



                                        <ul class="breadcrumb position-right">
                                            <li><a href="<?php echo base_url(); ?>index.php/control/home">Home</a></li>
                                            <li><a href="#">Floor Plan</a></li>
                                            <li class="active">Add Beacons</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>




					<!-- /page header -->


                    <!-- Content area -->
                    <div class="content">

                        <!-- User profile -->
                       
          <form class="form-horizontal" action="<?php echo site_url('control/save_beacondetail'); ?>" method="post" enctype="multipart/form-data">

                                <!-- Profile info -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title"></h6>

                                    </div>

                                    <div class="panel-body">
                                        <div class="row">   
                                        <div class="col-md-12">
                                            <div class="row">
                                            <div class="col-md-6">

                                                <h5><b>Enter Beacon Name</b> <red style="color: red;font-size: 20px;">*</red> </h5>
                                                <br/>
                                                <div class="form-group">
<!--                                                    <div class="col-md-2">
                                                        <label class="control-label">Name:</label>
                                                    </div>-->
                                                    <div class="col-md-12">
                                                        <input type="hidden" class="form-control" value="<?=$space_id;?>" name="space_id" placeholder="" required="required">

                                                        <input type="text" class="form-control" name="beacon_name" placeholder="Beacon Name" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                                  <div class="col-md-6">

                                                <h5><b>Enter Beacon UUID</b> <red style="color: red;font-size: 20px;">*</red> </h5>
                                                <br/>
                                                <div class="form-group">
<!--                                                    <div class="col-md-2">
                                                        <label class="control-label">Name:</label>
                                                    </div>-->
                                                    <div class="col-md-12">

                                                        <input type="text" class="form-control" name="beacon_uuid" placeholder="Beacon UUID" required="required">
                                                    </div>
                                                </div>
                                            </div> 

                                            </div>
                                    
                                                <div class="row">
                                            <div class="col-md-6">

                                                <h5><b>Beacon Major</b> <red style="color: red;font-size: 20px;">*</red> </h5>
                                                <br/>
                                                <div class="form-group">
<!--                                                    <div class="col-md-2">
                                                        <label class="control-label">Name:</label>
                                                    </div>-->
                                                    <div class="col-md-12">

                                                        <input type="text" class="form-control" name="beacon_major" onkeypress="return isNumber(event)" placeholder="Beacon Major"  required="required">
                                                    </div>
                                                </div>
                                            </div>
                                                  <div class="col-md-6">

                                                <h5><b>Beacon Minor</b> <red style="color: red;font-size: 20px;">*</red> </h5>
                                                <br/>
                                                <div class="form-group">
<!--                                                    <div class="col-md-2">
                                                        <label class="control-label">Name:</label>
                                                    </div>-->
                                                    <div class="col-md-12">

                                                        <input type="text" class="form-control" name="beacon_minor" onkeypress="return isNumber(event)"  placeholder="Beacon Minor" required="required">
                                                    </div>
                                                </div>
                                            </div> 

                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-checkmark3"></i></b> Save & Assign Beacon</button>
                                                <!--<a href="<?php echo site_url('main/home');?>" ><button type="button" class="btn btn-save ml-10"><b><i class="icon-cross"></i></b> Cancel</button></a>-->

                                              <!--  <button type="reset" class="btn btn-save ml-10"><b><i class="icon-cross"></i></b> Cancel</button>    -->
                                            </div>
                                            </div>


                                       


                                <!-- /form horizontal -->

                            </div>
                      
                        </div>
                        <!-- /page content -->
      <!-- /content area -->
                                </div>
 </form>

                    </div>
                    <!-- /page container -->
                    <!--<footer><a href="www.cashrub.com" style="color: #777777;"></a></footer>-->
                </div>
            </div>
        </div>
          
<!--        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>/assets/js/pages/form_bootstrap_select.js"></script>
    
        -->
<!--	<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/styling/switchery.min.js"></script>-->

        <script>
        $("#questionary_image").change(function() {

    var val = $(this).val();

    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'gif': case 'jpg': case 'png': case 'jpeg':
//            alert("an image");
            break;
        default:
            $(this).val('');
            // error message here
            alert("Please select only image file");
            break;
    }
});
     
function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

   
        </script>
       
    </body>
</html>
