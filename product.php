<?php 
	require_once('includes/controller/product.class.php'); 
	require_once('includes/controller/category.class.php');

	$product = new Product();
	$products = $product->all();

	$category = new Category();
	$categories = $category->all();
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
			
			<!-- mt main start here -->
			<main id="mt-main">
				<!-- Mt Contact Banner of the Page -->
				<section class="mt-contact-banner style4 wow fadeInUp" data-wow-delay="0.4s" style="background-image: url('images/slider/product.jpg');">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1>PRODUK KAMI</h1>
								<!-- Breadcrumbs of the Page -->
								<nav class="breadcrumbs">
									<ul class="list-unstyled">
										<li><a href="./index">Beranda <i class="fa fa-angle-right"></i></a></li>
										<li>Produk</li>
									</ul>
								</nav><!-- Breadcrumbs of the Page end -->
							</div>
						</div>
					</div>
				</section><!-- Mt Contact Banner of the Page end -->
				<div class="container">
					<div class="row">
						<!-- sidebar of the Page start here -->
						<aside id="sidebar" class="col-xs-12 col-sm-4 col-md-3 wow fadeInLeft" data-wow-delay="0.4s">
							<!-- shop-widget of the Page start here -->
							<section class="shop-widget">
								<h2>KATEGORI</h2>
								<!-- category list start here -->
								<?php if ($categories) { ?>
									<ul class="list-unstyled category-list">
										<?php foreach ($categories as $row) { ?>
											<li>
												<a href="#">
													<span class="name"><?php echo $row['name'] ?></span>
													<span class="num"></span>
												</a>
											</li>
										<?php } ?>
									</ul><!-- category list end here -->
								<?php } else { ?>
									<div class="text-center">
										<p>Belum ada kategori.</p>
									</div>
								<?php } ?>
							</section><!-- shop-widget of the Page end here -->
						</aside><!-- sidebar of the Page end here -->
						<div class="col-xs-12 col-sm-8 col-md-9 wow fadeInRight" data-wow-delay="0.4s">
							<!-- mt shoplist header start here -->
							<header class="mt-shoplist-header">
								<!-- btn-box start here -->
								<!-- <div class="btn-box">
									<ul class="list-inline">
										<li>
											<a href="#" class="drop-link">
												Default Sorting <i aria-hidden="true" class="fa fa-angle-down"></i>
											</a>
											<div class="drop">
												<ul class="list-unstyled">
													<li><a href="#">ASC</a></li>
													<li><a href="#">DSC</a></li>
													<li><a href="#">Price</a></li>
													<li><a href="#">Relevance</a></li>
												</ul>
											</div>
										</li>
										<li><a class="mt-viewswitcher" href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a></li>
										<li><a class="mt-viewswitcher" href="#"><i class="fa fa-th-list" aria-hidden="true"></i></a></li>
									</ul>
								</div> --><!-- btn-box end here -->
								<!-- mt-textbox start here -->
								<!-- <div class="mt-textbox">
									<p>Menampilkan  <strong><?php // echo $product->count('id') ?></strong> dari  <strong><?php // $product->count('id') ?></strong> produk</p>
									<p>View   <a href="#">9</a> / <a href="#">18</a> / <a href="#">27</a> / <a href="#">All</a></p>
								</div> --><!-- mt-textbox end here -->
							</header><!-- mt shoplist header end here -->
							<?php if ($products) { ?>
								<!-- mt productlisthold start here -->
								<ul class="mt-productlisthold list-inline">
									<?php foreach ($products as $data) { ?>
										<li>
											<!-- mt product1 large start here -->
											<div class="mt-product1 large">
												<div class="box">
													<div class="b1">
														<div class="b2">
															<a href="./product-detail?get=<?php echo $data['id'] ?>"><img src="upload/product/<?php echo $data['photo'] ?>" alt="<?php echo $data['title'] ?>"></a>
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
													<strong class="title"><a href="./product-detail?get=<?php echo $data['id'] ?>"><?php echo $data['title'] ?></a></strong>
													<span class="price"><span>Rp <?php echo number_format($data['price']) ?></span></span>
												</div>
											</div><!-- mt product1 center end here -->
										</li>
									<?php } ?>
								</ul><!-- mt productlisthold end here -->
							<?php } else { ?>
								<div class="text-center">
									<h2>Belum ada produk.</h2>
								</div>
							<?php } ?>
							<!-- mt pagination start here -->
							<!-- <nav class="mt-pagination">
								<ul class="list-inline">
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
								</ul>
							</nav> --><!-- mt pagination end here -->
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