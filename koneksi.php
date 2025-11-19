<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db   = "db_blog";
$port = "9306"; // Ganti dengan port yang kamu lihat di XAMPP
$conn = mysqli_connect($host, $user, $pass, $db, $port); // Tambahkan $port di akhir

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>