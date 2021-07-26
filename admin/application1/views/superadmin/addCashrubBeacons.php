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


    </head>

    <body>

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
                            <h4><span class="text-semibold">Add Beacons</span></h4>

                                <ul class="breadcrumb position-left">
                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome""><i class="icon-home2 position-left"></i> Home</a></li>
                            <li><a href="#">Add Beacons</a></li>
                        </ul>
                    </div>
                        
                    <div class="heading-elements">
                    <div class="heading-btn-group">
                        <a href="<?php echo base_url(); ?>index.php/superadmin/assignBeaconToStores" class="btn bg-blue btn-labeled heading-btn"><b><i class="glyphicon glyphicon-tasks"></i></b> Assign Beacons </a>
                    </div>
                    </div>

                    </div>

                    
        
                </div>
            
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <div id="hidemenow">
                    
                            
                            <?php

                                if ($this->session->flashdata()) {
                                        echo $this->session->flashdata('add_cashrub_banner');
                                }
                            ?>

                    </div>
                    
                        
                    
                    <div class="row">

                        <form class="form-horizontal" action="<?php echo site_url('superadmin/saveCashrubBeacons'); ?>" method="post">
                        <div class="col-md-12">

                        <div class="panel panel-flat">

                        <!-- <h6 class="panel-title"><b>Add Beacons</b></h6> -->


                        <div class="panel-body">

                             <div class="row">

                             

                                        <div class="col-md-6">

                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Enter Beacon Name
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>

                                            <br/>

                                            <input type="text" class="form-control" maxlength="20" onkeyup="checkname();" name="beacon_name" placeholder="Beacon Name (Example: my beacon)" onkeypress="return alpha(event)" id="third_party_beacon_name">
                                            <span id="third_party_beacon_name_error" style="color: red"></span>

                                        </div>


                                        <!-- <div class="col-md-6">

                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Enter Beacon Place
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>

                                            <br/>


                                            <input type="text" class="form-control" name="beacon_place" placeholder="Beacon Place" id="third_party_beacon_place">

                                            <span id="third_party_beacon_place_error" style="color: red">

                                        </div> -->

                                        <div class="col-md-6">

                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Enter Beacon UUID
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>
                                            <br/>
                                            <input type="text" class="form-control" onkeypress="return alpha(event)" name="beacon_uuid" placeholder="Beacon UUID (Example: fz45dkeZeie32)" id="third_party_beacon_uuid">


                                            <span id="third_party_beacon_uuid_error" style="color: red">

                                        </div>

                                    </div>

                                    <!-- <div class="row" style="margin-top: 3%;">

                                        

                                        
                                    </div> -->

                                    <div class="row" style="margin-top: 3%;">

                                        <div class="col-md-6">

                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Beacon Major
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>

                                            <input type="text" maxlength="8" class="form-control" name="beacon_major" onkeypress="return isNumber(event)" placeholder="Beacon Major (Enter numeric value Example:454)" id="third_party_beacon_major">

                                           
                                            <span id="third_party_beacon_major_error" style="color: red">

                                        </div>
                                        
                                        <div class="col-md-6">

                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Beacon Minor
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>

                                            <br/>

                                             <input type="text" maxlength="8" class="form-control" name="beacon_minor" onkeypress="return isNumber(event)" placeholder="Beacon Minor (Enter numeric value Example: 342)" id="third_party_beacon_minor">


                                            <span id="third_party_beacon_minor_error" style="color: red">

                                        </div>


                                    </div>
                                    
                                    

                                    <div class="row" style="margin-top: 3%;">
                                        <div class="text-center">

                                            <button id="addCashrubBeacon" type="submit" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-checkmark3"></i></b> Add</button>

                                            <button type="reset" class="btn bg-blue btn-labeled heading-btnbtn-labeled-right ml-10"><b><i class="icon-cross"></i></b> Cancel</button>

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
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    
    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/selects/select2.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
    <!-- /theme JS files -->

    <script>
    
    $("#hidemenow").delay(3000).fadeIn(300).delay(1000).fadeOut(300);


        $('#shows').click(function() {
            
            $('#styleme').delay(2000).fadeIn(300).delay(1000).fadeOut(300);;
        });

        function isNumber(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                        return false;
                    }
                    return true;
        }

        $("#addCashrubBeacon").click(function() {
                        var third_beacon_name = $("#third_party_beacon_name").val();
                        var third_beacon_uuid = $("#third_party_beacon_uuid").val();
                        var third_beacon_major = $("#third_party_beacon_major").val();
                        var third_beacon_minor = $("#third_party_beacon_minor").val();


                        if (third_beacon_name == '') {
                            document.getElementById("third_party_beacon_name_error").innerHTML = 'Beacon name field is required.';
                            return false;
                        } else {
                            document.getElementById("third_party_beacon_name_error").innerHTML = '';
                        }

                        if (third_beacon_uuid == '') {
                            document.getElementById("third_party_beacon_uuid_error").innerHTML = 'Beacon uuid field is required.';
                            return false;
                        } else {
                            document.getElementById("third_party_beacon_uuid_error").innerHTML = '';
                        }

                        if (third_beacon_major == '') {
                            document.getElementById("third_party_beacon_major_error").innerHTML = 'Beacon major field is required.';
                            return false;
                        } else {
                            document.getElementById("third_party_beacon_major_error").innerHTML = '';
                        }

                        if (third_beacon_minor == '') {
                            document.getElementById("third_party_beacon_minor_error").innerHTML = 'Beacon minor field is required.';
                            return false;
                        } else {
                            document.getElementById("third_party_beacon_minor_error").innerHTML = '';
                        }
                        

                    });



    </script>


<script type="text/javascript">
    
    function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
}
</script>

<script>

function checkname()
{
 var name=document.getElementById( "third_party_beacon_name" ).value;
 //alert(name);
    
     if(name)
     {     
        $.ajax({
              type: 'post',
              url: '<?= base_url("index.php/superadmin/check_BeaconAlreadyExist"); ?>',
              data: {user_name:name},
              success: function (response) {
               $( '#third_party_beacon_name_error' ).html(response);
               // if(response=="OK"){
               //    return true;    
               // }
               // else{
               //    return false;   
               // }
           }
        });
    }
    else{

      $( '#third_party_beacon_name_error' ).html("");
        return false;
    }

}

</script>




    </body>

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
    </html>
