<?php
session_start();
include "../../../config/db.php";
// include "Pesan.php";

if ($_GET['action'] == "add") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $join_date = date('d-m-Y');
    $verif = "true";
    $kode_user = "-";
    $nim = "-";
    $prodi = "-";
    $alamat = "-";

    $query = "INSERT INTO user(kode_user,nim,fullname,username,password,prodi,alamat,verif,role,join_date)
        VALUES('" . $kode_user . "','" . $nim . "','" . $fullname . "','" . $username . "','" . $password . "','" . $prodi . "','" . $alamat . "', '" . $verif . "','" . $role . "','" . $join_date . "')";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['action'] == "edit") {

    $id_user = $_POST['id_user'];
    $fullname = htmlspecialchars(addslashes($_POST['fullname']));
    $username = htmlspecialchars(strtolower($_POST['username']));
    $password = htmlspecialchars(addslashes($_POST['password']));

    $query = "UPDATE user SET fullname = '$fullname', username = '$username', password ='$password'";
    $query .= "WHERE id_user = '$id_user'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['action'] == "delete") {
    $id_user = $_GET['id'];

    $query = mysqli_query($conn, "DELETE FROM user WHERE id_user = $id_user");

    if ($query) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
