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
    <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
     <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/validation/validate.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/login_validation.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>
    
    <!-- /theme JS files -->
<style>
body{

   font-family: 'Lato', sans-serif;
    font-size: 14px;

}
.btn{
    padding: 10px 12px;
font-size: 17px;
font-weight: 700;
}
.btn:hover{
    background: #63bc66;
    border-color:transparent;
}
.sign{
    background: #63bc66;
    color:white;    
}
.sign:hover, .sign:active{
background: #01a8f6;
color:white;
}
.icon-object {
    text-align: center;
    border-width: 1px;
    border-style: solid;
    padding: 10px;
    border-color: transparent;
    padding-top: 20px;
    /*background: #01a8f6;*/
}
</style>
    </head>

    <body class="login-container login-cover">
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content pb-20">

                    <!-- Form with validation -->
                    <form action="<?php echo base_url(); ?>index.php/control/check_login" name="form1" class="form-validate" method="post" >
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object" ><img src="<?php echo base_url(); ?>superassets/cashrub_icon_dd.png" width="130">
                                <img src="<?php echo base_url(); ?>superassets/cashrub-named.png" width="190px;">
                                </div>
                                <h5 class="content-group">Login to your account 

                                <!-- <small class="display-block">Your credentials</small> -->
                                </h5>

                                <p style="color: red;"><?php echo $this->session->flashdata('login_error'); ?><p>
                                <p style="color: green;"><?php echo $this->session->flashdata('login_error2'); ?><p>


                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" class="form-control" placeholder="Email" name="username" autocomplete="off" value="<?php echo set_value('username'); ?>">
                                <h7 style="color: red;float: left;" ><?php echo form_error('username'); ?></h7>
                                
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" minlength="6" maxlength="12"  class="form-control" placeholder="Password" name="password" autocomplete="off" value="<?php //echo set_value('password'); ?>">
                                <h7 style="color: red;float: left;" ><?php echo form_error('password'); ?></h7>    
                                



                                <?php if(form_error('username')) { ?>
                                <div class="form-control-feedback" style="top: 30px;">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                <?php } elseif(form_error('username') && form_error('username')) { ?>
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                <?php } else { ?>
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="form-group login-options">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- <label class="checkbox-inline">
                                            <input type="checkbox" class="styled" checked="checked">
                                            Remember
                                        </label> -->
                                    </div>

                                    <div class="col-sm-6 text-right">
                                        <a href="<?php echo base_url(); ?>index.php/control/forgotPassword">Forgot password?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                            </div>

                            <div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
                            <a href="<?php echo base_url(); ?>index.php/control/new_store_register" class="btn sign btn-block content-group">Sign up</a>
                            <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="<?php echo base_url(); ?>/index.php/control/services">Terms &amp; Conditions</a> and 
                            <a href="<?php echo base_url(); ?>/index.php/control/privacy_policy">Cookie Policy</a></span>
                        </div>
                    </form>
                    <!-- /form with validation -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

    </body>
  
    <script type="text/javascript">
        
        function validateForm() {
            var x = document.forms["form1"]["username"].value;
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
                // alert("Not a valid e-mail address");

                document.getElementById("error_email").innerHTML="Please enter valid email address";
                $('#error_email').show(0).delay("1000").hide(0);
                return false;
            }
        }    
    </script>

    

    </html>
