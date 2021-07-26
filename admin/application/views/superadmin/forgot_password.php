	<!DOCTYPE html>
	<html lang="en">

	<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/login_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:37:45 GMT -->
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
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/login_validation.js"></script> -->

	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

	<style type="text/css">
		
		.icon-object {
		    text-align: center;
		    border-width: 1px;
		    border-style: solid;
		    padding: 10px;
		    border-color: transparent;
		    padding-top: 20px;
		    /*background: #01a8f6;*/
		}

		.login-cover {
		    background: url(<?php echo base_url(); ?>assets/images/login_cover.jpg) no-repeat;
		    background-size: cover;
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
					<form action="<?php echo base_url(); ?>index.php/superadmin/forgot_password" method="post" class="form-validate" name="myForm" >
						<div class="panel panel-body login-form">
							<div class="text-center">
								<br>
								
								<div class="icon-object" style="border-width: 0;">

								<img src="<?php echo base_url(); ?>superassets/cashrub_icon_dd.png" width="130px;">

                                <img src="<?php echo base_url(); ?>superassets/cashrub-named.png" width="190px;">

								</div>



								<h5 class="content-group">Reset your password
								<!-- <small class="display-block">Your credentials</small> -->
								</h5>
								<br>
								<h7 style="color: red;"><?php echo form_error('username'); ?><h7>
								<p style="color: red;"><?php echo $this->session->flashdata('forgot_error'); ?><p>

							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>">
								<p style="color: red;" id="email_error" ></p>
								
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<br>

							

							

							<div class="form-group">
								<button type="submit" class="btn bg-pink-400 btn-block" style="background-color: #01a8f6;" >Submit <i class="icon-arrow-right14 position-right"></i></button>
							</div>

							<!-- <div class="content-divider text-muted form-group"><span>or sign in with</span></div>
							<ul class="list-inline form-group list-inline-condensed text-center">
								<li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
								<li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>
								<li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
								<li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
							</ul> -->

							<!-- <div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
							<a href="store-register.html" class="btn bg-green-400 btn-block content-group">Sign up</a>
							<span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span> -->
							<div><br></div>
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

	<!-- <script type="text/javascript">
		
		function validateForm() {
		    var x = document.forms["myForm"]["username"].value;
		    var atpos = x.indexOf("@");
		    var dotpos = x.lastIndexOf(".");
		    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		        // alert("Not a valid e-mail address");

		        document.getElementById("email_error").innerHTML="Please enter valid email address";
		        $('#email_error').show(0).delay("1000").hide(0);
		        return false;
		    }
		}


	</script> -->

	<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/login_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:37:46 GMT -->
	</html>
