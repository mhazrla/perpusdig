<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <span class="mr-4"><?= ucwords($_SESSION['fullname']) ?></span>
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    <img src="../assets/dist/img/avatar.png" class="user-image img-circle" alt="User Image">
                </span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item text-center">
                    <?= ucwords($_SESSION['fullname']) ?>
                </a>
                <div class="dropdown-divider"></div>

                <div class="dropdown-divider"></div>
                <a href="#Logout" data-toggle="modal" data-target="#modalLogoutConfirm" class="btn btn-danger dropdown-footer">Keluar</a>
            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->