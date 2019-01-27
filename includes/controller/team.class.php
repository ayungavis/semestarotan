<?php 
	
	require_once('crud.class.php');

	class Team extends Crud
	{
		protected $table = 'team';

		protected $pk = 'id';	
	}

?>