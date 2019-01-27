<?php 
  $category = new Category();
  $categories = $category->all();

  $product = new Product();
  $product->id = $_GET['id'];
  $product->find();
?>

<header class="header header-inverse">
<div class="container">
  <div class="header-info">
	<div class="left">
	  <br>
	  <h2 class="header-title"><strong>Ubah Produk</strong> <small class="subtitle">Anda sedang mengubah produk <?php echo $product->title ?>.</small></h2>
	</div>
  </div>
</div>
</header><!--/.header -->

<div class="main-content">
  <div class="container">
    <form class="row" action="../includes/app/product.php" method="post">

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
            
            <input class="form-control form-control-lg" type="text" name="title" placeholder="Judul Produk" value="<?php echo $product->title ?>" required>
            <br>
            <textarea data-provide="summernote" name="description" data-height="300px" required><?php echo $product->description ?></textarea>
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
                    <option value="<?php echo $row['id'] ?>" <?php if ($product->category == $row['id']) echo "selected='selected'" ?>><?php echo $row['name'] ?></option>
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
                <input class="form-control" type="text" name="price" placeholder="199000" value="<?php echo $product->price ?>" aria-describedby="rupiah" required>
              </div>
            </div>

            <div class="form-group">
              <label class="required">Foto Produk</label>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#change-photo">Ubah Foto</button>
            </div>
          </div>

          <footer class="card-footer flexbox">
            <div class="text-right flex-grow">
              <input type="hidden" name="product" value="edit">
              <input type="hidden" name="id" value="<?php echo $product->id ?>">
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
              <button type="button" class="btn btn-secondary" onclick="location.href= './product?action=list';">Kembali</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
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

<!-- Modal -->
<div class="modal fade" id="change-photo" tabindex="-1">
    <div class="modal-dialog">
    <div class="modal-content">
      <form action="../includes/app/product.php" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Ubah Foto</h4>
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="file" name="photo" required>
            <br><small><strong>NOTE:</strong> Maximum file size <strong>1 MB</strong>.</small>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="product" value="change-photo">
            <input type="hidden" name="id" value="<?php echo $product->id ?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
            <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-bold btn-pure btn-primary">Unggah</button>
          </div>
        </form>
    </div>
    </div>
</div>