<?php error_reporting(0); ?>

    <!DOCTYPE html>
    <html lang="en">

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Feb 2017 12:23:01 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cash Rub</title>

    <!-- Global stylesheets -->
    
    <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/dashboard.css" rel="stylesheet" type="text/css">


    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/plugins/pickers/daterangepicker.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
    
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/dashboard.js"></script>
    <!-- /theme JS files -->
    <style type="text/css">
        
        .dataTables_filter input {
            margin-left: 5px;
        }
        .left{
            left:-90px;
            min-width:160px;
        }

        body{
            font-family:"Raleway", sans-serif !important;
        }

        .left {
            left: -116px;
            min-width: 175px;
        }

        #add {

            display: inline-block;
            margin-left: 10px;
            /*position: absolute;*/
            margin-top: -5px;
        }   
        @media (min-width: 320px) and (max-width: 767px){  

            #add {
               position: relative;
                margin-bottom: 10px;
            }   

        } 

        @media (min-width: 980px){  


            .daterangepicker{
                left: 415px !important;
            }

            .calendar{
                margin: 0px !important;
            }

        } 

        
        .daterangepicker_input{
            display: none;
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
                             <h4> <span class="text-semibold" style="letter-spacing:1px;" >Offer updation requests</span></h4> 

                                <ul class="breadcrumb position-left">
                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-home2 position-left"></i> Home</a></li>
                            <li><a href="#">offer request Details</a></li>
                        </ul>
                    </div>
                    </div>
        
                </div>
            
                <!-- /page header -->





                <!-- Content area -->
                <div class="content">

                <div style="text-align:center;display:none;" id="styleme">
                        <div class="alert alert-success">
                            <strong>Refresh successful.</strong>
                        </div>    
                   </div>

                
                    <!-- Main charts -->
                    <!-- <div class="row"> -->

                    <!-- Quick stats boxes -->


                        <div id="hidemenow">
                            
                            <?php
                            
                                if ($this->session->flashdata()) {
                                    echo $this->session->flashdata('notification_message');
                                }

                                if ($this->session->flashdata()) {
                                    echo $this->session->flashdata('store_blocked');
                                }
                            
                            ?>

                        </div>

                            

            <!-- <div class="loader"></div> -->

                          <div class="row">
                            <div class="col-lg-12">
                            <!-- Marketing campaigns -->
                            <div class="panel panel-flat"  style="overflow-x: scroll; ">
                                <div class="panel-heading">

                                    <h6 class="panel-title" style="letter-spacing:1px;" ><b>View offer updation requests</b></h6>

<!--                                        <div>
                                            <h5>Select Date Range : </h5><input type="text" style="padding: 12px; border: 1px solid #ccc;" id="myDate" size="21" name="daterange" value="<?php echo $s_date; ?> - <?php echo $e_date; ?>" /><i class="icon-calendar" style="font-size: 16px;margin-left: -24px;color: grey;margin-top: -2px;"></i>
                                        </div> -->


                                    <!-- <h6 class="panel-title"> <i class="icon-store facebook social-border"></i> Store Details</h6> -->
                                    
                                    <div class="heading-elements">
                                            <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li> 
                                        <li><a id="shows" data-action="reload"></a></li>
                                                <!-- <li><a data-action="reload"></a></li>  -->
                                            <!--    <li><a data-action="close"></a></li> -->    
                                            </ul>
                                    </div>

                                </div>
                            <div class="">
                            
                                <table class="table table-hover" id="sample_3">
                                                                                    
                                    <thead>
                                        <tr>
                                            <th class="col-md-1"><b>ID</b></th>
                                            <th class="col-md-3"><b>Updation request time</b></th>
                                            <th class="col-md-2"><b>Store Name</b></th>
                                            <th class="col-md-2"><b>Store Email</b></th>
                                            <th class="col-md-2"><b>Offer title</b></th>
                                            <th class="col-md-1"><b>Status</b></th>
                                            <th class="col-md-2"><b>View Details </b></th>
                                            <th class="col-md-1"><b>Actions</b></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($total_store as $key) { 

                                            $CI =& get_instance();
                                            $CI->load->model('Supermodel');
                                            
                                            $offer_details = $CI->Supermodel->select_data("T_StoreOffer", array('store_id' => $key->store_id ));
                                            $store_details = $CI->Supermodel->select_data("T_Store", array('store_id' => $key->store_id ));
                                            

                                        ?>

                                        <tr>
                                            <td class="col-md-1"><?php echo $store_details[0]->store_id; ?></td>
                                            <td class="col-md-3"><?php echo $key->last_updated_date; ?></a></td>
                                            <td class="col-md-2"><?php echo $store_details[0]->store_first_name; ?></a></td>
                                            <td class="col-md-2"><?php echo $store_details[0]->store_email; ?></a></td>
                                            <td class="col-md-2"><?php echo $offer_details[0]->title;  ?></a></td>
                                            <!-- <td class="col-md-2"><?php echo $key->store_address2; ?></td> -->

                                            <?php if($key->offer_status == 1) {    ?>
                                                <td class="center col-md-1"><span class="label label-sm label-info">Active </span></td>
                                            <?php } elseif($key->offer_status == 6) { ?>
                                                <td class="center col-md-1"><span class="label label-sm label-danger">Registered</span></td>
                                            <?php } elseif($key->offer_status == 5) { ?>
                                                <td class="center col-md-1"><span class="label label-sm label-danger">cancelled </span></td>
                                            <?php } elseif($key->offer_status == 2) { ?>
                                                <td class="center col-md-1"><span class="label label-sm label-danger">pending </span></td>
                                            <?php } elseif($key->offer_status == 7) { ?>
                                                <td class="center col-md-1"><span class="label label-sm label-danger">Suspended</span></td>
                                            <?php } elseif($key->offer_status == 8) { ?>
                                                <td class="center col-md-1"><span class="label label-sm label-danger">Rejected</span></td>
                                            <?php }else{ ?>
                                                <td class="center"><span class="label label-sm label-danger">unknown </span></td>
                                            <?php } ?>

                                            <!-- <td class="col-md-1"><?php echo $key->store_point; ?></td> -->
                                            

                                            <td class="col-md-2">
                                                <ul class="list-inline list-inline-condensed heading-text">
                                                    
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>index.php/superadmin/view_shopinfo/<?php echo $key->store_id; ?>" class="text-default"><i class="icon-eye8"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </td>


                                            <td class="col-md-1">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>
                                                        <ul class = "dropdown-menu shop-list left" role = "menu">

                                                            <?php if($key->offer_status == 1) {?>

                                                                <li><a href="#" id="change_status3" data-store =<?php echo $key->store_id;?> data-status = "7"><i class="icon-cross"></i> Suspend </a></li>
                                                                <li>

                                                            <?php } elseif($key->offer_status == 2) { ?>

                                                                <li ><a href="#" id="change_status" data-store =<?php echo $key->store_id;?> data-status = "2"> <i class="icon-check"></i> Approve</a></li>
                                                            
                                                                <li><a href="#" id="change_status2" data-store =<?php echo $key->store_id;?> data-status = "8"><i class="icon-cross"></i> Reject</a></li>

                                                            <?php } ?>

                                                            
                                                            <li>
                                                                <a href="" id="notify_store" data-store="<?php echo $key->store_id ?>" data-toggle="modal" data-target="#myModal"> <i class="icon-envelope"></i>  Send Notification </a>

                                                            </li>

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    

                                    </tbody>
                                </table>

                            </div>
                        </div>
                            <!-- /marketing campaigns -->
        
                        <!-- </div>  -->
                            
                        
                    </div>
                    </div>
                    
                                    
                 </div>
                </div>
                        
        
                </div>
              </div>
    
    <!-- model         -->


        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="sname">Send Notification</h4>
                <br>
                
                <form action="<?php echo base_url(); ?>index.php/superadmin/sendNotificationToStore" method="post" class="form-horizontal"  role="form">
                    <!-- <input type="hidden" name="userId" id="userId"> -->
                <div>
                    <input type="text" class="form-control input-lg" class="form-control" name="subject" placeholder="Enter subject">   
                </div>
                    <br>
                    <input type="hidden" name="store_id" id="store_id">
                    
                    <div>
                        <textarea maxlength="120" id="changemsg" class="form-control input-lg" style="max-width:557px;max-height: 148px;" rows="5" name="message" placeholder="Enter message"></textarea>   
                    </div>
                    
                    <br><br>

                    <!-- <fieldset>
                        
                        
                        
                    </fieldset> -->

                    <div align="center">
                        
                            <button type="submit" style="font-size: 19px;" class="btn btn-info btn-lg">Send notification</button>
                        
                    </div>

                </form>

                
              </div>
            </div>

          </div>
        </div>


    <!-- end model -->

    </body>

    <script type="text/javascript">

    $("#sample_3").DataTable({

                                "paging": true, 
                                "lengthChange": false,
                                "pageLength": 10,
                                "searching": true,
                                "ordering":false,
                                "info": false,
                                "autoWidth": true,
                                dom : 'l<"#add">frtip'

                              } ); 

    </script>

    <script type="text/javascript">

        $(document).on("click", "#change_status", function () {
            
            var status = $(this).data('status');
            var store = $(this).data('store');

            $.post("<?php echo base_url(); ?>index.php/superadmin/changeStoreStatus/"+store+"/"+status+"", function(data, status){
                $(".loader").fadeOut("slow");
                location.reload();
            });
        });

        $(document).on("click", "#change_status2", function () {
            
            var status = $(this).data('status');
            var store = $(this).data('store');

            $.post("<?php echo base_url(); ?>index.php/superadmin/changeStoreStatus/"+store+"/"+status+"", function(data, status){
                // $(".loader").fadeOut("slow");
                location.reload();
            });
        });

        $(document).on("click", "#change_status3", function () {
            
            var status = $(this).data('status');
            var store = $(this).data('store');

            $.post("<?php echo base_url(); ?>index.php/superadmin/changeStoreStatus/"+store+"/"+status+"", function(data, status){
                // $(".loader").fadeOut("slow");
                location.reload();
            });
        });

        $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);

        $('#shows').click(function() {
            
            $('#styleme').delay(2000).fadeIn(300).delay(1000).fadeOut(300);;
        });

        $('<label/>').text('Select custom range:').appendTo('#add')

        // $mine = $("<input type="text" name="daterange"/>")

        $select = $('<input type="text" style="padding: 7px 36px 7px 12px; border: 1px solid #ccc;margin-left: 9px;margin-right: -24px;margin-top: 3px;" id="myDate" size="21" name="daterange" value="<?php echo $s_date; ?> - <?php echo $e_date; ?>" /><i class="fa fa-calendar glyphicon glyphicon-calendar" id="my_id" style="font-size: 16px;color: grey"></i>').appendTo('#add')



    </script>


<!-- <script type="text/javascript">
$(window).load(function() {

    $(".loader").fadeOut("slow");
})
</script> -->
        <script type="text/javascript">
            $(document).on("click", "#notify_store", function () {
             var store_id = $(this).data('store');
                $(".modal-body #store_id").val( store_id );
            });    
        </script>

    <!-- new code 25 july -->

    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/my_files/moment.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>superassets/my_files/daterangepicker.js"></script>

    

    <script type="text/javascript">
    
        $('input[name="daterange"]').daterangepicker();
        $('input[name="daterange"]').daterangepicker({
            locale: {
              format: 'YYYY-MM-DD'
            },
            startDate: "<?php echo $s_date; ?>",
            endDate: "<?php echo $e_date; ?>"
        },
        function(start, end, label) {
            window.location = "<?php echo base_url(); ?>index.php/superadmin/dateRangeStore?startdate="+start.format('YYYY-MM-DD')+"&enddate="+end.format('YYYY-MM-DD');
        });
 
    </script>


    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Feb 2017 12:34:08 GMT -->
    </html>
