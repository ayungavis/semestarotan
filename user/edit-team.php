<?php 
  $team = new Team();
  $team->id = $_GET['id'];
  $team->find();
?>

<header class="header header-inverse">
<div class="container">
  <div class="header-info">
	<div class="left">
	  <br>
	  <h2 class="header-title"><strong>Ubah Tim</strong> <small class="subtitle">Anda sedang mengubah <?php echo $team->name ?>.</small></h2>
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
		  <h5 class="card-title"><strong>Ubah</strong> tim</h5>
		</div>

		<div class="card-body">

			<?php if (isset($_SESSION['error'])) { ?>
				<div class="alert alert-danger" role="alert">
          <?php echo $_SESSION['error']; ?>
        </div>
			<?php } ?>

			<?php unset($_SESSION['error']); ?>

			<form action="../includes/app/team.php" method="post">
				<div class="form-group row">
          <label class="col-sm-2 col-form-label required">Nama</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="name" placeholder="Johan Samuel" value="<?php echo $team->name ?>" autofocus="autofocus" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Pekerjaan</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="job" placeholder="Pengembang Web" value="<?php echo $team->job ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Facebook</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="facebook">facebook.com/</span>
              <input class="form-control" type="text" name="facebook" placeholder="username" value="<?php echo $team->facebook ?>" aria-describedby="facebook">
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Twitter</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="twitter">twitter.com/</span>
              <input class="form-control" type="text" name="twitter" placeholder="username" value="<?php echo $team->twitter ?>" aria-describedby="twitter">
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Linkedin</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="linkedin">linkedin.com/in/</span>
              <input class="form-control" type="text" name="linkedin" placeholder="username" value="<?php echo $team->linkedin ?>" aria-describedby="linkedin">
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Foto Profil</label>
          <div class="col-sm-10">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#change-photo">Ubah Foto</button>
          </div>
        </div>

        <footer class="card-footer text-right">
          <input type="hidden" name="team" value="edit">
          <input type="hidden" name="id" value="<?php echo $team->id ?>">
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
          <button type="button" class="btn btn-secondary" onclick="location.href= './team?action=list';">Kembali</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
      	</footer>
			</form>
		</div>
	  </div>
	</div>

  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="change-photo" tabindex="-1">
    <div class="modal-dialog">
    <div class="modal-content">
      <form action="../includes/app/team.php" method="post" enctype="multipart/form-data">
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
            <input type="hidden" name="team" value="change-photo">
            <input type="hidden" name="id" value="<?php echo $team->id ?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
            <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-bold btn-pure btn-primary">Unggah</button>
          </div>
        </form>
    </div>
    </div>
</div>