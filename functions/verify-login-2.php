<?php
	include "config.php";

	if (isset($_POST['submit-login'])) {
		$chk_acc_query = $conn->query("select * from admin_tbl where username = '".$_POST['username']."' and password = '".$_POST['password']."'");
		$chk_acc_row = $chk_acc_query->fetch();

		if ($chk_acc_row['username'] == $_POST['username'] && $chk_acc_row['password'] == $_POST['password']) {
			session_start();
			$_SESSION['admin_id'] = $chk_acc_row['admin_id']; 
			$_SESSION['username'] = $chk_acc_row['username']; 
			$_SESSION['firstname'] = $chk_acc_row['firstname']; 
			$_SESSION['lastname'] = $chk_acc_row['lastname'];
			header("location: ../admin/admin-home.php");
		}
		else if ($chk_acc_row['username'] != $_POST['username'] && $chk_acc_row['password'] == $_POST['password']) {
			$message = "Username entry incorrect. Please try again.";
			header("location: ../admin/admin-login.php?message=$message");	
		}
		else if ($chk_acc_row['username'] == $_POST['username'] && $chk_acc_row['password'] != $_POST['password']) {
			$message = "Password entry incorrect. Please try again.";
			header("location: ../admin/admin-login.php?message=$message");
		}
		else {
			$message = "Account entry incorrect. Please try again.";
			header("location: ../admin/admin-login.php?message=$message");
		}
	}
?>