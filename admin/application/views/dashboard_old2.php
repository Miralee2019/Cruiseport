			<!DOCTYPE html>
			<html lang="en">

			<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Cash Rub</title>

			<!-- Global stylesheets -->
			<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
			<link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
			<link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
			

			<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
			<link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
			<link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
			<link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
			<link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
			<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
			<link rel="icon" href="assets/images/fevicon.png"/>		


			<!-- /global stylesheets -->

			<!-- Core JS files -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
			<!-- /core JS files -->
			<!-- <link href="assets/assets/global/css/components.min.css" rel="stylesheet"> -->
			<!-- Theme JS files -->
			<!-- <script src="assets/assets/global/plugins/jquery.min.js" type="text/javascript"></script> -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/d3/d3.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>

			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
			<!-- <script type="text/javascript" src="assets/js/pages/dashboard.js"></script> -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
			<!-- /theme JS files -->
			<style>
				.card{
					box-shadow: none;
					margin-left: 17px;
				}
			</style>
		</head>


		<body>

			<!-- Main navbar -->
				<?php include 'include/header.php' ?> 
			<!-- /main navbar -->


			<!-- Page container -->
			<div class="page-container">

				<!-- Page content -->
				<div class="page-content">

					<!-- Main sidebar -->
						<?php include 'include/sidebar.php'  ?>
					<!-- /main sidebar -->


					<!-- Main content -->
					<div class="content-wrapper">

						<!-- Content area -->
						<div class="content content-margin">

							<h6 class="content-group text-semibold">
								Welcome Store Admin
								<small class="display-block"> Dashboard</small>
							</h6>
							<!-- Main charts -->
							<div class="row1">
								<!-- Quick stats boxes -->
								<div class="row">
									

									<!-- Members online -->
									<div class="col-lg-3">

										<!-- Today's revenue -->
										<div class="panel facebook">
											<div class="panel-body padding10">
											<div class='col-md-6'>
											<img src="<?php echo base_url(); ?>assets/vdvds.png" style="margin-top:-7px;" >
											</div>
											<div class='col-md-6'>

												<div class="" style="margin-top: -18px;">
													<p class="no-margin new-walk"><b style="font-size:30px;">0</b></p>
													<p class="heading-walk">Walkins</p>
												</div>
												<!-- 			<div class="text-size-small">$37,578 avg</div> -->
											</div>
											</div>



											<div id="today-revenue"></div>
										</div>
										<!-- /today's revenue -->

									</div>

									<div class="col-lg-3">

										<!-- Today's revenue -->
										<div class="panel walk">
											<div class="panel-body padding10">
											<div class="col-md-4">
												<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612.002 612.002" style="enable-background:new 0 0 612.002 612.002;" xml:space="preserve" class="offer-pic svg svg3 replaced-svg">
													<g>
														<g>
															<path d="M437.511,174.502c5.123,5.123,13.434,5.123,18.55,0L608.158,22.399c5.123-5.123,5.123-13.427,0-18.557    c-5.116-5.123-13.427-5.123-18.55,0L437.511,155.945C432.382,161.068,432.382,169.379,437.511,174.502z"></path>
															<path d="M568.952,289.544l-16.681-183.418l-45.792,45.792c2.663,17.002-2.525,35.002-15.625,48.101    c-21.771,21.771-57.075,21.778-78.846,0c-21.771-21.771-21.771-57.081,0-78.852c13.099-13.099,31.086-18.281,48.082-15.625    l45.805-45.805L322.47,43.055c-7.215-0.649-14.352,1.929-19.482,7.058L7.152,345.949c-9.531,9.538-9.538,24.992,0,34.523    l65.805,65.812l32.47-32.47l92.765,92.765l-32.463,32.463l65.805,65.805c9.538,9.538,24.985,9.538,34.516,0l295.856-295.836    C567.017,303.883,569.594,296.746,568.952,289.544z"></path>
														</g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
													<g>
													</g>
												</svg>
											</div>
											<div class="col-md-8">
												<div class="" style="margin-top: -18px;">
													<p class="no-margin new-walk" style="padding-right: 54px;"><b style="font-size:30px;">0</b></p>
													<p class="heading-offer" style="padding-right: 0px;">Offers Active</p>
												</div>
											</div>
												
												
												<!-- 			<div class="text-size-small">$37,578 avg</div> -->
											</div>

											<div id="today-revenue"></div>
										</div>
										<!-- /today's revenue -->

									</div>

									<div class="col-lg-3">

										<!-- Today's revenue -->
										<div class="panel twitter">
											<div class="panel-body padding7">
											<div class="col-md-6">
												<i class="fa fa-share-alt" style="
												font-size: 30px;"  aria-hidden="true"></i>
											</div>
											<div class="col-md-6">
												<div class="div-margin2" style="margin-top: -18px;">
													<p class="no-margin new-walk"><b style="font-size:30px;">0</b></p>
													<p class="heading-purchase">Shares</p>
												</div>
											</div>
												
												
												<!-- 			<div class="text-size-small">$37,578 avg</div> -->
											</div>

											<div id="today-revenue"></div>
										</div>
										<!-- /today's revenue -->

									</div>

									<div class="col-lg-3">

										<!-- Today's revenue -->
										<div class="panel offer-back">
											<div class="panel-body padding7">
												<i class=" fa fa-star star star-border"	style="margin-left: 16px;"></i>
												<div style="margin-top: -54px;">
													<p class="no-margin new-walk"><b style="font-size:30px;">0</b></p>
													<p class="heading-star" style="margin-right: -90px;padding-right:0px;
margin-top: 40px;" >Credit point</p>
												</div>
												<!-- 			<div class="text-size-small">$37,578 avg</div> -->
											</div>

											<div id="today-revenue"></div>
										</div>
										<!-- /today's revenue -->

									</div>
								</div>
								<!-- /quick stats boxes -->
								
							</div>


							<div class="row">
								<div class="col-lg-6">						
									<div class="portlet light bordered">
										<div class="portlet-title">
											<div class="caption">
												<span><img src='<?php echo base_url(); ?>assets/images/walk-graph.jpg' class="img-circle" style= "margin-top:-15px; width: 50px;
													height: 50px;"/></span>
												</div>
												<span class="caption-subject font-dark  uppercase" style="position: absolute;
												margin-top: -60px;
												margin-left: 213px;
												font-size: 16px;
												font-weight: bold;">Walkins</span>


												<div class="actions">
													<div class="btn-group">
														<a href="" class="btn dark btn-outline dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> March
															<span class="fa fa-angle-down" style="margin-left: 20px;"> </span>
														</a>
														<ul class="dropdown-menu pull-right">

														</ul>
													</div>
													<!--  <a href="" class="btn more dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class=' icon-more2 more2' style="margin-top: -14px;"></i></a> -->
												</div>
												<div class="portlet-body">
													<div id="site_activities_loading">
														<img src="<?php echo base_url(); ?>assets/assets/global/img/loading.gif" alt="loading" /> </div>
														<div id="site_activities_content" class="display-none">
															<div id="site_activities" style="height: 228px;"> </div>
														</div>
														<div style="margin: 20px 0 10px 30px">

														</div>
													</div>


												</div>
											</div>
										</div>

										<div class="col-lg-6">
											<!-- Marketing campaigns -->
											<div class="portlet light bordered">
												<div class="portlet-title">
													<div class='caption'>

														<span><img src="<?php echo base_url(); ?>assets/images/user.jpg"  class="img-circle" style="margin-top: -15px; width: 50px;
															height: 50px;"/> </span>
															<span class="caption-subject font-dark  uppercase" style="position: absolute;
															margin-top: -11px;
															margin-left: 149px;
															font-size: 16px;
															font-weight: bold;">Real Time</span>
														</div>
		                     <div class='portlet-body ' style="padding-top: 48px;">
		                     	<div class='user-border text-center'><span class='user-count'>0</span>
		                     	</div>
		                     	<h3 class='user-heading text-center' style="margin-left: -14px;">Users</h3>
		                     	<div class='user-div'>

		                     	</div>
		                     </div>
		                 </div>
		             </div>
		         </div>
		         </div>
		         <div class="row">
		         	<div class="col-lg-6">
		         		<!-- Marketing campaigns -->
		         		<div class="portlet light bordered">
		         			<div class="portlet-title">
		         				<div class='caption'>

		         					<span><img src="<?php echo base_url(); ?>assets/images/offer12.jpg"  class="img-circle" style="margin-top: -15px; width: 50px;
		         						height: 50px;"/> </span>
		         						<span class="caption-subject font-dark uppercase" style="position: absolute;
		         						margin-top: -11px;
		         						margin-left: 150px;
		         						font-size: 16px;
		         						font-weight: bold;">Offers Active</span>
		         					</div>

		                                </div>

		                                <div class="portlet-body">


		                                 	<div class="card comp1" style="margin-left: -5px;">


		                                 		<div class="view overlay hm-white-slight" style="background:none; width: 495px; height:150px;">
		                                 			<img src="<?php echo base_url(); ?>assets/images/pizza.jpg" class="img-fluid" alt="pizza">
		                                 		<a href="#">
		                                 		
		                     					<div class="mask waves-effect waves-light"></div>
		                                 		</a>
		                                 		
		                                 		</div>

		                                 		<div class="card-block">
		                                 			<div class="image-text" style="
		                                 			position: absolute;
		                                 			margin-top: -163px;
		                                 			color: white;
		                                 			font-size: x-large;
		                                 			background: black;
		                                 			padding-right: 0px;
		                                 			padding-left: 0px;
		                                 			width: 496px;
		                                 			padding-bottom: 130px;
		                                 			padding-top: 21px;
		                                 			margin-left: -13px;
		                                 			opacity: 0.6;"	>

		                                 		</div>
		                                 		<h6 id="imagetitle" style="position: absolute;
		                                 		margin-top: -159px;
		                                 		color: white;
		                                 		text-align: center;"><b> Get 30% Off<br/> Dominozz</b></h6>
		                                 		<a href="#" class="btn label-success" style="margin-top: -159px;
		                                 		position: absolute;
		                                 		border-radius: 22px;
		                                 		padding: 0px 19px;
		                                 		margin-left: 408px;
		                                 		color: white;" ><span id="imageex">Food</span></a>

		                                 		<p class="card-text"  id="imagedesc" style="z-index: 22;position: absolute;color: white;margin-top: -100px;font-size: 13px;" >Get 30% Off On All Medium And Large Size Pizza <br/> Offer Valid On All Veg And Non Veg Pizza</p>

												<!-- <span class="card-text text-right exp"> Expiry On:-
												<p class="card-text text-left date" ></p></span> -->
												<a href="#" class="btn fb" style="margin-top: -50px;
												position: absolute;
												border-radius: 22px;
												padding: 2px 11px;" ><i class="icon-facebook"></i> <span id="imagepoints1">40 Points</span></a>

												<a href="#" class="btn twt" style="margin-top: -50px;
												position: absolute;
												border-radius: 22px;
												padding: 2px 11px; margin-left: 110px;" ><i class="icon-twitter"></i> <span id="imagepoints2">50 Points</span></a>

												<a href="#" class="btn" style="margin-top: -50px;
												position: absolute;
												border-radius: 22px;
												padding: 3px 0px;
												margin-left: 420px;
												height: 26px;
												width: 26px;
												border-color: white;
												border-radius: 50px; 
												" >	<img src="<?php echo base_url(); ?>assets/images/man-sm.png" class="walkins-icon svg svg4 " style="margin-top: 0px;
												height: 18px;
												color: white; margin-left:0px; 
												"/> </a>  <span id="imagepoints3" style="position: absolute;
												margin-top: -53px;
												float: left;
												color: white;
												margin-left: 450px;
												font-size: 20px;">60</span> 
												<style>
													.svg4 {
														width: 26px;
														height: 18px;
													}
													.card {
														pointer-events: all;
													}
												</style>

												<!-- <li class="card-text text-left"  style="padding-top: 20px; margin-left: 10px;" id="imageterms">Terms & Condition</li> -->
												</div>

											</div>
											<!-- end card comp -->
										</div>
										<!-- portlet-body -->


							</div>
						</div>

						<div class="col-lg-6">
							<!-- Marketing campaigns -->
							<div class="portlet light bordered">
								<div class="portlet-title">
									<div class='caption'>

										<span><img src="<?php echo base_url(); ?>assets/images/recent.jpg"  class="img-circle" style="margin-top: -15px; width: 50px;
											height: 50px;"/> </span>
											<span class="caption-subject font-dark  uppercase" style="position: absolute;
											margin-top: -13px;
											margin-left: 123px;
											font-size: 16px;
											font-weight: bold;">Recent Activity</span>
										</div>
									<!-- <div class="actions">
		                                       
		                                         <a href="" class="btn more dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class=' icon-more2 more2'></i></a>
		                                     </div> -->
		                                 </div>

		                                 <div class="portlet-body">
		                                 	<div data-always-visible="1" data-rail-visible="0">
		                                 		<ul class="feeds">
		                                 			<li>
		                                 				<div class="col1">
		                                 					<div class="cont">
		                                 						<div class="cont-col1">
		                                 							<div>
		                                 								<img src="<?php echo base_url(); ?>assets/images/demo/users/face2.jpg" class="img-circle" style="width:30px;" alt="">
		                                 							</div>
		                                 						</div>
		                                 						<div class="cont-col2">
		                                 							<div class="desc"> fbuser@gmail.com Shared an offer

		                                 							</div>
		                                 						</div>
		                                 					</div>
		                                 				</div>
		                                 				<div class="col2">
		                                 					<div class="date"> <i class="fa fa-clock-o"></i><span> 2 Mins</span> </div>
		                                 				</div>
		                                 			</li>
		                                 			<li>
		                                 				<div class="col1">
		                                 					<div class="cont">
		                                 						<div class="cont-col1">
		                                 							<div>
		                                 								<img src="<?php echo base_url(); ?>assets/images/demo/users/face3.jpg" class="img-circle" style="width:30px;" alt="">
		                                 							</div>
		                                 						</div>
		                                 						<div class="cont-col2">
		                                 							<div class="desc"> fbuser@gmail.com Shared an offer

		                                 							</div>
		                                 						</div>
		                                 					</div>
		                                 				</div>
		                                 				<div class="col2">
		                                 					<div class="date"> <i class="fa fa-clock-o"></i><span> 5 Mins</span> </div>
		                                 				</div>
		                                 			</li>
		                                 			<li>
		                                 				<div class="col1">
		                                 					<div class="cont">
		                                 						<div class="cont-col1">
		                                 							<div>
		                                 								<img src="<?php echo base_url(); ?>assets/images/demo/users/face4.jpg" class="img-circle" style="width:30px;" alt="">
		                                 							</div>
		                                 						</div>
		                                 						<div class="cont-col2">
		                                 							<div class="desc"> fbuser@gmail.com Shared an offer

		                                 							</div>
		                                 						</div>
		                                 					</div>
		                                 				</div>
		                                 				<div class="col2">
		                                 					<div class="date"> <i class="fa fa-clock-o"></i><span> 6 Mins</span> </div>
		                                 				</div>
		                                 			</li>
		                                 			<li>
		                                 				<div class="col1">
		                                 					<div class="cont">
		                                 						<div class="cont-col1">
		                                 							<div>
		                                 								<img src="<?php echo base_url(); ?>assets/images/demo/users/face5.jpg" class="img-circle" style="width:30px;" alt="">
		                                 							</div>
		                                 						</div>
		                                 						<div class="cont-col2">
		                                 							<div class="desc"> fbuser@gmail.com Shared an offer

		                                 							</div>
		                                 						</div>
		                                 					</div>
		                                 				</div>
		                                 				<div class="col2">
		                                 					<div class="date"> <i class="fa fa-clock-o"></i><span> 3 Mins</span> </div>
		                                 				</div>
		                                 			</li>
		                                 			<li>
		                                 				<div class="col1">
		                                 					<div class="cont">
		                                 						<div class="cont-col1">
		                                 							<div>
		                                 								<img src="<?php echo base_url(); ?>assets/images/demo/users/face6.jpg" class="img-circle" style="width:30px;" alt="">
		                                 							</div>
		                                 						</div>
		                                 						<div class="cont-col2">
		                                 							<div class="desc"> fbuser@gmail.com Shared an offer

		                                 							</div>
		                                 						</div>
		                                 					</div>
		                                 				</div>
		                                 				<div class="col2">
		                                 					<div class="date"> <i class="fa fa-clock-o"></i><span> 4 Mins</span> </div>
		                                 				</div>
		                                 			</li>
		                                 			<li>
		                                 				<div class="col1">
		                                 					<div class="cont">
		                                 						<div class="cont-col1">
		                                 							<div>
		                                 								<img src="<?php echo base_url(); ?>assets/images/demo/users/face7.jpg" class="img-circle" style="width:30px;" alt="">
		                                 							</div>
		                                 						</div>
		                                 						<div class="cont-col2">
		                                 							<div class="desc"> fbuser@gmail.com Shared an offer

		                                 							</div>
		                                 						</div>
		                                 					</div>
		                                 				</div>
		                                 				<div class="col2">
		                                 					<div class="date"> <i class="fa fa-clock-o"></i><span> 8 Mins</span> </div>
		                                 				</div>
		                                 			</li>

		                                 		</ul>
		                                 	</div>

		                                 </div>
		                             </div>
		                         </div>
		                         <!-- /marketing campaigns -->				
		                     </div>
		                 </div>
		                 <footer><a href="<?php echo base_url();  ?>index.php/control/home" style="color: #777777;">@CashRub</a></footer>		
		             </div>

		         </div>

		     </div>


		     <script src="<?php echo base_url(); ?>assets/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>	
		     <script src="<?php echo base_url(); ?>assets/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
		     <script src="<?php echo base_url(); ?>assets/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
		     <script src="<?php echo base_url(); ?>assets/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
		     <script src="<?php echo base_url(); ?>assets/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
		     <script src="<?php echo base_url(); ?>assets/assets/global/scripts/app.min.js" type="text/javascript"></script>
		     <script src="<?php echo base_url(); ?>assets/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!-- 		     <script>
/*		      			        $('ul li.dropdown').hover(function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
	}, function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(2000);
	});*/
	
</script>    --> 

</body>
</html>