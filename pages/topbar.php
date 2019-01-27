<?php require_once('includes/functions.php'); ?>

<!-- mt top bar start here -->
<div class="mt-top-bar">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-6 hidden-xs">
				<span class="tel"> <i class="fa fa-phone" aria-hidden="true"></i> +62 123 4567 8910</span>
				<a href="#" class="tel"> <i class="fa fa-envelope-o" aria-hidden="true"></i>  admin@udah.pw</a>
			</div>
			<div class="col-xs-12 col-sm-6 text-right">
				<!-- mt-top-list start here -->
				<ul class="mt-top-list2">
					<?php if (isset($_SESSION['auth'])) { ?>
						<li><a href="user/logout">Keluar</a></li>
						<li><a href="user/profile">Profil</a></li>
						<li><a href="user/product?action=list">Daftar Produk</a></li>
						<li><a href="user/product?action=create">Buat Produk</a></li>
						<li><a href="user">Panel Beranda</a></li>
					<?php } else { ?>
						<li><a href="user/auth/login">Masuk</a></li>
						<li><a href="user/auth/register">Buat Akun</a></li>
					<?php } ?>
				</ul><!-- mt-top-list end here -->
			</div>
		</div>
	</div>
</div><!-- mt top bar start here -->