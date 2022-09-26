<?php
session_start();
include "../../../config/db.php";
include "peminjaman.php";

if ($_GET['action'] = "edit") {
    $id_user = $_POST['id_user'];
    $nim = $_POST['nim'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];

    if ($_POST['prodi'] = NULL) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        UpdateDataPeminjaman();


        $query = "UPDATE user SET nim = '$nim', fullname = '$fullname', username = '$username', password = '$password', prodi = '$prodi', alamat = '$alamat'";
        $query .= "WHERE id_user = $id_user";

        $sql = mysqli_query($conn, $query);

        if ($sql) {
            header("location: " . $_SERVER['HTTP_REFERER']);
        } else {
            header("location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}
