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
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="anggota" class="nav-link <?php if (ucwords($uri_segments[3]) == 'Anggota') {
                                                                    echo 'active';
                                                                } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Anggota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="penerbit" class="nav-link <?php if (ucwords($uri_segments[3]) == 'Penerbit') {
                                                                    echo 'active';
                                                                } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Penerbit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="administrator" class="nav-link <?php if (ucwords($uri_segments[3]) == 'Administrator') {
                                                                        echo 'active';
                                                                    } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrator</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="peminjaman" class="nav-link <?php if (ucwords($uri_segments[3]) == 'Peminjaman') {
                                                                        echo 'active';
                                                                    } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Peminjaman</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Katalog -->
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Katalog Buku
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="buku" class="nav-link <?php if (ucwords($uri_segments[3]) == 'Buku') {
                                                                echo 'active';
                                                            } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="kategori" class="nav-link <?php if (ucwords($uri_segments[3]) == 'Kategori') {
                                                                    echo 'active';
                                                                } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Buku</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="laporan" class="nav-link <?php if (ucwords($uri_segments[3]) == 'Laporan') {
                                                            echo 'active';
                                                        } ?>">
                        <i class="nav-icon fas fa-plus-square"></i>
                        <p>
                            Laporan Perpustakaan
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