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

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/custom.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/ui/ripple.min.js"></script>
        <!-- /theme JS files -->

        <style>
    .script {
    font-family: "Pacifico", "Helvetica Neue", Helvetica, Arial, sans-serif!important;
}
.footer-1 .upper {
    padding: 50px 0;
    color: #f4f5f7!important;
    background-color: #272b31;
}
.footer-1 .upper h4 {
    padding-bottom: 10px;
    padding-top: 25px;
}
.btn-primary {
    color: #f4f5f7;
    background-color: #286a99;
    border-color: #286a99;
}
.list-inline {
    padding-left: 0;
    margin-left: -5px;
    list-style: none;
}
.btn-group-lg > .btn, .btn-lg {
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 6px;
}
.price {
    position: absolute;
    background: #f4f5f7;
    border-radius: 100%;
    height: 80px;
    width: 80px;
    text-align: center;
    top: 154px;
    left: 0;
    right: 0;
    margin: auto;
    box-shadow: 0 0 0 7px rgba(62, 68, 77, 0.2);
}
 .price {
    text-align: center;
    padding-top: 20px;
}

.time{
        font-size: 12px;
    margin-top: 30px;
    position: absolute;
    margin-left: -45px;
    font-weight: bold;
}
 .cashback-tile {
    color: #cd3232;
    text-align: center;
}
.cashback-tile {
    color: #cd3232;
    display: inline-block;
    border: 2px dashed #D8E0E2;
    width: 100%;
    position: relative;
    text-align: center;
    float: left;
    border-radius: 10px;
}
 .cashback-tile .tile-content .offer-small-font {
    display: block;
    font-size: 16px;
    font-weight: bold;
    line-height: 30px;
    text-transform: uppercase;
}
 .cashback-tile .tile-content {
    margin-top: 15px;
    line-height: 35px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    height: 75px;
}
.cashback-tile .tile-content .offer-big-font {
    font-size: 26px;
    white-space: nowrap;
    font-weight: bold;
    display: block;
    text-overflow: ellipsis;
    overflow-x: hidden;
}
.card-content-top {
    display: inline-block;
    margin-left: 0px;
    padding-bottom: 10px;
    width: 100%;
    border-bottom: 1px solid #d9e0e2;
}
.title-meta {
    margin-top: 20px;
    line-height: normal;
    font-size: 13px;
    margin-bottom: 7px;
    vertical-align: middle;
}
.card-content-top .title-meta {
    line-height: normal;
    font-size: 13px;
}
.card-content-top .title-meta .coupon-verification {
    color: #808E99;
    padding-right: 10px;
    vertical-align: top;
}
.card-content-top .title-meta .dot-seperator {
    font-size: 7px;
    color: #d8d8d8;
    padding-right: 10px;
    vertical-align: middle;
}
.card-content-top .title-meta .coupon-num-uses {
    color: #808E99;
    vertical-align: top;
}
.card-content-top .horizontal_online_content {
    float: left;
    margin-top: -5px;
    max-width: 495px;
}
.card-content-top .horizontal_online_content .offer-title {
    font-size: 23px;
    color: #4a4a4a;
    width: 100%;
    font-weight: 500;
    margin-top: 3px;
    overflow: hidden;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -moz-box-orient: vertical;
}
.card-content-top .horizontal_online_content .offer-terms {
    display: inline-block;
    color: #9b9b9b;
    text-decoration: underline;
    cursor: pointer;
}
.card-content-top .get-codebtn-holder {
    float: right;
    display: inline-block;
    text-align: center;
}
.card-content-top .get-codebtn-holder {
    text-align: center;
}
.cpnbtn {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 16px;
    font-weight: bold;
    line-height: 45px;
    position: relative;
    width: 180px;
    height: 45px;
    padding: 0 10px 0 0;
    cursor: pointer;
    text-align: right;
    color: #004f82;;
    border: 1px dashed #004f82;;
    border-radius: 3px;
    background-color: #ffeeee;
}
.cpnbtn::before {
    top: -1px;
    right: 30px;
    transition: transform .3s ease-out;
    backface-visibility: hidden;
}
.cpnbtn::before {
    position: absolute;
    right: 15px;
    width: 30px;
    height: 2px;
    content: '';
    background-color: #004f82;
}
.cpnbtn .p1 {
   position: absolute;
top: 0;
left: 0;
box-sizing: border-box;
width: 130px;
height: 45px;
margin: -1px 0 0 -1px;
padding-left: 10px;
white-space: nowrap;
color: white;
border-radius: 3px 0 0 3px;
background: #004f82;
}
.cpnbtn .p2 {
  position: absolute;
top: 0;
right: 18px;
overflow: hidden;
width: 45px;
height: 100%;
}
.cpnbtn span {
    position: absolute;
    z-index: 2;
    top: 0;
    left: 0;
    display: block;
    width: 120px;
    height: 100%;
    color: #fff;
}
.cpnbtn:hover::after {
    background-color: #004f82;
}
.cpnbtn::after {
    bottom: -1px;
}
.cpnbtn:hover .t1:first-of-type {
    background-color: #004f82;
}
.cpnbtn::before {
    top: -1px;
    right: 30px;
    transition: transform .3s ease-out;
    backface-visibility: hidden;
}
.cpnbtn .t1 {
    position: absolute;
    top: 0;
    overflow: hidden;
    width: 63.64px;
    height: 63.64px;
    transform: translate(-17px, -2px) rotate(-45deg);
    background: #004f82;
}

.cpnbtn:hover .t1 {
    transform: translate(-24px, 6px) rotate(-45deg);
}

.cpnbtn .t1:last-of-type {
    background: none;
    z-index: 3;
}
.cpnbtn:hover .t2 {
    top: 17px;
    right: -14px;
}
.cpnbtn .t2 {
    position: absolute;
    top: 17.5px;
    right: -25px;
    width: 30px;
    height: 30px;
    transform: rotate(45deg);
    background: #74be52;
}
.cpnbtn .t1, .cpnbtn .t2 {
    transition: transform .3s ease-out;
    backface-visibility: hidden;
}
.cpnbtn::after {
    bottom: -1px;
}
.cpnbtn::after, .cpnbtn::before {
    position: absolute;
    right: 15px;
    width: 35px;
    height: 2px;
    content: '';
    background-color: #004f82;;
}
.cpnbtn:hover::before {
    transform: translate(-14px, 0);
    background-color: #004f82;
}

.cpnbtn:hover::before {
    transform: translate(-14px, 0);
    background-color: #004f82;
}
.cpnbtn::before {
    top: -1px;
    right: 30px;
    transition: transform .3s ease-out;
    backface-visibility: hidden;
}
.cpnbtn:hover .p1 {
    background-color: #004f82;
}
</style>

        <style>

            .navbar-brand > img {
                margin-top: -6px;
                height: 45px;
                width: auto;
            }
            .btn-labeled > b {
                position: absolute;
                top: -1px;
                left: -1px;
                background-color: rgba(0,0,0,.15);
                display: block;
                line-height: 1;
                padding: 13.5px;

            }
            .btn-labeled {
                padding-left: 48px;
                padding-right: 20px;
                padding-top: 10px;
                padding-bottom: 10px;
                font-size: 17px;
                font-weight: 500;
            }

            .svg4 {
                width: 26px;
                height: 18px;
            }
            
            svg path{fill: white!important;}
            .card {
                pointer-events: all;
            }
            
            .preview2 {
               
                width: 100%;
                height: 200px;
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

                            <!-- Page header -->
                            <div class="page-header">
                                <div class="page-header-content">

                                


                                    <div class="page-title">
                                        <h4><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">View Coupons</span></h4>

                                        <ul class="breadcrumb position-right">
                                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome">Home</a></li>
                                            <li><a href="">Coupons</a></li>
                                            <li class="active">View Coupons</li>
                                        </ul>
                                    </div>

                                    <!-- <div class="heading-elements">
                                        <a href="<?php echo base_url(); ?>index.php/superadmin/redeemCoupon" class="btn bg-blue btn-labeled heading-btn" style="font-weight: bold;"><b><i class="icon-price-tag"></i></b>Add Coupon</a>
                                    </div> -->
                                    

                                    <div class="heading-elements">
                                        <div class="heading-btn-group">
                                            <a style="font-size: 13px;" href="<?php echo base_url(); ?>index.php/superadmin/redeemCoupon" class="btn bg-blue btn-labeled heading-btn"><b>
                                            <i style="font-size: 13px;" class="icon-price-tag3"></i></b> Add coupons </a>
                                        </div>
                                    </div>


                                    <br>

                                    <div id="hidemenow">
                                        
                                        <?php
                                            if ($this->session->flashdata()) {
                                                echo $this->session->flashdata('all_coupon_message');
                                            }
                                        ?>

                                    </div> 

                                    

                                </div>

                            </div>




                            <!-- /page header -->

<!-- <p style="color: red;"><?php echo $this->session->flashdata('offer_error'); ?><p> -->
                            <!-- Content area -->
                            <div class="content">
                                <!-- <div class="alert alert-success">
                                  Offer is successfully added.
                                </div> -->
                                <!-- Detached content -->
                                <div class="container-detached">
                                    <div class="content-detached">


                                        <!-- Invoice grid -->
                                        <div class="text-center content-group text-muted content-divider">
                                        <span class="pt-10 pb-10">View Coupons</span>
                                        </div>

                                        <?php if(!$couponDetails) { ?>

                                            <div class="alert alert-success" style="text-align: center;">
                                                <strong>No coupons avaliable</strong>
                                            </div>

                                        <?php } ?>

                                        <div class="row" id="removeoffer">
                                            
                                            <?php foreach ($couponDetails as $key) { 

                                                // var_dump($couponDetails);die;
                                                $CI =& get_instance();
                                                $CI->load->model('Supermodel');
                                                $category = $CI->Supermodel->select_data("T_Categorys",array('category_id' => $key->category_id));

                                                $status = $CI->Supermodel->select_data("T_Status",array('status_id' => $key->status));


                                            ?>


                                            

                                            <div class="col-md-4" id="rrrr">


                                                <div class="card comp1">


                                                    <div class="view overlay hm-white-slight">
                                                        <img src="<?php echo base_url(); ?>/uploads/<?php echo $key->coupon_image; ?>" class="img-fluid" style="width:100%; height:200px;" alt="pizza">
                                                        
                                                        <a href="<?php echo base_url(); ?>index.php/superadmin/viewCouponClaims/<?php echo $key->coupon_id; ?>">
                                                            <div class="mask waves-effect waves-light"></div>
                                                        </a>
                                                    </div>

                                                    <div class="card-block">
                                                        <div class="image-text" style=" 
                                                        
                                                        position: absolute;
                                                        margin-top: -214px;
                                                        color: white;
                                                        font-size: x-large;
                                                        background: black;
                                                        padding-right: 0px;
                                                        padding-left: 0px;
                                                        width: 100.2%;
                                                        padding-bottom: 73px;
                                                        padding-top: 128px;
                                                        margin-left: -13px;
                                                        opacity: 0.6;">

                                                        </div>

                                                        <h6 id="imagetitle" style="position: absolute;
                                                        margin-top: -208px;
                                                        color: white;
                                                        text-align: center;"><?php echo wordwrap($key->coupon_title,30,"<br>\n",TRUE) ? : '' ; ?></b></h6>
                                                        
                                                        <a href="#" class="btn label-success" style="
                                                        margin-top: -48px;
                                                        /*border-radius: 22px;*/
                                                        padding: 2px 11px;
                                                        float:right;
                                                        color: white;" >
                                                        <span id="imageex"><?php echo $category[0]->name; ?></span>
                                                        </a>

                                                        <p class="card-text"  id="imagedesc" style="z-index: 22;position: absolute;color: white;margin-top: -115px;font-size: 13px;" > 
                                                        <!-- <?php echo $key->coupon_description;  ?> -->
                                                        <?php echo wordwrap($key->coupon_description,37,"<br>\n",TRUE) ? : '' ; ?>    

                                                        </p>


                                                        <a href="#" class="btn fb" style="width: 90px;margin-top: -50px;
                                                        position: absolute;
                                                        /*border-radius: 22px;*/
                                                        padding: 2px 11px;" ><i class="icon-price-tag3"></i> <span id="imagepoints1"><?php echo $key->coupon_points; ?></span></a>

                                                        <a href="#" class="btn twt" style="width: 90px;margin-top: -50px;
                                                        position: absolute;
                                                        /*border-radius: 22px;*/
                                                        padding: 2px 11px; margin-left:100px;" >Claims <span id="imagepoints2"><?php echo $key->claims ? $key->claims : "0" ?></span></a>

                                                        <!-- <a href="#" class="btn" style="margin-top: -50px;
                                                        position: absolute;
                                                        border-radius: 22px;
                                                        padding: 3px 0px;
                                                        margin-left: 231px;
                                                        height: 26px;
                                                        width: 26px;
                                                        border-color: white;
                                                        border-radius: 50px; 
                                                        " > --> 
                                                        
                                                        <!-- <img src="<?php echo base_url(); ?>assets/images/man-sm.png" class="walkins-icon svg svg4 " style="margin-top: 0px;
                                                        height: 18px;
                                                        color: white; margin-left:0px; 
                                                        "/> </a>  
                                                        
                                                        <span id="imagepoints3" style="position: absolute;
                                                        margin-top: -53px;
                                                        float: left;
                                                        color: white;
                                                        margin-left: 261px;
                                                        font-size: 20px;"><?php echo $key->store_walkin; ?></span> -->


                                                    <!-- <li class="card-text text-left"  style="padding-top: 20px; margin-left: 10px;" id="imageterms">Terms & Condition</li> -->
                                                    </div>

                                                    <ul class="list list-unstyled text-left" style="margin-left: 5px;
                                                    margin-top: -15px;">

                                                        <li class="dropdown">
                                                            Status: &nbsp;


                                                            <?php if($status[0]->status_name == 'Active') {?>

                                                            <a href="#" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> <?php echo $status[0]->status_name; ?> </a>

                                                            <?php } ?>

                                                            <?php if($status[0]->status_name == 'expired') {?>

                                                            <a href="#" style="background-color:red;border-color: #FFFFFF;" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> <?php echo $status[0]->status_name; ?> </a>

                                                            <?php } ?>

                                                            <?php if($status[0]->status_name == 'removed') {?>

                                                            <a href="#" style="background-color:red;border-color: #FFFFFF;" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> <?php echo $status[0]->status_name; ?> </a>

                                                            <?php } ?>



                                                            


                                                            <!-- <ul class="dropdown-menu dropdown-menu-right">
                                                                <li class="selectme"  data-id = "1" data-name = "<?php echo $key->coupon_id; ?>" ><a href="#"><i class="icon-alert"></i> Active </a></li>
                                                                <li class="selectme"  data-id = "2" data-name = "<?php echo $key->coupon_id; ?>"><a href="#"><i class="icon-alarm"></i> Pending</a></li> -->
                                                                
                                                                <!-- <li class="selectme"  data-id = "3" data-name = "<?php echo $key->store_offer_id; ?>"><a href="#"><i class="icon-checkmark3"></i> Paid</a></li>

                                                                <li class="divider"></li>

                                                                <li class="selectme"  data-id = "4" data-name = "<?php echo $key->store_offer_id; ?>"><a href="#"><i class="icon-spinner2 spinner"></i> On hold</a></li>

                                                                <li class="selectme"  data-id = "5" data-name = "<?php echo $key->store_offer_id; ?>"><a href="#"><i class="icon-cross2"></i> Canceled</a></li> -->
                                                            <!-- </ul> -->

                                                            <?php if($status[0]->status_name == 'Active') { ?>

                                                                <a class="text-default" style="margin-left: 10px;font-size: 13px;" href="<?php echo base_url(); ?>index.php/superadmin/editCoupon/<?php echo $key->coupon_id; ?> "><i class="icon-file-plus" style="margin-right: 5px;" ></i> Edit</a>

                                                            <?php } ?>

                                                            <?php if($status[0]->status_name != 'removed') { ?>

                                                                <a class="text-default" data-toggle="modal" data-target="#myModal" style="margin-left: 5px; font-size: 13px;" id="delete-coupon" data-id="<?php echo $key->coupon_id; ?>" ><i class="icon-cross2" style="margin-right: 5px;"></i>Remove</a>

                                                            <?php } ?>

                                                        </li>
                                                    </ul>


                                                </div>

                                                <div class="panel-footer panel-footer-condensed" style="margin-bottom: 25px;">
                                                    <div class="heading-elements">
                                                        <span class="heading-text">
                                                            <span class="status-mark border-danger position-left" style="width: 8px;height: 8px;"></span> Expiry On: <span class="text-semibold"><?php echo $key->coupon_expiry_date; ?></span>
                                                        </span>

                                                        <ul class="list-inline list-inline-condensed heading-text pull-right">
                                                            <li>

                                                            <!-- <a href="#" class="text-default" data-toggle="modal" data-target="#invoice"><i class="icon-eye8"></i></a> -->
                                                            </li>
                                                            <!-- <li class="dropdown">
                                                                <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">


                                                                    <li class="divider"></li>
                                                                    <li><a href="<?php echo base_url(); ?>index.php/control/editOffer/<?php echo $key->store_offer_id; ?>"><i class="icon-file-plus"></i> Edit Offer</a></li>
                                                                    <li><a id="delete-coupon" data-terms="<?php echo $key->offer_term_condition_id; ?>" data-id="<?php echo $key->store_offer_id; ?>" ><i class="icon-cross2"></i> Remove Offer</a></li>
                                                                </ul>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                </div>

                                            
                                            </div>

                                            <?php } ?>
                                            <!-- end of col-md-4 of row -->
                        
                                        </div>



            <!-- <?php foreach ($couponDetails as $key) { 

                                                // var_dump($couponDetails);die;
                                                $CI =& get_instance();
                                                $CI->load->model('Supermodel');
                                                $category = $CI->Supermodel->select_data("T_Categorys",array('category_id' => $key->category_id));
                                            ?>                                    

            <div class="col-md-12">
                            <div class="panel panel-flat">
                                <div class='panel-body'>
                                    <div class='col-md-2'>
                                    <div class="cashback-tile" data-offer-key="storeId" data-offer-value="paytm"><div class="tile-content" data-offer-key="wapHasHigherCashback" data-offer-value=""><span class="offer-big-font" title="">100%</span><span class="offer-small-font">CASHBACK</span></div><a href="/paytm"><div class="tile-logo"> <img src="<?php echo base_url(); ?>uploads/<?php echo $key->coupon_image; ?>" class="img-responsive"></div></a></div>
                                      
                                    </div>
                                    <div class='col-md-10'>
                                       <div class="card-content-top" data-offer-key="mobileCashbackValue" data-offer-value="Rs. "><div class="title-meta" data-offer-key="storeImage" data-offer-value="https://d3pzq99hz695o4.cloudfront.net/sitespecific/in/stores/web/f683f423977eaeeba3f549ade10647f3/paytm-logo-small.jpg?986011"><span class="coupon-verification">Verified 1 hour ago</span><i class="fa fa-circle dot-seperator"></i><span class="coupon-num-uses">510 People Used Today </span></div><div class="horizontal_online_content" data-offer-key="cashbackType" data-offer-value="CASHBACK"><a href="/paytm"><span class="store-name"> Paytm </span></a><a><div class="offer-title offer-get-code-link" data-offer-id="J3naJ3apss" onclick="CD.c.util.logUserAction('offer-click', null, 'J3naJ3apss')" data-popup-id="get-code-modal-tab" data-offer-key="offerTitle" data-offer-value="Win 100% Cashback on Recharge/Bill Payments"> Win 100% Cashback on Recharge/Bill Payments </div></a><div class="offer-terms" onclick="CD.p.offer.TandCclick(&quot;Use Paytm to save on recharges, bill payments, DTH, bus tickets, hotels, movies and marketplace products. No cashback on app transactions. No cashback on postpaid mobile bill payments, electricity bill payments, bus tickets, market place and add money transactions unless it is explicitly mentioned in the offer. No cashback for Airtel users.&quot;);"> T&amp;C </div></div><div class="get-codebtn-holder" data-offer-key="id" data-offer-value="J3naJ3apss"><div class="get-offer-code" data-offer-key="couponCode" data-offer-value="LUCKY7" data-gtm-offer-type="coupon"><div class="offer-get-code-link cpnbtn" onclick="CD.c.util.logUserAction('offer-click', null, 'J3naJ3apss')" data-offer-key="offerGetCodeBtnText" data-offer-value="&amp; GET CODE" data-offer-id="J3naJ3apss"  data-toggle="modal" data-target="#coupon"> KY7 <div class="p1"></div><div class="p2"><div class="t1"></div><div class="t1"><div class="t2"></div></div></div><span>Show Code</span></div></div><div></div></div></div>
                                    </div>

                                    

                              </div>
                          </div>
                      </div>
                <?php } ?> -->


                    </div>
                </div>
            </div>




            <!-- <div class="text-center content-group-lg pt-20">
                <ul class="pagination">
                    <li class="disabled"><a href="#"><i class="icon-arrow-small-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><i class="icon-arrow-small-right"></i></a></li>
                </ul>
            </div> -->
        </div>

    </div>
    
</div>


<!-- /invoice grid -->

<!-- Modal with invoice -->
<div id="invoice" class="modal fade">
    <div class="modal-dialog modal-full">
        <div class="modal-content">


            <div class="col-md-12">
                <div class="panel invoice-grid">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">


                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay preview hm-white-slight">
                                        <img src="<?php echo base_url(); ?>assets/images/pay2.jpg" class="img-fluid" alt="pizza">
                                        <a href="#">
                                            <div class="mask waves-effect waves-light"></div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>                  <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-semibold">40% Off On Buying Two Large Pizzas</h6>
                            <ul class="list list-unstyled">
                                <li>Issue on: <span class="text-semibold">2015/01/25</span></li>
                            </ul>

                        </div>

                        <div class="col-sm-6" style="margin-top: 5px;">
                            <ul class="list list-unstyled text-right">

                                <li class="dropdown">
                                    Status: &nbsp;
                                    <a href="#" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown">Active <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class=""><a href="#"><i class="icon-alert"></i> Active </a></li>
                                        <li><a href="#"><i class="icon-alarm"></i> Pending</a></li>
                                        <li><a href="#"><i class="icon-checkmark3"></i> Paid</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="icon-spinner2 spinner"></i> On hold</a></li>
                                        <li><a href="#"><i class="icon-cross2"></i> Canceled</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-12' style="margin-top: 5px;">

                            <a href="#" class="btn fb" ><i class="icon-facebook"></i></a><span class="essb_counter_right share-padding" id="imagepoints1">40</span>

                            <a href="#" class="btn twt"><i class="icon-twitter"></i></a><span class="essb_counter_right share-padding" id="imagepoints2">50</span>

                            <a href="#" class="btn ref"><i class="icon-user"></i></a> <span class="essb_counter_right share-padding" id="imagepoints3">60</span>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    
    $(document).on("click", ".selectme", function () {
            
        var val = $(this).data('id');
        var id = $(this).data('name');

        $.post("<?php echo base_url(); ?>index.php/superadmin/changeCouponStatus/"+val+"/"+id+"", function(data, status){
            location.reload();
        });    
    });


</script>
        

<!-- modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-left: 8%;">
        <div class="modal-header" style="margin-left: 8%;margin-top:2%;">
          <button type="button" class="close" data-dismiss="modal" style="top: 0%;right: 10px;">&times;</button>
          <h4 class="modal-title">Are you sure you want to remove this coupon?</h4>
        </div>
        <div class="modal-body" style="margin-left: 38%;" >
          
          <p>
            
            <input type="hidden" name="offer_value" value="" id="offers_value">


            <button  class="btn btn-info" value="" style="border-radius:0px !important;background-color: #01a8f6!important;" id="bclick" value="">Yes</button>

            <button  class="btn btn-info" style="border-radius:0px !important; background-color: #01a8f6!important;" onclick="javascript:window.location.href='<?php echo base_url(); ?>index.php/superadmin/viewCoupons'">No</button>

          </p>

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
    </div>
  </div>


   <div class="modal fade modal-center" id="coupon" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-panel">
    <div class="cd-modal-content" >
    <div class="offer-logo">
    <img class="" data-type="img" data-model="storeImage" alt="Paytm" src="https://d3pzq99hz695o4.cloudfront.net/sitespecific/in/stores/web/f683f423977eaeeba3f549ade10647f3/paytm-logo-large.jpg?68392"></div>
    <div class="offer-description">
    <div class="store-name" data-type="html" data-model="storeName">Paytm</div>
    <div class="title" data-type="html" data-model="offerTitle" title="Win 100% Cashback on Recharge/Bill Payments" style="height: auto;">Win 100% Cashback on Recharge/Bill Payments</div></div>
    </div>
    </div>
    <div class="down-arrow"></div>
    <div class="cd-modal-bottom">
    <div class="popup-desc"> Your Coupon Code: </div>
    <div class="popup-code-block"><span class="code-txt" data-type="html" data-model="couponCode">LUCKY7</span>
    <span class="copy-btn" data-type="attribute" data-attr-name="data-clipboard-text" data-model="couponCode" data-clipboard-text="LUCKY7">COPY CODE</span></div>
    </div>
    </div>
    <div class="modal-close">
                        <button type="button" class="btn icon-btn-md icon-btn-round btn-dark lh-0" data-dismiss="modal"><i class="ei ei-close"></i></button>
                    </div>
    </div>
    </div>
    </div>



</body>

<script type="text/javascript">
        
$("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);

    $(document).on("click", "#delete-coupon", function () {
        var id = $(this).data('id');
        
        var values = $('#bclick').val(id);
    });

    
    $(document).on("click", "#bclick", function () {
        var id = $(this).val();

        $.post("<?php echo base_url(); ?>index.php/superadmin/removeCoupon/"+id, function(data, status){
            // alert(data);
              location.reload();
        });
    });     

</script>


</html>
