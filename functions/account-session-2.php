<?php
	include "config.php";

	session_start();
	$admin_id = $_SESSION['admin_id'];
	$username = $_SESSION['username'];
	$firstname = $_SESSION['firstname'];
	$lastname = $_SESSION['lastname'];

	if (empty($admin_id) && empty($username) && empty($firstname) && empty($lastname)) {
		header("location: login.php");
	}
	else {
		$admin_query = $conn->query("select * from admin_tbl where admin_id = '$admin_id'");
		$admin_row = $admin_query->fetch();
	}
?>