<?php
session_start();

include 'koneksi/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username' AND password ='$password'");

$cek_data = mysqli_num_rows($data);

if ($cek_data > 0) {
    $_SESSION['login'] = "login";
    header("location:media.php?conten=home");
}else{
    header("location:index.php?validasi=gagal");
}
?>