<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/components_thumbnails.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Feb 2017 05:37:07 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cannon Design</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="<?php echo base_url() ?>/assets_c/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/ques.css" rel="stylesheet" type="text/css">

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


        <!--<link rel="stylesheet" href="<?php echo base_url() ?>/assets_c/js/plugins/iCheck/square/square.css">-->
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        
        <!--<script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/forms/styling/switchery.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/media/fancybox.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/uploaders/fileinput.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/pages/uploader_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/pages/components_thumbnails.js"></script>
   
      
    
       <style>
            .fileinput-upload-button{
                display: none;
            }
       .btn{
                    margin-left: -10px!important;
                }
                .dropzone {
                    min-height: 200px!important;
                    width:200px;
                }
                .dropzone .dz-preview, .dropzone-previews .dz-preview {
                    border:none!important;
                }       

                .scrollable-menu {
                    height: auto;
                    max-height: 200px;
                    overflow-x: hidden;
                }

                .dropzone .dz-default.dz-message:before{
                    z-index: -2;
                }
                .vertical-offset-100{
    padding-top:100px;
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
                                
                                </div>
                                </div>

                                
                         <div class="breadcrumb-line breadcrumb-line-component">
                                    <ul class="breadcrumb">
                                                                            <li><a href="<?php echo site_url('control/home');?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                                        <li class='active'>Change password</li>
                                    </ul>
                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">

<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
          <div class="messages"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Change Password</h3>
                </div>
                <div class="panel-body">
                    <form id="change_password">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Old Password" name="old_password" type="password" required="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="New Password" name="new_password" type="password" required="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Confirm New Password" name="confirm_password" type="password" value="" required="">
                        </div>
                                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Change Password">
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#change_password').submit(function (e) {

    e.preventDefault();
  

    $.ajax({
        url: "<?php echo base_url('index.php/control/change_password_done'); ?>",
        type: 'POST',
        data:  $('#change_password').serialize(),
        success: function (data) {
            if(data!=1)
            {
            $('.messages').html(' <div class="alert alert-danger" >'+data+'</div>');
            }else{
                 $('.messages').html("<div class='alert alert-success' >Password changed successfully please login!</div>");
            setTimeout(function(){    location.reload(); }, 2000);
            }
            console.log(data);
        },
        error: function (error) {
            $('.messages').html(error);
        }
    });
});
        </script>
    </body>
    </html>