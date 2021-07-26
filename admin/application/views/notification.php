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
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
    
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>        
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_inputs.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>
<style>
    .btn-labeled > b {
        position: absolute;
        top: -1px;
        left: -1px;
        background-color: rgba(0,0,0,.15);
        display: block;
        line-height: 1;
        padding: 13.5px;
     
    }
    .btn-labeled {
        padding-left: 48px;
        padding-right: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        font-size: 17px;
        font-weight: 500;
    }
    .close-icon{
        display: none;float: 
        right;margin-top: -55px;
        margin-right: 12px;
        background-color: white;
        box-shadow: white;
        background-color: rgb(3, 169, 244);
        color: white;
    }
    
</style>

<script type="text/javascript">
    

</script>

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
                            <div class="page-header-content">
                                <div class="page-title">
                                    <h4> <a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">Notification</span></h4>

                                    <!-- <div class="heading-elements">
                                        <div class="heading-btn-group">
                                            <a href="view_beacons.html" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-eye8"></i></b> View Beacons </a>

                                        </div>
                                    </div>   -->

                                    <ul class="breadcrumb position-right">
                                        <li><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-home2 position-left"></i> Home</a></li>
                                        <li class="active">beacon message</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- /page header -->


                        <!-- Content area -->
                        <div class="content">

                            <!-- User profile -->

                                    <div id="hidemenow">
                                        
                                        <?php
                                            if ($this->session->flashdata()) {
                                            echo $this->session->flashdata('notification');
                                            }
                                        ?>

                                    </div>

                                        

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Profile info -->
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="fa fa-bell-o"></i> <b>Set beacon text</b></h6>
                                            <div class="heading-elements">
                                                <ul class="icons-list">
                                                    <!--    <li><a data-action="collapse"></a></li> -->
                                                <!-- <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body" style="margin-left: 11px;">
                                        <form action="<?php echo base_url(); ?>index.php/control/notification" method="post">

                                            

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label class="control-label"> Select Beacon </label>
                                                                   <!--      <a class="btn btn-default btn-select btn-select-light" style="margin-top:10px;">
                                                                            <input type="hidden" class="btn-select-input" id="beacon" name="beacon" value="" />
                                                                            
                                                                            <span class="btn-select-value">Select Beacon</span>
                                                                            <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                                                                            <ul>
                                                                                <?php if(!empty($allBeacona)){ foreach ($allBeacona as $key) { //print_r($key) ?>
                                                                                
                                                                                <li><?php echo $key->beacon_name; ?></li>

                                                                                <?php } } ?>

                                                                            </ul>
                                                                        </a> -->
                                                                        <select class="form-control" name="beacon">
                                                                           <?php if(!empty($allBeacona)){ foreach ($allBeacona as $key) { //print_r($key) ?>
                                                                            <option value="<?php echo $key->id; ?>"><?php echo $key->beacon_name; ?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                        <span id="beaconerror" style="color: red; "></span>
                                                                    </div>
                                                            </div>
                                                        
                                            <div class="form-group">
                                                <div class="row">
                                                    
                                                        <label class="control-label">Beacon Text</label>
                                                        <textarea class="form-control mb-15 " name="notification_message" id="notification" rows="2" cols="1" placeholder="Write Notification Text"></textarea>
                                                        <span id="messageerror" style="color: red"></span>
                                                        <button class="close-icon" type="reset"><b>x</b></button>
                                                        
                                                        
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="text-center">

                                        <button id="sendnot" type="submit" class="btn bg-blue btn-labeled btn-labeled-left ml-10 "><b><i class="icon-check"></i></b> Set</button>
                                        

                                        <button type="reset" onclick="location.href = '<?php echo base_url(); ?>/index.php/control/home';" class="btn bg-blue btn-labeled btn-labeled-left ml-10"><b><i class="icon-cross"></i></b> Cancel</button>

                                        </div>

                                            


                                        </form>

                                    </div>
                                </div>
                                <!-- /form horizontal -->

                </div>
                <!-- /content area -->


            </div>
            <!-- /page content -->

        </div>
        <div class="col-md-12">
            <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered" style="background: #fff">
                <thead><tr>
                    <th>No</th>
                    <th>Beacon</th>
                    <th>Notification</th>
                </tr></thead>
                <tbody>
                       <?php if(!empty($allBeacona)){ $cnt=1; foreach ($allBeacona as $key) { //print_r($key) ?>
                    <tr>
                        <td><?php echo $cnt++; ?></td>
                        <td><?php echo $key->beacon_name; ?></td>
                         <td><?php if(!empty($key->beacon_text)){ echo $key->beacon_text; }else{ echo "-";  } ?></td>
                    </tr>
                <?php } } ?>
                </tbody>
            </table>
        </div>
    </div></div>
        <!-- /page container -->
    </div>
    </div>
    </div>
<script type="text/javascript">
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


        // $('#notification').blur(function(){
        //  var r = $('#notification').val();
        //  if(r != ''){
        //      $('#resets').show();    
        //  }
        // });
    

</script>

<script type="text/javascript">
    


$(document).ready(function(){

     $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);    

    $("#sendnot").click(function(){
        var beacon = $("#beacon").val();
        var message = $("#notification").val();

        // alert(beacon);

        if(beacon == ''){
            document.getElementById("beaconerror").innerHTML ='Please select beacon';
            return false ;
        }else{
            document.getElementById("beaconerror").innerHTML = '';
        }

        if(message == ''){
            document.getElementById("messageerror").innerHTML ='Please enter text';
            return false ;
        }else{
            document.getElementById("messageerror").innerHTML = '';
        }

    });


    // $('.close-icon').hide();

    // $('#notification').keyup(function() {
    //  var comment = $.trim($('#notification').val());
    //  if(comment.length !== 0){
    //      $('.close-icon').show();
    //      // return false;
    //     } else {
    //      $('.close-icon').hide();
    //     }
    // });
    $(document).on('keyup change', '#notification', function() {
        var comment = $.trim($('#notification').val());
        if(comment.length !== 0){
            $('.close-icon').show();
            // return false;
        } else {
            $('.close-icon').hide();
        }
    
    });

    $(document).on('click', '.close-icon', function(){
        // alert();
        $('.close-icon').hide();
    }); 



        // if ($.trim($('#notification').val()).length > 1) {

        //     alert("Hello");

        // } else {

        //     $('#output').html('');
        //     //No guarantee it isn't mindless gibberish, sorry.

        // }


});


</script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tagsinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tokenfield.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/maxlength.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/formatter.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_floating_labels.js"></script>

    </body>
    </html>
