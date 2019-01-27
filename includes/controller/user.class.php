<?php 
	
	require_once('crud.class.php');

	class User extends Crud
	{
		protected $table = 'user';

		protected $pk = 'id';	
	}

?>