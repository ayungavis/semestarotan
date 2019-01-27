<?php 
  $user = new User();
  $user->id = $_GET['id'];
  $user->find();
?>

<header class="header header-inverse">
<div class="container">
  <div class="header-info">
	<div class="left">
	  <br>
	  <h2 class="header-title"><strong>Ubah Pengguna</strong> <small class="subtitle">Anda sedang mengubah pengguna <?php echo $user->name ?>.</small></h2>
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
		  <h5 class="card-title"><strong>Ubah</strong> pengguna</h5>
		</div>

		<div class="card-body">

			<?php if (isset($_SESSION['error'])) { ?>
				<div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error']; ?>
        </div>
			<?php } ?>

			<?php unset($_SESSION['error']); ?>

			<form action="../includes/app/user.php" method="post" enctype="multipart/form-data">
				<div class="form-group row">
          <label class="col-sm-2 col-form-label">Nama Lengkap</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="name" placeholder="Johan Samuel" value="<?php echo $user->name ?>" autofocus="autofocus">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nama Pengguna</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="username"value="<?php echo $user->username ?>" disabled>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Alamat Email</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="email" placeholder="johansamuel@mail.com" value="<?php echo $user->email ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Otoritas</label>
          <div class="col-sm-10">
            <select title="Pilih level" name="level" data-provide="selectpicker" data-width="100%" required>
              <option value="user" <?php if ($user->level == 'user') echo "selected='selected'" ?>>Pengguna Biasa</option>
              <option value="admin" <?php if ($user->level == 'admin') echo "selected='selected'" ?>>Administrator</option>
            </select>
          </div>
        </div>

        <hr>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Kata Sandi</label>
          <div class="col-sm-10">
            <input class="form-control" type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah sandi">
          </div>
        </div>

        <hr>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Facebook</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="facebook">facebook.com/</span>
              <input class="form-control" type="text" name="facebook" placeholder="username" value="<?php echo $user->facebook ?>" aria-describedby="facebook">
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Twitter</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="twitter">twitter.com/</span>
              <input class="form-control" type="text" name="twitter" placeholder="username" value="<?php echo $user->twitter ?>" aria-describedby="twitter">
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Linkedin</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="linkedin">linkedin.com/in/</span>
              <input class="form-control" type="text" name="linkedin" placeholder="username" value="<?php echo $user->linkedin ?>" aria-describedby="linkedin">
            </div>
          </div>
        </div>

        <footer class="card-footer text-right">
          <input type="hidden" name="user" value="edit">
          <input type="hidden" name="id" value="<?php $user->id ?>">
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
          <button type="button" class="btn btn-secondary" onclick="location.href= './user?action=list';">Kembali</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
      	</footer>
			</form>
		</div>
	  </div>
	</div>

  </div>
</div>
</div>