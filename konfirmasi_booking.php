<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}
$id = $_GET['id'] ?? null;
$tipe = $_GET['tipe'];
if (!$id || !$tipe) {
    die("Parameter tidak lengkap!");
}
if ($tipe == 'kamar') {
    mysqli_query($conn, "
    UPDATE booking 
    SET status='paid' 
    WHERE id='$id'
    ");
} elseif ($tipe == 'fasilitas') {
    mysqli_query($conn, "
    UPDATE booking_fasilitas 
    SET status='paid' 
    WHERE id='$id'
    ");
}else {
    die("Tipe tidak valid!");
}
header("Location: admin_kamar.php");
exit;