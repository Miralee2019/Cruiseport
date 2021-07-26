<div class="navbar navbar-default header-highlight">

			<div class="navbar-header">
				<a class="navbar-brand"  style="background-size: auto 34px;" href="<?php echo base_url();  ?>index.php/control/home"><img src="<?php echo base_url(); ?>assets/images/cashrub-logo.png"></a>
				<br/>

				<ul class="nav navbar-nav visible-xs-block">
					<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
					<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
				</ul>
			</div>

			<div class="navbar-collapse collapse" id="navbar-mobile">
				<ul class="nav navbar-nav">
					<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3" style='color:white;'></i></a></li>		
				</ul>
				



				<div class="navbar-right">
					<ul class="nav navbar-nav">

						<li class="dropdown dropdown-user">
							<a class="dropdown-toggle" data-toggle="dropdown">
								<span class='store-admin store-border' style="margin-top: 5.5px;" ><?php echo $dash[0]->store_first_name; ?></span>
								<i class="caret" style='color:white;margin-right: 45px;'></i></a>
								<span style="margin-top: -47px;float: right;margin-bottom: 5px;" >

								<?php if($dash[0]->store_logo) { ?>
									
									<input src="<?php echo base_url(); ?>uploads/<?php echo $dash[0]->store_logo; ?>" class="img-circle img-responsive name-border" alt="" type="image">

								<?php } else { ?>	
									
									<input src="" class="img-circle img-responsive name-border" alt="" type="image">
								
								<?php } ?>

								</span>
							
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="<?php echo base_url(); ?>index.php/control/profile"><i class=" icon-user-plus"></i> Profile</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/control/setting"><i class="icon-cog5"></i> Account settings</a></li>
								<li><a data-toggle="modal" data-target="#myModalNew" ><i class="icon-switch2"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>




<!-- modal -->
<div class="modal fade" id="myModalNew" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" style="right:20px;top:20%;"  data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center;">Do you want to logout?</h4>
        </div>
        <div class="modal-body" style="text-align: center;">
          
          <p>



          	<button  class="btn btn-info" value="" style="border-radius:0px !important;background-color: #01a8f6!important;" onclick="javascript:window.location.href='<?php echo base_url(); ?>index.php/control/logout'">Yes</button>

          	<button  class="btn btn-info" style="border-radius:0px !important;margin-left: 1px !important; background-color: #01a8f6!important;" onclick="location.reload();">No</button>

          </p>

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
    </div>
  </div>




