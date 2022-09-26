<?php include "layout/main/header.php";
session_start();
?>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="register"><b>Perpus</b>DIG</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Buat akun member</p>

        <form action="function/process.php?action=register" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" id="fullname">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" id="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" id="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <button type="submit" class="btn btn-primary btn-block">Daftar Akun</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p class="mb-1">- ATAU -</p>
          <a href="login" class="text-center">Saya sudah punya akun</a>
        </div>

      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
  <?php include "layout/main/footer.php" ?>