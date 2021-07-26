<?php error_reporting(0); ?>
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
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png" />
        <!-- /core JS files -->
        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
<!--         <script type="text/javascript" src="<?php //echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script> -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
      <!--   <script type="text/javascript" src="<?php //echo base_url(); ?>assets/js/pages/datatables_basic.js"></script> -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_inputs.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
       <!--  <script type="text/javascript" src="<?php //echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script> -->
        <!-- /theme JS files -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>
        <style>
        html,body{
            overflow-x: hidden;
        }
            .btn-labeled > b {
                position: absolute;
                top: -1px;
                left: -1px;
                background-color: rgba(0, 0, 0, .15);
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
            /*.form-group {
            margin-bottom: 40px;
        }*/
            .dataTables_filter input {
                margin-left: 7px;
            }
            .billing-credit-remaing{
          background: #fff;
    padding: 2% 1%;
    font-size: 18px;
    color:#000;
    height: 200px;
}
.billing-title{    font-size: 24px;
    font-weight: 500;
}
.billing-credits{
        font-size: 36px;
    font-weight: 500;
}
.payment-billing-div{
        /*position: absolute;*/
    margin-top: 4%;
}
.btn-payment-primary{
    background: #2196F3;
    color: #fff;
    font-size: 16px;
    padding: 10px 25px;
    border-radius: 0 !important
}
.btn-payment-primary:hover{
    color: #fff;
}
.billing-transaction-div{
    background: #fff;
    margin-top: 2%;
    padding: 5%;
    height: 250px;
}
.billing-transaction-data {   margin-top: 3%;
    font-size: 16px;
}
.billing-action-div{
    background: #fff;
    border-top: 1px solid #d2cccc;
    padding: 5%;
    font-size: 17px;
    line-height: 1px;
    }
    .modal-header .close {
    position: absolute;
    right: 20px;
    top: 40%;
    color: #fff;
    margin-top: 0;
}
.modal-header {
    position: relative;
    padding-bottom: 0;
    padding: 3%;
    color: #fff;
        background: #737e84;
}
.group {
  position: relative;
  margin-bottom: 45px;
}
input {
  font-size: 18px;
  padding: 10px 10px 10px 5px;
  display: block;
  width: 100%;
  border: none;
  border-bottom: 1px solid #757575;
}
input:focus {
  outline: none;
}

/* LABEL ======================================= */
label {
  color: #999;
  font-size: 18px;
  font-weight: normal;
  position: absolute;
  pointer-events: none;
  left: 5px;
  top: 10px;
  transition: 0.2s ease all;
  -moz-transition: 0.2s ease all;
  -webkit-transition: 0.2s ease all;
}

/* active state */
input:focus ~ label,
input:valid ~ label {
  top: -20px;
  font-size: 14px;
  color: #5264ae;
}

/* BOTTOM BARS ================================= */
.bar {
  position: relative;
  display: block;
  width: 100%;
}
.bar:before,
.bar:after {
  content: "";
  height: 2px;
  width: 0;
  bottom: 1px;
  position: absolute;
  background: #5264ae;
  transition: 0.2s ease all;
  -moz-transition: 0.2s ease all;
  -webkit-transition: 0.2s ease all;
}
.bar:before {
  left: 50%;
}
.bar:after {
  right: 50%;
}

/* active state */
input:focus ~ .bar:before,
input:focus ~ .bar:after {
  width: 50%;
}

/* HIGHLIGHTER ================================== */
.highlight {
  position: absolute;
  height: 60%;
  width: 100px;
  top: 25%;
  left: 0;
  pointer-events: none;
  opacity: 0.5;
}

/* active state */
input:focus ~ .highlight {
  -webkit-animation: inputHighlighter 0.3s ease;
  -moz-animation: inputHighlighter 0.3s ease;
  animation: inputHighlighter 0.3s ease;
}

/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
  from {
    background: #5264ae;
  }
  to {
    width: 0;
    background: transparent;
  }
}
@-moz-keyframes inputHighlighter {
  from {
    background: #5264ae;
  }
  to {
    width: 0;
    background: transparent;
  }
}
@keyframes inputHighlighter {
  from {
    background: #5264ae;
  }
  to {
    width: 0;
    background: transparent;
  }
}
.transaction-data{
  margin-top: 10px;
  font-size: 13px;
}
/*.error{
  color: red;
}*/
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
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4> <a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">Add Beacon</span></h4>
                                <ul class="breadcrumb position-right">
                                    <li><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-home2 position-left"></i> Home</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/control/viewBeacon">Beacons</a></li>
                                    <li class=active>Add Beacons</li>
                                </ul>
                            </div>
                            <!-- =========================Yashraj code ===================-->
                            <div style="text-align:center;display:none;" id="hidemenow-1">
                                <?php
                                if ($this->session->flashdata()) {
                                    echo $this->session->flashdata('success');
                                }
                                ?>
                            </div>
                            <!-- =========================Yashraj code ===================-->
                        </div>
                    </div>
                    <!-- /page header -->
                    <!-- Content area -->
                    <div class="content">
                       <div class="row">
                         <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="row  billing-credit-remaing">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                   <div class="billing-title"> Your Remaining Credit</div>
                                </div>
                                  <div class="col-md-6">
                                    <div class="billing-credits  pull-right">  <?php if ($dash[0]->store_point > 0) {
                echo $dash[0]->store_point;
            } else {
                echo "0";
            } ?></div>
                                  </div>
                            </div>
                            <div class="col-md-12 payment-billing-div">
                                <div class="col-md-6"><i class="fa fa-credit-card" style="font-size:24px;margin-right: 10px;"></i>Mannual Payment</div>
                                <div class="col-md-6"><button class="btn btn-payment-primary pull-right" data-toggle="modal" data-target="#myModal">Make A Payment</button></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                            
<div class="col-md-6">
    <div class="billing-transaction-div">
     <div class="billing-title"> Transactions</div>
     <?php if(!empty($transactions)){ foreach ($transactions as $transaction) {
       ?>
       <div class="row transaction-data">
       <div class="col-md-4"><a><?php echo $transaction->transaction_key; ?></a></div>
        <div class="col-md-4"><a style=""><?php echo date('Y-m-d  h:i A',$transaction->created_at); ?></a></div>
        <div class="col-md-2"><a style="text-align: center;"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $transaction->amount; ?></a></div>
        <div class="col-md-2"><a style=""><?php echo $transaction->no_of_rubs; ?></a></div>
    </div>
     <?php } }else{ ?>
     <div class="billing-transaction-data">You have not done any transaction</div>
<?php } ?>
 </div>
  <div class="billing-action-div"><a class="pull-right" href="<?php echo base_url('index.php/control/transaction_details'); ?>">View transactions and Documents</a></div>
</div>
<!-- <div class="col-md-6">
    <div class="billing-transaction-div">
     <div class="billing-title"> Settings</div>
     <div class="billing-transaction-data">You have not done any transaction</div>
 </div>
 <div class="billing-action-div"><a class="pull-right" href="<?php //echo base_url('index.php/control/payment_settings') ?>">View Settings</a></div>
</div> -->
                           
                        </div>
                      
  <!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Purchase A Rubs</h4>
        </div>
        <div class="modal-body">
          <form id="buy-rubs" action="<?php echo base_url('index.php/control/check_rubs/'); ?>" method="post">
         <div class="col-md-12" style="margin-top: 5%;">
                 <div class="group">      
      <input type="text" name="rubs" id="rubs" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label id="rubs-error" class="error" for="rubs">Enter Rubs</label>
    </div>

    <!--     <div class="group">      
      <input type="text" name="coupon" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Enter Coupon Code</label>
    </div> -->
    <!-- <input type="hidden" name="ruppess"> -->
         </div>
           <div class="col-md-12 text-center"><div style="font-size: 16px;">You Have to pay</div><div style="font-size: 32px;"><i class="fa fa-inr" aria-hidden="true"></i>
 <span id="rubs_rupees">0</span></div></div>
         <div class="col-md-12" style="margin-top: 5%;" >
             <button class="btn btn-payment-primary col-md-offset-4 text-center" type="submit">Make A Payment</button>
         </div>
       </form>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div>
  
                </div>
                       </div>
                        <!-- content area end -->
                    </div>
                    <!-- /main content end -->
                </div>
                <!-- page content end -->
            </div>
        </div>
        <!-- /page container -->
        <!-- Modal -->
        <script type="text/javascript">
          $("#rubs").keyup(function(){
           var rubs=$(this).val();
          // alert("hii");
          if(!isNaN(rubs))
          {
            rubs_rupees=(rubs/4) + (((rubs/4)*10)/100) ;

           console.log(rubs_rupees);
           $("#rubs_rupees").html(rubs_rupees);
          }else{
             console.log("no");
          }
          });


            $("#buy-rubs").validate({
            rules: {
                rubs: "required",
              
                rubs: {
                    required: true,
                    digits: true,
                   min:200
                                   },
            },
            messages: {
                rubs: {
                    required: "Please enter rubs",
                    digits: "Please enter only digits(0-9)",
                   
                },
               
               
            }
        });
        </script>


        <!-- end -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tagsinput.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tokenfield.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/maxlength.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/formatter.min.js"></script>
      <!--   <script type="text/javascript" src="<?php //echo base_url(); ?>assets/js/pages/form_floating_labels.js"></script> -->
    </body>
</html>