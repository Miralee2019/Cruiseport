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
<style type="text/css">
.twitter {
     color: #fff !important; 
}
html,body{
    overflow-x: hidden;
}
    .dataTables_length {
     float: left; 
    display: inline-block;
    margin: 0 0 20px 20px;
}
.dataTables_filter{
    float: right !important;
}
.checkbox-container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -moz-transition: all 0.5s;
  -webkit-transition: all 0.5s;
  transition: all 0.5s;
}
.checkbox-container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}
.checkbox-container input:checked ~ .checkmark {
  border: 1px solid #00abf0;
  background: #00abf0;
}
.checkbox-container input:checked ~ .checkmark:after {
  display: block;
}
.checkbox-container input[disabled] ~ .checkmark {
  background: #c8c8c8;
  border: none;
  cursor: not-allowed;
}
.checkbox-container .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 18px;
  width: 18px;
  border: 1px solid #00abf0;
  border-radius: 4px;
  background-color: #fff;
  -moz-transition: all 0.5s;
  -webkit-transition: all 0.5s;
  transition: all 0.5s;
}
.checkbox-container .checkmark:after {
  content: "";
  position: absolute;
  display: none;
  left: 6px;
  top: 3px;
  width: 4px;
  height: 8px;
  border: solid #fff;
  border-width: 0 1px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.checkbox-container:hover input ~ .checkmark {
  border-color: #00abf0;
}
td,th{
    text-align: center;
    font-size: 14px;
}
th{
        font-weight: 600;
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
                            <h4><span class="text-semibold">Beacons</span></h4>

                                <ul class="breadcrumb position-left">
                            <li><a href="<?php echo base_url(); ?>index.php/superadmin/superhome""><i class="icon-home2 position-left"></i> Home</a></li>
                            <li><a href="#"> Beacons</a></li>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-lg-4">
                            <div class="panel twitter">
                                <div class="panel-body">
                                    <div class="col-lg-4 col-xs-4">
                                        <i class="icon-user" style="font-size: 35px;"></i>    
                                    </div>
                                    <div class="col-lg-8 col-xs-8" style="margin-top: -10px;">
                                        <div class="col-md-12 col-xs-12" style="margin-top: -8px;">
                                            <h1 class="no-margin"> <b style="text-align: center;font-size: 30px;margin-left: 0px;"> <?php 
                                            $query=$this->db->get('T_Beacon');
                                            $result=$query->result();
                                            echo count($result);
                                             ?> </b> </h1>
                                        </div>
                                        <div class="col-md-12 col-xs-12" style="margin-top:-10px;">
                                            <span>TOTAL BEACONS</span>    
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div id="members-online"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel twitter">
                                <div class="panel-body">
                                    <div class="col-lg-4 col-xs-4">
                                        <i class="icon-user" style="font-size: 35px;"></i>    
                                    </div>
                                    <div class="col-lg-8 col-xs-8" style="margin-top: -10px;">
                                        <div class="col-md-12 col-xs-12" style="margin-top: -8px;">
                                            <h1 class="no-margin"> <b style="text-align: center;font-size: 30px;margin-left: 0px;"> <?php 
                                            $query=$this->db->where('assigned_to_store !=','0')->get('T_Beacon');
                                            $result=$query->result();
                                            echo count($result);
                                             ?>  </b> </h1>
                                        </div>
                                        <div class="col-md-12 col-xs-12" style="margin-top:-10px;">
                                            <span>ASSIGNED</span>    
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div id="members-online"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel twitter">
                                <div class="panel-body">
                                    <div class="col-lg-4 col-xs-4">
                                        <i class="icon-user" style="font-size: 35px;"></i>    
                                    </div>
                                    <div class="col-lg-8 col-xs-8" style="margin-top: -10px;">
                                        <div class="col-md-12 col-xs-12" style="margin-top: -8px;">
                                            <h1 class="no-margin"> <b style="text-align: center;font-size: 30px;margin-left: 0px;"> <?php 
                                            $query=$this->db->where('assigned_to_store','0')->get('T_Beacon');
                                            $result=$query->result();
                                            echo count($result);
                                             ?> </b> </h1>
                                        </div>
                                        <div class="col-md-12 col-xs-12" style="margin-top:-10px;">
                                            <span>UNASSIGNED</span>    
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div id="members-online"></div>
                                </div>
                            </div>
                        </div>
                       
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg"  type="button" data-toggle="modal" data-target="#addBeacon">Add</button>
                                      <button class="btn btn-info btn-lg"  type="button" data-toggle="modal" data-target="#Importbtn">Import</button>
                                    <!--   <button class="btn btn-info btn-md">Import</button> -->

             
                                        <button class="btn btn-success btn-lg" onclick="assign_beacon()">Assign</button>
                                          <button class="btn btn-danger btn-lg" onclick="unassign_beacon()">Unassign</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
<table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>No</th>
                <th>ID</th>
                <th>Store</th>
                <th>UUID</th>
                <th>major</th>
                <th>minor</th>
                <th>Status</th>
                 <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(!empty($beacons_list))
            {
                $cnt=1;
             foreach($beacons_list as $beacon){ ?>
            <tr>
                <td class="text-center">  <label class="checkbox-container">
        <input type="checkbox" value="<?php echo $beacon->beacon_id; ?>" name="beacon_id[]">
        <span class="checkmark"></span>
      </label></td>
                
                <td><?php echo $cnt++; ?></td>
                <td><?php echo $beacon->beacon_key; ?></td>
                <td><?php 
                $store_id=$beacon->assigned_to_store;
                if(!empty($store_id))
                {
                    $query=$this->db->where('store_id',$store_id)->get('T_Store');
                    $row=$query->row();
                    echo "$row->store_first_name";
                }else{
                echo "Not Assigned";
                }
                 ?></td>
                
                
                <td><?php echo $beacon->uuid; ?></td>
                <td><?php echo $beacon->major_value; ?></td>
                 <td><?php echo $beacon->minor_value; ?></td>
                 <td><?php if(!empty($beacon->assigned_to_store)){ echo "<i class='fa fa-circle' style='font-size:24px;color:green;'></i>"; }else{ echo "<i class='fa fa-circle' style='font-size:24px;color:red;'></i>"; } ?></td>
                  <td><a onclick="view_single_beacon(<?php echo $beacon->beacon_id; ?>)" class="text-default"><i class="icon-eye8"></i>
                                                                    </a> | <a onclick="delete_single_beacon(<?php echo $beacon->beacon_id; ?>)"><i class="fa fa-trash" style="color:#000" aria-hidden="true"></i>
</a></td>
            </tr>
        <?php } 
        }
         ?>
          
        </tbody>
    </table>
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
         <div class="modal fade" id="addBeacon" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">ADD BEACON</h4>
        </div>
        <div class="modal-body">
          
<div class="row">

                        <form class="form-horizontal" action="<?php echo site_url('superadmin/saveCashrubBeacons'); ?>" method="post">
                        <div class="col-md-12">

                        <div class="panel panel-flat">

                        <!-- <h6 class="panel-title"><b>Add Beacons</b></h6> -->


                        <div class="panel-body">

                             <div class="row">

                             

                                        <div class="col-md-6">

                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Enter Beacon Key
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>

                                            <br/>

                                            <input type="text" class="form-control" maxlength="20" onkeyup="checkname();" name="beacon_key" placeholder="Beacon Key (Example: yFch)" onkeypress="return alpha(event)" id="third_party_beacon_name" required>
                                            <span id="third_party_beacon_name_error" style="color: red"></span>
                                            <a id="unique_id">Suggest unique id</a>
                                        </div>


                                        <!-- <div class="col-md-6">

                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Enter Beacon Place
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>

                                            <br/>


                                            <input type="text" class="form-control" name="beacon_place" placeholder="Beacon Place" id="third_party_beacon_place">

                                            <span id="third_party_beacon_place_error" style="color: red">

                                        </div> -->

                                        <div class="col-md-6">

                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Enter Beacon UUID
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>
                                            <br/>
                                            <input type="text" class="form-control" onkeypress="return alpha(event)" name="beacon_uuid" placeholder="Beacon UUID (Example: fz45dkeZeie32)" id="third_party_beacon_uuid" required>


                                            <span id="third_party_beacon_uuid_error" style="color: red">

                                        </div>

                                    </div>

                                    <!-- <div class="row" style="margin-top: 3%;">

                                        

                                        
                                    </div> -->

                                    <div class="row" style="margin-top: 3%;">

                                        <div class="col-md-6">

                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Beacon Major
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>

                                            <input type="text" maxlength="8" class="form-control" name="beacon_major" onkeypress="return isNumber(event)" placeholder="Beacon Major (Enter numeric value Example:454)" id="third_party_beacon_major" required="">

                                           
                                            <span id="third_party_beacon_major_error" style="color: red">

                                        </div>
                                        
                                        <div class="col-md-6">

                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Beacon Minor
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>

                                            <br/>

                                             <input type="text" maxlength="8" class="form-control" name="beacon_minor" onkeypress="return isNumber(event)" placeholder="Beacon Minor (Enter numeric value Example: 342)" id="third_party_beacon_minor" required>


                                            <span id="third_party_beacon_minor_error" style="color: red">

                                        </div>


                                    </div>
                                    
                                    

                                    <div class="row" style="margin-top: 3%;">
                                        <div class="text-center">

                                            <button id="addCashrubBeacon" type="submit" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-checkmark3"></i></b> Add</button>

                                            <button data-dismiss="modal" type="reset" class="btn bg-blue btn-labeled heading-btnbtn-labeled-right ml-10"><b><i class="icon-cross"></i></b> Cancel</button>

                                        </div>
                                    </div>
                            
                        </div>
                            
                        </div>

                            
                        </div>

                                   

                                    
                        </form>
                    </div>        

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>

  </div>
  <div class="modal fade" id="Importbtn" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">IMPORT BEACON FILE</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div id="import-result"></div>
        <form enctype="multipart/form-data" id="import-file">
<div class="form-group">
    <div class="col-md-10">
            <input type="file" name="files" class="form-control" required="">
        </div></div>
        <div class="form-group">
 <div class="col-md-10 col-md-offset-1">
<button class="btn btn-info btn-lg" type="submit"  style="margin-top: 20px;">Import</button>
</div>
</div>
</form>    
</div>
</div>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="Assignbtn" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">BEACON DETAILS</h4>
        </div>

        <div class="modal-body" id="Assignbtnbody">
          
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

    
    $(document).ready(function() {
    $('#example').DataTable({
        "bStateSave": true,
        "fnStateSave": function (oSettings, oData) {
            localStorage.setItem('offersDataTables', JSON.stringify(oData));
        },
        "fnStateLoad": function (oSettings) {
            return JSON.parse(localStorage.getItem('offersDataTables'));
        }
    });
} );
     $('#import-file').on('submit', function(e){ 
        /*var fd = new FormData();*/
         e.preventDefault();
        //fd.append("CustomField", "This is some extra data");
        $.ajax({
            url: "<?php echo base_url('index.php/superadmin/import_beacon'); ?>",  
            type: 'POST',
           /*    cache: false,
             async: false,*/
            contentType: false,
            processData: false,
            data : new FormData($('#import-file')[0]),
           // data: $("#import-file").serialize(),

            success:function(data){
                $('#import-result').html(data);
                setTimeout(function(){ location.reload(); }, 2000);

            },
            
        });
    });
/*});*/

function assign_beacon()
{
    var beacon_id=[]
    $("input[type=checkbox]:checked").each(function(){
    beacon_id.push($(this).val());
});
   // console.log(beacon_id);

      $.ajax({
            url: "<?php echo base_url('index.php/superadmin/view_assign'); ?>",  
            type: 'POST',
           /*    cache: false,
             async: false,
            contentType: false,
            processData: false,*/
            data : {beacon_id:beacon_id},
           // data: $("#import-file").serialize(),

            success:function(data){
                $('#Assignbtnbody').html(data);
               $('#Assignbtn').modal('show');
              //  setTimeout(function(){ location.reload(); }, 2000);
//console.log(data);
            },
            
        });
}
function unassign_beacon()
{
    var beacon_id=[]
    $("input[type=checkbox]:checked").each(function(){
    beacon_id.push($(this).val());
});
   // console.log(beacon_id);

      $.ajax({
            url: "<?php echo base_url('index.php/superadmin/view_unassign'); ?>",  
            type: 'POST',
           /*    cache: false,
             async: false,
            contentType: false,
            processData: false,*/
            data : {beacon_id:beacon_id},
           // data: $("#import-file").serialize(),

            success:function(data){
                $('#Assignbtnbody').html(data);
               $('#Assignbtn').modal('show');
              //  setTimeout(function(){ location.reload(); }, 2000);
//console.log(data);
            },
            
        });
}
function view_single_beacon(id)
{
  beacon_id=id;

      $.ajax({
            url: "<?php echo base_url('index.php/superadmin/view_single_beacon'); ?>",  
            type: 'POST',
           /*    cache: false,
             async: false,
            contentType: false,
            processData: false,*/
            data : {beacon_id:beacon_id},
           // data: $("#import-file").serialize(),

            success:function(data){
                $('#Assignbtnbody').html(data);
               $('#Assignbtn').modal('show');
              //  setTimeout(function(){ location.reload(); }, 2000);
//console.log(data);
            },
            
        });
}
function delete_single_beacon(id)
{
  beacon_id=id;
   if (confirm("do you want to delete?")) {
      $.ajax({
            url: "<?php echo base_url('index.php/superadmin/delete_single_beacon'); ?>",  
            type: 'POST',
           /*    cache: false,
             async: false,
            contentType: false,
            processData: false,*/
            data : {beacon_id:beacon_id},
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
