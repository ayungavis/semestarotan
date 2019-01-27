<?php 
	require_once('includes/controller/team.class.php');

	$team = new Team();
	$teams = $team->all();
?>

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

			<!-- Mt Content Banner of the Page -->
				<section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url('images/slider/about.jpg');">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1>TENTANG KAMI</h1>
								<nav class="breadcrumbs">
									<ul class="list-unstyled">
										<li><a href="./index">Beranda <i class="fa fa-angle-right"></i></a></li>
										<li>Tentang Kami</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!-- Mt Content Banner of the Page end -->
				<!-- Mt About Section of the Page -->
				<section class="mt-about-sec wow fadeInUp" data-wow-delay="0.4s">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="txt">
									<h2>SEMESTA ROTAN</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lobortis ultrices ante. Ut viverra lobortis sapien, ac egestas purus semper nec. Etiam et fringilla odio, nec vehicula magna. Integer eu porttitor ante. Donec et nulla a dolor mollis blandit non eu libero. In hac habitasse platea dictumst. In placerat enim eros, imperdiet efficitur quam porttitor eget. Fusce iaculis placerat magna, eu ornare lorem vulputate a. Vivamus est massa, luctus ac auctor at, tincidunt vitae est. Aliquam imperdiet erat ligula, quis laoreet massa pellentesque eleifend. Donec dignissim sem at magna consectetur bibendum. Integer eu neque dolor.</p>
									<p>Proin nisl ex, vulputate non dictum vel, hendrerit elementum erat. Vivamus metus velit, mollis lacinia lacus accumsan, auctor tincidunt odio. Donec sed massa eu lacus placerat fermentum. Phasellus rutrum felis lacus, sed scelerisque sem bibendum nec. Curabitur ligula nibh, varius in orci non, semper vulputate odio. Phasellus vestibulum pellentesque mollis. Aenean mattis rutrum faucibus.</p>
								</div>
								<div class="mt-follow-holder">
									<span class="title">Ikuti Kami</span>
									<!-- Social Network of the Page -->
									<ul class="list-unstyled social-network">
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-youtube"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
									</ul>
									<!-- Social Network of the Page end -->
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Mt About Section of the Page -->
				<?php if ($teams) { ?>
					<!-- Mt Team Section of the Page -->
					<section class="mt-team-sec">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<h3>TIM KAMI</h3>
									<div class="holder">
										<?php foreach ($teams as $row) { ?>
											<!-- col of the Page -->
											<div class="col wow fadeInLeft" data-wow-delay="0.4s">
												<div class="img-holder">
													<a href="#">
														<img src="upload/team/<?php echo $row['photo'] ?>" alt="<?php echo $row['name'] ?>">
														<!-- <ul class="list-unstyled social-icon">
															<li><i class="fa fa-twitter"></i></li>
															<li><i class="fa fa-facebook"></i></li>
															<li><i class="fa fa-linkedin"></i></a></li>
														</ul> -->
													</a>
												</div>
												<div class="mt-txt">
													<h4><?php echo $row['name'] ?></h4>
													<span class="sub-title"><?php echo strtoupper($row['job']) ?></span>
												</div>
											</div>
											<!-- col of the Page end -->
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- Mt About Section of the Page -->
				<?php } ?>
			</main><!-- Main of the Page end -->

			<?php require_once('pages/footer.php'); ?>

			</div><!-- W1 end here -->
		<span id="back-top" class="fa fa-arrow-up"></span>
	</div>
	
	<?php require_once('pages/script.php'); ?>

</body>
</html>