<?php include "layout/main/header.php";

session_start();

?>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="login"><b>Perpus</b>DIG</a>
    </div>

    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masuk Akun</p>

        <form action="function/process.php?action=login" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">
          <p>- ATAU -</p>
          <p class="mb-0">
            <a href="register" class="text-center">Belum punya akun? Daftar di sini</a>
          </p>
        </div>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  <?php include "layout/main/footer.php" ?>