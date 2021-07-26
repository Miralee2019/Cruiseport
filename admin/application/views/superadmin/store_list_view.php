 
  <div class="form-group">
            <label class="contol-label">Store List</label>
          <select name="store_id" id="store_list_fetched" class="locationMultiple form-control">
          	<?php foreach($stores as $store){ ?>
          	<option value="<?php echo $store->store_id; ?>"><?php echo $store->store_first_name; ?></option>
         <?php } ?>
          </select>
             </div>
             <?php if(!empty($offer)){  ?>
<script type="text/javascript">
	$("#store_list_fetched").change(function(){
	//	alert("");
	 var id=$(this).val();
	 console.log(id);
		    $.ajax({
  type: "post",
  url: "<?php echo base_url().'index.php/superadmin/offer_list'; ?>",
  
  data: {'id':id,},
  success: function(data){
   // console.log(data);
    $("#offer_data").html(data);

  }
});
	});
</script>
             <?php } ?>
             <script type="text/javascript">
             /*	  $(document).ready(function () {
    $.fn.select2.defaults.set("theme", "bootstrap");
    $(".locationMultiple").select2({
      dropdownAutoWidth : true
    })
});*/
             </script>