<?php
	include "config.php";

	session_start();
	$cos_id = $_SESSION['cos_id'];
	$email = $_SESSION['email'];
	$firstname = $_SESSION['firstname'];
	$lastname = $_SESSION['lastname'];

	if (empty($cos_id) && empty($email) && empty($firstname) && empty($lastname)) {
		header("location: login.php");
	}
	else {
		$cos_query = $conn->query("select * from costumer_tbl where cos_id = '$cos_id'");
		$cos_row = $cos_query->fetch();
	}
?>