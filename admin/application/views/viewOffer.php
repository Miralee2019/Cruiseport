    <!DOCTYPE html>
    <html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
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
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>        
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/invoice_grid.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>
        <!-- /theme JS files -->
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

        <?php include 'include/header.php'; ?>

        <!-- /main navbar -->


        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main sidebar -->
                    <?php include 'include/sidebar.php'; ?>             
                <!-- /main sidebar -->


                        <!-- Main content -->
                        <div class="content-wrapper">

                            <!-- Page header -->
                            <div class="page-header">
                                <div class="page-header-content">

                                


                                    <div class="page-title">
                                        <h4><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">View Offers</span></h4>

                                        <ul class="breadcrumb position-right">
                                            <li><a href="<?php echo base_url(); ?>index.php/control/home">Home</a></li>
                                            <li><a href="">Offers</a></li>
                                            <li class="active">View Offers</li>
                                        </ul>
                                    </div>

                                    <div class="heading-elements">
                                        <a href="<?php echo base_url(); ?>index.php/control/addOffer" class="btn bg-blue btn-labeled heading-btn" style="font-weight: bold;"><b><i class="icon-price-tag"></i></b> Add Offers</a>
                                        <!-- <a href="#" class="btn btn-default btn-icon heading-btn"><i class="icon-gear"></i></a> -->

                                    </div>
                                    
                                    <br>

                                    <div id="hidemenow">
                                        
                                        <?php
                                            if ($this->session->flashdata()) {
                                                echo $this->session->flashdata('message');
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
<div class="row">
    <div class="col-md-12">
     <div class="col-lg-4">

                                    <!-- Today's revenue -->
                                    <div class="panel twitter">
                                        <div class="panel-body padding7">
                                            <div class="col-md-4 col-xs-4">
                                          <i class="fa fa-shekel" style="font-size:42px"></i>
                                            </div>
                                            <div class="col-md-8 col-xs-8">
                                                <div class="div-margin2" style="margin-top: -18px;">
                                                    <p class="no-margin new-walk" style="float:left;" ><b style="font-size:30px;"><?php echo $details[0]->store_point; ?></b></p>
                                                    <p class="heading-purchase" style="float:left;">Total Store Rubs</p>
                                                </div>
                                            </div>


                                            <!--            <div class="text-size-small">$37,578 avg</div> -->
                                        </div>

                                        <div id="today-revenue"></div>
                                    </div>
                                    <!-- /today's revenue -->

                                </div>
                                     <div class="col-lg-4">

                                    <!-- Today's revenue -->
                                    <div class="panel twitter">
                                        <div class="panel-body padding7">
                                            <div class="col-md-4 col-xs-4">
                                           <!--      <i class="fa fa-share-alt" style="
                                                   font-size: 30px;"  aria-hidden="true"></i> -->
                                                       <i class="fa fa-shekel" style="font-size:42px"></i>
                                            </div>
                                            <div class="col-md-8 col-xs-8">
                                                <div class="div-margin2" style="margin-top: -18px;">
                                                    <p class="no-margin new-walk" style="float:left;" ><b style="font-size:30px;"><?php if(!empty($allOfferCount->total)){ echo $allOfferCount->total; }else{ echo "0"; } ?></b></p>
                                                    <p class="heading-purchase" style="float:left;">Allocated Rubs</p>
                                                </div>
                                            </div>


                                            <!--            <div class="text-size-small">$37,578 avg</div> -->
                                        </div>

                                        <div id="today-revenue"></div>
                                    </div>
                                    <!-- /today's revenue -->

                                </div>
                                     <div class="col-lg-4">

                                    <!-- Today's revenue -->
                                    <div class="panel twitter">
                                        <div class="panel-body padding7">
                                            <div class="col-md-4 col-xs-4">
                                              <!--   <i class="fa fa-share-alt" style="
                                                   font-size: 30px;"  aria-hidden="true"></i> -->
                                                     <i class="fa fa-shekel" style="font-size:42px"></i>
                                            </div>
                                            <div class="col-md-8 col-xs-8">
                                                <div class="div-margin2" style="margin-top: -18px;">
                                                    <p class="no-margin new-walk" style="float:left;" ><b style="font-size:30px;"><?php echo ($details[0]->store_point - $allOfferCount->total); ?></b></p>
                                                    <p class="heading-purchase" style="float:left;">Available Rubs</p>
                                                </div>
                                            </div>


                                            <!--            <div class="text-size-small">$37,578 avg</div> -->
                                        </div>

                                        <div id="today-revenue"></div>
                                    </div>
                                    <!-- /today's revenue -->

                                </div>
    </div>
</div>

                                        <!-- Invoice grid -->
                                        <div class="text-center content-group text-muted content-divider">
                                        <span class="pt-10 pb-10">View Offers</span>
                                        

                                        </div>
<div class="row">
    <div class="col-md-4 pull-right" style="margin-bottom: 3%;">
    <select class="form-control" id="offers" style="border-radius: 0px !important">
        <option>All</option>
        <option selected="">Active</option>
        <option>Expired</option>
        <option>Disabled</option>
         <option>Rejected</option>
    </select>
</div>
</div>
                                        <!-- <a onclick="location.reload();"  data-action="reload"><i style="font-size: 20px;float: right;" class="fa fa-refresh"></i> </a> -->

                                        <?php
                                            if ($this->session->flashdata()) {
                                                echo $this->session->flashdata('nooffer');
                                            }
                                        ?>
                                        






                                        <div class="row" id="removeoffer">
                                            
                                            <?php foreach ($offerDetails as $key) { ?>
                                            

                                            <div class="col-md-4 rrrr" id="rrrr">


                                                <div class="card comp1">


                                                    <div class="view overlay hm-white-slight">
                                                        <?php $has_link = strstr($key->offer_image, 'http://');
                                                  //      print_r($has_link);
                                                           if(!$has_link){ 
                                                         ?>
                                                        <img src="<?php echo base_url(); ?>uploads/<?php echo $key->offer_image; ?>" class="img-fluid" style="width:100%; height:200px;" alt="pizza">
                                                    <?php }else{ ?>
                                                            <img src="<?php echo $key->offer_image; ?>" class="img-fluid" style="width:100%; height:200px;" alt="pizza">
                                                    <?php } ?>
                                                             <?php $active1=$key->status_name; ?>
                                                      <?php if($key->status_name == 'Active') {?>
                                                      <?php $active1=$key->status_name; ?>
                                                                <a href="<?php echo base_url();?>index.php/control/shareDetails/<?php echo $key->store_offer_id.'/?id='.$active1; ?>"> 
                                                            <div class="mask waves-effect waves-light"></div>
                                                                 </a>

                                                            <?php } else{ ?>
                                                    <a href="<?php echo base_url();?>index.php/control/shareDetails/<?php echo $key->store_offer_id?>">
                                                            <div class="mask waves-effect waves-light"></div>
                                                        </a>
                                                        <?php } ?>
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
                                                        text-align: center;"><?php echo $key->title; ?></b></h6>
                                                        
                                                        <a href="#" class="btn label-success" style="margin-top: -47px;
                                                        
                                                        border-radius: 22px;
                                                        padding: 0px 9px;
                                                        margin-right: -10px;
                                                        float:right;
                                                        color: white;" >
                                                        <span id="imageex"><?php echo $key->category_name; ?></span>
                                                        </a>

                                                        <p class="card-text"  id="imagedesc" style="z-index: 22;position: absolute;color: white;margin-top: -119px;font-size: 13px;" >     <?php echo wordwrap($key->description,49,"<br>\n",TRUE) ? : '' ; ?>   </p>

                                                        <!-- <span class="card-text text-right exp"> Expiry On:-
                                                        <p class="card-text text-left date" ></p></span> -->
<?php foreach($offerDetails as $offerid)
{  
    
    if($offerid->store_offer_id==$key->store_offer_id)
        { 
    
        $store_id=$this->session->userdata('store_id');
        $offer_id=$offerid->store_offer_id;
        
        $maxpoint = $CI->adminmodel->getmaxpoint($store_id,$offer_id);
        $shared_points = $this->Adminmodel->select_data('T_SocialSharePoint', array('store_id'=>$store_id,'store_offer_id'=>$offer_id));
        $store_point = $this->Adminmodel->select_data('T_Store', array('store_id'=> $store_id)); 
        
        }



    }  
    // echo "<pre>";
    // print_r($shared_points);
    // echo "</pre>";
    // exit;
    
        //echo $totalpoints; 
    foreach ($store_point as $store_point) {
        $totalstorepoint = $store_point->store_point;
    }

    if($totalstorepoint>0) 
    {  
        $totalpoints=0;
      foreach ($shared_points as $tsumpoints) {
        
          if($tsumpoints->store_offer_id==$offer_id){
            $totalpoints = $totalpoints+$tsumpoints->points;
        }
 
        }  

        $allp=$maxpoint[0]->maximum_point;
          $remainpoint =$allp - $totalpoints;
    
      


                ?>                                               
        <a href="#" class="btn fb" style="margin-top: -50px;
        position: absolute;
        border-radius: 22px;
        margin-left: -9px;

        padding: 2px 11px;" ><i class="icon-facebook"></i> <span id="imagepoints1"><?php echo $key->facebook_points; ?></span></a>

        <a href="#" class="btn twt" style="margin-top: -50px;
        position: absolute;
        border-radius: 22px;
        margin-left: 67px;

        padding: 2px 11px; margin-left:67px;" ><i class="icon-twitter"></i> <span id="imagepoints2"><?php echo $key->twitter_points; ?></span></a>
        <a href="#" class="btn" style="margin-top: -47px;
        position: absolute;
        border-radius: 22px;
        padding: 3px 0px;
        margin-left: 144px;
        height: 23px;
        width: 23px;
        border-color: white;
        border-radius: 50px; 
        " > 

        <img src="<?php echo base_url(); ?>assets/images/man-sm.png" class="walkins-icon svg svg4 " style="margin-top: 0px;
        height: 18px;
        color: white; margin-left:0px; 
        "/> </a>  

        <span id="imagepoints3" style="position: absolute;
        margin-top: -48px;
        float: left;
        color: white;
        margin-left: 169px;
        font-size: 15px;"><?php echo $key->store_walkin; ?></span>


                                                    <!-- <li class="card-text text-left"  style="padding-top: 20px; margin-left: 10px;" id="imageterms">Terms & Condition</li> -->
    </div>

    <ul class="list list-unstyled text-left" style="margin-left: 5px;
    margin-top: -15px;">

        <li class="dropdown">
            Status: &nbsp;
            <?php if($remainpoint > 0) { ?>

            
            <?php if($key->status_name == 'Active') {?>
                <a href="#" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> <?php echo $key->status_name; ?> </a>
            <?php } ?>

            <?php if($key->status_name == 'Pending') {?>
                <a href="#" style="background-color:orange;border-color: #FFFFFF;" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> <?php echo $key->status_name; ?> </a>
            <?php } ?>
            
            <?php if($key->status_name == 'reject') {?>
                <a href="#" style="background-color:red;border-color: #FFFFFF;" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> <?php echo "Rejected"; ?> </a>
            <?php } ?>

            <?php if($key->status_name == 'expired') {?>
                <a href="#" style="background-color:red;border-color: #FFFFFF;" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> <?php echo $key->status_name; ?></a>
            <?php } ?>

            
            <?php if($key->status_name != 'expired' && $key->status_name != 'Pending' && $key->status_name != 'reject' && $key->status_name != 'Active') { ?>

            <ul class="dropdown-menu dropdown-menu-right">
                <li class="selectme" data-id = "1" data-name = "<?php echo $key->store_offer_id; ?>" ><a href="#"><i class="icon-alert"></i> Approve </a></li>
                <li class="selectme" data-id = "2" data-name = "<?php echo $key->store_offer_id; ?>"><a href="#"><i class="icon-alarm"></i> Pending</a></li>
                <li class="selectme" data-id = "8" data-name = "<?php echo $key->store_offer_id; ?>"><a href="#"><i class="icon-cross2"></i> Rejected</a></li>
            </ul>

            <?php } ?>



            <?php if($key->status_name != 'expired'  &&  $key->status_name != 'Pending' && $key->status_name != 'reject' ) { ?>

            <a class="text-default" style="margin-left: 10px;font-size: 13px;" href="<?php echo base_url(); ?>index.php/control/editOffer/<?php echo $key->store_offer_id; ?>"><i class="icon-file-plus" style="margin-right: 5px;" ></i> Edit Offer</a>

            <?php } ?>

            <a class="text-default" data-toggle="modal" data-target="#myModal" style="margin-left: 5px; font-size: 13px;" id="delete-offer" data-terms="<?php echo $key->offer_term_condition_id; ?>" data-id="<?php echo $key->store_offer_id; ?>" ><i class="icon-cross2" style="margin-right: 5px;"></i> Remove Offer</a>
            <?php  } 
            else{ ?>

               <button href="#" style="background-color:#747987;border-color: #FFFFFF;" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> Disabled </button>
                <a class="text-default" style="margin-left: 10px;font-size: 13px;" href="<?php echo base_url(); ?>index.php/control/editOffer/<?php echo $key->store_offer_id; ?>"><i class="icon-file-plus" style="margin-right: 5px;" ></i> Edit Offer</a>
                <a class="text-default" data-toggle="modal" data-target="#myModal" style="margin-left: 5px; font-size: 13px;" id="delete-offer" data-terms="<?php echo $key->offer_term_condition_id; ?>" data-id="<?php echo $key->store_offer_id; ?>" ><i class="icon-cross2" style="margin-right: 5px;"></i> Remove Offer</a>

            <?php }?>

        </li>
    </ul>
                                             
    <?php } 
    else
    { ?>
         <a href="#" class="btn fb" style="margin-top: -50px;
        position: absolute;
        border-radius: 22px;
        margin-left: -9px;
        
        padding: 2px 11px;" ><i class="icon-facebook"></i> <span id="imagepoints1"><?php echo $key->facebook_points; ?></span></a>

        <a href="#" class="btn twt" style="margin-top: -50px;
        position: absolute;
        border-radius: 22px;
        margin-left: 67px;
        
        padding: 2px 11px; margin-left:67px;" ><i class="icon-twitter"></i> <span id="imagepoints2"><?php echo $key->twitter_points; ?></span></a>
        <a href="#" class="btn" style="margin-top: -47px;
        position: absolute;
        border-radius: 22px;
        padding: 3px 0px;
        margin-left: 144px;
        height: 23px;
        width: 23px;
        border-color: white;
        border-radius: 50px; 
        " > 
      
        <img src="<?php echo base_url(); ?>assets/images/man-sm.png" class="walkins-icon svg svg4 " style="margin-top: 0px;
        height: 18px;
        color: white; margin-left:0px; 
        "/> </a>  
        
        <span id="imagepoints3" style="position: absolute;
        margin-top: -48px;
        float: left;
        color: white;
        margin-left: 169px;
        font-size: 15px;"><?php echo $key->store_walkin; ?></span>


    <!-- <li class="card-text text-left"  style="padding-top: 20px; margin-left: 10px;" id="imageterms">Terms & Condition</li> -->
    </div>

    <ul class="list list-unstyled text-left" style="margin-left: 5px;
    margin-top: -15px;">

        <li class="dropdown">
            Status: &nbsp;
            <?php //if($maxpoint[0]->maximum_point>$key->twitter_points+$key->facebook_points) { ?>
            <?php if($key->status_name == 'Active') {?>
                <a href="#" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown" style="background-color: #101010;
    border-color: #101010;"> Disabled </a>
            <?php } ?>

            <?php if($key->status_name == 'Pending') {?>
                <a href="#" style="background-color:orange;border-color: #FFFFFF;" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> <?php echo $key->status_name; ?> </a>
            <?php } ?>
            
            <?php if($key->status_name == 'reject') {?>
                <a href="#" style="background-color:red;border-color: #FFFFFF;" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> <?php echo "Rejected"; ?> </a>
            <?php } ?>

            <?php if($key->status_name == 'expired') {?>
                <a href="#" style="background-color:red;border-color: #FFFFFF;" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> <?php echo $key->status_name; ?></a>
            <?php } ?>

            
            <?php if($key->status_name != 'expired' && $key->status_name != 'Pending' && $key->status_name != 'reject' && $key->status_name != 'Active') { ?>

            <ul class="dropdown-menu dropdown-menu-right">
                <li class="selectme" data-id = "1" data-name = "<?php echo $key->store_offer_id; ?>" ><a href="#"><i class="icon-alert"></i> Approve </a></li>
                <li class="selectme" data-id = "2" data-name = "<?php echo $key->store_offer_id; ?>"><a href="#"><i class="icon-alarm"></i> Pending</a></li>
                <li class="selectme" data-id = "8" data-name = "<?php echo $key->store_offer_id; ?>"><a href="#"><i class="icon-cross2"></i> Rejected</a></li>
            </ul>

            <?php } ?>



            <?php if($key->status_name != 'expired'  &&  $key->status_name != 'Pending' && $key->status_name != 'reject' ) { ?>

            <a class="text-default" style="margin-left: 10px;font-size: 13px;" href="<?php echo base_url(); ?>index.php/control/editOffer/<?php echo $key->store_offer_id; ?>"><i class="icon-file-plus" style="margin-right: 5px;" ></i> Edit Offer</a>

            <?php } ?>

            <a class="text-default" data-toggle="modal" data-target="#myModal" style="margin-left: 5px; font-size: 13px;" id="delete-offer" data-terms="<?php echo $key->offer_term_condition_id; ?>" data-id="<?php echo $key->store_offer_id; ?>" ><i class="icon-cross2" style="margin-right: 5px;"></i> Remove Offer</a>
            <?php // } 
            //else{ ?>

               <!--  <button href="#" style="background-color:#747987;border-color: #FFFFFF;" class="label bg-success-400 dropdown-toggle" data-toggle="dropdown"> Disabled </button>
                <a class="text-default" style="margin-left: 10px;font-size: 13px;" href="<?php echo base_url(); ?>index.php/control/editOffer/<?php echo $key->store_offer_id; ?>"><i class="icon-file-plus" style="margin-right: 5px;" ></i> Edit Offer</a>
                <a class="text-default" data-toggle="modal" data-target="#myModal" style="margin-left: 5px; font-size: 13px;" id="delete-offer" data-terms="<?php echo $key->offer_term_condition_id; ?>" data-id="<?php echo $key->store_offer_id; ?>" ><i class="icon-cross2" style="margin-right: 5px;"></i> Remove Offer</a>
-->
            <?php //}?>

        </li>
    </ul>                                               
   <?php  } 
    ?>
                                                         

                                                </div>

                                                <div class="panel-footer panel-footer-condensed" style="margin-bottom: 25px;">
                                                    <div class="heading-elements">
                                                        <span class="heading-text">
                                                            <span class="status-mark border-danger position-left" style="width: 8px;height: 8px;"></span> Valid Till: <span class="text-semibold"><?php echo $key->expiry_date; ?></span>
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
                                                                    <li><a id="delete-offer" data-terms="<?php echo $key->offer_term_condition_id; ?>" data-id="<?php echo $key->store_offer_id; ?>" ><i class="icon-cross2"></i> Remove Offer</a></li>
                                                                </ul>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                </div>

                                            
                                            </div>

                                            <?php } ?>
                                            <!-- end of col-md-4 of row -->
                        
                                        </div>


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

// $(document).on('click','#delete-offer',function(){

//          if (confirm("Are you sure you want to delete this Offer ?") == false) {
//                                  return;
//                              }
//            alert("Offer Deleted");
//             $(this).closest('#rrrr').remove();
//           });

    // $(document).on("click", "#delete-offer", function () {

    //      var store_offer_id = $(this).data('id');
    //      var data_terms = $(this).data('terms');
            
    //      $.post("<?php echo base_url(); ?>index.php/control/removeOffer/"+store_offer_id+"/"+data_terms, function(data, status){
    //         });
      

    //  }); 
</script>

<script type="text/javascript">
    
    $(document).on("click", ".selectme", function () {
            

            var val = $(this).data('id');
            var id = $(this).data('name');

            // alert(val);
            // alert(id);

    //           var user = $(this).data('user');
   //           var name = $(this).data('name');

   //           $(".modal-body #selectedValue").val( myBookId );
      //        $(".modal-body #userId").val( user );
         //     $("#sname").text(name+"\'s notification");
         
            $.post("<?php echo base_url(); ?>index.php/control/changeStatus/"+val+"/"+id+"", function(data, status){
            

            location.reload();
                // alert(data);

      //       $(".modal-body #selectedValue").val( myBookId );
   //          $(".modal-body #userId").val( user );
      //        $("#sname").text(name+"\'s notification");

      //       $(".modal-body #changedate1").val( data.split('|')[3]  );
      //       $(".modal-body #changedate2").val( data.split('|')[4]  );
      //       $(".modal-body #changemsg").val( data.split('|')[2]  );
                
      //       var all = data.split('|')[2].length 
   //           var text_max = 120;
            // $('#count_message').html(text_max-all + '/' + text_max);

            // $('#changemsg').keyup(function() {
            //   var text_length = $('#changemsg').val().length;
            //   var text_remaining = text_max - text_length;
              
            // $('#count_message').html(text_remaining + '/' +text_max);
            
            });    
      //           // alert(data.split('|')[1]);

      //           // alert("Data: " + data + "\nStatus: " + status);

      //       });
    });


</script>
        

<!-- modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-left: 10%;">
        <div class="modal-header" style="margin-left: 15%;margin-top:2%;">
          <button type="button" class="close" data-dismiss="modal" style="top: 0%;right: 10px;">&times;</button>
          <h4 class="modal-title">Are you sure you want to delete this offer?</h4>
        </div>
        <div class="modal-body" style="margin-left: 38%;" >
          
          <p>
            <input type="hidden" name="terms_value" value="" id="terms_value">
            <input type="hidden" name="offer_value" value="" id="offers_value">


            <button  class="btn btn-info" value="" style="border-radius:0px !important;background-color: #01a8f6!important;" id="bclick" value="">Yes</button>

            <button  class="btn btn-info" style="border-radius:0px !important; background-color: #01a8f6!important;" onclick="javascript:window.location.href='<?php echo base_url(); ?>index.php/control/viewOffer'">No</button>

          </p>

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
    </div>
  </div>


</body>

<script type="text/javascript">
    $(document).ready(function(){
        console.log("in each");

        $(".rrrr").each(function(){
            var a=$(this).find(".bg-success-400").text().trim();
            console.log(a);
if(a=="Active")
{
    $(this).css('display','block');
}else{
   $(this).css('display','none');   
}

    });
        });
    $("#offers").change(function(){
        if($(this).val()=="Active")
           {
              $(".rrrr").each(function(){
            var a=$(this).find(".bg-success-400").text().trim();
            console.log(a);
if(a=="Active")
{
    $(this).css('display','block');
}else{
   $(this).css('display','none');   
}

    });

           }else if($(this).val()=="Disabled")
           {
             $(".rrrr").each(function(){
            var a=$(this).find(".bg-success-400").text().trim();
            console.log(a);
if(a=="Disabled")
{
    $(this).css('display','block');
}else{
   $(this).css('display','none');   
}

    });

           }else if($(this).val()=="Expired")
           {
              $(".rrrr").each(function(){
            var a=$(this).find(".bg-success-400").text().trim();
            console.log(a);
if(a=="expired")
{
    $(this).css('display','block');
}else{
   $(this).css('display','none');   
}

    });

           }else if($(this).val()=="Rejected")
           {
              $(".rrrr").each(function(){
            var a=$(this).find(".bg-success-400").text().trim();
            console.log(a);
if(a=="Rejected")
{
    $(this).css('display','block');
}else{
   $(this).css('display','none');   
}

    });

           }else if($(this).val()=="All") 
           {
                $(".rrrr").each(function(){

    $(this).css('display','block');

    });
           }

    });
        
$("#hidemenow").delay(3000).fadeIn(300).delay(1000).fadeOut(300);

    $(document).on("click", "#delete-offer", function () {
        var terms = $(this).data('terms');
        var id = $(this).data('id');
        
        var values = $('#bclick').val(id);
    });

    
    $(document).on("click", "#bclick", function () {
        var id = $(this).val();
        // alert(id);

        $.post("<?php echo base_url(); ?>index.php/control/removeOfferNew/"+id, function(data, status){
            // alert(data);
              location.reload();
         

        });


        // $.post("<?php echo base_url(); ?>index.php/control/deleteBeacon/"+beacons, function(data, status){
        //   location.reload();
     //    });

    });     

</script>


</html>
