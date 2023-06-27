<?php
// Koneksi ke database
$conn = mysqli_connect("localhost","root","","db_rumahsakit");

if(isset($_GET['id'])){
    $id_pasien = $_GET['id'];

    // Query untuk menghapus data
    $query = "DELETE FROM tbl_pasien WHERE id_pasien = $id_pasien";
    mysqli_query($conn, $query);

    // Redirect ke halaman sebelumnya
    header("Location: pasien.php");
}
?>