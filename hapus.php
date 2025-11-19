<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM artikel WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("location: index.php");
}
?>