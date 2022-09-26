<?php
session_start();
include "../../../config/db.php";

if ($_GET['action'] == "add") {
    $kode_kategori = $_POST['kode_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $sql = "INSERT INTO kategori(kode_kategori,nama_kategori)VALUES('$kode_kategori','$nama_kategori')";
    $sql .= mysqli_query($conn, $sql);

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['action'] == "edit") {
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $query = "UPDATE kategori SET nama_kategori = '$nama_kategori'";
    $query .= "WHERE id_kategori = '$id_kategori'";

    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['action'] == "delete") {
    $id_kategori = $_GET['id'];

    $sql = mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
