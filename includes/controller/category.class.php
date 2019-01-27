<?php 
	
	require_once('crud.class.php');

	class Category extends Crud
	{
		protected $table = 'category';

		protected $pk = 'id';	
	}

?>