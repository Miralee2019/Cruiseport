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
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/dropzone.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_multiselect.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_inputs.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/legacy.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script> -->

    <style>
    .panel {
        margin-bottom: 20px;
        background-color: white;
        border: 1px solid transparent;
        border-radius: 10px;
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.9)!important;
        box-shadow: 0px 3px 3px rgba(0,0,0,.5)!important;

    }
    .btn{
        z-index: 23!important;
    }
    .input-group .form-control {
        width: 101%;
    }
    .map-wrapper{
        height: 200px;
    }
    .login-container .page-container {
        padding-top: 0px;
        position: static;
    }
    .panel-body{
        padding:30px;
    }
    .picker--focused .picker__list-item--selected, .picker__list-item--selected, .picker__list-item--selected:hover {
        background-color: #01a8f6;
    }
    .picker__list-item:focus, .picker__list-item:hover {
        cursor: pointer;
        background-color:#01a8f6;
        z-index: 10;
        color:white;
    }
    .icon-object {
        text-align: center;
        border-width: 5px;
        border-style: solid;
        padding: 10px;
        padding-top: 20px;
        background: #01a8f6;
        border-radius: 50%
        border-color:white;
    }
    .dropzone {
        min-height: 200px!important;
        width:200px;
    }
    .dropzone .dz-preview, .dropzone-previews .dz-preview {
        border:none!important;
    }

    .scrollable-menu {

        height: auto;
        max-height: 200px;
        overflow-x: hidden;
    }

    @media (min-width: 320px) and (max-width: 980px){

        .dropzone.dz-clickable, .dropzone.dz-clickable , .dropzone.dz-clickable  span {
            cursor: pointer;
            left: -65px;
        }
    }

    .select_style{
        width: 410px; height: 36px; border: solid 1px #ddd; border-radius: 15px 15px 15px 15px;
    }

</style>
<!--shesh code start-->
<script type="text/javascript">
    // function address(val) {
    //     var address = val;
    //     var country = val.split(',').pop();
    //     var strnew = address.substr(0, address.length-country.length);

    //     var zipcode1 = strnew.split(' ').pop();
    //     var zipcode = zipcode1.substr(0,zipcode1.length-1);
    //     if(zipcode!=="") {
    //         $('#zipcode').val(zipcode);
    //     } else {

    //     }
    //     var strnew1 = strnew.substr(0, strnew.length-zipcode.length);
    //     var state = strnew1.split(',').pop();
    //     var state1 = state.substr(1,state.length-3);
    //     var selectedText = state1;
    //     $('#state option').map(function () {
    //         if ($(this).text() == selectedText){
    //             $(this).prop('selected',true);
    //         }
    //     });
    //     var strnew2 = strnew1.substr(0, strnew1.length-state.length);
    //     var city1 = strnew2.split(', ').pop();
    //     var city=city1.substr(0,city1.length-1);

    //     if(city!==""){
    //         $('#city').val(city);
    //     }else{

    //     }
    // }
</script>
</head>

<body class="login-container login-cover1">

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">
                <div class="col-lg-8 col-lg-offset-2 store">
                    <div class="text-center">
                        <div class="icon-object store-icon"><img src="<?php echo base_url(); ?>assets/images/logo_icon_light.png" style="height: 42px;">
                        </div>
                    </div>
                    <h1 class="text-center"> Store Registration </h1>
                    <p class="text-center"><small style='color:white;' > Provide Your Business Details To Join Us ....!!!</small></p>
                </div>

                <!-- Content area -->
                <div class="content">


                    <!-- Registration form -->

                    <form name="myForm" action="<?php echo base_url(); ?>index.php/control/new_store_register" method="post">


                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2" >

                                <div class="panel registration-form">
                                    <div class="panel-body">
                                        <div align="center">
                                            <h3 style="color: red;"><?php echo $this->session->flashdata('register_error'); ?><h3>
                                            </div>


                                            <div class="row">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-5 col-md-offset-5" style="margin-left: 36.667%;">
                                                                <red style="color: red;font-size: 20px;">*</red>
                                                                <div action="<?php echo base_url(); ?>index.php/control/new_store_register" class="dropzone" id="dropzone_single"><div class="dz-message dz-default"><span>Upload Your Store Logo</span></div></div>
                                                                <br><p>Max file size is 2MB</p>
                                                                <p style="color: red;" id="image_error"></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class='form-group'>
                                                        <div class='row'>
                                                            <div class="col-md-12 col-md-offset-0">
                                                                <label class="control-label">Business Name <red style="color: red;font-size: 20px;">*</red></label>
                                                                <input type="text" placeholder="Business Name" class="form-control" style="border-radius:15px;" name="business_name" id="busi_name" value="<?php echo set_value('business_name'); ?>">
                                                                <h6 style="color: red;float: left;" ><?php echo form_error('business_name'); ?></h6>
                                                                <span id="busi_nameerror" style="color: red;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <fieldset>
                                                    <hr/>
                                                    <p class='signup-heading'><i class='icon-user'></i> Account Details</p>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Email Address <red style="color: red;font-size: 20px;">*</red></label>
                                                                <input type="text" name="email"  placeholder="Enter Email Address" class="form-control" id="email" value="<?php echo set_value('email') ;?>">
                                                                <h6 style="color: red;float: left;" ><?php echo form_error('email'); ?></h6>
                                                                <!-- <p id="error_email" style="color: red;"></p> -->
                                                                <span id="emailerror" style="color: red;"></span>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Password <red style="color: red;font-size: 20px;" >*</red> </label>
                                                                <input type="password" minlength="6" maxlength="12" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" class="form-control" id="pass_value"  >
                                                                <h6 style="color: red;float: left;" ><?php echo form_error('password'); ?></h6>
                                                                <span id="passerror" style="color: red;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>

                                                    <div class="form-group">
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <label>Confirm Password <red style="color: red;font-size: 20px;" >*</red> </label>
                                                                <input type="password" minlength="6" maxlength="12" name="confirmpassword" placeholder="Confirm Password" class="form-control" value="<?php echo set_value('confirmpassword'); ?>" id="cpass_value" >
                                                                <h6 style="color: red;float: left;" ><?php echo form_error('confirmpassword'); ?></h6>
                                                                <!-- <p id="error_cpass" style="color: red;"></p> -->
                                                                <!-- <p id="error_msg3" style="color: red;"></p>  -->
                                                                <span id="cpasserror" style="color: red;"></span>
                                                            </div>



                                                            <div class="col-md-6">
                                                                <label>Mobile Number <red style="color: red;font-size: 20px;" >*</red></label>
                                                                <input type="text" minlength="10" maxlength="10" name="phone" placeholder="Enter Mobile number" class="form-control" id="mobile_number" onkeypress="return isNumber(event)" value="<?php echo set_value('phone'); ?>">
                                                                <h6 style="color: red;float: left;" ><?php echo form_error('phone'); ?></h6>
                                                                <!-- <p id="error_mob" style="color: red;"></p>  -->
                                                                <span id="mobileerror" style="color: red;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>


                                                <fieldset>
                                                    <hr/>
                                                    <p class='signup-heading'><i class=" icon-map"></i> Address Details</p>

                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group has-feedback">
                                                                <label class="control-label"> Address Line-1 <red style="color: red;font-size: 20px;" >*</red> </label>
                                                                <input type="text" name="address1" class="form-control myadd" placeholder="Address Line-1" value="<?php echo set_value('address1'); ?>" id="us2-address">
                                                                <div class="form-control-feedback" style="top:30px;">
                                                                    <i class="icon-home8 text-muted"></i>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group has-feedback multi-select-full">

                                                                <label class="control-label">State<red style="color: red;font-size: 20px;">*</red></label>

                                                                <div class="multi-select-full">


                                                                    <select name="state" id="state" class="select_style" value="<?php echo set_value('state'); ?>">
                                                                        <option value="0" selected>Select state</option>
                                                                        <option value="1">Andhra Pradesh</option>
                                                                        <option value="2">Arunachal Pradesh</option>
                                                                        <option value="3">Assam</option>
                                                                        <option value="4">Bihar</option>
                                                                        <option value="5">Chandigarh</option>
                                                                        <option value="6">Chhattisgarh</option>
                                                                        <option value="7">Goa</option>
                                                                        <option value="8">Gujarat</option>
                                                                        <option value="9">Haryana</option>
                                                                        <option value="9">Himachal Pradesh</option>
                                                                        <option value="10">Jammu and Kashmir</option>
                                                                        <option value="11">Jharkhand</option>
                                                                        <option value="12">Karnataka</option>
                                                                        <option value="13">Kerala</option>
                                                                        <option value="14">Madhya Pradesh</option>
                                                                        <option value="15">Maharashtra</option>
                                                                        <option value="16">Manipur</option>
                                                                        <option value="17">Meghalaya</option>
                                                                        <option value="18">Mizoram</option>
                                                                        <option value="19">Nagaland</option>
                                                                        <option value="20">Odisha</option>
                                                                        <option value="21">Punjab</option>
                                                                        <option value="22">Rajasthan</option>
                                                                        <option value="23">Sikkim</option>
                                                                        <option value="24">Tamil Nadu</option>
                                                                        <option value="25">Telangana</option>
                                                                        <option value="26">Tripura</option>
                                                                        <option value="27">Uttar Pradesh</option>
                                                                        <option value="28">Uttarakhand</option>
                                                                        <option value="29">West Bengal</option>


                                                                    </select>
                                                                    <span id="stateerror" style="color: red;"></span>
                                                                    <h6 style="color: red;float: left;" ><?php echo form_error('state'); ?></h6>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class='row'>


                                                        <div class="col-md-6" >
                                                            <div class="form-group has-feedback">
                                                                <label class="control-label"> City <red style="color: red;font-size: 20px;" >*</red> </label>
                                                                <input type="text" name="city" class="form-control" placeholder="City" id="city" value="<?php echo set_value('city'); ?>">
                                                                <div class="form-control-feedback" style="top:30px;">
                                                                    <i class="icon-home8 text-muted"></i>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group has-feedback">
                                                                <label class="control-label"> Zip Code <red style="color: red;font-size: 20px;" >*</red></label>


                                                                <input type="text" name="zipcode" class="form-control" minlength="6" maxlength="6" onkeypress="return isNumber(event)" id="zipcode" placeholder="Zip Code" value="<?php echo set_value('zipcode'); ?>" >
                                                                <h6 style="color: red;float: left;" ><?php echo form_error('zipcode'); ?></h6>
                                                                <div class="form-control-feedback" style="top:37px;">
                                                                    <i class=" icon-direction text-muted"></i>
                                                                </div>
                                                                <span id="ziperror" style="color: red;"></span>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group has-feedback">
                                                                <label class="control-label"> Latitude</label>
                                                                <input type="text" name="latitude"  class="form-control" placeholder="Latitude" value="22.7195687"  id="us2-lat" readonly="readonly">
                                                                <div class="form-control-feedback" style="top:30px;">
                                                                    <i class="icon-location3 text-muted"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group has-feedback">
                                                                <label class="control-label"> Longitude</label>
                                                                <input type="text" name="longitude" class="form-control" placeholder="Longitude" value="75.8577258"  id="us2-lon" readonly="readonly">
                                                                <div class="form-control-feedback" style="top:30px;">
                                                                    <i class="icon-location4 text-muted"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-top: 20px;">
                                                        <label class="control-label">Locate Your Store</label>
                                                        <div id="myMap" class="map-wrapper"></div>
                                                    </div>


                                                </fieldset>



                                                <fieldset>
                                                    <hr/>
                                                    <p class='signup-heading'><i class=" icon-office"></i> Business Details</p>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group has-feedback">

                                                                <label class="control-label">Business Category<red style="color: red;font-size: 20px;">*</red></label>
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
                                                                <span id="categoryerror" style="color: red;"></span>
                                                                <h6 style="color: red;float: left;" ><?php echo form_error('category'); ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group has-feedback" >
                                                                <label class="control-label"> Opening Hours<red style="color: red;font-size: 20px;">*</red></label>
                                                                <input type="text" name="opening_hours" class="form-control pickatime" placeholder="Opening Hours" id="opening" value="<?php echo set_value('opening_hours'); ?>">
                                                                <h6 style="color: red;float: left;" ><?php echo form_error('opening_hours'); ?></h6>
                                                                <div class="form-control-feedback" style="top:37px;">
                                                                    <i class="icon-alarm-check text-muted"></i>
                                                                </div>
                                                                <span id="timeErroropen" style="color: red;"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group has-feedback">
                                                                <label class="control-label"> Closing Hours<red style="color: red;font-size: 20px;">*</red></label>
                                                                <input type="text" name="closing_hours" class="form-control pickatime" placeholder="Closing Hours" id="closing" value="<?php echo set_value('closing_hours'); ?>">
                                                                <h6 style="color: red;float: left;" ><?php echo form_error('closing_hours'); ?></h6>
                                                                <div class="form-control-feedback" style="top:37px;">
                                                                    <i class="icon-alarm-cancel text-muted"></i>
                                                                </div>
                                                                <span id="timeErrorclose" style="color: red;"></span>
                                                                <span style="color:red" id="timeError"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group" style="margin-top: -20px;">

                                                            <div class="col-md-12">

                                                                <label class="control-label"> Store Description</label>
                                                                <!--shesh_Code Sart *-->
                                                                <textarea name="description" id="des_value" class="form-control" placeholder="Your Store Description" style="max-height: 62px; max-width: 797px;"><?php echo set_value('description'); ?></textarea>
                                                                <!-- shesh_code end (chnages set value) -->
                                                                <h6 style="color: red;float: left;" ><?php echo form_error('description'); ?></h6>
                                                                <span style="color:red" id="des_error"></span>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </fieldset>

                                                <div class="row" style="margin-top: 30px;">
                                                    <div class="col-md-12 text-center">
                                                        <input class="btn btn-submit bg-blue launch-modal" type="Submit" name="" value=" SignUp ">
                                                        <a  href="<?php echo base_url(); ?>index.php/control/login" style="padding-top: 10px;padding-bottom: 10px;padding-left: 30px;padding-right: 30px;font-size: 17px;" class="btn btn-primary bg-blue launch-modal">Login <i class="icon-arrow-right14 position-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- /page content -->
    <div  id="invoice" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="document.location.href='login.html';" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title text-center">Congratulations....</h2>
                </div>

                <div class="panel-body">
                    <div class="chart-container">
                        <div class="row">


                            <div class="panel-info">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="text-center" style='margin-top: -40px; '>
                                            <img src="<?php echo base_url(); ?>assets/images/tick.png"/>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <h3> Your Store Is Successfully Registered With Us !!!!</h3>
                                            <h6> Click Here To Login Into Your Store</h6>
                                            <button onclick="document.location.href='login.html';" class="btn nextBtn btn-lg pull-center" type="Submit" style="clear:both; margin-top:50px;">  <i class=" icon-arrow-right15"></i> Login</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p id="demos"></p>

    <input type="hidden" name="lat" value="" id="lat">
    <input type="hidden" name="long" value="" id="long">
    <script type="text/javascript">

        $("#dropzone_single").dropzone({
            acceptedFiles: 'image/*',
            maxFilesize: 2,                                 //MB
            maxFiles: 1,
            addRemoveLinks: true,
            dictDefaultMessage: 'Drop file to upload <span>or CLICK</span>',

            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                });
            }
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
                    $(this).find(".btn-select-value").html(value);
                }
                ul.hide();
                $(this).removeClass("active");
            }
            else {
                $('.btn-select').not(this).each(function () {
                    $(this).removeClass("active").find("ul").hide();
                });
                ul.slideDown(300);
                $(this).addClass("active");
            }
        });

        $(document).on('click', function (e) {
            var target = $(e.target).closest(".btn-select");
            if (!target.length) {
                $(".btn-select").removeClass("active").find("ul").hide();
            }
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAPQXi7ZBZ73SPXi7JfHycSCi30thvQGCg&amp;sensor=false&amp;libraries=places"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            
            var geocoder = new google.maps.Geocoder();
            var myval = "La Valle Casa Road, Bavdhan, Pune, Maharashtra 411021, India";

            // var myval = $('.myadd').val();

            geocoder.geocode( {'address': myval}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();

                    $('#lat').val(results[0].geometry.location.lat());
                    $('#long').val(results[0].geometry.location.lng());


                    var map;
                    var marker;
                    var myLatlng = new google.maps.LatLng(latitude,longitude);
                    var geocoder = new google.maps.Geocoder();
                    var infowindow = new google.maps.InfoWindow();
                    initialize();

                    function initialize(){
                        var mapOptions = {
                            zoom: 18,
                            center: myLatlng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };

                        map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

                        marker = new google.maps.Marker({
                            map: map,
                            position: myLatlng,
                            draggable: true
                        });
                        geocoder.geocode({'latLng': myLatlng }, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    $('#latitude,#longitude').show();
                                    $('#us2-address').val(results[0].formatted_address);
                                    $('#us2-lat').val(marker.getPosition().lat());
                                    $('#us2-lon').val(marker.getPosition().lng());
                                    infowindow.setContent(results[0].formatted_address);
                                    infowindow.open(map, marker);
                                }
                            }
                        });
                        google.maps.event.addListener(marker, 'dragend', function() {

                            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    if (results[0]) {
                                        $('#us2-address').val(results[0].formatted_address);
                                        $('#us2-lat').val(marker.getPosition().lat());
                                        $('#us2-lon').val(marker.getPosition().lng());
                                        infowindow.setContent(results[0].formatted_address);
                                        infowindow.open(map, marker);

                                            var address = results[0].formatted_address;
                        var country = results[0].formatted_address.split(',').pop();
                        var strnew = address.substr(0, address.length-country.length);
  // console.log(results);
                        var zipcode1 = strnew.split(' ').pop();
                        var zipcode = zipcode1.substr(0,zipcode1.length-1);

                        if(zipcode!=="" && !isNaN(zipcode)) {
                            $('#zipcode').val(zipcode);
                        }

                          var strnew1 = strnew.substr(0, strnew.length-zipcode.length);
                        var state = strnew1.split(',').pop();
                        var state1 = state.substr(1,state.length-3);
                        var selectedText = state1;
                        $('#state option').map(function () {
                            if ($(this).text() == selectedText){
                                $(this).prop('selected',true);
                            }
                        });
                        var strnew2 = strnew1.substr(0, strnew1.length-state.length);
                        var city1 = strnew2.split(', ').pop();
                        var city=city1.substr(0,city1.length-1);

                        if(city!==""){
                            $('#city').val(city);
                        }else{

                        }
                                    }
                                }
                            });
                        });
                        var address = results[0].formatted_address;
                        var country = results[0].formatted_address.split(',').pop();
                        var strnew = address.substr(0, address.length-country.length);

                        var zipcode1 = strnew.split(' ').pop();
                        var zipcode = zipcode1.substr(0,zipcode1.length-1);
                        if(zipcode!=="") {
                            $('#zipcode').val(zipcode);
                        } else {

                        }
                        var strnew1 = strnew.substr(0, strnew.length-zipcode.length);
                        var state = strnew1.split(',').pop();
                        var state1 = state.substr(1,state.length-3);
                        var selectedText = state1;
                        $('#state option').map(function () {
                            if ($(this).text() == selectedText){
                                $(this).prop('selected',true);
                            }
                        });
                        var strnew2 = strnew1.substr(0, strnew1.length-state.length);
                        var city1 = strnew2.split(', ').pop();
                        var city=city1.substr(0,city1.length-1);

                        if(city!==""){
                            $('#city').val(city);
                        }else{

                        }
                    }
                }
            });
        });

        $(".btn-submit").click(function(){
            var start = $("#opening").val();
            var end = $("#closing").val();
            var state = $("#state").val();
            var category = $("#category").val();
            var busi_name = $("#busi_name").val();
            var email = $("#email").val();
            var pass = $("#pass_value").val();
            var cpass = $("#cpass_value").val();
            var mobile = $("#mobile_number").val();
            var zip = $("#zip_code").val();
            var des = $("#des_value").val();
            var image_here = $(".dz-filename").html();

            var size = $('.dz-size').find("strong").text();
            var s = $('.dz-size').html();

            if(size > 2){
                var find_extension = s.match(/MB/g);

                if(find_extension == "MB"){
                    document.getElementById("image_error").innerHTML ='File is too big.Max filesize is 2MB';
                    return false ;
                }else{
                    document.getElementById("image_error").innerHTML = '';
                }
            }


            if(image_here == undefined){
                document.getElementById("image_error").innerHTML ='Please upload your store logo';
                return false ;
            }else{
                document.getElementById("image_error").innerHTML = '';
            }


            if(start == ''){
                document.getElementById("timeErroropen").innerHTML ='Opening time is required';
                return false ;

            }else{
                document.getElementById("timeErroropen").innerHTML = '';

            }

            if(end == ''){
                document.getElementById("timeErrorclose").innerHTML = 'Closing time is required';
                return false ;
            } else {
                document.getElementById("timeErrorclose").innerHTML = '';
            }

            if(category == ''){
                document.getElementById("categoryerror").innerHTML = 'Category is required';
                return false ;
            } else {
                document.getElementById("categoryerror").innerHTML = '';
            }



            if(start != ''){

                var re = /^([012]?\d):([0-6]?\d)\s*(a|p)m$/i;

                time1 = start;
                time2 = end;


                time1 = time1.match(re);
                time2 = time2.match(re);


                if(time1 && time2){
                    var is_pm1 = /p/i.test(time1[3]) ? 12 : 0;
                    var hour1 = (time1[1]*1 + is_pm1) ;
                    var is_pm2 = /p/i.test(time2[3]) ? 12 : 0;
                    var hour2 = (time2[1]*1 + is_pm2);
                    if(hour1 == 12){
                        var hour1 = 0;
                    }

                    if(hour1 == 24){
                        var hour1 = 12;
                    }

                    if(hour2 == 12){
                        var hour2 = 0;
                    }

                    if(hour2 == 24){
                        var hour2 = 12;
                    }
                    var minute1 = time1[2]*1;
                    var minute2 = time2[2]*1;

                    if(hour1 > hour2){
                        document.getElementById("timeError").innerHTML='Opening time should be less than the closing time';
                        return false;
                    }

                    if(hour1 == hour2){

                        if(minute2 > minute1){
                            document.getElementById("timeError").innerHTML='';
                        }else if(minute2 == minute1){
                            document.getElementById("timeError").innerHTML='Opening time and closing time should not be same';
                            return false;
                        }else{
                            document.getElementById("timeError").innerHTML='Opening time should be less than closing time.';
                            return false;
                        }
                    }

                }
            }
        });

        $("#opening").click(function(){
            var open = $("#opening").val();
            $("#data").val(open);
        });

        $("#cpass_value").blur(function(){

            var pass = $("#pass_value").val();
            var cpass = $("#cpass_value").val();

            if(pass != cpass){
                $('#error_cpass').text("Password doesn't match");
                $('#error_cpass').show(0).delay("1000").hide(0);
            }
        });        

        $("#us2-address").blur(function(){

            var geocoder = new google.maps.Geocoder();
            // var address = "new york";
            var myval = $('.myadd').val();

            geocoder.geocode( {'address': myval}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();

                    $('#lat').val(results[0].geometry.location.lat());
                    $('#long').val(results[0].geometry.location.lng());

                    var map;
                    var marker;
                    var myLatlng = new google.maps.LatLng(latitude,longitude);
                    var geocoder = new google.maps.Geocoder();
                    var infowindow = new google.maps.InfoWindow();

                    initialize();

                    function initialize(){
                        var mapOptions = {
                            zoom: 18,
                            center: myLatlng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        map = new google.maps.Map(document.getElementById("myMap"), mapOptions);
                        marker = new google.maps.Marker({
                            map: map,
                            position: myLatlng,
                            draggable: true
                        });
                        geocoder.geocode({'latLng': myLatlng }, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                 //   alert("In lat long");
                                    console.log(results[0]);
                                    $('#latitude,#longitude').show();
                                    $('#us2-address').val(results[0].formatted_address);
                                    $('#us2-lat').val(marker.getPosition().lat());
                                    $('#us2-lon').val(marker.getPosition().lng());
                                    infowindow.setContent(results[0].formatted_address);
                                    infowindow.open(map, marker);

                                        var address = results[0].formatted_address;
                        var country = results[0].formatted_address.split(',').pop();
                        var strnew = address.substr(0, address.length-country.length);
  // console.log(results);
                        var zipcode1 = strnew.split(' ').pop();
                        var zipcode = zipcode1.substr(0,zipcode1.length-1);

                        if(zipcode!=="" && !isNaN(zipcode)) {
                            $('#zipcode').val(zipcode);
                        }
                                }
                            }
                        });

                        google.maps.event.addListener(marker, 'dragend', function() {
                            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    if (results[0]) {
                                     //   alert("In dragend");
                                     console.log(results[0])
                                        $('#us2-address').val(results[0].formatted_address);
                                        $('#us2-lat').val(marker.getPosition().lat());
                                        $('#us2-lon').val(marker.getPosition().lng());
                                        infowindow.setContent(results[0].formatted_address);
                                        infowindow.open(map, marker);

                                           var address = results[0].formatted_address;
                        var country = results[0].formatted_address.split(',').pop();
                        var strnew = address.substr(0, address.length-country.length);
  // console.log(results);
                        var zipcode1 = strnew.split(' ').pop();
                        var zipcode = zipcode1.substr(0,zipcode1.length-1);

                        if(zipcode!=="" && !isNaN(zipcode)) {
                            $('#zipcode').val(zipcode);
                        }

                          var strnew1 = strnew.substr(0, strnew.length-zipcode.length);
                        var state = strnew1.split(',').pop();
                        var state1 = state.substr(1,state.length-3);
                        var selectedText = state1;
                        $('#state option').map(function () {
                            if ($(this).text() == selectedText){
                                $(this).prop('selected',true);
                            }
                        });
                        var strnew2 = strnew1.substr(0, strnew1.length-state.length);
                        var city1 = strnew2.split(', ').pop();
                        var city=city1.substr(0,city1.length-1);

                        if(city!==""){
                            $('#city').val(city);
                        }else{

                        }
                                    }
                                        
                                }
                            });
                        });

                        var address = results[0].formatted_address;
                        var country = results[0].formatted_address.split(',').pop();
                        var strnew = address.substr(0, address.length-country.length);
  // console.log(results);
                        var zipcode1 = strnew.split(' ').pop();
                        var zipcode = zipcode1.substr(0,zipcode1.length-1);

                        if(zipcode!=="" && !isNaN(zipcode)) {
                            $('#zipcode').val(zipcode);
                        }
                        var strnew1 = strnew.substr(0, strnew.length-zipcode.length);
                        var state = strnew1.split(',').pop();
                        var state1 = state.substr(1,state.length-3);
                        var selectedText = state1;
                        $('#state option').map(function () {
                            if ($(this).text() == selectedText){
                                $(this).prop('selected',true);
                            }
                        });
                        var strnew2 = strnew1.substr(0, strnew1.length-state.length);
                        var city1 = strnew2.split(', ').pop();
                        var city=city1.substr(0,city1.length-1);

                        if(city!==""){
                            $('#city').val(city);
                        }else{

                        }
                    }
                }
            });
});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/prism.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/uploader_dropzone.js"></script>
</body>
</html>