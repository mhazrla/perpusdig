<?php
include "../../../layout/admin/header.php";
include "../../../layout/admin/navbar.php";
include "../../../layout/admin/sidebar.php";
include "../../../config/db.php";

?>


<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Laporan Data Peminjaman-Pengembalian</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <div class="tab-content">
                    <!-- Tanggal Pinjam -->

                    <div class="tab-pane active" id="tgl-peminjaman">

                        <form action="pages/function/laporan.php?action=tgl_peminjaman" method="POST" target="_blank">
                            <div class="form-group">
                                <label for="tgl_peminjaman">Start</label>
                                <input name="tgl_peminjaman" id="tgl_peminjaman" class="form-control" type="date" required />
                            </div>
                            <div class=" form-group">
                                <button type="submit" target="_blank" class="btn btn-primary btn-block">Tampilkan Data</button>
                            </div>
                        </form>

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