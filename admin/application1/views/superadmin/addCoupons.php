<!DOCTYPE html>
    <html lang="en">

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cash Rub</title>




    <!-- Theme JS files -->

    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/selects/select2.min.js"></script> -->


    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/custom.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

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

       .dropdown-menu li a:hover{

        color: #fff;

        background: #01a8f6;

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
                                        <h4><span class="text-semibold">Add Redeem Coupons</span></h4>

                                        <ul class="breadcrumb position-left">
                                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome""><i class="icon-home2 position-left"></i> Home</a></li>
                                            <li><a href="#">Add Redeem Coupons</a></li>
                                        </ul>
                                    </div>

                                    <div class="heading-elements">

                                    <div class="heading-btn-group">

                                        <!-- Example single danger button -->
                                          <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" style="background-color:#01a8f6; " type="button" data-toggle="dropdown"><b><i class="icon-price-tag3"></i></b> &nbsp; View Coupons
                                          <span class="caret"></span></button>
                                          <ul class="dropdown-menu">
                                            <li ><a  href="<?php echo base_url(); ?>index.php/superadmin/viewCoupons">Active Coupons</a></li>
                                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/viewExpiredCoupons">Expired Coupons</a></li>
                                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/viewRejectedCoupons">Removed Coupons</a></li>
                                          </ul>
                                        </div> 

                                      <!--   <a href="<?php echo base_url(); ?>index.php/superadmin/viewCoupons" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-price-tag3"></i></b> View coupons </a> -->
                                    </div>
                                    </div>
                                
                                </div>
                            </div>


                           <!--  <div class="page-header">

                                <div class="page-header-content">
                                    <div class="page-title">
                                        <h4><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold"></span>Add coupons</h4>
                                        <div class="heading-elements">
                                            <div class="heading-btn-group">
                                                
                                                <a href="<?php echo base_url(); ?>index.php/superadmin/viewCoupons" class="btn 
                                                bg-blue btn-labeled heading-btn"><b><i class="icon-price-tag3"></i></b> View coupons </a>

                                            </div>
                                        </div>  



                                        <ul class="breadcrumb position-right">
                                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome">Home</a></li>
                                            <li><a href="#">coupons</a></li>
                                            <li class="active">Add coupons</li>
                                        </ul>

                                    </div>
                                </div>
                            </div> -->


                            <!--    <div class="arrow xs-hidden"></div> -->
                            
                            <form action="<?php echo base_url(); ?>index.php/superadmin/addcoupon" enctype="multipart/form-data" method="post">
    

                            <div class="content">

                                    
                            <div id="hidemenow">
                                
                                <?php
                                        if ($this->session->flashdata()) {
                                            echo $this->session->flashdata('coupon_message');
                                        }
                                ?>

                            </div>
                                    

                                <!-- User profile -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Profile info -->
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title"><b>Coupon Details</b></h6>
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
                                                        <label>Enter coupon title <red style="color: red;font-size: 20px;">*</red></label>
                                                        <input type="text" name="coupon_title" value="" maxlength="45" class="form-control" placeholder="coupon title" id="title">

                                                        <p id="error_title" style="color: red;" ></p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <label class="control-label">Select coupon Image<red style="color: red;font-size: 20px;">*</red> </label>

                                                        <div class="fancy-file-upload fancy-file-primary">
                                                            
                                                            <input type="file" name="filenew" accept="image/*" class="form-control"  id="filesizeidea" onchange="jQuery(this).next('input').val(this.value);"  />
                                                            <input type="text" name="myfile"  placeholder="upload image" class="form-control" id="custom_image" value="" readonly="" />

                                                            <!-- <span class="button" id="btn1" style="cursor: pointer;
                                                            z-index: 23!important;
                                                            border-radius: 15px;"><i class="icon-upload"></i> Choose File</span> -->
                                                        </div>

                                                        <span id="filesizeideamsg" style="color: red"></span>
                                                        &nbsp;<span> Max file size is 2MB </span>
                                                        <!-- <a href="" data-toggle="modal" data-target="#myModal" style="float: right;" >Select From Template</a> -->
                                                    </div>


                                                </div>
                                            </div>
                                   
                                  
                                        
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Enter coupon description<red style="color: red;font-size: 20px;">*</red> </label>
                                                        
                                                        <textarea name="coupon_description" class="form-control" rows="2" cols="1" placeholder="coupon description" id="desc" maxlength="100" style="max-width: 945px;max-height: 62px;"></textarea>

                                                        <p id="error_des" style="color: red;" ></p>

                                                    </div>                                                          
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Store name<red style="color: red;font-size: 20px;">*</red> </label>
                                                        <input type="text" name="store_id_to_assign" data-width="100%" class="form-control">
                                                        <!-- <select class="form-control" id="select_store"  name="store_id_to_assign" data-width="100%">

                                                            <option value="">Nothing selected</option>

                                                            <?php foreach ($get_stores_list as $stores_data) { ?>
                                                            <option value="<?php echo $stores_data->store_id; ?>"> <?php echo $stores_data->store_first_name; ?> </option>
                                                            
                                                            <?php } ?>

                                                        </select> -->

                                                        <p id="error_store" style="color: red;" ></p>

                                                    </div>                                                          
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <label for="dtp_input1" class="control-label">Expiry date</label>
                                                        <!-- <input type="text" name="coupon_expiry_date" class="form-control  pickadate-editable pickers    " placeholder="Expiry On&hellip;"   > -->

                                                        
                
                                                        <!-- <div class="form-group col-md-6" id="cdesign"> -->
                                                            <!-- <label for="dtp_input1" style="font-size: 17px;" class="col-md-2 control-label">Start date</label> -->
                                                            <div class="input-group date form_date col-md-12" id="chh" data-date-format="dd MM yyyy" data-link-field="dtp_input1" >
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;"></span></span>
                                                                <input class="form-control" size="30" data-date-start-date="+0d" id="changedate1" name="coupon_expiry_date" placeholder="Expiry date" style="font-size: 15px;  " type="text" value="" readonly>
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
                                                  <label class="control-label">Select category<red style="color: red;font-size: 20px;">*</red></label>
                                                  <a class="btn btn-default btn-select btn-select-light" style="margin-top:0px; margin-left: 0px!important;">
                                                                            
                                                                            <input type="hidden" class="btn-select-input form-control" id="category" name="category" value="" />
                                                                            
                                                                            <span class="btn-select-value">Category</span>
                                                                            <span class='btn-select-arrow icon-arrow-down15'></span>
                                                                            <ul>

                                                                                <?php foreach ($categorys as $key) { ?>
                                                                                <li value="<?php echo $key->category_id; ?>"><?php echo $key->name; ?></li>
                                                                                <?php } ?>

                                                                            </ul>
                                                                        </a>
                                                                        <p id="error_category" style="color: red;" ></p>
                                            </div>
                                            </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <label>Coupon points <red style="color: red;font-size: 20px;">*</red></label>
                                                     
                                                         <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                                          <!--   <input type="text" name="coupon_points" onkeypress="return isNumber(event)" value="" class="form-control" id="coupon_points" pattern="[4-9][0-9]{4,}"   required title="Enter value greater than or equal to 4" > -->
                                                           <input type="text" name="coupon_points" class="form-control" onkeypress="return isNumber(event)" id="coupon_points">
                                                        </div>
                                                        <p id="error_coupon_points" style="color: red;" ></p>
                
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <label>Terms & Conditions<red style="color: red;font-size: 20px;">*</red> </label>
                                                        <textarea name="coupon_terms" style="max-width: 945px;max-height: 62px;" class="form-control" rows="2" cols="1" placeholder="Terms & Conditions" id="terms" ></textarea>

                                                        <p id="error_terms" style="color: red;" ></p>
                
                                                    </div>
                                                </div>
                                            </div>

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


<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
<!-- /core JS files -->

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



            // $("#btn1").bind("click" , function(){

            //     $("#zip_file_import").click();
            // });

            // function formSubmit() {
            //     var fullpath = document.getElementById("zip_file_import").value;
            //     var backslash=fullpath.lastIndexOf("\\");
            //     var filename = fullpath.substr(backslash+1);

            //     var confirm_message = confirm("Files selected for import are \n: "+filename+"\n\nDo you want to proceed?");
            //     if (confirm_message==false) {
            //         return false;
            //     } else {
            //         document.getElementById("import_form").submit();
            //         document.body.style.cursor = "wait";
            //     }
            // }

            // $("#zip_file_import").on('change', function () {

            //            //Get count of selected files
            //            var countFiles = $(this)[0].files.length;

            //            var imgPath = $(this)[0].value;
            //            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            //            var image_holder = $("#image");
            //            image_holder.empty();

            //            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "doc"  || extn == "txt" || extn == "wmv") {
            //                 if (typeof (FileReader) != "undefined") {

            //                     for (var i = 0; i < countFiles; i++) {

            //                         var reader = new FileReader();
            //                         reader.onload = function (e) {
            //                             $("<img />", {
            //                                 "src": e.target.result,
            //                                 "class": "thumb-image img-responsive"
            //                             }).appendTo(image_holder);
            //                         }

            //                         image_holder.show();
            //                         reader.readAsDataURL($(this)[0].files[i]);
            //                     }

            //                 } 
            //            } 


            // });
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

            // var inputBox = document.getElementById('title');

            // inputBox.onkeyup = function(){
            //     document.getElementById('imagetitle').innerHTML = inputBox.value;
            // }


            // var inputBox1 = document.getElementById('desc');

            // inputBox1.onkeyup = function(){
            //     var html = inputBox1.value;
            //     html = html.substring(0, 60) + "<br>" + html.substring(60);
            //     // $("#imagedesc").html(html);

            //     document.getElementById('imagedesc').innerHTML = html;
            // }


            // var inputBox2 = document.getElementById('terms');

            // inputBox2.onkeyup = function(){
            //     document.getElementById('imageterms').innerHTML = inputBox2.value;
            // }


            // var inputBox3 = document.getElementById('points1');

            // inputBox3.onkeyup = function(){
            //     document.getElementById('imagepoints1').innerHTML = inputBox3.value;
            // }

            // var inputBox4 = document.getElementById('points2');

            // inputBox4.onkeyup = function(){
            //     document.getElementById('imagepoints2').innerHTML = inputBox4.value;
            // }

            // var inputBox5 = document.getElementById('points3');

            // inputBox5.onkeyup = function(){
            //     document.getElementById('imagepoints3').innerHTML = inputBox5.value;
            // }


            // var inputBox6 = document.getElementById('sel1');

            // inputBox6.onkeyup = function(){
            //     document.getElementById('imageex').innerHTML = inputBox6.value;
            // }

        </script>


    <script>
    
        // $(document).ready(function(){
            $('.submit').click(function(){

            var imgVal1 = $('#filesizeidea').val();
            // var imgVal2 = $('#custom_image').val();
            var coupon_title = $('#title').val();


            if(coupon_title == ''){
                document.getElementById('error_title').innerHTML="Coupon title is required";
                return false;
            }else{
                document.getElementById('error_title').innerHTML="";
            }

            if((imgVal1==''))
            {
                document.getElementById('filesizeideamsg').innerHTML="Coupon image is required";
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
            var des = $('#desc').val();

            var store_name = $('#select_store').val();

            var coupon_points = $("#coupon_points").val();
            var terms = $('#terms').val();
            
            if(des == ''){
                document.getElementById('error_des').innerHTML="Coupon description is required";
                return false;
            }else{
                document.getElementById('error_des').innerHTML="";
            }

            if(store_name == ''){
                document.getElementById('error_store').innerHTML="Store field is required";
                return false;
            }else{
                document.getElementById('error_store').innerHTML="";
            }



            if(cat == ''){
                document.getElementById('error_category').innerHTML="Category field is required";
                return false;
            }else{
                document.getElementById('error_category').innerHTML="";
            }

            if(coupon_points == ''){
                document.getElementById('error_coupon_points').innerHTML="Coupon points are required";
                return false;
            }else{
                document.getElementById('error_coupon_points').innerHTML="";

                if (coupon_points%2 == 0)
                 {
                    document.getElementById("error_coupon_points").innerHTML = "";
                    if (coupon_points>=4) 
                    {
                        document.getElementById("error_coupon_points").innerHTML = "";
                    }
                    else
                    {
                        document.getElementById("error_coupon_points").innerHTML = "Number should be even and greater than or equal to 4!";
                        return false;
                    }
                 }
                
                else
                {
                    document.getElementById("error_coupon_points").innerHTML = "Please enter even Number!";
                    return false;
                }        
            }

            if(terms == ''){
                document.getElementById('error_terms').innerHTML="Coupon terms & conditions are required";
                return false;
            }else{
                document.getElementById("error_terms").innerHTML = '';    
            }
        }); 
    
    // });
        </script>
    </body>

<script type="text/javascript">

$("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);

</script>



</html>
