<?php
include "../../../layout/admin/header.php";
include "../../../layout/admin/navbar.php";
include "../../../layout/admin/sidebar.php";
include "../../../config/db.php";

// Data Table
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM user WHERE role = 'Admin'");
?>


<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Data Admin</h3>
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-plus mr-2"></i>Tambah Admin
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Terakhir Login</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['fullname']; ?></td>
                                <td><?= $row['username']; ?></td>
                                <td>
                                    <?php
                                    $pass = $_SESSION['password'];
                                    if ($row['password'] == $pass) {
                                        echo $row['password'];
                                    } else {
                                        echo "************";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row['last_login'] == null) {
                                        echo "Tidak diketahui";
                                    } else {
                                        echo $row['last_login'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $row['id_user'] ?>">
                                        <i class="fa fa-edit mr-2"></i><?= $row['id_user'] ?>
                                    </button>
                                    <a href="pages/function/administrator.php?action=delete&id=<?= $row['id_user']; ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Apakah yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>

                                    <!-- Modal Edit Anggota -->
                                    <div class="modal fade" id="modal-edit<?= $row['id_user'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data Administrator</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="pages/function/administrator.php?action=edit" enctype="multipart/form-data" method="POST">
                                                        <input type="hidden" value="<?= $row['id_user']; ?>" name="id_user">
                                                        <div class="form-group">
                                                            <label for="fullname" class="form-label">Nama Lengkap <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['fullname']; ?>" name="fullname" placeholder="Masukan Nama Lengkap" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="form-label">Username<small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['username']; ?>" name="username" placeholder="Masukan Username" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="form-label">Password<small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="password" class="form-control" value="<?= $row['password']; ?>" name="password" placeholder="Masukan Password" required>
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