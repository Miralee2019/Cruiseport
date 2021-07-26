          <?php if(!empty($beacon)){
            $beacon_key=$beacon->beacon_key;
            $major=$beacon->major_value;
               $minor=$beacon->minor_value;
                $uuid=$beacon->uuid;
                $store_assigned=$beacon->assigned_to_store;
          }else{
 $beacon_key="";           
  $major="";
               $minor="";
                $uuid=""; 
                $store_assigned='';   } ?>
<div class="row">
<?php if(!empty($store_assigned)){ ?>
                        <form class="form-horizontal" action="<?php echo site_url('superadmin/update_beacon'); ?>" method="post">
                       <?php }else{ ?>
                         <form class="form-horizontal" action="<?php echo site_url('superadmin/update_beacon'); ?>" method="post">
                       <?php } ?>
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

                                            <input type="text" class="form-control" maxlength="20" onkeyup="checkname();" name="beacon_key" placeholder="Beacon Key (Example: yFch)" onkeypress="return alpha(event)" id="third_party_beacon_name" value="<?php echo $beacon_key ?>" required readonly>
                                            <span id="third_party_beacon_name_error" style="color: red"></span>

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
                                            <input type="text" class="form-control" onkeypress="return alpha(event)" name="beacon_uuid" placeholder="Beacon UUID (Example: fz45dkeZeie32)" id="third_party_beacon_uuid" value="<?php echo $uuid ?>" required readonly>


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

                                            <input type="text" maxlength="8" class="form-control" name="beacon_major" onkeypress="return isNumber(event)" placeholder="Beacon Major (Enter numeric value Example:454)" id="third_party_beacon_major" value="<?php echo $major ?>" required="" readonly>

                                           
                                            <span id="third_party_beacon_major_error" style="color: red">

                                        </div>
                                        
                                        <div class="col-md-6">

                                            <label class="control-label" style="font-size: 14px;margin-top:6px;">Beacon Minor
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>

                                            <br/>

                                             <input type="text" maxlength="8" class="form-control" name="beacon_minor" onkeypress="return isNumber(event)" placeholder="Beacon Minor (Enter numeric value Example: 342)" id="third_party_beacon_minor" value="<?php echo $minor ?>" required readonly>


                                            <span id="third_party_beacon_minor_error" style="color: red">

                                        </div>


                                    </div>
                                    <div class="row" style="margin-top: 3%;">
                                        <div class="col-md-12">
                                            <div class="col-md-6 col-md-offset-3">
                                                 <label class="control-label" style="font-size: 14px;margin-top:6px;">Store
                                                <red style="color: red;font-size: 20px;">*</red>
                                            </label>
                                        <select class="form-control" name="store_id" <?php if(!empty($store_assigned)){ echo "disabled"; } ?>>
                                            <?php foreach($stores as $store){ ?>
                                                <option value="<?php echo $store->store_id; ?>" <?php if($store_assigned==$store->store_id){ echo "selected";  } ?>><?php echo $store->store_first_name; ?></option>
                                        <?php } ?>
                                        </select>
                                        </div></div>
                                    </div>
                                    

                                    <div class="row" style="margin-top: 3%;">
                                        <div class="text-center">
<?php if(!empty($store_assigned)){ ?>
    <input type="hidden" name="unassign" value="1">
    <input type="hidden" name="beacon_id" value="<?php if(!empty($beacon_id)){ echo $beacon_id; }else{ echo 0; } ?>">
    <input type="hidden" name="store_id" value="<?php if(!empty($store_assigned)){ echo $store_assigned; }else{ echo 0; } ?>">
                                            <button id="addCashrubBeacon" type="submit" class="btn bg-red btn-labeled heading-btn"><b><i class="icon-checkmark3"></i></b> Unassign</button>
<?php }else{ ?>
      <input type="hidden" name="beacon_id" value="<?php if(!empty($beacon_id)){ echo $beacon_id; }else{ echo 0; } ?>">
     <button id="addCashrubBeacon" type="submit" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-checkmark3"></i></b> assign</button>
<?php } ?>
                                            <button data-dismiss="modal" type="reset" class="btn bg-blue btn-labeled heading-btnbtn-labeled-right ml-10"><b><i class="icon-cross"></i></b> Cancel</button>

                                        </div>
                                    </div>
                            
                        </div>
                            
                        </div>

                            
                        </div>

                                   

                                    
                        </form>
                    </div> 