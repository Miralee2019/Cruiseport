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

	.dataTables_filter input {
		margin-left: 10px;
	}

	.dataTables_paginate .paginate_button.current, .dataTables_paginate .paginate_button.current:focus, .dataTables_paginate .paginate_button.current:hover {
		margin-top: 20px;
	}

	.dataTables_paginate {
		margin: 0 35px 20px 20px;
	}

	.table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th {
		padding: 4px 10px!important;
	}

	#add {

		display: inline-block;
		margin-left: 10px;
		/*position: absolute;*/
		margin-top: 10px;
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

	.daterangepicker_input{
		display: none;
	}

	.calendar > .right{
		border-left-style: none;
	}

	.calendar > .left{
		border-right-style: none;
	}

	.dataTables_info{
		margin-left: 15px;
	}

    #changedate1, #changedate2 {
        border-radius: 3px!important;
    }

    #add {
        display: inline-block;
        margin-left: 30px;
        /*position: absolute;*/
        margin-top: 8px;
        padding-right: 5px;
    }

    @media (min-width: 320px) and (max-width: 767px){  
        #add {
            position: relative;
            margin-bottom: 10px;
        }   
    }

    @media (min-width: 769px)
    label {
        margin-bottom: 7px;
        font-size: 15px;
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
							<h4> <a href="<?php echo base_url(); ?>index.php/control/viewOffer"><i class="icon-arrow-left15 position-left"></i></a> <span class="text-semibold">Offer Details</span></h4>
							<ul class="breadcrumb position-right">
								<li><a href="<?php echo base_url(); ?>index.php/control/home"><i class="icon-home2 position-left"></i> Home</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/control/viewOffer">Offer</a></li>
								<li class=active>Offer Details</li>
							</ul>
						</div>

						<div style="text-align:center;display:none;" id="hidemenow-1"> 
							<?php if($this->session->flashdata()){ 
								echo $this->session->flashdata('success'); 
							} ?> 
						</div> 
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">

						<!-- <div style="text-align:center;display:none;" id="styleme">
                                <div class="alert alert-success">
                                    <strong>Refresh successful.</strong>
                                </div>    
                        </div>
                    -->
                    <!-- User profile -->


                    <div class="row">
                    	<!-- Quick stats boxes -->
                    	<!-- <div class="row"> -->
                    		<div class="col-lg-4">

                    			<!-- Members online -->
                    			<div class="panel twitter">
                    				<div class="panel-body">

                    					<div class="col-lg-4 col-xs-4">
                    						<!-- <i class="icon-user" style="font-size: 25px;" ></i>     -->
                    						<i class="fa fa-share-alt" style="margin-top: 12px;font-size: 32px;" ></i>
                    					</div>

                    					<div class="col-lg-8 col-xs-8" style="margin-top: -10px;" >
                    						<div class="col-md-12 col-xs-12" style="margin-top: -8px;">
                    							<h1 class="no-margin" > <b style="text-align: center;font-size: 42px;margin-left: 4px;" > <?php if($total_shares){ echo $total_shares[0]->shares; } else { echo "0"; }  ?> </b> </h1>
                    						</div>
                    						<div class="col-md-12 col-xs-12"  style="margin-top:-10px;">
                    							<span >Total Shares</span>    
                    						</div>
                    					</div>

                    				</div>

                    				<div class="container-fluid">
                    					<div id="members-online"></div>
                    				</div>
                    			</div>
                    			<!-- /members online -->

                    		</div>

                    		<div class="col-lg-4">

                    			<!-- Current server load -->
                    			<div class="panel facebook">
                    				<div class="panel-body">
                    					
                    					<div class="col-lg-4 col-xs-4">
                                                <!-- <i class='icon-store' style="font-size: 25px;"></i>   
                                                -->

                                                <i class="fa fa-share-alt" style="    margin-top: 12px;font-size: 32px;" ></i>
                                            </div>

                                            <div class="col-lg-8 col-xs-8" style="margin-top: -10px;" >

                                            	<div class="col-md-12 col-xs-12" style="margin-top: -8px;">
                                            		<h1 class="no-margin"> <b style="text-align: center;font-size: 42px;margin-left: 4px;"> <?php if($today_shares){ echo $today_shares[0]->shares; } else { echo "0"; }  ?> </b> </h1>
                                            	</div>
                                            	<div class="col-md-12 col-xs-12"  style="margin-top:-10px;">
                                            		<span >Today’s Shares</span>
                                            	</div>
                                            	
                                            </div>

                                        </div>

                                        <div id="server-load"></div>
                                    </div>
                                    <!-- /current server load -->

                                </div>

                                <div class="col-lg-4">

                                	<!-- Today's revenue -->
                                	<div class="panel purchase">
                                		<div class="panel-body">


                                			<div class="col-lg-4 col-xs-4">
                                				<i class="icon-cart-add purchase" style="margin-top: 12px;font-size: 32px;"></i>
                                			</div>
                                			
                                			<div class="col-lg-8 col-xs-8" style="margin-top: -10px;" >
                                				<div class="col-md-12 col-xs-12" style="margin-top: -8px;">
                                					<?php $active1= $_GET['id'];
                                					if($active1=='Active'){  ?>
                                					<h1 class="no-margin"> <b style="text-align: center;font-size: 42px;margin-left: 1px;"> 
                                						<?php if($remaining_credits>=0)
                                						{

                                							echo $remaining_credits;
                                						}
                                						else{ ?>
                                						
                                						<?php echo "0"; 
                                					} 
                                				} 
                                				else{ ?>
                                				<h1 class="no-margin"> <b style="text-align: center;font-size: 42px;margin-left: 1px;"> 
                                					<?php echo "0";
                                				}
                                                		// if($today_Walkins){ echo $today_Walkins[0]->walkin; } else { echo "0"; }  ?></b> </h1>	
                                                	</div>
                                                	<div class="col-md-12 col-xs-12" style="margin-top:-10px;">
                                                		<span >Credits Remaining</span>	
                                                	</div>
                                                </div>

                                                
                                                
                                            </div>

                                            <div id="today-revenue"></div>
                                        </div>
                                        

                                    </div>
                                    
                                    <!-- </div> -->
                                    
                                    
                                </div>
                                <div class="col-md-12">
                                	<div class="panel panel-flat">
                                		<div class="panel-heading">
                                			<h6 class="panel-title"><b>Offer Details</b></h6>
                                			<div class="heading-elements"><button class="btn bg-blue btn-labeled heading-btn" style="    padding: 5px 15px;
                                			margin-top: -6px;
                                			border-radius: 4px !important;
                                			font-size: 15px;" onclick="exporttocsv()">
                                		Export</button>
                                		<ul class="icons-list">
                                			<li><a data-action="collapse"></a></li> 
                                			<li><a id="shows" data-action="reload"></a></li> 
                                			<!-- <li><a id="shows" onClick="refreshPage()" ><i class="fa fa-refresh"></i></a></li> -->
                                			<!-- <li> <a onClick="refreshPage()"> <i class="fa fa-refresh"></i></a> </li>  -->
                                			<li></li> 
                                		</ul><br>
                                		<!-- <button style="padding: 05px 20px;"><a href="<?php //echo base_url('index.php/control/export_offer_detail'); ?>">Export Details</a></button> -->
                                		
                                		<script type="text/javascript">
                                			function exporttocsv() {
                                				$("#sample_3").tableToCSV({
                                					filename: 'offer_details'
                                				});
                                			}
                                		</script>	

                                	</div>
                                </div>


                                <table class="table table-hover" id="sample_3">
                                	
                                	<thead>
                                		<tr>
                                			<th class="col-md-1"> <b> Id </b> </th>
                                			<th class="col-md-2"> <b> Shared Date </b> </th>
                                			<th class="col-md-2"> <b> User Name </b> </th>
                                			<th class="col-md-2"> <b> Store Name </b> </th>
                                			<th class="col-md-2"> <b> Offer title </b> </th>
                                			<th class="col-md-2"> <b> Share Type </b> </th>
                                			<th class="col-md-2"> <b> Points </b> </th>
                                			<!-- <th class="text-center">Actions</th> -->
                                		</tr>
                                	</thead>

                                	<tbody>
                                		
                                		<?php foreach ($shareDetails as $key) { ?>
                                		
                                		<tr>
                                			<?php 
                                			$CI =& get_instance();
                                			$CI->load->model('adminmodel');
                                			$name = $CI->adminmodel->select_data('T_User', array('user_id' => $key->user_id) );
                                			$offer = $CI->adminmodel->select_data('T_StoreOffer', array('store_offer_id' => $key->store_offer_id) );
                                			$store = $CI->adminmodel->select_data('T_Store', array('store_id' => $key->store_id) );
                                			?>
                                			<td class="col-md-1"> <?php echo $key->social_share_point_id ; ?> </td>
                                            <td class="col-md-2"> 
                                                <?php 
                                                    $fetchedDate = $key->created_date;
                                                    $date = new DateTime("$fetchedDate");
                                                    $date->modify("-1 hours -30 minutes"); // This changed for now because of server's time issue.
                                                    echo $date->format("Y-m-d H:i:s");
                                                ?>
                                            </td>
                                			<!-- <td class="col-md-2"> < ?php echo $key->created_date ; ?> </td> -->
                                			<td class="col-md-2"><?php echo wordwrap($name[0]->name ?:'', 15, "<br />\n");   ?></td>
                                			<td class="col-md-2"><?php echo wordwrap($store[0]->store_first_name ?:'', 15, "<br />\n");   ?></td>
                                			<td class="col-md-2"> <?php echo $offer[0]->title ; ?>   </td>
                                			<td class="col-md-2"> 
                                				<span style="background: #01a8f6; padding: 4px 0px 2px 0px; border-radius: 4px; color: #fff;">
                                					<?php if($key->share_type == "facebook_points") {
                                						echo "Facebook Share";
                                					} else {
                                						echo "Twitter Share";
                                					}?> </td>
                                				</span>
                            				<td class="col-md-2"> <?php echo $key->points ; ?>   </td>
                                			</tr>
                                			<?php } ?>
                                		</tbody>
                                	</table>
                                </div>
                            </div>
                        </div>
                        <!-- /page content -->

                    </div>
                    <!-- /page container -->
                    
                </div>
            </div>
        </div>
        

        

        
        <script type="text/javascript">

        	$(document).on("click", "#change_offerstatus", function () {
        		
        		var status = $(this).data('status');
        		var store = $(this).data('store');
        		var offer = $(this).data('offer');

        		$.post("<?php echo base_url(); ?>index.php/supercontroller/changeOfferStatus/"+offer+"/"+status+"/"+store+"", function(data, status){
        			console.log(status);
        			location.reload();
        		});
        	});

        	$(document).on("click", "#notify_store", function () {
        		var store_id = $(this).data('store');
        		$(".modal-body #store_id").val( store_id );
        	});    
        	

        // $('#shows').click(function() {
        	
        //     $('#styleme').delay(1000).fadeIn(300).delay(1000).fadeOut(300);
        // });


        // $("#hidemenow").delay(1000).fadeIn(300).delay(1000).fadeOut(300);    


    </script>

    <script>

        // $('#shows').click(function(){

        // 	//alert ("sahdsadsad");
        // 	window.location.reload();
        //  //window.location.href = "<?php echo base_url(); ?>index.php/control/setting/chk";

        // });

        // $("#hidemenow").delay(500).fadeIn(300).delay(1000).fadeOut(300); 

		// function refreshPage(){
			
		// 	window.location.reload();
		// 	callMe();
		// } 

		// function callMe(){
		// 	$('#styleme').delay(3000).show(0);
		// 	setTimeout(1000);

		// 	 $("#styleme").delay(1000).fadeIn(300).delay(1000).fadeOut(300);    
		

		// }
	</script>
	<script>
		$('#shows').click(function(){
            window.location.href = "<?php echo base_url(); ?>index.php/control/shareDetails/<?php echo $offer_id_confirm; ?>/chk"; 
        });
		$("#hidemenow-1").delay(500).fadeIn(300).delay(1000).fadeOut(300);

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
						var text = clean_text($(this).text());
						title.push(text);
					});
					$(this).find('td').each(function () {
						var text = clean_text($(this).text());
						data.push(text);
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


	</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tagsinput.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/tags/tokenfield.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/maxlength.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/formatter.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_floating_labels.js"></script>
	<script>


		$("#sample_3").DataTable({

			"paging": true, 
			"lengthChange": false,
			"pageLength": 10,
			"searching": true,
			"ordering":false,
			"info": true,
			"autoWidth": true,
			dom : 'l<"#add">frtip'
			
		}); 



		$('<label/>').text('Custom Search: ').appendTo('#add')

		
		/*$offer_id_confirm;*/
		$select = $(''+
			'<form action="<?php echo base_url(); ?>/index.php/control/offerDateFun/<?php echo $offer_id_confirm;?>/">'+

			'<div class="input-group date form_date col-md-12" id="chh" style="margin-left: 110px;margin-top: -36px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >'+
			'<span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;">'+
			'</span></span>'+
			'<input class="form-control" size="4"  style="width:130px;" data-date-start-date="+0d" id="changedate1" name="startdate" placeholder="Start Date" style="font-size: 15px;" type="text" value="<?php echo $s_date ; ?>" readonly>'+
			'</div>'+
			'<input type="hidden" id="dtp_input1" value="" /><br/><h7 style="color: red;float: left;" id ="date_error"></h7>'+
			'<div class="input-group date form_date2 col-md-12" id="chh" style="float:right;margin-right: -292px;margin-top: -56px;"  data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" >'+
			
			'<span class="input-group-addon"><span class="glyphicon glyphicon-th" style="float: left;">'+
			'</span></span>'+
			'<input class="form-control" size="4" style="width:130px;" data-date-start-date="+0d" id="changedate2" name="enddate" placeholder="End Date" style="font-size: 15px;" type="text" value="<?php echo $e_date ; ?>" readonly>'+
			'</div>'+

			'<input type="hidden" id="dtp_input2" value="" /><br/><h7 style="color: red;float: left;" id ="date_error2"></h7>'+
            '<input type="submit" value="Apply" id="getValidate" style="border-radius:3px!important; margin-left: 473px;margin-top: -148px;padding-left:10px;" class="btn bg-blue heading-btn" >'+
			'<input type="reset" value="Cancel" style="border-radius: 3px!important; margin-left:5px;padding-left:10px !important; margin-top:-148px;color:black; text-align:center;" class="btn bg-red heading-btn" >'+

			'</form>').appendTo('#add');
		</script>

		<script type="text/javascript">
			
			$('#getValidate').click(function(){
				if($('#changedate2').val() == '' ){
					alert("Please enter end date");
					return false;
				}

			});

		</script>


		<script  src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script type="text/javascript">
			
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
                } else {
                    $('#errorSelDate').html("");
                }
            });
		</script>    

		<script>
        // $(document).on("click", "#notify_user", function () {
        //     var user_id = $(this).data('user');
        //     $(".modal-body #user_id").val( user_id );
        // });    
    </script>
    <!-- ============================== End B 01.05.2018================================= -->
</body>
</html>
