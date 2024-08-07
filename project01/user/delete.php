<?php
// Memanggil file koneksi database
require '../dbkoneksi.php';

// Memeriksa apakah parameter id telah diterima dari URL
if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];

    // Query untuk menghapus data pasien berdasarkan id
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);

    // Redirect ke halaman index.php setelah proses penghapusan selesai
    header("Location: index.php");
    exit();
} else {
    echo "Parameter ID tidak ditemukan.";
    exit;
}
