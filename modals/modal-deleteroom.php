<div id="deleteroom<?=$room_row['room_id'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
      	<p>Are you sure you want to delete this room?</p>
      	<a href="../functions/delete-room.php?room_id=<?=$room_row['room_id'];?>" class="btn btn-warning btn-lg">Yes</a>
      	<a href="" data-dismiss="modal" class="btn btn-default btn-lg">No</a>
      </div>
    </div>
  </div>
</div>      