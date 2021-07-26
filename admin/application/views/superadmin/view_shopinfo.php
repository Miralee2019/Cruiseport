<?php error_reporting(0); ?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cash Rub</title>


	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
	

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>superassets/css/custom.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- /theme JS files -->

	<style type="text/css">
	
	.storename{

		margin-top: -90px;
		margin-left: -90px;
		position: absolute;
	}

	@media(min-width: 320px) and (max-width: 768px){
		.storename{
			margin: 0 auto;
			position: relative;
		}
		.store-img{
			margin: 0 auto;	
		}			
	}


</style>
<script>
$(document).ready(function(){    
	var res = $("#shopname").html();
	var len = res.length;
	if(len<=20) {
		$("#store-info").css("padding-left","180px");
	} else if (len>=20 && len <=50) {
		$("#store-info").css("padding-left","60px");
	} else {
		$("#store-info").css("padding-left","0px");
	}   
});
</script>
</head>

<body>

	
	<?php include 'include/mainheader.php'; ?>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<?php include 'include/supersidebar.php'; ?>	
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4> 

								<a href="<?php echo base_url(); ?>index.php/superadmin/shop_screen"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">View Store Details</span></h4>
								<ul class="breadcrumb position-right">
									
									<li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-home2 position-left"></i> Home</a></li>
									<li><a href="#">Registered Store</a></li>
									

								</ul>
							</div>

							<div class="heading-elements">
								<ul class="icons-list">
									<li><a id="shows" data-action="reload"></a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /page header -->


					<!-- Content area -->
					<div class="content">


						<!-- <div class="panel-body"> -->
							
							<!-- <div class="chart-container"> -->
								
								

								<div class="row">

									<div id="hidemenow">
										
										<?php  
										if ($this->session->flashdata()) {

											echo $this->session->flashdata('refresh_message');
										}?>

									</div>
									
									

									<div class="panel panel-info">

										<div class="panel-body">
											<div class="row">	
												<div class="col-md-12 content-group" id="store-info" style="margin: 20px 20px 20px 0px;">
													<div class="col-xs-1 col-xs-offset-3 col-sm-1 col-sm-offset-3 col-md-1 col-md-offset-3 col-lg-1 col-lg-offset-3">
														<?php if($selected_store_detail[0]->store_logo){ ?>
														<img src="<?php echo base_url(); ?>uploads/<?php echo $selected_store_detail[0]->store_logo; ?>" class="img-circle store-img" style="width: 90px; height: 90px; float: right;"> 
														<?php } else { ?> 
														<img src="http://eadb.org/wp-content/uploads/2015/08/profile-placeholder.jpg"  style="width: 90px;height:90px;float: right;" class="img img-circle" >
														<?php } ?>
													</div>
													<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
														<h3 id="shopname"><?php echo $selected_store_detail[0]->store_first_name; ?> </h3>
													</div>
												</div>
												<div class="col-md-6"> 
													<table class="table">
														<tbody>

															<tr>
																<td class="col-md-4"><b>Email</b></td>
																<td class="col-md-8"><?php echo $selected_store_detail[0]->store_email; ?></td>
															</tr>
															<tr>
																<td class="col-md-4"><b>Mobile Number</b></td>
																<td class="col-md-8"><?php echo $selected_store_detail[0]->store_mobile_no; ?></td>
															</tr>

															<tr>
																<td class="col-md-4"><b>Zipcode</b></td>
																<td class="col-md-8"><?php echo $selected_store_detail[0]->zipcode; ?></td>
															</tr>

															<?php

															$CI = & get_instance();
															$CI->load->model('supermodel');
															$category = $CI->supermodel->select_data('T_Category', array('category_id' => $selected_store_detail[0]->category ));

															$store_walkin = $CI->supermodel->select_data('T_BeaconActivity', array('store_id' => $selected_store_detail[0]->store_id ));

															$facebook_shares = $CI->supermodel->getFacebookShares($selected_store_detail[0]->store_id);

															$twitter_shares = $CI->supermodel->getTwitterShares($selected_store_detail[0]->store_id);


															?>

															<tr>
																<td class="col-md-4"><b>Category</b></td>
																<td class="col-md-8"><?php echo $category[0]->name; ?></td>
															</tr>
															<tr>
																<td class="col-md-4"><b>Complete Address</b></td>
																<td class="col-md-8" style="word-break: break-all;"><?php echo $selected_store_detail[0]->store_address1; ?></td>
															</tr>
															<tr>
																<td class="col-md-4"><b>Store Points</b></td>
																<td class="col-md-8"><?php echo $selected_store_detail[0]->store_point; ?></td>
															</tr>
															<tr>
																<td class="col-md-4"><b>Opening Hours</b></td>
																<td class="col-md-8"><?php echo $selected_store_detail[0]->store_open_hours; ?></td>
															</tr>
															<tr>
																<td class="col-md-4"><b>Closing Hours</b></td>
																<td class="col-md-8"><?php echo $selected_store_detail[0]->store_close_hours; ?></td>
															</tr>
															<tr>
																<td class="col-md-4"><b>Walkin Point</b></td>
																<td class="col-md-8"><?php echo $selected_store_detail[0]->walking_point; ?></td>
															</tr>

															<tr>
																<td class="col-md-4"><b>Store Visits</b></td>
																<td class="col-md-8"><?php echo $store_walkin[0]->beacon_activity_id ? count($store_walkin) : '0' ; ?></td>
															</tr>

															<tr>
																<td class="col-md-4"><b>Registration Date</b></td>
																<td class="col-md-8"><?php echo $selected_store_detail[0]->created_date; ?></td>
															</tr>
														</tbody>
													</table>
												</div>

												<div class="col-md-6">
													<div class="panel panel-flat">
														<div class="panel-heading" style="margin: 0px 0px 0;">
															<h6 class="panel-title">Sharing Details</h6>
															<div class="heading-elements">
																<span class="heading-text"><span class="text-semibold"> <?php echo $facebook_shares[0]->facebook_shares + $twitter_shares[0]->twitter_shares; ?> </span></span>
															</div>
														</div>
														<div class="panel-body">
															<div class="chart-container">

																<p href="#"><span class="badge fb pull-right"><?php if($facebook_shares[0]->facebook_shares) { echo $facebook_shares[0]->facebook_shares; } else { echo "0"; }  ?></span> <i class="icon-facebook fb social-border"></i> Facebook</p>

																<p href="#"><span class="badge twt pull-right"><?php if($twitter_shares[0]->twitter_shares){
																	echo $twitter_shares[0]->twitter_shares; } else { echo "0";} ?></span> 
																	<i class="icon-twitter twt social-border"></i> twitter</p>

																	<p href="#"><span class="badge ref pull-right">0</span> <i class="icon-user ref social-border"></i> Referrals</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									<!-- </div> -->

									<div class="row">

										<div class="col-md-12">
											<div class="panel panel-flat">
												<div class="panel-heading" style="margin: 0px 0px 0;">
													<h6 class="panel-title"><b>Credit Purchase Detail</b></h6>
												</div>		

												<div class="table-responsive">
													<table class="table table-lg">

														<thead>
															<tr>
																<th><b>Purchase Description</b></th>
																<th class="col-sm-2"><b>Date</b></th>
																<th class="col-sm-2"><b>Amount</b></th>
																<!-- <th class="col-sm-1"><b>Total</b></th> -->
															</tr>
														</thead>

														<tbody>

															<?php foreach ($purchase_detail as $key) { ?>

															<tr>
																<td>
																	<h6 class="no-margin"><?php echo $key->payment_name; ?></h6>
																	<!-- 	<span class="text-muted">One morning, when Gregor Samsa woke from troubled.</span> -->
																</td>
																<td><?php echo $key->payment_date; ?></td>
																<td><?php echo $key->points; ?></td>
																<!-- <td><span class="text-semibold">$3,990</span></td> -->
															</tr>

															<?php } ?>

														</tbody>

													</table>
												</div>

												<div class="panel-body">
													<div class="row invoice-payment">
														<div class="col-sm-7">
														</div>

														<div class="col-sm-5">
															<div class="content-group">
																<h6>Total due</h6>
																<div class="table-responsive no-border">

																	<table class="table">
																		<tbody>

																			<tr>
																				<th>Total:</th>
																				<td class="text-right text-primary"><h5 class="text-semibold"><?php echo $total_purchase[0]->t_purchase; ?></h5></td>
																			</tr>
																		</tbody>
																	</table>

																</div>
															</div>
														</div>
													</div>

												</div>


											</div>

										</div>



										<!-- </div> -->


									</div>

								</div>
								<!-- /content area -->
							</div>
							<!-- /main content -->
						</div>
						<!-- /page content -->


					</div>

					<script>



						$('#shows').click(function() {

							window.location.href = "<?php echo base_url(); ?>index.php/superadmin/view_shopinfo/<?php echo $selected_store_detail[0]->store_id; ?>/chk";
						});


						$("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);    



					</script>

				</body>

				<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
				</html>
