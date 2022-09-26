<?php
include "../../../layout/admin/header.php";
include "../../../layout/admin/navbar.php";
include "../../../layout/admin/sidebar.php";
include "../../../config/db.php";

$query = mysqli_query($conn, "SELECT max(kode_penerbit) as kodeTerakhir FROM penerbit");
$data = mysqli_fetch_array($query);
$kodeTerakhir = $data['kodeTerakhir'];

$order = (int) substr($kodeTerakhir, 3, 3);

$order++;

$awalan = "P";
$Kode = $awalan . sprintf("%03s", $order);

// Data Table
$no = 1;
$members = mysqli_query($conn, "SELECT * FROM penerbit");
?>


<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Data Penerbit</h3>
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-plus mr-2"></i>Tambah Penerbit
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Penerbit</th>
                            <th>Nama Penerbit</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($members)) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['kode_penerbit']; ?></td>
                                <td><?= $row['nama_penerbit']; ?></td>
                                <td>
                                    <?php

                                    if ($row['verif_penerbit'] == "Terverifikasi") {
                                        echo "<span class='btn-primary btn-sm' style='font-weight: bold; display: block; margin: 0 auto; text-align: center;'> Terverifikasi</span>";
                                    } else if ($row['verif_penerbit'] == "Belum Terverifikasi") {
                                        echo "<span class='btn-danger btn-sm' style='font-weight: bold; display: block; margin: 0 auto; text-align: center;'> Belum Terverifikasi</span>";
                                    } else {
                                        echo "<span class='btn-warning btn-sm' style='font-weight: bold; display: block; margin: 0 auto; text-align: center;'>Status Tidak Diketahui</span>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $row['id_penerbit'] ?>">
                                        <i class="fa fa-edit mr-2"></i><?= $row['id_penerbit'] ?>
                                    </button>
                                    <a href="pages/function/penerbit.php?action=delete&id=<?= $row['id_penerbit']; ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Apakah yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>

                                    <!-- Modal Edit Anggota -->
                                    <div class="modal fade" id="modal-edit<?= $row['id_penerbit'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Penerbit</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="pages/function/penerbit.php?action=edit" enctype="multipart/form-data" method="POST">
                                                        <input type="hidden" value="<?= $row['id_penerbit']; ?>" name="id_penerbit">
                                                        <div class="mb-3">
                                                            <label for="kode_penerbit" class="form-label">Kode Penerbit<small style="color: red;">* Otomatis Terisi</small></label>
                                                            <input type="text" class="form-control" id="kode_penerbit" value="<?= $row['kode_penerbit'] ?>" name="kode_penerbit" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_penerbit" class="form-label">Nama Penerbit <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['nama_penerbit']; ?>" name="nama_penerbit" placeholder="Masukan Nama Penerbit" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status" class="form-label">Status <small style="color: red;">* Wajib diisi</small></label>
                                                            <select class="form-control" name="status">
                                                                <?php
                                                                if ($row['verif_penerbit'] == "Terverifikasi") {
                                                                    echo "<option selected value='Terverifikasi'>Terverifikasi ( Dipilih Sebelumnya )</option>";
                                                                    echo "<option value='Belum Terverifikasi'>Belum Terverifikasi</option>";
                                                                } else if ($row['verif_penerbit'] == "Belum Terverifikasi") {
                                                                    echo "<option selected value='Belum Terverifikasi'>Belum Terverifikasi ( Dipilih Sebelumnya )</option>";
                                                                    echo "<option value='Terverifikasi'>Terverifikasi</option>";
                                                                } else {
                                                                    echo "<option selected disabled>Pilih Status Penerbit</option>";
                                                                    echo "<option value='Belum Terverifikasi'>Belum Terverifikasi</option>";
                                                                    echo "<option value='Terverifikasi'>Terverifikasi</option>";
                                                                }
                                                                ?>
                                                            </select>
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

<!-- Modal Add Penerbit -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Penerbit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pages/function/penerbit.php?action=add" enctype="multipart/form-data" method="POST">
                    <div class="mb-3">
                        <label for="kode_penerbit" class="form-label">Kode Penerbit <small style="color: red;">* Otomatis Terisi</small></label>
                        <input name="kode_penerbit" type="text" class="form-control" id="kode_penerbit" value="<?= $Kode ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_penerbit" class="form-label">Nama Penerbit <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Penerbit" name="nama_penerbit" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Status <small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control" name="status">
                            <option disabled selected>-- Pilih Status Penerbit --</option>
                            <option value="Terverifikasi">Terverfikasi</option>
                            <option value="Belum Terverifikasi">Belum Terverfikasi</option>
                        </select>
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