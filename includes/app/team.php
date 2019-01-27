<?php 
	require_once('../controller/team.class.php');
	require_once('../functions.php');

	$team = new Team();

	// GET ACTION PROCESS
	$action = $_POST["team"];

	$create = '../../user/team?action=create';
	$list = '../../user/team?action=list';

	if ($action == 'create') {
		$id 		= $team->max('id')+1;
		$name 		= $_POST['name'];
		$job		= $_POST['job'];
		$facebook	= $_POST['facebook'];
		$twitter	= $_POST['twitter'];
		$linkedin	= $_POST['linkedin'];

		$user_id	= $_POST['user_id'];

		// PHOTO
		$file_name	= $_FILES['photo']['name'];
		$file_size 	= $_FILES['photo']['size'];
		$file_tmp 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $file_name);
		$file_ext	= strtolower(end($x));
		$location 	= "../../upload/team/";
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
			$team = new Team(array(
				"name"			=> "$name",
				"job"			=> "$job",
				"photo"			=> "$new_name",
				"facebook"		=> "$facebook",
				"twitter"		=> "$twitter",
				"linkedin"		=> "$linkedin",
				"created_by"	=> $user_id,
				"created_date"	=> get_date()
			));

			$create = $team->create();

			if ($create) {
				$_SESSION['information'] = 'Selamat! Tim telah dibuat.';
				header('Location: '.$list);
				die();
			}
			else {
				$_SESSION['error'] = 'Maaf, terjadi keasalah sistem.';
				header('Location: '.$create);
				die();
			}
		}
	}

	else if ($action == 'edit') {
		$id 		= $_POST['id'];
		$name 		= $_POST['name'];
		$job		= $_POST['job'];
		$facebook	= $_POST['facebook'];
		$twitter	= $_POST['twitter'];
		$linkedin	= $_POST['linkedin'];

		$user_id	= $_POST['user_id'];
		
		$team = new Team(array(
			"id"			=> $id,
			"name"			=> "$name",
			"job"			=> "$job",
			"facebook"		=> "$facebook",
			"twitter"		=> "$twitter",
			"linkedin"		=> "$linkedin",
			"updated_by"	=> $user_id,
			"updated_date"	=> get_date()
		));

		$update = $team->save();

		if ($update) {
			$_SESSION['information'] = 'Data berhasil disimpan.';
			header('Location: '.$list);
			die();
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi keasalah sistem.';
			header('Location: '.$list);
			die();
		}
	}

	else if ($action == 'change-photo') {
		$id 		= $_POST['id'];
		$user_id	= $_POST['user_id'];

		$team->id 	= $id;
		$team->find();

		// PHOTO
		$file_name	= $_FILES['photo']['name'];
		$file_size 	= $_FILES['photo']['size'];
		$file_tmp 	= $_FILES['photo']['tmp_name'];
		$allow_ext	= array('png', 'jpg', 'jpeg', 'gif');
		$x			= explode('.', $file_name);
		$file_ext	= strtolower(end($x));
		$location 	= "../../upload/team/";
		$max_size 	= 1048576; // 1 MB

		$new_name	= $id.'.'.$file_ext;

		if (file_exists($location.$team->photo)) {
			unlink($location.$team->photo);
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
			$team = new Team(array(
				"id" 			=> $id,
				"photo"			=> "$new_name",
				"updated_by"	=> $user_id,
				"updated_date" 	=> get_date()
			));

			$update = $team->save();

			if ($update) {
				$_SESSION['information'] = 'Foto berhasil dirubah.';
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