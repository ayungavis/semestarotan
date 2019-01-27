<?php 
	require_once('../../includes/controller/user.class.php');

	$user = new User();
	$user->id = '1';
	$user->find();

	echo $user->username;
	echo $user->email;
?>