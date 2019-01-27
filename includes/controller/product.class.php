<?php 
	
	require_once('crud.class.php');

	class Product extends Crud
	{
		protected $table = 'product';

		protected $pk = 'id';	
	}

?>