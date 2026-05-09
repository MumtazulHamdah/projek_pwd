<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user'])) {
    header("Location: login_user.php");
    exit;
}
$user_id = $_SESSION['user']['id'];
$id     = $_POST['booking_id']; // ID booking / booking_fasilitas
$tipe   = $_POST['tipe'];       // kamar / fasilitas
$metode = $_POST['metode'];
$bukti  = "";
if ($metode != "Bayar di Tempat") {
    if ($_FILES['bukti']['name'] == "") {
        die("Bukti transfer wajib diupload!");
    }
    $bukti = $_FILES['bukti']['name'];
    move_uploaded_file($_FILES['bukti']['tmp_name'], "bukti/" . $bukti);
    $status = "menunggu_konfirmasi";
} else {
    $bukti = "";
    $status = "pending"; // nunggu dibayar di hotel
}
mysqli_query($conn, "
INSERT INTO pembayaran (user_id, metode, bukti_transfer, status) 
VALUES ('$user_id', '$metode', '$bukti', '$status')
");
$pembayaran_id = mysqli_insert_id($conn);
if ($tipe == 'fasilitas') {
    mysqli_query($conn, "
    UPDATE booking_fasilitas 
    SET pembayaran_id = '$pembayaran_id', status = '$status'
    WHERE id = '$id'
    ");

} else {

    mysqli_query($conn, "
    UPDATE booking 
    SET pembayaran_id = '$pembayaran_id', status = '$status'
    WHERE id = '$id'
    ");
}
$_SESSION['success'] = true;
header("Location: dashboard.php");
exit;
?>