<?php
	include "config.php";

	if (isset($_GET['room_id'])) {
		$room_query = $conn->query("select * from room_tbl where room_id = '".$_GET['room_id']."'");
		$room_row = $room_query->fetch();
		
		unlink($room_row['room_photo']);
		$delete_query = $conn->query("delete from room_tbl where room_id = '".$_GET['room_id']."'");

		if ($delete_query) {
			$message = "Room has been deleted.";
			header("location: ../admin/admin-roommanager.php?message=$message");
		}
		else {
			$message = "Deleting of room failed. Please try again.";
			header("location: ../admin/admin-roommanager.php?message=$message");
		}
	}
?>