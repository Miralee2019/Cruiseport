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

                    <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>        



        <link href="<?php echo base_url() ?>/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets/css/ques.css" rel="stylesheet" type="text/css">


        <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">

        <!--<link rel="stylesheet" href="<?php echo base_url() ?>/assets/js/plugins/iCheck/square/square.css">-->
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->

        
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/media/fancybox.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/plugins/uploaders/fileinput.min.js"></script>
        
        <!-- <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/core/app.js"></script> -->
        
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/pages/uploader_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/pages/components_thumbnails.js"></script>




        <!-- new? -->
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
            
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_inputs.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
            <!-- /theme JS files -->
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>
        
            <!-- end -->

        <style>
            .fileinput-upload-button{
                display: none;
            }
            .icon-file-plus{
                display: none;
            }

            .icon-zoomin3{
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


                    <!-- <div align="right" style="margin-top:20px;margin-right:20px;">
                            
                        <a href="<?php echo base_url(); ?>index.php/control/spaces" class="btn bg-blue btn-labeled heading-btn" ><b><i class="icon-price-tag3"></i></b> View Store Plans</a>    

                    </div> -->    
                    

                    <!-- <div class="page-header" style="margin-top: 20px;">
                        <div class="page-header-content">
                            <div class="page-title">

                            </div>
                        </div>


                        <div class="breadcrumb-line breadcrumb-line-component">
                            <ul class="breadcrumb">
                                
                                <li><a href="<?php echo site_url('control/spaces'); ?>"><i class="icon-home2 position-left"></i> Add Plan</a></li>

                                <li class='active'>Add Stores</li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content" style="margin-top: 20px;">

                        <!-- User profile -->

                        <form class="form-horizontal" action="<?php echo site_url('control/save_space'); ?>" method="post" enctype="multipart/form-data">

                            <!-- Profile info -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title"></h6>

                                </div>

                                <div class="panel-body">
                                    <div class="row">   
                                        <div class="col-md-12">
                                            <div class="row">
                                                <!-- <div class="col-md-6">

                                                    <h5><b>Enter Store Name</b> <red style="color: red;font-size: 20px;">*</red> </h5>
                                                    <br/>
                                                    <div class="form-group">

                                                        <div class="col-md-12">

                                                            <input type="text" class="form-control" name="space_name" placeholder="Store Name" required="required" id="store_value">
                                                            <p style="color:red;" id="save_store_image_error"></p>
                                                        </div>
                                                    </div>
                                                </div> --> 
                                                <div class="col-md-12">

                                                    <h5><b> Add Floor Plan Image</b> <red style="color: red;font-size: 20px;">*</red> </h5>
                                                    <br/>
                                                    <div class="form-group">

                                                        <div class="col-md-12">
                                                            <input type="file" name="space_image" id="questionary_image" class="file-input">
                                                            <p style="color:red;" id="questionary_image_error"></p>	
                                                        </div>			
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="text-center">
                                                <button type="submit" id="save_store_image" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-checkmark3"></i></b> Save </button>

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
<!--	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/forms/styling/switch.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/forms/styling/switchery.min.js"></script>-->

        <script>
            $("#questionary_image").change(function () {

                var val = $(this).val();

                switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                    case 'gif':
                    case 'jpg':
                    case 'png':
                    case 'jpeg':
//            alert("an image");
                        break;
                    default:
                        $(this).val('');
                        // error message here
                        alert("Please select only image file");
                        break;
                }
            });

            $("#save_store_image").click(function(){
                // var store_name = $("#store_value").val();
                
                // if(store_name == ''){
                //     document.getElementById("save_store_image_error").innerHTML ='Store name is required.';
                //     return false ;
                // }else{
                //     document.getElementById("save_store_image_error").innerHTML = '';
                // }

                var image_store = $("#questionary_image").val();

                if(image_store == ''){
                    document.getElementById("questionary_image_error").innerHTML ='Floor plan image is required.';
                    return false ;
                }else{
                    document.getElementById("questionary_image_error").innerHTML = '';
                }

            });

        </script>

    </body>
</html>
