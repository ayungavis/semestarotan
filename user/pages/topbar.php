<!-- Topbar -->
<header class="topbar topbar-expand-lg topbar-secondary topbar-inverse">
	<div class="container">
		<div class="topbar-left">
			<span class="topbar-btn topbar-menu-toggler"><i>&#9776;</i></span>

			<div class="topbar-brand">
				<a href="./index"><img src="../images/mt-logo2.png" width="100%" height="20px" alt="..."></a>
			</div>

			<div class="topbar-divider d-none d-md-block"></div>

			<nav class="topbar-navigation">
				<ul class="menu">

					<li class="menu-item">
						<a class="menu-link" href="./index">
							<span class="title">Beranda</span>
						</a>
					</li>

					<li class="menu-item">
						<a class="menu-link" href="#">
							<span class="title">Produk</span>
							<span class="arrow"></span>
						</a>
						<ul class="menu-submenu">
							<li class="menu-item">
								<a class="menu-link" href="./product?action=create">
									<span class="title">Buat Produk</span>
								</a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="./product?action=list">
									<span class="title">Daftar Produk</span>
								</a>
							</li>

							<?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') { ?>
								<li class="menu-item">
									<a class="menu-link" href="./product?action=category">
										<span class="title">Kategori</span>
									</a>
								</li>
							<?php } ?>
						</ul>
					</li>

					<?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') { ?>
						<li class="menu-item">
							<a class="menu-link" href="#">
								<span class="title">Pengguna</span>
								<span class="arrow"></span>
							</a>
							<ul class="menu-submenu">
								<li class="menu-item">
									<a class="menu-link" href="./user?action=create">
										<span class="title">Buat Pengguna</span>
									</a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="./user?action=list">
										<span class="title">Daftar Pengguna</span>
									</a>
								</li>
							</ul>
						</li>

						<li class="menu-item">
							<a class="menu-link" href="#">
								<span class="title">Tim</span>
								<span class="arrow"></span>
							</a>
							<ul class="menu-submenu">
								<li class="menu-item">
									<a class="menu-link" href="./team?action=create">
										<span class="title">Buat Tim</span>
									</a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="./team?action=list">
										<span class="title">Daftar Tim</span>
									</a>
								</li>
							</ul>
						</li>
					<?php } ?>

				</ul>
			</nav>
		</div>


		<div class="topbar-right">

			<ul class="topbar-btns">
				<li class="dropdown">
					<span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="../upload/profile/<?php echo $user->photo ?>" alt="..."></span>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="./profile"><i class="ti-user"></i> Profil</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="../index"><i class="ti-angle-double-right"></i> Lihat Web</a>
						<a class="dropdown-item" href="./logout"><i class="ti-power-off"></i> Keluar</a>
					</div>
				</li>
			</ul>

		</div>
	</div>
</header>
<!-- END Topbar -->