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

    
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/form_bootstrap_select.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/datatables_basic.js"></script>


    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->

    <style type="text/css">
        
        .dataTables_info {
            padding-left:12px;
        }
        .dataTables_paginate {
            padding-top: 11px;
            padding-right: 26px;
        }
        .dataTables_filter input {
            margin-left: 7px;
        }

/*        select{
            height: 200px;
            padding: 7px;
        }*/

    </style>
    

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
                            <h4><span class="text-semibold">Assign Beacons</span></h4>

                                <ul class="breadcrumb position-left">
                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome""><i class="icon-home2 position-left"></i> Home</a></li>
                            <li><a href="#">Assign Beacons</a></li>
                        </ul>
                    </div>

                        
                    <div class="heading-elements">
                    <div class="heading-btn-group">
                        <a href="<?php echo base_url(); ?>index.php/superadmin/addCashrubBeacons" class="btn bg-blue btn-labeled heading-btn"><b><i class="glyphicon glyphicon-tasks"></i></b> Add Beacons </a>
                    </div>
                    </div>

                    </div>

                    <?php if(!$cashrub_beacon_list){ ?>

                        <div class="alert alert-success alert-dismissable" style="text-align:center;">
                            <a href="#" class="close" data-dismiss="alert" style="margin-right:2%;" aria-label="close">&times;</a>
                            <strong >There are no beacons left. Please add a beacon first and then assign it.</strong><b></b>
                        </div>

                    <?php die; }  ?>

        
                </div>
            
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <div id="hidemenow">
                    
                            
                            <?php

                                if ($this->session->flashdata()) {
                                        echo $this->session->flashdata('assign_cashrub_banner');
                                }
                            ?>

                    </div>
                    
                        
                    
                    <div class="row">

                        <form class="form-horizontal" action="<?php echo site_url('superadmin/save_assignBeaconToStores'); ?>" method="post">
                        <div class="col-md-12">

                            <div class="panel panel-flat">

                                
                                <div class="panel-body">

                                  <!-- Multiple select -->
                                    

                                    <div class="form-group">

                                        <label class="control-label" style="font-size: 18px;">Select Beacons
                                        <red style="color: red;font-size: 20px;">*</red>
                                        </label>


                                        <select class="bootstrap-select" id="select_beacons" name="assigned_beacons[]" multiple="multiple" data-width="100%">

                                            <?php foreach ($cashrub_beacon_list as $beacon_key) { ?>

                                            <option value="<?php echo $beacon_key->beacon_key; ?>"> <?php echo $beacon_key->name; ?> </option>
                                            
                                            <?php } ?>

                                        </select>
                                        <span id="select_beacons_error" style="color: red">
                                    </div>
                                    <!-- /multiple select -->


                                    <div class="form-group">

                                        <label class="control-label" style="font-size: 18px;"><S></S>Select Store
                                            <red style="color: red;font-size: 20px;">*</red>
                                        </label>


                                        <select class="bootstrap-select" id="select_store"  name="store_id_to_assign" data-width="100%">

                                            <option value="0">Nothing selected</option>

                                            <?php foreach ($get_stores_list as $stores_data) { ?>
                                            <option value="<?php echo $stores_data->store_id; ?>"> <?php echo $stores_data->store_first_name; ?> </option>
                                            
                                            <?php } ?>

                                        </select>

                                        <span id="select_store_error" style="color: red">
                                    </div>



                                </div>

                                <div class="row form-group" style="margin-top: 3%;">
                                        <div class="text-center">

                                            <button id="assignCashrubBeacon" type="submit" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-checkmark3"></i></b> Assign</button>

                                            

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

    <script>
        $("#sample_3").DataTable({

                                "paging": true, 
                                "lengthChange": false,
                                "searching": true,
                                "ordering":false,
                                "info": true,
                                "autoWidth": true

        }); 

         $("#sample_3").on('click','#delete-sub',function(){

            if (confirm("Are you sure to delete this Beacon ?") == false) {
                                    return;
                                }
              alert("Beacon Deleted");
               $(this).closest('tr').remove();
             });

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

        $("#hidemenow").delay(3000).fadeIn(300).delay(1000).fadeOut(300);

        $("#assignCashrubBeacon").click(function() {
            var select_beacons = $("#select_beacons").val();
            var select_store = $("#select_store").val();
            
            // alert(select_beacons);

            if (select_beacons == null) {
                document.getElementById("select_beacons_error").innerHTML = 'Select atleast one beacon to assign.';
                return false;
            } else {
                document.getElementById("select_beacons_error").innerHTML = '';
            }

            if (select_store == "0") {
                document.getElementById("select_store_error").innerHTML = 'Select atleast one store to assign.';
                return false;
            } else {
                document.getElementById("select_store_error").innerHTML = '';
            }

        });



    </script>







    </body>

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
    </html>
