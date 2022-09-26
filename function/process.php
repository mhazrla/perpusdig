<?php
session_start();
include "../config/db.php";

if ($_GET['action'] == "login") {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $data = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $row = mysqli_fetch_assoc($data);

        if ($row['role'] == "Admin") {
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['status'] = "Login";
            $_SESSION['level'] = "Admin";


            date_default_timezone_set('Asia/Jakarta');

            $id_user = $_SESSION['id_user'];
            $tanggal = date('d-m-Y');
            $jam = date('H:i:s');

            $query = "UPDATE user SET last_login = '$tanggal ( $jam )'";
            $query .= "WHERE id_user = $id_user";

            $sql = mysqli_query($conn, $query);

            header("location: ../admin");
        } else if ($row['role'] == "Anggota") {
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['level'] = "Anggota";
            $_SESSION['status'] = "Login";

            date_default_timezone_set('Asia/Jakarta');

            $id_user = $_SESSION['id_user'];
            $tanggal = date('d-m-Y');
            $jam = date('H:i:s');

            $query = "UPDATE user SET last_login = '$tanggal ( $jam )'";
            $query .= "WHERE id_user = $id_user";

            $sql = mysqli_query($conn, $query);

            header("location: ../user");
        } else {

            header("location: ../login");
        }
    } else {

        header("location: ../login");
    }
} elseif ($_GET['action'] == "register") {
    $fullname = $_POST['fullname'];
    $username = addslashes(strtolower($_POST['username']));
    $username1 = str_replace(' ', '', $username);
    $password = $_POST['password'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $verif = "Tidak";
    $role = "Anggota";
    $join_date = date('d-m-Y');

    $query = mysqli_query($conn, "SELECT max(kode_user) as kodeTerakhir FROM user");
    $data = mysqli_fetch_array($query);
    $kodeTerakhir = $data['kodeTerakhir'];

    $urutan = (int) substr($kodeTerakhir, 3, 3);

    $urutan++;

    $huruf = "AP";
    $Anggota = $huruf . sprintf("%03s", $urutan);

    $sql = "INSERT INTO user(kode_user,nim,fullname,username,password,prodi,alamat,verif,role,join_date)
            VALUES('" . $Anggota . "','" . $nim . "','" . $fullname . "','" . $username1 . "','" . $password . "','" . $prodi . "','" . $alamat . "','" . $verif . "','" . $role . "','" . $join_date . "')";
    $sql .= mysqli_query($conn, $sql);

    if ($sql) {
        header("location: ../login");
    } else {
        header("location: ../login");
    }
}
