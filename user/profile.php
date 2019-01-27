<?php require_once('../includes/functions.php'); ?>
<?php require_once('../includes/auth.php'); ?>

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

		<header class="header header-inverse">
			<div class="container">
				<div class="header-info">
					<div class="left">
						<br>
						<h2 class="header-title"><strong>Beranda</strong> <small class="subtitle">Panel beranda merupakan sistem panel yang disediakan untuk pengguna semestarotan.</small></h2>
					</div>
				</div>
			</div>
		</header><!--/.header -->

		<div class="main-content">
			<div class="container">
				<div class="row">

					<div class="col-md-6 col-lg-4">
						<div class="card shadow-1">
						<h5 class="card-title"><strong>Profil</strong></h5>

							<div class="p-30 pt-50 text-center">
								<a class="avatar avatar-xxl status-warning mb-3" href="./profile">
									<img src="../upload/profile/<?php echo $user->photo ?>" alt="...">
								</a>
								<h5><a href="./profile"><?php echo $user->name ?></a></h5>
								<p><small class="fs-13"><?php echo $user->username ?></small></p>
								<div class="gap-items fs-16">
									<a class="text-facebook" href="https://www.facebook.com/<?php echo $user->facebook ?>" target="_blank"><i class="fa fa-facebook"></i></a>
									<a class="text-twitter" href="https://twitter.com/<?php echo $user->twitter ?>" target="_blank"><i class="fa fa-twitter"></i></a>
									<a class="text-linkedin" href="https://www.linkedin.com/in/<?php echo $user->linkedin ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
								</div>
								<br>
								<footer class="card-footer text-center">
									<button class="btn btn-primary" data-toggle="modal" data-target="#change-photo">Ubah Foto</button>
									<button class="btn btn-primary" data-toggle="modal" data-target="#change-password">Ubah Sandi</button>
								</footer>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-8">
						<div class="card shadow-1">
							<div class="card-header">
								<h5 class="card-title"><strong>Ubah </strong> profil</h5>
							</div>

							<div class="card-body">

								<?php if (isset($_SESSION['information'])) { ?>
							        <div class="alert alert-success" role="alert">
						          		<?php echo $_SESSION['information']; ?>
							        </div>
						      	<?php } ?>  

								<?php if (isset($_SESSION['error'])) { ?>
									<div class="alert alert-danger" role="alert">
						          		<?php echo $_SESSION['error']; ?>
							        </div>
								<?php } ?>

								<?php unset($_SESSION['error']); ?>
						      	<?php unset($_SESSION['information']); ?>

								<form action="../includes/app/user.php" method="post" enctype="multipart/form-data">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label required">Nama Lengkap</label>
										<div class="col-sm-10">
											<input class="form-control" type="text" name="name" value="<?php echo $user->name ?>" placeholder="Johan Samuel" autofocus="autofocus" required>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Nama Pengguna</label>
										<div class="col-sm-10">
											<input class="form-control" type="text" name="username" value="<?php echo $user->username ?>" disabled>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label required">Alamat Email</label>
										<div class="col-sm-10">
											<input class="form-control" type="text" name="email" value="<?php echo $user->email ?>" placeholder="johansamuel@mail.com" required>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label required">Facebook</label>
										<div class="col-sm-10">
											<div class="input-group">
												<span class="input-group-addon" id="facebook">facebook.com/</span>
												<input class="form-control" type="text" name="facebook" value="<?php echo $user->facebook ?>" placeholder="username" aria-describedby="facebook" required>
											</div>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label required">Twitter</label>
										<div class="col-sm-10">
											<div class="input-group">
												<span class="input-group-addon" id="twitter">twitter.com/</span>
												<input class="form-control" type="text" name="twitter" value="<?php echo $user->twitter ?>" placeholder="username" aria-describedby="twitter" required>
											</div>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label required">Linkedin</label>
										<div class="col-sm-10">
											<div class="input-group">
												<span class="input-group-addon" id="linkedin">linkedin.com/in/</span>
												<input class="form-control" type="text" name="linkedin" value="<?php echo $user->linkedin ?>" placeholder="username" aria-describedby="linkedin" required>
											</div>
										</div>
									</div>

									<footer class="card-footer text-right">
										<input type="hidden" name="user" value="setting">
										<input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>">
										<button class="btn btn-primary">Simpan</button>
									</footer>
								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<?php require_once('pages/footer.php'); ?>

	</main>

	<!-- Modal -->
	<div class="modal fade" id="change-photo" tabindex="-1">
	  	<div class="modal-dialog">
			<div class="modal-content">
				<form action="../includes/app/user.php" method="post" enctype="multipart/form-data">
			  		<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Ubah Foto</h4>
						<button type="button" class="close" data-dismiss="modal">
				  			<span aria-hidden="true">&times;</span>
						</button>
			  		</div>
			  		<div class="modal-body">
						<input type="file" name="photo" required>
						<br><small><strong>NOTE:</strong> Maximum file size <strong>1MB</strong> and best resolution is <strong>square</strong>.</small>
			  		</div>
			  		<div class="modal-footer">
			  			<input type="hidden" name="user" value="change-photo">
						<input type="hidden" name="id" value="<?php echo $_SESSION['user_id'] ?>">
						<button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-bold btn-pure btn-primary">Unggah</button>
			  		</div>
		  		</form>
			</div>
	  	</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="change-password" tabindex="-1">
	  	<div class="modal-dialog">
			<div class="modal-content">
				<form action="../includes/app/user.php" method="post">
			  		<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Ubah Kata Sandi</h4>
						<button type="button" class="close" data-dismiss="modal">
				  			<span aria-hidden="true">&times;</span>
						</button>
			  		</div>
			  		<div class="modal-body">
						<div class="col-sm-12">
							<div class="form-group row">
								<input class="form-control" type="password" name="old-password" placeholder="Kata sandi saat ini" autofocus="autofocus" required>
							</div>

							<div class="form-group row">
								<input class="form-control" type="password" name="new-password" placeholder="Kata sandi baru" required>
							</div>

							<div class="form-group row">
								<input class="form-control" type="password" name="confirm-password" placeholder="Konfirmasi kata sandi" required>
							</div>
						</div>
			  		</div>
			  		<div class="modal-footer">
			  			<input type="hidden" name="user" value="change-password">
			  			<input type="hidden" name="id" value="<?php echo $_SESSION['user_id'] ?>">
						<button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-bold btn-pure btn-primary">Simpan</button>
			  		</div>
			  	</form>
			</div>
	  	</div>
	</div>

	<?php require_once('pages/script.php'); ?>

</body>
</html>