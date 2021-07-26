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
                <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
                <link href="<?php echo base_url(); ?>assets/css/example.wink.css" rel="stylesheet" type="text/css">

                <!-- /global stylesheets -->

                <!-- Core JS files -->

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
                <!-- /core JS files -->

                <!-- Theme JS files -->
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/fileinput.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_multiselect.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/uploader_bootstrap.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/dropzone.min.js"></script>
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
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/hideShowPassword.min.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/echarts/echarts.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/user_pages_profile.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>
                <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>        
                <!-- /theme JS files -->
                <style>
                .btn{
                    margin-left: -10px!important;
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

                .dropzone .dz-default.dz-message:before{
                    z-index: -2;
                }

            </style>

            <!--shesh code start-->
            <script type="text/javascript">
                function address1(val) {
        //alert(val);
        var address = val;
        var country = val.split(',').pop();

        //ar country1 = country.substr(1,country.length-1);
       //alert(country);

        //alert(address);
        var strnew = address.substr(0, address.length-country.length);
        //var newadd =address.replace(/\s+$/, '');
        //alert(strnew);

        var zipcode1 = strnew.split(' ').pop();
        var zipcode = zipcode1.substr(0,zipcode1.length-1);
        if(zipcode!=="")
        {
            $('#zipcode').val(zipcode);
        }
        else
        {

        }
        var strnew1 = strnew.substr(0, strnew.length-zipcode.length);
        var state = strnew1.split(',').pop();
        var state1 = state.substr(1,state.length-3);

        //alert(state1.length);
        //alert(state1);

        /*function SetDropDownByText() {*/
            // Now set dropdown selected option to 'Admin'.
            // $("#tstateop").prop('selected',true);
            var selectedText = state1;
            $('#state option').map(function () {
                if ($(this).text() == selectedText){
                 $(this).prop('selected',true);
             }
         })
            /* }*/
      // $('option:selected', 'select[name="options"]').removeAttr('selected');


      var strnew2 = strnew1.substr(0, strnew1.length-state.length);
        //alert(strnew2);
        var city1 = strnew2.split(', ').pop();
        var city=city1.substr(0,city1.length-1);

        /*if(city!=="")
        {
        $('#city').val(city);
        }
        else
        {
            
        }*/
        

    }
</script>

<script type="text/javascript">
    /*function address(val) {

*/        //alert(val);

       // $(document).ready(function(){
        $('#us2-address').on('change',function(val){
            //alert('coming');
            var address = val;
            var country = val.split(',').pop();

        //ar country1 = country.substr(1,country.length-1);
        //alert(country);

        //alert(address);
        var strnew = address.substr(0, address.length-country.length);
        //var newadd =address.replace(/\s+$/, '');
        //alert(strnew);

        var zipcode1 = strnew.split(' ').pop();
        var zipcode = zipcode1.substr(0,zipcode1.length-1);
        if(zipcode!=="")
        {
            $('#zipcode').val(zipcode);
        }
        else
        {

        }
        var strnew1 = strnew.substr(0, strnew.length-zipcode.length);
        var state = strnew1.split(',').pop();
        var state1 = state.substr(1,state.length-3);

        //alert(state1.length);
        //alert(state1);

        /*function SetDropDownByText() {*/
            // Now set dropdown selected option to 'Admin'.
             //$("#tstateop").prop('selected',true);
             var selectedText = state1;
             $('#state option').map(function () {
                if ($(this).text() == selectedText){
                 $(this).prop('selected',true);
             }
         })
             /* }*/
      // $('option:selected', 'select[name="options"]').removeAttr('selected');


      var strnew2 = strnew1.substr(0, strnew1.length-state.length);
        //alert(strnew2);
        var city1 = strnew2.split(', ').pop();
        var city=city1.substr(0,city1.length-1);

       /* if(city!=="")
        {
        $('#city').val(city);
        }
        else
        {
            
        }*/
        

    });
    //});
</script>
<style>
.select_style{
    width: 482px; height: 36px; border: solid 1px #ddd; border-radius: 15px 15px 15px 15px; 
}
</style>
<!--shesh code end-->

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
                            <h4><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-arrow-left15 position-left"></i></a><span class="text-semibold"><?php echo $profile[0]->store_first_name; ?></span> - Profile</h4>

                            <ul class="breadcrumb position-right">
                                <li><a href="<?php echo base_url(); ?>index.php/control/home">Home</a></li>
                                <li class="active">Profile</li>

                            </ul>
                        </div>


                    </div>

                </div>

                <div class="content">

                    <div class="row">

                        <div class="col-lg-12">
                            <div>
                                <div>
                                    <!-- Profile info -->
                                    <form action="<?php echo base_url();?>index.php/control/editProfile" method="post">

                                        <div id="hidemenow">

                                            <?php
                                            if ($this->session->flashdata()) {
                                                echo $this->session->flashdata('message');
                                            }
                                            ?>

                                        </div>



                                        <div class="panel panel-flat">


                                            <div class="panel-heading">



                                                <h6 class="panel-title"><b><?php echo $profile[0]->store_first_name; ?> - information</b></h6>
                                            </div>

                                            <div class="panel-body">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-5 col-md-offset-5" style="margin-left: 36.667%;">

                                                            <red style="color: red;font-size: 20px;">*</red>
                                                            <div action="<?php echo base_url(); ?>index.php/control/editProfile" class="dropzone" id="dropzone_single">

                                                                <p style="color: red;" id="image_error"></p>

                                                                <input type="hidden" name="image_file" value="<?php echo $profile[0]->store_logo; ?>">

                                                                <img src="<?php echo base_url(); ?>uploads/<?php echo $profile[0]->store_logo; ?>" style="width:100%" class="hideme sadagd" /> 
                                                                <!-- class="hideme" -->

                                                                <div class="dz-message dz-default">

                                                                    <span style='color: #fff;'></span></div></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class='form-group' style="margin-top: -10px;text-align: center;">
                                                            <div class='row'>
                                                                <div class="col-md-6 col-md-offset-3">
<!--    <label class="control-label">Business Name
    <label> -->
        <!-- <input type="text"  Value="<?php echo $profile[0]->store_first_name; ?>" name="business_name" class="form-control"> -->
    </div>
</div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Email Address</label>
            <red style="color: red;font-size: 20px;">*</red>
            <input type="email" value="<?php echo $profile[0]->store_email; ?>" placeholder="Provide Your Email" class="form-control" disabled>

            <input type="hidden" value="<?php echo $profile[0]->store_email; ?>" placeholder="Provide Your Email" name="email" class="form-control" >

        </div>
      <?php  /* <div class="col-md-6">
            <label>Password</label>
            <red style="color: red;font-size: 20px;">*</red>

            <input type="password" minlength="6" maxlength="12" placeholder="Password" value="<?php echo $profile[0]->store_password; ?>" id="pass_value" name="password" class="form-control">
            <span id="pass_error" style="color: red;"></span>
        </div>
       */ ?>
    </div>
</div>                                        

<div class="form-group">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group has-feedback">
                <label class="control-label">Business Name</label>
                <red style="color: red;font-size: 20px;">*</red>
                <input type="text" class="form-control" value="<?php echo $profile[0]->store_first_name ?>" placeholder="Store Name" name="business_name" id="busi_name" >
                <div class="form-control-feedback" style="margin-top: 7px;">
                    <i class="icon-store2 text-muted"></i>
                </div>
                <span id="busi_error" style="color: red;"></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback">
                <label class="control-label"> Business Category</label>

                <red style="color: red;font-size: 20px;">*</red>

                <a class="btn btn-default btn-select btn-select-light" style="margin-top:0px; margin-left: 0px!important;">

                    <input type="hidden" class="btn-select-input form-control" id="category" name="category" value="<?php if($profile[0]->category == 1){ echo "1"; }elseif ($profile[0]->category == 2) { echo "2"; } elseif ($profile[0]->category == 3) { echo "3";}elseif ($profile[0]->category == 4){  echo "4"; } elseif ($profile[0]->category == 5) { echo "5";} elseif ($profile[0]->category == 6) { echo "6";} elseif ($profile[0]->category == 7) { echo "7";} elseif ($profile[0]->category == 8) { echo "8";} elseif ($profile[0]->category == 9) { echo "9";} elseif ($profile[0]->category == 10) { echo "10";} elseif ($profile[0]->category == 11) { echo "11";} elseif ($profile[0]->category == 12) { echo "12";} elseif ($profile[0]->category == 13) { echo "13";} elseif ($profile[0]->category == 14) { echo "14";} else{ echo "N/A"; } ?>" />

                    <span class="btn-select-value"><?php if($profile[0]->category == 1){ echo "Food"; }elseif ($profile[0]->category == 2) { echo "Lifestyle"; }elseif ($profile[0]->category == 3) { echo "Electronics";}elseif ($profile[0]->category == 4){  echo "Entertainment"; } elseif ($profile[0]->category == 5){  echo "Drinks"; } elseif ($profile[0]->category == 6){  echo "Health"; } elseif ($profile[0]->category == 7){  echo "Fitness"; } elseif ($profile[0]->category == 8){  echo "Home"; } elseif ($profile[0]->category == 9){  echo "Auto"; } elseif ($profile[0]->category == 10){  echo "Travel"; } elseif ($profile[0]->category == 11){  echo "Beauty"; } elseif ($profile[0]->category == 12){  echo "Shopping"; } elseif ($profile[0]->category == 13){  echo "Education"; } elseif ($profile[0]->category == 14){  echo "OutDoors"; } else { echo "N/A"; } ?></span>
                    <span class='btn-select-arrow icon-arrow-down15'></span>

                    <ul>
                        <!-- <li class="disabled"> Select Category</li> -->


                        <?php foreach ($store as $key) { ?>

                        <li value="<?php echo $key->category_id; ?>"><?php echo $key->name; ?></li>
                        <?php } ?>

                    </ul>
                </a>

                <span id="category_error" style="color: red;"></span>
            </div>
        </div>
    </div>

</div>



<div class="form-group">
    <div class="row">

        <div class="col-md-6"> 

            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label"> Opening Hours</label>
                    <red style="color: red;font-size: 20px;">*</red>
                    <input type="text"  id="opening" value="<?php echo $profile[0]->store_open_hours; ?>" class="form-control pickatime" placeholder="Opening Hours" name="open_hours">
                </div>
                <span id="timeErroropen" style="color: red;"></span>
            </div>

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label"> Closing Hours</label>
                    <red style="color: red;font-size: 20px;">*</red>
                    <input type="text" id="closing" value="<?php echo $profile[0]->store_close_hours; ?>" class="form-control pickatime" placeholder="Closing Hours" name="close_hours">
                    <div class="form-control-feedback" style="margin-top: 7px;">
                        <i class="icon-alarm-cancel text-muted"></i>
                    </div>

                    <span id="timeErrorclose" style="color: red;"></span>
                    <span style="color:red" id="timeError"></span>

                </div>
            </div>

        </div>

        <div class="col-md-6"> 

            <div class="form-group">
                <label class="control-label">Mobile Number</label>
                <red style="color: red;font-size: 20px;">*</red>
                <input type="text" value="<?php echo $profile[0]->store_mobile_no; ?>" class="form-control" placeholder="Mobile Number" id="mobile_number" onkeypress="return isNumber(event)" minlength="10" maxlength="10" name="mobile_number">
            </div>
            <span id="mobile_error" style="color: red;"></span>

        </div>

    </div>

</div>

<!-- new code -->



<!-- /end -->

<div class="form-group">
    <div class="row">
        <div class="col-md-6">

            <div class="form-group">

                <label>Address line 1 <red style="color: red;font-size: 20px;">*</red></label>
                <input type="text"  class="form-control myadd" name="store_address1" value="<?php echo $profile[0]->store_address1; ?>" id="us2-address" onchange="address1(this.value)" onblur="address1(this.value)">

                <span id="address_error" style="color: red;"></span>

            </div>


        </div>

    </div>
</div>



<div class="form-group">

    <div class="row">
        <div class="col-md-6">

            <div class="form-group has-feedback multi-select-full">

                <label control-label">State<red style="color: red;font-size: 20px;">*</red></label>

                <div class="multi-select-full">


                    <select class="select_style" name="state" id="state" >
                        <option  <?php if($profile[0]->state == '1') echo 'selected'; ?> value="1">Andhra Pradesh</option>
                        <option  <?php if($profile[0]->state == '2') echo 'selected'; ?> value="2">Arunachal Pradesh</option>
                        <option  <?php if($profile[0]->state == '3') echo 'selected'; ?> value="3">Assam</option>
                        <option  <?php if($profile[0]->state == '4') echo 'selected'; ?> value="4">Bihar</option>
                        <option  <?php if($profile[0]->state == '5') echo 'selected'; ?> value="5">Chandigarh</option>
                        <option  <?php if($profile[0]->state == '6') echo 'selected'; ?> value="6">Chhattisgarh</option>
                        <option  <?php if($profile[0]->state == '7') echo 'selected'; ?> value="7">Goa</option>
                        <option  <?php if($profile[0]->state == '8') echo 'selected'; ?> value="8">Gujarat</option>
                        <option  <?php if($profile[0]->state == '9') echo 'selected'; ?> value="9">Haryana</option>
                        <option  <?php if($profile[0]->state == '9') echo 'selected'; ?> value="9">Himachal Pradesh</option>
                        <option  <?php if($profile[0]->state == '10') echo 'selected'; ?> value="10">Jammu and Kashmir</option>
                        <option  <?php if($profile[0]->state == '11') echo 'selected'; ?> value="11">Jharkhand</option>
                        <option  <?php if($profile[0]->state == '12') echo 'selected'; ?> value="12">Karnataka</option>
                        <option  <?php if($profile[0]->state == '13') echo 'selected'; ?> value="13">Kerala</option>
                        <option  <?php if($profile[0]->state == '14') echo 'selected'; ?> value="14">Madhya Pradesh</option>
                        <option  <?php if($profile[0]->state == '15') echo 'selected'; ?> value="15">Maharashtra</option>
                        <option  <?php if($profile[0]->state == '16') echo 'selected'; ?> value="16">Manipur</option>
                        <option  <?php if($profile[0]->state == '17') echo 'selected'; ?> value="17">Meghalaya</option>
                        <option  <?php if($profile[0]->state == '18') echo 'selected'; ?> value="18">Mizoram</option>
                        <option  <?php if($profile[0]->state == '19') echo 'selected'; ?> value="19">Nagaland</option>
                        <option  <?php if($profile[0]->state == '20') echo 'selected'; ?> value="20">Odisha</option>
                        <option  <?php if($profile[0]->state == '21') echo 'selected'; ?> value="21">Punjab</option>
                        <option  <?php if($profile[0]->state == '22') echo 'selected'; ?> value="22">Rajasthan</option>
                        <option  <?php if($profile[0]->state == '23') echo 'selected'; ?> value="23">Sikkim</option>
                        <option  <?php if($profile[0]->state == '24') echo 'selected'; ?> value="24">Tamil Nadu</option>
                        <option  <?php if($profile[0]->state == '25') echo 'selected'; ?> value="25">Telangana</option>
                        <option  <?php if($profile[0]->state == '26') echo 'selected'; ?> value="26">Tripura</option>
                        <option  <?php if($profile[0]->state == '27') echo 'selected'; ?> value="27">Uttar Pradesh</option>
                        <option  <?php if($profile[0]->state == '28') echo 'selected'; ?> value="28">Uttarakhand</option>
                        <option  <?php if($profile[0]->state == '29') echo 'selected'; ?> value="29">West Bengal</option>


                    </select>

                    <span id="state_error" style="color: red;"></span>
                </div>

            </div>

        </div>

        <div class="col-md-6">
            <div class="form-group has-feedback">
                <label class="control-label"> Zip Code</label>
                <red style="color: red;font-size: 20px;">*</red>

                <input type="text" class="form-control" placeholder="Zip Code" name="zipcode" onkeypress="return isNumber(event)" minlength="6" maxlength="6" value="<?php echo $profile[0]->zipcode; ?>" id="zipcode" > 
                <div class="form-control-feedback" style="margin-top: 7px;">
                    <i class=" icon-direction text-muted"></i>
                </div>

                <span id="zipcode_error" style="color: red;"></span>

            </div>
        </div>

    </div>

</div>


<div class="row">


    <div class="col-md-6">
        <div class="form-group has-feedback">
            <label class="control-label"> Latitude</label>
            <input type="text" value="<?php echo $profile[0]->store_latitude; ?>" class="form-control" placeholder="Latitude" id="us2-lat" name="latitude">
            <div class="form-control-feedback" style="margin-top: 7px;">
                <i class="icon-location3 text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group has-feedback">
            <label class="control-label"> Longitude</label>
            <input type="text" class="form-control" placeholder="Longitude" value="<?php echo $profile[0]->store_longitude; ?>"  id="us2-lon" name="longitude">
            <div class="form-control-feedback" style="margin-top: 7px;">
                <i class="icon-location4 text-muted"></i>
            </div>
        </div>
    </div>
</div>

<div class="form-group" style="margin-top: 20px;">
    <label class="control-label">Locate Your Store</label>
    <div id="myMap" class="map-wrapper" style="height: 250px;" ></div>
</div>



<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="control-label"> Store Description</label>
            <red style="color: red;font-size: 20px;">*</red>
            <textarea class="form-control" id="store_description" placeholder="Your Store Description" name="description" ><?php echo $profile[0]->store_description; ?></textarea> 

            <span id="des_error" style="color: red;"></span>

        </div>
    </div>
</div>

<div class="text-right">
    <button type="submit" id="savedata" class="btn btn-primary" style="padding: 8px 20px;font-weight: bold;font-size: 16px;">Save <i class="icon-arrow-right14 position-right"></i></button>
</div>

</div>
</div>

</form>
<!-- /profile info -->


<!-- Account settings -->



</form>
</div>
</div>

</div>
</div>
</div>
</div>
<!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->
<p id="demos"></p>

<input type="hidden" name="lat" value="" id="lat">
<input type="hidden" name="long" value="" id="long">



<script type="text/javascript">

    $("#dropzone_single").dropzone({

        acceptedFiles: 'image/*',
// paramName: "file", // The name that will be used to transfer the file
maxFilesize: 2, // MB
maxFiles: 1,
addRemoveLinks: true,
// parallelUploads: 1,
dictDefaultMessage: 'Drop file to upload <span>or CLICK</span>',

init: function() {
    this.on('addedfile', function(file) {
        if (this.files.length > 1) {
            this.removeFile(this.files[0]);
        }
    });
}
});

$("#dropzone_single").click(function(){
    $('.sadagd').css('display','none');
});

// $('#dropzone_single').dropzone({
//     acceptedFiles: 'image/*',
//     maxFilesize: 2, // MB
//     maxFiles: 1,
//     addRemoveLinks: true

//     // sending:function(file, xhr, formData){
//     //   // formData.append('name',$("#name").val() );
//     //   // formData.append('description',$("#description").val() );
//     //   // alert(file['size']);
//     //   document.getElementById("image_error").innerHTML = '.';
//     //   document.getElementById('savedata').disabled = false;

//     // },


//     // error:function(file,response){
//     //     document.getElementById("image_error").innerHTML = 'Please select a file that is less than 2MB';
//     //     document.getElementById('savedata').disabled = true; 
//     // },
// });

/*$('#dropzone_single').click(function () {
    $(".hideme").show();
});
*/


</script>




<script>


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

} else {
    alert("This browser does not support FileReader.");
}
} 
/* });*/

});
</script>
<script>

// Example 1:
// - Password hidden by default
// - Inner toggle shown
$('#password-1').hidePassword(true);

// Example 2:
// - Password shown by default
// - Toggle shown on 'focus' of element
// - Custom toggle class
$('#password-2').hidePassword(true);

// Example 3:
// - When checkbox changes, toggle password
//   visibility based on its 'checked' property
$('#show-password').change(function(){
    $('#password-3').hideShowPassword($(this).prop('checked'));
});


function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>


<script type="text/javascript">

    $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);    

    $("#savedata").click(function(){
        var start = $("#opening").val();
        var end = $("#closing").val();


        var state = $("#state").val();
        var category = $("#category").val();
        var busi_name = $("#busi_name").val();
// var email = $("#email").val();
var pass = $("#pass_value").val();

var mobile = $("#mobile_number").val();
var address_line1 = $("#us2-address").val();


var zipcode = $("#zipcode").val();
var des = $("#store_description").val();

var image_here = $(".dz-filename").html();

// alert(image_here);

// var chk = $("#image_error").html();
// alert(chk);
// if(chk == ''){
//     document.getElementById("image_error").innerHTML ='Please select a file';
//     return false;
// }

// if(chk != "."){
//     return false;
// }



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



if(pass == ''){
    document.getElementById("pass_error").innerHTML ='Password value is required';
    return false ;

}else{
    document.getElementById("pass_error").innerHTML = '';

}

if(busi_name == ''){
    document.getElementById("busi_error").innerHTML ='Business name is required';
    return false ;

}else{
    document.getElementById("busi_error").innerHTML = '';

}

if(category == '0' || category == ''){
    document.getElementById("category_error").innerHTML ='Category field is required';
    return false ;

}else{
    document.getElementById("category_error").innerHTML = '';

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


if(start != ''){

// $error = compareTime(start, end);

// if($error){
//     return false;
// }


// function compareTime(time1, time2){

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

// alert(hour2);

if(hour1 == 12){
    var hour1 = 0;
}

if(hour1 == 24){
    var hour1 = 12;
}

if(hour2 == 12){
    var hour2 =  0;    

}

if(hour2 == 24){
    var hour2 =  12;    

}


// alert(hour2);

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
// }
}    


if(mobile == ''){
    document.getElementById("mobile_error").innerHTML = 'Mobile number is required';
    return false ;
} else {
    document.getElementById("mobile_error").innerHTML = '';
}

if(address_line1 == ''){
    document.getElementById("address_error").innerHTML = 'Address field is required';
    return false ;
} else {
    document.getElementById("address_error").innerHTML = '';
}


if(state == ''){
    document.getElementById("state_error").innerHTML = 'State field is required';
    return false ;
} else {
    document.getElementById("state_error").innerHTML = '';
}

if(zipcode == ''){
    document.getElementById("zipcode_error").innerHTML = 'Zipcode field is required';
    return false ;
} else {
    document.getElementById("zipcode_error").innerHTML = '';
}

if(des == ''){
    document.getElementById("des_error").innerHTML = 'Store description field is required';
    return false ;
} else {
    document.getElementById("des_error").innerHTML = '';
}






// start time code old

// var time1_higher_than_time2 = compareTime(start, end);

// if(time1_higher_than_time2) {
//         document.getElementById("timeError").innerHTML
//         ='Opening time should be less than the closing time';
//         return false ;
// }
// else{
//     document.getElementById("timeError").innerHTML="";
// } 

/*Illustrative code. Returns true if time1 is greater than time2*/


// function compareTime(time1, time2){
//     var re = /^([012]?\d):([0-6]?\d)\s*(a|p)m$/i;
//     time1 = time1.match(re);
//     time2 = time2.match(re);
//     if(time1 && time2){
//         var is_pm1 = /p/i.test(time1[3]) ? 12 : 0;
//         var hour1 = (time1[1]*1 + is_pm1) % 12;
//         var is_pm2 = /p/i.test(time2[3]) ? 12 : 0;
//         var hour2 = (time2[1]*1 + is_pm2) % 12;
//         if(hour1 != hour2) return hour1 > hour2;
//             var minute1 = time1[2]*1;
//             var minute2 = time2[2]*1;
//             return minute1 > minute2;
//         }
//     }

//     var open = start.split(':');
//     var close = end.split(':');
//     var openR1 = parseInt($.trim(open[0]));
//     var openR2 = parseInt($.trim(open[1]));
//     var closeR1 = parseInt($.trim(close[0]));
//     var closeR2 = parseInt($.trim(close[1]));
//     var closeR3 = parseInt($.trim(close[2]));

//     if(closeR1 == openR1){
//         if(closeR2 == openR2){

//             document.getElementById("timeError").innerHTML
//             ='Opening time and closing time should not be same.';
//             return false;
//         }
//         if(closeR2 < openR2){
//             document.getElementById("timeError").innerHTML
//             ='Closing time should be greater than opening time.';
//             return false;  
//         }

//     }


});

</script>

<!-- new map code 15 july -->


<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCCcoHZT-PJIB64n5Bw70s4SkNB1lr7naQ&amp;sensor=false&amp;libraries=places"></script>

<script type="text/javascript">

// $(document).ready(function(){
    $("#us2-address").blur(function(){
        var geocoder = new google.maps.Geocoder();
        var address = "new york";

        var myval = $('.myadd').val();

        geocoder.geocode( { 'address': myval}, function(results, status) {

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
// });




// $(document).ready(function(){


    var geocoder = new google.maps.Geocoder();
    var address = "new york";

    var myval = $('.myadd').val();

// alert(myval);

geocoder.geocode( { 'address': myval}, function(results, status) {

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

// $("#show_me").hide();
// $("#hide_me").show();                

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

        
                  }
            }
          });
                    });

              }
    } 
});


// });

</script>

</body>
</html>
