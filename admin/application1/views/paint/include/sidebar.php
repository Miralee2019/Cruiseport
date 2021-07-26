<?php 
// $url = $this->uri->segment(2);

$url2 =  $this->uri->uri_string();
$active_class= $this->uri->segment(2);

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

											<?php 

												$store_id = $this->session->userdata('store_id');

												$CI =& get_instance();
										        $CI->load->model('adminmodel');
										        $chk_space = $CI->adminmodel->select_data('T_Space', array('store_id' => $store_id ));

										        $space_id_of_user =  $chk_space[0]->space_id;

										        $chk_assign_beacon = $CI->adminmodel->select_data('T_AssignBeacon', array('space_id' => $space_id_of_user ));

										    ?>

										    <?php if($chk_assign_beacon) { ?>

										    <li class="<?php if($url2 == 'control/viewBeacon') echo 'active'; ?>">
												<a href="#"><i class= "icon-station"></i> <span> Beacons </span></a>
												<ul>
													<li class="<?php if($url2 == 'control/viewBeacon') echo 'active'; ?>"><a href="<?php echo base_url(); ?>index.php/control/addBeacons"> <i class=" icon-feed"></i>Add Beacons</a></li>
												

													<li class="<?php if($active_class == 'assign_beacon' || $active_class == 'paint') echo 'active'; ?>" ><a href="<?php echo base_url();?>index.php/control/paint"><i class=" icon-design"></i>Add Plan</a></li>


													<li class="<?php if($active_class == 'heat_beacon') echo 'active'; ?>" ><a href="<?php echo base_url();?>index.php/control/heatmap">
													<img src="<?php echo base_url(); ?>assets/heatmap.png" width = "22" height="22">
													<!-- <i class="icon-design"></i> -->
													<red style="margin-left: 7%;" >Heat Map</red></a></li>

												</ul>
											</li>

											<?php } else { ?>

											<li class="<?php if($url2 == 'control/viewBeacon') echo 'active'; ?>">
												<a href="#"><i class= "icon-station"></i> <span> Beacons </span></a>
												<ul>
													<li class="<?php if($url2 == 'control/viewBeacon') echo 'active'; ?>"><a href="<?php echo base_url(); ?>index.php/control/addBeacons"> <i class=" icon-feed"></i>Add Beacons</a></li>
												

													<li class="<?php if($active_class == 'assign_beacon' || $active_class == 'paint') echo 'active'; ?>" ><a href="<?php echo base_url();?>index.php/control/paint"><i class=" icon-design"></i>Add Plan</a></li>


												</ul>
											</li>

											<?php } ?>

											
											<?php if($active_class=="assign_beacon"){  ?>

											<li class="active">
												<a href="#"><i class= "fa fa-bluetooth"></i> <span>Assigned Beacon</span></a>
											
												<ul>
												
												<?php $count=0; 
													foreach ($beacon_details as $beacon){ 
				                                    if($beacon){ ?>

														<li>

														<div id="assignbeacon" class="assignbeacon" name="<?=$beacon->beacon_key; ?>" style="padding: 11px; margin: 5px;"><i title="Remove Beacon" onclick="deletebeacon(this)" style="cursor: pointer; color: red; margin-right: 10px;" class="icon-trash"></i>
				                                        <?=$beacon->beacon_key; ?> <i title="Assign Beacon" onclick="addbeacon(this)" style="cursor: pointer; margin-left: 10px;" class="icon-plus2"></i>

				                                        </div>
													
														</li>

													<?php }

			                                    	$count++; } 

			                                    	?>

												</ul>
											</li>

											<?php } ?>

          									
											<li class="<?php if($url2 == 'control/Reports') echo 'active'; ?>">
												<a href="#"><i class="icon-stats-dots"></i> <span>Reports</span></a>
												<ul>
													<li class="<?php if($url2 == 'control/walkinReport') echo 'active'; ?>" ><a href="<?php echo base_url();  ?>index.php/control/walkinReport"> 

													<img src="<?php echo base_url(); ?>assets/vdvds.png" style="
													    width: 28px;
													    height: 25px;
													    margin-right: 10px;
													    margin-left: -3px;
													">

													Walkin</a></li>

													<li class="<?php if($url2 == 'control/userReport') echo 'active'; ?>"><a href="<?php echo base_url();  ?>index.php/control/userReport"><i class="icon-users"></i>Users</a>
													</li>
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