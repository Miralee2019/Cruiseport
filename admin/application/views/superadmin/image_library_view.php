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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="<?php echo base_url(); ?>superassets/css/dashboard.css" rel="stylesheet" type="text/css">

    <!-- /global stylesheets -->
<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

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

        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>superassets/js/pages/dashboard.js"></script>
<style>
/** {
    box-sizing: border-box;
}

body {
    background-color: #f1f1f1;
    padding: 20px;
    font-family: Arial;
}*/
/*img{

}*/
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
    width: 25%;
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
    position: absolute;
   bottom: 75px;
    right: 40px;
    background-color: black;
    color: white;
    padding-left: 20px;
    padding-right: 20px;
}
.text-block1 {
    position: absolute;
   top: 35px;
    right: 35px;
    background-color: black;
    color: white;
    padding-left: 20px;
    padding-right: 20px;
}
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
                            <h4><span class="text-semibold">Image Library</span></h4>

                                <ul class="breadcrumb position-left">
                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome""><i class="icon-home2 position-left"></i> Home</a></li>
                            <li><a href="#"> Image Library</a></li>
                        </ul>
                    </div>
                        
                    <div class="heading-elements">
                    <div class="heading-btn-group">
                     
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
<div class="panel panel-flat">

                        <!-- <h6 class="panel-title"><b>Add Beacons</b></h6> -->


                        <div class="panel-body">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Assignbtn">Add Image</button>
                    
                  <div class="row">
                    <?php foreach($all_images as $image){ ?>
  <div class="column nature">
    <div class="content">
          <div class="text-block1">
   <a id="<?php echo $image->id; ?>" onclick="delete_image(<?php echo $image->id; ?>)" style="color: #fff;"><h5><i class="fa fa-trash" aria-hidden="true"></i>
</h5></a>
    <!-- <p>What a beautiful sunrise</p> -->
  </div>
      <img src="<?php echo base_url()."image_library/".$image->image_name; ?>" alt="Mountains" style="width:100%; height: 200px;">
      <div class="text-block">
    <h5><?php echo $image->name; ?></h5>
    <!-- <p>What a beautiful sunrise</p> -->
  </div>
    </div>
  </div>
<?php } ?>

</div>
<div class="row text-center">
<ul class="pagination pagination-lg">
  <?php
//print_r($total);
   $cnt=1; for($i=1;$i<=$total;$i++){ 
    if(!empty($this->input->get('page_index')))
     { 
$get=$this->input->get('page_index');
   } ?>
    <li <?php if($get==$cnt){ echo  'class="active"'; } ?> ><a href="<?php echo base_url().'index.php/superadmin/image_library?page_index='.$cnt; ?>"><?php echo $cnt++; ?></a></li>
 <?php } ?>
  </ul>
</div>

                        </div>
                    </div>
                    </div>        
                                        
                        
        
                    </div>
                    </div>
                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
       
<div class="modal fade" id="Assignbtn" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">IMAGE ADD</h4>
        </div>

        <div class="modal-body" id="Assignbtnbody">
          <form action="<?php echo base_url('index.php/superadmin/upload_images');  ?>" method="POST" enctype="multipart/form-data">
          <div class="col-md-4">
          <div class="form-group">
            <label class="control-label" style="font-size: 14px;font-weight: 700;">Select Category</label>
          <select class="form-control" name="category">
           <?php foreach($categorys as $cat){ ?>
            <option value="<?php echo $cat->category_id; ?>"><?php echo $cat->name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
            <label class="control-label" style="font-size: 14px;font-weight: 700;">Choose Image</label>
          <input type="file" name="files" class="form-control" required="" accept="image/*">
        </div>
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
      </div>
    </form>
    </div>

         <div class="modal-footer">
         
        </div>
      </div>
    </div>
</div>
        <!-- /page content -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js
"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>

function delete_image(id)
{
  image_id=id;
   if (confirm("do you want to delete?")) {
      $.ajax({
            url: "<?php echo base_url('index.php/superadmin/delete_image'); ?>",  
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

$("#unique_id").click(function(e){
$.ajax({
            url: "<?php echo base_url('index.php/superadmin/encode_id'); ?>",  
            type: 'POST',
            success:function(data){
         $('#third_party_beacon_name').val(data);
            },
            
        });
});

    </script>


    </body>

    <!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/datatable_styling.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 14:29:33 GMT -->
    </html>
