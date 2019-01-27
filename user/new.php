<header class="header header-inverse">
<div class="container">
  <div class="header-info">
	<div class="left">
	  <br>
	  <h2 class="header-title"><strong>Akun Baru</strong> <small class="subtitle">Silahkan melengkapi informasi di bawah ini untuk bisa menggunakan fitur-fitur kami.</small></h2>
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
		  <h5 class="card-title"><strong>Form </strong> pengguna baru</h5>
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
          <label class="col-sm-2 col-form-label required">Nama Lengkap</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="name" placeholder="Johan Samuel" value="<?php echo $user->name ?>" autofocus="autofocus" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nama Pengguna</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" value="<?php echo $user->username ?>" disabled>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Alamat Email</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" value="<?php echo $user->email ?>" disabled>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Facebook</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="facebook">facebook.com/</span>
              <input class="form-control" type="text" name="facebook" placeholder="username" value="<?php echo $user->facebook ?>" aria-describedby="facebook" required>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Twitter</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="twitter">twitter.com/</span>
              <input class="form-control" type="text" name="twitter" placeholder="username" value="<?php echo $user->twitter ?>" aria-describedby="twitter" required>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Linkedin</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="linkedin">linkedin.com/in/</span>
              <input class="form-control" type="text" name="linkedin" placeholder="username" value="<?php echo $user->linkedin ?>" aria-describedby="linkedin" required>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Foto Profil</label>
          <div class="col-sm-10">
            <input type="file" name="photo" required>
            <br><small><strong>NOTE:</strong> Maximum file size <strong>1MB</strong> and best resolution is <strong>square</strong>.</small>
          </div>
        </div>

        <footer class="card-footer text-right">
          <input type="hidden" name="user" value="new">
          <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>">
          <button class="btn btn-primary">Simpan</button>
      	</footer>
			</form>
		</div>
	  </div>
	</div>

  </div>
</div>
</div>