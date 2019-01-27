<?php require_once('pages/header-start.php'); ?>

<?php require_once('pages/stylesheet.php'); ?>

<?php require_once('pages/header-end.php'); ?>

<body>
	<!-- main container of all the page elements -->
	<div id="wrapper">
		
		<?php require_once('pages/preloader.php'); ?>

		<!-- W1 start here -->
		<div class="w1">
			<!-- mt header style19 start here -->
			<header id="mt-header" class="style17">
				
				<?php require_once('pages/topbar.php'); ?>
					
				<?php require_once('pages/bottombar.php'); ?>
				
				<span class="mt-side-over"></span>
			</header>

			<?php require_once('pages/search.php'); ?>

			<!-- Main of the Page -->
			<main id="mt-main">
				<!-- Mt Contact Banner of the Page -->
				<section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url('images/slider/contact.jpg');">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1>HUBUNGI KAMI</h1>
								<nav class="breadcrumbs">
									<ul class="list-unstyled">
										<li><a href="./index">Beranda <i class="fa fa-angle-right"></i></a></li>
										<li>Hubungi Kami</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</section><!-- Mt Contact Banner of the Page -->
				<!-- Mt Contact Detail of the Page -->
				<section class="mt-contact-detail content-info wow fadeInUp" data-wow-delay="0.4s">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 col-sm-8">
								<div class="txt-wrap">
									<h1>semestarotan.</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lobortis ultrices ante. Ut viverra lobortis sapien, ac egestas purus semper nec. Etiam et fringilla odio, nec vehicula magna. Integer eu porttitor ante. Donec et nulla a dolor mollis blandit non eu libero. In hac habitasse platea dictumst. In placerat enim eros, imperdiet efficitur quam porttitor eget. Fusce iaculis placerat magna, eu ornare lorem vulputate a. Vivamus est massa, luctus ac auctor at, tincidunt vitae est. Aliquam imperdiet erat ligula, quis laoreet massa pellentesque eleifend. Donec dignissim sem at magna consectetur bibendum. Integer eu neque dolor. </p>
								</div>
								<ul class="list-unstyled contact-txt">
									<li>
										<strong>Alamat</strong>
										<address>Jalan Ir. H. Juanda No. 1 Paledang, Kota Bogor Tengah<br>Bogor, Jawa Barat<br>Indonesia</address>
									</li>
									<li>
										<strong>Telepon</strong>
										<a href="#">+62 123 4567 8910</a>
									</li>
									<li>
										<strong>Email</strong>
										<a href="#">admin@udah.pw</a>
									</li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-4">
								<h2>Punya pertanyaan?</h2>
								<!-- Contact Form of the Page -->
								<form action="#" class="contact-form">
									<fieldset>
										<input type="text" class="form-control" placeholder="Nama">
										<input type="email" class="form-control" placeholder="Email">
										<input type="text" class="form-control" placeholder="Judul">
										<textarea class="form-control" placeholder="Pesan"></textarea>
										<button class="btn-type3" type="submit">Kirim</button>
									</fieldset>
								</form>
								<!-- Contact Form of the Page end -->
							</div>
						</div>
					</div>
				</section><!-- Mt Contact Detail of the Page end -->
			</main>

			<?php require_once('pages/footer.php'); ?>

			</div><!-- W1 end here -->
		<span id="back-top" class="fa fa-arrow-up"></span>
	</div>
	
	<?php require_once('pages/script.php'); ?>

</body>
</html>