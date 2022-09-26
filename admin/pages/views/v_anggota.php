<?php
include "../../../layout/admin/header.php";
include "../../../layout/admin/navbar.php";
include "../../../layout/admin/sidebar.php";
include "../../../config/db.php";

$query = mysqli_query($conn, "SELECT max(kode_user) as kodeTerakhir FROM user");
$data = mysqli_fetch_array($query);
$kodeTerakhir = $data['kodeTerakhir'];
$query = mysqli_query($conn, "SELECT max(kode_user) as kodeTerakhir FROM user");
$data = mysqli_fetch_array($query);
$kodeTerakhir = $data['kodeTerakhir'];

$order = (int) substr($kodeTerakhir, 3, 3);

$order++;

$awalan = "AP";
$Anggota = $awalan . sprintf("%03s", $order);

// Data Table
$no = 1;
$members = mysqli_query($conn, "SELECT * FROM user WHERE role = 'Anggota'");
?>


<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Data Anggota</h3>
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-plus mr-2"></i>Tambah Anggota
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Anggota</th>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Program Studi</th>
                            <th>Alamat</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($members)) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['kode_user']; ?></td>
                                <td><?php echo $row['nim']; ?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['prodi']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $row['id_user'] ?>">
                                        <i class="fa fa-edit mr-2"></i><?= $row['id_user'] ?>
                                    </button>
                                    <a href="pages/function/anggota.php?action=delete&id=<?= $row['id_user']; ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Apakah yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>

                                    <!-- Modal Edit Anggota -->
                                    <div class="modal fade" id="modal-edit<?= $row['id_user'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Anggota</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="pages/function/anggota.php?action=edit" enctype="multipart/form-data" method="POST">
                                                        <input type="hidden" value="<?= $row['id_user']; ?>" name="id_user">
                                                        <div class="mb-3">
                                                            <label for="kode_user" class="form-label">Kode Anggota <small style="color: red;">* Otomatis Terisi</small></label>
                                                            <input type="text" class="form-control" id="kode_user" value="<?php echo $Anggota ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nim" class="form-label">Nomor Induk Mahasiswa <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" class="form-control" placeholder="Masukan NIM" name="nim" value="<?= $row['nim']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fullname" class="form-label">Nama Lengkap <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="fullname" value="<?= $row['fullname']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="form-label">Username <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" placeholder="Masukan Username" name="username" value="<?= $row['username']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="form-label">Password <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="password" class="form-control" placeholder="Masukan Password" name="password" value="<?= $row['password']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="prodi" class="form-label">Prodi <small style="color: red;">* Wajib diisi</small></label>
                                                            <select class="form-control" name="prodi">
                                                                <?php
                                                                if ($row['prodi'] == null) {
                                                                    echo "<option selected disabled>Silahkan pilih prodi dari [" . $row['fullname'] . "]</option>";
                                                                } else {
                                                                    echo "<option selected value='" . $row['prodi'] . "'>" . $row['prodi'] . " ( Dipilih Sebelumnya )</option>";
                                                                }
                                                                ?>
                                                                <option value="KMN">KMN</option>
                                                                <option value="EKW">EKW</option>
                                                                <option value="INF">INF</option>
                                                                <option value="TEK">TEK</option>
                                                                <option value="SJMP">SJMP</option>
                                                                <option value="GZI">GZI</option>
                                                                <option value="TIB">TIB</option>
                                                                <option value="IKN">IKN</option>
                                                                <option value="TNK">TNK</option>
                                                                <option value="MAB">MAB</option>
                                                                <option value="MNI">MNI</option>
                                                                <option value="KIM">KIM</option>
                                                                <option value="LNK">LNK</option>
                                                                <option value="AKN">AKN</option>
                                                                <option value="PVT">PVT </option>
                                                                <option value="TMP">TMP</option>
                                                                <option value="PPP">PPP</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamat" class="form-label">Alamat <small style="color: red;">* Wajib diisi</small></label>
                                                            <textarea class="form-control" style="resize: none; height: 70px;" name="alamat"><?= $row['alamat']; ?></textarea>
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

<!-- Modal Add Anggota -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pages/function/anggota.php?action=add" enctype="multipart/form-data" method="POST">
                    <div class="mb-3">
                        <label for="kodeAnggota" class="form-label">Kode Anggota <small style="color: red;">* Otomatis Terisi</small></label>
                        <input name="kodeAnggota" type="text" class="form-control" id="kodeAnggota" value="<?php echo $Anggota ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nim" class="form-label">Nomor Induk Mahasiswa <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" placeholder="Masukan NIM" name="nim" required>
                    </div>
                    <div class="form-group">
                        <label for="fullname" class="form-label">Nama Lengkap <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Username <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password <small style="color: red;">* Wajib diisi</small></label>
                        <input type="password" class="form-control" placeholder="Masukan Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="prodi" class="form-label">Prodi <small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control" name="prodi">
                            <option disabled selected>-- Harap Pilih Program Studi --</option>
                            <option value="KMN">Komunikasi</option>
                            <option value="EKW">Ekowisata</option>
                            <option value="INF">Manajemen Informatika</option>
                            <option value="TEK">Teknik Komputer</option>
                            <option value="SJMP">Supervisor Jaminan Mutu Pangan</option>
                            <option value="GZI">Manajemen Industri Jasa Makanan dan Gizi</option>
                            <option value="TIB">Teknologi Industri Benih</option>
                            <option value="IKN">Teknologi Produksi dan Manajemen Perikanan Budidaya</option>
                            <option value="TNK">Teknologi dan Manajemen Ternak</option>
                            <option value="MAB">Manajemen Agribisnis</option>
                            <option value="MNI">Manajemen Industri</option>
                            <option value="KIM">Analisis Kimia</option>
                            <option value="LNK">Teknik dan Manajemen Lingkungan</option>
                            <option value="AKN">Akuntansi</option>
                            <option value="PVT">Paramedik Veteriner</option>
                            <option value="TMP">Teknologi dan Manajemen Produksi Perkebunan</option>
                            <option value="PPP">Teknologi Produksi dan Pengembangan Masyarakat Pertanian</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat <small style="color: red;">* Wajib diisi</small></label>
                        <textarea class="form-control" style="resize: none; height: 70px;" name="alamat" required></textarea>
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



<?php include "../../../layout/admin/footer.php"  ?>