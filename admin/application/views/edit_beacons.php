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
	<link href="<?php echo base_url(); ?>assets/css/custom1.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>		
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_inputs.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>
	<!-- /theme JS files -->

<style>

.form-group {
    margin-bottom: 40px;
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
						<div class="page-header">
							<div class="page-header-content">
								<div class="page-title">
									<h4> <a href="<?php echo base_url(); ?>index.php/control/viewBeacon"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">Edit Beacon</span></h4>

									<!-- <div class="heading-elements">
										<div class="heading-btn-group">
											<a href="view_beacons.html" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-eye8"></i></b> View Beacons </a>

										</div>
									</div> -->	

									<ul class="breadcrumb position-right">
										<li><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-home2 position-left"></i> Home</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/control/viewBeacon">Beacons</a></li>
										<li class=active>Edit Beacons</li>
									</ul>
								</div>
							</div>

						</div>
						<!-- /page header -->


						<!-- Content area -->
						<div class="content">

						<div id="hidemenow">
						        <?php
                                    if ($this->session->flashdata()) {
                                       echo $this->session->flashdata('edit_beacon');
                                    }
                                ?>
						</div>

							<!-- User profile -->
							<div class="row">
								<div class="col-md-12">
									<!-- Profile info -->
									<div class="panel panel-flat" style='padding-top: 30px; padding-bottom: 30px'>
										<div class="panel-heading" style="padding-bottom: 40px;">
											<h6 class="panel-title text-center" style='margin-top: -25px;' ><i class="icon-feed"></i> <b>Edit Beacon</b></h6>
											<div class="heading-elements">
												<ul class="icons-list">
													<!-- 	<li><a data-action="collapse"></a></li> -->
												<!-- <li><a data-action="reload"></a></li>
												<li><a data-action="close"></a></li> -->
											</ul>
										</div>
									</div>

									<div class="panel-body">
										<form action="<?php echo base_url(); ?>index.php/control/editBeacon/<?php echo $edit_beacon[0]->beacon_id; ?>" method="post">
											<div class="form-group">
												<div class="row">
													<div class="form-group">
													<div class="col-md-2">
														<label class="control-label" style="font-size: 14px;"> Beacon Id</label></div>
														<div class="col-md-10" >

														<input type="text" class="form-control" placeholder="Beacon Id" value="<?php echo $edit_beacon[0]->beacon_key; ?>" disabled="true">

														<input type="hidden" name="beacon_key" value="<?php echo $edit_beacon[0]->beacon_key; ?>">
														
														<input type="hidden" name="beacon_type" value="<?php echo $edit_beacon[0]->beacon_type; ?>">


														<span id="beaconediterror" style="color: red"></span>

														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
											<div class="row">
													<div class="form-group">
													<div class="col-md-2">
														<label class="control-label" style="font-size: 14px;"> Name</label></div>
														<div class="col-md-10" >

														<input type="text" id="beacon_name" class="form-control" name="beacon_name" placeholder="Beacon Name" maxlength="20" value="<?php echo $edit_beacon[0]->beacon_name; ?>">

														<span id="beaconnameediterror" style="color: red"></span>

														</div>
													</div>
												</div>
											</div>


											<div class="form-group">
											<div class="row">
													<div class="form-group">
													<div class="col-md-2">
														<label class="control-label" style="font-size: 14px;"> Place</label></div>
														<div class="col-md-10" >

														<input type="text" id="beacon_place" class="form-control" name="beacon_place" placeholder="Beacon Place" maxlength="30" value="<?php echo $edit_beacon[0]->beacon_place; ?>">

														<span id="beaconplaceediterror" style="color: red"></span>

														</div>
													</div>
												</div>
											</div>

											<?php if($edit_beacon[0]->beacon_type != "cashrub_beacon" ){ ?>

											<div class="form-group">
												<div class="row">
													<div class="form-group">
														<div class="col-md-2">
														<label class="control-label" style="font-size: 14px;"> UUID</label>
														</div>
														<div class="col-md-10" >
														<input type="text" class="form-control" id="beacon_uuid" name="beacon_uuid" placeholder="UUID" maxlength="50" value="<?php echo $edit_beacon[0]->beacon_uuid; ?>" readonly>

														<span id="beaconuuidediterror" style="color: red"></span>

														</div>

													</div>
												</div>
											</div>


											<div class="form-group">
												<div class="row">
													<div class="form-group">
													<div class="col-md-2">
														<label class="control-label" style="font-size: 14px;">  Major </label>
														</div>
                                                         <div class="col-md-10" >
															<input type="text" class="form-control" id="beacon_major" name="beacon_major" onkeypress="return isNumber(event)" placeholder="Major" maxlength="10" value="<?php echo $edit_beacon[0]->beacon_major; ?>" readonly>

															<span id="beaconmajorediterror" style="color: red"></span>

														</div>

													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<div class="form-group">
													<div class="col-md-2">
													<label class="control-label" style="font-size: 14px;"> Minor</label>
													</div>
													 <div class="col-md-10">
														<input type="text" class="form-control" id="beacon_minor" name="beacon_minor" onkeypress="return isNumber(event)" placeholder="Minor" maxlength="10" value="<?php echo $edit_beacon[0]->beacon_minor; ?>" readonly>

														<span id="beaconminorediterror" style="color: red"></span>
														</div>

													</div>
												</div>
											</div>

											<?php } ?>
											

											<div class="col-md-12">
                                            
	                                            <div class="checkbox">
	                                            <label>

	                                            	<?php if($edit_beacon[0]->is_entrance_beacon == "1") { ?>


	                                            		<input align="center" type="checkbox" name="is_entrance_update" checked="checked" value="0">Check if you want to update this with entrance beacon</label>

	                                            	<?php } else { ?>

	                                            		<input align="center" type="checkbox" name="is_entrance_update" value="1">Check if you want to update this with entrance beacon</label>

	                                            	<?php } ?>


	                                            </div>

	                                        </div>

											<div class="text-center" style="margin-top:10%;">	

											<?php if($edit_beacon[0]->beacon_type == "cashrub_beacon" ){ ?>

											<button type="submit" id="editCashrubBeacon" class="btn bg-blue btn-labeled heading-btn btn-labeled-left ml-10"><b><i class="icon-plus3"></i></b> Update </button>


											<?php } else { ?>

											<button type="submit" id="editThirdBeacon" class="btn bg-blue btn-labeled heading-btn btn-labeled-left ml-10"><b><i class="icon-plus3"></i></b> Update </button>

											<?php } ?>



												

												<!-- <button type="reset" class="btn bg-blue btn-labeled heading-btnbtn-labeled-right ml-10"><b><i class="icon-cross"></i></b> Cancel</button> -->

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
	<script>
	$("#sample_3").DataTable({

	                            "paging": true, 
	                            "lengthChange": true,
	                            "pageLength": 5,
	                            "searching": true,
	                            "ordering":false,
	                            "info": false,
	                            "autoWidth": true

	                          } ); 

	     $("#sample_3").on('click','#delete-sub',function(){

	     	if (confirm("Are you sure to delete this Beacon ?") == false) {
									return;
								}
	          alert("Beacon Deleted");
	           $(this).closest('tr').remove();
	         });


		$(document).on("click", "#delete-sub", function () {

			var Id = $(this).data('id');
			
			$.post("<?php echo base_url(); ?>index.php/control/deleteBeacon/"+Id, function(data, status){
	        });

		});

	</script>

	<!-- <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script> -->

		<script type="text/javascript">
		
		

			$("#editCashrubBeacon").click(function(){

				var beacon_name = $("#beacon_name").val();
				var beacon_place = $("#beacon_place").val();
				
				
				if(beacon_name == ''){
				    document.getElementById("beaconnameediterror").innerHTML ='Beacon name field is required.';
				    return false ;
				}else{
				    document.getElementById("beaconnameediterror").innerHTML = '';
				}

				if(beacon_place == ''){
				    document.getElementById("beaconplaceediterror").innerHTML ='Beacon place field is required.';
				    return false ;
				}else{
				    document.getElementById("beaconplaceediterror").innerHTML = '';
				}

			});

			$("#editThirdBeacon").click(function(){
				
				var beacon_name = $("#beacon_name").val();
				var beacon_place = $("#beacon_place").val();
				var beacon_uuid = $("#beacon_uuid").val();
				var beacon_major = $("#beacon_major").val();
				var beacon_minor = $("#beacon_minor").val();
				
				if(beacon_name == ''){
				    document.getElementById("beaconnameediterror").innerHTML ='Beacon name field is required.';
				    return false ;
				}else{
				    document.getElementById("beaconnameediterror").innerHTML = '';
				}

				if(beacon_place == ''){
				    document.getElementById("beaconplaceediterror").innerHTML ='Beacon place field is required.';
				    return false ;
				}else{
				    document.getElementById("beaconplaceediterror").innerHTML = '';
				}

				if(beacon_uuid == ''){
				    document.getElementById("beaconuuidediterror").innerHTML ='Beacon uuid field is required.';
				    return false ;
				}else{
				    document.getElementById("beaconuuidediterror").innerHTML = '';
				}

				if(beacon_major == ''){
				    document.getElementById("beaconmajorediterror").innerHTML ='Beacon major field is required.';
				    return false ;
				}else{
				    document.getElementById("beaconmajorediterror").innerHTML = '';
				}

				if(beacon_minor == ''){
				    document.getElementById("beaconminorediterror").innerHTML ='Beacon minor field is required.';
				    return false ;
				}else{
				    document.getElementById("beaconminorediterror").innerHTML = '';
				}

			});

			function isNumber(evt) {
	            evt = (evt) ? evt : window.event;
	            var charCode = (evt.which) ? evt.which : evt.keyCode;
	            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	            return false;
	            }
	            return true;
            }

		
	</script>




	</body>
	</html>