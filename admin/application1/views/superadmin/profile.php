	<!DOCTYPE html>
	<html lang="en">

	<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/user_pages_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Feb 2017 12:49:50 GMT -->
	<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cash Rub</title>

		<!-- Global stylesheets -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
		<link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>superassets/css/custom.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
		<!-- /global stylesheets -->

		<!-- Core JS files -->
	     <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/pace.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/blockui.min.js"></script>
		<!-- /core JS files -->

		<!-- Theme JS files -->
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/styling/uniform.min.js"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/form_inputs.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/notifications/jgrowl.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/ui/moment/moment.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/pickers/daterangepicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/pickers/anytime.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/pickers/pickadate/picker.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/pickers/pickadate/picker.date.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/pickers/pickadate/picker.time.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/pickers/pickadate/legacy.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/picker_date.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/ui/ripple.min.js"></script>

	      <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/visualization/echarts/echarts.js"></script>
	     <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/user_pages_profile.js"></script>
	<!-- /theme JS files -->

	</head>

	<body>

	<!-- Main navbar -->
			<?php include 'include/mainheader.php';  ?>
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

					<!-- Header content -->
					<div class="page-header-content">
						<div class="page-title">
							<h4>
							<span class="text-semibold">

							<!-- <?php echo $superadmin[0]->email; ?> -->
								Superadmin

							</span> - Profile</h4>

							<ul class="breadcrumb position-left">
								<li><a href="<?echo base_url(); ?>index.php/superadmin/superhome">Home</a></li>
								<li><a href="#">Account Settings</a></li>
							
							</ul>
						</div>

						<!-- <div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div -->
					</div>
					<!-- /header content -->


					<!-- Toolbar -->
					
					<!-- /toolbar -->

				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- User profile -->
					<div class="row">

											<div class="col-lg-3">

							<!-- User thumbnail -->
							<!-- <div class="thumbnail"> -->
								<!-- <div class="thumb thumb-rounded thumb-slide">
									<img src="<?php echo base_url(); ?>superassets/images/demo/users/face1.jpg" alt="" id="image" class="img-circle">
									
								</div>
							
						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin">Store Admin<small class="display-block">Store Admin</small></h6>
					    			<ul class="icons-list mt-15">
				                    	<li><a href="#" data-popup="tooltip" title="Google Drive"><i class="icon-google-drive"></i></a></li>
				                    	<li><a href="#" data-popup="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
				                    	<li><a href="#" data-popup="tooltip" title="Github"><i class="icon-github"></i></a></li>
			                    	</ul>
						    	</div> -->
					    	<!-- </div> -->
					    	<!-- /user thumbnail -->


							<!-- /navigation -->


							<!-- Share your thoughts -->
							<!-- <div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Point Balance</h6>
									
								</div>

								
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Balance</h6>
									<div class="heading-elements">
										<span class="heading-text"><span class="text-semibold">1000</span></span>
				                	</div>
								</div>
								<div class="panel-body">
									<div class="chart-container">
										<p href="#"><span class="badge fb pull-right">100</span> <i class="icon-facebook fb social-border"></i> Facebook</p>
										<p href="#"><span class="badge twt pull-right">108</span> <i class="icon-twitter twt social-border"></i> twitter</p>
										<p href="#"><span class="badge ref pull-right">108</span> <i class="icon-user ref social-border"></i> Referrals</p>


									</div>
		                    	</div>


							</div> -->
							<!-- /balance chart -->


							
							<!-- /connections -->

						</div>
					</div>



						<div class="col-lg-12">
								<div>
									<div>
										<!-- Profile info -->
										
										<!-- /profile info -->


										<!-- Account settings -->

										<div id="hidemenow">

										<?php
			                                if ($this->session->flashdata()) {
			                                    echo $this->session->flashdata('superPasswordChange');
			                                }
			                            ?>

			                            </div>

										<div class="panel panel-flat">
											<div class="panel-heading">
												<h6 class="panel-title">Account settings</h6>
												<!-- <div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>
								                		<li><a data-action="reload"></a></li>
								                		<li><a data-action="close"></a></li>
								                	</ul>
							                	</div> -->
											</div>

											<div class="panel-body">
												<form action="<?php echo base_url(); ?>index.php/superadmin/profile" method="post">
													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>Email</label>
																<input type="text" value="<?php echo $superadmin[0]->email; ?>" class="form-control" disabled>

																<input type="hidden" value="<?php echo $superadmin[0]->email; ?>" name="email" class="form-control">
															
															</div>

															<div class="col-md-6">
																<label>Current password</label>
																<input type="password" value="<?php echo $superadmin[0]->password; ?>" class="form-control" disabled="true">

																<input type="hidden" value="<?php echo $superadmin[0]->password; ?>" name="password" class="form-control">


															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>New password</label>
																<input type="password" placeholder="Enter new password" name="newpassword" class="form-control" value="<?php echo set_value('newpassword'); ?>">

																<h7 style="color: red;float: left;" ><?php echo form_error('newpassword'); ?></h7>
															</div>

															<div class="col-md-6">
																<label>Confirm password</label>
																<input type="password" placeholder="Repeat new password" name="confirmnewpassword"  class="form-control" value="<?php echo set_value('confirmnewpassword'); ?>" >

																<h7 style="color: red;float: left;" ><?php echo form_error('confirmnewpassword'); ?></h7>
															</div>
														</div>
													</div>

							                        <div class="text-right">
							                        	<button type="submit" class="btn btn-primary"> <i class=" icon-arrow-right15"></i> Save </button>
							                        </div>
						                        </form>
											</div>
										</div>
										<!-- /account settings -->

									</div>
								</div>
							</div>
						


					<!-- /user profile -->


					<!-- Footer -->
				<!-- 	<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div> -->
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<script>

	$("#hidemenow").delay(3000).fadeIn(300).delay(1000).fadeOut(300);

	$("#btn1").bind("click" , function(){
			                $("#zip_file_import").click();
			              });

			              function formSubmit() {
			                var fullpath = document.getElementById("zip_file_import").value;
			                var backslash=fullpath.lastIndexOf("\\");
			                var filename = fullpath.substr(backslash+1);

			                var confirm_message = confirm("Files selected for import are \n: "+filename+"\n\nDo you want to proceed?");
			                if (confirm_message==false) {
			                  return false;
			                } else {
			                  document.getElementById("import_form").submit();
			                  document.body.style.cursor = "wait";
			                }
			              }
			$("#zip_file_import").on('change', function () {

			       //Get count of selected files
			       var countFiles = $(this)[0].files.length;

			       var imgPath = $(this)[0].value;
			       var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
			       var image_holder = $("#image");
			       image_holder.empty();

			       if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "doc"  || extn == "txt" || extn == "wmv") {
			         if (typeof (FileReader) != "undefined") {

			               //loop for each file selected for uploaded.
			               for (var i = 0; i < countFiles; i++) {

			                 var reader = new FileReader();
			                 reader.onload = function (e) {
			                   $("<img />", {
			                     "src": e.target.result,
			                     "class": "thumb-image img-responsive"
			                   }).appendTo(image_holder);
			                 }
			                 
			                 image_holder.show();
			                 reader.readAsDataURL($(this)[0].files[i]);
			               }

			             } else {
			               alert("This browser does not support FileReader.");
			             }
			           } 
			           /* });*/

			         });
	</script>
	</body>

	<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/user_pages_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Feb 2017 05:50:04 GMT -->
	</html>
