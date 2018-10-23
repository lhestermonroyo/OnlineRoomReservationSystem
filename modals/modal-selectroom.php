<div id="selectroom<?=$room_row['room_id'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select <?=$room_row['room_name'];?></h4>
      </div>
      <div class="modal-body">
      	<form class="form-horizontal" action="functions/save-reservation.php" enctype="multipart/form-data" autocomplete="off" method="POST">
          <input type="hidden" name="room_id" value="<?=$room_row['room_id'];?>">
          <div class="form-group">
	        <label class="control-label col-sm-2">Remarks:</label>
	        <div class="col-sm-10"> 
	          <textarea class="form-control input-lg" name="remarks" required="true"></textarea>
	        </div>
	      </div>
	      <div class="form-group">
	        <label class="control-label col-sm-2">Check In Date:</label>
	        <div class="col-sm-10">
	          <input type="date" class="form-control input-lg" name="check_in" required="true">
	        </div>
	      </div>
	      <div class="form-group">
	        <label class="control-label col-sm-2">Check Out Date:</label>
	        <div class="col-sm-10">
	          <input type="date" class="form-control input-lg" name="check_out" required="true">
	        </div>
	      </div>
	      <div class="form-group"> 
	        <div class="col-sm-offset-2 col-sm-10">
	          <button type="submit" class="btn btn-warning btn-lg" name="submit-reserve"> Confirm Reservation</button>
	        </div>
	      </div>
        </form>  
      </div>
    </div>
  </div>
</div>