<?php
	include "config.php";
	include "account-session.php";

	if (isset($_POST['submit-reserve'])) {
		$room_query = $conn->query("select * from room_tbl where room_id = '".$_POST['room_id']."'");
		$room_row = $room_query->fetch();

		$today = date("Y-m-d");

		if ($_POST['check_in'] >= $today) {
			$check_in = strtotime($_POST['check_in']);
			$check_out = strtotime($_POST['check_out']);
			$days_between = ceil(abs($check_out - $check_in) / 86400);
			$total_payment = $room_row['room_price'] * $days_between;
			$res_status = "Pending";
			$save_query = $conn->query("insert into reservation_tbl (room_id, cos_id, check_in, check_out, total_payment, res_remarks, res_status)values('".$_POST['room_id']."', '".$cos_row['cos_id']."', '".$_POST['check_in']."', '".$_POST['check_out']."', '".$total_payment."', '".$_POST['remarks']."', '$res_status')");
			$update_query = $conn->query("update room_tbl set room_status = 'Pending' where room_id = '".$room_row['room_id']."'");

			if ($save_query && $update_query) {
				$message = "You have successfully reserved room ".$room_row['room_name'].". Check the progress of reservation in reservation page.";
				header("location: ../reserve.php?message=$message");
			}
			else {
				$message = "Failed to reserved room ".$room_row['room_name'].". Please try again.";
				header("location: ../reserve.php?message=$message");
			}
		}
		else if ($_POST['check_in'] < $today) {
			$message = "Please select the check in date before the current date.";
			header("location: ../reserve.php?message=$message");
		}
	}
?>