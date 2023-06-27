<?php session_start(); // memulai session
session_destroy(); // menghapus semua data session
header("Location: login.php"); // mengarahkan pengguna ke halaman login setelah logout
exit(); // menghentikan eksekusi script
?>