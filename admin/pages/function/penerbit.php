<?php
session_start();
include "../../../config/db.php";

if ($_GET['action'] == "add") {
    $kode_penerbit = $_POST['kode_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $status = $_POST['status'];

    $sql = "INSERT INTO penerbit(kode_penerbit,nama_penerbit,verif_penerbit)
            VALUES('" . $kode_penerbit . "','" . $nama_penerbit . "','" . $status . "')";
    $sql .= mysqli_query($conn, $sql);

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['action'] == "edit") {
    $id_penerbit = $_POST['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $verif_penerbit = $_POST['status'];

    $query = "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', verif_penerbit = '$verif_penerbit'";
    $query .= "WHERE id_penerbit = '$id_penerbit'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['action'] == "delete") {
    $id_penerbit = $_GET['id'];

    $sql = mysqli_query($conn, "DELETE FROM penerbit WHERE id_penerbit = '$id_penerbit'");

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
