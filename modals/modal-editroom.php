<div id="editroom<?=$room_row['room_id'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit <?=$room_row['room_name'];?></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="../functions/update-room.php" enctype="multipart/form-data" autocomplete="off" method="POST">
          <input type="hidden" name="room_id" value="<?=$room_row['room_id'];?>">	
	      <div class="form-group">
	        <label class="control-label col-sm-2">Room Name:</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control input-lg" value="<?=$room_row['room_name'];?>" name="room_name" required="true">
	        </div>
	      </div>
	      <div class="form-group">
	        <label class="control-label col-sm-2">Description:</label>
	        <div class="col-sm-10"> 
	          <textarea class="form-control input-lg" name="room_description" maxlength="125" required="true"><?=$room_row['room_description'];?></textarea>
	        </div>
	      </div>
	      <div class="form-group">
	        <label class="control-label col-sm-2">Room Type:</label>
	        <div class="col-sm-10"> 
	          <select class="form-control input-lg" name="room_type" required="true">
	            <option <?php if($room_row['room_type'] == "Classic"){echo "selected='selected'";}?> value="Classic">Classic</option>
	            <option <?php if($room_row['room_type'] == "Luxury"){echo "selected='selected'";}?> value="Luxury">Luxury</option>
	            <option>Select room type...</option>
	          </select>
	        </div>
	      </div>
	      <div class="form-group">
	        <label class="control-label col-sm-2">Room Capacity:</label>
	        <div class="col-sm-10"> 
	          <select class="form-control input-lg" name="room_capacity" required="true">
	            <option <?php if($room_row['room_capacity'] == "6 Persons"){echo "selected='selected'";}?> value="6 Persons">6 Persons</option>
	            <option <?php if($room_row['room_capacity'] == "5 Persons"){echo "selected='selected'";}?> value="5 Persons">5 Persons</option>
	            <option <?php if($room_row['room_capacity'] == "4 Persons"){echo "selected='selected'";}?> value="4 Persons">4 Persons</option>
	            <option <?php if($room_row['room_capacity'] == "3 Persons"){echo "selected='selected'";}?> value="3 Persons">3 Persons</option>
	            <option <?php if($room_row['room_capacity'] == "2 Persons"){echo "selected='selected'";}?> value="2 Persons">2 Persons</option>
	            <option <?php if($room_row['room_capacity'] == "1 Person"){echo "selected='selected'";}?> value="1 Person">1 Person</option>
	            <option>Select room capacity...</option>
	          </select>
	        </div>
	      </div>
	      <div class="form-group">
	        <label class="control-label col-sm-2">Room Price:</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control input-lg" value="<?=$room_row['room_price'];?>" name="room_price" required="true">
	        </div>
	      </div>
	      <div class="form-group">
	        <label class="control-label col-sm-2">Room Photo:</label>
	        <div class="col-sm-10">
	          <input type="file" class="form-control input-lg" name="room_photo">
	        </div>
	      </div>
	      <div class="form-group"> 
	        <div class="col-sm-offset-2 col-sm-10">
	          <button type="submit" class="btn btn-warning btn-lg" name="submit-room">Update Room</button>
	        </div>
	      </div>
	    </form>
      </div>
    </div>
  </div>
</div>        	