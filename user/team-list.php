<?php 
  $i = 1;
  $team = new Team();
  $teams = $team->all();
?>

<header class="header header-inverse">
<div class="container">
  <div class="header-info">
	<div class="left">
	  <br>
	  <h2 class="header-title"><strong>Daftar Tim</strong> <small class="subtitle">Daftar semua tim yang akan ditampilkan di halaman tentang kami.</small></h2>
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
		  <h5 class="card-title"><strong>Daftar </strong>tim</h5>
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

      <?php if ($teams) { ?>
  			<table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
          <thead>
            <tr>
              <th width="20px">#</th>
              <th>Nama</th>
              <th>Pekerjaan</th>
              <th>Facebook</th>
              <th>Twitter</th>
              <th>Linkedin</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th width="20px">#</th>
              <th>Nama</th>
              <th>Pekerjaan</th>
              <th>Facebook</th>
              <th>Twitter</th>
              <th>Linkedin</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($teams as $row) { ?>
              <tr>
                <td><?php echo $i; $i++; ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['job'] ?></td>
                <td><a href="http://facebook.com/<?php echo $row['facebook'] ?>" target="_blank"><?php echo $row['facebook'] ?></a></td>
                <td><a href="http://twitter.com/<?php echo $row['twitter'] ?>" target="_blank"><?php echo $row['twitter'] ?></a></td>
                <td><a href="http://linkedin.com/in/<?php echo $row['linkedin'] ?>" target="_blank"><?php echo $row['linkedin'] ?></a></td>
                <td>
                  <nav class="nav gap-2 fs-16">
                    <a class="nav-link hover-primary cat-edit" data-provide="tooltip" title="Ubah" href="./edit?get=team&id=<?php echo $row['id'] ?>"><i class="ti-pencil"></i></a>
                    <a class="nav-link hover-danger cat-delete" data-provide="tooltip" title="Hapus" href="./delete?get=team&id=<?php echo $row['id'] ?>"><i class="ti-trash"></i></a>
                  </nav>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php } else { ?>
        <div class="text-center">
          <p>Tim belum pernah dibuat, <a href="./team?action=create">buat sekarang</a>.</p>
        </div>
      <?php } ?>
		</div>
	  </div>
	</div>

  </div>
</div>
</div>