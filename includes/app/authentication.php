<?php 

	require_once('../controller/user.class.php');
	require_once('../functions.php');

	$user = new User();

	$panel = '../../user';
	$login = '../../user/auth/login';
	$register = '../../user/auth/register';

	// GET ACTION PROCESS
	$auth = $_POST["auth"];	

	if ($auth == 'login') {
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];

		$error 		= 0;

		if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
			$_SESSION['error'] = "Nama pengguna hanya bisa terdiri dari huruf dan angka.";
			header('Location: '.$login);
			die();
		}

		$user->username = $username;
		$get = $user->search();

		if ($get) {
			foreach ($get as $row) {
				$user_id 			= $row['id'];
				$level				= $row['level'];
				$hashed_password 	= $row['password'];
			}
			if (password_verify($password, $hashed_password)) {
				$_SESSION['auth'] = true;
				$_SESSION['user_id'] = $user_id;
				$_SESSION['level'] = $level;
				header('Location: '.$panel);
				die();
			}
			else {
				$_SESSION['error'] = "Kata sandi salah.";
				header('Location: '.$login);
				die();
			}
		}
		else {
			$_SESSION['error'] = "Nama pengguna tidak ditemukan.";
			header('Location: '.$login);
			die();
		}

	}

	else if ($auth == 'register') {
		$username 	= $_POST['username'];
		$email		= $_POST['email'];
		$password	= $_POST['password'];
		$confirm	= $_POST['confirm'];
		$level		= 'user';

		$error 		= 0;

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
			$_SESSION['error'] = "Nama pengguna hanya bisa terdiri dari huruf dan angka.";
			$error++;
		}

		if ($password != $confirm) {
			$_SESSION['error'] = "Kata sandi tidak sama dengan konfirmasi.";
			$error++;
		}

		$user->username = $username;
		$get = $user->search();

		if ($get) {
			$_SESSION['error'] = "Nama pengguna sudah ada, silahkan coba yang lain.";
			$error++;
		}

		if ($error == 0) {	
			$user = new User(array(
				"username" 		=> "$username",
				"email" 		=> "$email",
				"password" 		=> "$hashed_password",
				"level" 		=> "$level",
				"active"		=> 1,
				"new"			=> 1,
				"created_date"	=> get_date()
			));

			$create = $user->create();

			if ($create) {
				$_SESSION['auth'] = true;
				$_SESSION['user_id'] = $user->max('id');
				$_SESSION['level'] = $level;
				$_SESSION['information'] = "Selamat! Akun Anda telah berhasil dibuat.";
				header('Location: '.$panel);
				die();
			}
			else {
				$_SESSION['error'] = "Maaf, terjadi keasalahan sistem.";
				header('Location: '.$register);
				die();
			}
		}
		else {
			header('Location: '.$register);
			die();
		}
	}
?>