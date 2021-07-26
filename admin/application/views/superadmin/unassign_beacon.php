<?php if(!empty($beacon_name)){ ?>
<style type="text/css">
	.control-label{
		font-weight: 600;
		font-size: 16px;
	}
</style>
<div class="row">
<div class="col-md-12">

	<div class="form-group">
	<div class="col-md-12">
	<label class="control-label">Beacon Keys:</label>
	<ul>
		<?php if(!empty($beacon_name)){ foreach($beacon_name as $name){ ?>
<li><?php echo $name; ?></li>
		<?php } } ?>
	</ul>
</div>
</div>
	<form action="<?php echo  base_url('index.php/superadmin/unassign_beacon_confirm'); ?>" method="post">
	<div class="form-group">
		<div class="col-md-6">
		<!-- 	<input type="hidden" name="beacon_key" value="<?php // print_r(serialize($beacon_name)); ?>"> -->
		<?php
//$postvalue=array("a","b","c");
foreach($beacon_name as $value)
{
  echo '<input type="hidden" name="beacon_key[]" value="'. $value. '">';
}
		?>
				<?php
//$postvalue=array("a","b","c");
foreach($beacon_id as $value)
{
  echo '<input type="hidden" name="beacon_id[]" value="'. $value. '">';
}
		?>
	<?php /*	<!-- 	<input type="hidden" name="beacon_id" value="<?php // print_r(serialize($beacon_id)); ?>"> -->
				<label class="control-label">Store List:</label>
<select name="store_id" class="form-control">
	<?php foreach($stores as $store){ ?>
	<option value="<?php echo  $store->store_id; ?>"><?php echo $store->store_first_name; ?></option>
<?php } ?>
</select> */ ?>
</div>
<div class="col-md-4"></div>
<div class="col-md-12">
<div class="form-group">
	<button type="submit" class="btn btn-danger btn-lg" style="margin-top: 20px;">Unassign</button>
</div>
</div>
</form>
	</div>
</div>
</div>
<?php }else{  ?>
<h2 class="text-center">Please Select Beacon</h2>
<?php } ?>