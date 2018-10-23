<div id="cancel-request<?=$res_row['res_id'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
      	<p>Are you sure you want to cancel this reservation?</p>
      	<a href="functions/cancel-reservation-2.php?res_id=<?=$res_row['res_id'];?>" class="btn btn-warning btn-lg">Yes</a>
      	<a href="" data-dismiss="modal" class="btn btn-default btn-lg">No</a>
      </div>
    </div>
  </div>
</div>      