<?php
include 'config.php';

$fasilitas_id = $_POST['fasilitas_id'];
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];

mysqli_query($conn, " INSERT INTO booking_fasilitas (fasilitas_id, nama, tanggal, jumlah)
VALUES ('$fasilitas_id', '$nama', '$tanggal', '$jumlah')
");

echo "Booking berhasil!";
?>