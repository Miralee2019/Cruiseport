<?php 
// $url = $this->uri->segment(2);

$url2 =  $this->uri->uri_string();


?>
<style type="text/css">
	.sidebar{
		background-color: #01a8f6!important;
		color: #fff;
	}

	.navigation > li.active > a, .navigation > li.active > a:focus, .navigation > li.active > a:hover {
	    background-color: rgba(0,0,0,.1);
	    color: #fff;
	}




	/*li{
		display: none;
	}*/

/*	.navigation li a {
		color: #fff;
		margin-bottom: 12px;
	}*/

	@media (min-width: 769px){
		.sidebar {
		    display: table-cell;
		    vertical-align: top;
		    width: 228px;
		}
	}


</style>
<div class="sidebar sidebar-main">
						<div class="sidebar-content">

							<!-- User menu -->
							<div class="sidebar-user">
								<div class="category-content">
									<div class="media" style="font-size: 18px;margin-left: 3px;">

									
									
										<div class="media-body">
											<span class="media-heading text-semibold" style="margin-top:7px;margin-left: -10px;" ><!-- <?php echo $super_email;?> -->
											Superadmin
												

											</span>
											<!-- <div class="text-size-mini text-muted"> 
												<i class="icon-pin text-size-small"></i> India
											</div>  -->
										</div>

										<div class="media-right media-middle">
											<ul class="icons-list">
												<!-- <li>
													<a href="<?echo base_url(); ?>index.php/superadmin/profile"><i class="icon-cog3"></i></a>
												</li> -->
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- /user menu -->


							<!-- Main navigation -->
						       <div class="sidebar-category sidebar-category-visible">
								<div class="category-content no-padding">
									<ul class="navigation navigation-main navigation-accordion">

										<!-- Main -->
										
										<li class="<?php if($url2 == 'superadmin/superhome' || $url2 == 'superadmin/superhome_test' || $url2 == 'superadmin/check_login') echo 'active'; ?>"><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-home4"></i> <span>Dashboard</span></a></li>


									

										<li class="<?php if($url2 == 'superadmin/view_userinfo' || $url2 == 'superadmin/dateRangeUser' ) echo 'active'; ?>">
											<a href="<?php echo base_url(); ?>index.php/superadmin/view_userinfo"><i class="icon-user"></i> <span>User Details</span></a>
										</li>

										<!-- <li class="<?php if($url2 == 'superadmin/shop_screen' || $url2 == 'superadmin/dateRangeStore' ) echo 'active'; ?>">
											<a href="<?php echo base_url(); ?>index.php/superadmin/shop_screen"><i class="icon-store"></i> <span>Store Details</span></a>
										</li> -->

										<li>
											<a href=""><i class= "icon-store"></i> <span>Stores</span></a>
											<ul>
												<li class="<?php if($url2 == 'superadmin/shop_screen' || $url2 == 'superadmin/dateRangeStore' ) echo 'active'; ?>">
													<a href="<?php echo base_url(); ?>index.php/superadmin/shop_screen"> <i class=" icon-store"></i>Store Details</a></li>

												<li class="<?php if($url2 == 'superadmin/new_offer_requests') echo 'active'; ?>"><a href="<?php echo base_url(); ?>index.php/superadmin/new_offer_requests"> <i class=" icon-file-text"></i>Offer Requests</a></li>

											</ul>
										</li>
										

										<li class="<?php if($url2 == 'superadmin/view_purchase' || $url2 == 'superadmin/dateRangePurchase'  ) echo 'active'; ?>">
											<a href="<?php echo base_url(); ?>index.php/superadmin/view_purchase"><i class=" icon-cart-add2"></i> <span>Billing Details</span></a>
										</li>
										<li class="<?php if($url2 == 'superadmin/view_walkins' || $url2 == 'superadmin/dateRangeWalkin' ) echo 'active'; ?>">
											<a href="<?php echo base_url(); ?>index.php/superadmin/view_walkins">
											
											<!-- <i class=" icon-accessibility2"></i>  -->
											<img src="<?php echo base_url(); ?>assets/vdvds.png" width="18px">
											<span  style="margin-left: 8px;">Walkin Details</span></a>
										</li>

										<li class="<?php if($url2 == 'superadmin/addCashrubBeacons') echo 'active'; ?>">
											<a href="<?php echo base_url(); ?>index.php/superadmin/addCashrubBeacons">
											<i class=" icon-feed"></i> <span>Add Beacons</span></a>
										</li>

										<li class="<?php if($url2 == 'superadmin/redeemCoupon') echo 'active'; ?>">
											<a href="<?php echo base_url(); ?>index.php/superadmin/redeemCoupon">
											<i class="glyphicon glyphicon-tag"></i> <span>Add Redeem Coupons</span></a>
										</li>


										<li>
											<a href=""><i class= "icon-user"></i> <span>User Requests</span></a>
											<ul>
												<li class="<?php if($url2 == 'superadmin/couponRedeemRequests') echo 'active'; ?>">
													<a href="<?php echo base_url(); ?>index.php/superadmin/couponRedeemRequests">
													<i class="icon-envelope"></i> <span>Coupon Requests</span></a>
												</li>

												<li class="<?php if($url2 == 'superadmin/paytmRedeemRequests') echo 'active'; ?>">
													<a href="<?php echo base_url(); ?>index.php/superadmin/paytmRedeemRequests">
													<i class="icon-envelope"></i> <span>Paytm Requests</span></a>
												</li>

											</ul>
										</li>



									<!-- 	<li class="<?php if($url2 == 'superadmin/couponRedeemRequests') echo 'active'; ?>">
											<a href="<?php echo base_url(); ?>index.php/superadmin/couponRedeemRequests">
											<i class="icon-envelope"></i> <span>Coupon Redeem Requests</span></a>
										</li>

										<li class="<?php if($url2 == 'superadmin/paytmRedeemRequests') echo 'active'; ?>">
											<a href="<?php echo base_url(); ?>index.php/superadmin/paytmRedeemRequests">
											<i class="icon-envelope"></i> <span>Paytm Redeem Requests</span></a>
										</li> -->


										<!-- /page kits -->

									</ul>
								</div>
							</div>
							<!-- /main navigation -->

						</div>
					</div>