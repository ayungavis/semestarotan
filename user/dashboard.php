<?php 
	$product = new Product();
	$team = new Team();
	$category = new Category();
	$db = new Db();
?>

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

  <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') { ?>

		<div class="col-6 col-lg-3">
		  <div class="card shadow-1">
			<div class="card-body">
			  <div class="flexbox">
				<h5>Produk</h5>
				<div class="dropdown">
				  <span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ti-more-alt rotate-90"></i></span>
				  <div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="./product?action=list"><i class="ion-android-list"></i> Detail</a>
					<a class="dropdown-item" href="./product?action=create"><i class="ion-android-add"></i> Tambah baru</a>
				  </div>
				</div>
			  </div>

			  <div class="text-center my-2">
				<div class="fs-60 fw-400 text-info"><?php echo $product->count('id') ?></div>
				<span class="fw-400 text-muted">Total</span>
			  </div>
			</div>
		  </div>
		</div>

		<div class="col-6 col-lg-3">
		  <div class="card shadow-1">
			<div class="card-body">
			  <div class="flexbox">
				<h5>Kategori</h5>
				<div class="dropdown">
				  <span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ti-more-alt rotate-90"></i></span>
				  <div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="./product?action=category"><i class="ion-android-list"></i> Detail</a>
					<a class="dropdown-item" href="./product?action=category"><i class="ion-android-add"></i> Tambah baru</a>
				  </div>
				</div>
			  </div>

			  <div class="text-center my-2">
				<div class="fs-60 fw-400 text-danger"><?php echo $category->count('id') ?></div>
				<span class="fw-400 text-muted">Total</span>
			  </div>
			</div>
		  </div>
		</div>

		<div class="col-6 col-lg-3">
		  <div class="card shadow-1">
			<div class="card-body">
			  <div class="flexbox">
				<h5>Tim</h5>
				<div class="dropdown">
				  <span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ti-more-alt rotate-90"></i></span>
				  <div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="./team?action=list"><i class="ion-android-list"></i> Detail</a>
					<a class="dropdown-item" href="./team?action=create"><i class="ion-android-add"></i> Tambah baru</a>
				  </div>
				</div>
			  </div>

			  <div class="text-center my-2">
				<div class="fs-60 fw-400 text-primary"><?php echo $team->count('id') ?></div>
				<span class="fw-400 text-muted">Total</span>
			  </div>
			</div>
		  </div>
		</div>

		<div class="col-6 col-lg-3">
		  <div class="card shadow-1">
			<div class="card-body">
			  <div class="flexbox">
				<h5>Pengguna</h5>
				<div class="dropdown">
				  <span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ti-more-alt rotate-90"></i></span>
				  <div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="./user?action=list"><i class="ion-android-list"></i> Detail</a>
					<a class="dropdown-item" href="./user?action=create"><i class="ion-android-add"></i> Tambah baru</a>
				  </div>
				</div>
			  </div>

			  <div class="text-center my-2">
				<div class="fs-60 fw-400 text-dark"><?php echo $user->count('id') ?></div>
				<span class="fw-400 text-muted">Total</span>
			  </div>
			</div>
		  </div>
		</div>

		<div class="col-12 h-50px"></div>

	<?php } ?>

	<div class="col-md-6 col-lg-8">
	  <div class="card shadow-1">
		<div class="card-header">
		  <h5 class="card-title"><strong>Produk </strong> terbaru</h5>
		</div>

		<?php 
			$query = "SELECT * FROM product ORDER BY created_date DESC LIMIT 5";
			$products = $db->query($query);
		?>

		<div class="card-body">
			<?php if ($products) { ?>
				<div class="media-list media-list-hover media-list-divided">
					<?php foreach ($products as $row) { ?>
						<a class="media media-single" href="#">
							<img class="w-80px" src="../upload/product/<?php echo $row['photo']; ?>" alt="...">
							<div class="media-body">
								<h6><?php echo $row['title']; ?></h6>
								<small class="text-fader"><?php echo $row['description']; ?></small>
							</div>
						</a>
					<?php } ?>
				</div>

				<div class="text-center bt-1 border-light">
					<a class="text-uppercase d-block fs-10 fw-500 ls-1" href="./product?action=list">Lihat semua produk saya</a>
				</div>
			<?php } else { ?>
				<div class="text-center">
					<p>Anda belum pernah membuat produk, <a href="./product?action=create">buat sekarang</a>.</p>
				</div>
			<?php } ?>
		</div>
	  </div>
	</div>

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
		</div>
	  </div>
	</div>

  </div>
</div>
</div>