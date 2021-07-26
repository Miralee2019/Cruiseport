


<style type="text/css">


.header-highlight .navbar-header:not([class*=bg-]) {
    background-color: #01a8f6!important;
    -webkit-box-shadow: none; 
    box-shadow: none; 
}

.navbar-default {
    background-color: #01a8f6!important;
}

.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
    color: #fff;
    background-color: #01a8f6;
}

.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
    background-color: #01a8f6;
    color: #fff;
}

.navbar-default .navbar-nav>li>a, .navbar-default .navbar-text {
    color: #fff;
}

.navigation li a {
    color: #fff;
    font-size: 14px;
}

.navbar-nav {
    margin-left: 0px !important;
}

.navbar-header {
    min-width: 227px;
}

    
</style>


<div class="navbar navbar-default header-highlight">
                    <div class="navbar-header" style="height:50px;">
                        <a class="navbar-brand"  style="background-size: auto 34px;" href="<?php echo base_url();  ?>index.php/superadmin/superhome"><img src="<?php echo base_url(); ?>assets/images/cashrub-logo.png"></a>
                    <br/>
                        <ul class="nav navbar-nav visible-xs-block">
                            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                        </ul>
                    </div>

                    <div class="navbar-collapse collapse" id="navbar-mobile">
                        <ul class="nav navbar-nav">
                            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>           
                        </ul>

                        <!-- <p class="navbar-text">
                            <span class="label bg-success">Online</span>
                        </p> -->

                        <div class="navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="dropdown dropdown-user">
                                    
                                    <a class="dropdown-toggle" data-toggle="dropdown" style="font-size: 18px;top: 5px;" >
                                        <!-- <img src="<?php echo base_url(); ?>superassets/images/demo/users/face1.jpg" alt=""> -->
                                        <!-- <span><?php echo $super_email; ?></span> -->
                                        <i style="font-size: 21px;" class="icon-cog5"></i>
                                        <i class="caret"></i>
                                    </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?php echo base_url(); ?>index.php/superadmin/profile"><i class="icon-cog5"></i> Account settings</a></li>
                                        <li><a data-toggle="modal" data-target="#myNewModal" ><i class="icon-switch2"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>




<!-- modal -->
<div class="modal fade" id="myNewModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="text-align: center;">
          <button type="button" class="close" data-dismiss="modal" style="top: 20%;right: 20px;">&times;</button>
          <h4 class="modal-title">Do you want to logout?</h4>
        </div>
        <div class="modal-body" style="text-align: center;">
          
          <p>



            <button  class="btn btn-info" value="" style="border-radius:0px !important;background-color: #01a8f6!important;" onclick="javascript:window.location.href='<?php echo base_url(); ?>index.php/superadmin/logout'">Yes</button>

            <button  class="btn btn-info" style="border-radius:0px !important;margin-left: 2px !important; background-color: #01a8f6!important;" onclick="location.reload();">No</button>

          </p>

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
    </div>
  </div>
