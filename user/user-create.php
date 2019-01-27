<header class="header header-inverse">
<div class="container">
  <div class="header-info">
	<div class="left">
	  <br>
	  <h2 class="header-title"><strong>Buat Pengguna</strong> <small class="subtitle">Silahkan lengkapi form di bawah untuk membuat pengguna baru.</small></h2>
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
		  <h5 class="card-title"><strong>Buat</strong> pengguna baru</h5>
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
            <input class="form-control" type="text" name="name" placeholder="Johan Samuel" autofocus="autofocus">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Nama Pengguna</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="username" placeholder="johansamuel" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Alamat Email</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="email" placeholder="johansamuel@mail.com" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Otoritas</label>
          <div class="col-sm-10">
            <select title="Pilih level" name="level" data-provide="selectpicker" data-width="100%" required>
              <option value="user">Pengguna Biasa</option>
              <option value="admin">Administrator</option>
            </select>
          </div>
        </div>

        <hr>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label required">Kata Sandi</label>
          <div class="col-sm-10">
            <input class="form-control" type="password" name="password" placeholder="Kata sandi" required>
          </div>
        </div>

        <hr>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Facebook</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="facebook">facebook.com/</span>
              <input class="form-control" type="text" name="facebook" placeholder="username" aria-describedby="facebook">
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Twitter</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="twitter">twitter.com/</span>
              <input class="form-control" type="text" name="twitter" placeholder="username" aria-describedby="twitter">
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Linkedin</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon" id="linkedin">linkedin.com/in/</span>
              <input class="form-control" type="text" name="linkedin" placeholder="username" aria-describedby="linkedin">
            </div>
          </div>
        </div>

        <footer class="card-footer text-right">
          <input type="hidden" name="user" value="create">
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
          <button class="btn btn-primary">Buat</button>
      	</footer>
			</form>
		</div>
	  </div>
	</div>

  </div>
</div>
</div>