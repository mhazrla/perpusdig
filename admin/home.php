<?php include "../layout/admin/header.php";
include "../layout/admin/navbar.php";
include "../layout/admin/sidebar.php";

include '../config/db.php';

$memberQuery = mysqli_query($conn, "SELECT * FROM user WHERE role = 'Anggota'");
$rowMember = mysqli_num_rows($memberQuery);

$bookQuery = mysqli_query($conn, "SELECT * FROM buku");
$rowBook = mysqli_num_rows($bookQuery);

$peminjamanQuery = mysqli_query($conn, "SELECT * FROM peminjaman WHERE tgl_peminjaman > 0");
$rowPeminjaman = mysqli_num_rows($peminjamanQuery);

$pengembalianQuery = mysqli_query($conn, "SELECT * FROM peminjaman WHERE tgl_pengembalian > 0");
$rowPengembalian = mysqli_num_rows($pengembalianQuery);
?>

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $rowMember; ?></h3>

                <p>Anggota</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $rowBook; ?></h3>

                <p>Buku</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="buku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $rowPeminjaman; ?></h3>

                <p>Peminjaman</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="peminjaman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $rowPengembalian; ?></h3>

                <p>Pengembalian</p>
            </div>
            <div class="icon">
                <i class="fa fa-sign-in-alt"></i>
            </div>
            <a href="peminjaman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable text-center">
        <!-- Custom tabs (Charts with tabs)-->
        <img src="../assets/dist/img/book.png" width="180px" height="180px" class="my-3">
        <h3 class="card-title">
            <h2 class="text-center text-secondary" style="font-family: Quicksand, sans-serif;">Perpusdig</h2>
            <p class="text-center text-secondary">Alamat : Jakarta | Email : perpusdig@gmail.com | Nomor Telpon : 02123124 </p>
        </h3>

    </section>
    <!-- /.Left col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php include "../layout/admin/footer.php"  ?>