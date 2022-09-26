<?php
include "../../../layout/user/header.php";
include "../../../layout/user/navbar.php";
include "../../../layout/user/sidebar.php";
include "../../../config/db.php";

$fullname = $_SESSION['fullname'];
$sql = mysqli_query($conn, "SELECT * FROM peminjaman WHERE nama_anggota = '$fullname' AND tgl_pengembalian = ''");

$no = 1;
$query = mysqli_query($conn, "SELECT * FROM peminjaman WHERE nama_anggota = '$fullname'");

?>




<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Data Pengembalian Buku</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <div class="col-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pinjam-buku" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pinjam Buku</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="riwayat-pinjam" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Riwayat Peminjaman Buku</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="pinjam-buku">
                                    <form action="pages/function/peminjaman.php?action=pengembalian" method="POST">
                                        <div class="form-group">
                                            <label>Judul Buku</label>
                                            <select class="form-control" name="judul_buku" required>
                                                <option selected disabled> -- Silahkan pilih buku yang akan di kembalikan -- </option>
                                                <?php
                                                while ($data = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <option value="<?= $data['judul_buku']; ?>"> <?= $data['judul_buku']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Pengembalian</label>
                                            <input type="text" class="form-control" name="tgl_pengembalian" value="<?= date('Y-m-d'); ?>" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kondisi Buku Saat Dikembalikan</label>
                                            <select class="form-control" name="kondisi_buku_dikembalikan" required>
                                                <option selected disabled>-- Silahkan pilih kondisi buku saat dikembalikan --</option>
                                                <!-- -->
                                                <option value="Baik">Baik ( Tidak terkena denda )</option>
                                                <option value="Rusak">Rusak ( Denda 20.000 )</option>
                                                <option value="Hilang">Hilang ( Denda 50.000 )</option>
                                            </select>
                                        </div>
                                        <div class=" form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="riwayat-pinjam">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Anggota</th>
                                                <th>Judul Buku</th>
                                                <th>Tanggal Peminjaman</th>
                                                <th>Tanggal Pengembalian</th>
                                                <th>Kondisi Buku Saat Dipinjam</th>
                                                <th>Kondisi Buku Saat Dikembalikan</th>
                                                <th>Denda</th>
                                            </tr>
                                        </thead>
                                        <?php

                                        while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['nama_anggota']; ?></td>
                                                    <td><?= $row['judul_buku']; ?></td>
                                                    <td><?= $row['tgl_peminjaman']; ?></td>
                                                    <td><?= $row['tgl_pengembalian']; ?></td>
                                                    <td><?= $row['kondisi_buku_dipinjam']; ?></td>
                                                    <td><?= $row['kondisi_buku_dikembalikan']; ?></td>
                                                    <td><?= $row['denda']; ?></td>
                                                </tr>
                                            </tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<!-- /.Left col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include "../../../layout/user/footer.php"  ?>