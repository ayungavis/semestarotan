<?php require_once('../includes/functions.php'); ?>
<?php require_once('../includes/auth.php'); ?>

<?php if (isset($_SESSION['level']) && $_SESSION['level'] != 'admin') header('Location: ./index') ?>

<?php require_once('../includes/controller/user.class.php'); ?>

<?php 
	$user = new User();
	$user->id = $_SESSION['user_id'];
	$user->find();
?>

<?php require_once('pages/header-start.php'); ?>
<?php require_once('pages/stylesheet.php'); ?>
<?php require_once('pages/favicon.php'); ?>
<?php require_once('pages/header-end.php'); ?>

<body class="topbar-unfix">

	<?php require_once('pages/topbar.php'); ?>

	<!-- Main container -->
	<main>

		<?php 
			switch ($_GET['action']) {
				case 'create':
					include('user-create.php');
					break;
				case 'list':
					include('user-list.php');
					break;
				default:
					header('Location: ./index');
					break;
			}
		 ?>

		<?php require_once('pages/footer.php'); ?>

	</main>

	<?php require_once('pages/script.php'); ?>

</body>
</html>