<?php error_reporting(0); ?>

        <!DOCTYPE html>
        <html lang="en">

        <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Feb 2017 12:23:01 GMT -->
        <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
        <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cash Rub</title>

        <!-- Global stylesheets -->
        
        <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/dashboard.css" rel="stylesheet" type="text/css">
        


        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/visualization/d3/d3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/visualization/d3/d3_tooltip.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/pickers/daterangepicker.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
       <!--  <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/dashboard.js"></script> -->

        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- /theme JS files -->

        <style type="text/css">
            body{
                font-family:"Raleway", sans-serif !important;
            }
        </style>
        </head>

        <body>

            <!-- Main navbar -->

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
                             <div class="page-header">
                                <div class="page-header-content">
                                
                                    <div class="page-title">
                                        <h4><span class="text-semibold">Terms & Conditions</span></h4>

                                        <ul class="breadcrumb position-left">
                                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome""><i class="icon-home2 position-left"></i> Home</a></li>
                                            <li><a href="#">Terms & Conditions</a></li>
                                        </ul>
                                    </div>

                                
                                </div>
                            </div>
<div class="content">
           <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title"><b>Terms & Conditions Details</b></h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <!--    <li><a data-action="collapse"></a></li> -->
                                                <!-- <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <form action="<?php echo base_url('index.php/superadmin/insert_terms'); ?>" method="post">
                                            <?php
                                            /*print_r($terms);die;*/
                                             if(!empty($terms)){ ?>
                                               
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $terms->id; ?>">
                                             <input type="hidden" name="type" value="<?php echo $type; ?>">
                                        <textarea name="terms" id="summernote" class="summernote form-control"><?php echo $terms->text; ?></textarea>
                                    </div>
                              
                                <?php }else{ ?>
                                    <div class="form-group">
  <textarea name="terms" id="summernote" class="summernote form-control"></textarea>
                                  
                                    </div>
                                <?php } ?>
                                    <div class="form-group">
                                        <button class="btn btn-info" type="submit">Submit</button>
                                    </div>
                                    </form>
                                    </div>
</div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
  $('.summernote').summernote();
});
        </script>
    </body>
    </html>