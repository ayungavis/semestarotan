<?php 
	require_once('../controller/category.class.php');
	require_once('../functions.php');

	$category = new Category();

	$base = '../../user/product?action=category';

	$action = $_POST['category'];

	if ($action == 'create') {
		$name 		= $_POST['name'];
		$slug		= $_POST['slug'];

		$user_id 	= $_POST['user_id'];

		$category 	= new Category(array(
			"name"			=> "$name",
			"slug"			=> "$slug",
			"active"		=> 1,
			"created_by"	=> $user_id,
			"created_date"	=> get_date()
		));

		$create 	= $category->create();

		if ($create) {
			$_SESSION['information'] = 'Selamat! Kategori Anda telah berhasil dibuat.';
			header('Location: '.$base);
			die();
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
			header('Location: '.$base);
			die();
		}
	}

	else if ($action == 'edit') {
		$id 		= $_POST['id'];
		$name 		= $_POST['name'];
		$slug	 	= $_POST['slug'];

		$user_id 	= $_POST['user_id'];

		$category 	= new Category(array(
			"id" 			=> $id,
			"name"			=> "$name",
			"slug"			=> "$slug",
			"updated_by"	=> $user_id,
			"upated_date"	=> get_date()
		));

		$update = $category->save();

		if ($update) {
			$_SESSION['information'] = 'Data berhasil disimpan.';
			header('Location: '.$list);
			die();
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
			header('Location: '.$list);
			die();
		}
	}
?>