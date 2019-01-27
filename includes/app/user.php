<?php 

	require_once('../controller/user.class.php');
	require_once('../functions.php');

	$user = new User();

	// GET ACTION PROCESS
	$action = $_POST["user"];

	$dashboard = '../../user';
	$create = '../../user/user?action=create';
	$list = '../../user/user?action=list';
	$profile = '../../user/profile';

	if ($action == 'new') {
		$id		 	= $_POST['id'];
		$name 		= $_POST['name'];
		$facebook	= $_POST['facebook'];
		$twitter	= $_POST['twitter'];
		$linkedin	= $_POST['linkedin'];

		// PHOTO
		$file_name	= $_FILES['photo']['name'];
		$file_size 	= $_FILES['photo']['size'];
		$file_tmp 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $file_name);
		$file_ext	= strtolower(end($x));
		$location 	= "../../upload/profile/";
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
				header("Location: ".$dashboard);
				die();
			}
		}
		else {
			$_SESSION['error'] = 'Format file harus .png, .jpg, .gif!';
			header('Location: '.$dashboard);
			die();
		}

		if ($success) {
			$user = new User(array(
				"id" 			=> $id,
				"name"			=> "$name",
				"new"			=> 0,
				"photo"			=> "$new_name",
				"facebook"		=> "$facebook",
				"twitter"		=> "$twitter",
				"linkedin"		=> "$linkedin",
				"updated_by"	=> $id,
				"updated_date"	=> get_date()
			));

			$update = $user->save();

			if ($update) {
				header('Location: '.$dashboard);
				die();
			}
			else {
				$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
				header('Location: '.$dashboard);
				die();
			}
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
			header('Location: '.$dashboard);
			die();
		}
	}

	else if ($action == 'create') {
		$name 		= $_POST['name'];
		$username 	= $_POST['username'];
		$password	= $_POST['password'];
		$email 		= $_POST['email'];
		$level 		= $_POST['level'];
		$facebook 	= $_POST['facebook'];
		$twitter	= $_POST['twitter'];
		$linkedin	= $_POST['linkedin'];

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$user_id	= $_POST['user_id'];

		$user->username = $username;
		$get = $user->search();

		if ($get) {
			$_SESSION['error'] = "Nama pengguna sudah ada, silahkan coba yang lain.";
			header('Location: '.$create);
			die();
		}

		$user = new User(array(
			"name"			=> "$name",
			"username"		=> "$username",
			"password"		=> "$hashed_password",
			"email"			=> "$email",
			"level"			=> "$level",
			"active"		=> 1,
			"new"			=> 1,
			"twitter"		=> "$twitter",
			"facebook"		=> "$facebook",
			"linkedin"		=> "$linkedin",
			"created_by"	=> $user_id,
			"created_date"	=> get_date()
		));

		$create = $user->create();

		if ($create) {
			$_SESSION['information'] = 'Selamat! Pengguna <strong>'. $username .'</strong> telah berhasil dibuat. (Sandi: '. $password .')';
			header('Location: '.$list);
			die();
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi keasalahan sistem.';
			header('Location: '.$create);
			die();
		}
	}

	else if ($action == 'setting') {
		$id		 	= $_POST['id'];
		$name 		= $_POST['name'];
		$email		= $_POST['email'];
		$facebook	= $_POST['facebook'];
		$twitter	= $_POST['twitter'];
		$linkedin	= $_POST['linkedin'];

		$user = new User(array(
			"id" 			=> $id,
			"name"			=> "$name",
			"facebook"		=> "$facebook",
			"twitter"		=> "$twitter",
			"linkedin"		=> "$linkedin",
			"updated_by"	=> $id,
			"updated_date"	=> get_date()
		));

		$update = $user->save();

		if ($update) {
			$_SESSION['information'] = 'Profil Anda berhasil disimpan.';
			header('Location: '.$profile);
			die();
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
			header('Location: '.$profile);
			die();
		}
	}

	else if ($action == 'change-photo') {
		$id 		= $_POST['id'];

		$user->id 	= $id;
		$user->find();

		// PHOTO
		$file_name	= $_FILES['photo']['name'];
		$file_size 	= $_FILES['photo']['size'];
		$file_tmp 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $file_name);
		$file_ext	= strtolower(end($x));
		$location 	= "../../upload/profile/";
		$max_size 	= 1048576; // 1 MB

		$new_name	= $id.'.'.$file_ext;

		if (file_exists($location.$user->photo)) {
			unlink($location.$user->photo);
		}

		if (in_array($file_ext, $allow_ext) === true) {
			if($file_size < $max_size) {
				move_uploaded_file($file_tmp, $location.$new_name);
				$success = true;
			}
			else {
				$_SESSION['error'] = 'Ukuran file terlalu besar.';
				header("Location: ".$profile);
				die();
			}
		}
		else {
			$_SESSION['error'] = 'Format file harus .png, .jpg, .gif!';
			header('Location: '.$profile);
			die();
		}

		if ($success) {
			$user = new User(array(
				"id"			=> $id,
				"photo"			=> "$new_name",
				"updated_by"	=> $id,
				"updated_date"	=> get_date()
			));

			$update = $user->save();

			if ($update) {
				$_SESSION['information'] = 'Foto profil berhasil diubah.';
				header('Location: '.$profile);
				die();
			}
			else {
				$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
				header('Location: '.$profile);
				die();
			}
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
			header('Location: '.$profile);
			die();
		}
	}

	else if ($action == 'change-password') {
		$id 			= $_POST['id'];
		$old_pass		= $_POST['old-password'];
		$new_pass  		= $_POST['new-password'];
		$confirm_pass	= $_POST['confirm-password'];

		$user->id = $id;
		$user->find();

		$error = 0;

		if (!password_verify($old_pass, $user->password)) {
			$_SESSION['error'] = 'Sandi saat ini salah, coba ulangi lagi.';
			$error++;
		}

		if ($new_pass != $confirm_pass) {
			$_SESSION['error'] = 'Konfirmasi sandi salah, coba ulangi lagi.';
			$error++;
		}

		if ($error == 0) {
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			$user = new User(array(
				"id"			=> $id,
				"password"		=> "$hashed_password",
				"updated_by"	=> $id,
				"updated_date"	=> get_date()
			));

			$update = $user->save();

			if ($update) {
				$_SESSION['information'] = 'Kata sandi berhasil diubah. (Sandi baru: '. $new_pass .')';
				header('Location: '.$profile);
				die();
			}
			else {
				$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
				header('Location: '.$profile);
				die();
			}
		}
		else {
			header('Location: '.$profile);
			die();
		}
	}

	else if ($action == 'edit') {
		if ($_POST['password'] != null) {
			$id 		= $_POST['id'];
			$name 		= $_POST['name'];
			$password	= $_POST['password'];
			$email 		= $_POST['email'];
			$level 		= $_POST['level'];
			$facebook 	= $_POST['facebook'];
			$twitter	= $_POST['twitter'];
			$linkedin	= $_POST['linkedin'];

			$hashed_password = password_hash($password, PASSWORD_DEFAULT);

			$user_id	= $_POST['user_id'];

			$user->username = $username;
			$get = $user->search();

			if ($get) {
				$_SESSION['error'] = "Nama pengguna sudah ada, silahkan coba yang lain.";
				header('Location: '.$create);
				die();
			}

			$user = new User(array(
				"id"			=> $id,
				"name"			=> "$name",
				"password"		=> "$hashed_password",
				"email"			=> "$email",
				"level"			=> "$level",
				"twitter"		=> "$twitter",
				"facebook"		=> "$facebook",
				"linkedin"		=> "$linkedin",
				"updated_by"	=> $user_id,
				"updated_date"	=> get_date()
			));

			$update = $user->save();

			if ($update) {
				$_SESSION['information'] = 'Data pengguna berhasil disimpan.';
				header('Location: '.$list);
				die();
			}
			else {
				$_SESSION['error'] = 'Maaf, terjadi keasalahan sistem.';
				header('Location: '.$list);
				die();
			}
		}
		else {
			$id 		= $_POST['id'];
			$name 		= $_POST['name'];
			$email 		= $_POST['email'];
			$level 		= $_POST['level'];
			$facebook 	= $_POST['facebook'];
			$twitter	= $_POST['twitter'];
			$linkedin	= $_POST['linkedin'];

			$user_id	= $_POST['user_id'];

			$user->username = $username;
			$get = $user->search();

			if ($get) {
				$_SESSION['error'] = "Nama pengguna sudah ada, silahkan coba yang lain.";
				header('Location: '.$list);
				die();
			}

			$user = new User(array(
				"id"			=> $id,
				"name"			=> "$name",
				"email"			=> "$email",
				"level"			=> "$level",
				"twitter"		=> "$twitter",
				"facebook"		=> "$facebook",
				"linkedin"		=> "$linkedin",
				"updated_by"	=> $user_id,
				"updated_date"	=> get_date()
			));

			$update = $user->save();

			if ($update) {
				$_SESSION['information'] = 'Data pengguna berhasil disimpan.';
				header('Location: '.$list);
				die();
			}
			else {
				$_SESSION['error'] = 'Maaf, terjadi keasalahan sistem.';
				header('Location: '.$list);
				die();
			}
		}
	}
?>