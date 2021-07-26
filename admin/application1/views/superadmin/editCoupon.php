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

                                <!-- Header content -->
                                <div class="page-header-content">
                                    <div class="page-title">
                                        <h4><a href="<?php echo base_url() ; ?>index.php/superadmin/viewCoupons"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">Coupons</span> - Edit coupon</h4>
                                        
                                        <!-- <div class="heading-elements">
                                            <div class="heading-btn-group">
                                                <a href="<?php echo base_url(); ?>index.php/superadmin/viewCoupons" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-price-tag3"></i></b> View coupons </a>

                                            </div>
                                        </div>   -->



                                        <ul class="breadcrumb position-right">
                                            <li><a href="<?php echo base_url() ; ?>index.php/superadmin/superhome">Home</a></li>
                                            <li><a href="<?php echo base_url() ; ?>index.php/superadmin/viewCoupons">Coupons</a></li>
                                            <li class="active">Edit coupon</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <!--    <div class="arrow xs-hidden"></div> -->
                            
                            <form action="<?php echo base_url(); ?>index.php/superadmin/editCoupon/<?php echo $edit_coupon[0]->coupon_id; ?>" enctype="multipart/form-data" method="post">
    

                            <div class="content">

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
                                                        <input type="text" name="coupon_title" value="<?php echo $edit_coupon[0]->coupon_title;?>" maxlength="25" class="form-control" placeholder="coupon title" id="title">

                                                        <p id="error_title" style="color: red;" ></p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <label class="control-label">Select coupon Image<red style="color: red;font-size: 20px;">*</red></label>

                                                        <div class="fancy-file-upload fancy-file-primary">
                                                            
                                                            <input type="file" class="form-control" id="filesizeidea" onchange="jQuery(this).next('input').val(this.value);" name="filenew" accept="image/*" />
                                                            
                                                            <input type="text" class="form-control" name="myfile" id="custom_image" readonly="" value="<?php echo $edit_coupon[0]->coupon_image;?>" />

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

                                                                    <img src="<?php echo base_url(); ?>uploads/coupon_custom1.jpg" width="250" height="150" />
                                                                </a>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-5">
                                                                <h3>LifeStyle</h3>
                                                                <div>
                                                                    <a href="#" class="custom-close2">
                                                                    <img src="<?php echo base_url(); ?>uploads/coupon_custom3.jpg" width="250" height="150" />

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

                                                                    <img src="<?php echo base_url(); ?>uploads/coupon_custom5.jpg" width="250" height="150" />
                                                                </a>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-5">
                                                                <h3>Electronics</h3>
                                                                <div>
                                                                    <a href="#" class="custom-close4">
                                                                    <img src="<?php echo base_url(); ?>uploads/coupon_custom4.jpg" width="250" height="150" />

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
                                                        <label>Enter coupon description <red style="color: red;font-size: 20px;">*</red></label>
                                                        <textarea name="coupon_description" class="form-control" rows="2" cols="1" placeholder="coupon Description" id="desc" maxlength="100" style="max-width: 461px;max-height: 62px;"><?php echo $edit_coupon[0]->coupon_description;?></textarea>

                                                        <p id="error_des" style="color: red;" ></p>
                                                    </div>                                                          
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Select store<red style="color: red;font-size: 20px;">*</red> </label>
                                                        
                                                        <select class="form-control" id="select_store"  name="store_id_to_assign" data-width="100%">

                                                            <option value="0">Nothing selected</option>

                                                            <?php foreach ($get_stores_list as $stores_data) { ?>

                                                                <?php if($stores_data->store_id == $edit_coupon[0]->store_id) { ?>

                                                                    <option value="<?php echo $stores_data->store_id; ?>" selected> <?php echo $stores_data->store_first_name; ?> </option>
                                                                        
                                                                <?php } else { ?>

                                                                    <option value="<?php echo $stores_data->store_id; ?>"> <?php echo $stores_data->store_first_name; ?> </option>
                                                                    
                                                                <?php } ?>    
                                                            
                                                            
                                                            <?php } ?>

                                                        </select>

                                                        <p id="error_store" style="color: red;" ></p>

                                                    </div>                                                          
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <label for="dtp_input1" class="control-label">Expiry date</label>

                                                            <div class="input-group date form_date col-md-12" id="chh" data-date-format="dd MM yyyy" data-link-field="dtp_input1" >
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;"></span></span>
                                                                <input class="form-control" size="30" data-date-start-date="+0d" id="changedate1" value="<?php echo $edit_coupon[0]->coupon_expiry_date;?>" name="coupon_expiry_date" placeholder="Expiry Date" style="font-size: 15px;  " type="text" value="" readonly>

                                                                
                                                            </div>
                                                            <input type="hidden" id="dtp_input1" value="" /><br/>
                                                        <!-- </div> -->
                
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                            <div class="form-group">
                                            <div class="col-md-12">
                                                  <label class="control-label">Select category <red style="color: red;font-size: 20px;">*</red></label>
                                                  <select class="form-control btn-select-arrow  icon-arrow-down15" id="category" name="category" selected="<?php echo $edit_coupon[0]->category_name;?>">
                                                    
                                                    
                                                    <?php foreach ($categorys as $key) { 
                                                    if($edit_coupon[0]->category_id == $key->category_id){
                                                    ?>
                                                    <option value="<?php echo $edit_coupon[0]->category_id ?>" selected><?php echo $key->name ?></option>

                                                    <?php   }else{ ?>

                                                    <option value="<?php echo $key->category_id ?>"><?php echo $key->name ?></option>
                                                    <?php  } } ?>
                                                    
                                                  </select>
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
                                                            <!-- <input type="text" name="coupon_points" value="<?php echo $edit_coupon[0]->coupon_points; ?>" onkeypress="return isNumber(event)" class="form-control" id="coupon_points" maxlength="4" > -->

                                                             <input type="text" value="<?php echo $edit_coupon[0]->coupon_points; ?>" name="coupon_points" class="form-control" onkeypress="return isNumber(event)" id="coupon_points">
                                                        </div>
                                                        <p id="error_coupon_points" style="color: red;" ></p>
                
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <label>Terms & Conditions<red style="color: red;font-size: 20px;">*</red> </label>
                                                        <textarea name="coupon_terms" style="max-width: 945px;max-height: 62px;" class="form-control" rows="2" cols="1" placeholder="Terms & Conditions" id="terms" ><?php echo $edit_coupon[0]->terms; ?></textarea>

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

// $(document).ready(function () {

        $('.submit').click(function(){

            var imgVal1 = $('#filesizeidea').val();
            var file_name = $("#custom_image").val();


            var coupon_title = $('#title').val();




            if(coupon_title == ''){
                document.getElementById('error_title').innerHTML="Coupon title is required";
                return false;
            }else{
                document.getElementById('error_title').innerHTML="";
            }

            if(file_name == ''){
                document.getElementById('filesizeideamsg').innerHTML="Coupon image is required";
                return false;   
            }else{
                document.getElementById('filesizeideamsg').innerHTML="";
            }


            // if((imgVal1==''))
            // {
            //     document.getElementById('filesizeideamsg').innerHTML="Coupon image is required";
            //     return false;   
                
            // }else{
            //     document.getElementById('filesizeideamsg').innerHTML="";

            // }



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

            // alert(cat);
            var des = $('#desc').val();
            var coupon_points = $("#coupon_points").val();
            var terms = $('#terms').val();
            
            if(des == ''){
                document.getElementById('error_des').innerHTML="Coupon description is required";
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


    // $(".submit").click(function(){
      
    //         var cat = $('#category').val();
    //         var fb = $('#points1').val();
    //         var tw = $('#points2').val();
    //         var coupon_name = $('#title').val();
    //         var des = $('#desc').val();
    //         var terms = $('#terms').val();
            
            
    //         var max_point = $('#max_point').val();
    //         var total = Number(fb)+Number(tw);

    //         if(coupon_name == ''){
    //             document.getElementById('error_name').innerHTML="coupon name is required";
    //             return false;
    //         }else{
    //             document.getElementById('error_name').innerHTML="";
    //         }

    //         if(des == ''){
    //             document.getElementById('error_des').innerHTML="coupon description is required";
    //             return false;
    //         }else{
    //             document.getElementById('error_des').innerHTML="";
    //         }

    //         if(cat == '' || cat == '0'){
    //             document.getElementById('error_category').innerHTML="Category field is required";
    //             return false;
    //         }else{
    //             document.getElementById('error_category').innerHTML="";
    //         }

    //         if(total > max_point){
    //             document.getElementById('error_point').innerHTML="Your entered point exceeding the maximum point limit";
    //             return false;
    //         }else{
    //             document.getElementById("error_point").innerHTML = '';
    //         }

    //         if(terms == ''){
    //             document.getElementById('error_terms').innerHTML="coupon terms & conditions are required";
    //             return false;
    //         }else{
    //             document.getElementById("error_terms").innerHTML = '';    
    //         }

    //         var fileSize = document.getElementById("filesizeidea").files[0];
    //         var sizeInMb = (fileSize.size/1024)/1024;
    //         var sizeLimit= 2;   

    //         if (sizeInMb > sizeLimit) {
    //             document.getElementById('filesizeideamsg').innerHTML="image size must be less than 2MB";
    //             return false;

    //         }else{
    //             document.getElementById('filesizeideamsg').innerHTML="";
    //         }
    // });



        </script>
    </body>
    </html>
