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


        <!--<link rel="stylesheet" href="<?php echo base_url() ?>/assets_c/js/plugins/iCheck/square/square.css">-->
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        
        <!--<script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/forms/styling/switchery.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/media/fancybox.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/uploaders/fileinput.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/pages/uploader_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/pages/components_thumbnails.js"></script>
   
      
    
       <style>
            .fileinput-upload-button{
                display: none;
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
                                
                                </div>
                                </div>

                                
                         <div class="breadcrumb-line breadcrumb-line-component">
                                    <ul class="breadcrumb">
                                                                            <li><a href="<?php echo site_url('control/spaces');?>"><i class="icon-home2 position-left"></i> Manage Stores</a></li>
                                        <li class='active'>Edit Stores</li>
                                    </ul>
                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">

                        <!-- User profile -->
                       
          <form class="form-horizontal" action="<?php echo site_url('control/save_editspace'); ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" value="<?=$space_data->space_id?>" name="space_id"/>
                                <!-- Profile info -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title"></h6>

                                    </div>

                                    <div class="panel-body">
                                        <div class="row">   
                                        <div class="col-md-12">
                                            <div class="row">
                                            <div class="col-md-6">

                                                <h5><b>Enter Store Name</b> <i class=" icon-notification2" style="font-size: 10px;cursor: pointer;" title="You can edit store name"></i> </h5>
                                                <br/>
                                                <div class="form-group">
<!--                                                    <div class="col-md-2">
                                                        <label class="control-label">Name:</label>
                                                    </div>-->
                                                    <div class="col-md-10">

                                                        <input type="text" class="form-control" name="space_name" value="<?=$space_data->space_name; ?>"  id="store_value" placeholder="Store Name">
                                                        <p style="color:red;" id="save_store_image_error"></p> 

                                                        <input type="hidden" class="form-control" name="width" value="<?=$space_data->width; ?>" placeholder="Store Name" required="required">

                                                        <input type="hidden" class="form-control" name="height" value="<?=$space_data->height; ?>" placeholder="Store Name" required="required">
                                                    </div>
                                                </div>
                                            </div> 
                                      <div class="col-md-6">

                                                <h5><b> Add Store Image</b> <i class=" icon-notification2" style="font-size: 10px;cursor: pointer;" title="You can edit banner image of store"></i> </h5>
                                                <br/>
                                                <div class="form-group">
<!--                                                    <div class="col-md-2">
                                                        <label>Image:</label></div>-->
                                                    <div class="col-md-10">
                                                        <input type="file" name="space_image" id="questionary_image" class="file-input">
                                                        
                                                        <p style="color:red;" id="questionary_image_error"></p>   
                                                    </div>          
                                                </div>
                                            </div>
                                            </div>
                                            
                    <div class="col-md-6">

                                                <h5><b>Show Space Image</b> <i class=" icon-notification2" style="font-size: 10px;cursor: pointer;" title="You can view banner image of space"></i> </h5>
                                                <br/>
                                                <div class="form-group">
                                                    <div class="col-md-2">
                                                        <!--<label>Image:</label>-->
                                                        </div>
                                                    <div class="col-md-10">
                                                     <?php if($space_data->space_image){  ?>
                                                <div class="col-md-4">
                                    <div class="thumbnail">
                                        <!--<div class="thumb">-->
                                         <img src="<?php echo base_url('uploads/'.$space_data->space_image);?>" class="img-responsive img-rounded media-preview" alt=""  >
                                        <!--</div>-->
                                    </div>
                                   </div>
                                                <div class="col-md-6"></div>
                                                <?php }else{ ?>
                                                   <div class="col-md-4">
                                    <div class="thumbnail">
                                        <!--<div class="thumb">-->
                                                                                    <img src="<?php echo base_url()?>/assets_c/images/beacon_new12.png" class="img-responsive img-rounded media-preview" alt="">
                                        <!--</div>-->
                                    </div>
                                   </div>
                                                <div class="col-md-6"></div>
                                           <?php } ?>    
                                                    </div>          
                                                </div>
                                            </div>  
                                            </div>
                                           
                                            <div class="text-center">
                                                <button type="submit" id="update_store_plan" class="btn btn-save-space ml-10"><b><i class="icon-checkmark3"></i></b> Update </button>
                                                <!--<a href="<?php echo site_url('main/home');?>" ><button type="button" class="btn btn-save ml-10"><b><i class="icon-cross"></i></b> Cancel</button></a>-->

                                              <!--  <button type="reset" class="btn btn-save ml-10"><b><i class="icon-cross"></i></b> Cancel</button>    -->
                                            </div>
                                            </div>


                                       


                                <!-- /form horizontal -->

                            </div>
                      
                        </div>
                        <!-- /page content -->
      <!-- /content area -->
                                </div>
 </form>

                    </div>
                    <!-- /page container -->
                    <!--<footer><a href="www.cashrub.com" style="color: #777777;"></a></footer>-->
                </div>
            </div>
        </div>
          
<!--        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/forms/selects/bootstrap_select.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/pages/form_bootstrap_select.js"></script>
    
        -->
<!--    <script type="text/javascript" src="<?php echo base_url()?>assets_c/js/plugins/forms/styling/switch.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets_c/js/plugins/forms/styling/switchery.min.js"></script>-->

        <script>
        $("#questionary_image").change(function() {

    var val = $(this).val();

    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'gif': case 'jpg': case 'png': case 'jpeg':
//            alert("an image");
            break;
        default:
            $(this).val('');
            // error message here
            alert("Please select only image file");
            break;
    }
});

        $("#update_store_plan").click(function(){
                var store_name = $("#store_value").val();
                
                if(store_name == ''){
                    document.getElementById("save_store_image_error").innerHTML ='Store name is required.';
                    return false ;
                }else{
                    document.getElementById("save_store_image_error").innerHTML = '';
                }

                // var image_store = $("#questionary_image").val();

                // if(image_store == ''){
                //     document.getElementById("questionary_image_error").innerHTML ='Store image is required.';
                //     return false ;
                // }else{
                //     document.getElementById("questionary_image_error").innerHTML = '';
                // }

            });
        
        </script>
       
    </body>
</html>
