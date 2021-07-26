<?php $path = TEMP_PATH;?>
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
            .card {
                margin-left: 114px;
            }
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
                            <h4><a href="<?php echo base_url(); ?>index.php/control/viewOffer"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">Offers</span> - Edit Offers</h4>
                            <div class="heading-elements">
                                <div class="heading-btn-group">
                                    <a href="<?php echo base_url(); ?>index.php/control/viewOffer" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-price-tag3"></i></b> View Offers </a>

                                </div>
                            </div>  



                            <ul class="breadcrumb position-right">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">Offers</a></li>
                                <li class="active">Edit Offer</li>
                            </ul>

                        </div>
                    </div>
                </div>
                <!--    <div class="arrow xs-hidden"></div> -->

                <form action="<?php echo base_url(); ?>index.php/control/editOffer/<?php echo $edit_offer[0]->store_offer_id; ?>" enctype="multipart/form-data" method="post">


                    <div class="content">

                        <!-- User profile -->
                        <div class="row">
                            <div class="col-lg-12">
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
                                                        <input type="text" maxlength="40" name="offer_title" value="<?php echo $edit_offer[0]->title;?>" class="form-control" placeholder="Offer Name" id="title">

                                                        <p id="error_name" style="color: red;" ></p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <label class="control-label">Offer Image <red style="color: red;font-size: 20px;">*</red></label>

                                                        <div class="fancy-file-upload fancy-file-primary">

                                                            <input type="file" class="form-control" id="filesizeidea" onchange="jQuery(this).next('input').val(this.value);" name="filenew" accept="image/*" />
                                                            
                                                            <input type="text" class="form-control" name="myfile" id="custom_image" readonly="" value="<?php echo $edit_offer[0]->offer_image;?>" />
                                                            
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

                                            image = images.replace('<?= $path;?>admin/uploads/', '');
                                            $("#custom_image").val(image);
                                                        // alert(images);
                                                        $('#myModal').modal('hide');

                                                        $('#myImg').attr('src', images);

                                                        
                                                    });
                                    });

                                    $(function () {
                                        $(".custom-close2").on('click', function() {

                                            var images = $('.custom-close2 img').attr('src');
                                            image = images.replace('<?= $path;?>admin/uploads/', '');
                                            $("#custom_image").val(image);
                                            $('#myModal').modal('hide');
                                            $('#myImg').attr('src', images);
                                        });
                                    });

                                    $(function () {
                                        $(".custom-close3").on('click', function() {

                                            var images = $('.custom-close3 img').attr('src');
                                            image = images.replace('<?= $path;?>admin/uploads/', '');
                                            $("#custom_image").val(image);
                                            $('#myModal').modal('hide');
                                            $('#myImg').attr('src', images);
                                        });
                                    });

                                    $(function () {
                                        $(".custom-close4").on('click', function() {

                                            var images = $('.custom-close4 img').attr('src');
                                            image = images.replace('<?= $path;?>admin/uploads/', '');
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
                                            <label>Enter Offer Description <red style="color: red;font-size: 20px;">*</red></label>
                                            <textarea name="offer_description" class="form-control" rows="2" cols="1" placeholder="Offer Description" id="desc" maxlength="100" style="max-width: 980px;max-height: 62px;"><?php echo $edit_offer[0]->description;?></textarea>

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
                                                    <input class="form-control" size="30" data-date-start-date="+0d" id="changedate1" value="<?php echo $edit_offer[0]->expiry_date;?>" name="offer_expiry_date" placeholder="Expiry Date" style="font-size: 15px;  " type="text" value="" readonly>
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
                                              <label class="control-label">Select Category <red style="color: red;font-size: 20px;">*</red></label>
                                              <select class="form-control btn-select-arrow  icon-arrow-down15" name="category" selected="<?php echo $edit_offer[0]->category_name;?>">


                                                <?php foreach ($store as $key) { 
                                                    if($edit_offer[0]->category_id == $key->category_id){
                                                        ?>
                                                        <option value="<?php echo $edit_offer[0]->category_id ?>" selected><?php echo $key->name ?></option>

                                                        <?php   }else{ ?>

                                                        <option value="<?php echo $key->category_id ?>"><?php echo $key->name ?></option>
                                                        <?php  } } ?>

                                                    </select>
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



                                                </div>
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
                                                            <input type="text" name="facebook_points" onkeypress="return isNumber(event)" value="<?php echo $edit_offer[0]->facebook_points?>" class="form-control" id="points1" maxlength="4">
                                                        </div>
                                                        <p id="error_msg1" style="color: red;" ></p>
                                                    </div>




                                                    <div class="col-md-6">
                                                        <label>Twitter Point <red style="color: red;font-size: 20px;">*</red></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon-twitter twt1"></i></span>
                                                            <input type="hidden" name="tpoints" value="2">
                                                            <input type="text" name="twitter_points" onkeypress="return isNumber(event)" class="form-control" value="<?php echo $edit_offer[0]->twitter_points; ?>" id="points2" maxlength="4">
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
                                                        <label>Walking  Point <red style="color: red;font-size: 20px;">*</red></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon-user walkin1"></i></span>
                                                            <input type="hidden" name="wpoints" value="3">
                                                            <input type="text" value="<?php echo $edit_offer[0]->walking_points?>" name="walking_points" onkeypress="return isNumber(event)" value="1" class="form-control" id="points3" maxlength="4">
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
                                                        <select class="form-control btn-select-arrow  icon-arrow-down15" id="max_point" name="maximum_point">
                                                            <option <?php if($edit_offer[0]->maximum_point == '100') echo 'selected'; ?> value="100">100</option>
                                                            <option <?php if($edit_offer[0]->maximum_point == '200') echo 'selected'; ?> value="200">200</option>
                                                            <option <?php if($edit_offer[0]->maximum_point == '300') echo 'selected'; ?> value="300">300</option>
                                                            <option <?php if($edit_offer[0]->maximum_point == '400') echo 'selected'; ?> value="400">400</option>
                                                            
                                                        </select>

                                                        <p id="error_point" style="color: red;" ></p>  


                                                        <!-- <label class="control-label">Maximum Point Limit</label>


                                                        <a class="btn btn-default btn-select btn-select-light">
                                                            <input type="hidden" class="btn-select-input" id="" name="" value="" />
                                                            <span class="btn-select-value">Select an Item</span>
                                                            <span class='btn-select-arrow icon-arrow-down15'></span>
                                                            <ul>
                                                                <li>100</li>
                                                                <li class="selected">200</li>
                                                                <li>300</li>
                                                                <li>400</li>
                                                            </ul>
                                                        </a>     -->                
                                                    </div>


                                                    <div class="col-md-6">


                                                        <label class="control-label">Offer Visibility</label>
                                                        <select class="form-control btn-select-arrow  icon-arrow-down15" id="sel1" name="offer_visibility">
                                                            <option <?php if($edit_offer[0]->offer_visibility == '5') echo 'selected'; ?> value="5">5 Kms</option>
                                                            <option <?php if($edit_offer[0]->offer_visibility == '10') echo 'selected'; ?> value="10">10 Kms</option>
                                                            <option <?php if($edit_offer[0]->offer_visibility == '15') echo 'selected'; ?> value="15">15 Kms</option>
                                                            <option <?php if($edit_offer[0]->offer_visibility == '20') echo 'selected'; ?> value="20">20 Kms</option>
                                                            
                                                        </select>


                                                        <!-- <label>Offer Visibility</label>
                                                        <a class="btn btn-default btn-select btn-select-light">
                                                            <input type="hidden" class="btn-select-input" id="" name="" value="" />
                                                            <span class="btn-select-value">Select an Item</span>
                                                            <span class='btn-select-arrow  icon-arrow-down15'></span>
                                                            <ul>
                                                                <li>1 Miles</li>
                                                                <li class="selected">2 Miles</li>
                                                                <li>3 Miles</li>
                                                                <li>5 Miles</li>
                                                            </ul>
                                                        </a>     -->                
                                                    </div>
                                                </div>
                                            </div>                                                  

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Terms & Conditions <red style="color: red;font-size: 20px;">*</red></label>
                                                        <textarea name="offer_terms" class="form-control" style="max-width: 980px;max-height: 62px;" rows="2" cols="1" placeholder="Terms & Conditions" id="terms"><?php echo $edit_offer[0]->text?></textarea>

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

                            
                        </div>



                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>


        <script type="text/javascript">
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

        <script type="text/javascript">

            function isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }




    // $('#filesizeidea').bind('change', function() {

    //   var size = this.files[0].size;

    //   if(size > 2000000){
    //     alert("Maximum file size is 2MB");
    //   }

    // });


</script>


<script>
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
                var value = target.html();
                $(this).find(".btn-select-input").val(value);
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
        document.getElementById('imagedesc').innerHTML = inputBox1.value;
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
    var inputBox6 = document.getElementById('expire');

    inputBox6.onkeyup = function(){
        document.getElementById('imageex').innerHTML = inputBox6.value;
    }



</script>


<script>


        // $(document).ready(function(){
        //     $('#savedata').click(function(){

        //         // alert("No");
        //     var imgVal1 = $('#filesizeidea').val();
        //     var imgVal2 = $('#custom_image').val();

        //     if((imgVal1=='') && (imgVal2==''))
        //     {
        //         document.getElementById('filesizeideamsg').innerHTML="Offer image is required";
        //         return false;   
        //     }else{
        //         document.getElementById('filesizeideamsg').innerHTML="";
        //     }

        //     var fileSize = document.getElementById("filesizeidea").files[0];
        //     var sizeInMb = (fileSize.size/1024)/1024;
        //     var sizeLimit= 2;    

        //     if (sizeInMb > sizeLimit) {

        //             document.getElementById('filesizeideamsg').innerHTML="image size must be less than 2MB";
        //             return false;

        //     }else{
        //             document.getElementById('filesizeideamsg').innerHTML="";
        //     }

        //     });

        // });



        $(document).ready(function () {
            $(".submit").click(function(){
        // alert("asdasd");

        var cat = $('#category').val();
        var fb = $('#points1').val();
        var tw = $('#points2').val();
            // var wp = $('#points3').val();
            var offer_name = $('#title').val();
            var des = $('#desc').val();
            var terms = $('#terms').val();
            

            // var imgVal1 = $('#filesizeidea').val();
            

            

            
            // var fileSize = document.getElementById("filesizeidea").files[0];
            
            

            var max_point = $('#max_point').val();
            var total = Number(fb)+Number(tw);

            if(offer_name == ''){
                document.getElementById('error_name').innerHTML="Offer name is required";
                return false;
            }else{
                document.getElementById('error_name').innerHTML="";
            }

            // alert($("#des").val());

            // if(imgVal1=='')
            // {
            //     document.getElementById('filesizeideamsg').innerHTML="Offer image is required";
            //     return false;   
            // }else{
            //     document.getElementById('filesizeideamsg').innerHTML="";
            // }

            



            

            if(des == ''){
                document.getElementById('error_des').innerHTML="Offer description is required";
                return false;
            }else{
                document.getElementById('error_des').innerHTML="";
            }

            if(cat == '' || cat == '0'){
                document.getElementById('error_category').innerHTML="Category field is required";
                return false;
            }else{
                document.getElementById('error_category').innerHTML="";
            }

            if(fb == ''){
                document.getElementById('error_msg1').innerHTML="Facebook points are required";
                return false;
            } else if ( fb < 4 ) {
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
            } else if ( tw < 4) {
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

            var fileSize = document.getElementById("filesizeidea").files[0];
            var sizeInMb = (fileSize.size/1024)/1024;
            var sizeLimit= 2;   
            // var imgVal2 =  document.getElementById("custom_image").val(); 

            // alert(sizeLimit);

            if (sizeInMb > sizeLimit) {
                document.getElementById('filesizeideamsg').innerHTML="image size must be less than 2MB";
                return false;

            }else{
                document.getElementById('filesizeideamsg').innerHTML="";
            }

            // if(imgVal2=='')
            // {
            //     document.getElementById('filesizeideamsg').innerHTML="Offer image is required";
            //     return false;   
            // }else{
            //     document.getElementById('filesizeideamsg').innerHTML="";
            // }

            
        });
});



</script>
</body>
</html>
