<?php 
// $url = $this->uri->segment(2);

$url2 =  $this->uri->uri_string();


?>
<style type="text/css">


@media(min-width: 769px){
.sidebar-xs .sidebar-main .navigation > li > a > span {
    display: none;
    position: absolute;
    top: 0;
    right: -260px;
    background-color: #01a8f6!important;
    border: 1px solid #01a8f6!important;
    padding: 11px 20px;
    width: 260px;
    text-align: left;
    color: #fff;
    cursor: pointer;
    border-bottom-right-radius: 3px;
    border-top-right-radius: 3px;
}

.sidebar-xs .sidebar-main .sidebar-user .media-left > input, .sidebar-xs .sidebar-main .sidebar-user .media-right > input{
    max-width: 100%;
    height: auto !important;
    margin-left: 5px;
}
}

.store-logo {
margin-left: 51px;
width: 100px!important;
height: 100px!important;
max-width: none;
border-color: #2b4a56;
border-width: 4px;
border-style: solid;
background: transparent;
}
</style>




<div class="sidebar sidebar-main">
					<div class="sidebar-content">

						<!-- User menu -->
						<div class="sidebar-user">
							<div class="category-content content-category">
								<div class="media">

								<?php if($dash[0]->store_logo) { ?>

									<a href="#" class="media-left"><input src="<?php echo base_url(); ?>uploads/<?php echo $dash[0]->store_logo; ?>" style="max-width: 80%;"  class="img-circle img-responsive store-logo" alt="" type="image"></a>


								<?php } else { ?>

									<a href="#" class="media-left"><input src="" style="max-width: 80%;"  class="img-circle img-responsive store-logo" alt="" type="image"></a>

								<?php } ?>

									


								</div>
								<div class="media">
									<div class="media-body text-center">
										<span class="media-heading text-semibold" style="font-size: 17px;"><?php echo $dash[0]->store_first_name; ?></span>
												<!-- <div class="text-size-mini text-muted"> 
													<span class="text-semibold shop">ShopKeeper</span>
												</div> -->
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



											<li class="<?php if($url2 == 'control/home' || $url2 == 'control/check_login') echo 'active'; ?>"><a href="<?php echo base_url();  ?>index.php/control/home"><i class="icon-home4"></i> <span>Dashboard</span></a></li>


											<li class="<?php if($url2 == 'control/addOffer') echo 'active'; ?>">
												<a href="#"><i class="icon-price-tags2"></i> <span>Offers</span></a>
												<ul>
													<li class="<?php if($url2 == 'control/addOffer') echo 'active'; ?>" ><a href="<?php echo base_url();  ?>index.php/control/addOffer"> <i class="icon-price-tag"></i>Add Offers</a></li>
													<li class="<?php if($url2 == 'control/viewOffer') echo 'active'; ?>"><a href="<?php echo base_url();  ?>index.php/control/viewOffer"><i class="icon-eye8"></i>View Offers</a></li>
												</ul>
											</li>


											<li class="<?php if($url2 == 'control/Reports') echo 'active'; ?>">
												<a href="#"><i class="fa fa-bar-chart"></i> <span>Reports</span></a>
												<ul>
													<li class="<?php if($url2 == 'control/walkinReport') echo 'active'; ?>" ><a href="<?php echo base_url();  ?>index.php/control/walkinReport"> <i class="fa fa-bar-chart"></i>Walkin</a></li>

													<li class="<?php if($url2 == 'control/userReport') echo 'active'; ?>"><a href="<?php echo base_url();  ?>index.php/control/userReport"><i class="fa fa-bar-chart"></i>Users</a>
													</li>
												</ul>
											</li>


											<li class="<?php if($url2 == 'control/viewBeacon') echo 'active'; ?>">
												<a href="#"><i class= "icon-station"></i> <span>Beacons</span></a>
												<ul>
													<li class="<?php if($url2 == 'control/viewBeacon') echo 'active'; ?>"><a href="<?php echo base_url(); ?>index.php/control/addBeacons"> <i class=" icon-feed"></i>Add Beacons</a></li>
													<!-- <li><a href="view_beacons.html"><i class="icon-eye8"></i>View Beacons</a></li> -->
													<!-- <li  ><a href="<?php echo base_url();?>index.php/control/home"><i class=" icon-design"></i>Add Plan</a></li> -->
												</ul>
											</li>

											<li class="<?php if($url2 == 'control/notification') echo 'active'; ?>"><a href="<?php echo base_url(); ?>index.php/control/notification"><i class="fa fa-bell-o"></i> <span>Notification</span></a></li>

											<!-- /page kits -->

										</ul>
									
									</div>
						</div>

						<!-- /main navigation -->

					</div>
				</div>