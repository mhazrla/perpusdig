<?php
include "../../../layout/admin/header.php";
include "../../../layout/admin/navbar.php";
include "../../../layout/admin/sidebar.php";
include "../../../config/db.php";

// Data Table
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM peminjaman");
?>


<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Data Peminjaman Buku</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped text-center">
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
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
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
                        <?php endwhile; ?>
                    </tbody>
                </table>
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

<!-- Modal Add Administrator -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Administrator</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pages/function/administrator.php?action=add" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="role" value="Admin">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Nama Lengkap<small style="color: red;">* Otomatis Terisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Username<small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password<small style="color: red;">* Wajib diisi</small></label>
                        <input type="password" class="form-control" placeholder="Masukan Password" name="password" required>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<?php include "../../../layout/admin/footer.php"  ?>