<?php
	include "config.php";

	if (isset($_POST['submit-room'])) {
		if (!empty($_FILES['room_photo']['name'])) {
			$file_loc = "../uploads/";
			$file_name = $_FILES['room_photo']['name'];
			$file_target = $file_loc . basename($_FILES['room_photo']['name']);	
			$file_type = pathinfo($file_target, PATHINFO_EXTENSION);

			if (move_uploaded_file($_FILES['room_photo']['tmp_name'], $file_target)) {
				$room_query = $conn->query("select * from room_tbl where room_id = '".$_POST['room_id']."'");
				$room_row = $room_query->fetch();
				
				unlink($room_row['room_photo']);
				$update_query = $conn->query("update room_tbl set room_name = '".$_POST['room_name']."', room_description = '".$_POST['room_description']."', room_type = '".$_POST['room_type']."', room_capacity = '".$_POST['room_capacity']."', room_price = '".$_POST['room_price']."', room_photo = '$file_target' where room_id = '".$_POST['room_id']."'");

				if ($update_query) {
					$message = "Room has been updated.";
					header("location: ../admin/admin-roommanager.php?message=$message");
				}
				else {
					$message = "Updating of room failed. Please try again.";
					header("location: ../admin/admin-roommanager.php?message=$message");
				}
			}
		}
		else if (empty($_FILES['room_photo']['name'])) {
			$update_query = $conn->query("update room_tbl set room_name = '".$_POST['room_name']."', room_description = '".$_POST['room_description']."', room_type = '".$_POST['room_type']."', room_capacity = '".$_POST['room_capacity']."', room_price = '".$_POST['room_price']."' where room_id = '".$_POST['room_id']."'");

			if ($update_query) {
				$message = "Room has been updated.";
				header("location: ../admin/admin-roommanager.php?message=$message");
			}
			else {
				$message = "Updating of room failed. Please try again.";
				header("location: ../admin/admin-roommanager.php?message=$message");
			}
		}
	}
?>