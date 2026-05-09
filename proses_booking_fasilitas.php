<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user'])){
    header("Location: login_user.php");
    exit;
}
$user_id = $_SESSION['user']['id'];
$fasilitas_id = (int) $_POST['fasilitas_id'];
$nama         = $_POST['nama'];
$tanggal      = $_POST['tanggal'];
$status = 'pending';
mysqli_query($conn, "
INSERT INTO booking_fasilitas 
(user_id, fasilitas_id, nama, tanggal, status)
VALUES 
('$user_id', '$fasilitas_id', '$nama', '$tanggal', '$status')
");
$booking_id = mysqli_insert_id($conn);
header("Location: pembayaran.php?tipe=fasilitas&id=$booking_id");
exit;
?>