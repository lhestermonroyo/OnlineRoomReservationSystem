<?php
	include "config.php";

	if (isset($_POST['submit-login'])) {
		$chk_acc_query = $conn->query("select * from costumer_tbl where email = '".$_POST['email']."' and password = '".$_POST['password']."'");
		$chk_acc_row = $chk_acc_query->fetch();

		if ($chk_acc_row['email'] == $_POST['email'] && $chk_acc_row['password'] == $_POST['password']) {
			session_start();
			$_SESSION['cos_id'] = $chk_acc_row['cos_id']; 
			$_SESSION['email'] = $chk_acc_row['email']; 
			$_SESSION['firstname'] = $chk_acc_row['firstname']; 
			$_SESSION['lastname'] = $chk_acc_row['lastname'];
			header("location: ../home.php");
		}
		else if ($chk_acc_row['email'] != $_POST['email'] && $chk_acc_row['password'] == $_POST['password']) {
			$message = "E-mail entry incorrect. Please try again.";
			header("location: ../login.php?message=$message");	
		}
		else if ($chk_acc_row['email'] == $_POST['email'] && $chk_acc_row['password'] != $_POST['password']) {
			$message = "Password entry incorrect. Please try again.";
			header("location: ../login.php?message=$message");
		}
		else {
			$message = "Account entry incorrect. Please try again.";
			header("location: ../login.php?message=$message");
		}
	}
?>