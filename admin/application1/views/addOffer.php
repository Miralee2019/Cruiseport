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
        .title_cat {

            font-size: 16px;
            color: #333;
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
                                                        <input type="text" name="offer_title" value="" maxlength="40" class="form-control" placeholder="Offer Name" id="title">

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
                                            <style>
                                            .temp_img{
                                                width: 100%; height: 150px; margin-bottom: 10px; 
                                            }
                                            .filter-button {
                                                font-size: 20px;
                                                font-weight: 700;
                                                color: #0197DD;
                                                border: 1px solid #0197DD !important;
                                                margin: 5px;
                                            }
                                        </style>

                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog" style="width: 78%;">

                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title text-center">Choose Image</h4>
                                              </div>

                                              <div class="modal-body">
                                                <div class="">
                                                    <div class="row">
                                                        <div align="center">
                                                            <div class="row">
                                                                <a class="btn btn-default filter-button" data-filter="food">Food</a>
                                                                <a class="btn btn-default filter-button" data-filter="lifestyle">LifeStyle</a>
                                                                <a class="btn btn-default filter-button" data-filter="electronics">Electronics</a>
                                                                <a class="btn btn-default filter-button" data-filter="entertainment">Entertainment</a>
                                                                <a class="btn btn-default filter-button" data-filter="drinks">Drinks</a>
                                                                <a class="btn btn-default filter-button" data-filter="health">Health</a>
                                                                <a class="btn btn-default filter-button" data-filter="fitness">Fitness</a>
                                                            </div>
                                                            <div class="row">
                                                                <a class="btn btn-default filter-button" data-filter="home">Home</a>
                                                                <a class="btn btn-default filter-button" data-filter="auto">Auto</a>
                                                                <a class="btn btn-default filter-button" data-filter="travel">Travel</a>
                                                                <a class="btn btn-default filter-button" data-filter="beauty">Beauty </a>
                                                                <a class="btn btn-default filter-button" data-filter="shopping">Shopping</a>
                                                                <a class="btn btn-default filter-button" data-filter="education">Education</a>
                                                                <a class="btn btn-default filter-button" data-filter="outdoors">Outdoors</a>
                                                            </div>
                                                        </div>
                                                        <br/>

                                                        <div class="col-lg-12 filter food">
                                                            <div class="row">
                                                                <div class="col-lg-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/food_1.jpeg" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom5.jpg" width="250" height="150" /> -->
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-md-1"></div> -->
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/food_2.jpeg" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">                                                                            
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/food_3.jpeg" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/food_4.jpg" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>                                                        
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 filter lifestyle">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/life_1.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom5.jpg" width="250" height="150" /> -->
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <!-- <div class="col-md-1"></div> -->
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/life_2.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/life_3.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/life_4.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>                                                        
                                                        </div>

                                                        <div class="col-lg-12 filter electronics">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/elec_1.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom5.jpg" width="250" height="150" /> -->
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <!-- <div class="col-md-1"></div> -->
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/elec_2.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/elec_2.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/elec_4.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div> 
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 filter entertainment">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/ent_1.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom5.jpg" width="250" height="150" /> -->
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <!-- <div class="col-md-1"></div> -->
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/ent_2.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/ent_3.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/ent_4.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>  
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 filter drinks">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/drink_1.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom5.jpg" width="250" height="150" /> -->
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <!-- <div class="col-md-1"></div> -->
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/drink_2.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/drink_3.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/drink_4.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>                                                        
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 filter health">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/heal_1.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom5.jpg" width="250" height="150" /> -->
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <!-- <div class="col-md-1"></div> -->
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/heal_2.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/heal_3.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/heal_4.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>                                                        
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 filter fitness">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/fit_1.png" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom5.jpg" width="250" height="150" /> -->
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <!-- <div class="col-md-1"></div> -->
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/fit_2.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/fit_3.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/fit_4.jpg" width="250" height="150" />
                                                                            <!-- <img src="< ?php echo base_url(); ?>uploads/offer_custom4.jpg" width="250" height="150" /> -->
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>                                                        
                                                            </div>

                                                            <!-- Add images here -->

                                                            <div class="col-lg-12 filter home">
                                                                <h1>Hello</h1>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 filter home">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/home_1.jpeg" width="250" height="150" />
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/home_2.jpeg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/home_3.jpeg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/home_4.jpeg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>     
                                                            </div>                                                   
                                                        </div>

                                                        <div class="col-lg-12 filter auto">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/auto_1.jpg" width="250" height="150" />
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/auto_2.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/auto_3.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/auto_4.jpg" width="250" height="150" />
                                                                        </a>
                                                                    </div>                                                                            
                                                                </div>                                                        
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 filter travel">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/travel_1.jpg" width="250" height="150" />
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/travel_2.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/travel_3.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/travel_4.png" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>  
                                                            </div>                                                      
                                                        </div>

                                                        <div class="col-lg-12 filter beauty">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/beauty_1.jpg" width="250" height="150" />
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/beauty_2.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/beauty_3.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/beauty_4.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>                                                        
                                                        </div>

                                                        <div class="col-lg-12 filter shopping">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/shopping_1.png" width="250" height="150" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/shopping_2.jpeg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/shopping_3.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/shopping_4.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>                                                        
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 filter education">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/edu_1.jpg" width="250" height="150" />
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/edu_2.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/edu_3.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/edu_4.jpg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>                                                        
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 filter outdoors">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close3">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/out_1.jpeg" width="250" height="150" />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/out_2.jpeg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/out_3.jpeg" width="250" height="150" />
                                                                        </a>    
                                                                    </div>                                                                            
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div>
                                                                        <a href="#" class="custom-close4">
                                                                            <img class="temp_img" src="<?php echo base_url(); ?>uploads/out_4.jpg" width="250" height="150" />
                                                                        </a>     
                                                                    </div>
                                                                </div>                                                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                      </div>

                                  </div>
                              </div>

                              <script>
                                $(document).ready(function () {
                                    $('.filter').filter('.food').show('3000');
                                    $('.filter').not('.food').hide('3000');
                                    $(".filter-button").click(function () {
                                        var value = $(this).attr('data-filter');
                                        $(".filter").not('.' + value).hide('3000');
                                        $('.filter').filter('.' + value).show('3000');
                                    });

                                    if ($(".filter-button").removeClass("active")) {
                                        $(this).removeClass("active");
                                    }
                                    $(this).addClass("active");
                                })
                            </script>

                            <script type="text/javascript">
                                $(function () {
                                    $(".custom-close1").on('click', function() {

                                        var images = $('.custom-close1 img').attr('src');

                                        image = images.replace('<?= base_url();?>uploads/', '');
                                        $("#custom_image").val(image);
                                        $('#myModal').modal('hide');

                                        $('#myImg').attr('src', images);                                       
                                    });
                                });

                                $(function () {
                                    $(".custom-close2").on('click', function() {

                                        var images = $('.custom-close2 img').attr('src');
                                        image = images.replace('<?= base_url();?>uploads/', '');
                                        $("#custom_image").val(image);
                                        $('#myModal').modal('hide');
                                        $('#myImg').attr('src', images);
                                    });
                                });

                                $(function () {
                                    $(".custom-close3").on('click', function() {
                                        var images = $(this).children().attr('src');                                        
                                        image = images.replace("<?= base_url();?>uploads/", '');
                                        $("#custom_image").val(image);
                                        $('#myModal').modal('hide');
                                        $('#myImg').attr('src', images);
                                    });
                                });

                                $(function () {
                                    $(".custom-close4").on('click', function() {
                                        var images = $(this).children().attr('src');
                                        image = images.replace("<?= base_url();?>uploads/", '');
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
                                                 <!--  <a class="btn btn-default btn-select btn-select-light" style="margin-top:0px; margin-left: 0px!important;">
                                                                            
                                                                            <input type="hidden" class="btn-select-input form-control" id="category" name="category" value="" />
                                                                            
                                                                            <span class="btn-select-value">Category</span>
                                                                            <span class='btn-select-arrow icon-arrow-down15'></span>
                                                                            <ul>

                                                                                <?php foreach ($store as $key) { ?>
                                                                                <li value="<?php echo $key->category_id; ?>"><?php echo $key->name; ?></li>
                                                                                <?php } ?>

                                                                            </ul>
                                                                        </a> -->
                                                                        <a data-toggle="modal" data-target="#myModal1"  class="btn btn-default btn-select btn-select-light" style="margin-top:0px; margin-left: 0px!important;">
                                                                            <input type="hidden" class="btn-select-input form-control" id="category" name="category" value="" />
                                                                            <!-- onchange="jQuery(this).next('input').val(this.value);" -->
                                                                            <span class="btn-select-value" id="filesizeidea" >Category</span>
                                                                            <span class="btn-select-value" id="custom_image1"></span>
                                                                            <span class='btn-select-arrow icon-arrow-down15'></span>
                                                                            <!-- <ul>

                                                                                <?php foreach ($store as $key) { ?>
                                                                                <li value="<?php //echo $key->category_id; ?>"><?php //echo $key->name; ?></li>
                                                                                <?php } ?>

                                                                            </ul> -->
                                                                        </a>
                                                                        <p id="error_category" style="color: red;" ></p>
                                                                        <!-- <a href="" data-toggle="modal" data-target="#myModal1" style="float: right;" >Select From Template</a>

                                                                        -->

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--======================= yashraj code====================--> 
                                                            <div class="modal fade" id="myModal1" role="dialog"> 
                                                                <div class="modal-dialog"> 

                                                                    <div class="modal-content"> 
                                                                        <div class="modal-header"> 
                                                                          <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                                                          <h4 class="modal-title">Choose Category</h4> 
                                                                      </div> 

                                                                      <div class="modal-body"> 

                                                                        <div class="col-lg-12"> 
                                                                            <div class="col-md-3" style="text-align: center;"> 

                                                                                <h3 class="title_cat">Food</h3> 
                                                                                <div> 
                                                                                    <a href="#" class="custom-close1-1"> 

                                                                                        <img src="<?php echo base_url(); ?>uploads/Categories-white_03.png" width="70" height="70" /> 
                                                                                    </a> 
                                                                                </div> 

                                                                            </div> 
                                                                            <!--  <div class="col-md-1"></div>  -->
                                                                            <div class="col-md-3" style="text-align: center;"> 
                                                                                <h3 class="title_cat">LifeStyle</h3> 
                                                                                <div> 
                                                                                    <a href="#" class="custom-close2-1"> 
                                                                                        <img src="<?php echo base_url(); ?>uploads/Categories-white_12.png" width="70" height="70"  /> 

                                                                                    </a>    
                                                                                </div> 

                                                                            </div>
                                                                            <div class="col-md-3" style="text-align: center;"> 
                                                                                <h3 class="title_cat">Electronics</h3> 
                                                                                <div> 
                                                                                    <a href="#" class="custom-close3-1"> 
                                                                                        <img src="<?php echo base_url(); ?>uploads/Categories-white_30.png" width="70" height="70" /> 

                                                                                    </a>    
                                                                                </div> 

                                                                            </div> 
                                                                            <div class="col-md-3" style="text-align: center;"> 

                                                                                <h3 class="title_cat">Entertainment</h3> 
                                                                                <div> 
                                                                                    <a href="#" class="custom-close4-1"> 

                                                                                        <img src="<?php echo base_url(); ?>uploads/Categories-white_26.png" width="70" height="70" /> 
                                                                                    </a> 
                                                                                </div> 

                                                                            </div> 
                                                                        </div> 

                                                                        <br> 

                                                                        <div class="col-lg-12"> 
                                                                            <div class="col-md-3" style="text-align: center;"> 

                                                                                <h3 class="title_cat">Drinks</h3> 
                                                                                <div> 
                                                                                    <a href="#" class="custom-close5-1"> 

                                                                                        <img src="<?php echo base_url(); ?>uploads/Categories-white_07.png" width="70" height="70" />
                                                                                    </div> 

                                                                                </div> 
                                                                                <!-- <div class="col-md-1"></div>  -->
                                                                                <div class="col-md-3" style="text-align: center;"> 
                                                                                    <h3 class="title_cat">Health</h3> 
                                                                                    <div> 
                                                                                        <a href="#" class="custom-close6-1"> 
                                                                                            <img src="<?php echo base_url(); ?>uploads/Categories-white_12.png" width="70" height="70" /> 

                                                                                        </a>    
                                                                                    </div> 

                                                                                </div> 
                                                                                <div class="col-md-3" style="text-align: center;"> 

                                                                                    <h3 class="title_cat">Fitness</h3> 
                                                                                    <div> 
                                                                                        <a href="#" class="custom-close7-1"> 

                                                                                            <img src="<?php echo base_url(); ?>uploads/Categories-white_13.png" width="70" height="70" /> 
                                                                                        </a> 
                                                                                    </div> 

                                                                                </div> 
                                                                                <div class="col-md-3" style="text-align: center;"> 
                                                                                    <h3 class="title_cat">Home</h3> 
                                                                                    <div> 
                                                                                        <a href="#" class="custom-close8-1"> 
                                                                                            <img src="<?php echo base_url(); ?>uploads/Categories-white_14.png" width="70" height="70" /> 

                                                                                        </a>    
                                                                                    </div> 

                                                                                </div> 
                                                                            </div> 

                                                                            <div class="col-lg-12"> 
                                                                                <div class="col-md-3" style="text-align: center;"> 

                                                                                    <h3 class="title_cat">Auto</h3> 
                                                                                    <div> 
                                                                                        <a href="#" class="custom-close9-1"> 

                                                                                            <img src="<?php echo base_url(); ?>uploads/Categories-white_18.png" width="70" height="70" /> 
                                                                                        </a> 
                                                                                    </div> 

                                                                                </div> 
                                                                                <!-- <div class="col-md-1"></div>  -->
                                                                                <div class="col-md-3" style="text-align: center;"> 
                                                                                    <h3 class="title_cat">Travel</h3> 
                                                                                    <div> 
                                                                                        <a href="#" class="custom-close10-1"> 
                                                                                            <img src="<?php echo base_url(); ?>uploads/Categories-white_19.png" width="70" height="70" /> 

                                                                                        </a>    
                                                                                    </div> 

                                                                                </div> 
                                                                                <div class="col-md-3" style="text-align: center;"> 

                                                                                    <h3 class="title_cat">Beauty</h3> 
                                                                                    <div> 
                                                                                        <a href="#" class="custom-close11-1"> 

                                                                                            <img src="<?php echo base_url(); ?>uploads/Categories-white_20.png" width="70" height="70" /> 
                                                                                        </a> 
                                                                                    </div> 

                                                                                </div> 

                                                                                <div class="col-md-3" style="text-align: center;"> 
                                                                                    <h3 class="title_cat">Shopping</h3> 
                                                                                    <div> 
                                                                                        <a href="#" class="custom-close12-1"> 
                                                                                            <img src="<?php echo base_url(); ?>uploads/Categories-white_24.png" width="70" height="70" /> 

                                                                                        </a>    
                                                                                    </div> 

                                                                                </div> 
                                                                            </div> 

                                                                            <div class="col-lg-12"> 
                                                                                <div class="col-md-3" style="text-align: center;"> 

                                                                                    <h3 class="title_cat">Education</h3> 
                                                                                    <div> 
                                                                                        <a href="#" class="custom-close13-1"> 

                                                                                            <img src="<?php echo base_url(); ?>uploads/Categories-white_25.png" width="70" height="70" /> 
                                                                                        </a> 
                                                                                    </div> 

                                                                                </div> 
                                                                                <!-- <div class="col-md-1"></div>  -->
                                                                                <div class="col-md-3" style="text-align: center;"> 
                                                                                    <h3 class="title_cat">Outdoors</h3> 
                                                                                    <div> 
                                                                                        <a href="#" class="custom-close14-1"> 
                                                                                            <img src="<?php echo base_url(); ?>uploads/outdoors.png" width="70" height="70" /> 

                                                                                        </a>    
                                                                                    </div> 

                                                                                </div> 
                                                                                <div class="col-md-3" style="text-align: center;"> 



                                                                                </div> 
                                                                                <!-- <div class="col-md-1"></div>  -->
                                                                                <div class="col-md-3" style="text-align: center;"> 


                                                                                </div> 
                                                                            </div> 
                                                                        </div> 


                                                                        <div class="modal-footer"> 
                                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                                                      </div> 
                                                                  </div> 

                                                              </div> 
                                                          </div> 
                                                          <!--========================== yashraj code close =============================--> 
                                                          <script type="text/javascript"> 


        //-----------------------------yashraj code-------------------------- 
        $(function () {
            $(".custom-close1-1").on('click', function() {


                $('#custom_image1').text('Food');
                $("#category").val('1');

                /* $('#filesizeidea').text('Food');*/
                $('#catvalli1').attr('class','selected');
                $('#myModal1').modal('hide');


            });
        });

        $(function () {
            $(".custom-close2-1").on('click', function() {

                $("#category").val('2');

                /*$('#filesizeidea').text('Lifestyle');*/
                $('#custom_image1').text('Lifestyle');
                $('#myModal1').modal('hide');

            });
        });

        $(function () {
            $(".custom-close3-1").on('click', function() {


                $("#category").val('3');

                /*$('#filesizeidea').text('Electronics');*/

                $('#custom_image1').text('Electronics');
                $('#myModal1').modal('hide');

            });
        });

        $(function () {
            $(".custom-close4-1").on('click', function() {

                $("#category").val('4');

                /*$('#filesizeidea').text('Entertainment');*/

                $('#custom_image1').text('Entertainment');
                $('#myModal1').modal('hide');

            });
        });
        $(function () {
            $(".custom-close5-1").on('click', function() {

                $("#category").val('5');

                /* $('#filesizeidea').text('Drinks');*/

                $('#custom_image1').text('Drinks');
                $('#myModal1').modal('hide');



            });
        });

        $(function () {
            $(".custom-close6-1").on('click', function() {


                $("#category").val('6');

                /*$('#filesizeidea').text('Health');*/
                $('#custom_image1').text('Health');
                $('#myModal1').modal('hide');

            });
        });

        $(function () {
            $(".custom-close7-1").on('click', function() {

                $("#category").val('7');

                /*  $('#filesizeidea').text('Fitness');*/
                $('#custom_image1').text('Fitness');
                $('#myModal1').modal('hide');

            });
        });

        $(function () {
            $(".custom-close8-1").on('click', function() {


                $("#category").val('8');

                /* $('#filesizeidea').text('Home');*/

                $('#custom_image1').text('Home');
                $('#myModal1').modal('hide');

            });
        });
        $(function () {
            $(".custom-close9-1").on('click', function() {

                $("#category").val('9');

                /*$('#filesizeidea').text('Auto');*/

                $('#custom_image1').text('Auto');
                $('#myModal1').modal('hide');



            });
        });

        $(function () {
            $(".custom-close10-1").on('click', function() {

                $("#category").val('10');

                /* $('#filesizeidea').text('Travel');*/

                $('#custom_image1').text('Travel');
                $('#myModal1').modal('hide');

            });
        });

        $(function () {
            $(".custom-close11-1").on('click', function() {

                $("#category").val('11');

                /*$('#filesizeidea').text('Beauty');*/

                $('#custom_image1').text('Beauty');
                $('#myModal1').modal('hide');

            });
        });

        $(function () {
            $(".custom-close12-1").on('click', function() {

                $("#category").val('12');

                                                           /* $('#filesizeidea').text('Shopping');
                                                           */
                                                           $('#custom_image1').text('Shopping');
                                                           $('#myModal1').modal('hide');

                                                       });
        });
        $(function () {
            $(".custom-close13-1").on('click', function() {

                $("#category").val('13');

                                                           /* $('#filesizeidea').text('Education');
                                                           */
                                                           $('#custom_image1').text('Education');
                                                           $('#myModal1').modal('hide');

                                                       });
        });

        $(function () {
            $(".custom-close14-1").on('click', function() {

                $("#category").val('14');

                /*$('#filesizeidea').text('Outdoors');*/

                $('#custom_image1').text('Outdoors');
                $('#myModal1').modal('hide');

            });
        });

    //-----------------------------yashraj code close-------------------------- 
</script>

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
                                                            <!-- <input type="text" name="facebook_points" onkeypress="return isNumber(event)" value="" class="form-control" id="points1" maxlength="4" > -->
                                                            <input type="number" name="facebook_points" maxlength="4" value="" class="form-control" id="points1">
                                                            <!-- <p style="display:none">Accepting Minimum 10 Points</p> -->
                                                        </div>
                                                        <p id="error_msg1" style="color: red;" ></p>
                                                    </div>




                                                    <div class="col-md-6">
                                                        <label>Twitter Point <red style="color: red;font-size: 20px;">*</red></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon-twitter twt1"></i></span>
                                                            <input type="hidden" name="tpoints" value="2">
                                                            <!-- <input type="text"  name="twitter_points" onkeypress="return isNumber(event)" value="" class="form-control" id="points2" maxlength="4"> -->
                                                            <input type="number" name="twitter_points" maxlength="4" value="" class="form-control" id="points2">
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
                                                                    <li value="5" >5 Kms</li>
                                                                    <li value="10" class="selected">10 Kms</li>
                                                                    <li value="15" >15 Kms</li>
                                                                    <li value="20" >20 Kms</li>
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

                                            <div id="googleMap" style="width:430px;height:430px;float:right;margin-bottom: 0px;margin-top: -459px;margin-right:-482px;"></div>
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
                                                font-size: 20px;"><?php echo $dash[0]->walking_point; ?></span> 


                                                <div id="googleMap" style="width:353px;height:150px;margin-bottom: 0px;margin-top: -90px;margin-left:-11px;"></div>


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

<!-- map function start -->

<script>
    function myMap() {

        var myLatLng = {lat: <?php echo $dash[0]->store_latitude; ?>, lng: <?php echo $dash[0]->store_longitude; ?>};
        var map = new google.maps.Map(document.getElementById('googleMap'), {
            zoom: 15,
            center: myLatLng
        });
        var marker = new google.maps.Marker({


          position: myLatLng,
          map: map,
          title: 'Hello World!'
      });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyJVU7kDjiv9QA0KkzxUtNnNUhheU64Dc&callback=myMap"></script>

<!-- map function end -->


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
        html = html.substring(0, 55) + "<br>" + html.substring(55);
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
            var offer_name = $('#title').val();

            if(offer_name == ''){
                document.getElementById('error_name').innerHTML="Offer name is required";
                return false;
            }else{
                document.getElementById('error_name').innerHTML="";
            }

            if((imgVal1=='') && (imgVal2==''))
            {
                document.getElementById('filesizeideamsg').innerHTML="Offer image is required";
                return false;   
                
            }else{
                document.getElementById('filesizeideamsg').innerHTML="";

            }

            if( imgVal1 != '' ){

                var fileSize = document.getElementById("filesizeidea").files[0];
                var sizeInMb = (fileSize.size/1024)/1024;
                var sizeLimit= 2;

                if (sizeInMb > sizeLimit) {

                    document.getElementById('filesizeideamsg').innerHTML="Image size must be less than 2MB";
                    return false;

                }else{
                    document.getElementById('filesizeideamsg').innerHTML="";
                }

            }
            
            
            var cat = $('#category').val();
            
            var fb = $('#points1').val();
            var tw = $('#points2').val();
            // var wp = $('#points3').val();
            
            var des = $('#desc').val();
            var terms = $('#terms').val();
            

            var max_point = $('#max_point').val();
            var total = Number(fb)+Number(tw);


            

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
            } else if ( fb <= 3 ) {
                document.getElementById('error_msg1').innerHTML="Minimum 4 Facebook points are required";
                return false;
            } else if(fb % 2 != 0 ){
                document.getElementById('error_msg1').innerHTML="Points should be in multiple of 2";
                return false;
            } else {
                document.getElementById('error_msg1').innerHTML="";
            }

            if(tw == ''){
                document.getElementById('error_msg2').innerHTML="Twitter points are required";
                return false;
            } else if ( tw <= 3) {
                document.getElementById('error_msg2').innerHTML="Minimum 4 Twitter points are required";
                return false;
            } else if (tw % 2 != 0){
                document.getElementById('error_msg2').innerHTML="Points should be in multiple of 2";
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
        }); 
    
});
</script>
</body>

<script type="text/javascript">

    $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);



</script>



</html>
