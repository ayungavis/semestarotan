<?php require_once('../includes/functions.php'); ?>
<?php require_once('../includes/auth.php'); ?>

<?php require_once('../includes/controller/user.class.php'); ?>
<?php require_once('../includes/controller/product.class.php'); ?>
<?php require_once('../includes/controller/category.class.php'); ?>
<?php require_once('../includes/controller/team.class.php'); ?>

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
			if ($user->new) include('new.php');
			else include('dashboard.php');
		 ?>

		<?php require_once('pages/footer.php'); ?>

	</main>

	<?php require_once('pages/script.php'); ?>

</body>
</html>