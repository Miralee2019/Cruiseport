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
           <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
      <!--   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script> -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap.min.css
">
        <!-- /core JS files -->
        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
      
        <!-- /theme JS files -->


        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>
     
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
        <style>
         .dataTables_length {
     float: left; 
    display: inline-block;
    margin: 0 0 20px 20px;
}
.dataTables_filter{
    float: right !important;
}
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
   /* font-size: 18px;*/
    color:#000;
   /* height: 200px;*/
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
.btn {
    border-radius: 0 !important; 
}
.dt-buttons {
    float: left;
}
.invoice {
  width: 970px !important;
  margin: 50px auto;
}
.invoice .invoice-header {
  padding: 25px 25px 15px;
}
.invoice .invoice-header h1 {
  margin: 0;
}
.invoice .invoice-header .media .media-body {
  font-size: .9em;
  margin: 0;
}
.invoice .invoice-body {
  border-radius: 10px;
  padding: 25px;
  background: #FFF;
}
.invoice .invoice-footer {
  padding: 15px;
  font-size: 0.9em;
  text-align: center;
  color: #999;
}

.logo {
  max-height: 70px;
  border-radius: 10px;
}

.dl-horizontal {
  margin: 0;
}
.dl-horizontal dt {
  float: left;
  width: 80px;
  overflow: hidden;
  clear: left;
  text-align: right;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.dl-horizontal dd {
  margin-left: 90px;
}

.rowamount {
  padding-top: 15px !important;
}

.rowtotal {
  font-size: 1.3em;
}

.colfix {
  width: 12%;
}

.mono {
  font-family: monospace;
}
.media-left img:not(.media-preview), .media-right img:not(.media-preview), .thumbnail .media img:not(.media-preview) {
     width: 100% !important;
    /* height: 100px!important; */
    /* max-width: none; */
    border-color: #2b4a56;
    border-width: 2px;
    border-style: solid;
    background: #0c7cd5;
}
.invoice .invoice-header .media .media-body {
    font-size: .9em;
    margin: 0;
}
@page { sheet-size: A3-L; }
  
@page bigger { sheet-size: 420mm 370mm; }
  
@page toc { sheet-size: A4; }
  
h1.bigsection {
        page-break-before: always;
        page: bigger;
}

        </style>
    </head>
    <body>
    
 <div class="container invoice" id="content">
  <div class="invoice-header">
    <div class="row">
      <div class="col-xs-8" style="width: 50%">
        <h1>Invoice <small>With Credit</small></h1>
        <h4 class="text-muted">NO: <?php echo $transaction->id; ?> | Date: <?php echo date('Y-m-d',$transaction->created_at); ?></h4>
      </div>
      <div class="col-xs-4" style="width: 33.33%">
        <div class="media">
          <div class="media-left"  style="width: 50%">
            <img class="media-object logo" src="<?php echo base_url() ?>assets/images/cashrub-logo.png" alt="" width="480">
          </div>
         
        </div>
      </div>
    </div>
  </div>
  <div class="invoice-body">
    <div class="row">
      <div class="col-xs-5" style="width: 37.33%">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Company Details</h3>
          </div>
          <div class="panel-body">
            <dl class="dl-horizontal">
              <dt>Name</dt>
              <dd><strong>Cashrub</strong></dd>
             <!--  <dt>Industry</dt>
              <dd>Software Development</dd> -->
              <dt>Address</dt>
              <dd>Field 3, Moon</dd>
              <dt>Phone</dt>
              <dd>123.4456.4567</dd>
              <dt>Email</dt>
              <dd>info@cashrub.com</dd>
              <dt>Tax NO</dt>
              <dd class="mono">123456789</dd>
              <dt>Tax Office</dt>
              <dd>A' Moon</dd>
          </dl></div>
        </div>
      </div>
      <div class="col-xs-7">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Customer Details</h3>
          </div>
          <div class="panel-body">
            <dl class="dl-horizontal">
            	<?php $store_id=$transaction->store_id;
            	$query=$this->db->where('store_id',$store_id)->get('T_Store');
            	$store_details=$query->row();
            	 ?>
              <dt>Name</dt>
              <dd><?php echo $store_details->store_first_name; ?></dd>
              <dt>Industry</dt>
              <dd><?php echo $store_details->store_email; ?></dd>
              <dt>Address</dt>
              <dd><?php echo $store_details->store_address1; ?></dd>
              <dt>Phone</dt>
              <dd><?php echo $store_details->store_mobile_no; ?></dd>
              <dt>Email</dt>
              <dd><?php echo $store_details->store_email; ?></dd>
              <dt>Tax NO</dt>
              <dd class="mono">123456789</dd>
              <dt>&nbsp;</dt>
              <dd>&nbsp;</dd>
          </dl></div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <table class="table table-bordered table-condensed">
        <thead>
          <tr>
            <td class="text-center col-xs-1">Transacrion Id</td>
            <td class="text-center col-xs-1">No Of Rubs</td>
            <td class="text-center col-xs-1">Price</td>
            <td class="text-center col-xs-1">Tax</td>
            <td class="text-center col-xs-1">Final</td>
          </tr>
        </thead>
        <tbody>
          <tr>
          	<?php  $price=$transaction->no_of_rubs/4 + ((($transaction->no_of_rubs/4)*10)/100); ?>
            <th class="text-center rowtotal mono"><?php echo $transaction->transaction_key; ?></th>
            <th class="text-center rowtotal mono"><?php echo $transaction->no_of_rubs; ?></th>
            <th class="text-center rowtotal mono"> <i class="fa fa-inr" aria-hidden="true"></i><?php echo $price; ?></th>
            <th class="text-center rowtotal mono"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $transaction->amount-$price; ?></th>
            <th class="text-center rowtotal mono"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $transaction->amount; ?></th>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="row">
      <div class="col-xs-7"  style="width: 53.33%">
        <div class="panel panel-default">
          <div class="panel-body">
            <i>Comments / Notes</i>
            <hr style="margin:3px 0 5px"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit repudiandae numquam sit facere blanditiis, quasi distinctio ipsam? Libero odit ex expedita, facere sunt, possimus consectetur dolore, nobis iure amet vero.
          </div>
        </div>
      </div>
      <div class="col-xs-5">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Payment Method</h3>
          </div>
          <div class="panel-body">
            <p>For your convenience, you may deposite the final ammount at one of our banks</p>
            <ul class="list-unstyled">
              <li>Alpha Bank - <span class="mono">MO123456789456123</span></li>
              <li>Beta Bank - <span class="mono">MO123456789456123</span></li>
              <li>Gamma Bank - <span class="mono">MO123456789456123</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="invoice-footer">
  
  </div>
</div>
<div class="text-center">
<a href="<?php echo base_url().'index.php/control/pdf/'.$transaction->id; ?>" target="_blank" class="btn btn-primary">Generate PDF</a>
</div>
</body>

</html>