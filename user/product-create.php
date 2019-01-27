<?php 
  $category = new Category();
  $categories = $category->all();
?>

<header class="header header-inverse">
<div class="container">
  <div class="header-info">
	<div class="left">
	  <br>
	  <h2 class="header-title"><strong>Buat Produk</strong> <small class="subtitle">Buat produk Anda untuk dijual di sini.</small></h2>
	</div>
  </div>
</div>
</header><!--/.header -->

<div class="main-content">
  <div class="container">
    <form class="row" action="../includes/app/product.php" method="post" enctype="multipart/form-data">

      <div class="col-lg-8">
        <div class="card shadow-1">
          <h4 class="card-title"><strong>Informasi</strong> dasar</h4>

          <div class="card-body">

            <?php if (isset($_SESSION['error'])) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error']; ?>
              </div>
            <?php } ?>

            <?php unset($_SESSION['error']); ?>
            
            <input class="form-control form-control-lg" type="text" name="title" placeholder="Judul Produk" required>
            <br>
            <textarea data-provide="summernote" name="description" data-height="300px" required></textarea>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card shadow-1">
          <h4 class="card-title"><strong>Detail</strong> tambahan</h4>

          <div class="card-body">
            <?php if ($categories) { ?>
              <div class="form-group">
                <label class="required">Kategori</label>
                <select title="Pilih kategori" name="category" data-provide="selectpicker" data-width="100%" required>
                  <?php foreach ($categories as $row) { ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                  <?php } ?>
                </select>
              </div>
            <?php } else { ?>
              <input type="hidden" name="category" value="0">
            <?php } ?>

            <div class="form-group">
              <label class="required">Harga</label>
              <div class="input-group">
                <span class="input-group-addon" id="rupiah">Rp</span>
                <input class="form-control" type="text" name="price" placeholder="199000" aria-describedby="rupiah" required>
              </div>
            </div>

            <div class="form-group">
              <label class="required">Foto Produk</label>
              <input type="file" name="photo" data-provide="dropify">
              <small><strong>NOTE:</strong> Maximum file size <strong>1MB</strong>.</small>
            </div>
          </div>

          <footer class="card-footer flexbox">
            <div class="text-right flex-grow">
              <input type="hidden" name="product" value="create">
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
              <button class="btn btn-bold btn-primary">Buat</button>
            </div>
          </footer>

        </div>
      </div>

    </form>
  </div>
</div>

  </div>
</div>
</div>