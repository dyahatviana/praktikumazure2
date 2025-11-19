<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $isi = $_POST['isi'];
    $tanggal = date('Y-m-d'); // Mengambil tanggal hari ini secara otomatis

    $sql = "INSERT INTO artikel (judul, penulis, isi, tanggal_posting) 
            VALUES ('$judul', '$penulis', '$isi', '$tanggal')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Artikel</title>
    <style> /* ... (Gunakan style dari index.php jika diperlukan) ... */ </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Artikel Baru</h2>
        <a href="index.php">Kembali ke Daftar Artikel</a>
        <form method="POST">
            <label for="judul">Judul Artikel:</label><br>
            <input type="text" name="judul" required><br><br>

            <label for="penulis">Penulis:</label><br>
            <input type="text" name="penulis" required><br><br>

            <label for="isi">Isi Artikel:</label><br>
            <textarea name="isi" rows="10" required></textarea><br><br>
            
            <input type="submit" name="simpan" value="Simpan Artikel">
        </form>
    </div>
</body>
</html>