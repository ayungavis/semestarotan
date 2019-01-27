<?php if (isset($_SESSION['level']) && $_SESSION['level'] != 'admin') header('Location: ./index') ?>

<?php 
  $i = 1;
  $category = new Category();
  $categories = $category->all();
?>

<header class="header header-inverse">
<div class="container">
  <div class="header-info">
	<div class="left">
	  <br>
	  <h2 class="header-title"><strong>Kategori</strong> <small class="subtitle">Semua kategori yang ada dan bisa membuat kategori baru.</small></h2>
	</div>
  </div>
</div>
</header><!--/.header -->

<div class="main-content">
<div class="container">
  <div class="row">

	<div class="col-md-6 col-lg-7">
	  <div class="card shadow-1">
		<div class="card-header">
		  <h5 class="card-title"><strong>Daftar</strong> kategori</h5>
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

      <?php if ($categories) { ?>
  			<table class="table table-hover">
          <thead>
            <tr>
              <th width="25px">#</th>
              <th>Nama</th>
              <th>Slug</th>
              <th class="w-100px text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categories as $row) { ?>
              <tr>
                <td><?php echo $i; $i++; ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['slug'] ?></td>
                <td>
                  <nav class="nav gap-2 fs-16">
                    <a class="nav-link hover-primary cat-edit" data-provide="tooltip" title="Ubah" href="./edit?get=category&id=<?php echo $row['id'] ?>"><i class="ti-pencil"></i></a>
                    <a class="nav-link hover-danger cat-delete" data-provide="tooltip" title="Hapus" href="./delete?get=category&id=<?php echo $row['id'] ?>"><i class="ti-trash"></i></a>
                  </nav>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php } else { ?>
        <div class="text-center">
          <p>Belum ada kategori yang dibuat.</p>
        </div>
      <?php } ?>
    </div>
  </div>
  </div>


  <div class="col-lg-5">
    <form class="card shadow-1" action="../includes/app/category.php" method="post">
      <h5 class="card-title"><strong>Buat kategori</strong></h5>

      <div class="card-body">
        <div class="form-group">
          <label class="required">Nama</label>
          <input class="form-control" type="text" name="name" id="cat-name" required>
        </div>

        <div class="form-group">
          <label class="required">Slug</label>
          <input class="form-control" type="text" name="slug" id="cat-slug" required>
          <!-- <small>String to be use in URL</small> -->
        </div>
      </div>

      <footer class="card-footer text-right">
        <input type="hidden" name="category" value="create">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
        <button class="btn btn-primary" type="submit">Buat</button>
      </footer>

    </form>
		</div>
	  </div>
	</div>

  </div>
</div>
</div>