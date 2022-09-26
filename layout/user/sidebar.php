<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <i class="nav-icon fas fa-book  mx-3"></i>
        <span class="brand-text font-weight-light">PerpusDIG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ucwords($_SESSION['fullname']) ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="dashboard" class="nav-link <?php if (ucwords($uri_segments[3]) == 'Dashboard') {
                                                            echo 'active';
                                                        } ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="peminjaman" class="nav-link <?php if (ucwords($uri_segments[3]) == 'Peminjaman') {
                                                                echo 'active';
                                                            } ?>">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Peminjaman Buku
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="pengembalian" class="nav-link <?php if (ucwords($uri_segments[3]) == 'Pengembalian') {
                                                                echo 'active';
                                                            } ?>">
                        <i class="nav-icon fas fa-undo-alt"></i>
                        <p>
                            Pengembalian Buku
                        </p>
                    </a>
                </li>

                <li class="nav-header">EXTRA</li>

                <li class="nav-item">
                    <a href="profile" class="nav-link <?php if (ucwords($uri_segments[3]) == 'Profile') {
                                                            echo 'active';
                                                        } ?>">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

                <li class="nav-header">LANJUTAN</li>
                <li class="nav-item">
                    <a href="#Logout" data-toggle="modal" data-target="#modalLogoutConfirm" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        Keluar</a>

                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= ucwords($uri_segments[3]) ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><?= ucwords($uri_segments[3]) ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">