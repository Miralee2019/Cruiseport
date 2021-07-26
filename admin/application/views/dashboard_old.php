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
												<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 92.9 92.9" style="enable-background:new 0 0 92.9 92.9;" xml:space="preserve" class="walk-pic svg svg3 replaced-svg">
													<g>
														<path d="M72.932,46.973L61.629,40.45c-0.725-0.418-1.601-1.531-1.837-2.334l-3.501-11.912c-0.087-0.298-0.219-0.564-0.381-0.798   c-0.509-0.936-1.49-1.572-2.627-1.572l-14.945,0.645c-0.655,0.028-1.264,0.276-1.763,0.687c-0.1,0.061-0.204,0.12-0.294,0.189   l-10.155,7.832c-1.173,0.905-1.83,2.745-1.494,4.188l4.021,17.3c0.335,1.444,1.717,2.534,3.212,2.534   c0.101,0,0.203-0.005,0.304-0.015l1.501-0.15c0.804-0.081,1.53-0.489,1.99-1.121c0.461-0.632,0.628-1.448,0.459-2.238L33.26,40.33   c-0.15-0.701,0.23-1.738,0.798-2.175l1.809-1.393l0.93,21.444c0.001,0.023,0.008,0.044,0.01,0.067l-4.128,9.156   c-0.52,1.153-1.826,2.75-2.852,3.489l-9.678,6.968c-1.559,1.122-2.148,3.366-1.342,5.11l1.324,2.861   c0.528,1.141,1.587,1.85,2.765,1.85c0.674,0,1.337-0.229,1.917-0.66l12.778-9.515c1.273-0.948,2.843-2.793,3.574-4.202   l6.379-12.286c0.051-0.099,0.083-0.205,0.125-0.308l0.445-0.019l10.441,28.786c0.737,2.032,2.703,3.398,4.892,3.398   c0.52,0,1.034-0.079,1.528-0.236l0.644-0.205c1.276-0.405,2.301-1.282,2.887-2.47c0.585-1.188,0.656-2.536,0.2-3.794L57.711,55.885   c-0.051-0.14-0.121-0.268-0.182-0.401l-0.353-8.134l12.122,6.297c0.426,0.222,0.906,0.339,1.389,0.339   c1.122,0,2.149-0.607,2.68-1.584l0.721-1.328C74.872,49.633,74.353,47.793,72.932,46.973z"></path>
														<path d="M44.162,21.673c0.157,0,0.316-0.003,0.475-0.01c2.891-0.125,5.561-1.37,7.517-3.503s2.964-4.901,2.839-7.792   C54.735,4.397,49.745-0.249,43.698,0.01c-2.891,0.125-5.561,1.37-7.517,3.503c-1.956,2.134-2.964,4.901-2.839,7.792   C33.594,17.119,38.347,21.673,44.162,21.673z"></path>
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
												<div class="div-margin-walk">
													<p class="no-margin new-walk"><b style="font-size:30px;">04</b></p>
													<p class="heading-walk">Walkins</p>
												</div>
												<!-- 			<div class="text-size-small">$37,578 avg</div> -->
											</div>



											<div id="today-revenue"></div>
										</div>
										<!-- /today's revenue -->

									</div>

									<div class="col-lg-3">

										<!-- Today's revenue -->
										<div class="panel walk">
											<div class="panel-body padding10">
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
												<div class="div-margin-offer">
													<p class="no-margin new-walk"><b style="font-size:30px;">21</b></p>
													<p class="heading-offer">Offers Active</p>
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
												<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 502.749 502.749" style="enable-background:new 0 0 502.749 502.749;" xml:space="preserve" class="purchase1 svg svg2 replaced-svg">
													<g>
														<g>
															<path d="M394.4,148.299c1.417,0,2.833,0.283,4.25,0.283l0,0c39.1,0,71.683-30.883,73.95-69.983    c2.267-40.8-28.9-75.933-69.7-78.483c-41.083-2.267-75.933,29.183-78.2,69.7c-0.567,9.917,0.85,19.267,3.683,28.05L152.15,202.982    c-13.033-11.05-29.75-17.85-48.167-17.85c-40.8,0-73.95,33.15-73.95,73.95s33.15,73.95,73.95,73.95    c17.283,0,33.433-5.95,45.9-16.15l171.983,93.5c-4.533,17.567-2.267,35.983,6.233,52.133c12.75,24.65,37.967,40.233,65.733,40.233    l0,0c11.9,0,23.517-3.117,34-8.783c36.267-18.7,50.433-64.033,31.733-100.017c-12.75-24.65-37.967-39.95-65.733-39.95    c-11.9,0-23.517,2.833-34,8.5c-8.5,4.533-16.15,10.483-22.1,17.567l-166.317-90.383c4.25-9.35,6.8-19.833,6.8-30.883    c0-10.2-1.983-19.833-5.667-28.617l174.25-103.417C358.983,139.232,375.699,147.449,394.4,148.299z M358.699,72.082    c1.133-21.25,18.7-37.683,39.95-37.683c0.85,0,1.7,0,2.267,0c22.1,1.417,38.817,20.117,37.683,42.217    c-1.133,21.817-20.117,38.817-42.217,37.683C374.283,112.882,357.283,93.899,358.699,72.082z M64.033,259.082    c0-22.1,17.85-39.95,39.95-39.95s39.95,17.85,39.95,39.95s-17.85,39.95-39.95,39.95S64.033,281.182,64.033,259.082z     M375.416,392.815c5.667-3.117,11.9-4.533,18.417-4.533c15.017,0,28.617,8.217,35.7,21.533c10.2,19.55,2.55,43.917-17,53.833    c-5.667,3.117-11.9,4.533-18.417,4.533l0,0c-15.017,0-28.617-8.217-35.7-21.533c-4.817-9.35-5.95-20.4-2.55-30.6    C358.699,406.132,365.783,397.632,375.416,392.815z"></path>
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
												</svg>
												<div class="div-margin2">
													<p class="no-margin new-walk"><b style="font-size:30px;">98</b></p>
													<p class="heading-purchase">Shares</p>
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
												<i class=" fa fa-star star star-border"	></i>
												<div class="div-margin3">
													<p class="no-margin new-walk"><b style="font-size:30px;">398</b></p>
													<p class="heading-star">Credit point</p>
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


		                                 	<div class="card comp1">


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
									<div class="card comp1">


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


									<div class="card comp1">


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
											"/> </a> 
											<span id="imagepoints3" style="position: absolute;
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

								</div>


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
		                 <footer><a href="www.cashrub.com" style="color: #777777;">@CashRub</a></footer>		
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