<?php
function register($data){
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password"]);

    //cek konfirmasi password
    if( $password !== $password2){
        echo "<script>alert('konfirmasi password tidak sesuai!');</script>";
        return false;
    }
}
?>