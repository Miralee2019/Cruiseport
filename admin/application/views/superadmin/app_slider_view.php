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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
        <style>
/*   .ctn-inputs {
  border-bottom: 1px solid #cccccc;
  padding: 20px 0;
}*/

.style-radio, 
.style-checkbox {
  display: none;
}

.radio label,
.checkbox label {
  border-radius: 3px;
  color: #00BCD4;
  cursor: pointer;
  display: inline-block;
  font-size: 1em;
  padding: 5px 15px 5px 51px;
  position: relative;
  transition: all 0.3s ease;
}

.radio label:hover,
.checkbox label:hover {
  background-color: rgba(118, 126, 136, 0.2);
}

.radio label:before,
.checkbox label:before {
  background-color: none;
  border-radius: 50%;
  border: 3px solid #00BCD4;
  content: '';
  display: inline-block;
  height: 17px;
  left: 17px;
  position: absolute;
  top: 4px;
  width: 17px;
}

.checkbox label:before {
  border-radius: 3px;
}

.style-radio:checked + label,
.style-checkbox:checked + label {
  background-color: #00BCD4;
  border-radius: 2px;
  color: #ffffff;
  padding: 5px 15px;
}

.style-radio:checked + label:before,
.style-checkbox:checked + label:before {
  display: none;
}
input[type="file"] {
right: 0 !important;
  }
  label{
    font-size: 15px;
    font-weight: 700;
    font-family: "Raleway", sans-serif !important;
  }
.billing-credit-remaing {
    background: #fff;
    padding: 2% 1%;
    /* font-size: 18px; */
    color: #000;
    /* height: 200px; */
}
body,html{
  overflow-x: hidden;
}
/* Center website */
.main {
    max-width: 1000px;
    margin: auto;
}

h1 {
    font-size: 50px;
    word-break: break-all;
}

.row {
    margin: 10px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
    padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 33%;
    position: relative;
   /* display: none;  Hide all elements by default */
}

/* Clear floats after rows */ 
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Content */
/*.content {
    background-color: white;
    padding: 10px;
}
*/
/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

.text-block {
   background-color: #fff;
    padding-left: 20px;
    padding-right: 20px;
}
.text-block1 {
    position: absolute;
   top: 35px;
    right: 35px;
    background-color: black;
    color: white;
    padding-left: 10px;
    padding-right: 10px;
}
.badge, .btn-xs .badge {
    padding: 0 12px;
    font-size: 12px;
    border-radius: 4px;
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
                                <h4> <a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">App Slider</span></h4>
                                <ul class="breadcrumb position-right">
                                    <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome"><i class="icon-home2 position-left"></i> Home</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/superadmin/app_slider">App Slider</a></li>
                                   
                                </ul>
                            </div>
                            <!-- =========================Yashraj code ===================-->
                            <div style="text-align:center;" id="hidemenow-1">
                                <?php
                                if ($this->session->flashdata('add_cashrub_banner')) {
                                    echo $this->session->flashdata('add_cashrub_banner');
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
                         <div class="col-md-12" >
                    <div class="col-md-12" >
                        <div class="row  billing-credit-remaing">
                            <div class="col-md-12" style="    padding: 3%;">
                                <div class="col-md-6">
                                   <div class="billing-title"> Your Transaction Details</div>
                                </div>
                                  <div class="col-md-6">
                                    <!-- <div class="billing-credits  pull-right">   0.00</div> -->
                                      <button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal">Add Slider</button>
                                  </div>
                                <!--    <div class="col-md-3">
                                     <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span id="daterange"></span> <i class="fa fa-caret-down"></i>
</div></div> -->

<!-- <div class="col-md-2"><button class="btn btn-primary" id="daterangepick">GO</button></div> -->
 <div class="row">
                    <?php foreach($all_images as $image){ ?>
  <div class="column nature">
    <div class="content">
          <div class="text-block1">
   <a id="<?php echo $image->id; ?>" onclick="delete_image(<?php echo $image->id; ?>)" style="color: #fff;"><h5><i class="fa fa-trash" aria-hidden="true"></i>
</h5></a>
    <!-- <p>What a beautiful sunrise</p> -->
  </div>
      <img src="<?php echo base_url()."slides/".$image->slider_image; ?>" alt="Mountains" style="width:100%; height: 200px;">
      <div class="text-block">
    <h5><?php echo $image->name_of_slider; ?></h5>
     <h6 style="font-size: 12px;"><?php 
     if(!empty($image->store_id)){
$query=$this->db->where('store_id',$image->store_id)->get('T_Store');
      $result=$query->row();
    echo $result->store_first_name;
    }
      ?>  <?php if(!empty($image->type)){ ?><span class="badge badge-success"><?php echo ucfirst($image->type); ?></span>
      <?php } ?>&nbsp;</a></h6>
    <!-- <p>What a beautiful sunrise</p> -->
    <h6 style="font-size: 12px;">
    <?php 
 if(!empty($image->offer_id)){
$query=$this->db->where('store_offer_id',$image->offer_id)->get('T_StoreOffer');
      $result=$query->row();
    echo "  Offer Name:&nbsp;&nbsp;".$result->title;
    }
      ?>
    </h6>
  </div>
    </div>
  </div>
<?php } ?>

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
          <h4 class="modal-title text-center">Slide Details</h4>

        </div>
        <div class="modal-body">
          <hr>
       <div class="col-sm-12" id="data-content">
         <form action="<?php echo base_url('index.php/superadmin/save_slide/') ?>" method="post" enctype="multipart/form-data" >
           <div class="form-group">
            <label class="contol-label">Name of Slide</label>
            <input type="text" name="name_of_slider" class="form-control" required="">
             </div>
             <div class="form-group">
<label>Type of Slide</label>
<div class="ctn-inputs radio">
      <input type="radio" class="style-radio" name="type" value="store" id="store">
      <label for="store">
        Store
      </label>


      <input type="radio" class="style-radio" name="type" value="offer" id="offer">
      <label for="offer">
        Offer
      </label>          

      <input type="radio" class="style-radio" name="type" value="promotion" id="promotion" checked="">
      <label for="promotion">
        Promotion
      </label>
    </div>
             </div>
             <div id="store_data"></div>
              <div id="offer_data"></div>
             <div class="form-group">
<label>Image for Slide</label>
<input type="file" name="files" class="form-control" required="">
             </div>
             <div class="form-group text-center">
<button class="btn btn-primary btn-lg">Submit</button>
             </div>
         </form>
       </div>
        </div>
        <div class="modal-footer">
         <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        
        </div>
      </div>
      
    </div>
  </div>
  
        <script type="text/javascript">
        

$(document).ready(function() {
     var table = $('#example').DataTable({
        lengthChange: false,
        buttons: [ 'copy', 'excel','csv', 'pdf', 'colvis' ]
    });
     table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );


$('#store').click(function(){
   $("#store_data").html('');
     $("#offer_data").html('');
      $.ajax({
  type: "post",
  url: "<?php echo base_url().'index.php/superadmin/store_list'; ?>",
  success: function(data){
    $("#store_data").html(data);
  
  }
});
});
$('#offer').click(function(){
     $("#store_data").html('');
     $("#offer_data").html('');
    //var date=$('#daterange').html();
   // console.log(date);
    //alert();
      $.ajax({
  type: "post",
  url: "<?php echo base_url().'index.php/superadmin/store_list'; ?>",
  /*cache: false,*/
  data: {'offer':"offer",},
  success: function(data){
   // console.log(data);
    $("#store_data").html(data);
   /**/
  }
});
});

$("#promotion").click(function(){
 /// alert("");
     $("#store_data").html('');
     $("#offer_data").html('');
});


function delete_image(id)
{
  image_id=id;
   if (confirm("do you want to delete?")) {
      $.ajax({
            url: "<?php echo base_url('index.php/superadmin/delete_slide'); ?>",  
            type: 'POST',
           /*    cache: false,
             async: false,
            contentType: false,
            processData: false,*/
            data : {image_id:image_id},
           // data: $("#import-file").serialize(),

            success:function(data){
             /*   $('#Assignbtnbody').html(data);
               $('#Assignbtn').modal('show');*/
               if(data==1)
               {
              /* $(this).parent().parent().remove();*/
              location.reload();
             }
              //  setTimeout(function(){ location.reload(); }, 2000);
//console.log(data);
            },
            
        });
    }
}
</script>
    </body>
</html>