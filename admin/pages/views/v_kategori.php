<?php
include "../../../layout/admin/header.php";
include "../../../layout/admin/navbar.php";
include "../../../layout/admin/sidebar.php";
include "../../../config/db.php";

$kategori = mysqli_query($conn, "SELECT * FROM kategori");

$query = mysqli_query($conn, "SELECT max(kode_kategori) as kode_kategori FROM kategori");
$data = mysqli_fetch_array($query);
$kode_kategori = $data['kode_kategori'];

$order = (int) substr($kode_kategori, 3, 3);

$order++;

$awalan = "KT-";
$Kategori = $awalan . sprintf("%03s", $order);

// Data Table
$no = 1;
?>


<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Data Kategori Buku</h3>
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-plus mr-2"></i>Tambah Kategori
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($kategori)) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_kategori']; ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $row['id_kategori'] ?>">
                                        <i class="fa fa-edit mr-2"></i><?= $row['id_kategori'] ?>
                                    </button>
                                    <a href="pages/function/kategori.php?action=delete&id=<?= $row['id_kategori']; ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Apakah yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>

                                    <!-- Modal Edit Anggota -->
                                    <div class="modal fade" id="modal-edit<?= $row['id_kategori'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Kategori</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="pages/function/kategori.php?action=edit" enctype="multipart/form-data" method="POST">
                                                        <input type="hidden" value="<?= $row['id_kategori']; ?>" name="id_kategori">
                                                        <div class="mb-3">
                                                            <label for="kode_kategori" class="form-label">Kode Kategori<small style="color: red;">* Otomatis Terisi</small></label>
                                                            <input type="text" class="form-control" id="kode_kategori" value="<?= $row['kode_kategori'] ?>" name="kode_kategori" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_kategori" class="form-label">Nama Kategori<small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['nama_kategori']; ?>" name="nama_kategori" placeholder="Masukkan Nama Kategori" required>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </td>
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

<!-- Modal Add Kategori -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pages/function/kategori.php?action=add" enctype="multipart/form-data" method="POST">
                    <div class="mb-3">
                        <label for="kode_kategori" class="form-label">Kode Kategori <small style="color: red;">* Otomatis Terisi</small></label>
                        <input name="kode_kategori" type="text" class="form-control" id="kode_kategori" value="<?= $Kategori ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_kategori" class="form-label">Nama Kategori<small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Kategori" name="nama_kategori" required>
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