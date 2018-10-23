<?php
	include "config.php";

	if (isset($_POST['submit-room'])) {
		$chk_room_query = $conn->query("select * from room_tbl where room_name = '".$_POST['room_name']."'");
		$chk_room_row = $chk_room_query->fetch();

		if ($chk_room_row['room_name'] != $_POST['room_name']) {
			$file_loc = "../uploads/";
			$file_name = $_FILES['room_photo']['name'];
			$file_target = $file_loc . basename($_FILES['room_photo']['name']);	
			$file_type = pathinfo($file_target, PATHINFO_EXTENSION);

			if (move_uploaded_file($_FILES['room_photo']['tmp_name'], $file_target)) {
				$room_status = "Available";
				$save_query = $conn->query("insert into room_tbl (room_name, room_description, room_type, room_capacity, room_price, room_status, room_photo)values('".$_POST['room_name']."', '".$_POST['room_description']."', '".$_POST['room_type']."', '".$_POST['room_capacity']."', '".$_POST['room_price']."', '$room_status', '$file_target')");

				if ($save_query) {
					$message = "Room has been added.";
					header("location: ../admin/admin-roommanager.php?message=$message");
				}
				else {
					$message = "Saving of room failed. Please try again.";
					header("location: ../admin/admin-roommanager.php?message=$message");
				}
			}
			else {
				$message = "Moving of file failed. Please try again.";
				header("location: ../admin/admin-roommanager.php?message=$message");
			}
		}
		else {
			$message = "Room name already existed. Please try again.";
			header("location: ../admin/admin-roommanager.php?message=$message");
		}
	}
?>