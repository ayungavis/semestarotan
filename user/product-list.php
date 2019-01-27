<?php 
  $i = 1;
  $product = new Product();
  $category = new Category();
  $products = $product->all();
?>

<header class="header header-inverse">
<div class="container">
  <div class="header-info">
	<div class="left">
	  <br>
	  <h2 class="header-title"><strong>Daftar Produk</strong> <small class="subtitle">Semua daftar produk yang pernah Anda buat.</small></h2>
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
		  <h5 class="card-title"><strong>Daftar </strong> produk</h5>
		</div>

		<div class="card-body">

      <?php if (isset($_SESSION['information'])) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $_SESSION['information']; ?>
        </div>
      <?php } ?>   

			<?php if (isset($_SESSION['error'])) { ?>
				<div class="alert alert-danger" role="alert">
          <?php echo $_SESSION['error']; ?>
        </div>
			<?php } ?>

			<?php unset($_SESSION['error']); ?>
      <?php unset($_SESSION['information']); ?>

      <?php if ($products) { ?>
  			<table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
          <thead>
            <tr>
              <th width="20px">#</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th width="20px">#</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($products as $row) { ?>
              <tr>
                <td><?php echo $i; $i++; ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo substr($row['description'], 0, 20) ?></td>

                <?php 
                  $category->id = $row['category'];
                  $category->find();
                ?>

                <td><?php echo $category->name ?></td>
                <td>Rp <?php echo number_format($row['price']) ?></td>
                <td>
                  <nav class="nav gap-2 fs-16">
                    <a class="nav-link hover-primary cat-edit" data-provide="tooltip" title="Ubah" href="./edit?get=product&id=<?php echo $row['id'] ?>"><i class="ti-pencil"></i></a>
                    <a class="nav-link hover-danger cat-delete" data-provide="tooltip" title="Hapus" href="./delete?get=product&id=<?php echo $row['id'] ?>"><i class="ti-trash"></i></a>
                  </nav>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php } else { ?>
        <div class="text-center">
          <p>Anda belum pernah membuat produk, <a href="./product?action=create">buat sekarang</a>.</p>
        </div>
      <?php } ?>
		</div>
	  </div>
	</div>

  </div>
</div>
</div>