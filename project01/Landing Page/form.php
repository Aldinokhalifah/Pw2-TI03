<?php
require_once 'dbkoneksi.php';

if(isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $message = $_POST['message'];
    $data = [$fullName, $email, $phoneNumber, $message];
    $sql = "INSERT INTO pesan_masuk (nama_lengkap, email, phone, pesan) VALUES (:nama_lengkap, :email, :phone, :pesan)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':nama_lengkap', $fullName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phoneNumber);
    $stmt->bindParam(':pesan', $message);

    try {
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            header("location:index.html");
            exit();
        } else {
            echo "<h1> Gagal menyimpan data. Silakan coba lagi.</h1>";
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}
?>
