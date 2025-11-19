<?php
include 'koneksi.php';

// Bagian 1: Ambil data lama untuk ditampilkan di form
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM artikel WHERE id='$id'");
    $data = mysqli_fetch_assoc($query); // Ambil satu baris data
}

// Bagian 2: Proses data yang dikirim dari form
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $isi = $_POST['isi'];

    // Query UPDATE
    $sql = "UPDATE artikel SET 
            judul='$judul', 
            penulis='$penulis', 
            isi='$isi' 
            WHERE id='$id'";
            
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
    <title>Edit Artikel</title>
</head>
<body>
    <div class="container">
        <h2>Edit Artikel</h2>
        <a href="index.php">Kembali ke Daftar Artikel</a>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>"> 

            <label for="judul">Judul Artikel:</label><br>
            <input type="text" name="judul" value="<?php echo $data['judul']; ?>" required><br><br>

            <label for="penulis">Penulis:</label><br>
            <input type="text" name="penulis" value="<?php echo $data['penulis']; ?>" required><br><br>

            <label for="isi">Isi Artikel:</label><br>
            <textarea name="isi" rows="10" required><?php echo $data['isi']; ?></textarea><br><br>
            
            <input type="submit" name="edit" value="Update Artikel">
        </form>
    </div>
</body>
</html>