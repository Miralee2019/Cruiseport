 <?php if(!empty($offer_list)){ ?>
  <div class="form-group">
            <label class="contol-label">Offer List</label>
          <select name="offer_id" class="locationMultiple form-control">
          	<?php foreach($offer_list as $store){ ?>
          	<option value="<?php echo $store->store_offer_id; ?>"><?php echo $store->title; ?></option>
         <?php } ?>
          </select>
      </div>
      <?php }else{  ?>
      <div class="form-group">
      	   <label class="contol-label">No activated Offer</label>
      </div>
      <?php } ?>