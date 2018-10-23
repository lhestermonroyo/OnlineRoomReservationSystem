<?php
	include "config.php";

	if (isset($_POST['update-account'])) {
		$update_query = $conn->query("update admin_tbl set username = '".$_POST['username']."' and password = '".$_POST['password']."'and firstname = '".$_POST['firstname']."' and lastname = '".$_POST['lastname']."' where admin_id = '".$_POST['admin_id']."'");

		if ($update_query) {
			$message = "Account has been updated.";
			header("location: ".$_POST['url']."?message=$message");
		}
		else {
			$message = "Failed to update account. Please try again.";
			header("location: ".$_POST['url']."?message=$message");
		}
	}
?>