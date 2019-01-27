<?php 

	require_once('functions.php');
	if (!isset($_SESSION['auth'])) header('Location: ../user/auth/login'); 

?>