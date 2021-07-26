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
      
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link href="<?php echo base_url(); ?>superassets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>superassets/css/colors.css" rel="stylesheet" type="text/css">
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


        </style>
    </head>
    <body>
        <!-- Main navbar -->
          <?php include 'include/mainheader.php';  ?>
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
                                <h4> <a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">Billing Dettails</span></h4>
                                <ul class="breadcrumb position-right">
                                    <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-home2 position-left"></i> Home</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/superadmin/billing">Billing Dettails</a></li>
                                    <li class=active>Billing Dettails</li>
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
                                   <div class="billing-title"> Your Transaction Details</div>
                                </div>
                                  <div class="col-md-6">
                                    <!-- <div class="billing-credits  pull-right">   0.00</div> -->
                                  </div>
                                   <div class="col-md-3">
                                     <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span id="daterange"></span> <i class="fa fa-caret-down"></i>
</div></div>
<div class="col-md-2"><button class="btn btn-primary" id="daterangepick">GO</button></div>
<div class="col-md-12" style="margin-top: 4%" id="date_filtered_data">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Paymnet Key</th>
                <th>Payment Method</th>
                <th>Amount</th>
                <th>Currency</th>
                 <th>Store Name</th>
                <th>No of rubs</th>
                <th>Status</th>
                <th>Date/Time</th>
                
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($transactions)){ $cnt=1; foreach ($transactions as $transaction) { ?>
            <tr>
                <td><?php echo $cnt++; ?></td>
                <td><a onclick="display_pdf(<?php echo $transaction->id; ?>)"><?php echo $transaction->transaction_key; ?></a></td>
                <td><?php echo $transaction->method; ?></td>
                <td><?php echo $transaction->amount; ?></td>
                <td><?php echo $transaction->currency; ?></td>
                <td><?php $query=$this->db->where('store_id',$transaction->store_id)->get('T_Store');
                $result=$query->row();
                if(!empty($result))
                {
                  echo $result->store_first_name;
                }  
                 ?></td>
                <td><?php echo $transaction->no_of_rubs; ?></td>
                 <td><?php echo $transaction->status; ?></td>
                <td><?php echo date('Y-m-d h:i  A',$transaction->created_at); ?></td>
                
            </tr>
        <?php } } ?>
           
        </tbody>
       
    </table>
</div>
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                       

                        </div>
                    </div>
                 
                      
  <!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="    width: 65%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Invoice Details</h4>
        </div>
        <div class="modal-body">
       <div class="row" id="data-content"></div>
        </div>
        <div class="modal-footer">
         <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        
        </div>
      </div>
      
    </div>
  </div>
  
        <script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
$(document).ready(function() {
     var table = $('#example').DataTable({
        lengthChange: false,
        buttons: [ 'copy', 'excel','csv', 'pdf', 'colvis' ]
    });
     table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );


$('#daterangepick').click(function(){
    var date=$('#daterange').html();
    console.log(date);
    //alert();
      $.ajax({
  type: "post",
  url: "<?php echo base_url().'index.php/superadmin/date_filter_for_transaction'; ?>",
  data: {'date':date,},
  /*cache: false,*/
  success: function(data){
    console.log(data);
    $("#date_filtered_data").html(data);
   /**/
  }
});
});

function display_pdf(id)
{

  //var id=id;
      $.ajax({
  type: "post",
  url: "<?php echo base_url().'index.php/superadmin/pdf_transaction'; ?>",
  data: {'id':id,},
  /*cache: false,*/
  success: function(data){
    
    $('#data-content').html(data);
    $('#myModal').modal('show');
    //console.log(data);
  //  $("#date_filtered_data").html(data);
   /**/
  }
});
}

</script>
    </body>
</html>