<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$kamar_id = $_POST['kamar_id'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$jumlah_tamu = $_POST['jumlah_tamu'];

if ($checkout <= $checkin) {
    die("Tanggal checkout harus setelah checkin");
}

$query = "INSERT INTO booking (nama, kamar_id, checkin, checkout, jumlah_tamu) VALUES ('$nama', '$kamar_id', '$checkin', '$checkout', '$jumlah_tamu')";

if (mysqli_query($conn, $query)) {
    header("Location: dashboard.php?status=success");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}

?>