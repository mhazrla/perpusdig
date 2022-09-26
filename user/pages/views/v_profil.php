<?php
include "../../../layout/user/header.php";
include "../../../layout/user/navbar.php";
include "../../../layout/user/sidebar.php";
include "../../../config/db.php";

$id_user = $_SESSION['id_user'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
$row = mysqli_fetch_assoc($query);


?>




<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-8 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Edit Profile</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <div class="col-12">
                    <div class="card card-primary card-outline card-outline-tabs">

                        <div class="card-body">
                            <form action="pages/function/profil.php?action=edit" method="POST" enctype="multipart/form-data">

                                <div class="box-body">
                                    <input name="id_user" type="hidden" value="<?= $row['id_user']; ?>">
                                    <div class="form-group">
                                        <label>Kode Anggota <small style="color: red;">* Tidak dapat dirubah</small></label>
                                        <input type="text" class="form-control" value="<?= $row['kode_user']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>NIM <small style="color: red;">* Wajib diisi</small></label>
                                        <input type="text" class="form-control" value="<?= $row['nim']; ?>" name="nim" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Lengkap <small style="color: red;">* Wajib diisi</small></label>
                                        <input type="text" class="form-control" value="<?= $row['fullname']; ?>" name="fullname" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Username <small style="color: red;">* Wajib diisi</small></label>
                                        <input type="text" class="form-control" value="<?= $row['username']; ?>" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <small style="color: red;">* Wajib diisi</small></label>
                                        <input type="text" class="form-control" value="<?= $row['password']; ?>" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Prodi <small style="color: red;">* Wajib diisi</small></label>
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
                                        <label>Alamat Lengkap <small style="color: red;">* Wajib diisi</small></label>
                                        <textarea class="form-control" style="height: 80px; resize: none;" name="alamat" required><?= $row['alamat']; ?></textarea>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-block btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-lg-4 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Profil Saya</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Profil Saya</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Animasi -->
                            <img src="../assets/dist/img/avatar.png" style="width: 125px; height: 125px; display: block; margin-left: auto; margin-right: auto; margin-top: -5px; margin-bottom: 15px;" loop autoplay></lottie-player>
                            <!-- -->
                            <p class="font-weight-bold">Kode Anggota : <span class="font-weight-normal"><?= $row['kode_user']; ?></span> </p>
                            <p class="font-weight-bold">NIM : <span class="font-weight-normal"><?= $row['nim']; ?></span> </p>
                            <p class="font-weight-bold">Nama Lengkap : <span class="font-weight-normal"><?= $row['fullname']; ?></span> </p>
                            <p class="font-weight-bold">Username : <span class="font-weight-normal"><?= $row['username']; ?></span> </p>
                            <p class="font-weight-bold">Password : <span class="font-weight-normal"><?= $row['password']; ?></span> </p>
                            <p class="font-weight-bold">Prodi : <span class="font-weight-normal"><?= $row['prodi']; ?></span> </p>
                            <p class="font-weight-bold">Alamat Lengkap : <span class="font-weight-normal"><?= $row['alamat']; ?></span> </p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.Left col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include "../../../layout/user/footer.php"  ?>