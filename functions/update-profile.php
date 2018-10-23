<?php
	include "config.php";

	if (isset($_POST['update-profile'])) {
		if (!empty($_FILES['profile-picture']['name'])) {
			$file_loc = "../uploads/";
			$file_loc2 = "uploads/";
			$file_name = $_FILES['profile-picture']['name'];
			$file_target = $file_loc . basename($_FILES['profile-picture']['name']);	
			$file_target2 = $file_loc2 . basename($_FILES['profile-picture']['name']);	
			$file_type = pathinfo($file_target, PATHINFO_EXTENSION);

			if (move_uploaded_file($_FILES['profile-picture']['tmp_name'], $file_target)) {
				$cos_query = $conn->query("select * from costumer_tbl where cos_id = '".$_POST['cos_id']."'");
				$cos_row = $cos_query->fetch();
				
				unlink($cos_row['costumer_img']);
				$update_query = $conn->query("update costumer_tbl set email = '".$_POST['email']."', password = '".$_POST['password']."', firstname = '".$_POST['firstname']."', lastname = '".$_POST['lastname']."', gender = '".$_POST['gender']."', address = '".$_POST['address']."', costumer_img = '$file_target2' where cos_id = '".$_POST['cos_id']."'");

				if ($update_query) {
					$message = "Your profile and profile picture has been updated.";
					header("location: ../profile.php?message=$message");
				}
				else {
					$message = "Updating of profile failed. Please try again.";
					header("location: ../profile.php?message=$message");
				}	
			}
			else {
				$message = "Moving of file failed. Please try again.";
				header("location: ../profile.php?message=$message");
			}
		}
		else if (empty($_FILES['profile-picture']['name'])) {
			$update_query = $conn->query("update costumer_tbl set email = '".$_POST['email']."', password = '".$_POST['password']."', firstname = '".$_POST['firstname']."', lastname = '".$_POST['lastname']."', gender = '".$_POST['gender']."', address = '".$_POST['address']."' where cos_id = '".$_POST['cos_id']."'");

			if ($update_query) {
				$message = "Your profile has been updated.";
				header("location: ../profile.php?message=$message");
			}
			else {
				$message = "Updating of profile failed. Please try again.";
				header("location: ../profile.php?message=$message");
			}
		}
	}
?>