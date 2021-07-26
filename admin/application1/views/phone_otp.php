            <!DOCTYPE html>
            <html lang="en">

            
            <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Cash Rub</title>

                <!-- Global stylesheets -->
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
                <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
                <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
                <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/example.wink.css" rel="stylesheet" type="text/css">

                <!-- /global stylesheets -->

                <!-- Core JS files -->

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
                <!-- /core JS files -->

                <!-- Theme JS files -->
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/fileinput.min.js"></script>
                            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>

                                        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_multiselect.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/uploader_bootstrap.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/dropzone.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_inputs.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/anytime.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/legacy.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/hideShowPassword.min.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/echarts/echarts.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/user_pages_profile.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>
                <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>        
                <!-- /theme JS files -->
                <style>
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

                                    <!-- Header content -->
                                    <div class="page-header-content">
                                        <div class="page-title">
                                            <h4><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-arrow-left15 position-left"></i></a><span class="text-semibold"><?php echo $profile[0]->store_first_name; ?></span> - Profile</h4>

                                            <ul class="breadcrumb position-right">
                                                <li><a href="<?php echo base_url(); ?>index.php/control/home">Home</a></li>
                                                <li class="active">Profile</li>

                                            </ul>
                                        </div>


                            </div>

                        </div>

                        <div class="content">

                            <div class="row">

                            <div class="col-lg-12">
                                <div>

                                <div class="alert alert-success">
                                  you have to verify OTP first for updation of mobile no.
                                </div>

                                    <div>
                                        <!-- Profile info -->
                                        <form action="<?php echo base_url();?>index.php/control/editProfile" method="post">

                                        <div id="hidemenow">
                                            
                                            <?php
                                                if ($this->session->flashdata()) {
                                                echo $this->session->flashdata('phone_otp');
                                                }
                                            ?>

                                        </div>
                                        
                                        

                                        <div class="panel panel-flat">

                                            
                                            <div class="panel-heading">



                                                <h6 class=""><b>Please enter your OTP</b></h6>
                                            </div>

                                            <div class="panel-body">
                                                
                                                    

                                                    <div class='form-group' style="margin-top: -10px;text-align: center;">
                                                        

                                                        <!-- new code -->

                                                        <div class="form-group">
                                                            <div class="row">
                                                            
                                                                <div class="col-md-6"> 
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" placeholder="OTP" id="mobile_number_otp" onkeypress="return isNumber(event)" minlength="4" maxlength="4" name="mobile_number_otp">
                                                                    <span id="mobile_otp_error" style="color: red;"></span>
                                                                    </div>
                                                                    
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="text-left">
                                                                        <button type="submit" id="savedata" class="btn btn-primary" style="    padding: 8px 20px;font-weight: bold;font-size: 16px;">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>
                                                        </div>

                                                        <!-- /end -->

                                                       

                                                        
                                                    
                                                </div>
                                            </div>

                                            </form>
                                            <!-- /profile info -->


                                            <!-- Account settings -->
                                            
                                            

                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /content area -->

                        </div>
                        <!-- /main content -->
                        
                    </div>
                    <!-- /page content -->

                </div>
                <!-- /page container -->
            
<script type="text/javascript">
    
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>


<script type="text/javascript">
    
$("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);    


$("#savedata").click(function(){

var otp = $("#mobile_number_otp").val();

if(otp == ''){
    document.getElementById("mobile_otp_error").innerHTML ='OTP is required';
    return false ;

}else{
    document.getElementById("mobile_otp_error").innerHTML = '';

}

});



</script>

</body>
</html>
