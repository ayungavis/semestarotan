<?php 
  $i = 1;
  $users = $user->all();
?>

<header class="header header-inverse">
<div class="container">
  <div class="header-info">
	<div class="left">
	  <br>
	  <h2 class="header-title"><strong>Daftar Pengguna</strong> <small class="subtitle">Semua daftar pengguna yang terdaftar di semestarotan.</small></h2>
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
		  <h5 class="card-title"><strong>Daftar</strong> pengguna</h5>
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

      <?php if ($users) { ?>
  			<table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
          <thead>
            <tr>
              <th width="20px">#</th>
              <th>Nama</th>
              <th>Nama Pengguna</th>
              <th>Email</th>
              <th>Status</th>
              <th>Pengguna Baru</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th width="20px">#</th>
              <th>Nama</th>
              <th>Nama Pengguna</th>
              <th>Email</th>
              <th>Status</th>
              <th>Pengguna Baru</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($users as $row) { ?>
              <tr>
                <td><?php echo $i; $i++; ?></td>
                <?php 
                  if ($row['new']) $name = 'Pengguna Baru';
                  else $name = $row['name'];
                ?>
                <td><?php echo $name ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['email'] ?></td>

                <?php 
                  if ($row['active']) $stats = 'Aktif';
                  else $stats = 'Tidak Aktif';

                  if ($row['new']) $new = 'Ya';
                  else $new = 'Tidak';
                ?>

                <td><?php echo $stats ?></td>
                <td><?php echo $new ?></td>
                <td>
                  <nav class="nav gap-2 fs-16">
                    <a class="nav-link hover-primary cat-edit" data-provide="tooltip" title="Ubah" href="./edit?get=user&id=<?php echo $row['id'] ?>"><i class="ti-pencil"></i></a>
                    <a class="nav-link hover-danger cat-delete" data-provide="tooltip" title="Hapus" href="./delete?get=user&id=<?php echo $row['id'] ?>"><i class="ti-trash"></i></a>
                  </nav>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php } else { ?>
        <div class="text-center">
          <p>Belum ada penggun terdaftar, <a href="./user?action=create">buat sekarang</a>.</p>
        </div>
      <?php } ?>
		</div>
	  </div>
	</div>

  </div>
</div>
</div>