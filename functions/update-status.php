<?php
	include "config.php";

	if (isset($_GET['res_id'])) {
		$res_query = $conn->query("select * from reservation_tbl inner join room_tbl on reservation_tbl.room_id=room_tbl.room_id inner join costumer_tbl on reservation_tbl.cos_id=costumer_tbl.cos_id where res_id = '".$_GET['res_id']."'");
		$res_row = $res_query->fetch();
		$today = date("Y-m-d");

		if ($today == $res_row['check_out']) {
			$update_query = $conn->query("update reservation_tbl set res_status = 'Finished' where res_id = '".$_GET['res_id']."'");
			$update_query2 = $conn->query("update room_tbl set room_status = 'Available' where room_id = '".$res_row['room_id']."'");

			if ($update_query && $update_query2) {
				echo $res_row['res_status'];	
			}
			else {
				echo "Error";
			}
		}
		else {
			echo $res_row['res_status'];
		}
	}
?>