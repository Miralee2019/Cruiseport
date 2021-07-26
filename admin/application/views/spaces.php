<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/components_thumbnails.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Feb 2017 05:37:07 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cannon Design</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="<?php echo base_url() ?>/assets_c/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/ques.css" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- other -->

        <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom1.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>        

        <!-- end -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/media/fancybox.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/pages/components_thumbnails.js"></script>

        <!-- /theme JS files -->
        <style>
            .panel-body {
                padding: 10px;
            }
            .alert, .thumbnail {
                margin-bottom: 5px;
            }


        </style>
    </head>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
           <script>
    $(document).ready(function(){
        $('.copy_questionary').on('click', function() {
        alert();    
    
        var questionary_id = $(this).attr("id");
        alert(questionary_id);
          var data ='' ;
            $.ajax({
            type: "POST",
            url:"<?php echo site_url('main/copy_questionary'); ?>",
            data:{"questionary_id":questionary_id},
            success: function(data){
    //        alert(data);            
                if(data == 'yes'){
    //            alert(data);    
                    $("#msg").html('<div class="alert alert-success">Job code enabled successfully.<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
                } 
                else{
    //             alert(data);
                    $("#msg").html('<div class="alert alert-success">Job code disabled successfully.<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
    
            }    
            }
    //          alert(data);
    //   
        });
        
    });
    });
    </script>-->

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
                    <!--				<div class="page-header">
                                                            <div class="page-header-content">
                                                                    <div class="page-title">
                                                                            <h6><span class="text-semibold">Dashboard</span></h6>
                                                                    </div>
                    
                                                                    <div class="heading-elements">
                                                                            <div>
                                                                        <ul class="breadcrumb">
                                       <li><a href="#"><i class="icon-home2 position-left"></i> Manage Questionnaire</a></li>
                                                                      </ul>
                    
                                                            </div>
                                                            </div>
                                                            </div>
                    
                                                            
                                                    </div>-->
                    <!-- /page header -->
                    
                        

                    <div class="page-header">

                        


                        <div class="page-header-content">
                            <div class="page-title">

                            <?php if ($this->session->flashdata('message')) { ?>
                            <div class="alert alert-success" id="flash">      
                                <?php echo $this->session->flashdata('message') ?>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                        <?php } ?>

                            </div>
                        </div>


                        <div class="breadcrumb-line breadcrumb-line-component">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo site_url('control/spaces'); ?>"><i class="icon-home2 position-left"></i> Manage Stores</a></li>
                                <!-- <li class='active'>Dashboard</li>  -->
                                <li class='active'>View Stores</li>

                            </ul>
                        


                        </div>

                    </div>
                    <div class="col-md-12 text text-center">  

                        
                    
                        <?php if ($this->session->flashdata('message_error')) { ?>
                            <div class="alert alert-danger" id="flash">      
                                <?php echo $this->session->flashdata('message_error') ?>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>       
                            </div>
                        <?php } ?>
                        <!-- Content area -->
                    </div>
                    <div class="content">

                        <!-- Basic thumbnails -->
                        <div style="display: inline;">

                            <h4 class="content-group text-semibold">
                                View Stores

                                <!-- <span style="background: white; margin-left: 20px; font-size: 15px;">Sort by
                                    <select id="sortcontent" style="clear: both; background: white; outline:0;">
                                        <option value="">Select</option>
                                        <option value="name">Name</option>
                                        <option value="date">Date Modified</option>
                                    </select>
                                </span> --> 
                            </h4>

                        </div>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="panel panel-flat" style="border-style: dashed; border-width: 2px; min-height: 273px;">
                                    <div class="panel-body" style="margin-bottom: 78px;">

                                        <div class="thumb">
                                            <div class='new-ques'><a href="<?php echo site_url('control/add_spaces'); ?>"> <i class=" icon-plus2  btn bg-warning-300 btn-icon" style="font-size:40px; color:white;"></i><p style='color:#00B09C; font-size: 17px;margin-top: 52px;'> <b>Manage Store</b></p></a>
                                            </div>
                                            <!-- <div class="caption-overflow caption-zoom" style="height: 160%;">
                                                    <span>
                                                            <a href="add_question.html" class="btn bg-warning-300 btn-icon" data-popup="lightbox" title="Add" style="margin-top: -65px;"><i class="icon-plus2" ></i></a>
                                                            
                                                    </span>
                                            </div> -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                            foreach ($space_data as $space) {
                                $space_point = $space->space_point;
//                                                       var_dump($question);     
                                $space_point_count = count($space_point);
                                ?>

                                <div class="col-md-3">
                                    <div class="panel panel-flat" style="max-height: 273px !important; min-height: 273px;">
                                        <div class="panel-body" style="max-height: 273px !important; min-height: 273px;">

                                            <div class="thumbnail">
                                                <div class="thumb">
                                                    <?php if ($space->space_image) { ?>
                                                        <img src="<?php echo base_url('uploads/'.$space->space_image); ?>" alt=""  >
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url() ?>/assets_c/images/beacon_new12.png" alt="">
                                                    <?php } ?>

                                                    <div class="caption-overflow caption-zoom">
                                                        <span>
                                                       <!--<a href="#" class="btn bg-warning-300 btn-icon" data-popup="lightbox" title="Add"><i class="icon-plus2"></i></a>-->

                                                            <a href="<?php echo site_url('control/assign_beacon/'.$space->space_id); ?>" class="btn bg-warning-300 btn-icon" title="Place Beacon"><i class="fa fa-bluetooth"></i></a>
                                                            <a href="<?php echo site_url('control/edit_space/'.$space->space_id); ?>" class="btn bg-warning-300 btn-icon" title="Edit"><i class="icon-pencil"></i></a>
                                                            
                                                            <a href="<?php echo site_url('control/delete_space/'.$space->space_id); ?>"  onclick="return confirm('Are you sure you want to delete this space?');" class="btn bg-warning-300 btn-icon" title="Delete"><i class="icon-trash"></i></a>
                                                      <!--<a href="<?php echo site_url('main/copy_questionary/' . $space->space_id); ?>"  onclick="return confirm('Are you sure you want to create duplicate of this Questionnaire?');" class="btn bg-warning-300 btn-icon" title="Duplicate"><i class="icon-stack-plus"></i></a>-->

                                                                      <!--<a  id="<?= $questionary->id ?>" class="btn bg-warning-300 btn-icon copy_questionary" title="Duplicate"><i class="glyphicon-copyright-mark"></i></a>-->


                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-15 text-center"><span style="font-size:17px; color:#00B09C;  font-weight: 600;"><?= $space->space_name; ?></span></p> 
                                            <div class="row" style=" font-size: 12px; padding: 0px; height: 5px;">
                                                
                                                <!-- <div class="col-md-6" style="padding: 0px 0px 0px 10px;">
                                                    <p class="mb-15"> No. Of Point: <?= $space_point_count; ?></p>
                                                </div> -->
                                                
                                                <div class="col-md-6" style="padding: 0px 0px 0px 10px;">
                                                    <p class="mb-15"> No. Of Beacons: <?= count($space->beacon_point); ?></p>
                                                </div>
                                            </div>



                                            <!--								
                                                                                                                        <div class="text-right" style="margin-top: -37px;">
                                            <?php // if($questionary->is_active == '1'){   ?>
                                                                                                                            <span class="label bg-success-400">Active</span>
                                            <?php //  }else{   ?>
                                                                                                                            <span class="label bg-danger-400">Inactive</span>
                                            <?php //}  ?>
                                                                                                                        </div>-->




                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- /overlay effects -->

                            <!-- Footer -->
                            <!-- <div class="footer text-muted">
                                    &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                            </div> -->
                            <!-- /footer -->

                        </div>
                        <!-- /content area -->

                    </div>
                    <!-- /main content -->

                </div>
                <!-- /page content -->

            </div>
            <!-- /page container -->

    </body>

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/components_thumbnails.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Feb 2017 05:37:30 GMT -->
</html>

<script>
    $('#sortcontent').change(function () {
        var val = $(this).val();
        if(val=='date'){
           var location = "<?=base_url('index.php/main/spaces/date')?>"; 
        }
        if(val=='name'){
            var location = "<?=base_url('index.php/main/spaces/name')?>"; 
        }
        
        window.location=location;
        //alert(location);
    })
</script>