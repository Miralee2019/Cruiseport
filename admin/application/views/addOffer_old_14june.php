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
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom1.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>        
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_inputs.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
        <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/anytime.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/legacy.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script> -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>

        <!-- /theme JS files -->
        <style>
            svg path {fill: white !important;}

            @media(min-width: 769px){
                .card-xs{
                    margin-left: 42px;
            }
       
    }



    .nop{
        margin-left: 0px;
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

                                <!-- Header content -->
                                <div class="page-header-content">
                                    <div class="page-title">
                                        <h4><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold"></span>Add Offers</h4>
                                        <div class="heading-elements">
                                            <div class="heading-btn-group">
                                                <a href="<?php echo base_url(); ?>index.php/control/viewOffer" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-price-tag3"></i></b> View Offers </a>

                                            </div>
                                        </div>  



                                        <ul class="breadcrumb position-right">
                                            <li><a href="<?php echo base_url(); ?>index.php/control/home">Home</a></li>
                                            <li><a href="<?php echo base_url(); ?>index.php/control/viewOffer">Offers</a></li>
                                            <li class="active">Add Offers</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <!--    <div class="arrow xs-hidden"></div> -->
                            
                            <form action="<?php echo base_url(); ?>index.php/control/addOffer" enctype="multipart/form-data" method="post">
    

                            <div class="content">

                                    
                            <div id="hidemenow">
                                
                                <?php
                                        if ($this->session->flashdata()) {
                                            echo $this->session->flashdata('add_message');
                                        }
                                ?>

                            </div>
                                    

                                <!-- User profile -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- Profile info -->
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title"><b>Offer Details</b></h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <!--    <li><a data-action="collapse"></a></li> -->
                                                <!-- <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Enter Offer Name <red style="color: red;font-size: 20px;">*</red></label>
                                                        <input type="text" name="offer_title" value="" class="form-control" placeholder="Offer Name" id="title">

                                                        <p id="error_name" style="color: red;" ></p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <label class="control-label">Offer Image<red style="color: red;font-size: 20px;">*</red> </label>

                                                        <div class="fancy-file-upload fancy-file-primary">
                                                            
                                                            <input type="file" name="filenew" accept="image/*" class="form-control"  id="filesizeidea" onchange="jQuery(this).next('input').val(this.value);"  />
                                                            <input type="text" name="myfile"  placeholder="upload image" class="form-control" id="custom_image" value="" readonly="" />

                                                            <!-- <span class="button" id="btn1" style="cursor: pointer;
                                                            z-index: 23!important;
                                                            border-radius: 15px;"><i class="icon-upload"></i> Choose File</span> -->
                                                        </div>

                                                        <span id="filesizeideamsg" style="color: red"></span>
                                                        &nbsp;<span> Max file size is 2MB </span>
                                                        <a href="" data-toggle="modal" data-target="#myModal" style="float: right;" >Select From Template</a>
                                                    </div>


                                                </div>
                                            </div>


                                            <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog">
                                                
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title">Choose Image</h4>
                                                    </div>
                                            
                                                    <div class="modal-body">
                                                        <div class="col-lg-12">
                                                            <div class="col-md-5">
                                                                
                                                                <h3>Food</h3>
                                                                <div>
                                                                    <a href="#" class="custom-close1">

                                                                    <img src="<?php echo base_url(); ?>uploads/offer_custom1.jpg" width="250" height="150" />
                                                                </a>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-5">
                                                                <h3>LifeStyle</h3>
                                                                <div>
                                                                    <a href="#" class="custom-close2">
                                                                    <img src="<?php echo base_url(); ?>uploads/offer_custom3.jpg" width="250" height="150" />

                                                                </a>    
                                                                </div>
                                                                    
                                                            </div>
                                                        </div>

                                                        <br>

                                                        <div class="col-lg-12">
                                                            <div class="col-md-5">
                                                                
                                                                <h3>Entertainment</h3>
                                                                <div>
                                                                    <a href="#" class="custom-close3">

                                                                    <img src="<?php echo base_url(); ?>uploads/offer_custom5.jpg" width="250" height="150" />
                                                                </a>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-5">
                                                                <h3>Electronics</h3>
                                                                <div>
                                                                    <a href="#" class="custom-close4">
                                                                    <img src="<?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" />

                                                                </a>    
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
                                                $(function () {
                                                    $(".custom-close1").on('click', function() {

                                                        var images = $('.custom-close1 img').attr('src');
                                                        
                                                        image = images.replace('http://cashrub.canopus-projects.com/cashrub_admin/uploads/', '');
                                                        $("#custom_image").val(image);
                                                        // alert(images);
                                                        $('#myModal').modal('hide');

                                                        $('#myImg').attr('src', images);

                                                        
                                                    });
                                                });

                                                $(function () {
                                                    $(".custom-close2").on('click', function() {

                                                        var images = $('.custom-close2 img').attr('src');
                                                        image = images.replace('http://cashrub.canopus-projects.com/cashrub_admin/uploads/', '');
                                                        $("#custom_image").val(image);
                                                        $('#myModal').modal('hide');
                                                        $('#myImg').attr('src', images);
                                                    });
                                                });

                                                $(function () {
                                                    $(".custom-close3").on('click', function() {

                                                        var images = $('.custom-close3 img').attr('src');
                                                        image = images.replace('http://cashrub.canopus-projects.com/cashrub_admin/uploads/', '');
                                                        $("#custom_image").val(image);
                                                        $('#myModal').modal('hide');
                                                        $('#myImg').attr('src', images);
                                                    });
                                                });

                                                $(function () {
                                                    $(".custom-close4").on('click', function() {

                                                        var images = $('.custom-close4 img').attr('src');
                                                        image = images.replace('http://cashrub.canopus-projects.com/cashrub_admin/uploads/', '');
                                                        $("#custom_image").val(image);
                                                        $('#myModal').modal('hide');
                                                        $('#myImg').attr('src', images);
                                                    });
                                                });


                                            </script>


                                          <br><br>


                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Enter Offer Description<red style="color: red;font-size: 20px;">*</red> </label>
                                                        
                                                        <textarea name="offer_description" class="form-control" rows="2" cols="1" placeholder="Offer Description" id="desc" maxlength="100" style="max-width: 461px;max-height: 62px;"></textarea>

                                                        <p id="error_des" style="color: red;" ></p>

                                                    </div>                                                          
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <label for="dtp_input1" class="control-label">Expiry Date</label>
                                                        <!-- <input type="text" name="offer_expiry_date" class="form-control  pickadate-editable pickers    " placeholder="Expiry On&hellip;"   > -->

                                                        
                
                                                        <!-- <div class="form-group col-md-6" id="cdesign"> -->
                                                            <!-- <label for="dtp_input1" style="font-size: 17px;" class="col-md-2 control-label">Start date</label> -->
                                                            <div class="input-group date form_date col-md-12" id="chh" data-date-format="dd MM yyyy" data-link-field="dtp_input1" >
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;"></span></span>
                                                                <input class="form-control" size="30" data-date-start-date="+0d" id="changedate1" name="offer_expiry_date" placeholder="Expiry On.." style="font-size: 15px;  " type="text" value="" readonly>
                                                                <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> -->
                                                                
                                                            </div>
                                                            <input type="hidden" id="dtp_input1" value="" /><br/>
                                                        <!-- </div> -->
                
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                            <div class="form-group">
                                            <div class="col-md-12">
                                                  <label class="control-label">Select Category<red style="color: red;font-size: 20px;">*</red></label>
                                                  <a class="btn btn-default btn-select btn-select-light" style="margin-top:0px; margin-left: 0px!important;">
                                                                            
                                                                            <input type="hidden" class="btn-select-input form-control" id="category" name="category" value="" />
                                                                            
                                                                            <span class="btn-select-value">Category</span>
                                                                            <span class='btn-select-arrow icon-arrow-down15'></span>
                                                                            <ul>

                                                                                <?php foreach ($store as $key) { ?>
                                                                                <li value="<?php echo $key->category_id; ?>"><?php echo $key->name; ?></li>
                                                                                <?php } ?>

                                                                            </ul>
                                                                        </a>
                                                                        <p id="error_category" style="color: red;" ></p>
                                            </div>
                                            </div>
                                            </div>

                                            <!-- <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="control-label">Select Category</label>
                                                        <a class="btn btn-default btn-select btn-select-light" id="expire"> 
                                                            <input type="hidden" class="btn-select-input" name="category" value="" id="expire"
                                                            />
                                                            <span class="btn-select-value" id="expire">Select an Item</span>
                                                            <span class='btn-select-arrow  icon-arrow-down15'></span>
                                                            
                                                            
                                                            
                                                            <ul>

                                                            <?php foreach ($store as $key) { ?>
                                                                <li><?php echo $key->name; ?></li>
                                                            <?php } ?>

                                                            </ul>


                                                        </a>

                                                    </div>



                                            mb    </div>
                                            </div> -->
                                        
                                    </div>
                                </div>

                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title"><b>Add Points Details</b></h6>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <!-- <li><a data-action="collapse"></a></li> -->
                                                <!--    <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li> -->
                                            </ul>
                                        </div>
                                    </div>




                                    <div class="panel-body">
                                            <div class="row">

                                                <div class="form-group">

                                                    <div class="col-md-6">
                                                        <label>Facebook Point <red style="color: red;font-size: 20px;">*</red></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon-facebook fb1"></i></span>
                                                            <input type="hidden" name="fpoints" value="1">
                                                            <input type="text" name="facebook_points" onkeypress="return isNumber(event)" value="" class="form-control" id="points1" maxlength="4" >
                                                        </div>
                                                        <p id="error_msg1" style="color: red;" ></p>
                                                    </div>




                                                    <div class="col-md-6">
                                                        <label>Twitter Point <red style="color: red;font-size: 20px;">*</red></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon-twitter twt1"></i></span>
                                                            <input type="hidden" name="tpoints" value="2">
                                                            <input type="text"  name="twitter_points" onkeypress="return isNumber(event)" value="" class="form-control" id="points2" maxlength="4">
                                                        </div>
                                                        <p id="error_msg2" style="color: red;" ></p>
                                                    </div>

                                                    <script type="text/javascript">
                                                        function minmax(value, min, max) 
                                                        {
                                                            if(parseInt(value) < min || isNaN(parseInt(value))) 
                                                                return 0; 
                                                            else if(parseInt(value) > max) 
                                                                return 1; 
                                                            else return value;
                                                        }
                                                    </script>

                                                    <!-- <div class="col-md-4">
                                                        <label>Walking  Point<red style="color: red;font-size: 20px;">*</red> </label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon-user walkin1"></i></span>
                                                            <input type="hidden" name="wpoints" value="0">
                                                            <input type="text" name="walking_points" onkeypress="return isNumber(event)" value="" class="form-control" id="points3" maxlength="4">
                                                            </div>
                                                            <p id="error_msg3" style="color: red;" ></p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                                <h6 class="panel-title"><b>Other Details</b></h6>
                                                <div class="heading-elements">
                                                <ul class="icons-list">
                                                        <!-- <li><a data-action="collapse"></a></li> -->
                                                    <!--    <li><a data-action="reload"></a></li> -->
                                                        <!-- <li><a data-action="close"></a></li> -->
                                                    </ul>
                                        </div>
                                        </div>
                                        <div class="panel-body">
                                        
                                            <div class="form-group">
                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <label class="control-label">Maximum Point Limit</label>


                                                        <a class="btn btn-default btn-select btn-select-light">
                                                            <input type="hidden" class="btn-select-input" id="max_point"  name="maximum_point" value="" />
                                                            <span class="btn-select-value">Select an Item</span>
                                                            <span class='btn-select-arrow icon-arrow-down15'></span>
                                                            <ul>
                                                                <li value="100">100</li>
                                                                <li value="200" class="selected">200</li>
                                                                <li value="300">300</li>
                                                                <li value="400">400</li>
                                                            </ul>
                                                        </a>

                                                        <p id="error_point" style="color: red;" ></p>                    
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Offer Visibility</label>
                                                        <a class="btn btn-default btn-select btn-select-light">
                                                            <input type="hidden" class="btn-select-input" id="" name="offer_visibility" value="" />
                                                            <span class="btn-select-value">Select an Item</span>
                                                            <span class='btn-select-arrow  icon-arrow-down15'></span>
                                                            <ul>
                                                                <li value="1" >1 Miles</li>
                                                                <li value="2" class="selected">2 Miles</li>
                                                                <li value="3" >3 Miles</li>
                                                                <li value="5" >5 Miles</li>
                                                            </ul>
                                                        </a>                    
                                                    </div>

                                                </div>
                                            </div>                                                  

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Terms & Conditions<red style="color: red;font-size: 20px;">*</red> </label>
                                                        <textarea name="offer_terms" style="max-width: 461px;max-height: 62px;" class="form-control" rows="2" cols="1" placeholder="Terms & Conditions" id="terms" ></textarea>

                                                        <p id="error_terms" style="color: red;" ></p>

                                                    </div>                                                          
                                                </div>
                                            </div>.
                                            <div class="text-center">
                                                <button type="submit" id="savedata" class="btn btn-primary  btn-labeled submit" style="padding-left: 30px;">Save <i class="icon-arrow-right14 position-right"></i></button>
                                            </div>
                                    </div>
                                </div>
                            </div>  

                            </form>

                            <!-- /profile info -->

                            <div class="col-lg-6 col-md-6">
                                <!-- Profile info -->
                                <!-- <div class="panel panel-flat"> -->
                                <div class="panel-heading">
                                    <!--        <h6 class="panel-title">View Offer Preview</h6> -->
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <!-- <li><a data-action="collapse"></a></li> -->
                                            <!-- <li><a data-action="reload"></a></li> -->
                                            <!--    <li><a data-action="close"></a></li> -->
                                        </ul>
                                    </div>
                                </div>



                                <div class="panel-body panel-back hidden-xs">
                                    <div class="card comp1" id="img">


                                        <div class="view overlay hm-white-slight preview">
                                            <img src=""  class="img-fluid" alt="" id="myImg">
                                            <a href="#">
                                                <div class="mask waves-effect waves-light"></div>
                                            </a>
                                        </div>

                                        <div class="card-block">
                                            <div class="image-text">

                                            </div>
                                            <h6 id="imagetitle"><b> Offer Title</b></h6>
                                            <!-- <a href="#" class="btn label-success" style="margin-top: -316px;
                                            margin-top: -316px;
                                            position: absolute;
                                            border-radius: 22px;
                                            padding: 0px 19px;
                                            margin-left: 265px;
                                            color: white;" ><span id="imageex">Food</span></a> -->

                                            <p class="card-text"  id="imagedesc" style="z-index: 22;position: absolute;color: white;margin-top: -192px;font-size: 12px;" >Offer Description</p>
                                            <!-- <span class="card-text text-right exp"> Expiry On:-
                                            <p class="card-text text-left date" ></p></span> -->
                                            <a href="#" class="btn fb" style="margin-top: -140px;
                                            position: absolute;
                                            border-radius: 22px;
                                            padding: 2px 11px;" ><i class="icon-facebook"></i> <span id="imagepoints1">0 Points</span></a>

                                            <a href="#" class="btn twt" style="margin-top: -140px;
                                            position: absolute;
                                            border-radius: 22px;
                                            padding: 2px 11px; margin-left: 110px;" ><i class="icon-twitter"></i> <span id="imagepoints2">0 Points</span></a>

                                            <a href="#" class="btn" style="margin-top: -140px;
                                            position: absolute;
                                            border-radius: 22px;
                                            padding: 3px 5px;
                                            margin-left: 247px;
                                            height: 26px;
                                            width: 26px;
                                            border-color: white;
                                            border-radius: 50px; 
                                            " > <img src="<?php echo base_url(); ?>assets/images/man-sm.png" class="walkins-icon svg3 svg" style="margin-top: 0px;
                                            height: 18px;
                                            color: white; margin-left:-41px; 
                                            "/> </a>  <span id="imagepoints3" style="position: absolute;
                                            margin-top: -144px;
                                            float: left;
                                            color: white;
                                            margin-left: 280px;
                                            font-size: 20px;">0</span> 

                                            <!-- <li class="card-text text-left"  style="padding-top: 20px; margin-left: 10px;" id="imageterms">Terms & Condition</li> -->
                                        </div>


                                    </div>
                                    <div class="text-center nop" style='margin-top:-68px;position: absolute; z-index:-1;'>
                                        <img src="<?php echo base_url(); ?>assets/images/mobile.png" width="425px" height="825px"> 
                                    </div>

                                </div>
                                <!-- </div> -->
                                <!-- /profile info -->
                            </div>
                        </div>



                    </div>
                    
                </div>
            
</div>

        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>


        <script type="text/javascript">
$(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});
function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
};


    // $('#filesizeidea').bind('change', function() {

    //     var size = this.files[0].size;

    //   if(size > 2000000){
    //     alert("Maximum file size is 2MB");
    //   }

    // });


    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        startDate: '-0d'

    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        startDate: '-0d'
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>
        <script>

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}



            $("#btn1").bind("click" , function(){

                $("#zip_file_import").click();
            });

            function formSubmit() {
                var fullpath = document.getElementById("zip_file_import").value;
                var backslash=fullpath.lastIndexOf("\\");
                var filename = fullpath.substr(backslash+1);

                var confirm_message = confirm("Files selected for import are \n: "+filename+"\n\nDo you want to proceed?");
                if (confirm_message==false) {
                    return false;
                } else {
                    document.getElementById("import_form").submit();
                    document.body.style.cursor = "wait";
                }
            }

            $("#zip_file_import").on('change', function () {

                       //Get count of selected files
                       var countFiles = $(this)[0].files.length;

                       var imgPath = $(this)[0].value;
                       var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                       var image_holder = $("#image");
                       image_holder.empty();

                       if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "doc"  || extn == "txt" || extn == "wmv") {
                        if (typeof (FileReader) != "undefined") {

                               //loop for each file selected for uploaded.
                               for (var i = 0; i < countFiles; i++) {

                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $("<img />", {
                                        "src": e.target.result,
                                        "class": "thumb-image img-responsive"
                                    }).appendTo(image_holder);
                                }

                                image_holder.show();
                                reader.readAsDataURL($(this)[0].files[i]);
                               }

                           } 
                       } 
                       /* });*/

                   });
            $(document).ready(function () {
                $(".btn-select").each(function (e) {
                    var value = $(this).find("ul li.selected").html();
                    if (value != undefined) {
                        $(this).find(".btn-select-input").val(value);
                        $(this).find(".btn-select-value").html(value);
                    }
                });
            });

            $(document).on('click', '.btn-select', function (e) {
                e.preventDefault();
                var ul = $(this).find("ul");
                if ($(this).hasClass("active")) {
                    if (ul.find("li").is(e.target)) {
                        var target = $(e.target);
                        target.addClass("selected").siblings().removeClass("selected");
                        
                        var value = target.text();
                        var data = target.val();

                    $(this).find(".btn-select-input").val(data);
                    // alert(data);
                    $(this).find(".btn-select-value").html(value);
                    }
                    ul.hide();
                    $(this).removeClass("active");
                }
                else {
                    $('.btn-select').not(this).each(function () {
                        $(this).removeClass("active").find("ul").hide();
                    });
                    ul.slideDown(100);
                    $(this).addClass("active");
                }
            });

            $(document).on('click', function (e) {
                var target = $(e.target).closest(".btn-select");
                if (!target.length) {
                    $(".btn-select").removeClass("active").find("ul").hide();
                }
            });

            var inputBox = document.getElementById('title');

            inputBox.onkeyup = function(){
                document.getElementById('imagetitle').innerHTML = inputBox.value;
            }


            var inputBox1 = document.getElementById('desc');

            inputBox1.onkeyup = function(){
                var html = inputBox1.value;
                html = html.substring(0, 60) + "<br>" + html.substring(60);
                // $("#imagedesc").html(html);

                document.getElementById('imagedesc').innerHTML = html;
            }


            var inputBox2 = document.getElementById('terms');

            inputBox2.onkeyup = function(){
                document.getElementById('imageterms').innerHTML = inputBox2.value;
            }


            var inputBox3 = document.getElementById('points1');

            inputBox3.onkeyup = function(){
                document.getElementById('imagepoints1').innerHTML = inputBox3.value;
            }

            var inputBox4 = document.getElementById('points2');

            inputBox4.onkeyup = function(){
                document.getElementById('imagepoints2').innerHTML = inputBox4.value;
            }

            var inputBox5 = document.getElementById('points3');

            inputBox5.onkeyup = function(){
                document.getElementById('imagepoints3').innerHTML = inputBox5.value;
            }


            var inputBox6 = document.getElementById('sel1');

            inputBox6.onkeyup = function(){
                document.getElementById('imageex').innerHTML = inputBox6.value;
            }

        </script>


    <script>
    
        $(document).ready(function(){
            $('.submit').click(function(){
            
   
            
            // var _URL = window.URL || window.webkitURL;

            //         $("#filesizeidea").change(function(e) {
            //             var file, img;


            //             if ((file = this.files[0])) {
            //                 img = new Image();
            //                 img.onload = function() {

            //                     // alert(this.width + " " + this.height);

            //                     if(this.width < 380 && this.height < 250){
            //                         document.getElementById('filesizeideamsg').innerHTML = "Please upload a minimum of 380*250 size image";    
            //                     }
                            
            //                 };
            //                 img.onerror = function() {
            //                     alert( "not a valid file: " + file.type);
            //                 };
            //                 img.src = _URL.createObjectURL(file);


            //             }

            // });


            var imgVal1 = $('#filesizeidea').val();
            var imgVal2 = $('#custom_image').val();



            if((imgVal1=='') && (imgVal2==''))
            {
                document.getElementById('filesizeideamsg').innerHTML="Offer image is required";
                return false;   
            }else{
                document.getElementById('filesizeideamsg').innerHTML="";
            }
                
            var fileSize = document.getElementById("filesizeidea").files[0];
            var sizeInMb = (fileSize.size/1024)/1024;
            var sizeLimit= 2;    

                if (sizeInMb > sizeLimit) {

                    document.getElementById('filesizeideamsg').innerHTML="image size must be less than 2MB";
                    return false;

                }else{
                    document.getElementById('filesizeideamsg').innerHTML="";
                }

        });
    
        });
        </script>
    </body>

<script type="text/javascript">

$("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);
    
$(document).ready(function () {
    $("#savedata").click(function(){

            var cat = $('#category').val();
            
            var fb = $('#points1').val();
            var tw = $('#points2').val();
            // var wp = $('#points3').val();
            var offer_name = $('#title').val();
            var des = $('#desc').val();
            var terms = $('#terms').val();
            

            var max_point = $('#max_point').val();
            var total = Number(fb)+Number(tw);

            if(offer_name == ''){
                document.getElementById('error_name').innerHTML="Offer name is required";
                return false;
            }else{
                document.getElementById('error_name').innerHTML="";
            }

            if(des == ''){
                document.getElementById('error_des').innerHTML="Offer description is required";
                return false;
            }else{
                document.getElementById('error_des').innerHTML="";
            }

            if(cat == ''){
                document.getElementById('error_category').innerHTML="Category field is required";
                return false;
            }else{
                document.getElementById('error_category').innerHTML="";
            }

            if(fb == ''){
                document.getElementById('error_msg1').innerHTML="Facebook points are required";
                return false;
            } else {
                document.getElementById('error_msg1').innerHTML="";
            }

            if(tw == ''){
                document.getElementById('error_msg2').innerHTML="Twitter points are required";
                return false;
            } else {
                document.getElementById('error_msg2').innerHTML="";
            }

            // if(wp == ''){
            //     document.getElementById('error_msg3').innerHTML="Walking points are required";
            //     return false;
            // } else {
            //     document.getElementById('error_msg3').innerHTML="";
            // }

            if(total > max_point){
                document.getElementById('error_point').innerHTML="Your entered point exceeding the maximum point limit";
                return false;
            }else{
                document.getElementById("error_point").innerHTML = '';
            }

            if(terms == ''){
                document.getElementById('error_terms').innerHTML="Offer terms & conditions are required";
                return false;
            }else{
                document.getElementById("error_terms").innerHTML = '';    
            }


            // alert(fb+" "+tw+" "+wp);

            // alert(max_point);
    });
});

     

</script>



</html>
