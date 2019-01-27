<?php 
	require_once('../controller/product.class.php');
	require_once('../functions.php');

	$product = new Product();

	$create = '../../user/product?action=create';
	$list = '../../user/product?action=list';

	$action = $_POST['product'];

	if ($action == 'create') {
		$id 			= $product->max('id')+1;
		$title 			= $_POST['title'];
		$description	= $_POST['description'];
		$category		= $_POST['category'];
		$price 			= $_POST['price'];

		$user_id		= $_POST['user_id'];

		// PHOTO
		$file_name	= $_FILES['photo']['name'];
		$file_size 	= $_FILES['photo']['size'];
		$file_tmp 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $file_name);
		$file_ext	= strtolower(end($x));
		$location 	= "../../upload/product/";
		$max_size 	= 1048576; // 1 MB

		$new_name	= $id.'.'.$file_ext;

		if (file_exists($location.$new_name)) {
			unlink($location.$new_name);
		}

		if (in_array($file_ext, $allow_ext) === true) {
			if($file_size < $max_size) {
				move_uploaded_file($file_tmp, $location.$new_name);
				$success = true;
			}
			else {
				$_SESSION['error'] = 'Ukuran file terlalu besar.';
				header("Location: ".$create);
				die();
			}
		}
		else {
			$_SESSION['error'] = 'Format file harus .png, .jpg, .gif!';
			header('Location: '.$create);
			die();
		}

		if ($success) {
			$product = new Product(array(
				"title"			=> "$title",
				"description"	=> "$description",
				"category"		=> $category,
				"price"			=> $price,
				"photo"			=> "$new_name",
				"active"		=> 1,
				"created_by"	=> $user_id,
				"created_date"	=> get_date()
			));

			$create = $product->create();

			if ($create) {
				$_SESSION['information'] = 'Selamat! Produk Anda telah berhasil dibuat.';
				header('Location: '.$list);
				die();
			}
			else {
				$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
				header('Location: '.$create);
				die();
			}
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
			header('Location: '.$create);
			die();
		}
	}

	else if ($action == 'edit') {
		$id 			= $_POST['id'];
		$title 			= $_POST['title'];
		$description	= $_POST['description'];
		$category		= $_POST['category'];
		$price 			= $_POST['price'];

		$user_id		= $_POST['user_id'];

		$product 		= new Product(array(
			"id" 			=> $id,
			"title"			=> "$title",
			"description"	=> "$description",
			"category"		=> $category,
			"price"			=> $price,
			"updated_by"	=> $user_id,
			"updated_date"	=> get_date()
		));

		$update = $product->save();

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

	else if ($action == 'change-photo') {
		$id 		= $_POST['id'];
		$user_id 	= $_POST['user_id'];

		$product->id = $id;
		$product->find();

		// PHOTO
		$file_name	= $_FILES['photo']['name'];
		$file_size 	= $_FILES['photo']['size'];
		$file_tmp 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $file_name);
		$file_ext	= strtolower(end($x));
		$location 	= "../../upload/product/";
		$max_size 	= 1048576; // 1 MB

		$new_name	= $id.'.'.$file_ext;

		if (file_exists($location.$product->photo)) {
			unlink($location.$product->photo);
		}

		if (in_array($file_ext, $allow_ext) === true) {
			if($file_size < $max_size) {
				move_uploaded_file($file_tmp, $location.$new_name);
				$success = true;
			}
			else {
				$_SESSION['error'] = 'Ukuran file terlalu besar.';
				header("Location: ".$list);
				die();
			}
		}
		else {
			$_SESSION['error'] = 'Format file harus .png, .jpg, .gif!';
			header('Location: '.$list);
			die();
		}

		if ($success) {
			$product = new Product(array(
				"id" 			=> $id,
				"photo"			=> "$new_name",
				"updated_by"	=> $user_id,
				"updated_date"	=> get_date()
			));

			$update = $product->save();

			if ($update) {
				$_SESSION['information'] = 'Foto berhasil diubah.';
				header('Location: '.$list);
				die();
			}
			else {
				$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
				header('Location: '.$list);
				die();
			}
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
			header('Location: '.$list);
			die();
		}
	}
?>