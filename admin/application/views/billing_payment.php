<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/components_thumbnails.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Feb 2017 05:37:07 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cannon Design</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="<?php echo base_url() ?>/assets_c/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>/assets_c/css/ques.css" rel="stylesheet" type="text/css">

                <!-- other -->

        <link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom1.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>        

        <!-- end -->


        <!--<link rel="stylesheet" href="<?php echo base_url() ?>/assets_c/js/plugins/iCheck/square/square.css">-->
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        
        <!--<script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/forms/styling/switchery.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/media/fancybox.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/plugins/uploaders/fileinput.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/pages/uploader_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/assets_c/js/pages/components_thumbnails.js"></script>
   
      
    
       <style>
            .fileinput-upload-button{
                display: none;
            }
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
                .vertical-offset-100{
    padding-top:100px;
}
        </style>
        <style type="text/css">
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
.checkout-div{
padding: 2%;
background: #fff;
}
.title-payment{
      font-size: 24px;
    font-weight: 500;
    margin-top: 10px;
}
.btn-payment-primary{
    background: #2196F3;
    color: #fff;
    font-size: 16px;
    padding: 10px 25px;
    border-radius: 0 !important;
        width: 100%;
}
.btn-payment-primary:hover{
    color: #fff;
}
.payment-title{
font-size: 16px;
    line-height: 2.5em;

}
.payment-in-amount{
font-size: 16px;
font-weight: 700;
    line-height: 2.5em;

}
hr{
  margin-top: 5px;
  margin-bottom: 5px;
}
.swal-footer{
	text-align: center !important;
}
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
                 
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="col-md-6 col-md-offset-3 checkout-div">
      <div class="col-md-12">
        <div class="col-md-6 title-payment">Payment Details</div>
        <div class="col-md-6 pull-right">
        <i class="fa fa-cc-mastercard" style="font-size:48px;color:#01a8f6!important;"></i>
        <i class="fa fa-cc-visa" style="font-size:48px;color:#01a8f6!important;"></i>
        <i class="fa fa-credit-card" style="font-size:48px;color:#01a8f6!important;"></i>
      </div>
      </div>
       <div class="col-md-12" style="margin-top: 5%;    padding: 3%;">
          <div class="col-md-12">
        <div class="col-md-6 payment-title">Store Email Address:</div>
        <div class="col-md-6"><div class="payment-in-amount pull-right"> <?php if(!empty($email)){ echo $email; }else{ echo "0";  } ?></div>
          </div>
       </div>
         <div class="col-md-12">
        <div class="col-md-6 payment-title">Store Phone No:</div>
        <div class="col-md-6"><div class="payment-in-amount pull-right"> <?php if(!empty($user_data)){ echo $user_data->store_mobile_no; }else{ echo "0";  } ?></div>
          </div>
       </div>
      
         <div class="col-md-12">
        <div class="col-md-6 payment-title">No of Rubs:</div>
        <div class="col-md-6"><div class="payment-in-amount pull-right"><?php if(!empty($rubs)){ echo round($rubs,2); }else{ echo "0";  } ?></div>
          </div>
       </div>
         <div class="col-md-12">
        <div class="col-md-6 payment-title">Payment In amount:</div>
        <div class="col-md-6"><div class="payment-in-amount pull-right"><i class="fa fa-inr" aria-hidden="true"></i> <?php if(!empty($price)){ echo round($price,2); }else{ echo "0";  } ?></div>
          </div>
       </div>
<div class="col-md-12">
        <div class="col-md-6 payment-title">GST:</div>
        <div class="col-md-6"><div class="payment-in-amount pull-right"><i class="fa fa-inr" aria-hidden="true"></i> <?php if(!empty($gst)){ echo round($gst,2); }else{ echo "0";  } ?></div>
          </div>
       </div>
       <div class="col-md-12">
      <!--   <div class="col-md-6 payment-title">Convience Fee:</div>
        <div class="col-md-6"><div class="payment-in-amount pull-right">$2.5</div>
          </div>
       </div> -->
     </div>
    <div class="col-md-12" style="margin-top: 0%;"><hr></div>
     <div class="col-md-12" style="padding: 3%;">
        <div class="col-md-6 payment-title">Total Amount:</div>
        <div class="col-md-6"><div class="payment-in-amount pull-right"><i class="fa fa-inr" aria-hidden="true"></i> <?php if(!empty($total)){ echo round($total,2); }else{ echo "0";  } ?></div>
          </div>
       </div>
 <div class="col-md-12">
 	<?php if($total!=0){ ?>
  <button class="btn btn-payment-primary pull-right" id="rzp-button1">Make A Payment</button>
<?php } ?>
 </div>
    </div>
  </div>
</div>
      </div>
                </div>
            </div>
        </div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script>
var options = {
    "key": "rzp_test_2HKZ23YQdAMfcP",
    "amount": <?php if(!empty($total)){ echo round($total,2)*100; }else{ echo "0";  } ?>, // 2000 paise = INR 20
    "name": "<?php if(!empty($user_data)){ echo $user_data->store_first_name; }else{ echo "0";  } ?>",
    "description": "Purchasing rubs",
    "image": "<?php echo base_url() ?>uploads/<?php if(!empty($user_data)){ echo $user_data->store_logo; }else{ echo "0";  } ?>",

    "handler": function (response){
      //  alert();
      var payment_id=response.razorpay_payment_id;
      var email="<?php echo $email; ?>";
      var phone="<?php if(!empty($user_data)){ echo $user_data->store_mobile_no; }else{ echo "0";  } ?>";
      var rubs="<?php echo $rubs; ?>";
        $.ajax({
  type: "post",
  url: "<?php echo base_url().'index.php/control/save_payment'; ?>",
  data: {'payment_id':payment_id,"email":email,"phone":phone,"rubs":rubs},
  /*cache: false,*/
  success: function(data){
    console.log(data);
    if(data==1)
    {
    	swal("Transaction successful", "Please check store balance", "success");
    	  setTimeout(function () {
    	window.location.href = "<?php echo base_url().'index.php/control/billing';  ?>";
    }, 3000);
    }else{
    		swal("Transaction failed", "Something went wrong please try later or contact to cashrub team!", "danger");
    	  setTimeout(function () {
    	window.location.href = "<?php echo base_url().'index.php/control/billing';  ?>";
    	}, 3000);
    }
  }
});
    },

    "prefill": {
        "name": "<?php if(!empty($user_data)){ echo $user_data->store_first_name; }else{ echo "0";  } ?>",
        "email": "<?php echo $email; ?>",
        "contact":"<?php if(!empty($user_data)){ echo $user_data->store_mobile_no; }else{ echo "0";  } ?>",
    },
    "notes": {
        "address": "XYZ"
    },
    "theme": {
        "color": "#5d89e5"
    }
};
var rzp1 = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
<?php if($total==0){ ?>
	<script type="text/javascript">
		window.location.href = "<?php echo base_url().'index.php/control/billing';  ?>";
	</script>
	<?php } ?>
      </body>
      </html>