<?php 
	require_once('../includes/functions.php');
	require_once('../includes/auth.php');

	require_once('../includes/controller/user.class.php');
	require_once('../includes/controller/product.class.php');
	require_once('../includes/controller/category.class.php');
	require_once('../includes/controller/team.class.php');

	$user = new User();
	$product = new Product();
	$category = new Category();
	$team = new Team();

	$product_link = './product?action=list';
	$category_link = './product?action=category';
	$team_link = './team?action=list';
	$user_link = './user?action=list';

	$action = $_GET['get'];

	if ($action == 'category') {
		$category->id = $_GET['id'];
		$delete = $category->delete();

		if ($delete) {
			$_SESSION['information'] = 'Kategori berhasil dihapus.';
			header('Location: '.$category_link);
			die();
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
			header('Location: '.$category_link);
			die();
		}
	}

	else if ($action == 'product') {
		$product->id = $_GET['id'];
		$delete = $product->delete();

		if ($delete) {
			$_SESSION['information'] = 'Produk berhasil dihapus.';
			header('Location: '.$product_link);
			die();
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
			header('Location: '.$product_link);
			die();
		}
	}

	else if ($action == 'team') {
		$team->id = $_GET['id'];
		$delete = $team->delete();

		if ($delete) {
			$_SESSION['information'] = 'Tim berhasil dihapus.';
			header('Location: '.$team_link);
			die();
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
			header('Location: '.$team_link);
			die();
		}
	}

	else if ($action == 'user') {
		$user->id = $_GET['id'];
		$delete = $user->delete();

		if ($delete) {
			$_SESSION['information'] = 'Pengguna berhasil dihapus.';
			header('Location: '.$user_link);
			die();
		}
		else {
			$_SESSION['error'] = 'Maaf, terjadi kesalahan sistem.';
			header('Location: '.$user_link);
			die();
		}
	}
?>