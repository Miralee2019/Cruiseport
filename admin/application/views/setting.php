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
	<link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/custom1.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/dashboard1.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/fevicon.png"/>		
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
	<!--=========== badrddin =============== -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<!--=========== badruddin ========= -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_inputs.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/ripple.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/hideShowPassword.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/echarts/echarts.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/user_pages_profile.js"></script>
	      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
	<!-- /theme JS files -->
	<style type="text/css">
	.hideShowPassword-toggle {
		background-color: transparent;
		background-image: url(<?php echo base_url(); ?>assets/images/wink.png);
		background-image: url(<?php echo base_url(); ?>assets/images/wink.svg), none;
		background-position: 0 center;
		background-repeat: no-repeat;
		border: 2px solid transparent;
		border-radius: 0.25em;
		cursor: pointer;
		font-size: 100%;
		height: 44px;
		margin: 0;
		max-height: 100%;
		padding: 0;
		overflow: 'hidden';
		text-indent: -999em;
		width: 46px;
		-moz-appearance: none;
		-webkit-appearance: none;
	}

	.hideShowPassword-toggle, .my-toggle {
		z-index: 3;
	}

	.table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th {
		padding: 4px 10px!important;		
	}

	#add {
		display: inline-block;
		margin-left: 30px;
		/*position: absolute;*/
		margin-top: 8px;
		padding-right: 5px;
	}   

	#changedate1,#changedate2 {
		border-radius: 3px!important;		
	}

	.daterangepicker_input{
		display: none;
	}

	.calendar > .right{
		border-left-style: none;
	}

	.calendar > .left{
		border-right-style: none;
	}

	@media (min-width: 320px) and (max-width: 767px){  
		#add {
			position: relative;
			margin-bottom: 10px;
		}   
	} 

	@media (min-width: 980px){  
		.daterangepicker{
			left: 415px !important;
		}
		.calendar{
			margin: 0px !important;
		}
	} 
	.dataTables_filter input {
		margin-left: 10px;
	}
	.img-logo {
		margin: -75px 0px 0px 250px; 
		border-radius: 25%;
		height: 100px;
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
			<!-- Main sidebar -->
			<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header">
					<!-- Header content -->
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">Account Settings</span></h4>
							<ul class="breadcrumb position-right">
								<li><a href="<?php echo base_url(); ?>index.php/control/home">Home</a></li>
								<li class='active'>Account Settings</li>
							</ul>
							<div class="heading-elements">
								<div class="heading-btn-group">
									<!-- <h4><b> Current Balance:1000 Points </b></h4> -->
								</div>
							</div>
							<div style="text-align:center;display:none;" id="hidemenow">
								<?php if ($this->session->flashdata()) { ?>
								<p style="color: red;"><?php echo $this->session->flashdata('not_send'); ?><p>
									<?php } ?>
								</div>
								<div style="text-align:center;display:none;" id="hidemenow">
									<?php if ($this->session->flashdata()) { ?>
									<p style="color: green;"> <?php echo $this->session->flashdata('success'); ?> </p>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<div class="content">
						<div class="row">
							<div class="col-lg-12">
								<div>
									<div>	
										<div id="hidemenow">
											<?php
											if ($this->session->flashdata()) {
												echo $this->session->flashdata('setting');
											}
											?>
										</div>
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h6 class="panel-title"><b>Add Walkin Points</b></h6>
											</div>
											<div class="panel-body">
												<form action="<?php echo base_url(); ?>index.php/control/addWalkingPoint" method="post" id="offer-add">
													<div class="form-group">
														<div class="row">
															<div class="col-md-12">
																<label>Add Walkin Points</label>
																<red style="color: red;font-size: 20px;">*</red>
																<!-- <input type="text" minlength="1" maxlength="3" value="<?php echo $walk_p[0]->walking_point; ?>" name="walk"  class="form-control"> --><input type="text" id="payment_point" onkeypress="return isNumberKey(event)"  class="form-control" maxlength="3" name="walk" value="<?php echo $walk_p[0]->walking_point; ?>">
																<h7 style="color: red;float: left;" id ="point_error"></h7>
															</div>
														</div>
													</div>
													<div class="text-right">
														<button type="submit" id="savepayment" class="btn btn-primary" style="padding: 8px 20px;font-weight: bold;font-size: 14px; margin-top: 25px; border-radius: 4px !important;">Save <i class="icon-arrow-right14 position-right"></i></button>
													</div>
												</form>
											</div>
										</div>
										<!-- Profile info -->
										<div class="panel panel-flat" style="overflow-x:auto;">
											<div class="panel-heading">
												<h6 class="panel-title"><b>Payment Details</b></h6>
												<div class="heading-elements">
													<div class="heading-btn-group">
														<a href="<?php echo base_url(); ?>index.php/control/addPoints" class="btn bg-blue btn-labeled heading-btn" style='font-size: 14px;
														border-radius: 4px !important;'><b><i class=" icon-cash"></i></b> Request Points </a> 
														<button class="btn bg-blue btn-labeled heading-btn" style="padding: 10px 30px;
														font-size: 14px; border-radius: 4px !important;" onclick="exporttocsv()">
													Export</button>
													<ul class="icons-list">
														<!-- <li><a data-action="collapse"></a></li>  -->
														<li><a id="shows" data-action="reload"></a></li>
														<!-- <li><a id="show" data-action="reload"></a></li> -->
														<!-- 	<li><a data-action="close"></a></li> -->	
													</ul>
												</div>
											</div>
										</div>
										<script type="text/javascript">
											function exporttocsv() {
                                                    // $('#sample_3 tr').find('th:last-child, td:last-child').remove();
                                                    $("#sample_3").tableToCSV({
                                                    	filename: 'Payment_detail_list'
                                                    });
                                                    // $('#sample_3 tr').find('th:last-child, td:last-child').add();
                                                    // location.reload();
                                                }
                                            </script>	
                                            <div style="padding-left: 20px;padding-bottom: 20px;">
                                                <!--  <?php
                                                $amount = 0;
                                                foreach ($payment as $key) {
                                                    $store = $CI->adminmodel->select_data('T_Store', array('store_id' => $key->store_id));
                                                    $amount = $amount + $key->credits;
                                                }
                                                ?> -->
                                                <b style="font-size:20px;">Total Credits : <?php
                                                if ($dash[0]->store_point > 0) {
                                                	echo $dash[0]->store_point;
                                                } else {
                                                	echo "0";
                                                }
                                                ?>  &nbsp;</b>
                                            </div>
                                            <div class="panel-body" style="padding: 0px;">
                                            	<table class="table table-hover "
                                            	id="sample_3">
                                            	<thead>
                                            		<tr>
                                            			<th><b>Payment Id</b></th>
                                                        <!-- <th><b>Payment Date</b></th>
                                                        -->
                                                        <th><b>Created Date</b></th>
                                                        <!-- <th><b>Store Name</b></th> -->
                                                        <!-- <th><b>Store Email</b></th> -->
                                                        <!-- <th><b>Bill Description</b></th> -->
                                                        <th><b>Points</b></th>
                                                        <!-- <th><b>Credits</b></th> -->
                                                        <th><b>Action</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	<?php
                                                	foreach ($payment as $key) {
                                                		$store = $CI->adminmodel->select_data('T_Store', array('store_id' => $this->session->userdata('store_id')));
                                                		?>
                                                		<tr>
                                                			<td><?php echo wordwrap($key->payment_id, 10, "<br>\n", TRUE) ? : ''; ?></td>
                                                			<td><?php echo $key->payment_date ." ". $key->payment_time; ?></td>
                                                			<td><?php echo wordwrap($key->points, 15, "<br>\n", TRUE) ? : ''; ?></td>
                                                			<td>
                                                				<ul class="icons-list">
                                                					<li class="dropdown">
                                                						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                							<i class="icon-menu9"></i>
                                                						</a>
                                                						<ul class = "dropdown-menu left" role = "menu">
                                                							<!-- <li><a href = "<?php echo base_url(); ?>index.php/control/editBeacon/<?php echo $key->beacon_id; ?>" > <i class="icon-pencil"></i>  Edit</a></li> -->
                                                							<li><a data-toggle="modal" data-target="#paymentDeleteModel" id="delete_payment" data-id="<?php echo $key->payment_id; ?>"><i class="icon-bin"></i> Delete </a></li>
                                                							<li><a data-toggle="modal" data-target="#invoice_individual" id="invoice_payment" data-id="<?php echo $key->payment_id; ?>"><i class="icon-file"></i> Invoice </a></li>
                                                						</ul>
                                                					</li>
                                                				</ul>
                                                			</td>
                                                		</tr>
                                                		<?php } ?>
                                                	</tbody>
                                                </table>
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
                <!-- /page content -->
            </div>
            <!-- /////////////////print invoice /////// -->
            <div id="invoice_print" class="modal fade">
            	<div class="modal-dialog modal-full">
            		<div class="modal-content">
            			<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            				<h5 class="modal-title">Invoice #55555555555</h5>
            			</div>
            			<div class="panel-body no-padding-bottom">
            				<div class="row">
            					<div class="col-md-6 content-group">
            						<h4 class='logo hidden-xs' style="color:black;"> Cash Rub </h4></a>
            						<ul class="list-condensed list-unstyled">
            							<li>2269 Elba Lane</li>
            							<li>Paris, France</li>
            							<li>888-555-2311</li>
            						</ul>
            					</div>
            					<div class="col-md-6 content-group">
            						<div class="invoice-details">
            							<h5 class="text-uppercase text-semibold">Invoice #49029</h5>
            							<ul class="list-condensed list-unstyled">
            								<li>Date: <span class="text-semibold">January 12, 2015</span></li>
            								<li>Due date: <span class="text-semibold">May 12, 2015</span></li>
            							</ul>
            						</div>
            					</div>
            				</div>

            				<div class="row">
            					<div class="col-md-6 col-lg-9 content-group">
            						<span class="text-muted">Invoice To:</span>
            						<ul class="list-condensed list-unstyled">
            							<li><h5>Rebecca Manes</h5></li>
            							<li><span class="text-semibold">Normand axis LTD</span></li>
            							<li>3 Goodman Street</li>
            							<li>London E1 8BF</li>
            							<li>United Kingdom</li>
            							<li>888-555-2311</li>
            							<li><a href="#">rebecca@normandaxis.ltd</a></li>
            						</ul>
            					</div>
            					<div class="col-md-6 col-lg-3 content-group">
            						<span class="text-muted">Payment Details:</span>
            						<ul class="list-condensed list-unstyled invoice-payment-details">
            							<li><h5>Total Due: <span class="text-right text-semibold">$8,750</span></h5></li>
            							<li>Bank name: <span class="text-semibold">Profit Bank Europe</span></li>
            							<li>Country: <span>United Kingdom</span></li>
            							<li>City: <span>London E1 8BF</span></li>
            							<li>Address: <span>3 Goodman Street</span></li>
            							<li>IBAN: <span class="text-semibold">KFH37784028476740</span></li>
            							<li>SWIFT code: <span class="text-semibold">BPT4E</span></li>
            						</ul>
            					</div>
            				</div>
            			</div>

            			<div class="table-responsive">
            				<table class="table table-lg">
            					<thead>
            						<tr>
            							<th class="col-sm-2">Payment Id</th>
            							<th class="col-sm-2">Store Name</th>
            							<th class="col-sm-2">Store Email</th>
            							<th class="col-sm-2">Bill Description</th>
            							<th class="col-sm-2">Payment Date</th>
            							<th class="col-sm-2">Amount</th>
            						</tr>
            					</thead>
            					<tbody>
            						<?php
            						foreach ($payment as $key) {
            							$store = $CI->adminmodel->select_data('T_Store', array('store_id' => $key->store_id));
            							?>
            							<tr>
            								<td><?php echo wordwrap($key->payment_id, 10, "<br>\n", TRUE) ? : ''; ?></td>
            								<td><?php echo $store[0]->store_first_name ? : ''; ?></td>
            								<td><?php echo $store[0]->store_email ? : ''; ?></td>
            								<td><?php echo wordwrap($key->payment_name, 20, "<br>\n", TRUE) ? : ''; ?></td>
            								<td><?php echo wordwrap(($key->payment_date), 15, "<br>\n", TRUE) ? : ''; ?>  <?php echo wordwrap(($key->payment_time), 15, "<br>\n", TRUE) ? : ''; ?></td>
            								<td>$500<?php //echo wordwrap(($key->created_date) ,20,"<br>\n",TRUE) ? : '';    ?></td> 
            								<?php } ?>
            							</tbody>
            						</table>
            					</div>
            					<div class="panel-body">
            						<div class="row invoice-payment">
            							<div class="col-sm-7">
            								<div class="content-group">
            									<h6>Authorized person</h6>
            									<div class="mb-15 mt-15">
            										<img src="<?php echo base_url(); ?>assets/images/signature.png" class="display-block" style="width: 150px;" alt="">
            									</div>

            									<ul class="list-condensed list-unstyled text-muted">
            										<li>Eugene Kopyov</li>
            										<li>2269 Elba Lane</li>
            										<li>Paris, France</li>
            										<li>888-555-2311</li>
            									</ul>
            								</div>
            							</div>
            							<div class="col-sm-5">
            								<div class="content-group">
            									<h6>Total due</h6>
            									<div class="table-responsive no-border">
            										<table class="table">
            											<tbody>
            												<tr>
            													<th>Subtotal:</th>
            													<td class="text-right">$7,000</td>
            												</tr>
            												<tr>
            													<th>Tax: <span class="text-regular">(25%)</span></th>
            													<td class="text-right">$1,750</td>
            												</tr>
            												<tr>
            													<th>Total:</th>
            													<td class="text-right text-primary"><h5 class="text-semibold">$8,750</h5></td>
            												</tr>
            											</tbody>
            										</table>
            									</div>
            								</div>
            							</div>
            						</div>
            						<h6>Other information</h6>
            						<p class="text-muted">Thank you for using Limitless. This invoice can be paid via PayPal, Bank transfer, Skrill or Payoneer. Payment is due within 30 days from the date of delivery. Late payment is possible, but with with a fee of 10% per month. Company registered in England and Wales #6893003, registered office: 3 Goodman Street, London E1 8BF, United Kingdom. Phone number: 888-555-2311</p>
            					</div>
            				</div>
            			</div>
            		</div>
            		<!-- ///////////////////print invoice end////////// -->

            		<!-- Invoice for all records -->
            		<form method="POST" action="<?php echo base_url('index.php/control/save_invoice'); ?>">
            			<div id="invoice" class="modal fade">
            				<div class="modal-dialog modal-full">
            					<div class="modal-content">
            						<div class="modal-header">
            							<button type="button" class="close" data-dismiss="modal">&times;</button>
            							<h5 class="modal-title">Invoice <input type="hidden" name="invoice_id" value="<?php echo $id; ?>"></h5>
            							<!-- <h5 class="modal-title">Invoice #<?php echo $id = random_string('alnum', 6); ?><input type="hidden" name="invoice_id" value="<?php echo $id; ?>"></h5> -->
            						</div>
            						<div class="panel-body no-padding-bottom">
            							<div class="row">
            								<div class="col-md-6 content-group">
            									<h4 class='logo hidden-xs' style="color:black;"> Cash Rub </h4></a>

                                        <!-- <ul class="list-condensed list-unstyled">
                                                <li>2269 Elba Lane</li>
                                                <li>Paris, France</li>
                                                <li>888-555-2311</li>
                                            </ul> -->
                                        </div>

                                        <div class="col-md-6 content-group">
                                        	<div class="invoice-details">
                                        		<h5 class="text-uppercase text-semibold">Invoice <!-- #< ?php echo $id; ?> --></h5>
                                        		<ul class="list-condensed list-unstyled">
                                        			<li>Date: <span class="text-semibold"><?= date('M d, Y') ?></span></li>
                                        			<!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
                                        		</ul>
                                        	</div>
                                        </div>
                                    </div>
                                <!-- <div class="row">
                                        <div class="col-md-6 col-lg-9 content-group">
                                                <span class="text-muted">Invoice To:</span>
                                                <ul class="list-condensed list-unstyled">
                                                        <li><h5>Rebecca Manes</h5></li>
                                                        <li><span class="text-semibold">Normand axis LTD</span></li>
                                                        <li>3 Goodman Street</li>
                                                        <li>London E1 8BF</li>
                                                        <li>United Kingdom</li>
                                                        <li>888-555-2311</li>
                                                        <li><a href="#">rebecca@normandaxis.ltd</a></li>
                                                </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-3 content-group">
                                                <span class="text-muted">Payment Details:</span>
                                                <ul class="list-condensed list-unstyled invoice-payment-details">
                                                        <li><h5>Total Due: <span class="text-right text-semibold">$8,750</span></h5></li>
                                                        <li>Bank name: <span class="text-semibold">Profit Bank Europe</span></li>
                                                        <li>Country: <span>United Kingdom</span></li>
                                                        <li>City: <span>London E1 8BF</span></li>
                                                        <li>Address: <span>3 Goodman Street</span></li>
                                                        <li>IBAN: <span class="text-semibold">KFH37784028476740</span></li>
                                                        <li>SWIFT code: <span class="text-semibold">BPT4E</span></li>
                                                </ul>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="table-responsive col-md-6 col-md-offset-3" style="width: 50%;">
                                	<table class="table table-sm table-bordered table-striped">
                                		<thead>
                                			<tr>
                                				<th class="col-sm-2">Payment Id</th>
                                            <!-- <th class="col-sm-2">Store Name</th>
                                            <th class="col-sm-2">Store Email</th>
                                            <th class="col-sm-2">Bill Description</th> -->
                                            <th class="col-sm-2">Payment Date</th>
                                            <th class="col-sm-2">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	foreach ($payment as $key) {
                                    		$store = $CI->adminmodel->select_data('T_Store', array('store_id' => $key->store_id));
                                    		?>
                                    		<tr>
                                    			<td><?php echo wordwrap($key->payment_id, 10, "<br>\n", TRUE) ? : ''; ?><input type="hidden" name="payment_id" value="<?php echo $key->payment_id; ?>"> </td>
                                                <!-- <td>< ?php echo $store[0]->store_first_name ? : ''; ?><input type="hidden" name="store_first_name" value="< ?php echo $store[0]->store_first_name; ?>"></td>
                                                <td>< ?php echo $store[0]->store_email ? : ''; ?><input type="hidden" name="store_email" value="< ?php echo $store[0]->store_email; ?>"></td>
                                                <td>< ?php echo wordwrap($key->payment_name, 20, "<br>\n", TRUE) ? : ''; ?><input type="hidden" name="payment_name" value="< ?php echo $key->payment_name; ?>"></td> -->
                                                
                                                <td><?php echo wordwrap(($key->payment_date), 15, "<br>\n", TRUE) ? : ''; ?>  <?php echo wordwrap(($key->payment_time), 15, "<br>\n", TRUE) ? : ''; ?><input type="hidden" name="payment_date" value="<?php echo $key->payment_date . $key->payment_time; ?>"></td>
                                                <!-- <td><?php echo wordwrap(($key->payment_date), 15, "<br>\n", TRUE) ? : ''; ?>  <?php echo wordwrap(($key->payment_time), 15, "<br>\n", TRUE) ? : ''; ?><input type="hidden" name="payment_date" value="<?php echo $key->payment_date . $key->payment_time; ?>"></td> -->
                                                


                                                <!-- <td>$500 <input type="hidden" name="payment_ammount" value="<?php echo '$500'; ?>"><?php //echo wordwrap(($key->created_date) ,20,"<br>\n",TRUE) ? : '';    ?></td> -->
                                                <td><?= $key->points; ?></td>
                                            </tr> 
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-body">
                                	<div class="row invoice-payment">
                                		<div class="col-sm-7">
                                			<div class="content-group">
                                				<h6>Authorized person</h6>
                                				<div class="mb-15 mt-15">
                                					<img src="<?php echo base_url(); ?>assets/images/signature.png" class="display-block" style="width: 150px;" alt="">
                                				</div>
                                            <!-- <ul class="list-condensed list-unstyled text-muted">
                                                    <li>Eugene Kopyov<input type="hidden" name="euko" value="Eugene Kopyov"></li>
                                                    <li>2269 Elba Lane<input type="hidden" name="euko" value="2269 Elba Lane"></li>
                                                    <li>Paris, France<input type="hidden" name="euko" value="Paris, France"></li>
                                                    <li>888-555-2311<input type="hidden" name="euko" value="888-555-2311"></li>
                                                </ul> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                        	<div class="content-group">
                                            <!-- <h6>Total due</h6>
                                            <div class="table-responsive no-border">
                                                    <table class="table">
                                                            <tbody>
                                                                    <tr>
                                                                            <th>Subtotal:</th>
                                                                            <td class="text-right">$7,000 <input type="hidden" name="euko" value="$7,000"></td>
                                                                    </tr>
                                                                    <tr>
                                                                            <th>Tax: <span class="text-regular">(25%)</span></th>
                                                                            <td class="text-right">$1,750</td>

                                                                    </tr>
                                                                    <tr>
                                                                            <th>Total:</th>
                                                                            <td class="text-right text-primary"><h5 class="text-semibold">$8,750</h5></td>
                                                                    </tr>
                                                            </tbody>
                                                    </table>
                                                </div> -->
                                                <div class="text-right">
                                                	<!-- <button id=""><a href="<?php //echo base_url('index.php/control/save_invoice');    ?>">Save PDF</a></button> -->
                                                	<input type="submit" name="submit" value="Send PDF" class="btn-primary" style="padding: 10px 40px;font-size: 18px;font-weight: 700;border-radius: 50px; border: none;" >
                                                	<button type="button" onclick="printDiv('invoice_print')" class="btn btn-primary btn-labeled"><b><i class="icon-printer"></i></b> Print invoice</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h6>Other information</h6>
                                    <p class="text-muted">Thank you for using Cashrub.</p>
                                    <!-- <p class="text-muted">Thank you for using Cashrub. This invoice can be paid via PayPal, Bank transfer, Skrill or Payoneer. Payment is due within 30 days from the date of delivery. Late payment is possible, but with with a fee of 10% per month. Company registered in England and Wales #6893003, registered office: 3 Goodman Street, London E1 8BF, United Kingdom. Phone number: 888-555-2311</p> -->
                                </div>
                                <div class="modal-footer">
                                	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Invoice for all records -->

                <!-- Invoice for individual records -->
                <form method="POST" action="<?php echo base_url('index.php/control/save_invoice'); ?>">
                	<div id="invoice_individual" class="modal fade">
                		<div class="modal-dialog modal-full">
                			<div class="modal-content">
                				<div class="modal-header">
                					<button type="button" class="close" data-dismiss="modal">&times;</button>
                					<!-- <h5 class="modal-title">Invoice <input type="hidden" name="invoice_id" value="<?php echo $id; ?>"></h5> -->
                					<h2 class="text-uppercase text-semibold text-center">Invoice <!-- #< ?php echo $id; ?> --></h2>
                					<!-- <h5 class="modal-title">Invoice #<?php echo $id = random_string('alnum', 6); ?><input type="hidden" name="invoice_id" value="<?php echo $id; ?>"></h5> -->
                				</div>
                				<div class="panel-body no-padding-bottom">
                					<div class="row">

                						<div class="col-md-8 content-group">
                							<div class="col-md-3" id="store_logo"></div>
                							<div class="invoice-details col-md-5" style="float: left;text-align: left;">
                								<ul class="list-condensed list-unstyled" style="text-align: left;">
                									<!-- <li>Date: <span class="text-semibold"><?= date('M d, Y') ?></span></li> -->
                									<li>Store Name: <span class="text-semibold" id="store_name"></span></li>
                									<li>Store Email: <span class="text-semibold" id="store_email"></span></li>
                									<li>Store Contact No.: <span class="text-semibold" id="store_phone"></span></li>
                									<li>Store Address: <span class="text-semibold" id="store_address"></span></li>
                									<!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
                								</ul>
                							</div>
                						</div>
                						
                						<div class="col-md-4 content-group">
                							<img class="img-circle img-logo" src="<?= base_url(); ?>assets/images/cashrub_logo_jpg.jpg">
                							<p style="text-align: center;margin-left: 179px;">
                							<br>
                							<b>Cashrub</b>
                							<br>
                							<b>Invoice Id : <?php echo rand(10000,99999); ?></b>
                							<br>
                							<b>Date: <span class="text-semibold"><?= date('M d, Y') ?></span></b>
                							</p>

                                        <!-- <ul class="list-condensed list-unstyled">
                                                <li>2269 Elba Lane</li>
                                                <li>Paris, France</li>
                                                <li>888-555-2311</li>
                                            </ul> -->
                                        </div>
                                    </div>
                                <!-- <div class="row">
                                        <div class="col-md-6 col-lg-9 content-group">
                                                <span class="text-muted">Invoice To:</span>
                                                <ul class="list-condensed list-unstyled">
                                                        <li><h5>Rebecca Manes</h5></li>
                                                        <li><span class="text-semibold">Normand axis LTD</span></li>
                                                        <li>3 Goodman Street</li>
                                                        <li>London E1 8BF</li>
                                                        <li>United Kingdom</li>
                                                        <li>888-555-2311</li>
                                                        <li><a href="#">rebecca@normandaxis.ltd</a></li>
                                                </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-3 content-group">
                                                <span class="text-muted">Payment Details:</span>
                                                <ul class="list-condensed list-unstyled invoice-payment-details">
                                                        <li><h5>Total Due: <span class="text-right text-semibold">$8,750</span></h5></li>
                                                        <li>Bank name: <span class="text-semibold">Profit Bank Europe</span></li>
                                                        <li>Country: <span>United Kingdom</span></li>
                                                        <li>City: <span>London E1 8BF</span></li>
                                                        <li>Address: <span>3 Goodman Street</span></li>
                                                        <li>IBAN: <span class="text-semibold">KFH37784028476740</span></li>
                                                        <li>SWIFT code: <span class="text-semibold">BPT4E</span></li>
                                                </ul>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="table-responsive col-md-6 col-md-offset-3" style="width: 50%;">
                                	<table class="table table-sm table-bordered table-striped">
                                		<thead>
                                			<tr>
                                				<th class="col-sm-2">Payment Id</th>
                                            <!-- <th class="col-sm-2">Store Name</th>
                                            <th class="col-sm-2">Store Email</th>
                                            <th class="col-sm-2">Bill Description</th> -->
                                            <th class="col-sm-2">Payment Date</th>
                                            <th class="col-sm-2">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="invoice_table">

                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-body">
                            	<div class="row invoice-payment">
                            		<div class="col-sm-7">
                            			<div class="content-group">
                            				<!-- <h6>Authorized person</h6> -->
                            				<!-- <div class="mb-15 mt-15">
                            					<img src="< ?php echo base_url(); ?>assets/images/signature.png" class="display-block" style="width: 150px;" alt="">
                            				</div> -->
                                            <!-- <ul class="list-condensed list-unstyled text-muted">
                                                    <li>Eugene Kopyov<input type="hidden" name="euko" value="Eugene Kopyov"></li>
                                                    <li>2269 Elba Lane<input type="hidden" name="euko" value="2269 Elba Lane"></li>
                                                    <li>Paris, France<input type="hidden" name="euko" value="Paris, France"></li>
                                                    <li>888-555-2311<input type="hidden" name="euko" value="888-555-2311"></li>
                                                </ul> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                        	<div class="content-group">
                                            <!-- <h6>Total due</h6>
                                            <div class="table-responsive no-border">
                                                    <table class="table">
                                                            <tbody>
                                                                    <tr>
                                                                            <th>Subtotal:</th>
                                                                            <td class="text-right">$7,000 <input type="hidden" name="euko" value="$7,000"></td>
                                                                    </tr>
                                                                    <tr>
                                                                            <th>Tax: <span class="text-regular">(25%)</span></th>
                                                                            <td class="text-right">$1,750</td>

                                                                    </tr>
                                                                    <tr>
                                                                            <th>Total:</th>
                                                                            <td class="text-right text-primary"><h5 class="text-semibold">$8,750</h5></td>
                                                                    </tr>
                                                            </tbody>
                                                    </table>
                                                </div> -->
                                                <br>
                                                <div class="text-right">
                                                	<!-- <button id=""><a href="< ?php //echo base_url('index.php/control/save_invoice');    ?>">Save PDF</a></button> -->
                                                	<input type="submit" name="submit" value="Send PDF" class="btn-primary" style="padding: 10px 40px;font-size: 18px;font-weight: 700;border-radius: 3px; border: none;" >
                                                	<button type="button" onclick="printDiv('invoice_print')" class="btn btn-primary btn-labeled" style="border-radius: 3px !important;margin: 0px 0px 6px 10px;"><b><i class="icon-printer"></i></b> Print invoice</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <h6>Other information</h6>
                                    	<p class="text-muted">Thank you for using Cashrub.</p> -->
                                    	<!-- <p class="text-muted">Thank you for using Cashrub. This invoice can be paid via PayPal, Bank transfer, Skrill or Payoneer. Payment is due within 30 days from the date of delivery. Late payment is possible, but with with a fee of 10% per month. Company registered in England and Wales #6893003, registered office: 3 Goodman Street, London E1 8BF, United Kingdom. Phone number: 888-555-2311</p> -->
                                    </div>
                                    <div class="modal-footer">
                                    	<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Invoice for individual record -->

                    <!-- /page container -->
                    <!-- modal -->
                    <div class="modal fade" id="paymentDeleteModel" role="dialog">
                    	<div class="modal-dialog">
                    		<!-- Modal content-->
                    		<div class="modal-content" style="margin-left: 10%;">
                    			<div class="modal-header" style="margin-left: 7%;margin-top:2%;">
                    				<button type="button" class="close" data-dismiss="modal">&times;</button>
                    				<h4 class="modal-title">Are you sure to want to delete this payment detail?</h4>
                    			</div>
                    			<div class="modal-body" style="margin-left: 38%;" >
                    				<p>
                    					<button  class="btn btn-info" value="" style="border-radius:0px !important;background-color: #01a8f6!important;" id="paymentclick" value="">Yes</button>
                    					<button  class="btn btn-info" style="border-radius:0px !important; background-color: #01a8f6!important;" onclick="location.reload();">No</button>
                    				</p>
                    			</div>
                        <!-- <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div> -->
                  </div>
              </div>
          </div>
          <script>
          	$('#shows').click(function () {
                    //alert ("sahdsadsad");
                    //window.location.reload();
                    window.location.href = "<?php echo base_url(); ?>index.php/control/setting/chk";
                });

          	$("#hidemenow").delay(500).fadeIn(300).delay(1000).fadeOut(300);
          </script>
      </body>
      </html>
      <script>
      	$('#password-1').hidePassword(true);
    // Example 2:
    // - Password shown by default
    // - Toggle shown on 'focus' of element
    // - Custom toggle class
    $('#password-2').hidePassword(true);
    // Example 3:
    // - When checkbox changes, toggle password
    //   visibility based on its 'checked' property
    $('#show-password').change(function () {
    	$('#password-3').hideShowPassword($(this).prop('checked'));
    });
    $(document).on("click", "#delete_payment", function () {
    	var id = $(this).data('id');
    	var values = $('#paymentclick').val(id);
    });

    $(document).on("click", "#invoice_payment", function () {
        // alert("message?: DOMString");
        var id = $(this).data('id');
        $.ajax({
        	url: '<?php echo base_url(); ?>index.php/control/getInvoice/' + id,
            // data: {format: 'json'},
            method: 'post',
            dataType: 'json',
            success: function (response) {
            	var obj = response;
            	var table = '';
            	table += '<tr>\n\
            	<td>' + obj[0].payment_id + '</td>\n\
            	<td>' + obj[0].created_date + '</td>\n\
            	<td>' + obj[0].points + '</td>\n\
            	</tr>';
            	var logo = '';
            	logo = '<img class="img-circle" style="height: 150px; width: 100%;" src="<?= base_url(); ?>uploads/' + obj[0].store_logo + '">';

            	$('#invoice_table').html(table);
            	$('#store_logo').html(logo);
            	$('#store_name').html(obj[0].store_first_name);
            	$('#store_email').html(obj[0].store_email);
            	$('#store_phone').html(obj[0].store_mobile_no);
            	$('#store_address').html(obj[0].store_address1);
            }
        });
    });

    $(document).on("click", "#paymentclick", function () {
    	var id = $(this).val();
        // alert("id");
        $.post("<?php echo base_url(); ?>index.php/control/removePayment/" + id, function (data, status) {
            // alert(data);
            location.reload();
        });
    });

    function isNumberKey(evt) {
        //alert('dsfh');
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        	return false;
        return true;
    }

    $("#savepayment").click(function () {
    	var point = $("#payment_point").val();
    	if (point == '') {
    		document.getElementById("point_error").innerHTML = 'Add points field is required.';
    		return false;
    	} else if (point < 20) {
    		document.getElementById("point_error").innerHTML = 'Walkin Points should be greater than or equal to 20';
    		return false;
    	} else if (point > 200) {
    		document.getElementById("point_error").innerHTML = 'Walkin Points should be less than or equal to 200';
    		return false;
    	}
    	 else if (point % 2 != 0) {
    		document.getElementById("point_error").innerHTML = 'Walkin Points should be multiple of 2';
    		return false;
    	} else {
    		document.getElementById("point_error").innerHTML = '';
    	}
    });
</script>

<script type="text/javascript">
	function printDiv(invoice_print) {
		var printContents = document.getElementById(invoice_rint).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		$('#invoice').hide();
	}
</script>	   
<!-- ==========================   Badruddin  =============================== -->
<script  src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script>
	$("#sample_3").DataTable({
		"paging": true,
		"lengthChange": false,
		"pageLength": 10,
		"searching": true,
		"ordering": false,
		"info": true,
		"autoWidth": true,
		dom: 'l<"#add">frtip',
		fnInitComplete: function () {
            // $('#add').addClass('pull-right');
        }
    });

	$('<label/>').text('Custom Search: ').appendTo('#add')
	$select = $('' +
		'<form action="<?php echo base_url(); ?>/index.php/control/dateRangeWalkin_setting">' +
		'<div class="input-group date form_date col-md-12" id="chh" style="margin-left: 110px;margin-top: -36px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >' +
		'<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" style="float: left;">' +
		'</span></span>' +
		'<input class="form-control" size="4"  style="width:130px;" data-date-start-date="+0d" id="changedate1" name="startdate" placeholder="Start Date" style="font-size: 15px;" type="text" value="<?php echo $s_date; ?>" readonly>' +
		'</div>' +
		'<input type="hidden" id="dtp_input1" value="" /><br/><h7 style="color: red;float: left;" id ="date_error"></h7>' +
		'<div class="input-group date form_date2 col-md-12" id="chh" style="float:right;padding-left:8px;margin-right: -276px;margin-top: -58px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >' +
		'<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" style="float: left;">' +
		'</span></span>' +
		'<input class="form-control" size="4" style="width:130px;" data-date-start-date="+0d" id="changedate2" name="enddate" placeholder="End Date" style="font-size: 15px;" type="text" value="<?php echo $e_date; ?>" readonly>' +
		'</div>' +
		'<input type="hidden" id="dtp_input2" value="" /><br/><h7 style="color: red;float: left;" id ="date_error2"></h7>' +
		'<input type="submit" value="Apply" id="getValidate" style="border-radius:3px!important; margin-left: 462px;margin-top: -148px;padding-left:10px;" class="btn bg-blue heading-btn" >' +
		'<input type="reset" value="Cancel"  style="border-radius: 3px!important; margin-left:5px;padding-left:10px !important; margin-top:-148px;color:black; text-align:center;" class="btn bg-red heading-btn" >' +
		'<div class="center-block" width="20%" style="text-align:center; padding: 10px 5px;color:red;margin-top: -65px;margin-left: -190px;"><span id="errorSelDate"></span></div>' +
		'</form>').appendTo('#add');

	$('.form_date2').datetimepicker({
		language: 'fr',
		weekStart: 1,
		todayBtn: 1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	}).datetimepicker("update", "");

	$('.form_date2').datetimepicker('setEndDate', new Date);
	$('.form_date').datetimepicker({
		language: 'fr',
		weekStart: 1,
		todayBtn: 1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
	}).datetimepicker("update");
	$('.form_date').datetimepicker('setEndDate', new Date);

	$('#changedate1').change(function () {
		var s_date = $('.form_date').datetimepicker('getDate');
		$('.form_date2').datetimepicker('setDate', s_date);
		$('.form_date2').datetimepicker('setStartDate', s_date);
		$('#errorSelDate').html("");
	});

	$('#getValidate').click(function () {
		if ($('#changedate1').val() == '' || $('#changedate2').val() == '') {
			$('#errorSelDate').html("Please select Start Date and End Date");
			return false;
		}
		else {
			$('#errorSelDate').html("");
		}
	});
</script>
<script>
	jQuery.fn.tableToCSV = function (options) {
		var settings = $.extend({
			filename: ""
		}, options);

		var clean_text = function (text) {
			text = $.trim(text.replace(/"/g, '""'));
			return '"' + text + '"';
		};

		$(this).each(function () {
			var table = $(this);
			var caption = settings.filename;
			var title = [];
			var rows = [];
			$(this).find('tr').each(function () {
				var data = [];
				$(this).find('th').each(function () {
					if (title.length < 3) {
						var text = clean_text($(this).text());
						title.push(text);
					}
				});

				$(this).find('td').each(function () {
					if (data.length < 3) {
						var text = clean_text($(this).text());
						data.push(text);
					}
				});
				data = data.join(",");
				rows.push(data);
			});
			title = title.join(",");
			rows = rows.join("\n");
			var csv = title + rows;
			var uri = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
			var download_link = document.createElement('a');
			download_link.href = uri;
			var ts = new Date().getTime();
			if (caption == "") {
				download_link.download = ts + ".csv";
			} else {
				download_link.download = caption + "-" + ts + ".csv";
			}
			document.body.appendChild(download_link);
			download_link.click();
			document.body.removeChild(download_link);
		});
	};
	 $("#offer-add").validate({
            rules: {
               
                walk:{
                     required: true,
                     min:10,
                     max:200
                },
                 
            },
            messages: {
            
               
            }
        });
</script>

</script>