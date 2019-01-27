<?php
	require_once("../includes/functions.php");
	unset(
		$_SESSION['auth'],
		$_SESSION['user_id'],
		$_SESSION['level']
	);
	$_SESSION['logout'] = "You have been logged out.";
	header('Location: ../index');
	die();
?>