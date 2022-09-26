<?php
include "../../../layout/admin/header.php";
include "../../../layout/admin/navbar.php";
include "../../../layout/admin/sidebar.php";
include "../../../config/db.php";

// Data Table
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM buku");


?>


<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Data Buku</h3>
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-plus mr-2"></i>Tambah Buku
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Kondisi Baik</th>
                            <th>Kondisi Rusak</th>
                            <th>Jumlah Buku</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['judul']; ?></td>
                                <td><?= $row['pengarang']; ?></td>
                                <td><?= $row['penerbit']; ?></td>
                                <td><?= $row['n_buku_baik']; ?></td>
                                <td><?= $row['n_buku_rusak']; ?></td>
                                <td><?php
                                    $n_buku_rusak = $row['n_buku_rusak'];
                                    $n_buku_baik = $row['n_buku_baik'];

                                    echo $n_buku_rusak + $n_buku_baik;
                                    ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $row['id_buku'] ?>">
                                        <i class="fa fa-edit mr-2"></i><?= $row['id_buku'] ?>
                                    </button>
                                    <a href="pages/function/buku.php?action=delete&id=<?= $row['id_buku']; ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Apakah yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>

                                    <!-- Modal Edit Buku -->
                                    <div class="modal fade" id="modal-edit<?= $row['id_buku'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data Buu</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="pages/function/buku.php?action=edit" enctype="multipart/form-data" method="POST">
                                                        <input type="hidden" value="<?= $row['id_buku']; ?>" name="id_buku">
                                                        <div class="form-group">
                                                            <label for="judul" class="form-label">Judul Buku <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['judul']; ?>" name="judul" placeholder="Masukkan Judul Buku" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kategori" class="form-label">Kategori<small style="color: red;">* Wajib diisi</small></label>
                                                            <select class="form-control" name="kategori">
                                                                <option selected value="<?= $row['kategori']; ?>"><?= $row['kategori']; ?> (Dipilih Sebelumnya)</option>
                                                                <?php
                                                                $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                                                                while ($data1 = mysqli_fetch_array($kategori)) {
                                                                ?>
                                                                    <option value="<?= $data1['nama_kategori']; ?>"> <?= $data1['nama_kategori']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="penerbit" class="form-label">Penerbit<small style="color: red;">* Wajib diisi</small></label>
                                                            <select class="form-control" name="penerbit">
                                                                <option selected value="<?= $row['penerbit']; ?>"><?= $row['penerbit']; ?> (Dipilih Sebelumnya)</option>
                                                                <?php
                                                                $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
                                                                while ($data = mysqli_fetch_array($penerbit)) {
                                                                ?>
                                                                    <option value="<?= $data['nama_penerbit']; ?>"> <?= $data['nama_penerbit']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="penerbit" class="form-label">Pengarang<small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['pengarang']; ?>" name="pengarang" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tahun_terbit" class="form-label">Tahun Terbit <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" min="2000" max="2100" class="form-control" value="<?= $row['tahun_terbit']; ?>" name="tahun_terbit" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="isbn" class="form-label">ISBN <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" class="form-control" value="<?= $row['isbn']; ?>" name="isbn" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="n_buku_baik" class="form-label">Jumlah Buku Kondisi Baik <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" class="form-control" value="<?= $row['n_buku_baik']; ?>" name="n_buku_baik" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="n_buku_rusak" class="form-label">Jumlah Buku Kondisi Buruk <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" class="form-control" value="<?= $row['n_buku_rusak']; ?>" name="n_buku_rusak" required>
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

<!-- Modal Add Administrator -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pages/function/buku.php?action=add" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="judul" class="form-label">Judul Buku <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Buku" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori" class="form-label">Kategori<small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control" name="kategori">
                            <option selected disabled>Pilih Kategori Buku</option>
                            <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                            while ($data = mysqli_fetch_array($kategori)) {
                            ?>
                                <option value="<?= $data['nama_kategori']; ?>"> <?= $data['nama_kategori']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penerbit" class="form-label">Penerbit<small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control" name="penerbit">
                            <option selected disabled>Pilih Penerbit Buku</option>
                            <?php
                            $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
                            while ($data = mysqli_fetch_array($penerbit)) {
                            ?>
                                <option value="<?= $data['nama_penerbit']; ?>"> <?= $data['nama_penerbit']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penerbit" class="form-label">Pengarang<small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" name="pengarang" placeholder="Masukan Nama Pengarang" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" min="2000" max="2100" class="form-control" name="tahun_terbit" placeholder="Masukan Tahun Terbit" required>
                    </div>
                    <div class="form-group">
                        <label for="isbn" class="form-label">ISBN <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" name="isbn" placeholder="Masukan ISBN" required>
                    </div>
                    <div class="form-group">
                        <label for="n_buku_baik" class="form-label">Jumlah Buku Kondisi Baik <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" name="n_buku_baik" placeholder="Masukan Jumlah Buku Baik" required>
                    </div>
                    <div class="form-group">
                        <label for="n_buku_rusak" class="form-label">Jumlah Buku Kondisi Buruk <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" name="n_buku_rusak" placeholder="Masukan Jumlah Buku Rusak" required>
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