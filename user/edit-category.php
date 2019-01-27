<?php 
  $category = new Category();
  $category->id = $_GET['id'];
  $category->find();
?>

<header class="header header-inverse">
<div class="container">
  <div class="header-info">
	<div class="left">
	  <br>
	  <h2 class="header-title"><strong>Ubah Kategori</strong> <small class="subtitle">Anda sedang mengubah kategori <?php echo $category->name ?>.</small></h2>
	</div>
  </div>
</div>
</header><!--/.header -->

<div class="main-content">
<div class="container">
  <div class="row">

	<div class="col-md-6 col-lg-12">
	  <div class="card shadow-1">
		<div class="card-header">
		  <h5 class="card-title"><strong>Ubah</strong> kategori</h5>
		</div>

		<div class="card-body">

			<?php if (isset($_SESSION['error'])) { ?>
				<div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error']; ?>
        </div>
			<?php } ?>

			<?php unset($_SESSION['error']); ?>

			<form action="../includes/app/category.php" method="post">
				<div class="form-group row">
          <label class="col-sm-2 col-form-label required">Nama</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="name" id="cat-name" value="<?php echo $category->name ?>" autofocus="autofocus">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Slug</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="slug" id="cat-slug" value="<?php echo $category->slug ?>" required>
          </div>
        </div>

        <footer class="card-footer text-right">
          <input type="hidden" name="category" value="edit">
          <input type="hidden" name="id" value="<?php echo $category->id ?>">
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
          <button class="btn btn-secondary" type="button" onclick="location.href= './product?action=category';">Kembali</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
      	</footer>
			</form>
		</div>
	  </div>
	</div>

  </div>
</div>
</div>