<?php 
	require_once('functions.php');
	if (isset($_SESSION['level']) && $_SESSION['level'] != 'admin') header('Location: ../user/index'); 
?>