<?php
	include "config.php";

	if (isset($_GET['res_id'])) {
		$res_query = $conn->query("select * from reservation_tbl inner join room_tbl on reservation_tbl.room_id=room_tbl.room_id where res_id = '".$_GET['res_id']."'");
		$res_row = $res_query->fetch();

		$update_query =  $conn->query("update room_tbl set room_status = 'Available' where room_id = '".$res_row['room_id']."'");
		$delete_query = $conn->query("delete from reservation_tbl where res_id = '".$_GET['res_id']."'");

		if ($update_query && $delete_query) {
			$message = "Reservation has been canceled. ".$res_row['room_name']." is available for reservation again.";
			header("location: ../admin/admin-reservations.php?message=$message");
		}
		else {
			$message = "Failed to cancel reservation. Please try again.";
			header("location: ../admin/admin-reservations.php?message=$message");
		}
	}
?>