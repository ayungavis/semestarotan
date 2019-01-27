<?php 
	require_once('includes/controller/product.class.php'); 

	$product = new Product();
	$products = $product->all();
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
			
			<?php require_once('pages/slider.php'); ?>

			<!-- mt main start here -->
			<main id="mt-main">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<!-- mt producttabs start here -->
							<div class="mt-producttabs wow fadeInUp" data-wow-delay="0.4s">
								<!-- producttabs start here -->
								<ul class="producttabs">
									<li><a href="#" class="active">KATALOG PRODUK</a></li>
									<!-- <li><a href="#tab2">LATEST</a></li>
									<li><a href="#tab3">BEST SELLER</a></li> -->
								</ul>
								<!-- producttabs end here -->
								<div class="tab-content text-center">
									<div id="tab1">
										<?php if ($products) { ?>
											<!-- tabs slider start here -->
											<div class="tabs-slider">
												<!-- slide start here -->
												<div class="slide">

													<?php foreach ($products as $row) { ?>
														<!-- mt product1 center start here -->
														<div class="mt-product1 mt-paddingbottom20">
															<div class="box">
																<div class="b1">
																	<div class="b2">
																		<a href="product-detail?get=<?php echo $row['id'] ?>"><img src="upload/product/<?php echo $row['photo'] ?>" alt="<?php echo $row['title'] ?>"></a>
																		<!-- <span class="caption">
																			<span class="new">NEW</span>
																		</span> -->
																		<!-- <ul class="mt-stars">
																			<li><i class="fa fa-star"></i></li>
																			<li><i class="fa fa-star"></i></li>
																			<li><i class="fa fa-star"></i></li>
																			<li><i class="fa fa-star-o"></i></li>
																		</ul> -->
																		<ul class="links">
																			<li><a href="#"><i class="icon-handbag"></i><span>Beli</span></a></li>
																			<li><a href="#"><i class="icomoon icon-heart-empty"></i></a></li>
																			<li><a href="#"><i class="icomoon icon-exchange"></i></a></li>
																		</ul>
																	</div>
																</div>
															</div>
															<div class="txt">
																<strong class="title"><a href="product-detail?get=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></strong>
																<span class="price"><span>Rp <?php echo number_format($row['price']); ?></span></span>
															</div>
														</div><!-- mt product1 center end here -->
													<?php } ?>
												</div>
												<!-- slide end here -->
											</div>
											<!-- tabs slider end here -->
										<?php } else { ?>
											<div class="text-center">
												<h2>Belum ada produk.</h2>
											</div>
										<?php } ?>	
									</div>
								</div>
							</div>
							<!-- mt producttabs end here -->
							<!-- mt patners start here -->
							<div class="mt-patners wow fadeInUp" data-wow-delay="0.4s">
								<h2 class="heading">MEREK <span>FURNITUR</span></h2>
								<!-- patner slider start here -->
								<div class="patner-slider">
									<!-- slide start here -->
									<div class="slide">
										<div class="box1">
											<div class="box2"><a href="#"><img src="images/logo/img01.jpg" alt="img"></a></div>
										</div>
									</div><!-- slide end here -->
									<!-- slide start here -->
									<div class="slide">
										<div class="box1">
											<div class="box2"><a href="#"><img src="images/logo/img02.jpg" alt="img"></a></div>
										</div>
									</div><!-- slide end here -->
									<!-- slide start here -->
									<div class="slide">
										<div class="box1">
											<div class="box2"><a href="#"><img src="images/logo/img03.jpg" alt="img"></a></div>
										</div>
									</div><!-- slide end here -->
									<!-- slide start here -->
									<div class="slide">
										<div class="box1">
											<div class="box2"><a href="#"><img src="images/logo/img04.jpg" alt="img"></a></div>
										</div>
									</div><!-- slide end here -->
									<!-- slide start here -->
									<div class="slide">
										<div class="box1">
											<div class="box2"><a href="#"><img src="images/logo/img05.jpg" alt="img"></a></div>
										</div>
									</div><!-- slide end here -->
									<!-- slide start here -->
									<div class="slide">
										<div class="box1">
											<div class="box2"><a href="#"><img src="images/logo/img06.jpg" alt="img"></a></div>
										</div>
									</div><!-- slide end here -->
									<!-- slide start here -->
									<div class="slide">
										<div class="box1">
											<div class="box2"><a href="#"><img src="images/logo/img02.jpg" alt="img"></a></div>
										</div>
									</div><!-- slide end here -->
									<!-- slide start here -->
									<div class="slide">
										<div class="box1">
											<div class="box2"><a href="#"><img src="images/logo/img03.jpg" alt="img"></a></div>
										</div>
									</div><!-- slide start here -->
								</div><!-- patner slider end here -->
							</div><!-- mt patners end here -->
						</div>
					</div>
				</div>
			</main><!-- mt main end here -->
			
			<?php require_once('pages/footer.php'); ?>

		</div><!-- W1 end here -->
		<span id="back-top" class="fa fa-arrow-up"></span>
	</div>
	
	<?php require_once('pages/script.php'); ?>

</body>
</html>