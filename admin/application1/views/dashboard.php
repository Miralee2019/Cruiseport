<!DOCTYPE html>
<html lang="en">
    <?php $path = TEMP_PATH;
    ?>

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
        @media(min-width:320px) and (max-width:768px){
            .user-border{
                margin-left:60px;

            }
        }
        @media(min-width:320px) and (max-width:1100px){
            .heading-walk, .heading-offer, .heading-purchase, .heading-star{
                margin-top:15px;}
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
            <?php include 'include/sidebar.php' ?>
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content content-margin">


                    <div class="row1">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-md-8">
                                    <h6 class="content-group text-semibold" style="font-size:23px;">
                                        Welcome Store Admin
                                        <small class="display-block"> Dashboard</small>
                                    </h6>           
                                </div> 



                                <!-- <div class="col-md-4" style="margin-top: 18px;"> -->

                                <!-- Today's revenue -->
                                <!-- <div class="panel twitter" style="margin-left: 10px;margin-right: -10px;"> -->
                                <!-- <div class="panel-body padding7"> -->




                                <!-- <div class="col-md-12 col-xs-12"> -->
                                <!-- <div class="div-margin" style="margin-top: 0px;">
                                
                                
                                <div class="col-md-10">
                    
                                        <p class="" style="float:left;font-size: 18px;"><b><?php echo $walk_p[0]->walking_point; ?> &nbsp;Walkin Points</b>
                                        </p>        
                    
                                    
                                </div>
                                    
                                <div class="col-md-2" style="margin-top:-3px;">
                                    <a data-toggle="collapse" data-target="#demo" class="btn bg-blue"><b><i class="icon-plus3" ></i></b></a>
                                </div>
                    
                    
                            </div> -->

                                <!-- <div id="demo" class="collapse" style="margin-top:10px;">
                                
                                <form action="<?php echo base_url(); ?>index.php/control/addWalkingPoint" method="post">
                                    
                                    <div class="col-md-12" style="margin-left:-11px;">
                                        
                                        <div class="col-md-9">
                                            <input type="text" name="walk" value="<?php echo $walk_p[0]->walking_point; ?>" onkeypress="return isNumber(event)" minlength="1" maxlength="3" style="color: blue;">        
                                        </div>    
                
                                        <div class="col-md-3" style="margin-top:-3px;">
                                            <button type="submit" style="background-color: rgba(0,0,0,.1)!important;"  class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-plus3"></i></b> Add</button>        
                                        </div>
                
                                    </div>    
                                    
                                </form>
                            </div> -->

                                <!-- </div>     -->


                                <!-- </div> -->


                                <!-- </div> -->
                                <!-- /today's revenue -->


                                <!-- </div> -->
                                <!-- my end -->

                            </div>
                        </div>



                        <!-- Main charts -->

                        <div class="row1">
                            <!-- Quick stats boxes -->
                            <div class="row">


                                <!-- Members online -->
                                <div class="col-lg-3">

                                    <!-- Today's revenue -->
                                    <div class="panel facebook">
                                        <div class="panel-body padding10">
                                            <div class='col-md-4 col-xs-4'>
                                                <img src="<?php echo base_url(); ?>assets/vdvds.png" style="margin-top:-7px;" >
                                            </div>
                                            <div class='col-md-8 col-xs-8'>

                                                <div class="" style="margin-top: -18px;">
                                                    <p class="no-margin new-walk" style="float:left;" ><b style="font-size:30px;"> <?php if ($total_Walkins[0]->walkin) {
                echo $total_Walkins[0]->walkin;
            } else {
                echo '0';
            } ?> </b></p>
                                                    <p class="heading-walk" style="float:left;">Walkins</p>
                                                </div>
                                                <!--            <div class="text-size-small">$37,578 avg</div> -->
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
                                            <div class="col-md-4 col-xs-4">
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
                                            <div class="col-md-8 col-xs-8">
                                                <div class="" style="margin-top: -18px;">
                                                    <p class="no-margin new-walk" style="float:left;"><b style="font-size:30px;"> <?php echo $offferActives[0]->active; ?> </b></p>
                                                    <p class="heading-offer" style="padding-right: 0px;float:left;">Offers Active</p>
                                                </div>
                                            </div>


                                            <!--            <div class="text-size-small">$37,578 avg</div> -->
                                        </div>

                                        <div id="today-revenue"></div>
                                    </div>
                                    <!-- /today's revenue -->

                                </div>

                                <div class="col-lg-3">

                                    <!-- Today's revenue -->
                                    <div class="panel twitter">
                                        <div class="panel-body padding7">
                                            <div class="col-md-4 col-xs-4">
                                                <i class="fa fa-share-alt" style="
                                                   font-size: 30px;"  aria-hidden="true"></i>
                                            </div>
                                            <div class="col-md-8 col-xs-8">
                                                <div class="div-margin2" style="margin-top: -18px;">
                                                    <p class="no-margin new-walk" style="float:left;" ><b style="font-size:30px;"><?php echo $offerShares[0]->shares; ?></b></p>
                                                    <p class="heading-purchase" style="float:left;">Shares</p>
                                                </div>
                                            </div>


                                            <!--            <div class="text-size-small">$37,578 avg</div> -->
                                        </div>

                                        <div id="today-revenue"></div>
                                    </div>
                                    <!-- /today's revenue -->

                                </div>

                                <div class="col-lg-3">

                                    <!-- Today's revenue -->
                                    <div class="panel offer-back">
                                        <div class="panel-body padding7">
                                            <div class="col-md-4 col-xs-4"><i class=" fa fa-star star star-border"  style="margin-left: 0px;"></i></div>
                                            <div style="margin-top: -16px;margin-left: 0px;" class="col-md-8 col-xs-8">
                                                <p class="no-margin new-walk" style="float:left;"><b style="font-size:30px;"> <?php if ($dash[0]->store_point > 0) {
                echo $dash[0]->store_point;
            } else {
                echo "0";
            } ?> </b></p>
                                                <p class="heading-star" style="margin-right: -10px;padding-right:0px;
                                                   float:left;" >Credit Points</p>
                                            </div>
                                            <!--            <div class="text-size-small">$37,578 avg</div> -->
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
                                    <div class="portlet-title" style="height: 310px;"> 
                                        <div class="caption">
                                            <div class="col-md-4 col-xs-4"><img src='<?php echo base_url(); ?>assets/images/walk-graph.jpg' class="img-circle" style= "margin-top:-15px; width: 50px;
                                                                                height: 50px;"/></div>
                                        </div>
                                        <div class="caption-subject font-dark  uppercase col-md-8 col-xs-8" style="margin-top: -40px;
                                             margin-left: 80px;
                                             font-size: 16px;
                                             font-weight: bold;
                                             text-align: center;">Walkins</div>


                                        <div class="actions">
                                            <div class="btn-group">
                                                <!-- <a href="" class="btn dark btn-outline dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> March
                                                    <span class="fa fa-angle-down" style="margin-left: 20px;"> </span>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>January</li>
                                                    <li>February</li>
                                                    <li>March</li>
                                                    <li>April</li>
                                                    <li>May</li>
                                                    <li>June</li>
                            
                                                </ul> -->
                                            </div>

                <!--  <a href="" class="btn more dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class=' icon-more2 more2' style="margin-top: -14px;"></i></a> -->
                                        </div>
                                        <div class="portlet-body" style="padding-top: 56px;">
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

                                            <div class='col-md-4 col-xs-4'><img src="<?php echo base_url(); ?>assets/images/user.jpg"  class="img-circle" style="margin-top: -15px; width: 50px;
                                                                                height: 50px;"/> </div>
                                            <span class="caption-subject font-dark  uppercase col-md-8 col-xs-8" style="margin-top: -40px;
                                                  margin-left: 80px;
                                                  font-size: 16px;
                                                  font-weight: bold;
                                                  text-align: center;">Real Time</span>
                                        </div>
                                        <div class='portlet-body ' style="padding-top: 48px;">
                                            <div class='user-border text-center' style="margin-top:9px;"><span class='user-count'><?php echo $totalUsers[0]->users; ?></span>
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

                                            <div class="col-md-4 col-xs-4"><img src="<?php echo base_url(); ?>assets/images/offer12.jpg"  class="img-circle" style="margin-top: -15px; width: 50px;
                                                                                height: 50px;"/> </div>
                                            <div class="caption-subject font-dark uppercase col-md-8 col-xs-8" style="margin-top: -40px;
                                                 margin-left: 80px;
                                                 font-size: 16px;
                                                 font-weight: bold;
                                                 text-align: center;">Offers Active</div>
                                        </div>

                                    </div>

                                    <div class="portlet-body" style="height: 80vh; overflow-y: scroll; overflow-x: hidden; ">


                                        <?php foreach ($dashBoardOfferDetails as $key) { ?>

                                            <div class="card comp1" style="margin-left: -5px;">


                                                <div class="view overlay hm-white-slight" >
                                                    <img src="<?php echo base_url(); ?>uploads/<?php echo $key->offer_image ?>" class="img-fluid" alt="pizza" style="background:none; width: 100%; height:150px;">

                                                    <a href="<?php echo base_url(); ?>index.php/control/shareDetails/<?php echo $key->store_offer_id . '/?id=' . 'Active' ?>">
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
                                                         width: 100%;
                                                         padding-bottom: 130px;
                                                         padding-top: 21px;
                                                         margin-left: -12px;
                                                         opacity: 0.6;"  >

                                                    </div>

                                                    <h6 id="imagetitle" style="position: absolute;
                                                        margin-top: -159px;
                                                        color: white;
                                                        text-align: center;"><b><br/><?php echo $key->title; ?></b></h6>
                                                    <a href="#" class="btn label-success" style="margin-top: -159px;
                                                       /*position: absolute;*/
                                                       border-radius: 22px;
                                                       padding: 0px 19px;
                                                       float: right;
                                                       /*margin-left: 355px;*/
                                                       color: white;" ><span id="imageex"><?php echo $key->category_name; ?></span></a>

                                                    <p class="card-text"  id="imagedesc" style="z-index: 22;position: absolute;color: white;margin-top: -100px;font-size: 13px;" ><?php echo $key->description; ?></p>

                                                    <!-- <span class="card-text text-right exp"> Expiry On:-
                                                        <p class="card-text text-left date" ></p></span> -->
                                                    <a href="#" class="btn fb" style="margin-top: -50px;
                                                       position: absolute;
                                                       border-radius: 22px;
                                                       padding: 2px 11px;" ><i class="icon-facebook"></i> <span id="imagepoints1"><?php echo $key->facebook_points; ?></span></a>

                                                    <a href="#" class="btn twt" style="margin-top: -50px;
                                                       position: absolute;
                                                       border-radius: 22px;
                                                       padding: 2px 11px; margin-left: 110px;" ><i class="icon-twitter"></i> <span id="imagepoints2"><?php echo $key->twitter_points; ?></span></a>

                                                    <a href="#" class="btn" style="margin-top: -50px;
                                                       position: absolute;
                                                       border-radius: 22px;
                                                       padding: 3px 0px;
                                                       margin-left: 370px;
                                                       height: 26px;
                                                       width: 26px;
                                                       border-color: white;
                                                       border-radius: 50px; 
                                                       " > <img src="<?php echo base_url(); ?>assets/images/man-sm.png" class="walkins-icon svg svg4 " style="margin-top: 0px;
                                                             height: 18px;
                                                             color: white; margin-left:0px; 
                                                             "/> </a>  <span id="imagepoints3" style="position: absolute;
                                                        margin-top: -53px;
                                                        float: left;
                                                        color: white;
                                                        margin-left: 400px;
                                                                        font-size: 20px;"><?php echo $dash[0]->walking_point; ?></span> 
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

                                        <?php } ?>  

                                        <!-- end card comp -->
                                    </div>
                                    <!-- portlet-body -->



                                </div>
                            </div>




                            <div class="col-lg-6">

                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class='caption'>

                                            <div class="col-md-4 col-xs-4">

                                                <img src="<?php echo base_url(); ?>assets/images/recent.jpg"  class="img-circle" style="margin-top: -15px; width: 50px;
                                                     height: 50px;"/> 

                                            </div>

                                            <div class="caption-subject font-dark  uppercase col-md-8 col-xs-8" style="margin-top: -40px;
                                                 margin-left: 80px;
                                                 font-size: 16px;
                                                 font-weight: bold;
                                                 text-align: center;">Recent Activity</span>
                                            </div>




                                            <div class="portlet-body" >

                                                <div class="col-md-12" style="height: 80vh; overflow-y: scroll; overflow-x: hidden; ">
                                                    <ul class="feeds">

                                                        <?php
                                                        foreach ($store_activity as $key) {

                                                            $CI = & get_instance();
                                                            $CI->load->model('adminmodel');
                                                            $store = $CI->adminmodel->select_data("T_Store", array('store_id' => $key->store_id));
                                                            $offer = $CI->adminmodel->select_data("T_StoreOffer", array('store_offer_id' => $key->store_offer_id));
                                                            $user = $CI->adminmodel->select_data("T_User", array('user_id' => $key->user_id), array('user_id' => 'desc'));

                                                            // echo "<pre>";
                                                            // print_r($store_activity);
                                                            // die();
                                                            ?>  


                                                            <li>
                                                                <div class="col-md-12" style="margin-top: 15px;">

                                                                    <div class="col-md-2" style="margin-top: 7px;">
                                                                        <?php //if($user[0]->profile_image) {  ?>
                                                                        <!-- < ?= $_SERVER['SERVER_NAME']; $_SERVER['HTTP_HOST']; die(); ?> -->
                                                                        <img class="img-circle" src='<?= $path; ?>api/uploads/<?php if (isset($user[0]->profile_image)) {
                                                                                echo $user[0]->profile_image;
                                                                            } else {
                                                                                echo "user_img.png";
                                                                            } ?>' style="width: 40px; height: 40px;" alt="" > 

                                                                            <!-- <img src="http://111.118.246.35/cashrub/cashrub_api/uploads/< ?php echo $user[0]->profile_image;  ?>" class="img-circle" style="width:40px;height:40px;" alt="">--> 
                                                                            <!-- <img class="img-circle" src='http://111.118.246.35/cashrub/cashrub_api/uploads/< ?php if(isset($user[0]->profile_image)) { echo $user[0]->profile_image; } else { echo "user_img.png"; } ?>' style="width: 40px; height: 40px;" alt="" >  -->
                                                                        <?php //}  ?>

                                                                    </div>

                                                                    <div class="col-md-10" style="margin-left: -20px;">

                                                                        <?php if ($key->activity_name == "favorited an offer ") { ?>

                                                                            <?php
                                                                            $name = $offer[0]->title;
                                                                            $nn = "has favorited an offer";
                                                                            ?>

                                                                        <?php } else if ($key->activity_name == "favorited a store ") { ?>

                                                                            <?php
                                                                            $nn = "has added your store as " . "<b>favorite</b>";
                                                                            $msg = $key->activity_name;
                                                                            $name = "";
                                                                            ?>

                                                                        <?php } else if ($key->activity_name == "gave rating to the store") {
                                                                            ?>

                                                                            <?php
                                                                            $nn = "has rated your store";
                                                                            $msg = $key->activity_name;
                                                                            $name = "";
                                                                            ?>

                                                                        <?php } else { ?>

                                                                            <?php
                                                                            $nn = "has shared an offer ";
                                                                            $msg = $key->activity_name;
                                                                            $name = $offer[0]->title;
                                                                            ?>
                                                                            <?php } ?>

                                                                        <div> <?php echo "  " . $user[0]->name . " " . $nn; ?> <b><?php echo "  " . $name . " "; ?></b>  
                                                                        </div>

                                                                        <p> 

                                                                            <?php
                                                                            $r = date('Y-m-d') . " " . date("H:i:s");

                                                                            $datetime1 = new DateTime($key->created_date);
                                                                            $datetime2 = new DateTime($r);
                                                                            $interval = $datetime1->diff($datetime2);
                                                                            echo '<b>' . $interval->format('%h') . " Hours " . $interval->format('%i') . " Minutes ago" . '</b>';
                                                                            ?> </p>

                                                                    </div>

                                                                </div>

                                                            </li>
                                                        <?php } ?>

                                                    </ul>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>


                <script src="<?php echo base_url(); ?>assets/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
                <script src="<?php echo base_url(); ?>assets/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/assets/global/scripts/app.min.js" type="text/javascript"></script>
                <!-- <script src="<?php echo base_url(); ?>assets/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script> -->
                <script src="<?php echo base_url(); ?>assets/assets/pages/scripts/mydash.js" type="text/javascript"></script>

                <script type="text/javascript">

                    function isNumber(evt) {
                        evt = (evt) ? evt : window.event;
                        var charCode = (evt.which) ? evt.which : evt.keyCode;
                        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                            return false;
                        }
                        return true;
                    }

                    // initCharts: function() {
                    function e(e, t, a, i) {
                        $('<div id="tooltip" class="chart-tooltip">' + i + "</div>").css({
                            position: "absolute",
                            display: "none",
                            top: t - 40,
                            left: e - 40,
                            border: "0px solid #ccc",
                            padding: "2px 6px",
                            "background-color": "#fff"
                        }).appendTo("body").fadeIn(200)
                    }
                    if (jQuery.plot) {
                        var t = [
                            ["02/2013", 1500],
                            ["03/2013", 2500],
                            ["04/2013", 1700],
                            ["05/2013", 800],
                            ["06/2013", 1500],
                            ["07/2013", 2350],
                            ["08/2013", 1500],
                            ["09/2013", 1300],
                            ["10/2013", 4600]
                        ];
                        if (0 != $("#site_statistics").size()) {
                            $("#site_statistics_loading").hide(), $("#site_statistics_content").show();
                            var a = ($.plot($("#site_statistics"), [{
                                    data: t,
                                    lines: {
                                        fill: .6,
                                        lineWidth: 0
                                    },
                                    color: ["#f89f9f"]
                                }, {
                                    data: t,
                                    points: {
                                        show: !0,
                                        fill: !0,
                                        radius: 5,
                                        fillColor: "#f89f9f",
                                        lineWidth: 3
                                    },
                                    color: "#fff",
                                    shadowSize: 0
                                }], {
                                xaxis: {
                                    tickLength: 0,
                                    tickDecimals: 0,
                                    mode: "categories",
                                    min: 0,
                                    font: {
                                        lineHeight: 14,
                                        style: "normal",
                                        variant: "small-caps",
                                        color: "#6F7B8A"
                                    }
                                },
                                yaxis: {
                                    ticks: 5,
                                    tickDecimals: 0,
                                    tickColor: "#eee",
                                    font: {
                                        lineHeight: 14,
                                        style: "normal",
                                        variant: "small-caps",
                                        color: "#6F7B8A"
                                    }
                                },
                                grid: {
                                    hoverable: !0,
                                    clickable: !0,
                                    tickColor: "#eee",
                                    borderColor: "#eee",
                                    borderWidth: 1
                                }
                            }), null);
                            $("#site_statistics").bind("plothover", function (t, i, l) {
                                if ($("#x").text(i.x.toFixed(2)), $("#y").text(i.y.toFixed(2)), l) {
                                    if (a != l.dataIndex) {
                                        a = l.dataIndex, $("#tooltip").remove();
                                        l.datapoint[0].toFixed(2), l.datapoint[1].toFixed(2);
                                        e(l.pageX, l.pageY, l.datapoint[0], l.datapoint[1] + " visits")
                                    }
                                } else
                                    $("#tooltip").remove(), a = null
                            })
                        }
                        if (0 != $("#site_activities").size()) {
                            var i = null;
                            $("#site_activities_loading").hide(), $("#site_activities_content").show();


                            <?php
                            $CI = & get_instance();
                            $CI->load->model('adminmodel');

                            $jan = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "1");
                            $feb = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "2");
                            $mar = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "3");
                            $apr = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "4");
                            $may = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "5");
                            $jun = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "6");
                            $jul = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "7");
                            $aug = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "8");
                            $sep = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "9");
                            $oct = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "10");
                            $nov = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "11");
                            $dec = $CI->adminmodel->getStoreWalkinDetailsByMonth($store_id, "12");




                            $jan_stat = $jan[0]->stat_count ? $jan[0]->stat_count : '0';
                            $feb_stat = $feb[0]->stat_count ? $feb[0]->stat_count : '0';
                            $mar_stat = $mar[0]->stat_count ? $mar[0]->stat_count : '0';
                            $apr_stat = $apr[0]->stat_count ? $apr[0]->stat_count : '0';
                            $may_stat = $may[0]->stat_count ? $may[0]->stat_count : '0';
                            $jun_stat = $jun[0]->stat_count ? $jun[0]->stat_count : '0';
                            $jul_stat = $jul[0]->stat_count ? $jul[0]->stat_count : '0';
                            $aug_stat = $aug[0]->stat_count ? $aug[0]->stat_count : '0';
                            $sep_stat = $sep[0]->stat_count ? $sep[0]->stat_count : '0';
                            $oct_stat = $oct[0]->stat_count ? $oct[0]->stat_count : '0';
                            $nov_stat = $nov[0]->stat_count ? $nov[0]->stat_count : '0';
                            $dec_stat = $dec[0]->stat_count ? $dec[0]->stat_count : '0';
                            ?>



                            var l = [
                                ["jan", <?php echo $jan_stat ?>],
                                ["feb", <?php echo $feb_stat ?>],
                                ["mar", <?php echo $mar_stat ?>],
                                ["apr", <?php echo $apr_stat ?>],
                                ["may", <?php echo $may_stat ?>],
                                ["june", <?php echo $jun_stat ?>],
                                ["jul", <?php echo $jul_stat ?>],
                                ["aug", <?php echo $aug_stat ?>],
                                ["sep", <?php echo $sep_stat ?>],
                                ["oct", <?php echo $oct_stat ?>],
                                ["nov", <?php echo $nov_stat ?>],
                                ["dec", <?php echo $dec_stat ?>]

                            ];
                            $.plot($("#site_activities"), [{
                                    data: l,
                                    lines: {
                                        fill: .2,
                                        lineWidth: 0
                                    },
                                    color: ["transparent"]
                                }, {
                                    data: l,
                                    points: {
                                        show: !0,
                                        fill: !0,
                                        radius: 4,
                                        fillColor: "transparent",
                                        lineWidth: 1.5
                                    },
                                    color: "#63bc66",
                                    shadowSize: 1
                                }, {
                                    data: l,
                                    lines: {
                                        show: !0,
                                        fill: !1,
                                        lineWidth: 2.5
                                    },
                                    color: "#63bc66",
                                    shadowSize: 0
                                }], {
                                xaxis: {
                                    tickLength: 0,
                                    tickDecimals: 0,
                                    mode: "categories",
                                    min: 0,
                                    font: {
                                        lineHeight: 18,
                                        style: "normal",
                                        variant: "small-caps",
                                        color: "black"
                                    }
                                },
                                yaxis: {
                                    ticks: 5,
                                    tickDecimals: 0,
                                    tickColor: "#eee",
                                    font: {
                                        lineHeight: 14,
                                        style: "normal",
                                        variant: "small-caps",
                                        color: "transparent"
                                    }
                                },
                                grid: {
                                    hoverable: !0,
                                    clickable: !0,
                                    tickColor: "#eee",
                                    borderColor: "transparent",
                                    borderWidth: 1
                                }
                            });
                            $("#site_activities").bind("plothover", function (t, a, l) {
                                if ($("#x").text(a.x.toFixed(2)), $("#y").text(a.y.toFixed(2)), l && i != l.dataIndex) {
                                    i = l.dataIndex, $("#tooltip").remove();
                                    l.datapoint[0].toFixed(2), l.datapoint[1].toFixed(2);
                                    e(l.pageX, l.pageY, l.datapoint[0], l.datapoint[1] + " walkin")
                                }
                            }), $("#site_activities").bind("mouseleave", function () {
                                $("#tooltip").remove()
                            })
                        }
                    }
                    // }
                </script>       






<!--             <script>
/*                              $('ul li.dropdown').hover(function() {
$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
}, function() {
$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(2000);
});*/

</script>    --> 

                </body>
                </html>