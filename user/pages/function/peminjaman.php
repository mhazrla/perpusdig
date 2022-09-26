<?php
session_start();
include "../../../config/db.php";

if ($_GET['action'] == "pinjam") {

    if ($_POST['judul_buku'] == NULL) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } elseif ($_POST['kondisi_buku_dipinjam'] == NULL) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {

        $nama_anggota = $_POST['nama_anggota'];
        $judul_buku = $_POST['judul_buku'];
        $tgl_peminjaman = $_POST['tgl_peminjaman'];
        $kondisi_buku_dipinjam = $_POST['kondisi_buku_dipinjam'];

        $query = mysqli_query($conn, "SELECT * FROM peminjaman WHERE nama_anggota = '$nama_anggota' AND judul_buku = '$judul_buku' AND tgl_pengembalian = ''");
        $cek = mysqli_num_rows($query);

        if ($cek > 0) {
            header("location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $sql = "INSERT INTO peminjaman(nama_anggota,judul_buku,tgl_peminjaman,kondisi_buku_dipinjam)
            VALUES('" . $nama_anggota . "','" . $judul_buku . "','" . $tgl_peminjaman . "','" . $kondisi_buku_dipinjam . "')";
            $sql .= mysqli_query($conn, $sql);

            if ($sql) {
                header("location: " . $_SERVER['HTTP_REFERER']);
            } else {
                header("location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }
} elseif ($_GET['action'] == "pengembalian") {


    if ($_POST['kondisi_buku_dikembalikan'] == "Baik") {
        $denda = "Tidak ada";
    } elseif ($_POST['kondisi_buku_dikembalikan'] == "Rusak") {
        $denda = "Rp 20.000";
    } elseif ($_POST['kondisi_buku_dikembalikan'] == "Hilang") {
        $denda = "Rp 50.000";
    }

    $judul_buku = $_POST['judul_buku'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];
    $kondisi_buku_dikembalikan = $_POST['kondisi_buku_dikembalikan'];

    $ambil_id = mysqli_query($conn, "SELECT * FROM peminjaman WHERE judul_buku = '$judul_buku'");
    $row = mysqli_fetch_assoc($ambil_id);

    $id_peminjaman = $row['id_peminjaman'];

    $query = "UPDATE peminjaman SET tgl_pengembalian = '$tgl_pengembalian', kondisi_buku_dikembalikan = '$kondisi_buku_dikembalikan', denda = '$denda'";

    $query .= "WHERE id_peminjaman = $id_peminjaman";

    $sql = mysqli_query($conn, $query);

    if ($sql) {

        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
function UpdateDataPeminjaman()
{
    include "../../../config/db.php";

    $nama_lama = $_SESSION['fullname'];
    $nama_anggota = $_POST['fullname'];

    $query1 = mysqli_query($conn, "SELECT * FROM user WHERE fullname = '$nama_lama'");
    $row = mysqli_fetch_assoc($query1);

    $nama_lama = $row['fullname'];

    $query = "UPDATE peminjaman SET nama_anggota = '$nama_anggota'";
    $query .= "WHERE nama_anggota = '$nama_lama'";

    $sql = mysqli_query($conn, $query);
}
