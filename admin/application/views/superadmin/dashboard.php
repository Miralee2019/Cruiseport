<?php error_reporting(0); ?>

        <!DOCTYPE html>
        <html lang="en">

        <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Feb 2017 12:23:01 GMT -->
        <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
        <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cash Rub</title>

        <!-- Global stylesheets -->
        
        <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>superassets/css/dashboard.css" rel="stylesheet" type="text/css">
        


        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/visualization/d3/d3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/visualization/d3/d3_tooltip.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/pickers/daterangepicker.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/dashboard.js"></script>
        <!-- /theme JS files -->

        <style type="text/css">
            body{
                font-family:"Raleway", sans-serif !important;
            }
        </style>
        </head>

        <body>

            <!-- Main navbar -->

            <?php include 'include/mainheader.php'; ?>
                
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

                    <!-- Content area -->
                    <div class="content">
        <h6 class="content-group text-semibold" style="font-size: 19px;">
                            System Details
                            <small class="display-block"></small>
                        </h6>
                        <!-- Main charts -->
                        <div class="row">
                        <!-- Quick stats boxes -->
                                <!-- <div class="row"> -->
                                    <div class="col-lg-3">

                                        <!-- Members online -->
                                        <div class="panel twitter">
                                            <div class="panel-body">

                                                <div class="col-lg-4 col-xs-4">
                                                    <i class="icon-user" style="font-size: 45px;" ></i>    
                                                </div>

                                                <div class="col-lg-8 col-xs-8">
                                                    <h3 class="no-margin"><?php echo count($total_users);?></h3>
                                                    Total Users    
                                                </div>

                                            </div>

                                            <div class="container-fluid">
                                                <div id="members-online"></div>
                                            </div>
                                        </div>
                                        <!-- /members online -->

                                    </div>

                                    <div class="col-lg-3">

                                        <!-- Current server load -->
                                        <div class="panel facebook">
                                            <div class="panel-body">
                                            
                                            <div class="col-lg-4 col-xs-4">
                                                <i class='icon-store' style="font-size: 45px;"></i>    
                                            </div>

                                            <div class="col-lg-8 col-xs-8">

                                            <h3 class="no-margin"><?php echo count($total_store);?></h3>
                                                Total Shop
                                                
                                            </div>

                                            </div>

                                            <div id="server-load"></div>
                                        </div>
                                        <!-- /current server load -->

                                    </div>

                                    <div class="col-lg-3">

                                        <!-- Today's revenue -->
                                        <div class="panel walk">
                                            <div class="panel-body">


                                                <div class="col-lg-4 col-xs-4">
                                                     <!-- <i class="icon-accessibility2 walk social-dash"></i> -->
                                                     <img src="<?php echo base_url(); ?>assets/vdvds.png">
                                                </div>
                                                
                                                <div class="col-lg-8 col-xs-8">

                                                    <h3 class="no-margin"><?php if($total_walkins){ echo count($total_walkins); } else { echo "0"; } ;?></h3>
                                                    Walkins
                                                    
                                                </div>

                                            </div>

                                            <div id="today-revenue"></div>
                                        </div>
                                        <!-- /today's revenue -->

                                    </div>
                                    <div class="col-lg-3">

                                        <!-- Today's revenue -->
                                        <div class="panel purchase">
                                            <div class="panel-body">


                                                <div class="col-lg-4 col-xs-4">
                                                    <i class="icon-cart-add purchase" style="font-size: 45px;"></i>
                                                </div>
                                                
                                                <div class="col-lg-8 col-xs-8">
                                                    <h3 class="no-margin"><?php if($getCountCredits[0]->credits) { echo round($getCountCredits[0]->credits); } else { echo "0"; } ?></h3>
                                                    Total Credits    
                                                </div>

                                                
                                            
                                            </div>

                                            <div id="today-revenue"></div>
                                        </div>
                                        

                                    </div>
                                <!-- </div> -->
                                
                            
                        </div>

                <div class="row">
                <div class="col-md-6">

                    


                        <div class="panel panel-flat" style="height: 80vh; overflow-y: scroll; overflow-x: scroll; ">
                        
                            <?php
                                if ($this->session->flashdata()) {
                                    echo $this->session->flashdata('user_blocked');
                                }
                            ?>

                            <div class="panel-heading">
                                <h6 class="panel-title text-semibold" style="font-size: 17px;"><i class="icon-user twitter social-border"></i>&nbsp;User Details</h6>
                            </div>

                            <div class="table-responsive">
                            <table class="table table-hover " id="sample_3">
                                                                                            
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Walkins</th>
                                        <th class='center'>Share</th>
                                        <th>Points</th>
                                        <!-- <th class="text-center">Actions</th> -->
                                    </tr>
                                </thead>

                                <tbody>
                                        
                                <?php foreach ($users as $key) { ?>
                                    <tr>

                                    <td><?php echo $key->user_id ; ?></td>
                                    <td><?php echo $key->name; ?></td>
                                    <td><?php echo $key->email; ?></td>
                                    
                                    <?php 

                                        $CI =& get_instance();
                                        $CI->load->model('adminmodel');
                                        
                                        $walkin = $CI->Supermodel->getCountWalkin($key->user_id);
                                        $twitter = $CI->Supermodel->getTwitterPoints($key->user_id);
                                        $facebook = $CI->Supermodel->getFacebookPoints($key->user_id);

                                        $f_p = $CI->Supermodel->getFacebookP($key->user_id);
                                        $t_p = $CI->Supermodel->getTwitterP($key->user_id);
                                        
                                    ?>

                                    <td><?php echo $walkin[0]->walks; ?></td>
                                    <td>
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <ul class = "dropdown-menu share-drop" role = "menu">
                                                    <li class='share-list'> <p href="#"><span class="fb pull-right"><?php if($facebook[0]->facebook_shares){ echo $facebook[0]->facebook_shares ; } else { echo "0"; } ?></span> <i class="icon-facebook fb"></i> Facebook</p></li>
                                                    <li class='share-list'> <p href="#"><span class="twt pull-right"><?php if($twitter[0]->twitter_shares){ echo $twitter[0]->twitter_shares ; } else { echo "0"; } ?></span> <i class="icon-twitter twt "></i> twitter</p></li>
                                                    <li class='share-list'> <p href="#"><span class=" referals pull-right">0</span> <i class="icon-user referals"></i> Referrals</p></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                    <td><?php echo (($f_p[0]->facebook_p)+($t_p[0]->twitter_p)); ?></td>
                                    <!-- <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <ul class = "dropdown-menu left" role = "menu">
                                                    <li><a href = "#    "> <i class="icon-envelope"></i>  Send Email</a></li>
                                                    <li><a id="delete-sub"><i class="icon-cross"></i> Block User </a></li>
                                                    

                                                </ul>
                                            </li>
                                        </ul>
                                     --></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        

                        </div>
                        </div>
                                <div class="col-lg-6">
                                <!-- Marketing campaigns -->
                                <div class="panel panel-flat"  style="height: 80vh; overflow-y: scroll; overflow-x: scroll; ">
                                    <div class="panel-heading">
                                        <h6 class="panel-title text-semibold" style="font-size: 17px;"><i class="icon-store facebook social-border"></i>&nbsp;Store Details</h6>
                                    </div>
                                <!-- <?php var_dump($total_store); ?> -->
                                <div class="table-responsive">
                                <table class="table table-hover" id="sample_3">
                                                                                    
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address </th>
                                            <th>Credit</th>
                                            <!-- <th class="text-center">Actions</th> -->
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php foreach ($total_store as $key) { ?>

                                    <tr>
                                        <td><?php echo $key->store_id; ?></td>
                                        <td><?php echo $key->store_first_name; ?></td>
                                        <td><?php echo $key->store_address1; ?></td>
                                        <td> <?php echo $key->store_point; ?> </td>
                                        <!-- <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="left: -132px !important; ">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                    <ul class = "dropdown-menu shop-list" role = "menu">
                                                            <li ><a href="#" id="change_status" data-store =<?php echo $key->store_id;?> data-status = "1 "> <i class="icon-check"></i> Approve</a></li>
                                                            <li><a href="#" id="change_status2" data-store =<?php echo $key->store_id;?> data-status = "5 "><i class="icon-cross"></i> Cancelled</a></li>
                                                            <li><a href = "#"> <i class="icon-envelope"></i>  Send Notification</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                         --></td>
                                        </tr>
                                    <tr>

                                    <?php } ?>

                                    </tbody>
                                </table>
                                        
                                </div>
                                </div>
                                <!-- /marketing campaigns -->
            
                            </div>  
                        </div>

            <div class="row">
                <div class='col-md-6'>
        
                        <div class="panel panel-flat" style="height: 50vh; overflow-y: scroll; overflow-x: scroll;">
                                <div class="panel-heading">
                                        <h6 class="panel-title text-semibold" style="font-size: 17px;"><i class="icon-cart-add ref social-border"></i>&nbsp;Billing Details</h6>
                                </div>

                                <div class='table-responsive'>
                                    <table class="table table-hover" id="sample_3">
                                                                                            
                                        <thead>
                                            <tr>
                                                <th>Store ID</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Purchase Amount</th>
                                            </tr>
                                        </thead>

                                        <?php foreach ($purchase as $key) { ?>

                                        <tbody>
                                            <tr>
                                                <td><?php echo $key->store_id; ?> </td>
                                                <td><?php echo wordwrap($key->payment_name,15,"<br>\n",TRUE) ? : '' ; ?> </td>
                                                <td><?php echo wordwrap(($key->payment_date." ".$key->payment_time),15,"<br>\n",TRUE) ? : '' ; ?> </td>
                                                <td><?php echo wordwrap($key->points,10,"<br>\n",TRUE) ? : '' ; ?> </td>


                                            </tr>
                                        </tbody>

                                        <?php } ?>
                                    </table>
                                </div>
            
                        </div>
                </div>
                        
                <div class='col-md-6'>
                    <div class="panel panel-flat" style="height: 50vh; overflow-y: scroll; ">
                        <div class="panel-heading">
                            <h6 class="panel-title text-semibold" style="font-size: 17px;"><i class="icon-accessibility2 walk social-border"></i>&nbsp;Walkin Details</h6>
                        </div>
                                

                        <div class="table-responsive">

                                        <table class="table table-hover" id="sample_3">
                                                                                        
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Walkin Date</th>
                                                <th>Walkin Time</th>
                                                <th>Store Name</th>
                                                <th>User Name</th>
                                                <th>Points</th>
                                                <th>Shares</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                        <?php foreach ($total_walkins as $key) { ?>
                                            <tr>
                                                <td><?php echo $key->beacon_activity_id ?></td>

                                                <?php 

                                                    $CI =& get_instance();
                                                    $CI->load->model('adminmodel');

                                                     $user_data = $CI->Supermodel->getUserDatabase($key->user_id);
                                            $store_data = $CI->Supermodel->getStoreDatabase($key->store_id);
                                                    
                                                    $user = $CI->Supermodel->select_data('T_User', $key->user_id);
                                                    $user_point = $CI->Supermodel->getUserWalkinPoints($key->user_id);
                                                    $store = $CI->Supermodel->select_data('T_Store', $key->store_id);
                                                    $twitter = $CI->Supermodel->getTwitterPoints($key->user_id);
                                                    $facebook = $CI->Supermodel->getFacebookPoints($key->user_id);
                                                    
                                                ?>

                                                <td><?php echo $key->detected_date; ?></td>
                                                <td><?php echo $key->detected_time; ?></td>

                                                <!-- <td><?php echo $key->store_id; ?></td>
                                                <td><?php echo $key->user_id; ?></td> -->

                                                <td><?php echo $store_data[0]->store_first_name; ?></td>
                                        <td><?php echo $user_data[0]->name; ?></td>

                                                <td><?php echo $user_point[0]->user_w_points; ?></td>
                                                <td>
                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>
                                                            <ul class = "dropdown-menu share-drop" role = "menu">
                                                            <li class='share-list'> <p href="#"><span class="fb pull-right" style="background: none ! important; color: #3a579a;"><?php if($facebook[0]->facebook_shares){ echo $facebook[0]->facebook_shares ; } else { echo "0"; } ?></span> <i class="icon-facebook fb"></i> Facebook</p></li>
                                                            <li class='share-list'> <p href="#"><span class="twt pull-right" style="background: none ! important; color: #00abf0;"><?php if($twitter[0]->twitter_shares){ echo $twitter[0]->twitter_shares ; } else { echo "0"; } ?></span> <i class="icon-twitter twt "></i> twitter</p></li>
                                                            <li class='share-list'> <p href="#"><span class=" referals pull-right" style="background: none ! important; color: red">0</span> <i class="icon-user referals"></i> Referrals</p></li>
                                                        </ul>
                                                        </li>
                                                    </ul>
                                                </td>
                                                

                                            </tr>
                                        
                                        <?php } ?>
                                        
                                        </tbody>
                                        
                                        </table>
            
                                    </div>
                                </div>
                            

                        </div>      
                        
                                        
                     </div>
                </div>
                            
            
                    </div>
                  </div>
        </body>

        <script type="text/javascript">

            $(document).on("click", "#change_status", function () {
                
                var status = $(this).data('status');
                var store = $(this).data('store');

                $.post("<?php echo base_url(); ?>index.php/superadmin/changeStoreStatus/"+store+"/"+status+"", function(data, status){
                    location.reload();
                });
            });

            $(document).on("click", "#change_status2", function () {
                
                var status = $(this).data('status');
                var store = $(this).data('store');

                $.post("<?php echo base_url(); ?>index.php/superadmin/changeStoreStatus/"+store+"/"+status+"", function(data, status){
                    location.reload();
                });
            });

        </script>

        <script type="text/javascript">

            $(document).on("click", "#change_userstatus", function () {
                
                var status = $(this).data('status');
                var user = $(this).data('user');

                $.post("<?php echo base_url(); ?>index.php/superadmin/changeUserStatus/"+user+"/"+status+"", function(data, status){
                    location.reload();
                });
            });
        </script>

        


        <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Feb 2017 12:34:08 GMT -->
        </html>