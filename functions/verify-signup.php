<?php
	include "config.php";

	if (isset($_POST['submit-signup'])) {
		$chk_email_query = $conn->query("select * from costumer_tbl where email = '".$_POST['email']."'");
		$chk_email_row = $chk_email_query->fetch();

		if ($_POST['email'] != $chk_email_row['email']) {
			$costumer_img = "uploads/default.png";
			$save_query = $conn->query("insert into costumer_tbl (email, password, firstname, lastname, gender, address, costumer_img)values('".$_POST['email']."', '".$_POST['password']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['gender']."', '".$_POST['address']."', '$costumer_img')");

			if ($save_query) {
				$message = "You have been signed up successfully. You can now log in using your e-mail and password.";
				header("location: ../signup.php?message=$message");	
			}
			else {
				$message = "Sign up failed. Please try again.";
				header("location: ../signup.php?message=$message");	
			}
		}
		else {
			$message = "E-mail already used in the system. Please try again.";
			header("location: ../signup.php?message=$message");	
		}
	}
?>