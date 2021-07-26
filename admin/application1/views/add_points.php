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
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/anytime.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/legacy.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>


        <!-- /theme JS files -->

        <!-- /theme JS files -->

<style>
    .clearable{
      background: #fff url(data:image/gif;base64,R0lGODlhBwAHAIAAAP///5KSkiH5BAAAAAAALAAAAAAHAAcAAAIMTICmsGrIXnLxuDMLADs=) no-repeat right -10px center;
      transition: background 0.4s;
    }
    .clearable.x  { background-position: right 5px center; }
    .clearable.onX{ cursor: pointer; }
    .clearable::-ms-clear {display: none; width:0; height:0;}

</style>
<script type="text/javascript">
    
    jQuery(function($) {
 
          
          // /////
          // CLEARABLE INPUT
          function tog(v){return v?'addClass':'removeClass';} 
          $(document).on('input', '.clearable', function(){
            $(this)[tog(this.value)]('x');
          }).on('mousemove', '.x', function( e ){
            $(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');   
          }).on('touchstart click', '.onX', function( ev ){
            ev.preventDefault();
            $(this).removeClass('x onX').val('').change();
          });
          
          
        });
</script>

    </head>


    <body>
                <!-- /main navbar -->
                    <?php include 'include/header.php' ?>   
                <!-- /main navbar -->


                <!-- Page container -->
                <div class="page-container">

                    <!-- Page content -->
                    <div class="page-content">

                        <!-- Main sidebar -->
                            <?php include 'include/sidebar.php' ?>
                        <!-- /main sidebar -->


                        <!-- Main content -->
                        <div class="content-wrapper">

                            <!-- Page header -->
                            <div class="page-header">
                                <div class="page-header-content">
                                    <div class="page-title">
                                        <h4> <a href="<?php echo base_url(); ?>/index.php/control/setting"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">Buy Points</span></h4>

                                        <div class="heading-elements"  style="right:0px;">
                                            <div class="heading-btn-group">
                                                <a href="<?php echo base_url(); ?>index.php/control/setting" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-eye8"></i></b> View Payment Details </a>

                                            </div>
                                        </div>  

                                        <ul class="breadcrumb position-right">
                                            <li><a href="<?php echo base_url(); ?>/index.php/control/home"><i class="icon-home2 position-left"></i> Home</a></li>
                                            <li><a href="<?php echo base_url(); ?>/index.php/control/setting">Account</a></li>
                                            <li class="active">Buy Points</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <!-- /page header -->


                            <!-- Content area -->
                            <div class="content">

                                <!-- User profile -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Profile info -->
                                        <div class="panel panel-flat">
                                            
                                        <div id="hidemenow">
                                            
                                            <?php
                                                    if ($this->session->flashdata()) {
                                                        echo $this->session->flashdata('message');
                                                    }
                                            ?>

                                        </div>
                                            
                                            <div class="panel-heading">
                                                <h6 class="panel-title"><i class="icon-cash"></i> <b>Buy Points</b></h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <!--    <li><a data-action="collapse"></a></li> -->
                                                <!-- <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body" style="margin-left: 11px;">
                                        <form action="<?php echo base_url(); ?>index.php/control/payment" method="post" >
                                           <!--  <div class="form-group">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="control-label"> Bill Description</label>
                                                        <red style="color: red;font-size: 20px;">*</red>

                                                        <input type="text" id="payment_des" name="payment" maxlength="60" class="form-control clearable" placeholder="Payment Description">
                                                    
                                                        <h7 style="color: red;float: left;" id ="des_error"></h7>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">

                                                    <label for="dtp_input1" class="control-label">Payment Date</label>
                                                    <red style="color: red;font-size: 20px;">*</red>
                                                            <div class="input-group date form_date col-md-12" id="chh" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;"></span></span>
                                                                
                                                                <input class="form-control" size="30" data-date-start-date="+0d" id="changedate1" name="payment_date" placeholder="Payment Date" style="font-size: 15px;" type="text" value="" readonly>
                                                            </div>
                                                            <input type="hidden" id="dtp_input1" value="" /><br/>
                                                            <h7 style="color: red;float: left;" id ="date_error"></h7>


                                                </div>
                                            </div> -->




                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="control-label"> Enter Points</label>
                                                        <red style="color: red;font-size: 20px;">*</red>
                                                        
                                                        <input type="text" id="payment_point" onkeypress="return isNumberKey(event)"  class="form-control clearable" maxlength="6" name="points" placeholder="Enter Points Here..">
                                                        <h7 style="color: red;float: left;" id ="point_error"></h7>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="form-group hidden">
                                                        <label class="control-label"> Credit Points</label>
                                                        <red style="color: red;font-size: 20px;">*</red>

                                                       <!--  <input type="text" id="payment_credit" onkeypress="return isNumberKey(event)"  class="form-control clearable" maxlength="6" name="credits" placeholder="Credit Points"> -->
                                                      
                                                       <input type="number" id="payment_credit" class="form-control clearable"  min="10" max="" name="credits" placeholder="Credit Points" readonly>
                                                        <p style="display:none">Accepting Minimum 10 Points</p>
                                                        <h7 style="color: red;float: left;" id ="credit_error"></h7>

                                                    </div>
                                                </div>
                                            </div>  
                                            
                                            <div class="text-center">

                                                <button type="submit" id="savepayment" class="btn btn-primary btn-labeled btn-labeled ml-10"><b><i class="icon-plus3"></i></b>Buy</button>
                                                <button type="reset" id="resets" onclick="location.href = '<?php echo base_url(); ?>/index.php/control/home';"  class="btn btn-primary btn-labeled btn-labeled ml-10"><b><i class="icon-cross"></i></b> Cancel</button>

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
        <!-- /page container -->
    </div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script>
    var t = false

$('#payment_credit').focus(function () {
    var $this = $(this)
    
    t = setInterval(

    function () {
        if (($this.val() < 1 || $this.val() > 999999999) && $this.val().length != 0) {
            if ($this.val() < 1) {
                $this.val(1)
            }

            if ($this.val() > 999999999) {
                $this.val(999999999)
            }
            $('p').fadeIn(1000, function () {
                $(this).fadeOut(5000)
            })
        }
    }, 50)
})

$('#payment_credit').blur(function () {
    if (t != false) {
        window.clearInterval(t)
        t = false;
    }
})
    
</script>
<script type="text/javascript">
        
        $("#hidemenow").delay(2000).fadeIn(300).delay(1000).fadeOut(300);   


    //     $('.form_datetime').datetimepicker({
    //     //language:  'fr',
    //     weekStart: 1,
    //     todayBtn:  1,
    //     autoclose: 1,
    //     todayHighlight: 1,
    //     startView: 2,
    //     forceParse: 0,
    //     showMeridian: 1,
    //     startDate: '-0d'

    // });
    // $('.form_date').datetimepicker({
    //     language:  'fr',
    //     weekStart: 1,
    //     todayBtn:  1,
    //     autoclose: 1,
    //     todayHighlight: 1,
    //     startView: 2,
    //     minView: 2,
    //     forceParse: 0,
    //     startDate: '-0d'
    // });
    // $('.form_time').datetimepicker({
    //     language:  'fr',
    //     weekStart: 1,
    //     todayBtn:  1,
    //     autoclose: 1,
    //     todayHighlight: 1,
    //     startView: 1,
    //     minView: 0,
    //     maxView: 1,
    //     forceParse: 0
    // });

    function isNumberKey(evt)
    {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            
            return false;

         return true;
    }

    $('#payment_point').change(function(){
        
        var credit = $(this).val() / 4;
        $("#payment_credit").val(credit);
    });

    $("#savepayment").click(function(){
      //  var date = $("#changedate1").val();
       // var des = $("#payment_des").val();
    //    var credit = $("#payment_credit").val();
        var point = $("#payment_point").val();



        // if(des == ''){
        //     document.getElementById("des_error").innerHTML ='Payment description field is required.';
        //     return false ;
        // }else{
        //     document.getElementById("des_error").innerHTML = '';

        // }

        // if(date == ''){
        //     document.getElementById("date_error").innerHTML ='Date field is required.';
        //     return false ;
        // }else{
        //     document.getElementById("date_error").innerHTML = '';

        // }


        if(point == ''){
            document.getElementById("point_error").innerHTML ='Add points field is required.';
            return false ;
        } else if (point <= 10) {
            document.getElementById("point_error").innerHTML ='Point should be greater than 10';
            return false ;
        } else if (point % 4!= 0) {
            document.getElementById("point_error").innerHTML ='Points should be in multiple of 4';
            return false ;
        }else {
            document.getElementById("point_error").innerHTML = '';
        }

        // if(credit == ''){
        //     document.getElementById("credit_error").innerHTML ='Credit points field is required.';
        //     return false ;
        // }else if (credit % 2 != 0) {
        //     document.getElementById("credit_error").innerHTML ='Credit Points should be in multiple of 2';
        //     return false ;
        // }else{
        //     document.getElementById("credit_error").innerHTML = '';

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
