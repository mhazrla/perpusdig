<?php
session_start();
include "../../../config/db.php";

if ($_GET['action'] == "add") {
    $kode_anggota = $_POST['kodeAnggota'];
    $nim = $_POST['nim'];
    $fullname = $_POST['fullname'];
    $username = addslashes(strtolower($_POST['username']));
    $password = $_POST['password'];
    $prodi = $_POST['prodi'];
    $jrs = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $verif = "Tidak";
    $role = "Anggota";
    $join_date = date('d-m-Y');

    $sql = "INSERT INTO user(kode_user,nim,fullname,username,password,prodi,alamat,verif,role,join_date)
        VALUES('" . $kode_anggota . "','" . $nim . "','" . $fullname . "','" . $username . "','" . $password . "','" . $prodi . "','" . $alamat . "','" . $verif . "','" . $role . "','" . $join_date . "')";
    $sql .= mysqli_query($conn, $sql);

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} else if ($_GET['action'] == "edit") {

    $id_user = $_POST['id_user'];
    $nim = htmlspecialchars($_POST['nim']);
    $fullname = htmlspecialchars(addslashes($_POST['fullname']));
    $username = htmlspecialchars(strtolower($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $prodi = htmlspecialchars(addslashes($_POST['prodi']));
    $alamat = htmlspecialchars(addslashes($_POST['alamat']));

    $query = "UPDATE user SET nim = '$nim', fullname = '$fullname', username = '$username', 
          password = '$password', prodi = '$prodi', alamat = '$alamat'";

    $query .= "WHERE id_user = '$id_user'";

    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} else if ($_GET['action'] == "delete") {
    $id_user = $_GET['id'];

    $sql = mysqli_query($conn, "DELETE FROM user WHERE id_user = $id_user");

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
