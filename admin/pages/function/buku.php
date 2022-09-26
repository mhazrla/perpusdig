<?php
session_start();
include "../../../config/db.php";

if ($_GET['action'] == "add") {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $isbn = $_POST['isbn'];
    $n_buku_baik = $_POST['n_buku_baik'];
    $n_buku_rusak = $_POST['n_buku_rusak'];

    $sql = "INSERT INTO buku(judul,kategori,penerbit,pengarang,tahun_terbit,isbn,n_buku_baik,n_buku_rusak)
        VALUES('" . $judul . "','" . $kategori . "','" . $penerbit . "','" . $pengarang . "','" . $tahun_terbit . "','" . $isbn . "', '" . $n_buku_baik . "', '" . $n_buku_rusak . "')";
    $sql .= mysqli_query($conn, $sql);

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['action'] == "edit") {
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $isbn = $_POST['isbn'];
    $n_buku_baik = $_POST['n_buku_baik'];
    $n_buku_rusak = $_POST['n_buku_rusak'];

    $query = "UPDATE buku SET judul = '$judul', kategori = '$kategori', penerbit = '$penerbit', 
                pengarang = '$pengarang', tahun_terbit = '$tahun_terbit', isbn = '$isbn', n_buku_baik = '$n_buku_baik', n_buku_rusak = '$n_buku_rusak'";

    $query .= "WHERE id_buku = $id_buku";

    $sql = mysqli_query($conn, $query);
    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['action'] == "delete") {
    $id_buku = $_GET['id'];

    $sql = mysqli_query($conn, "DELETE FROM buku WHERE id_buku = '$id_buku'");

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
