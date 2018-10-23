<?php
	include "config.php";

	if (isset($_GET['res_id'])) {
		$update_query = $conn->query("update reservation_tbl set res_status = 'On Use' where res_id = '".$_GET['res_id']."'");
		$res_query = $conn->query("select * from reservation_tbl inner join room_tbl on reservation_tbl.room_id=room_tbl.room_id inner join costumer_tbl on reservation_tbl.cos_id=costumer_tbl.cos_id where res_id = '".$_GET['res_id']."'");
		$res_row = $res_query->fetch();
		$update_query2 =  $conn->query("update room_tbl set room_status = 'On Use' where room_id = '".$res_row['room_id']."'");

		if ($update_query && $update_query2) {
			$message = "Reservation has been accepted. ".$res_row['room_name']." is ready to use.";
			header("location: ../admin/admin-reservations.php?message=$message");
		}
		else {
			$message = "Failed to accept reservation. Please try again.";
			header("location: ../admin-reservations.php?message=$message");
		}
	}
?>